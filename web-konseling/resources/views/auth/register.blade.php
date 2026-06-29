@extends('layouts.auth')

@section('title', 'Daftar — Aether Mental Health AI')
@section('meta_description', 'Buat akun Aether dan mulai perjalanan kesehatan mentalmu bersama AI.')

@section('content')
<div style="min-height:100vh; display:flex; align-items:flex-start; justify-content:center; padding:24px; font-family:'Nunito',sans-serif; position:relative; overflow:hidden; background:#011F22;">

    {{-- â–‘â–‘ ANIMATED BACKGROUND â–‘â–‘ --}}
    <div style="position:absolute; inset:0; pointer-events:none; overflow:hidden;">
        {{-- Primary gradient --}}
        <div style="position:absolute; inset:0; background:radial-gradient(ellipse 80% 60% at 50% 0%, rgba(2,131,141,0.4) 0%, transparent 60%);"></div>
        <div style="position:absolute; inset:0; background:radial-gradient(ellipse 60% 80% at 80% 100%, rgba(1,108,117,0.35) 0%, transparent 60%);"></div>
        <div style="position:absolute; inset:0; background:radial-gradient(ellipse 50% 50% at 10% 80%, rgba(79,175,182,0.2) 0%, transparent 60%);"></div>

        {{-- Floating orbs --}}
        <div style="position:absolute; top:-120px; left:-80px; width:400px; height:400px; border-radius:50%; background:radial-gradient(circle, rgba(2,131,141,0.25) 0%, transparent 70%); animation:floatDiagonal 12s ease-in-out infinite;"></div>
        <div style="position:absolute; bottom:-100px; right:-60px; width:350px; height:350px; border-radius:50%; background:radial-gradient(circle, rgba(79,175,182,0.2) 0%, transparent 70%); animation:floatDiagonal 10s ease-in-out infinite reverse;"></div>
        <div style="position:absolute; top:40%; left:5%; width:200px; height:200px; border-radius:50%; background:radial-gradient(circle, rgba(2,131,141,0.15) 0%, transparent 70%); animation:floatUp 8s ease-in-out infinite;"></div>
        <div style="position:absolute; top:15%; right:8%; width:160px; height:160px; border-radius:50%; background:radial-gradient(circle, rgba(124,58,237,0.1) 0%, transparent 70%); animation:floatDown 9s ease-in-out infinite;"></div>

        {{-- Grid pattern --}}
        <div style="position:absolute; inset:0; background-image:linear-gradient(rgba(255,255,255,0.03) 1px, transparent 1px), linear-gradient(90deg, rgba(255,255,255,0.03) 1px, transparent 1px); background-size:60px 60px;"></div>

        {{-- Floating particles --}}
        <div style="position:absolute; top:20%; left:20%; width:5px; height:5px; border-radius:50%; background:#4FAFB6; box-shadow:0 0 12px rgba(79,175,182,0.8); animation:pulseSoft 2s ease-in-out infinite;"></div>
        <div style="position:absolute; top:70%; left:15%; width:7px; height:7px; border-radius:50%; background:#02838D; box-shadow:0 0 16px rgba(2,131,141,0.8); animation:pulseSoft 3s ease-in-out 0.5s infinite;"></div>
        <div style="position:absolute; top:30%; right:12%; width:5px; height:5px; border-radius:50%; background:#7C3AED; box-shadow:0 0 12px rgba(124,58,237,0.8); animation:pulseSoft 2.5s ease-in-out 1s infinite;"></div>
        <div style="position:absolute; top:80%; right:20%; width:4px; height:4px; border-radius:50%; background:#F59E0B; box-shadow:0 0 10px rgba(245,158,11,0.8); animation:pulseSoft 2s ease-in-out 1.5s infinite;"></div>
        <div style="position:absolute; top:55%; left:40%; width:4px; height:4px; border-radius:50%; background:#FFFFFF; box-shadow:0 0 8px rgba(255,255,255,0.6); animation:pulseSoft 3.5s ease-in-out 0.8s infinite; opacity:0.5;"></div>
        <div style="position:absolute; top:10%; right:35%; width:6px; height:6px; border-radius:50%; background:#4FAFB6; box-shadow:0 0 14px rgba(79,175,182,0.7); animation:pulseSoft 2.8s ease-in-out 0.3s infinite;"></div>
    </div>

    {{-- â–‘â–‘ MAIN CARD FRAME â–‘â–‘ --}}
    <div style="width:100%; max-width:960px; background:rgba(255,255,255,0.97); border-radius:28px; overflow:hidden; box-shadow:0 32px 80px rgba(0,0,0,0.4), 0 0 0 1px rgba(255,255,255,0.1); display:grid; grid-template-columns:1fr 1fr; position:relative; z-index:10;" id="auth-card">

        {{-- â–‘â–‘ LEFT PANEL: Branding & Visual â–‘â–‘ --}}
        <div id="auth-left-panel" style="background:linear-gradient(160deg, #02838D 0%, #016C75 50%, #011F22 100%); padding:48px 40px; display:flex; flex-direction:column; justify-content:space-between; position:relative; overflow:hidden;">

            {{-- Left panel decorations --}}
            <div style="position:absolute; inset:0; pointer-events:none;">
                <div style="position:absolute; top:-60px; right:-60px; width:220px; height:220px; border-radius:50%; background:rgba(255,255,255,0.06); animation:spinSlow 20s linear infinite;"></div>
                <div style="position:absolute; bottom:-40px; left:-40px; width:180px; height:180px; border-radius:50%; background:rgba(255,255,255,0.04);"></div>
                <div style="position:absolute; top:50%; left:50%; transform:translate(-50%,-50%); width:320px; height:320px; border:1px dashed rgba(255,255,255,0.1); border-radius:50%; animation:spinSlow 30s linear infinite reverse;"></div>
                <div style="position:absolute; top:50%; left:50%; transform:translate(-50%,-50%); width:220px; height:220px; border:1px solid rgba(255,255,255,0.06); border-radius:50%;"></div>
            </div>

            {{-- Logo & brand --}}
            <div style="position:relative; z-index:2;">
                <div style="display:flex; align-items:flex-start; gap:10px; margin-bottom:48px;">
                    <div style="width:38px; height:38px; border-radius:10px; background:rgba(255,255,255,0.15); border:1px solid rgba(255,255,255,0.25); display:flex; align-items:flex-start; justify-content:center;">
                        <img src="{{ asset('AE.png') }}" alt="Aether" style="width:22px; height:22px; object-fit:contain; filter:brightness(0) invert(1);">
                    </div>
                    <span style="font-family:'Playfair Display',serif; font-weight:800; font-size:20px; color:#FFFFFF; letter-spacing:-0.01em;">Aether<span style="color:rgba(255,255,255,0.5);">.AI</span></span>
                </div>

                {{-- Chat mockup preview --}}
                <div style="background:rgba(255,255,255,0.08); border:1px solid rgba(255,255,255,0.12); border-radius:20px; overflow:hidden; backdrop-filter:blur(10px); margin-bottom:32px;">
                    {{-- Chat header mini --}}
                    <div style="padding:12px 16px; border-bottom:1px solid rgba(255,255,255,0.08); display:flex; align-items:flex-start; gap:10px;">
                        <div style="width:28px; height:28px; border-radius:50%; background:rgba(255,255,255,0.15); border:1px solid rgba(255,255,255,0.25); display:flex; align-items:flex-start; justify-content:center;">
                            <img src="{{ asset('AE.png') }}" alt="AI" style="width:16px; height:16px; object-fit:contain; filter:brightness(0) invert(1);">
                        </div>
                        <div>
                            <div style="font-size:12px; font-weight:800; color:#FFFFFF; line-height:1;">Aether AI</div>
                            <div style="font-size:10px; color:rgba(255,255,255,0.6); display:flex; align-items:flex-start; gap:4px; margin-top:2px;">
                                <span style="width:5px; height:5px; border-radius:50%; background:#6EE7B7; display:inline-block; animation:pulseSoft 2s ease-in-out infinite;"></span>Online
                            </div>
                        </div>
                        <div style="margin-left:auto;">
                            <div style="display:flex; gap:5px;">
                                <div style="width:7px; height:7px; border-radius:50%; background:rgba(255,255,255,0.3);"></div>
                                <div style="width:7px; height:7px; border-radius:50%; background:rgba(255,255,255,0.3);"></div>
                                <div style="width:7px; height:7px; border-radius:50%; background:rgba(255,255,255,0.3);"></div>
                            </div>
                        </div>
                    </div>
                    {{-- Messages --}}
                    <div style="padding:14px 16px; display:flex; flex-direction:column; gap:10px;">
                        <div style="display:flex; justify-content:flex-end;">
                            <div style="background:rgba(255,255,255,0.2); color:#FFFFFF; border-radius:14px 14px 4px 14px; padding:8px 12px; font-size:12px; max-width:80%; line-height:1.4;">
                                Aku lagi ngerasa overwhelmed banget
                            </div>
                        </div>
                        <div style="display:flex; gap:7px; align-items:flex-end;">
                            <div style="width:20px; height:20px; border-radius:50%; background:rgba(255,255,255,0.15); display:flex; align-items:flex-start; justify-content:center; flex-shrink:0;">
                                <img src="{{ asset('AE.png') }}" alt="AI" style="width:11px; height:11px; object-fit:contain; filter:brightness(0) invert(1);">
                            </div>
                            <div style="background:rgba(255,255,255,0.12); border:1px solid rgba(255,255,255,0.1); color:rgba(255,255,255,0.9); border-radius:14px 14px 14px 4px; padding:8px 12px; font-size:12px; max-width:80%; line-height:1.4;">
                                Aku di sini untukmu. Mau cerita apa yang sedang terjadi?
                            </div>
                        </div>
                        {{-- Typing dots --}}
                        <div style="display:flex; gap:7px; align-items:flex-end;">
                            <div style="width:20px; height:20px; border-radius:50%; background:rgba(255,255,255,0.15); display:flex; align-items:flex-start; justify-content:center; flex-shrink:0;">
                                <img src="{{ asset('AE.png') }}" alt="AI" style="width:11px; height:11px; object-fit:contain; filter:brightness(0) invert(1);">
                            </div>
                            <div style="background:rgba(255,255,255,0.12); border:1px solid rgba(255,255,255,0.1); border-radius:14px 14px 14px 4px; padding:10px 14px; display:flex; align-items:flex-start; gap:4px;">
                                <span style="width:5px; height:5px; border-radius:50%; background:#6EE7B7; display:inline-block; animation:pulseSoft 1.2s ease-in-out infinite;"></span>
                                <span style="width:5px; height:5px; border-radius:50%; background:#6EE7B7; display:inline-block; animation:pulseSoft 1.2s ease-in-out 0.35s infinite;"></span>
                                <span style="width:5px; height:5px; border-radius:50%; background:#6EE7B7; display:inline-block; animation:pulseSoft 1.2s ease-in-out 0.7s infinite;"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Bottom quote --}}
            <div style="position:relative; z-index:2;">
                <p style="font-size:17px; font-weight:700; font-style:italic; color:#FFFFFF; line-height:1.5; margin:0 0 16px;">
                    "Kamu tidak harus menghadapi semuanya sendirian."
                </p>
                <div style="display:flex; align-items:flex-start; gap:10px;">
                    <span style="width:24px; height:2px; background:rgba(255,255,255,0.4); display:block; border-radius:2px;"></span>
                    <span style="font-size:12px; font-weight:700; color:rgba(255,255,255,0.6); letter-spacing:0.08em; text-transform:uppercase;">Aether Mental Health AI</span>
                </div>

                {{-- Trust badges row --}}
                <div style="display:flex; gap:8px; margin-top:24px; flex-wrap:wrap;">
                    @foreach(['CBT Berbasis Riset', 'Data Privat', 'AI 24/7'] as $badge)
                    <span style="font-size:11px; font-weight:700; color:rgba(255,255,255,0.8); background:rgba(255,255,255,0.1); border:1px solid rgba(255,255,255,0.15); border-radius:100px; padding:4px 12px;">{{ $badge }}</span>
                    @endforeach
                </div>
            </div>
        </div>

        {{-- â–‘â–‘ RIGHT PANEL: Register Form â–‘â–‘ --}}
        <div style="padding:48px 44px; display:flex; flex-direction:column; justify-content:center; background:#FFFFFF;">

            {{-- Back link --}}
            <div style="margin-bottom:36px;">
                <a href="{{ url('/') }}" style="font-size:13px; font-weight:600; color:#5B5758; text-decoration:none; display:inline-flex; align-items:flex-start; gap:5px; transition:color 0.2s;"
                    onmouseover="this.style.color='#02838D'" onmouseout="this.style.color='#5B5758'">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M19 12H5M12 5l-7 7 7 7"/></svg>
                    Kembali ke Beranda
                </a>
            </div>

            {{-- Heading --}}
            <div style="margin-bottom:32px;">
                <h1 style="font-size:32px; font-weight:800; color:#231F20; margin:0 0 8px; line-height:1.15;">Buat Akun Baru</h1>
                <p style="font-size:15px; color:#5B5758; margin:0; line-height:1.5;">Mulai perjalanan emosionalmu bersama AI.</p>
            </div>

            {{-- Flash Messages --}}
            @if (session('error'))
                <div style="display:flex; align-items:flex-start; gap:10px; background:rgba(217,45,32,0.06); border:1px solid rgba(217,45,32,0.2); border-radius:12px; padding:12px 16px; margin-bottom:20px; font-size:14px; color:#B91C1C;" role="alert">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="flex-shrink:0;"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
                    {{ session('error') }}
                </div>
            @endif
            @if (session('success'))
                <div style="display:flex; align-items:flex-start; gap:10px; background:rgba(16,185,129,0.06); border:1px solid rgba(16,185,129,0.2); border-radius:12px; padding:12px 16px; margin-bottom:20px; font-size:14px; color:#065F46;" role="alert">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="flex-shrink:0;"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                    {{ session('success') }}
                </div>
            @endif

            {{-- Validation errors --}}
            @if ($errors->any())
                <div style="display:flex; align-items:flex-start; gap:10px; background:rgba(217,45,32,0.06); border:1px solid rgba(217,45,32,0.2); border-radius:12px; padding:12px 16px; margin-bottom:20px; font-size:14px; color:#B91C1C;" role="alert">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="flex-shrink:0;"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
                    {{ $errors->first() }}
                </div>
            @endif

            {{-- Register Form --}}
            <form action="{{ route('register.post') }}" method="POST" id="register-form">
                @csrf

                {{-- Full Name field --}}
                <div style="margin-bottom:20px;">
                    <label for="name" style="display:block; font-size:12px; font-weight:700; color:#5B5758; text-transform:uppercase; letter-spacing:0.08em; margin-bottom:8px;">Nama Lengkap</label>
                    <div style="position:relative;">
                        <span style="position:absolute; left:14px; top:50%; transform:translateY(-50%); color:#9CA3AF; display:flex;">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                        </span>
                        <input id="name" name="name" type="text" required autocomplete="name"
                            value="{{ old('name') }}" placeholder="Nama kamu"
                            style="width:100%; padding:12px 14px 12px 42px; border:1.5px solid #E5E7EB; border-radius:12px; font-size:14px; font-family:'Nunito',sans-serif; color:#231F20; background:#FAFAFA; outline:none; transition:border-color 0.2s, box-shadow 0.2s; box-sizing:border-box;"
                            onfocus="this.style.borderColor='#02838D'; this.style.boxShadow='0 0 0 3px rgba(2,131,141,0.1)'; this.style.background='#FFFFFF';"
                            onblur="this.style.borderColor='#E5E7EB'; this.style.boxShadow='none'; this.style.background='#FAFAFA';">
                    </div>
                </div>

                {{-- Email field --}}
                <div style="margin-bottom:20px;">
                    <label for="email" style="display:block; font-size:12px; font-weight:700; color:#5B5758; text-transform:uppercase; letter-spacing:0.08em; margin-bottom:8px;">Email</label>
                    <div style="position:relative;">
                        <span style="position:absolute; left:14px; top:50%; transform:translateY(-50%); color:#9CA3AF; display:flex;">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                        </span>
                        <input id="email" name="email" type="email" required autocomplete="email"
                            value="{{ old('email') }}" placeholder="nama@email.com"
                            style="width:100%; padding:12px 14px 12px 42px; border:1.5px solid #E5E7EB; border-radius:12px; font-size:14px; font-family:'Nunito',sans-serif; color:#231F20; background:#FAFAFA; outline:none; transition:border-color 0.2s, box-shadow 0.2s; box-sizing:border-box;"
                            onfocus="this.style.borderColor='#02838D'; this.style.boxShadow='0 0 0 3px rgba(2,131,141,0.1)'; this.style.background='#FFFFFF';"
                            onblur="this.style.borderColor='#E5E7EB'; this.style.boxShadow='none'; this.style.background='#FAFAFA';">
                    </div>
                </div>

                {{-- Password field --}}
                <div style="margin-bottom:20px;">
                    <label for="password" style="display:block; font-size:12px; font-weight:700; color:#5B5758; text-transform:uppercase; letter-spacing:0.08em; margin-bottom:8px;">Password</label>
                    <div style="position:relative;">
                        <span style="position:absolute; left:14px; top:50%; transform:translateY(-50%); color:#9CA3AF; display:flex;">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                        </span>
                        <input id="password" name="password" type="password" required autocomplete="new-password" minlength="8"
                            placeholder="Minimal 8 karakter"
                            style="width:100%; padding:12px 42px 12px 42px; border:1.5px solid #E5E7EB; border-radius:12px; font-size:14px; font-family:'Nunito',sans-serif; color:#231F20; background:#FAFAFA; outline:none; transition:border-color 0.2s, box-shadow 0.2s; box-sizing:border-box;"
                            onfocus="this.style.borderColor='#02838D'; this.style.boxShadow='0 0 0 3px rgba(2,131,141,0.1)'; this.style.background='#FFFFFF';"
                            onblur="this.style.borderColor='#E5E7EB'; this.style.boxShadow='none'; this.style.background='#FAFAFA';"
                            oninput="updateStrength(this.value); checkMatch();">
                        <button type="button" onclick="togglePassword('password', this)"
                            style="position:absolute; right:14px; top:50%; transform:translateY(-50%); background:none; border:none; cursor:pointer; color:#9CA3AF; display:flex; padding:0;"
                            aria-label="Tampilkan password">
                            <svg id="eye-icon-password" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                        </button>
                    </div>
                    {{-- Password strength bars --}}
                    <div style="display:flex; gap:6px; margin-top:8px;" id="strength-bars">
                        <div class="pw-strength-bar" id="bar-1" style="height:4px; flex:1; border-radius:2px; background:#E5E7EB;"></div>
                        <div class="pw-strength-bar" id="bar-2" style="height:4px; flex:1; border-radius:2px; background:#E5E7EB;"></div>
                        <div class="pw-strength-bar" id="bar-3" style="height:4px; flex:1; border-radius:2px; background:#E5E7EB;"></div>
                        <div class="pw-strength-bar" id="bar-4" style="height:4px; flex:1; border-radius:2px; background:#E5E7EB;"></div>
                    </div>
                    <p id="strength-label" style="font-size:12px; color:#9CA3AF; margin:6px 0 0; font-weight:600; transition:color 0.3s ease;"></p>
                </div>

                {{-- Confirm Password field --}}
                <div style="margin-bottom:24px;">
                    <label for="password_confirmation" style="display:block; font-size:12px; font-weight:700; color:#5B5758; text-transform:uppercase; letter-spacing:0.08em; margin-bottom:8px;">Konfirmasi Password</label>
                    <div style="position:relative;">
                        <span style="position:absolute; left:14px; top:50%; transform:translateY(-50%); color:#9CA3AF; display:flex;">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                        </span>
                        <input id="password_confirmation" name="password_confirmation" type="password" required autocomplete="new-password" minlength="8"
                            placeholder="Ulangi password"
                            style="width:100%; padding:12px 42px 12px 42px; border:1.5px solid #E5E7EB; border-radius:12px; font-size:14px; font-family:'Nunito',sans-serif; color:#231F20; background:#FAFAFA; outline:none; transition:border-color 0.2s, box-shadow 0.2s; box-sizing:border-box;"
                            onfocus="this.style.borderColor='#02838D'; this.style.boxShadow='0 0 0 3px rgba(2,131,141,0.1)'; this.style.background='#FFFFFF';"
                            onblur="this.style.borderColor='#E5E7EB'; this.style.boxShadow='none'; this.style.background='#FAFAFA';"
                            oninput="checkMatch()">
                        <button type="button" onclick="togglePassword('password_confirmation', this)"
                            style="position:absolute; right:14px; top:50%; transform:translateY(-50%); background:none; border:none; cursor:pointer; color:#9CA3AF; display:flex; padding:0;"
                            aria-label="Tampilkan konfirmasi password">
                            <svg id="eye-icon-password" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                        </button>
                    </div>
                    <p id="match-label" style="font-size:12px; margin:6px 0 0; font-weight:600; display:none;"></p>
                </div>

                {{-- Terms checkbox --}}
                <div style="display:flex; align-items:flex-start; gap:12px; margin-bottom:24px;">
                    <button type="button" id="agree-btn" onclick="toggleAgree()"
                        style="width:20px; height:20px; min-width:20px; border-radius:5px; border:2px solid #E5E7EB; background:#FFFFFF; display:flex; align-items:center; justify-content:center; cursor:pointer; margin-top:2px; transition:border-color 0.2s ease, background-color 0.2s ease;"
                        aria-pressed="false" aria-label="Setujui syarat dan ketentuan">
                    </button>
                    <input type="hidden" name="agree" id="agree-input" value="0">
                    <span style="font-size:13px; color:#5B5758; line-height:1.55;">
                        Saya menyetujui <a href="#" style="color:#02838D; font-weight:700; text-decoration:none;">Syarat & Ketentuan</a> dan
                        <a href="#" style="color:#02838D; font-weight:700; text-decoration:none;">Kebijakan Privasi</a> Aether.
                    </span>
                </div>

                {{-- Submit button --}}
                <button type="submit" id="register-btn" disabled
                    style="width:100%; padding:14px; background:linear-gradient(135deg,#02838D,#016C75); color:#FFFFFF; border:none; border-radius:12px; font-size:15px; font-weight:800; font-family:'Nunito',sans-serif; display:flex; align-items:center; justify-content:center; gap:8px; transition:opacity 0.2s, transform 0.2s, box-shadow 0.2s; opacity:0.5; cursor:not-allowed;"
                    onmouseover="if(!this.disabled){this.style.opacity='0.92'; this.style.transform='translateY(-1px)'; this.style.boxShadow='0 10px 28px rgba(2,131,141,0.35)';}"
                    onmouseout="if(!this.disabled){this.style.opacity='1'; this.style.transform='translateY(0)'; this.style.boxShadow='0 6px 20px rgba(2,131,141,0.3)';}">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="8.5" cy="7" r="4"/><line x1="20" y1="8" x2="20" y2="14"/><line x1="23" y1="11" x2="17" y2="11"/></svg>
                    Buat Akun
                </button>
            </form>

            {{-- Divider --}}
            <div style="display:flex; align-items:center; gap:14px; margin:24px 0;">
                <span style="flex:1; height:1px; background:#E5E7EB; display:block;"></span>
                <span style="font-size:12px; color:#9CA3AF; font-weight:600;">atau</span>
                <span style="flex:1; height:1px; background:#E5E7EB; display:block;"></span>
            </div>

            {{-- Login link --}}
            <p style="text-align:center; font-size:14px; color:#5B5758; margin:0;">
                Sudah punya akun?
                <a href="{{ route('login') }}"
                    style="color:#02838D; font-weight:800; text-decoration:none; transition:color 0.2s;"
                    onmouseover="this.style.color='#016C75'" onmouseout="this.style.color='#02838D'">Masuk di sini</a>
            </p>

        </div>
    </div>

