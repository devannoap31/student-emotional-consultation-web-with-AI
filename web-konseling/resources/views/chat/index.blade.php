@extends('layouts.app')

@section('title', 'Chat — Aether Mental Health AI')
@section('meta_description', 'Curhat dengan Aether AI, pendamping kesehatan mental empatis berbasis CBT untuk mahasiswa.')

@section('content')
<div id="chat-app" style="min-height:100vh; background-color:#FFFFFF; display:flex; font-family:'Nunito',sans-serif; color:#231F20; position:relative; overflow:hidden;">

    {{-- ░░ LEFT SIDEBAR ░░ --}}
    <aside id="sidebar-desktop" style="position:fixed; top:0; left:0; bottom:0; width:272px; background:#FAFAFA; border-right:1px solid #E5E7EB; display:flex; flex-direction:column; padding:20px; z-index:40; overflow-y:auto;">

        {{-- Logo --}}
        <div style="display:flex; align-items:center; justify-content:space-between; margin-bottom:28px; padding:0 8px;">
            <a href="{{ url('/') }}" style="text-decoration:none; display:flex; align-items:center; gap:10px;">
                <div style="width:32px; height:32px; background:linear-gradient(135deg, #02838D, #4FAFB6); border-radius:8px; display:flex; align-items:center; justify-content:center;">
                    <span style="color:#FFF; font-weight:900; font-family:'Playfair Display', serif; font-size:18px;">Æ</span>
                </div>
                <span style="font-family:'Playfair Display', serif; font-weight:800; font-size:20px; color:#231F20;">Aether</span>
            </a>
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#9CA3AF" stroke-width="2"><path d="M15 18l-6-6 6-6"/></svg>
        </div>

        {{-- New Chat CTA --}}
        <button onclick="newSession()" style="width:100%; display:flex; align-items:center; gap:10px; background:#FFFFFF; border:1px solid #E5E7EB; color:#231F20; padding:12px 16px; border-radius:12px; font-size:14px; font-weight:700; cursor:pointer; margin-bottom:24px; transition:all 0.2s; box-shadow:0 2px 6px rgba(0,0,0,0.02);" onmouseover="this.style.borderColor='#02838D';" onmouseout="this.style.borderColor='#E5E7EB';">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#02838D" stroke-width="2"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
            New Chat
        </button>

        {{-- Navigation --}}
        <nav style="display:flex; flex-direction:column; gap:6px;">
            <a href="{{ route('chat') }}" style="display:flex; align-items:center; gap:12px; padding:12px 16px; background:#F3FBFC; border-radius:12px; color:#02838D; text-decoration:none; font-size:14px; font-weight:700; border:1px solid rgba(2,131,141,0.1);">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#02838D" stroke-width="2"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
                Chat
            </a>
            <a href="{{ route('mood') }}" style="display:flex; align-items:center; gap:12px; padding:12px 16px; background:transparent; border-radius:12px; color:#5B5758; text-decoration:none; font-size:14px; font-weight:600; transition:all 0.2s;" onmouseover="this.style.color='#02838D'; this.style.background='#F3FBFC';" onmouseout="this.style.color='#5B5758'; this.style.background='transparent';">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/></svg>
                Mood Tracking
            </a>
            <a href="#" style="display:flex; align-items:center; gap:12px; padding:12px 16px; background:transparent; border-radius:12px; color:#5B5758; text-decoration:none; font-size:14px; font-weight:600; transition:all 0.2s;" onmouseover="this.style.color='#02838D'; this.style.background='#F3FBFC';" onmouseout="this.style.color='#5B5758'; this.style.background='transparent';">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 2L2 7l10 5 10-5-10-5z"/><path d="M2 17l10 5 10-5"/><path d="M2 12l10 5 10-5"/></svg>
                Resource Center
            </a>
        </nav>

        {{-- Session History --}}
        <div style="margin-top:32px;">
            <p style="font-size:11px; font-weight:800; color:#9CA3AF; text-transform:uppercase; letter-spacing:0.08em; margin:0 0 12px; padding:0 12px;">RIWAYAT</p>
            <div style="display:flex; flex-direction:column; gap:4px;">
                <div style="display:flex; align-items:center; gap:10px; padding:10px 12px; background:#F3FBFC; border-radius:10px; font-size:13px; color:#02838D; font-weight:600; cursor:pointer;">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#02838D" stroke-width="2"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
                    Sesi Aktif
                    <div style="width:6px; height:6px; border-radius:50%; background:#02838D; margin-left:auto;"></div>
                </div>
                <div style="display:flex; align-items:center; gap:10px; padding:10px 12px; border-radius:10px; font-size:13px; color:#5B5758; cursor:pointer;" onmouseover="this.style.color='#02838D'; this.style.background='#F9FAFB';" onmouseout="this.style.color='#5B5758'; this.style.background='transparent';">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
                    cuaca mendung gini bikin ...
                </div>
                <div style="display:flex; align-items:center; gap:10px; padding:10px 12px; border-radius:10px; font-size:13px; color:#5B5758; cursor:pointer;" onmouseover="this.style.color='#02838D'; this.style.background='#F9FAFB';" onmouseout="this.style.color='#5B5758'; this.style.background='transparent';">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
                    aku hari ini "Dibantai tu...
                </div>
            </div>
        </div>

        {{-- User & Logout --}}
        <div style="margin-top:auto; padding-top:24px; border-top:1px solid #E5E7EB; display:flex; align-items:center; justify-content:space-between; padding-bottom:8px;">
            <div style="display:flex; align-items:center; gap:12px;">
                <div style="width:36px; height:36px; border-radius:8px; background:#F3FBFC; border:1px solid #E5E7EB; display:flex; align-items:center; justify-content:center; flex-shrink:0;">
                    <span style="color:#02838D; font-size:14px; font-weight:800;">M</span>
                </div>
                <div>
                    <p style="font-size:14px; font-weight:700; color:#231F20; margin:0; line-height:1.2;">Mahasiswa Demo</p>
                    <p style="font-size:12px; color:#5B5758; margin:0;">demo@aether.ai</p>
                </div>
            </div>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" style="background:none; border:none; cursor:pointer; color:#9CA3AF;" title="Keluar" onmouseover="this.style.color='#D92D20';" onmouseout="this.style.color='#9CA3AF';">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 21H5a2 2 0 01-2-2V5a2 2 0 012-2h4M16 17l5-5-5-5M21 12H9"/></svg>
                </button>
            </form>
        </div>
    </aside>

    {{-- ░░ CENTER: CHAT AREA ░░ --}}
    <main style="flex:1; display:flex; flex-direction:column; height:100vh; position:relative; z-index:10; margin-left:272px; margin-right:320px;" id="chat-main">
        
        {{-- Messages Container --}}
        <div id="messages-container" style="flex:1; overflow-y:auto; padding:32px 40px; display:flex; flex-direction:column; gap:32px; scroll-behavior:smooth;">
            {{-- Messages will be injected here by JS --}}
            <div id="messages-list" style="display:flex; flex-direction:column; gap:32px;"></div>

            {{-- Typing indicator --}}
            <div id="typing-indicator" style="display:none; align-items:flex-start; gap:16px;">
                <div style="width:36px; height:36px; border-radius:50%; background:linear-gradient(135deg, #02838D, #4FAFB6); display:flex; align-items:center; justify-content:center; flex-shrink:0;">
                    <span style="color:#FFF; font-weight:900; font-family:'Playfair Display', serif; font-size:16px;">Æ</span>
                </div>
                <div style="background:#FFFFFF; border:1px solid #E5E7EB; border-radius:8px 24px 24px 24px; padding:16px 20px; display:flex; gap:6px; align-items:center; box-shadow:0 4px 14px rgba(0,0,0,0.03);">
                    <div style="width:6px; height:6px; border-radius:50%; background:#9CA3AF; animation:bounce 1.4s infinite ease-in-out both;"></div>
                    <div style="width:6px; height:6px; border-radius:50%; background:#9CA3AF; animation:bounce 1.4s infinite ease-in-out both; animation-delay:0.16s;"></div>
                    <div style="width:6px; height:6px; border-radius:50%; background:#9CA3AF; animation:bounce 1.4s infinite ease-in-out both; animation-delay:0.32s;"></div>
                </div>
            </div>
        </div>

        {{-- Message Input --}}
        <div style="padding:24px 40px 32px;">
            <form id="chat-form" onsubmit="sendMessage(event)" style="position:relative;">
                <textarea id="message-input"
                    placeholder="Ceritakan apa yang kamu rasakan..."
                    rows="1"
                    style="width:100%; resize:none; background:#F9FAFB; border:1px solid #E5E7EB; border-radius:16px; padding:18px 60px 18px 20px; font-size:15px; font-family:'Nunito',sans-serif; color:#231F20; outline:none; transition:border-color 0.2s ease, box-shadow 0.2s ease; line-height:1.5; max-height:160px; overflow-y:auto; box-sizing:border-box;"
                    onfocus="this.style.borderColor='#02838D'; this.style.boxShadow='0 0 0 3px rgba(2,131,141,0.1)';"
                    onblur="this.style.borderColor='#E5E7EB'; this.style.boxShadow='none';"
                    onkeydown="handleEnter(event)"
                    oninput="autoResize(this); updateSendBtn();"
                ></textarea>
                <div style="position:absolute; left:20px; bottom:-22px; display:flex; align-items:center; gap:8px;">
                    <span style="font-size:11px; color:#9CA3AF;">0/500 · Enter untuk kirim</span>
                </div>
                <button type="submit" id="send-btn" style="position:absolute; right:12px; bottom:12px; height:36px; width:36px; padding:0; border-radius:10px; background:#F3FBFC; border:1px solid #E5E7EB; display:flex; align-items:center; justify-content:center; color:#9CA3AF; cursor:pointer; transition:all 0.2s;" disabled>
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="22" y1="2" x2="11" y2="13"/><polygon points="22 2 15 22 11 13 2 9 22 2"/></svg>
                </button>
            </form>
        </div>
    </main>

    {{-- ░░ RIGHT PANEL ░░ --}}
    <aside id="right-panel" style="position:fixed; top:0; right:0; bottom:0; width:320px; background:#FAFAFA; border-left:1px solid #E5E7EB; display:flex; flex-direction:column; padding:24px; z-index:40; overflow-y:auto;">
        
        {{-- Status Block --}}
        <div style="background:#FFFFFF; border:1px solid #E5E7EB; border-radius:16px; padding:24px; margin-bottom:24px; text-align:center; box-shadow:0 4px 12px rgba(0,0,0,0.02);">
            <h2 id="status-title" style="font-size:24px; font-weight:800; color:#10B981; margin:0 0 8px;">Stabil</h2>
            <p style="font-size:12px; color:#5B5758; margin:0 0 20px;">Skor: <strong id="status-score" style="color:#231F20;">5</strong> / 100</p>
            
            <div style="display:flex; justify-content:space-between; margin-bottom:8px; font-size:11px; color:#9CA3AF;">
                <span>Aman</span>
                <span>Distress</span>
                <span>Krisis</span>
            </div>
            
            <div style="height:6px; background:#F3F4F6; border-radius:3px; position:relative; margin-bottom:8px;">
                <div id="status-bar" style="position:absolute; left:0; top:0; bottom:0; width:5%; background:#10B981; border-radius:3px; transition:width 0.5s ease;"></div>
            </div>
            
            <div style="display:flex; justify-content:space-between; font-size:11px; color:#9CA3AF; margin-bottom:16px;">
                <span>0</span>
                <span style="color:#EAB308;">35</span>
                <span style="color:#EF4444;">70</span>
                <span>100</span>
            </div>
            
            <div style="display:inline-flex; align-items:center; gap:6px; padding:4px 12px; background:rgba(16,185,129,0.1); border:1px solid rgba(16,185,129,0.2); border-radius:99px;">
                <div style="width:6px; height:6px; border-radius:50%; background:#10B981;"></div>
                <span id="status-badge" style="font-size:11px; font-weight:700; color:#10B981;">Stabil (5)</span>
            </div>
        </div>

        {{-- Panel Analisis --}}
        <div style="background:#FFFFFF; border:1px solid #E5E7EB; border-radius:16px; padding:20px 20px 10px; margin-bottom:24px; box-shadow:0 4px 12px rgba(0,0,0,0.02);">
            <h3 style="font-size:11px; font-weight:800; color:#9CA3AF; margin:0 0 16px; display:flex; align-items:center; gap:8px; text-transform:uppercase;">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#02838D" stroke-width="2"><path d="M22 12h-4l-3 9L9 3l-3 9H2"/></svg>
                PANEL ANALISIS
            </h3>
            
            <div style="display:flex; flex-direction:column; gap:12px;">
                <div style="display:flex; justify-content:space-between; align-items:center; font-size:12px;">
                    <div style="display:flex; align-items:center; gap:8px;">
                        <div style="width:6px; height:6px; border-radius:50%; background:#02838D;"></div>
                        <span style="color:#5B5758;">Kategori Masalah</span>
                    </div>
                    <span id="analysis-category" style="color:#231F20; font-weight:700;">--</span>
                </div>
                <div style="display:flex; justify-content:space-between; align-items:center; font-size:12px;">
                    <div style="display:flex; align-items:center; gap:8px;">
                        <div style="width:6px; height:6px; border-radius:50%; background:#06B6D4;"></div>
                        <span style="color:#5B5758;">Kedalaman Emosi</span>
                    </div>
                    <span id="analysis-depth" style="color:#06B6D4; font-weight:800;">Rendah</span>
                </div>
                <div style="display:flex; justify-content:space-between; align-items:center; font-size:12px;">
                    <div style="display:flex; align-items:center; gap:8px;">
                        <div style="width:6px; height:6px; border-radius:50%; background:#10B981;"></div>
                        <span style="color:#5B5758;">Indikator Risiko</span>
                    </div>
                    <span id="analysis-risk" style="color:#10B981; font-weight:800;">Tidak ada</span>
                </div>
                <div style="display:flex; justify-content:space-between; align-items:center; font-size:12px;">
                    <div style="display:flex; align-items:center; gap:8px;">
                        <div style="width:6px; height:6px; border-radius:50%; background:#9CA3AF;"></div>
                        <span style="color:#5B5758;">Total Skor</span>
                    </div>
                    <span id="analysis-score" style="color:#231F20; font-weight:700;">--</span>
                </div>
            </div>
            <div style="height:10px;"></div>
        </div>

        {{-- Rekomendasi --}}
        <div style="margin-bottom:24px;">
            <p style="font-size:11px; font-weight:700; text-transform:uppercase; color:#9CA3AF; margin:0 0 10px;">Rekomendasi</p>
            <div style="background:rgba(16,185,129,0.05); border:1px solid rgba(16,185,129,0.2); border-radius:12px; padding:16px;">
                <p id="rekomendasi-text" style="font-size:12px; color:#10B981; margin:0; line-height:1.5; font-weight:600;">Kondisimu terlihat stabil. Pertahankan kebiasaan positifmu dan tetap jaga kesehatan mentalmu. 💚</p>
            </div>
        </div>

        {{-- Tips --}}
        <div style="margin-top:auto;">
            <p style="font-size:11px; font-weight:800; color:#9CA3AF; text-transform:uppercase; margin:0 0 8px;">TIPS HARI INI</p>
            <p id="daily-tip" style="font-size:12px; color:#5B5758; margin:0; font-style:italic; line-height:1.5;"></p>
        </div>
    </aside>

