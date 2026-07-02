import os
from dotenv import load_dotenv
from fastapi import FastAPI
from fastapi.middleware.cors import CORSMiddleware
from pydantic import BaseModel
import requests
import re
from nlp_engine import calculate_emotion_score # Memanggil mesin yang kita buat tadi
from predefined_responses import PREDEFINED_RESPONSES

def clean_message(msg: str) -> str:
    msg = msg.lower().strip()
    msg = re.sub(r'[.,\/#!$%\^&\*;:{}=\-_`~()?]+$', '', msg).strip()
    return msg

NORMALIZED_PREDEFINED_RESPONSES = {clean_message(k): v for k, v in PREDEFINED_RESPONSES.items()}

# Memuat isi file .env ke dalam sistem
load_dotenv()

from typing import List, Dict, Optional
from rl_agent import QLearningAgent
import json

app = FastAPI()

rl_agent = QLearningAgent()
session_states = {} # Simple memory for RL state transitions

# Mengizinkan akses dari aplikasi Laravel
app.add_middleware(
    CORSMiddleware,
    allow_origins=[
        "http://127.0.0.1:8080", "http://localhost:8080", "http://web-konseling.test",
        "http://localhost:5173", "http://127.0.0.1:5173",   # Vite dev server (aether-frontend)
    ],
    allow_credentials=True,
    allow_methods=["*"],
    allow_headers=["*"],
)

class ChatInput(BaseModel):
    message: str
    session_id: Optional[str] = None
    history: Optional[List[Dict[str, str]]] = None

