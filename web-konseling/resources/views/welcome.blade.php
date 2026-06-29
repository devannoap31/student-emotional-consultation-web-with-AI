@extends('layouts.app')

@section('title', 'Aether — Sehat Mental Dimulai dari Kamu')
@section('meta_description', 'Platform AI pendamping kesehatan mental untuk mahasiswa. Konsultasi emosional dengan pendekatan CBT, mood tracking, dan artikel kesehatan mental.')

@section('content')
<div style="min-height:100vh; background-color:#FFFFFF; color:#231F20; overflow-x:hidden; font-family:'Nunito',sans-serif;">

    {{-- ░░ BACKGROUND BLOBS ░░ --}}
    <div style="position:fixed; inset:0; pointer-events:none; z-index:0; overflow:hidden;">
        <div style="position:absolute; top:-8%; left:-8%; width:520px; height:520px; background:radial-gradient(circle, rgba(2,131,141,0.08) 0%, transparent 65%); border-radius:50%; filter:blur(60px);"></div>
        <div style="position:absolute; top:25%; right:-5%; width:420px; height:420px; background:radial-gradient(circle, rgba(79,175,182,0.07) 0%, transparent 65%); border-radius:50%; filter:blur(70px);"></div>
        <div style="position:absolute; bottom:-8%; left:20%; width:600px; height:600px; background:radial-gradient(circle, rgba(243,251,252,0.9) 0%, transparent 60%); border-radius:50%; filter:blur(80px);"></div>
    </div>

    {{-- ░░ NAVBAR ░░ --}}
    <nav id="navbar" class="navbar" style="z-index:50;">
        <div class="container-editorial" style="display:flex; align-items:center; justify-content:space-between;">
            {{-- Logo --}}
            <a href="{{ url('/') }}" style="text-decoration:none; display:flex; align-items:flex-end;">
                <img src="{{ asset('AE.png') }}" alt="Aether Logo" style="height:32px; width:auto; object-fit:contain;">
                <span style="font-family:'Playfair Display', serif; font-weight:800; font-size:24px; color:#231F20; margin-left:6px; line-height:0.85;">Aether</span>
            </a>

            {{-- Desktop links --}}
            <div style="display:none;" class="md-flex-nav">
                <div style="display:flex; align-items:center; gap:36px;">
                    <a href="{{ url('/') }}" class="nav-link active">Beranda</a>
                    <a href="#articles" class="nav-link">Artikel</a>
                    <a href="#features" class="nav-link">Fitur</a>
                </div>
            </div>

            {{-- CTA --}}
            <div style="display:flex; align-items:center; gap:20px;">
                <a href="{{ route('login') }}" class="nav-link" style="display:none;" id="nav-login">Masuk</a>
                <a href="{{ route('register') }}" class="btn-primary" style="height:42px; padding:0 20px; font-size:14px;" id="nav-cta">
                    Mulai Gratis
                </a>
                {{-- Mobile burger --}}
                <button id="mobile-menu-btn" style="display:flex; align-items:center; background:none; border:none; cursor:pointer; padding:6px; border-radius:8px;" aria-label="Menu">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#231F20" stroke-width="2"><path d="M3 12h18M3 6h18M3 18h18"/></svg>
                </button>
            </div>
        </div>

        {{-- Mobile menu --}}
        <div id="mobile-menu" style="display:none; background:#FFFFFF; border-top:1px solid #E5E7EB; padding:20px 24px; flex-direction:column; gap:12px;">
            <a href="{{ url('/') }}" style="font-weight:700; font-size:16px; color:#02838D; text-decoration:none; padding:8px 0;">Beranda</a>
            <a href="#articles" style="font-weight:600; font-size:15px; color:#5B5758; text-decoration:none; padding:8px 0;">Artikel</a>
            <a href="#features" style="font-weight:600; font-size:15px; color:#5B5758; text-decoration:none; padding:8px 0;">Fitur</a>
            <hr class="divider" style="margin:4px 0;">
            <a href="{{ route('login') }}" style="font-weight:600; font-size:15px; color:#5B5758; text-decoration:none; padding:8px 0;">Masuk</a>
            <a href="{{ route('register') }}" class="btn-primary" style="height:46px; font-size:14px; text-align:center;">Mulai Gratis</a>
        </div>
    </nav>

    <main style="position:relative; z-index:10; padding-top:100px; padding-bottom:60px;">

        {{-- ░░ HERO SECTION ░░ --}}
        <section style="padding:40px 0 80px;" aria-label="Hero">
            <div class="container-editorial">
                <div style="display:grid; grid-template-columns:1fr; gap:48px; align-items:center; min-height:78vh;" id="hero-grid">

                    {{-- Left: Typography --}}
                    <div class="animate-fade-in-up" style="display:flex; flex-direction:column; justify-content:center; max-width:620px;">

                        {{-- Badge --}}
                        <div class="badge-live" style="margin-bottom:28px; width:fit-content;">
                            <div class="badge-shimmer"></div>
                            <span class="badge-dot"></span>
                            <span class="badge-text">Aether AI Sudah Hadir</span>
                        </div>

                        <h1 style="font-family:'Nunito',sans-serif; font-size:clamp(36px,5.5vw,60px); font-weight:800; line-height:1.12; color:#231F20; margin:0 0 20px; letter-spacing:-0.02em;">
                            Sehat Mental <br>
                            <span style="color:#02838D; font-style:italic; font-weight:700;">Dimulai dari</span> <br>
                            Kamu
                        </h1>

                        <p style="font-size:17px; line-height:1.6; color:#5B5758; max-width:440px; margin:0 0 36px;">
                            Platform pendamping kesehatan mental berbasis AI untuk mahasiswa dengan pendekatan CBT dan psikologi berbasis riset.
                        </p>

                        <div style="display:flex; flex-wrap:wrap; gap:14px; align-items:center;">
                            <a href="{{ route('register') }}" class="btn-primary">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
                                Curhat dengan Aether
                            </a>
                            <a href="#articles" class="btn-secondary" style="height:52px; padding:0 24px;">
                                Baca Artikel
                            </a>
                        </div>

                        {{-- Trust signal --}}
                        <div style="display:flex; align-items:center; gap:10px; margin-top:32px;">
                            <div style="display:flex; gap:-4px;">
                                @foreach([
                                    '<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#02838D" stroke-width="2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>',
                                    '<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#4FAFB6" stroke-width="2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>',
                                    '<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#016C75" stroke-width="2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>'
                                ] as $em)
                                <div style="width:32px; height:32px; border-radius:50%; background:#F3FBFC; border:2px solid #fff; display:flex; align-items:center; justify-content:center; margin-left:-6px; box-shadow:0 2px 6px rgba(0,0,0,0.08);">{!! $em !!}</div>
                                @endforeach
                            </div>
                            <span style="font-size:13px; font-weight:600; color:#5B5758;">+500 mahasiswa sudah bergabung</span>
                        </div>
                    </div>

                    {{-- Right: Hero Image with Premium Floating Bubbles --}}
                    <div style="position:relative; height:560px; display:flex; align-items:center; justify-content:center; overflow:visible;" id="hero-visual">

                        {{-- Multi-layer aura glow --}}
                        <div style="position:absolute; width:460px; height:460px; background:radial-gradient(circle, rgba(2,131,141,0.18) 0%, rgba(79,175,182,0.08) 45%, transparent 70%); border-radius:50%; animation:pulseSoft 5s ease-in-out infinite; z-index:0;"></div>
                        <div style="position:absolute; width:320px; height:320px; background:radial-gradient(circle, rgba(2,131,141,0.12) 0%, transparent 65%); border-radius:50%; animation:pulseSoft 3.5s ease-in-out infinite reverse; z-index:0;"></div>

                        {{-- Rotating dashed ring --}}
                        <div style="position:absolute; width:500px; height:500px; border:1.5px dashed rgba(2,131,141,0.18); border-radius:50%; animation:spinSlow 25s linear infinite; z-index:1;"></div>
                        <div style="position:absolute; width:380px; height:380px; border:1px solid rgba(79,175,182,0.12); border-radius:50%; animation:spinSlow 18s linear infinite reverse; z-index:1;"></div>

                        {{-- Main image --}}
                        <img src="{{ asset('assset1.png') }}" alt="Ilustrasi Aether AI" style="max-width:88%; max-height:480px; object-fit:contain; z-index:20; filter:drop-shadow(0 24px 48px rgba(2,131,141,0.2)); position:relative; animation:floatUp 5s ease-in-out infinite;">

                        {{-- ── BUBBLE 1: Burnout Kuliah (kanan atas, besar) ── --}}
                        <div style="position:absolute; top:4%; right:-8%; z-index:30; animation:floatUp 5s ease-in-out infinite; animation-delay:0.2s;">
                            <div style="background:rgba(255,255,255,0.85); backdrop-filter:blur(16px); -webkit-backdrop-filter:blur(16px); border:1.5px solid rgba(217,45,32,0.3); border-radius:18px; padding:14px 20px; box-shadow:0 8px 32px rgba(217,45,32,0.18), 0 2px 8px rgba(0,0,0,0.06); display:flex; align-items:center; gap:12px; min-width:170px;">
                                <div style="width:38px; height:38px; border-radius:10px; background:linear-gradient(135deg,#FF6B6B,#D92D20); display:flex; align-items:center; justify-content:center; flex-shrink:0; box-shadow:0 4px 12px rgba(217,45,32,0.35);">
                                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2.2" stroke-linecap="round"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2z"/><path d="M12 8v4l3 3"/></svg>
                                </div>
                                <div>
                                    <div style="font-size:11px; font-weight:600; color:#D92D20; letter-spacing:0.06em; text-transform:uppercase; margin-bottom:2px;">Kelelahan</div>
                                    <div style="font-size:14px; font-weight:800; color:#1A1A1A; line-height:1.2;">Burnout Kuliah</div>
                                </div>
                            </div>
                        </div>

                        {{-- ── BUBBLE 2: Overthinking (kiri tengah, kecil) ── --}}
                        <div style="position:absolute; top:30%; left:-12%; z-index:30; animation:floatDown 7s ease-in-out infinite; animation-delay:1.5s;">
                            <div style="background:rgba(255,255,255,0.82); backdrop-filter:blur(16px); -webkit-backdrop-filter:blur(16px); border:1.5px solid rgba(245,158,11,0.35); border-radius:16px; padding:10px 16px; box-shadow:0 8px 28px rgba(245,158,11,0.18), 0 2px 6px rgba(0,0,0,0.05); display:flex; align-items:center; gap:10px; min-width:140px;">
                                <div style="width:32px; height:32px; border-radius:9px; background:linear-gradient(135deg,#FCD34D,#F59E0B); display:flex; align-items:center; justify-content:center; flex-shrink:0; box-shadow:0 4px 10px rgba(245,158,11,0.3);">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2.2" stroke-linecap="round"><circle cx="12" cy="12" r="10"/><path d="M12 8v4"/><path d="M12 16h.01"/></svg>
                                </div>
                                <div>
                                    <div style="font-size:10px; font-weight:600; color:#B45309; letter-spacing:0.06em; text-transform:uppercase; margin-bottom:1px;">Pikiran</div>
                                    <div style="font-size:13px; font-weight:800; color:#1A1A1A; line-height:1.2;">Overthinking</div>
                                </div>
                            </div>
                        </div>

                        {{-- ── BUBBLE 3: Stres Akademik (kiri bawah, sedang) ── --}}
                        <div style="position:absolute; bottom:18%; left:-6%; z-index:30; animation:floatDiagonal 6s ease-in-out infinite; animation-delay:0.8s;">
                            <div style="background:rgba(255,255,255,0.88); backdrop-filter:blur(16px); -webkit-backdrop-filter:blur(16px); border:1.5px solid rgba(124,58,237,0.3); border-radius:17px; padding:12px 18px; box-shadow:0 8px 30px rgba(124,58,237,0.16), 0 2px 8px rgba(0,0,0,0.06); display:flex; align-items:center; gap:11px; min-width:155px;">
                                <div style="width:36px; height:36px; border-radius:10px; background:linear-gradient(135deg,#A78BFA,#7C3AED); display:flex; align-items:center; justify-content:center; flex-shrink:0; box-shadow:0 4px 12px rgba(124,58,237,0.3);">
                                    <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2.2" stroke-linecap="round"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/></svg>
                                </div>
                                <div>
                                    <div style="font-size:10px; font-weight:600; color:#7C3AED; letter-spacing:0.06em; text-transform:uppercase; margin-bottom:1px;">Tekanan</div>
                                    <div style="font-size:13px; font-weight:800; color:#1A1A1A; line-height:1.2;">Stres Akademik</div>
                                </div>
                            </div>
                        </div>

                        {{-- ── BUBBLE 4: Susah Tidur (kanan bawah, besar) ── --}}
                        <div style="position:absolute; bottom:4%; right:-10%; z-index:30; animation:floatUp 4.5s ease-in-out infinite; animation-delay:2s;">
                            <div style="background:rgba(255,255,255,0.85); backdrop-filter:blur(16px); -webkit-backdrop-filter:blur(16px); border:1.5px solid rgba(2,131,141,0.3); border-radius:18px; padding:14px 20px; box-shadow:0 8px 32px rgba(2,131,141,0.18), 0 2px 8px rgba(0,0,0,0.06); display:flex; align-items:center; gap:12px; min-width:160px;">
                                <div style="width:38px; height:38px; border-radius:10px; background:linear-gradient(135deg,#4FAFB6,#02838D); display:flex; align-items:center; justify-content:center; flex-shrink:0; box-shadow:0 4px 12px rgba(2,131,141,0.35);">
                                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2.2" stroke-linecap="round"><path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"/></svg>
                                </div>
                                <div>
                                    <div style="font-size:11px; font-weight:600; color:#02838D; letter-spacing:0.06em; text-transform:uppercase; margin-bottom:2px;">Tidur</div>
                                    <div style="font-size:14px; font-weight:800; color:#1A1A1A; line-height:1.2;">Susah Tidur</div>
                                </div>
                            </div>
                        </div>

                        {{-- Particle dots aksen --}}
                        <div style="position:absolute; top:18%; right:15%; width:10px; height:10px; background:#D92D20; border-radius:50%; box-shadow:0 0 14px rgba(217,45,32,0.6); animation:pulseSoft 2.5s ease-in-out infinite; z-index:25;"></div>
                        <div style="position:absolute; top:55%; left:12%; width:7px; height:7px; background:#F59E0B; border-radius:50%; box-shadow:0 0 10px rgba(245,158,11,0.7); animation:pulseSoft 3s ease-in-out infinite; animation-delay:0.8s; z-index:25;"></div>
                        <div style="position:absolute; bottom:28%; right:18%; width:8px; height:8px; background:#7C3AED; border-radius:50%; box-shadow:0 0 12px rgba(124,58,237,0.6); animation:pulseSoft 2s ease-in-out infinite; animation-delay:1.4s; z-index:25;"></div>
                    </div>

                </div>
            </div>
        </section>

        {{-- ░░ TRUST STRIP ░░ --}}
        <section style="background:linear-gradient(135deg, #F3FBFC 0%, #EAF8F9 60%, #F8FDFD 100%); border-top:1px solid rgba(2,131,141,0.12); border-bottom:1px solid rgba(2,131,141,0.12); padding:56px 0; position:relative; overflow:hidden;">
            {{-- Bg orbs --}}
            <div style="position:absolute; right:-80px; top:-80px; width:280px; height:280px; background:radial-gradient(circle, rgba(2,131,141,0.08) 0%, transparent 70%); border-radius:50%; pointer-events:none;"></div>
            <div style="position:absolute; left:-60px; bottom:-60px; width:220px; height:220px; background:radial-gradient(circle, rgba(79,175,182,0.07) 0%, transparent 70%); border-radius:50%; pointer-events:none;"></div>

            <div class="container-editorial">
                <div style="display:grid; grid-template-columns:1fr 1fr; gap:60px; align-items:center;" id="trust-grid">

                    {{-- LEFT: AI Chat Mockup --}}
                    <div style="position:relative;">
                        {{-- Phone / Chat frame --}}
                        <div style="background:#FFFFFF; border-radius:24px; box-shadow:0 20px 60px rgba(2,131,141,0.14), 0 4px 16px rgba(0,0,0,0.06); overflow:hidden; border:1px solid rgba(2,131,141,0.1); max-width:380px; margin:0 auto;">

                            {{-- Chat header --}}
                            <div style="background:linear-gradient(135deg,#02838D,#016C75); padding:16px 20px; display:flex; align-items:center; gap:12px;">
                                <div style="width:40px; height:40px; border-radius:50%; background:rgba(255,255,255,0.15); border:2px solid rgba(255,255,255,0.3); display:flex; align-items:center; justify-content:center; flex-shrink:0;">
                                    <img src="{{ asset('AE.png') }}" alt="Aether" style="width:24px; height:24px; object-fit:contain; filter:brightness(0) invert(1);">
                                </div>
                                <div>
                                    <div style="font-size:14px; font-weight:800; color:#FFFFFF; line-height:1;">Aether AI</div>
                                    <div style="font-size:11px; color:rgba(255,255,255,0.75); display:flex; align-items:center; gap:5px; margin-top:3px;">
                                        <span style="width:6px; height:6px; border-radius:50%; background:#6EE7B7; display:inline-block; animation:pulseSoft 2s ease-in-out infinite;"></span>
                                        Online sekarang
                                    </div>
                                </div>
                                <div style="margin-left:auto; display:flex; gap:10px;">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="rgba(255,255,255,0.7)" stroke-width="2"><circle cx="12" cy="12" r="1"/><circle cx="19" cy="12" r="1"/><circle cx="5" cy="12" r="1"/></svg>
                                </div>
                            </div>

                            {{-- Chat messages --}}
                            <div style="padding:20px; display:flex; flex-direction:column; gap:14px; background:#F8FDFD; min-height:260px;">

                                {{-- User message --}}
                                <div style="display:flex; justify-content:flex-end; animation:floatUp 0.5s ease-out both;">
                                    <div style="background:linear-gradient(135deg,#02838D,#4FAFB6); color:#FFFFFF; border-radius:18px 18px 4px 18px; padding:10px 16px; max-width:78%; font-size:13px; line-height:1.5; box-shadow:0 4px 12px rgba(2,131,141,0.2);">
                                        Aku lagi ngerasa sangat overwhelmed sama tugas kuliah 😮‍💨
                                    </div>
                                </div>

                                {{-- AI response --}}
                                <div style="display:flex; gap:8px; align-items:flex-end; animation:floatUp 0.5s ease-out 0.3s both;">
                                    <div style="width:28px; height:28px; border-radius:50%; background:linear-gradient(135deg,#02838D,#016C75); display:flex; align-items:center; justify-content:center; flex-shrink:0;">
                                        <img src="{{ asset('AE.png') }}" alt="AI" style="width:16px; height:16px; object-fit:contain; filter:brightness(0) invert(1);">
                                    </div>
                                    <div style="background:#FFFFFF; border-radius:18px 18px 18px 4px; padding:10px 16px; max-width:78%; font-size:13px; color:#231F20; line-height:1.55; box-shadow:0 2px 10px rgba(0,0,0,0.06); border:1px solid rgba(2,131,141,0.08);">
                                        Aku dengar kamu. Perasaan overwhelmed itu nyata dan wajar banget. Boleh cerita lebih lanjut apa yang paling membebani sekarang? 💙
                                    </div>
                                </div>

                                {{-- User message 2 --}}
                                <div style="display:flex; justify-content:flex-end; animation:floatUp 0.5s ease-out 0.6s both;">
                                    <div style="background:linear-gradient(135deg,#02838D,#4FAFB6); color:#FFFFFF; border-radius:18px 18px 4px 18px; padding:10px 16px; max-width:78%; font-size:13px; line-height:1.5; box-shadow:0 4px 12px rgba(2,131,141,0.2);">
                                        Deadline skripsi minggu depan tapi belum mulai bab 3
                                    </div>
                                </div>

                                {{-- AI typing indicator --}}
                                <div style="display:flex; gap:8px; align-items:flex-end; animation:floatUp 0.5s ease-out 0.9s both;">
                                    <div style="width:28px; height:28px; border-radius:50%; background:linear-gradient(135deg,#02838D,#016C75); display:flex; align-items:center; justify-content:center; flex-shrink:0;">
                                        <img src="{{ asset('AE.png') }}" alt="AI" style="width:16px; height:16px; object-fit:contain; filter:brightness(0) invert(1);">
                                    </div>
                                    <div style="background:#FFFFFF; border-radius:18px 18px 18px 4px; padding:12px 18px; box-shadow:0 2px 10px rgba(0,0,0,0.06); border:1px solid rgba(2,131,141,0.08); display:flex; align-items:center; gap:5px;">
                                        <span style="width:7px; height:7px; border-radius:50%; background:#02838D; display:inline-block; animation:pulseSoft 1.2s ease-in-out infinite;"></span>
                                        <span style="width:7px; height:7px; border-radius:50%; background:#02838D; display:inline-block; animation:pulseSoft 1.2s ease-in-out 0.3s infinite;"></span>
                                        <span style="width:7px; height:7px; border-radius:50%; background:#02838D; display:inline-block; animation:pulseSoft 1.2s ease-in-out 0.6s infinite;"></span>
                                    </div>
                                </div>

                            </div>

                            {{-- Chat input bar --}}
                            <div style="padding:14px 20px; background:#FFFFFF; border-top:1px solid rgba(2,131,141,0.08); display:flex; align-items:center; gap:10px;">
                                <div style="flex:1; background:#F3FBFC; border:1px solid rgba(2,131,141,0.15); border-radius:100px; padding:8px 16px; font-size:13px; color:#9CA3AF;">
                                    Ceritakan perasaanmu...
                                </div>
                                <div style="width:36px; height:36px; border-radius:50%; background:linear-gradient(135deg,#02838D,#4FAFB6); display:flex; align-items:center; justify-content:center; flex-shrink:0; box-shadow:0 4px 10px rgba(2,131,141,0.3);">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-linecap="round"><path d="M22 2L11 13"/><path d="M22 2L15 22 11 13 2 9l20-7z"/></svg>
                                </div>
                            </div>
                        </div>

                        {{-- Floating badge di pojok chat --}}
                        <div style="position:absolute; top:-16px; right:0; background:#FFFFFF; border:1.5px solid rgba(2,131,141,0.2); border-radius:14px; padding:8px 14px; box-shadow:0 8px 24px rgba(2,131,141,0.12); display:flex; align-items:center; gap:8px; animation:floatUp 3.5s ease-in-out infinite;">
                            <div style="width:8px; height:8px; border-radius:50%; background:#10B981; box-shadow:0 0 8px rgba(16,185,129,0.6);"></div>
                            <span style="font-size:12px; font-weight:700; color:#231F20;">AI Aktif 24/7</span>
                        </div>
                        <div style="position:absolute; bottom:-16px; left:10%; background:#FFFFFF; border:1.5px solid rgba(124,58,237,0.2); border-radius:14px; padding:8px 14px; box-shadow:0 8px 24px rgba(124,58,237,0.1); display:flex; align-items:center; gap:8px; animation:floatDown 4s ease-in-out infinite;">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#7C3AED" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                            <span style="font-size:12px; font-weight:700; color:#231F20;">End-to-end Encrypted</span>
                        </div>
                    </div>

                    {{-- RIGHT: Trust badges --}}
                    <div>
                        <div style="display:inline-flex; align-items:center; gap:8px; background:linear-gradient(135deg,rgba(2,131,141,0.08),rgba(79,175,182,0.06)); border:1px solid rgba(2,131,141,0.18); border-radius:100px; padding:5px 16px; margin-bottom:20px;">
                            <div style="width:6px; height:6px; border-radius:50%; background:#02838D; animation:pulseSoft 2s ease-in-out infinite;"></div>
                            <span style="font-size:11px; font-weight:700; color:#02838D; letter-spacing:0.1em; text-transform:uppercase;">Dipercaya Mahasiswa</span>
                        </div>
                        <h3 style="font-family:'Nunito',sans-serif; font-size:clamp(22px,3vw,32px); font-weight:800; color:#231F20; margin:0 0 8px; line-height:1.2;">Aman, Cepat & Empatik</h3>
                        <p style="font-size:15px; color:#5B5758; line-height:1.7; margin:0 0 32px;">Aether dirancang dengan standar keamanan tinggi dan pendekatan psikologi berbasis bukti.</p>

                        <div style="display:flex; flex-direction:column; gap:14px;">
                            @foreach([
                                ['<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#02838D" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M9 12l2 2 4-4"/></svg>','#02838D','rgba(2,131,141,0.08)','Berbasis Riset CBT','Metode terapi terstruktur & terbukti secara ilmiah'],
                                ['<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#7C3AED" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>','#7C3AED','rgba(124,58,237,0.08)','Data Aman & Privat','Enkripsi end-to-end, tidak pernah dibagikan'],
                                ['<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#F59E0B" stroke-width="2"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"/></svg>','#F59E0B','rgba(245,158,11,0.08)','Respon Cepat AI','Respons instan, kapan pun kamu membutuhkan'],
                                ['<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#D92D20" stroke-width="2"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg>','#D92D20','rgba(217,45,32,0.08)','Empatik & Suportif','Tanpa menghakimi, selalu siap mendengarkan'],
                            ] as [$icon, $color, $bg, $label, $sub])
                            <div style="display:flex; align-items:center; gap:14px; padding:14px 18px; background:#FFFFFF; border-radius:16px; border:1px solid #E5E7EB; box-shadow:0 2px 8px rgba(0,0,0,0.04); transition:box-shadow 0.2s, transform 0.2s;"
                                onmouseover="this.style.boxShadow='0 8px 24px rgba(2,131,141,0.1)'; this.style.transform='translateX(4px)';"
                                onmouseout="this.style.boxShadow='0 2px 8px rgba(0,0,0,0.04)'; this.style.transform='translateX(0)';">
                                <div style="width:40px; height:40px; border-radius:12px; background:{{ $bg }}; display:flex; align-items:center; justify-content:center; flex-shrink:0;">{!! $icon !!}</div>
                                <div>
                                    <div style="font-size:14px; font-weight:800; color:#231F20; margin-bottom:2px;">{{ $label }}</div>
                                    <div style="font-size:12px; color:#5B5758; line-height:1.4;">{{ $sub }}</div>
                                </div>
                                <div style="margin-left:auto; color:#E5E7EB;">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 18l6-6-6-6"/></svg>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>
        </section>

        {{-- ░░ FEATURES SECTION ░░ --}}
        <section id="features" style="padding:96px 0; background:#FFFFFF;" aria-label="Fitur">
            <div class="container-editorial">
                {{-- Section header --}}
                <div style="text-align:center; margin-bottom:64px;">
                    <div style="display:inline-flex; align-items:center; gap:8px; background:linear-gradient(135deg,rgba(2,131,141,0.08),rgba(79,175,182,0.06)); border:1px solid rgba(2,131,141,0.18); border-radius:100px; padding:6px 18px; margin-bottom:16px;">
                        <div style="width:6px; height:6px; border-radius:50%; background:#02838D; animation:pulseSoft 2s ease-in-out infinite;"></div>
                        <span style="font-size:12px; font-weight:700; color:#02838D; letter-spacing:0.1em; text-transform:uppercase;">Fitur Unggulan</span>
                    </div>
                    <h2 style="font-family:'Nunito',sans-serif; font-size:clamp(28px,4vw,42px); font-weight:800; color:#231F20; margin:0 0 14px; line-height:1.2;">Semua yang Kamu Butuhkan</h2>
                    <p style="font-size:16px; color:#5B5758; max-width:480px; margin:0 auto; line-height:1.7;">Satu platform lengkap untuk mendukung kesehatan mentalmu setiap hari.</p>
                </div>

                <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(300px, 1fr)); gap:28px;">

                    {{-- Feature Card 1: AI Support --}}
                    <div style="background:#FFFFFF; border:1.5px solid #E5E7EB; border-radius:24px; padding:36px 32px; position:relative; overflow:hidden; transition:border-color 0.3s, box-shadow 0.3s, transform 0.3s; cursor:default;"
                        onmouseover="this.style.borderColor='rgba(2,131,141,0.4)'; this.style.boxShadow='0 16px 48px rgba(2,131,141,0.12)'; this.style.transform='translateY(-6px)';"
                        onmouseout="this.style.borderColor='#E5E7EB'; this.style.boxShadow='none'; this.style.transform='translateY(0)';">
                        <div style="position:absolute; top:0; left:0; right:0; height:3px; background:linear-gradient(90deg,#02838D,#4FAFB6); border-radius:24px 24px 0 0;"></div>
                        <div style="width:56px; height:56px; border-radius:16px; background:linear-gradient(135deg,rgba(2,131,141,0.12),rgba(79,175,182,0.08)); border:1.5px solid rgba(2,131,141,0.2); display:flex; align-items:center; justify-content:center; margin-bottom:24px; box-shadow:0 4px 12px rgba(2,131,141,0.1);">
                            <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="#02838D" stroke-width="1.8" stroke-linecap="round"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
                        </div>
                        <div style="display:inline-block; font-size:11px; font-weight:700; color:#02838D; background:rgba(2,131,141,0.08); border-radius:6px; padding:3px 10px; letter-spacing:0.06em; text-transform:uppercase; margin-bottom:12px;">Tersedia 24/7</div>
                        <h3 style="font-size:22px; font-weight:800; color:#231F20; margin:0 0 12px; line-height:1.25;">AI Emotional Support</h3>
                        <p style="font-size:15px; color:#5B5758; line-height:1.7; margin:0 0 24px;">AI pendamping suportif & empatik. Ceritakan permasalahan dan kecemasanmu kapan saja tanpa takut dihakimi.</p>
                        <div style="display:flex; align-items:center; gap:6px; font-size:13px; font-weight:700; color:#02838D;">
                            <span>Mulai Curhat</span>
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                        </div>
                    </div>

                    {{-- Feature Card 2: Mood Journal --}}
                    <div style="background:#FFFFFF; border:1.5px solid #E5E7EB; border-radius:24px; padding:36px 32px; position:relative; overflow:hidden; transition:border-color 0.3s, box-shadow 0.3s, transform 0.3s; cursor:default;"
                        onmouseover="this.style.borderColor='rgba(124,58,237,0.35)'; this.style.boxShadow='0 16px 48px rgba(124,58,237,0.1)'; this.style.transform='translateY(-6px)';"
                        onmouseout="this.style.borderColor='#E5E7EB'; this.style.boxShadow='none'; this.style.transform='translateY(0)';">
                        <div style="position:absolute; top:0; left:0; right:0; height:3px; background:linear-gradient(90deg,#7C3AED,#A78BFA); border-radius:24px 24px 0 0;"></div>
                        <div style="width:56px; height:56px; border-radius:16px; background:linear-gradient(135deg,rgba(124,58,237,0.12),rgba(167,139,250,0.08)); border:1.5px solid rgba(124,58,237,0.2); display:flex; align-items:center; justify-content:center; margin-bottom:24px; box-shadow:0 4px 12px rgba(124,58,237,0.1);">
                            <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="#7C3AED" stroke-width="1.8" stroke-linecap="round"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>
                        </div>
                        <div style="display:inline-block; font-size:11px; font-weight:700; color:#7C3AED; background:rgba(124,58,237,0.08); border-radius:6px; padding:3px 10px; letter-spacing:0.06em; text-transform:uppercase; margin-bottom:12px;">Visual & Interaktif</div>
                        <h3 style="font-size:22px; font-weight:800; color:#231F20; margin:0 0 12px; line-height:1.25;">Mood Journal & Analytics</h3>
                        <p style="font-size:15px; color:#5B5758; line-height:1.7; margin:0 0 24px;">Pelacakan status emosi harian dan tren dinamika kesehatan mentalmu secara visual dan mudah dipahami.</p>
                        <div style="display:flex; align-items:center; gap:6px; font-size:13px; font-weight:700; color:#7C3AED;">
                            <span>Catat Mood</span>
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                        </div>
                    </div>

                    {{-- Feature Card 3: CBT --}}
                    <div style="background:#FFFFFF; border:1.5px solid #E5E7EB; border-radius:24px; padding:36px 32px; position:relative; overflow:hidden; transition:border-color 0.3s, box-shadow 0.3s, transform 0.3s; cursor:default;"
                        onmouseover="this.style.borderColor='rgba(245,158,11,0.35)'; this.style.boxShadow='0 16px 48px rgba(245,158,11,0.1)'; this.style.transform='translateY(-6px)';"
                        onmouseout="this.style.borderColor='#E5E7EB'; this.style.boxShadow='none'; this.style.transform='translateY(0)';">
                        <div style="position:absolute; top:0; left:0; right:0; height:3px; background:linear-gradient(90deg,#F59E0B,#FCD34D); border-radius:24px 24px 0 0;"></div>
                        <div style="width:56px; height:56px; border-radius:16px; background:linear-gradient(135deg,rgba(245,158,11,0.12),rgba(252,211,77,0.08)); border:1.5px solid rgba(245,158,11,0.2); display:flex; align-items:center; justify-content:center; margin-bottom:24px; box-shadow:0 4px 12px rgba(245,158,11,0.12);">
                            <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="#F59E0B" stroke-width="1.8" stroke-linecap="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                        </div>
                        <div style="display:inline-block; font-size:11px; font-weight:700; color:#B45309; background:rgba(245,158,11,0.1); border-radius:6px; padding:3px 10px; letter-spacing:0.06em; text-transform:uppercase; margin-bottom:12px;">Berbasis Riset</div>
                        <h3 style="font-size:22px; font-weight:800; color:#231F20; margin:0 0 12px; line-height:1.25;">Evidence-based CBT</h3>
                        <p style="font-size:15px; color:#5B5758; line-height:1.7; margin:0 0 24px;">Latihan Cognitive Behavioral Therapy (CBT) terstruktur dan terpandu otomatis untuk membantumu merasa lebih baik.</p>
                        <div style="display:flex; align-items:center; gap:6px; font-size:13px; font-weight:700; color:#B45309;">
                            <span>Coba Latihan</span>
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        {{-- ░░ HOW IT WORKS ░░ --}}
        <section id="how" style="padding:96px 0; background:linear-gradient(180deg, #F8FDFD 0%, #EEF9FA 100%); border-top:1px solid rgba(2,131,141,0.1);" aria-label="Cara Kerja">
            <div class="container-editorial">
                <div style="text-align:center; margin-bottom:72px;">
                    <div style="display:inline-flex; align-items:center; gap:8px; background:linear-gradient(135deg,rgba(2,131,141,0.08),rgba(79,175,182,0.06)); border:1px solid rgba(2,131,141,0.18); border-radius:100px; padding:6px 18px; margin-bottom:16px;">
                        <div style="width:6px; height:6px; border-radius:50%; background:#02838D; animation:pulseSoft 2s ease-in-out infinite;"></div>
                        <span style="font-size:12px; font-weight:700; color:#02838D; letter-spacing:0.1em; text-transform:uppercase;">Cara Kerja</span>
                    </div>
                    <h2 style="font-family:'Nunito',sans-serif; font-size:clamp(28px,4vw,42px); font-weight:800; color:#231F20; margin:0 0 14px; line-height:1.2;">Mulai dalam 4 Langkah</h2>
                    <p style="font-size:16px; color:#5B5758; max-width:440px; margin:0 auto; line-height:1.7;">Sederhana, cepat, dan langsung terasa manfaatnya.</p>
                </div>

                <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(220px, 1fr)); gap:20px; position:relative;">

                    @php
                    $steps = [
                        ['svg' => '<svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="#02838D" stroke-width="1.8" stroke-linecap="round"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>', 'num' => '01', 'title' => 'Curhat', 'desc' => 'Ceritakan apa yang sedang membebani pikiranmu kapan saja.', 'from' => '#02838D', 'to' => '#4FAFB6', 'delay' => '0s'],
                        ['svg' => '<svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="#7C3AED" stroke-width="1.8" stroke-linecap="round"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>', 'num' => '02', 'title' => 'Analisis', 'desc' => 'Aether menganalisis kondisi emosimu secara mendalam berbasis AI.', 'from' => '#7C3AED', 'to' => '#A78BFA', 'delay' => '0.15s'],
                        ['svg' => '<svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="#F59E0B" stroke-width="1.8" stroke-linecap="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/></svg>', 'num' => '03', 'title' => 'Terapi CBT', 'desc' => 'Dapatkan latihan dan rekomendasi terstruktur berbasis riset.', 'from' => '#F59E0B', 'to' => '#FCD34D', 'delay' => '0.3s'],
                        ['svg' => '<svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="#10B981" stroke-width="1.8" stroke-linecap="round"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>', 'num' => '04', 'title' => 'Pulih', 'desc' => 'Pantau perkembangan kesehatan mentalmu menuju keseimbangan.', 'from' => '#10B981', 'to' => '#6EE7B7', 'delay' => '0.45s'],
                    ];
                    @endphp

                    @foreach($steps as $step)
                    <div style="background:#FFFFFF; border:1.5px solid #E5E7EB; border-radius:24px; padding:32px 28px; position:relative; overflow:hidden; transition:box-shadow 0.3s, transform 0.3s; animation:floatUp 0.6s ease-out both; animation-delay:{{ $step['delay'] }};"
                        onmouseover="this.style.boxShadow='0 16px 40px rgba(2,131,141,0.1)'; this.style.transform='translateY(-5px)';"
                        onmouseout="this.style.boxShadow='none'; this.style.transform='translateY(0)';">
                        {{-- Top gradient bar --}}
                        <div style="position:absolute; top:0; left:0; right:0; height:3px; background:linear-gradient(90deg,{{ $step['from'] }},{{ $step['to'] }});"></div>
                        {{-- Big step number background --}}
                        <div style="position:absolute; top:-10px; right:16px; font-size:72px; font-weight:900; color:rgba(2,131,141,0.05); font-family:'Nunito',sans-serif; line-height:1; user-select:none;">{{ $step['num'] }}</div>
                        {{-- Icon --}}
                        <div style="width:52px; height:52px; border-radius:14px; background:linear-gradient(135deg,rgba(2,131,141,0.08),rgba(79,175,182,0.04)); border:1.5px solid rgba(2,131,141,0.15); display:flex; align-items:center; justify-content:center; margin-bottom:20px;">{!! $step['svg'] !!}</div>
                        {{-- Badge number --}}
                        <div style="display:inline-block; font-size:11px; font-weight:800; color:{{ $step['from'] }}; background:rgba(2,131,141,0.07); border-radius:6px; padding:2px 10px; letter-spacing:0.08em; margin-bottom:10px;">LANGKAH {{ $step['num'] }}</div>
                        <h4 style="font-size:20px; font-weight:800; color:#231F20; margin:0 0 10px; line-height:1.2;">{{ $step['title'] }}</h4>
                        <p style="font-size:14px; color:#5B5758; line-height:1.65; margin:0;">{{ $step['desc'] }}</p>
                    </div>
                    @endforeach

                </div>
            </div>
        </section>

        {{-- ░░ ARTICLES SECTION ░░ --}}
        <section id="articles" style="padding:80px 0;" aria-label="Artikel">
            <div class="container-editorial">
                <div style="text-align:center; margin-bottom:40px;">
                    <span class="section-label">Artikel Kesehatan Mental</span>
                    <h2 style="font-family:'Nunito',sans-serif; font-size:clamp(26px,4vw,38px); font-weight:800; color:#231F20; margin:12px 0 0; line-height:1.2;">
                        Baca, Pahami, Tumbuh
                    </h2>
                </div>

                {{-- Category Filter --}}
                <div style="display:flex; flex-wrap:wrap; justify-content:center; gap:10px; margin-bottom:36px; border-bottom:1px solid #E5E7EB; padding-bottom:24px;" id="cat-tabs">
                    @foreach(['Semua','Kecemasan','Burnout','Self-care','Mindfulness','Tidur Sehat'] as $i => $cat)
                    <button onclick="filterArticles('{{ $cat }}')" id="cat-{{ Str::slug($cat) }}"
                        class="cat-tab {{ $i === 0 ? 'active' : '' }}"
                        style="{{ $i === 0 ? 'color:#02838D; border-bottom:2px solid #02838D;' : 'color:#5B5758; border-bottom:2px solid transparent;' }} background:none; border-top:none; border-left:none; border-right:none; font-size:14px; font-weight:700; font-family:\'Nunito\',sans-serif; padding:6px 4px; cursor:pointer; transition:color 0.2s ease, border-color 0.2s ease;">
                        {{ $cat }}
                    </button>
                    @endforeach
                </div>

                {{-- Article Grid --}}
                <div style="display:grid; grid-template-columns:repeat(auto-fill, minmax(280px, 1fr)); gap:20px;" id="articles-grid">
                    @php
                    $articles = [
                        ['icon'=>'<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#02838D" stroke-width="1.5"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/></svg>','tag'=>'Burnout','title'=>'Kenali 7 Tanda Burnout Akademik','readTime'=>'7 min','excerpt'=>'Burnout bukan sekadar kelelahan biasa, tapi kondisi stres kronis yang membuatmu merasa kosong dan kehilangan motivasi belajar.','points'=>['Kelelahan fisik dan emosional yang terus-menerus','Merasa sinis dan terasing dari kegiatan perkuliahan','Penurunan prestasi dan produktivitas']],
                        ['icon'=>'<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#02838D" stroke-width="1.5"><circle cx="12" cy="12" r="10"/><path d="M8 14s1.5 2 4 2 4-2 4-2"/><line x1="9" y1="9" x2="9.01" y2="9"/><line x1="15" y1="9" x2="15.01" y2="9"/></svg>','tag'=>'Kecemasan','title'=>'Cara Mengatasi Panic Attack Saat Ujian','readTime'=>'5 min','excerpt'=>'Tiba-tiba jantung berdebar kencang dan napas sesak saat membalik kertas ujian? Itu bisa jadi serangan panik. Berikut teknik grounding 5-4-3-2-1.','points'=>['Fokus pada 5 benda yang bisa dilihat','Sentuh 4 benda di sekitarmu','Tarik napas perlahan melalui hidung']],
                        ['icon'=>'<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#02838D" stroke-width="1.5"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>','tag'=>'Self-care','title'=>'Membangun Batasan: Kapan Harus Berkata "Tidak"','readTime'=>'6 min','excerpt'=>'Sering merasa over-committed? Belajar berkata "tidak" tanpa rasa bersalah adalah bentuk tertinggi dari merawat diri sendiri.','points'=>['Pahami kapasitas waktu dan energimu','Gunakan teknik penolakan asertif','Ingat batasanmu adalah hakmu']],
                        ['icon'=>'<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#02838D" stroke-width="1.5"><circle cx="12" cy="12" r="10"/><path d="M12 8v4l3 3"/></svg>','tag'=>'Mindfulness','title'=>'Meditasi 10 Menit untuk Memulai Hari','readTime'=>'4 min','excerpt'=>'Memulai pagi dengan tergesa-gesa akan mengatur ritme kecemasan sepanjang hari. Luangkan 10 menit pertama untuk menyadari napasmu.','points'=>['Duduk bersila di tempat yang tenang','Fokus hanya pada napas yang keluar masuk','Jika pikiran mengembara, kembalikan dengan lembut']],
                        ['icon'=>'<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#02838D" stroke-width="1.5"><path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"/></svg>','tag'=>'Tidur Sehat','title'=>'Bahaya Begadang untuk Skripsi','readTime'=>'8 min','excerpt'=>'Mengerjakan skripsi semalaman mungkin terasa produktif, tapi merusak kemampuan memori jangka pendek otakmu.','points'=>['Otak mengkonsolidasi info saat Deep Sleep','Begadang meningkatkan hormon kortisol','Atur jadwal tidur yang konsisten']],
                        ['icon'=>'<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#02838D" stroke-width="1.5"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg>','tag'=>'Self-care','title'=>'Jurnal Syukur: Terapi Gratis Setiap Hari','readTime'=>'5 min','excerpt'=>'Mencatat tiga hal kecil yang patut disyukuri setiap malam terbukti meningkatkan kebahagiaan dan menurunkan gejala depresi ringan.','points'=>['Tuliskan hal-hal yang sangat spesifik','Tidak perlu hal besar, es kopi yang enak pun bisa disyukuri','Lakukan rutin minimal selama 21 hari']],
                    ];
                    @endphp

                    @foreach($articles as $article)
                    <article class="article-card"
                        data-tag="{{ $article['tag'] }}"
                        onclick="openArticleModal({{ json_encode($article) }})"
                        role="button"
                        tabindex="0"
                        onkeydown="if(event.key==='Enter') openArticleModal({{ json_encode($article) }})"
                        aria-label="Baca artikel: {{ $article['title'] }}">
                        <div class="article-img" style="display:flex; align-items:center; justify-content:center;">{!! $article['icon'] !!}</div>
                        <div class="article-body">
                            <div style="display:flex; align-items:flex-end; margin-bottom:20px;">
                                <img src="{{ asset('AE.png') }}" alt="Aether Logo" style="height:28px; width:auto; object-fit:contain; filter:brightness(0) invert(1);">
                                <span style="font-family:'Playfair Display', serif; font-weight:800; font-size:20px; color:#FFFFFF; margin-left:6px; line-height:0.85;">Aether</span>
                            </div>
                            <div style="display:flex; align-items:center; gap:10px; margin-bottom:12px;">
                                <span class="tag-primary">{{ $article['tag'] }}</span>
                                <span style="color:#9CA3AF; font-size:12px;">·</span>
                                <span style="color:#9CA3AF; font-size:13px; font-weight:600;">{{ $article['readTime'] }}</span>
                            </div>
                            <h3 style="font-size:17px; font-weight:800; color:#231F20; line-height:1.35; margin:0 0 10px; display:-webkit-box; -webkit-line-clamp:2; -webkit-box-orient:vertical; overflow:hidden;">{{ $article['title'] }}</h3>
                            <p style="font-size:14px; color:#5B5758; line-height:1.55; margin:0 0 14px; display:-webkit-box; -webkit-line-clamp:3; -webkit-box-orient:vertical; overflow:hidden; flex:1;">{{ $article['excerpt'] }}</p>
                            <div style="display:flex; align-items:center; gap:6px; color:#02838D; font-size:13px; font-weight:700; margin-top:auto;">
                                Baca Artikel
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                            </div>
                        </div>
                    </article>
                    @endforeach
                </div>
            </div>
        </section>

        {{-- ░░ CALL TO ACTION ░░ --}}
        <section style="padding:80px 0;" aria-label="Call to Action">
            <div class="container-editorial">
                <div class="cta-panel">
                    <div style="display:flex; flex-direction:column; align-items:center; justify-content:space-between; gap:40px; position:relative; z-index:2; text-align:center;">
                        <div>
                            <span class="section-label">Mulai Sekarang</span>
                            <h2 style="font-family:'Nunito',sans-serif; font-size:clamp(26px,4vw,40px); font-weight:800; color:#231F20; margin:16px 0 24px; line-height:1.2;">
                                Kamu tidak harus menghadapi <br>semuanya sendirian.
                            </h2>
                            <p style="font-size:16px; color:#5B5758; margin:0 0 32px; max-width:460px; margin-left:auto; margin-right:auto; line-height:1.6;">
                                Bergabunglah dengan ratusan mahasiswa yang telah merasakan manfaat Aether dalam perjalanan kesehatan mental mereka.
                            </p>
                            <div style="display:flex; gap:14px; justify-content:center; flex-wrap:wrap;">
                                <a href="{{ route('register') }}" class="btn-primary">
                                    Mulai Curhat Sekarang — Gratis
                                </a>
                                <a href="{{ route('login') }}" class="btn-secondary">
                                    Sudah Punya Akun?
                                </a>
                            </div>
                        </div>
                        <div style="width:96px; height:96px; border-radius:50%; background:radial-gradient(circle, rgba(2,131,141,0.08) 0%, transparent 70%); display:flex; align-items:center; justify-content:center; border:1px solid rgba(2,131,141,0.15); animation:float 6s ease-in-out infinite;">
                            <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="#02838D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>

    {{-- ░░ FOOTER ░░ --}}
    <footer style="background:#02838D; color:#FAFAFA; padding:72px 0 36px; position:relative; overflow:hidden;" aria-label="Footer">
        {{-- Decorative orbs --}}
        <div style="position:absolute; top:-80px; right:-80px; width:300px; height:300px; background:radial-gradient(circle, rgba(255,255,255,0.08) 0%, transparent 70%); border-radius:50%; pointer-events:none;"></div>
        <div style="position:absolute; bottom:-60px; left:-60px; width:240px; height:240px; background:radial-gradient(circle, rgba(255,255,255,0.06) 0%, transparent 70%); border-radius:50%; pointer-events:none;"></div>
        <div style="position:absolute; top:40%; left:50%; transform:translate(-50%,-50%); width:600px; height:600px; background:radial-gradient(circle, rgba(255,255,255,0.04) 0%, transparent 70%); border-radius:50%; pointer-events:none;"></div>

        <div class="container-editorial" style="position:relative; z-index:1;">
            <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(200px, 1fr)); gap:48px; margin-bottom:56px;">

                {{-- Brand column --}}
                <div style="grid-column: span 2;">
                    <div style="display:flex; align-items:center; gap:12px; margin-bottom:20px;">
                        <img src="{{ asset('AE.png') }}" alt="Aether Logo" style="height:40px; width:auto; object-fit:contain; filter:brightness(0) invert(1);">
                        <span style="font-family:'Playfair Display',serif; font-weight:800; font-size:26px; color:#FFFFFF; letter-spacing:-0.01em;">Aether<span style="color:rgba(255,255,255,0.6);">.AI</span></span>
                    </div>
                    <p style="font-size:14px; color:rgba(255,255,255,0.7); max-width:300px; line-height:1.75; margin:0 0 28px;">
                        Platform AI pendamping kesehatan mental pertama yang didesain khusus untuk mahasiswa, menggunakan pendekatan psikologi dan CBT berbasis riset.
                    </p>
                    {{-- Social links --}}
                    <div style="display:flex; gap:10px;">
                        @foreach([
                            ['Instagram', '<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/></svg>'],
                            ['Twitter', '<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"/></svg>'],
                            ['LinkedIn', '<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"/><rect x="2" y="9" width="4" height="12"/><circle cx="4" cy="4" r="2"/></svg>'],
                        ] as [$name, $icon])
                        <a href="#" style="width:38px; height:38px; border-radius:10px; background:rgba(255,255,255,0.12); border:1px solid rgba(255,255,255,0.15); display:flex; align-items:center; justify-content:center; color:#FFFFFF; text-decoration:none; transition:background 0.2s, transform 0.2s;"
                            onmouseover="this.style.background='rgba(255,255,255,0.22)'; this.style.transform='translateY(-2px)';"
                            onmouseout="this.style.background='rgba(255,255,255,0.12)'; this.style.transform='translateY(0)';" aria-label="{{ $name }}">{!! $icon !!}</a>
                        @endforeach
                    </div>
                </div>

                {{-- Platform links --}}
                <div>
                    <h4 style="font-size:13px; font-weight:700; color:rgba(255,255,255,0.5); margin:0 0 20px; letter-spacing:0.1em; text-transform:uppercase;">Platform</h4>
                    <ul style="list-style:none; padding:0; margin:0; display:flex; flex-direction:column; gap:14px;">
                        @foreach(['Fitur', 'Cara Kerja', 'Artikel', 'Harga'] as $link)
                        <li><a href="#" style="font-size:14px; color:rgba(255,255,255,0.75); text-decoration:none; transition:color 0.2s, padding-left 0.2s; display:flex; align-items:center; gap:6px;"
                            onmouseover="this.style.color='#FFFFFF'; this.style.paddingLeft='6px';"
                            onmouseout="this.style.color='rgba(255,255,255,0.75)'; this.style.paddingLeft='0';"
                            ><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg>{{ $link }}</a></li>
                        @endforeach
                    </ul>
                </div>

                {{-- Legal links --}}
                <div>
                    <h4 style="font-size:13px; font-weight:700; color:rgba(255,255,255,0.5); margin:0 0 20px; letter-spacing:0.1em; text-transform:uppercase;">Legal</h4>
                    <ul style="list-style:none; padding:0; margin:0; display:flex; flex-direction:column; gap:14px;">
                        @foreach(['Kebijakan Privasi', 'Syarat Layanan', 'Dukungan Krisis'] as $link)
                        <li><a href="#" style="font-size:14px; color:rgba(255,255,255,0.75); text-decoration:none; transition:color 0.2s, padding-left 0.2s; display:flex; align-items:center; gap:6px;"
                            onmouseover="this.style.color='#FFFFFF'; this.style.paddingLeft='6px';"
                            onmouseout="this.style.color='rgba(255,255,255,0.75)'; this.style.paddingLeft='0';"
                            ><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg>{{ $link }}</a></li>
                        @endforeach
                    </ul>
                </div>

            </div>

            {{-- Bottom bar --}}
            <div style="border-top:1px solid rgba(255,255,255,0.12); padding-top:28px; display:flex; flex-wrap:wrap; align-items:center; justify-content:space-between; gap:12px;">
                <p style="font-size:13px; color:rgba(255,255,255,0.55); margin:0;">© 2024 Aether Mental Health AI. Seluruh hak cipta dilindungi.</p>
            </div>
        </div>
    </footer>

    {{-- ░░ ARTICLE MODAL ░░ --}}
    <div id="article-modal" style="display:none; position:fixed; inset:0; z-index:100; background:rgba(35,31,32,0.5); backdrop-filter:blur(4px); -webkit-backdrop-filter:blur(4px); align-items:center; justify-content:center; padding:16px;"
        onclick="if(event.target===this) closeArticleModal()">
        <div style="background:#FFFFFF; border-radius:20px; width:100%; max-width:680px; max-height:90vh; overflow-y:auto; position:relative; box-shadow:0 24px 60px rgba(0,0,0,0.18);">
            <button onclick="closeArticleModal()" style="position:sticky; top:16px; float:right; margin:16px 16px 0 0; background:#F3FBFC; border:1px solid #E5E7EB; border-radius:50%; width:36px; height:36px; display:flex; align-items:center; justify-content:center; cursor:pointer; z-index:10;" aria-label="Tutup">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#231F20" stroke-width="2.5"><path d="M18 6L6 18M6 6l12 12"/></svg>
            </button>
            <div style="padding:32px;" id="modal-content">
                {{-- Filled by JS --}}
            </div>
        </div>
    </div>