</div>

<style>
@keyframes bounce {
  0%, 100% { transform: translateY(0); }
  50% { transform: translateY(-4px); }
}
::-webkit-scrollbar {
    width: 6px;
    height: 6px;
}
::-webkit-scrollbar-track {
    background: transparent; 
}
::-webkit-scrollbar-thumb {
    background: #E5E7EB; 
    border-radius: 10px;
}
::-webkit-scrollbar-thumb:hover {
    background: #D1D5DB; 
}
</style>
@endsection

@push('scripts')
<script>
const tips = [
    'Istirahat 5 menit setiap jam bisa mencegah burnout akademik.',
    'Menulis jurnal harian membantu mengenali pola emosi negatif.',
    'Berbicara dengan orang terpercaya lebih efektif dari memendam sendiri.',
    'Tidur 7-8 jam sangat berpengaruh pada regulasi emosi.',
    'Bergerak ringan seperti jalan kaki terbukti menurunkan kecemasan.',
    'Nafas dalam selama 4 hitungan dapat menenangkan sistem saraf.',
    'Syukuri 3 hal kecil hari ini untuk melatih pola pikir positif.',
];
document.getElementById('daily-tip').textContent = `"${tips[new Date().getDay() % tips.length]}"`;

let messages = [];
const AI_ENDPOINT = '/chat/analyze';