@app.post("/analyze-emotion")
def analyze_emotion(data: ChatInput):
    
    # 1. Hitung skor awal
    score, indicator, details = calculate_emotion_score(data.message)

    # RL Reward logic
    if data.session_id and data.session_id in session_states:
        prev_state, prev_action, prev_score = session_states[data.session_id]
        reward = prev_score - score # Positive reward if stress goes down
        rl_agent.update(prev_state, prev_action, reward, indicator)

    # 2. Cek database kustom
    msg_cleaned = clean_message(data.message)
    ai_reply = NORMALIZED_PREDEFINED_RESPONSES.get(msg_cleaned)
    is_oot = False

    # 3. Gunakan Gemini AI
    if not ai_reply:
        action = rl_agent.choose_action(indicator)
        
        if data.session_id:
            session_states[data.session_id] = (indicator, action, score)
            
        action_prompt = ""
        if action == "validasi":
            action_prompt = "Fokus pada memvalidasi perasaan pengguna. Berikan empati mendalam tanpa memberikan saran."
        elif action == "cbt":
            action_prompt = "Berikan saran praktis berdasarkan teknik Cognitive Behavioral Therapy (CBT) seperti grounding atau restrukturisasi kognitif."
        elif action == "eksplorasi":
            action_prompt = "Ajukan pertanyaan terbuka yang memancing pengguna untuk bercerita lebih banyak tentang perasaannya."

        history_text = ""
        if data.history:
            history_text = "\nRiwayat Percakapan Sebelumnya:\n"
            for h in data.history:
                history_text += f"{'Aether' if h['role']=='model' else 'Mahasiswa'}: {h['content']}\n"
        
        system_prompt = f"""
        Kamu adalah chatbot konselor sebaya (peer counselor) untuk mahasiswa bernama Aether. 
        
        {history_text}
        
        Mahasiswa sekarang berkata: "{data.message}"
        Hasil deteksi sistem: Dia berada di indikator warna {indicator} (Skor: {score}).
        
        Strategi Respon Saat Ini: {action_prompt}
        
        Instruksi wajib:
        1. Patuhi Strategi Respon Saat Ini di atas.
        2. Gunakan bahasa kasual mahasiswa (gunakan 'aku' dan 'kamu').
        3. Balasan harus singkat (maksimal 3 paragraf).
        4. KELUARKAN JAWABAN DALAM FORMAT JSON SEPERTI INI:
           {{"is_oot": false, "reply": "jawaban kamu disini"}}
        5. Jika pengguna mengajak diskusi tentang hal di luar kesehatan mental, emosi, curhat, atau kehidupan mahasiswa (contoh: coding, politik, cuaca, dll), set "is_oot" menjadi true, dan tolak secara halus.
        """

        try:
            api_key = os.getenv("GEMINI_API_KEY")
            model_name = "gemini-3.5-flash" 
            url = f"https://generativelanguage.googleapis.com/v1beta/models/{model_name}:generateContent?key={api_key}"
            payload = {
                "contents": [{"parts": [{"text": system_prompt}]}],
                "generationConfig": {"response_mime_type": "application/json"}
            }
            response = requests.post(url, headers={'Content-Type': 'application/json'}, json=payload)
            data_json = response.json()
            raw_reply = data_json['candidates'][0]['content']['parts'][0]['text']
            
            parsed = json.loads(raw_reply)
            ai_reply = parsed.get("reply", "Maaf, aku tidak mengerti.")
            is_oot = parsed.get("is_oot", False)
            
            if is_oot:
                score = 0
                indicator = "Netral"
                details = []
            
        except Exception as e:
            if indicator == "Merah":
                ai_reply = "Aku sangat khawatir padamu sekarang. Beban pikiran yang kamu rasakan itu wajar, tapi tolong jangan menanggungnya sendirian ya. Hubungi seseorang yang kamu percaya segera."
            elif details:
                # Mengambil kata kunci utama untuk memberikan respon spesifik tanpa Gemini
                kata_kunci = details[0]['keyword']
                kategori = details[0]['category']
                
                if "Akademik" in kategori:
                    ai_reply = f"Pasti pusing ya mikirin soal '{kata_kunci}'. Hal-hal berbau akademik memang sering menguras tenaga dan pikiran. Tarik napas dulu yuk, kita selesaikan satu per satu."
                elif "Sosial" in kategori or "Relasi" in kategori:
                    ai_reply = f"Masalah terkait '{kata_kunci}' memang bikin lelah hati. Kecewa atau sedih itu wajar banget. Aku di sini buat dengerin ceritamu sampai kamu merasa lega."
                elif "Internal" in kategori or "Pribadi" in kategori:
                    ai_reply = f"Perasaan '{kata_kunci}' yang kamu rasakan saat ini sangat valid. Gak apa-apa kalau hari ini terasa berat, istirahatlah sejenak dan jangan terlalu keras pada dirimu sendiri."
                elif "Regulasi" in kategori:
                    ai_reply = f"Wah, bagus banget kamu bisa bersikap '{kata_kunci}'! Pertahankan pola pikir positif ini ya, sangat membantu untuk kesehatan mentalmu."
                else:
                    ai_reply = f"Aku mengerti kamu sedang memikirkan soal '{kata_kunci}'. Ingatlah bahwa kamu tidak sendirian, pelan-pelan saja menghadapinya ya."
            else:
                ai_reply = "Aku mendengar keluhanmu. Tarik napas pelan-pelan, segala perasaanmu valid dan kamu pasti bisa melewati fase ini."
            
            print(f"Error API: {e}")

    # 4. Tambahkan rincian analisis ke dalam balasan chat (Fitur breakdown nilai poin keluhan)
    if details:
        breakdown = "\n\n---\n📊 **Analisis Keluhan & Poin Emosi:**\n"
        for d in details:
            sign = "+" if d['points'] > 0 else ""
            breakdown += f"• {d['category']} ('{d['keyword']}'): {sign}{d['points']} Poin\n"
        
        emoji = "🟢" if indicator == "Hijau" else "🟡" if indicator == "Kuning" else "🔴"
        breakdown += f"\n**Total Skor: {score} ({indicator} {emoji})**"
        
        ai_reply += breakdown

    # 5. Kembalikan data lengkap ke frontend Laravel/Vue
    return {
        "pesan_asli": data.message,
        "total_skor": score,
        "indikator": indicator,
        "ai_response": ai_reply,
        "details": details
    }