</div>
@endsection

@push('scripts')
<script>
// ── Navbar scroll behavior ──
const navbar = document.getElementById('navbar');
window.addEventListener('scroll', () => {
    if (window.scrollY > 50) {
        navbar.classList.add('scrolled');
    } else {
        navbar.classList.remove('scrolled');
    }
}, { passive: true });

// ── Desktop nav & login visibility ──
const navLogin = document.getElementById('nav-login');
if (navLogin) navLogin.style.display = 'inline-flex';
document.querySelector('.md-flex-nav') && (document.querySelector('.md-flex-nav').style.display = 'block');

// ── Show desktop nav items based on viewport ──
function adjustNav() {
    const mdFlexNav = document.querySelector('.md-flex-nav');
    const navLoginEl = document.getElementById('nav-login');
    const mobileMenuBtn = document.getElementById('mobile-menu-btn');
    const mobileMenu = document.getElementById('mobile-menu');
    
    if (window.innerWidth >= 768) {
        if (mdFlexNav) mdFlexNav.style.display = 'block';
        if (navLoginEl) navLoginEl.style.display = 'inline-flex';
        if (mobileMenuBtn) mobileMenuBtn.style.display = 'none';
        if (mobileMenu) mobileMenu.style.display = 'none'; // Force hide on desktop
    } else {
        if (mdFlexNav) mdFlexNav.style.display = 'none';
        if (navLoginEl) navLoginEl.style.display = 'none';
        if (mobileMenuBtn) mobileMenuBtn.style.display = 'flex';
    }
}
adjustNav();
window.addEventListener('resize', adjustNav);