function renderMessage(role, text, time = null, badgeData = null) {
    const list = document.getElementById('messages-list');

    const wrap = document.createElement('div');
    wrap.style.cssText = `display:flex; align-items:flex-start; gap:16px; ${role === 'user' ? 'flex-direction:row-reverse;' : ''}`;

    // Avatar
    const avatar = document.createElement('div');
    avatar.style.cssText = 'width:36px; height:36px; border-radius:50%; display:flex; align-items:center; justify-content:center; flex-shrink:0; border:1px solid #E5E7EB; box-shadow:0 2px 4px rgba(0,0,0,0.02); margin-top: 10px;';
    
    if(role === 'user') {
        avatar.style.background = '#F9FAFB';
        avatar.innerHTML = '<span style="color:#138A96; font-size:14px; font-weight:800;">M</span>';
    } else {
        avatar.style.background = '#138A96';
        avatar.innerHTML = '<span style="color:#FFF; font-weight:900; font-family:\'Playfair Display\', serif; font-size:16px;">Æ</span>';
    }

    // Msg Column
    const msgCol = document.createElement('div');
    msgCol.style.cssText = `display:flex; flex-direction:column; max-width:80%; ${role === 'user' ? 'align-items:flex-end;' : 'align-items:flex-start;'}`;

    // Bubble
    const bubble = document.createElement('div');
    if (role === 'user') {
        bubble.style.cssText = 'background:#138A96; color:#FFFFFF; border-radius:20px 20px 4px 20px; padding:16px 20px; font-size:14px; line-height:1.5; margin-bottom:6px;';
    } else {
        bubble.style.cssText = 'background:#FFFFFF; color:#231F20; border-radius:4px 20px 20px 20px; padding:16px 20px; font-size:14px; line-height:1.6; margin-bottom:6px; border:1px solid #E5E7EB;';
    }
    // format text (bolding **text**)
    let formattedText = text.replace(/\*\*(.*?)\*\*/g, '<strong>$1</strong>');
    formattedText = formattedText.replace(/\n/g, '<br>');
    bubble.innerHTML = formattedText;

    // Time & Badge
    const timeWrap = document.createElement('div');
    timeWrap.style.cssText = `display:flex; align-items:center; gap:8px; color:#9CA3AF; font-size:11px;`;
    
    const timeEl = document.createElement('span');
    timeEl.textContent = time || new Date().toLocaleTimeString('id-ID', {hour:'2-digit', minute:'2-digit'});
    
    timeWrap.appendChild(timeEl);

    // If AI, add badge
    if (role === 'ai') {
        const badge = document.createElement('div');
        if (badgeData) {
            badge.style.cssText = `display:inline-flex; align-items:center; gap:4px; padding:2px 8px; background:rgba(${badgeData.rgb},0.1); border:1px solid rgba(${badgeData.rgb},0.2); border-radius:99px;`;
            badge.innerHTML = `<div style="width:5px; height:5px; border-radius:50%; background:${badgeData.color};"></div><span style="font-weight:700; color:${badgeData.color}; font-size:10px;">${badgeData.label}</span>`;
        } else {
            badge.style.cssText = 'display:inline-flex; align-items:center; gap:4px; padding:2px 8px; background:rgba(16,185,129,0.1); border:1px solid rgba(16,185,129,0.2); border-radius:99px;';
            badge.innerHTML = '<div style="width:5px; height:5px; border-radius:50%; background:#10B981;"></div><span style="font-weight:700; color:#10B981; font-size:10px;">Memproses</span>';
        }
        timeWrap.appendChild(badge);
    } else {
        timeWrap.style.flexDirection = 'row-reverse';
    }

    msgCol.appendChild(bubble);
    msgCol.appendChild(timeWrap);

    wrap.appendChild(avatar);
    wrap.appendChild(msgCol);
    list.appendChild(wrap);

    const container = document.getElementById('messages-container');
    container.scrollTop = container.scrollHeight;
}

