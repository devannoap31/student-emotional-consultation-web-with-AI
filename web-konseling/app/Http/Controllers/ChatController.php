<?php

namespace App\Http\Controllers;

use App\Models\ChatSession;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ChatController extends Controller
{
    /**
     * Analyze emotion: forward message to Python AI, save result to DB.
     */
    public function analyze(Request $request)
    {
        $request->validate([
            'message' => 'required|string|max:5000',
        ]);

        $user    = $request->user();
        $message = $request->input('message');

        // Forward to Python FastAPI AI engine
        try {
            $aiResponse = Http::timeout(30)->post('http://127.0.0.1:8000/analyze-emotion', [
                'message' => $message,
            ]);

            if ($aiResponse->successful()) {
                $data = $aiResponse->json();
            } else {
                // Fallback if AI server returns an error
                $data = $this->fallbackResponse($message);
            }
        } catch (\Exception $e) {
            // Fallback if AI server is not running
            $data = $this->fallbackResponse($message);
        }

        // Save chat session to database if possible
        $totalScore = $data['total_skor'] ?? 0;
        $indikator = $data['indikator'] ?? null;
        $aiResponse = $data['ai_response'] ?? 'Maaf, terjadi kesalahan pada sistem.';

        try {
            if ($user) {
                $chatSession = ChatSession::create([
                    'user_id'        => $user->id,
                    'user_message'   => $message,
                    'ai_response'    => $aiResponse,
                    'risk_indicator' => $indikator,
                    'total_score'    => $totalScore,
                ]);

                // Update user's last emotional status
                $user->update([
                    'last_emotional_status' => $indikator,
                ]);
            }
        } catch (\Exception $e) {
            // Silently ignore DB error (e.g. MySQL not running) to allow chat to work based on API
        }

        return response()->json([
            'pesan_asli'  => $message,
            'total_skor'  => $totalScore,
            'indikator'   => $indikator,
            'ai_response' => $aiResponse,
        ]);
    }

    /**
     * Get chat history for the authenticated user.
     */
    public function history(Request $request)
    {
        $user = $request->user();

        $chats = $user->chatSessions()
            ->orderBy('created_at', 'desc')
            ->limit(50)
            ->get()
            ->map(function ($chat) {
                return [
                    'id'             => $chat->id,
                    'user_message'   => $chat->user_message,
                    'ai_response'    => $chat->ai_response,
                    'risk_indicator' => $chat->risk_indicator,
                    'total_score'    => $chat->total_score,
                    'created_at'     => $chat->created_at->toISOString(),
                ];
            });

        return response()->json($chats);
    }

    /**
     * Fallback response when AI server is offline.
     */
    private function fallbackResponse(string $message): array
    {
        $text  = strtolower($message);
        
        // 1. Check for predefined response match first (even if Python AI server is offline)
        $cleaned = $this->cleanMessage($message);
        $jsonPath = base_path('predefined_responses.json');
        
        if (file_exists($jsonPath)) {
            $predefined = json_decode(file_get_contents($jsonPath), true);
            if (is_array($predefined)) {
                $normalizedPredefined = [];
                foreach ($predefined as $key => $value) {
                    $normalizedPredefined[$this->cleanMessage($key)] = $value;
                }
                
                if (isset($normalizedPredefined[$cleaned])) {
                    // Calculate basic score for the matched message so indicator is realistic
                    $score = 10;
                    if (str_contains($text, 'burnout') || str_contains($text, 'lelah')) $score += 35;
                    if (str_contains($text, 'skripsi') || str_contains($text, 'deadline')) $score += 20;
                    if (str_contains($text, 'nangis') || str_contains($text, 'sedih')) $score += 25;
                    if (str_contains($text, 'bunuh diri') || str_contains($text, 'mengakhiri hidup')) $score += 60;
                    if (str_contains($text, 'gapapa') || str_contains($text, 'semangat')) $score -= 10;
                    $score = max(0, min(100, $score));
                    $indikator = $score > 70 ? 'Merah' : ($score >= 36 ? 'Kuning' : 'Hijau');

                    return [
                        'pesan_asli'  => $message,
                        'total_skor'  => $score,
                        'indikator'   => $indikator,
                        'ai_response' => $normalizedPredefined[$cleaned],
                    ];
                }
            }
        }

        // 2. Regular fallback matching (basic response)
        $score = 10;

        if (str_contains($text, 'burnout') || str_contains($text, 'lelah')) $score += 35;
        if (str_contains($text, 'skripsi') || str_contains($text, 'deadline')) $score += 20;
        if (str_contains($text, 'nangis') || str_contains($text, 'sedih')) $score += 25;
        if (str_contains($text, 'bunuh diri') || str_contains($text, 'mengakhiri hidup')) $score += 60;
        if (str_contains($text, 'gapapa') || str_contains($text, 'semangat')) $score -= 10;
        $score = max(0, min(100, $score));

        if ($score > 70) {
            $indikator   = 'Merah';
            $ai_response = 'Aku sangat khawatir sama kamu sekarang. Perasaan seperti ini terlalu berat untuk ditanggung sendirian. Tolong hubungi seseorang yang kamu percaya segera, ya. Kamu tidak sendirian. ❤️';
        } elseif ($score >= 36) {
            $indikator   = 'Kuning';
            $ai_response = 'Aku dengerin kok. Kayaknya kamu lagi menanggung banyak beban ya? Wajar banget ngerasa kayak gitu. Coba ceritain lebih lanjut, yuk kita urutkan satu-satu bareng-bareng. 💛';
        } else {
            $indikator   = 'Hijau';
            $ai_response = 'Wah, kayaknya kamu lagi oke-oke aja nih! Tetap jaga semangatnya ya. Kalau ada yang mau diceritain, aku selalu di sini. 😊';
        }

        return [
            'pesan_asli'  => $message,
            'total_skor'  => $score,
            'indikator'   => $indikator,
            'ai_response' => $ai_response,
        ];
    }

    /**
     * Helper to clean/normalize messages for robust predefined matching
     */
    private function cleanMessage(string $msg): string
    {
        $msg = trim(strtolower($msg));
        $msg = preg_replace('/[.,\/#!$%\^&\*;:{}=\-_`~()?]+$/', '', $msg);
        return trim($msg);
    }
}