// ── Hero grid (2 columns on lg+) ──
function adjustHeroGrid() {
    const grid = document.getElementById('hero-grid');
    if (!grid) return;
    if (window.innerWidth >= 1024) {
        grid.style.gridTemplateColumns = '1fr 1fr';
    } else {
        grid.style.gridTemplateColumns = '1fr';
    }
}
adjustHeroGrid();
window.addEventListener('resize', adjustHeroGrid);

// ── Trust grid (2 columns on md+) ──
function adjustTrustGrid() {
    const grid = document.getElementById('trust-grid');
    if (!grid) return;
    if (window.innerWidth >= 768) {
        grid.style.gridTemplateColumns = '1fr 1fr';
        grid.style.gap = '60px';
    } else {
        grid.style.gridTemplateColumns = '1fr';
        grid.style.gap = '40px';
    }
}
adjustTrustGrid();
window.addEventListener('resize', adjustTrustGrid);


// ── Mobile menu ──
const mobileBtn = document.getElementById('mobile-menu-btn');
const mobileMenu = document.getElementById('mobile-menu');
if (mobileBtn && mobileMenu) {
    mobileBtn.addEventListener('click', () => {
        const open = mobileMenu.style.display === 'flex';
        mobileMenu.style.display = open ? 'none' : 'flex';
    });
}