async function sendMessage(e) {
    if (e) e.preventDefault();
    const input = document.getElementById('message-input');
    const text = input.value.trim();
    if (!text) return;

    input.value = '';
    input.style.height = 'auto';
    updateSendBtn();

    renderMessage('user', text);
    messages.push({ role: 'user', content: text });

    const typing = document.getElementById('typing-indicator');
    typing.style.display = 'flex';
    const container = document.getElementById('messages-container');
    container.scrollTop = container.scrollHeight;

    try {
        const token = document.querySelector('meta[name="csrf-token"]')?.content || '';
        const res = await fetch(AI_ENDPOINT, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': token,
                'Accept': 'application/json',
                'Authorization': `Bearer ${localStorage.getItem('auth_token') || ''}`,
            },
            body: JSON.stringify({ message: text })
        });

        typing.style.display = 'none';

        if (res.ok) {
            const data = await res.json();
            const reply = data.ai_response || data.response || data.message || data.reply || 'Memproses...';
            
            let statusLabel = 'Stabil';
            let statusColor = '#10B981';
            let statusRgb = '16,185,129';
            if (data.indikator === 'Kuning') {
                statusLabel = 'Distress'; statusColor = '#EAB308'; statusRgb = '234,179,8';
            } else if (data.indikator === 'Merah') {
                statusLabel = 'Krisis'; statusColor = '#EF4444'; statusRgb = '239,68,68';
            }
            
            const badgeData = {
                label: `${statusLabel} (${data.total_skor || 0})`,
                color: statusColor,
                rgb: statusRgb
            };
            
            let formattedReply = reply;
            if (data.total_skor !== undefined && data.indikator) {
                 const emoji = data.indikator === 'Hijau' ? '🟢' : (data.indikator === 'Kuning' ? '🟡' : '🔴');
                 formattedReply += `\n\n---\n📊 **Analisis Keluhan & Poin Emosi:**\n• Keluhan tercatat: +${data.total_skor} Poin\n\n**Total Skor: ${data.total_skor} (${data.indikator} ${emoji})**`;
            }

            renderMessage('ai', formattedReply, null, badgeData);
            messages.push({ role: 'ai', content: formattedReply });
            updateDashboard(data);
        } else {
            renderMessage('ai', 'Maaf, ada gangguan sementara.');
        }
    } catch (err) {
        typing.style.display = 'none';
        renderMessage('ai', 'Sepertinya ada masalah koneksi.');
    }
}