</div>
@endsection

@push('scripts')
<script>
    // Responsive: stack card on mobile
    function adjustAuthCard() {
        const card = document.getElementById('auth-card');
        const leftPanel = document.getElementById('auth-left-panel');
        if (!card) return;
        if (window.innerWidth >= 768) {
            card.style.gridTemplateColumns = '1fr 1fr';
            if (leftPanel) leftPanel.style.display = 'flex';
        } else {
            card.style.gridTemplateColumns = '1fr';
            if (leftPanel) leftPanel.style.display = 'none';
        }
    }
    adjustAuthCard();
    window.addEventListener('resize', adjustAuthCard);

    let agreedToTerms = false;

    function togglePassword(fieldId, btn) {
        const field = document.getElementById(fieldId);
        const icon = btn.querySelector('svg');
        if (field.type === 'password') {
            field.type = 'text';
            icon.innerHTML = '<path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"/><line x1="1" y1="1" x2="23" y2="23"/>';
        } else {
            field.type = 'password';
            icon.innerHTML = '<path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/>';
        }
    }

    function updateStrength(val) {
        let score = 0;
        if (val.length >= 8) score++;
        if (/[A-Z]/.test(val)) score++;
        if (/[0-9]/.test(val)) score++;
        if (/[^A-Za-z0-9]/.test(val)) score++;

        const colors = ['', '#D92D20', '#F59E0B', '#10B981', '#02838D'];
        const labels = ['', 'Lemah', 'Cukup', 'Kuat', 'Sangat Kuat'];

        for (let i = 1; i <= 4; i++) {
            const bar = document.getElementById(`bar-${i}`);
            bar.style.backgroundColor = i <= score ? colors[score] : '#E5E7EB';
        }
        const label = document.getElementById('strength-label');
        label.textContent = val.length > 0 ? labels[score] : '';
        label.style.color = colors[score] || '#9CA3AF';
    }

    function checkMatch() {
        const pw = document.getElementById('password').value;
        const conf = document.getElementById('password_confirmation').value;
        const label = document.getElementById('match-label');
        if (!conf) { label.style.display = 'none'; return; }
        label.style.display = 'block';
        if (pw === conf) {
            label.textContent = ' Password cocok';
            label.style.color = '#02838D';
        } else {
            label.textContent = ' Password tidak cocok';
            label.style.color = '#D92D20';
        }
        updateSubmitButton();
    }

    function toggleAgree() {
        agreedToTerms = !agreedToTerms;
        const btn = document.getElementById('agree-btn');
        const input = document.getElementById('agree-input');

        input.value = agreedToTerms ? '1' : '0';
        btn.setAttribute('aria-pressed', String(agreedToTerms));

        if (agreedToTerms) {
            btn.style.backgroundColor = '#02838D';
            btn.style.borderColor = '#02838D';
            btn.innerHTML = '<svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="3"><polyline points="20 6 9 17 4 12"/></svg>';
        } else {
            btn.style.backgroundColor = '#FFFFFF';
            btn.style.borderColor = '#E5E7EB';
            btn.innerHTML = '';
        }
        updateSubmitButton();
    }

    function updateSubmitButton() {
        const submitBtn = document.getElementById('register-btn');
        const pw = document.getElementById('password').value;
        const conf = document.getElementById('password_confirmation').value;
        
        if (agreedToTerms && pw && conf && pw === conf && pw.length >= 8) {
            submitBtn.disabled = false;
            submitBtn.style.opacity = '1';
            submitBtn.style.cursor = 'pointer';
            submitBtn.style.boxShadow = '0 6px 20px rgba(2,131,141,0.3)';
        } else {
            submitBtn.disabled = true;
            submitBtn.style.opacity = '0.5';
            submitBtn.style.cursor = 'not-allowed';
            submitBtn.style.boxShadow = 'none';
        }
    }

    document.getElementById('register-form')?.addEventListener('submit', function (e) {
        const pw = document.getElementById('password').value;
        const conf = document.getElementById('password_confirmation').value;
        if (pw !== conf) {
            e.preventDefault();
            checkMatch();
            return;
        }
        const btn = document.getElementById('register-btn');
        btn.disabled = true;
        btn.innerHTML = `
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="animation:spinSlow 0.8s linear infinite;"><path d="M12 2v4M12 18v4M4.93 4.93l2.83 2.83M16.24 16.24l2.83 2.83M2 12h4M18 12h4M4.93 19.07l2.83-2.83M16.24 7.76l2.83-2.83"/></svg>
        Mendaftarkan...
        `;
    });
</script>
@endpush
