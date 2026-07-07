<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ChatSession;
use Carbon\Carbon;
use Illuminate\Support\Str;

class MoodController extends Controller
{
    public function index(Request $request)
    {
        $user = auth()->user();
        if (!$user) {
            return redirect()->route('login');
        }

        // Get all unique sessions for the user (group by session_id)
        $allSessions = ChatSession::where('user_id', $user->id)
            ->whereNotNull('session_id')
            ->orderBy('created_at', 'asc')
            ->get()
            ->groupBy('session_id')
            ->map(function ($group) {
                return $group->last(); // Use the last state of the session for mood
            })
            ->sortByDesc('created_at');

        $totalSessions = $allSessions->count();

        // Calculate Streak
        $streak = 0;
        $currentDate = Carbon::today();
        
        $sessionDates = $allSessions->pluck('created_at')
            ->map(function($date) {
                return Carbon::parse($date)->startOfDay();
            })
            ->unique()
            ->sortDesc()
            ->values();

        foreach ($sessionDates as $index => $date) {
            // Check if this date is either today, or exactly $streak days ago from today
            if ($date->equalTo($currentDate->copy()->subDays($streak))) {
                $streak++;
            } else if ($index == 0 && $date->equalTo($currentDate->copy()->subDays(1))) {
                // Allow a 1-day grace period for streak if they haven't logged today yet
                $streak++;
                $currentDate = $currentDate->subDay();
            } else {
                break;
            }
        }

        // Average score
        // We invert the 0-100 (where 100=Krisis, 0=Stabil) to a 10-point scale (where 10=Stabil, 1=Krisis)
        // Score mapping: 
        // 0 crisis score = 10 happiness
        // 100 crisis score = 0 happiness
        $avgScore = 0;
        if ($totalSessions > 0) {
            $avgCrisisScore = $allSessions->avg('total_score');
            // convert to 0-10 scale
            $avgScore = round(10 - ($avgCrisisScore / 10), 1);
        }

        // Stability (Percentage of "Hijau" sessions)
        $stability = 0;
        if ($totalSessions > 0) {
            $hijauCount = $allSessions->where('risk_indicator', 'Hijau')->count();
            $stability = round(($hijauCount / $totalSessions) * 100);
        }

        // 7-Day Trend
        $weekData = [];
        $today = Carbon::today();
        
        for ($i = 6; $i >= 0; $i--) {
            $date = $today->copy()->subDays($i);
            $dayName = $date->isoFormat('ddd'); // Sen, Sel, Rab...
            
            // Get sessions for this day
            $daySessions = $allSessions->filter(function($s) use ($date) {
                return Carbon::parse($s->created_at)->startOfDay()->equalTo($date);
            });

            if ($daySessions->count() > 0) {
                // Get the dominant emotion or average score for the day
                $avgCrisisDay = $daySessions->avg('total_score');
                $scoreDay = round(10 - ($avgCrisisDay / 10));
                
                // Determine emotion based on average crisis score
                if ($avgCrisisDay > 70) $emotion = 'Merah';
                else if ($avgCrisisDay >= 36) $emotion = 'Kuning';
                else $emotion = 'Hijau';
            } else {
                // If no data, assume neutral/good or leave empty. We'll set score 0 or a placeholder.
                $scoreDay = 0;
                $emotion = 'Abu'; // We will handle 'Abu' (Grey) in view
            }

            $weekData[] = [
                'day' => $dayName,
                'score' => $scoreDay,
                'emotion' => $emotion
            ];
        }

        // Distribution
        $distData = [];
        if ($totalSessions > 0) {
            $hijau = $allSessions->where('risk_indicator', 'Hijau')->count();
            $kuning = $allSessions->where('risk_indicator', 'Kuning')->count();
            $merah = $allSessions->where('risk_indicator', 'Merah')->count();

            $distData = [
                ['label' => 'Stabil', 'count' => $hijau, 'pct' => round(($hijau/$totalSessions)*100), 'color' => '#02838D', 'bar' => '#02838D'],
                ['label' => 'Distress', 'count' => $kuning, 'pct' => round(($kuning/$totalSessions)*100), 'color' => '#F59E0B', 'bar' => '#F59E0B'],
                ['label' => 'Krisis', 'count' => $merah, 'pct' => round(($merah/$totalSessions)*100), 'color' => '#D92D20', 'bar' => '#D92D20'],
            ];
        } else {
            $distData = [
                ['label' => 'Stabil', 'count' => 0, 'pct' => 0, 'color' => '#02838D', 'bar' => '#02838D'],
                ['label' => 'Distress', 'count' => 0, 'pct' => 0, 'color' => '#F59E0B', 'bar' => '#F59E0B'],
                ['label' => 'Krisis', 'count' => 0, 'pct' => 0, 'color' => '#D92D20', 'bar' => '#D92D20'],
            ];
        }

        return view('mood.index', compact(
            'totalSessions', 
            'streak', 
            'avgScore', 
            'stability', 
            'weekData', 
            'distData'
        ));
    }

    public function log(Request $request)
    {
        $request->validate([
            'category' => 'required|string|in:Hijau,Kuning,Merah',
            'note' => 'nullable|string'
        ]);

        $user = $request->user();
        if (!$user) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $cat = $request->input('category');
        $note = $request->input('note');

        // Map category to a crisis score
        $score = 0;
        if ($cat === 'Hijau') $score = 10;
        else if ($cat === 'Kuning') $score = 50;
        else if ($cat === 'Merah') $score = 90;

        $userMessage = $note ? "Mood log manual: " . $note : "Mood log manual: " . $cat;
        
        ChatSession::create([
            'session_id' => Str::uuid()->toString(),
            'session_name' => 'Mood Log: ' . $cat,
            'user_id' => $user->id,
            'user_message' => $userMessage,
            'ai_response' => 'Mood berhasil dicatat secara manual.',
            'risk_indicator' => $cat,
            'total_score' => $score,
        ]);

        return response()->json(['success' => true]);
    }
}