function autoResize(el) {
    el.style.height = 'auto';
    el.style.height = Math.min(el.scrollHeight, 160) + 'px';
}

function updateSendBtn() {
    const btn = document.getElementById('send-btn');
    const val = document.getElementById('message-input').value.trim();
    if (val) {
        btn.disabled = false;
        btn.style.background = '#02838D';
        btn.style.color = '#FFF';
        btn.style.borderColor = '#02838D';
        btn.style.boxShadow = '0 4px 12px rgba(2,131,141,0.2)';
    } else {
        btn.disabled = true;
        btn.style.background = '#F3FBFC';
        btn.style.color = '#9CA3AF';
        btn.style.borderColor = '#E5E7EB';
        btn.style.boxShadow = 'none';
    }
}

function handleEnter(e) {
    if (e.key === 'Enter' && !e.shiftKey) {
        e.preventDefault();
        if (document.getElementById('message-input').value.trim()) sendMessage(null);
    }
}

// ── Interactive Dashboard Update ──
function updateDashboard(data) {
    if (!data) return;
    
    // Default Stabil
    let status = 'Stabil';
    let score = data.total_skor !== undefined ? data.total_skor : 5;
    let color = '#10B981'; // Green
    let cat = 'Umum';
    let depth = 'Rendah';
    let depthColor = '#06B6D4';
    let risk = 'Tidak ada';
    let riskColor = '#10B981';
    let rec = 'Kondisimu terlihat stabil. Pertahankan kebiasaan positifmu dan tetap jaga kesehatan mentalmu. 💚';

    if (data.indikator === 'Kuning') {
        status = 'Distress';
        color = '#EAB308'; // Yellow/Amber
        cat = 'Beban Menengah';
        depth = 'Sedang';
        depthColor = '#EAB308';
        rec = 'Sepertinya kamu butuh istirahat sejenak. Coba tenangkan pikiran atau ngobrol dengan orang terdekat.';
    } else if (data.indikator === 'Merah') {
        status = 'Krisis';
        color = '#EF4444'; // Red
        cat = 'Krisis Emosional';
        depth = 'Sangat Tinggi';
        depthColor = '#EF4444';
        risk = 'Tinggi';
        riskColor = '#EF4444';
        rec = 'Keselamatanmu yang utama. Tolong segera hubungi hotline profesional (119 ext 8).';
    }

    document.getElementById('status-title').textContent = status;
    document.getElementById('status-title').style.color = color;
    document.getElementById('status-score').textContent = score;
    document.getElementById('status-bar').style.width = score + '%';
    document.getElementById('status-bar').style.background = color;
    
    const badge = document.getElementById('status-badge');
    badge.textContent = `${status} (${score})`;
    badge.style.color = color;
    badge.previousElementSibling.style.background = color;
    badge.parentElement.style.background = `rgba(${color === '#10B981' ? '16,185,129' : (color === '#EAB308' ? '234,179,8' : '239,68,68')}, 0.1)`;
    badge.parentElement.style.borderColor = `rgba(${color === '#10B981' ? '16,185,129' : (color === '#EAB308' ? '234,179,8' : '239,68,68')}, 0.2)`;

    document.getElementById('analysis-category').textContent = cat;
    document.getElementById('analysis-depth').textContent = depth;
    document.getElementById('analysis-depth').style.color = depthColor;
    document.getElementById('analysis-risk').textContent = risk;
    document.getElementById('analysis-risk').style.color = riskColor;
    document.getElementById('analysis-score').textContent = score;

    const recEl = document.getElementById('rekomendasi-text');
    recEl.textContent = rec;
    recEl.style.color = color;
    recEl.parentElement.style.background = `rgba(${color === '#10B981' ? '16,185,129' : (color === '#EAB308' ? '234,179,8' : '239,68,68')}, 0.05)`;
    recEl.parentElement.style.borderColor = `rgba(${color === '#10B981' ? '16,185,129' : (color === '#EAB308' ? '234,179,8' : '239,68,68')}, 0.2)`;
}

// Initial Data is empty, wait for user input.

function newSession() {
    document.getElementById('messages-list').innerHTML = '';
    messages = [];
}
</script>
@endpush