// ── Article filter ──
function filterArticles(tag) {
    // Update tabs
    document.querySelectorAll('.cat-tab').forEach(btn => {
        const isActive = btn.textContent.trim() === tag;
        btn.style.color = isActive ? '#02838D' : '#5B5758';
        btn.style.borderBottomColor = isActive ? '#02838D' : 'transparent';
    });
    // Filter cards
    document.querySelectorAll('#articles-grid article').forEach(card => {
        const cardTag = card.dataset.tag;
        const show = tag === 'Semua' || cardTag === tag;
        card.style.display = show ? 'flex' : 'none';
    });
}

// ── Article modal ──
function openArticleModal(article) {
    const modal = document.getElementById('article-modal');
    const content = document.getElementById('modal-content');
    content.innerHTML = `
        <div style="margin-bottom:16px; display:flex;">${article.icon}</div>
        <div style="display:flex; align-items:center; gap:10px; margin-bottom:16px;">
            <span style="display:inline-flex; padding:4px 10px; border-radius:9999px; background:rgba(2,131,141,0.1); color:#02838D; font-size:13px; font-weight:700;">${article.tag}</span>
            <span style="color:#9CA3AF; font-size:13px;">·</span>
            <span style="color:#9CA3AF; font-size:13px; font-weight:600;">${article.readTime}</span>
        </div>
        <h2 style="font-size:clamp(20px,3vw,28px); font-weight:800; color:#231F20; margin:0 0 16px; line-height:1.3;">${article.title}</h2>
        <p style="font-size:16px; color:#5B5758; line-height:1.7; margin:0 0 28px;">${article.excerpt}</p>
        ${article.points && article.points.length ? `
        <div style="background:#F3FBFC; border:1px solid #E5E7EB; border-radius:12px; padding:24px; margin-bottom:28px;">
            <h3 style="font-size:16px; font-weight:800; color:#231F20; margin:0 0 16px; display:flex; align-items:center; gap:6px;"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#02838D" stroke-width="2.5"><path d="M21.44 11.05l-9.19 9.19a6 6 0 0 1-8.49-8.49l9.19-9.19a4 4 0 0 1 5.66 5.66l-9.2 9.19a2 2 0 0 1-2.83-2.83l8.49-8.48"/></svg> Poin-Poin Utama</h3>
            <ul style="margin:0; padding:0; list-style:none; display:flex; flex-direction:column; gap:12px;">
                ${article.points.map(pt => `
                <li style="display:flex; gap:12px; align-items:flex-start; font-size:15px; color:#5B5758; line-height:1.5;">
                    <span style="color:#02838D; font-size:16px; flex-shrink:0; margin-top:1px;">✦</span>
                    <span>${pt}</span>
                </li>`).join('')}
            </ul>
        </div>` : ''}
        <div style="border-top:1px solid #E5E7EB; padding-top:20px; display:flex; justify-content:flex-end;">
            <a href="{{ route('register') }}" class="btn-primary">
                Curhat dengan Aether →
            </a>
        </div>
    `;
    modal.style.display = 'flex';
    document.body.style.overflow = 'hidden';
}

function closeArticleModal() {
    document.getElementById('article-modal').style.display = 'none';
    document.body.style.overflow = '';
}

// Close modal on Escape
document.addEventListener('keydown', e => {
    if (e.key === 'Escape') closeArticleModal();
});
</script>
@endpush