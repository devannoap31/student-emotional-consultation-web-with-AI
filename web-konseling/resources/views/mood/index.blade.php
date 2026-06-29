@extends('layouts.app')

@section('title', 'Mood Tracking — Aether Mental Health AI')
@section('meta_description', 'Pantau perjalanan emosional dan tren mood harian kamu selama 7 hari terakhir bersama Aether.')

@section('content')
<div style="min-height:100vh; background-color:#FFFFFF; display:flex; font-family:'Nunito',sans-serif; color:#231F20;">

    {{-- ░░ LEFT SIDEBAR (same as chat) ░░ --}}
    <aside id="sidebar-desktop" style="position:fixed; top:0; left:0; bottom:0; width:272px; background:#FAFAFA; border-right:1px solid #E5E7EB; display:flex; flex-direction:column; padding:24px; z-index:40; overflow-y:auto;">

        <div style="display:flex; align-items:center; gap:10px; margin-bottom:32px; padding:0 4px;">
            <a href="{{ url('/') }}" style="text-decoration:none; display:flex; align-items:flex-end; gap:6px;">
                <img src="{{ asset('AE.png') }}" alt="Aether Logo" style="height:32px; width:auto; object-fit:contain;">
                <span style="font-family:'Playfair Display', serif; font-weight:800; font-size:24px; color:#231F20; line-height:0.85;">Aether</span>
            </a>
        </div>

        <a href="{{ route('chat') }}" class="btn-primary" style="width:100%; justify-content:center; height:46px; font-size:14px; margin-bottom:24px; gap:8px; text-decoration:none;">
            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M12 5v14M5 12h14"/></svg>
            Sesi Baru
        </a>

        <nav style="flex:1; display:flex; flex-direction:column; gap:4px;">
            <a href="{{ route('chat') }}" class="sidebar-nav-item">
                <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
                Chat
            </a>
            <a href="{{ route('mood') }}" class="sidebar-nav-item active" aria-current="page">
                <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/></svg>
                Mood Journal
            </a>
            <a href="#" class="sidebar-nav-item">
                <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 2L2 7l10 5 10-5-10-5z"/><path d="M2 17l10 5 10-5"/><path d="M2 12l10 5 10-5"/></svg>
                Resource Center
            </a>
        </nav>

        <div style="margin-top:auto; padding-top:16px; border-top:1px solid #E5E7EB;">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit"
                    style="width:100%; display:flex; align-items:center; gap:10px; padding:10px 12px; border-radius:10px; background:none; border:none; font-size:14px; font-weight:600; color:#5B5758; cursor:pointer; transition:background-color 0.15s ease, color 0.15s ease; font-family:'Nunito',sans-serif;"
                    onmouseover="this.style.backgroundColor='rgba(217,45,32,0.06)'; this.style.color='#D92D20';"
                    onmouseout="this.style.backgroundColor='transparent'; this.style.color='#5B5758';">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 21H5a2 2 0 01-2-2V5a2 2 0 012-2h4M16 17l5-5-5-5M21 12H9"/></svg>
                    Keluar
                </button>
            </form>
        </div>
    </aside>

    {{-- ░░ MAIN CONTENT ░░ --}}
    <div id="mood-main" style="flex:1; overflow-y:auto; margin-left:272px;">

        {{-- Mobile topbar --}}
        <div id="mobile-topbar" style="display:none; align-items:center; justify-content:space-between; padding:14px 20px; background:#FFFFFF; border-bottom:1px solid #E5E7EB; position:sticky; top:0; z-index:20;">
            <button onclick="openMobileSidebar()" style="background:none; border:none; cursor:pointer; padding:6px; border-radius:8px; color:#5B5758;" aria-label="Buka menu">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 12h18M3 6h18M3 18h18"/></svg>
            </button>
            <span style="font-weight:800; font-size:17px; color:#231F20;">Mood Tracking</span>
            <div style="width:34px;"></div>
        </div>

        {{-- Hero Header Banner --}}
        <div style="position:relative; overflow:hidden; background:linear-gradient(135deg, #F3FBFC 0%, rgba(2,131,141,0.06) 100%); border-bottom:1px solid #E5E7EB;">
            <div style="position:absolute; top:-20px; left:40%; width:200px; height:200px; background:radial-gradient(circle, rgba(2,131,141,0.08) 0%, transparent 65%); border-radius:50%; filter:blur(40px); pointer-events:none;"></div>
            <div style="max-width:900px; margin:0 auto; padding:32px 24px; display:flex; align-items:flex-start; justify-content:space-between; gap:16px; position:relative; z-index:1;">
                <div>
                    <div style="display:flex; align-items:center; gap:12px; margin-bottom:8px;">
                        <div style="width:38px; height:38px; border-radius:11px; background:linear-gradient(135deg,#02838D,#4FAFB6); display:flex; align-items:center; justify-content:center; box-shadow:0 4px 12px rgba(2,131,141,0.25);">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2.5"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>
                        </div>
                        <div>
                            <h1 style="font-size:20px; font-weight:900; color:#231F20; margin:0; line-height:1.2;">
                                Mood <span style="color:#02838D;">Tracking</span>
                            </h1>
                            <p style="font-size:12px; color:#9CA3AF; margin:2px 0 0;">Pantau perjalanan emosionalmu — 7 hari terakhir</p>
                        </div>
                    </div>
                    <p style="font-size:13px; color:#5B5758; max-width:440px; line-height:1.6; margin:8px 0 0;">
                        Melacak mood adalah langkah pertama menuju pemahaman diri yang lebih dalam. Pola ini akan membantu Aether memberikan saran yang lebih personal.
                    </p>
                </div>
                {{-- Decorative emotion rings --}}
                <div style="display:flex; gap:8px; flex-shrink:0; align-items:center;">
                    @foreach([
                        '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#02838D" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M8 14s1.5 2 4 2 4-2 4-2"/><line x1="9" y1="9" x2="9.01" y2="9"/><line x1="15" y1="9" x2="15.01" y2="9"/></svg>',
                        '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#F59E0B" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M16 16s-1.5-2-4-2-4 2-4 2"/><line x1="9" y1="9" x2="9.01" y2="9"/><line x1="15" y1="9" x2="15.01" y2="9"/></svg>',
                        '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#02838D" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M8 14s1.5 2 4 2 4-2 4-2"/><line x1="9" y1="9" x2="9.01" y2="9"/><line x1="15" y1="9" x2="15.01" y2="9"/></svg>',
                        '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#F59E0B" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="8" y1="15" x2="16" y2="15"/><line x1="9" y1="9" x2="9.01" y2="9"/><line x1="15" y1="9" x2="15.01" y2="9"/></svg>',
                        '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#D92D20" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M16 16s-1.5-2-4-2-4 2-4 2"/><line x1="9" y1="9" x2="9.01" y2="9"/><line x1="15" y1="9" x2="15.01" y2="9"/></svg>'
                    ] as $i => $icon)
                    <div class="animate-float" style="width:38px; height:38px; border-radius:50%; background:#FFFFFF; border:1px solid #E5E7EB; display:flex; align-items:center; justify-content:center; box-shadow:0 2px 8px rgba(0,0,0,0.06); animation-delay:{{ $i * 0.15 }}s; cursor:default;">{!! $icon !!}</div>
                    @endforeach
                </div>
            </div>
        </div>

        <div style="max-width:900px; margin:0 auto; padding:28px 24px;">

            {{-- ── STAT CARDS ── --}}
            <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(170px, 1fr)); gap:16px; margin-bottom:28px;">
                @php
                $stats = [
                    ['label'=>'Total Sesi',        'value'=>'12',   'icon'=>'<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>', 'color'=>'#02838D',  'bg'=>'rgba(2,131,141,0.08)',  'border'=>'rgba(2,131,141,0.18)'],
                    ['label'=>'Hari Berturut-turut','value'=>'5', 'icon'=>'<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17.5 19c-2.5 2.5-6.5 2.5-9 0s-2.5-6.5 0-9l4.5-4.5 4.5 4.5c2.5 2.5 2.5 6.5 0 9z"/></svg>', 'color'=>'#F59E0B',  'bg'=>'rgba(245,158,11,0.08)', 'border'=>'rgba(245,158,11,0.18)'],
                    ['label'=>'Rata-rata Skor',    'value'=>'7.4',  'icon'=>'<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>', 'color'=>'#4FAFB6',  'bg'=>'rgba(79,175,182,0.08)', 'border'=>'rgba(79,175,182,0.18)'],
                    ['label'=>'Stabilitas',        'value'=>'82%',  'icon'=>'<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>', 'color'=>'#016C75',  'bg'=>'rgba(1,108,117,0.08)',  'border'=>'rgba(1,108,117,0.18)'],
                ];
                @endphp
                @foreach($stats as $stat)
                <div class="mood-stat-card" style="border-color:{{ $stat['border'] }}; background:{{ $stat['bg'] }};">
                    <div style="display:flex; align-items:center; justify-content:space-between;">
                        <span style="display:flex; align-items:center; justify-content:center; color:{{ $stat['color'] }};">{!! $stat['icon'] !!}</span>
                        <span style="font-size:11px; font-weight:700; color:{{ $stat['color'] }}; background:rgba(255,255,255,0.6); padding:3px 8px; border-radius:9999px;">↑</span>
                    </div>
                    <div>
                        <p style="font-size:26px; font-weight:900; color:{{ $stat['color'] }}; margin:0; line-height:1.1;">{{ $stat['value'] }}</p>
                        <p style="font-size:12px; color:#5B5758; margin:3px 0 0; font-weight:600;">{{ $stat['label'] }}</p>
                    </div>
                </div>
                @endforeach
            </div>

            {{-- ── CHARTS ROW ── --}}
            <div style="display:grid; grid-template-columns:1fr; gap:20px; margin-bottom:24px;" id="charts-grid">

                {{-- Trend Chart --}}
                <div class="card" style="padding:24px; border-color:#E5E7EB; border-radius:16px;">
                    <div style="display:flex; align-items:center; justify-content:space-between; margin-bottom:20px; flex-wrap:wrap; gap:10px;">
                        <h2 style="font-size:15px; font-weight:800; color:#231F20; margin:0; display:flex; align-items:center; gap:8px;">
                            <span style="color:#02838D;">
                                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>
                            </span>
                            Tren Emosi 7 Hari
                        </h2>
                        <span style="font-size:11px; color:#9CA3AF; padding:5px 10px; border-radius:8px; background:#F3FBFC; border:1px solid #E5E7EB; font-weight:600; display:flex; align-items:center; gap:4px;"><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg> Minggu Ini</span>
                    </div>

                    {{-- CSS Bar Chart --}}
                    @php
                    $weekData = [
                        ['day'=>'Sen', 'score'=>7, 'emotion'=>'Hijau',  'icon'=>'<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M8 14s1.5 2 4 2 4-2 4-2"/><line x1="9" y1="9" x2="9.01" y2="9"/><line x1="15" y1="9" x2="15.01" y2="9"/></svg>'],
                        ['day'=>'Sel', 'score'=>5, 'emotion'=>'Kuning', 'icon'=>'<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M16 16s-1.5-2-4-2-4 2-4 2"/><line x1="9" y1="9" x2="9.01" y2="9"/><line x1="15" y1="9" x2="15.01" y2="9"/></svg>'],
                        ['day'=>'Rab', 'score'=>8, 'emotion'=>'Hijau',  'icon'=>'<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M8 14s1.5 2 4 2 4-2 4-2"/><line x1="9" y1="9" x2="9.01" y2="9"/><line x1="15" y1="9" x2="15.01" y2="9"/></svg>'],
                        ['day'=>'Kam', 'score'=>4, 'emotion'=>'Kuning', 'icon'=>'<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M16 16s-1.5-2-4-2-4 2-4 2"/><line x1="9" y1="9" x2="9.01" y2="9"/><line x1="15" y1="9" x2="15.01" y2="9"/></svg>'],
                        ['day'=>'Jum', 'score'=>9, 'emotion'=>'Hijau',  'icon'=>'<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M8 14s1.5 2 4 2 4-2 4-2"/><line x1="9" y1="9" x2="9.01" y2="9"/><line x1="15" y1="9" x2="15.01" y2="9"/></svg>'],
                        ['day'=>'Sab', 'score'=>7, 'emotion'=>'Hijau',  'icon'=>'<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M8 14s1.5 2 4 2 4-2 4-2"/><line x1="9" y1="9" x2="9.01" y2="9"/><line x1="15" y1="9" x2="15.01" y2="9"/></svg>'],
                        ['day'=>'Min', 'score'=>6, 'emotion'=>'Hijau',  'icon'=>'<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M8 14s1.5 2 4 2 4-2 4-2"/><line x1="9" y1="9" x2="9.01" y2="9"/><line x1="15" y1="9" x2="15.01" y2="9"/></svg>'],
                    ];
                    $colorMap = [
                        'Hijau'  => ['bar'=>'#02838D', 'bg'=>'rgba(2,131,141,0.1)', 'text'=>'#02838D'],
                        'Kuning' => ['bar'=>'#F59E0B', 'bg'=>'rgba(245,158,11,0.1)','text'=>'#F59E0B'],
                        'Merah'  => ['bar'=>'#D92D20', 'bg'=>'rgba(217,45,32,0.1)', 'text'=>'#D92D20'],
                    ];
                    @endphp
                    <div style="display:flex; align-items:flex-end; justify-content:space-between; gap:8px; height:160px; padding:0 4px;">
                        @foreach($weekData as $d)
                        @php $c = $colorMap[$d['emotion']]; @endphp
                        <div style="flex:1; display:flex; flex-direction:column; align-items:center; gap:6px; height:100%;">
                            <span style="font-size:11px; font-weight:700; color:{{ $c['text'] }};">{{ $d['score'] }}</span>
                            <div style="flex:1; width:100%; display:flex; align-items:flex-end; min-height:0;">
                                <div style="width:100%; height:{{ ($d['score'] / 10) * 100 }}%; background:{{ $c['bar'] }}; border-radius:6px 6px 2px 2px; min-height:8px; transition:height 0.8s ease; position:relative;"
                                    title="{{ $d['day'] }}: ({{ $d['score'] }}/10)">
                                    <div style="position:absolute; inset:0; background:linear-gradient(to top, transparent, rgba(255,255,255,0.15)); border-radius:inherit;"></div>
                                </div>
                            </div>
                            <span style="font-size:11px; font-weight:700; color:#9CA3AF;">{{ $d['day'] }}</span>
                        </div>
                        @endforeach
                    </div>
                    {{-- Score legend --}}
                    <div style="display:flex; justify-content:space-between; margin-top:12px; padding-top:12px; border-top:1px solid #E5E7EB;">
                        @foreach([['#02838D','Stabil (7-10)'],['#F59E0B','Distress (4-6)'],['#D92D20','Krisis (1-3)']] as [$color,$label])
                        <div style="display:flex; align-items:center; gap:6px;">
                            <div style="width:10px; height:10px; border-radius:50%; background:{{ $color }}; flex-shrink:0;"></div>
                            <span style="font-size:11px; color:#9CA3AF; font-weight:600;">{{ $label }}</span>
                        </div>
                        @endforeach
                    </div>
                </div>

                {{-- Distribution --}}
                <div class="card" style="padding:24px; border-color:#E5E7EB; border-radius:16px;" id="distribution-card">
                    <h2 style="font-size:15px; font-weight:800; color:#231F20; margin:0 0 20px; display:flex; align-items:center; gap:8px;">
                        <span style="color:#4FAFB6;">
                            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                        </span>
                        Distribusi Emosi
                    </h2>
                    @php
                                <span style="font-size:13px; font-weight:700; color:#231F20; display:flex; align-items:center; gap:6px;">{{ $item['label'] }}</span>
                                <span style="font-size:13px; font-weight:800; color:{{ $item['color'] }};">{{ $item['pct'] }}%</span>
                            </div>
                            <div style="height:8px; background:#E5E7EB; border-radius:9999px; overflow:hidden;">
                                <div style="height:100%; width:{{ $item['pct'] }}%; background:{{ $item['bar'] }}; border-radius:9999px; transition:width 1s ease;"></div>
                            </div>
                            <p style="font-size:11px; color:#9CA3AF; margin:4px 0 0; font-weight:600;">{{ $item['count'] }} sesi</p>
                        </div>
                        @endforeach
                    </div>

                    {{-- Insight box --}}
                    <div style="margin-top:20px; padding:14px; background:#F3FBFC; border:1px solid rgba(2,131,141,0.15); border-radius:10px;">
                        <p style="font-size:12px; color:#5B5758; margin:0; line-height:1.6;">
                            <span style="font-weight:700; color:#231F20;">Insight:</span> Kondisi emosionalmu sebagian besar stabil minggu ini. Pertahankan!
                        </p>
                    </div>
                </div>
            </div>

            {{-- ── WEEKLY CALENDAR ── --}}
            <div class="card" style="padding:24px; border-color:#E5E7EB; border-radius:16px; margin-bottom:24px;">
                <div style="display:flex; align-items:center; justify-content:space-between; margin-bottom:20px; flex-wrap:wrap; gap:10px;">
                    <h2 style="font-size:15px; font-weight:800; color:#231F20; margin:0; display:flex; align-items:center; gap:8px;">
                        <span style="color:#02838D;">
                            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                        </span>
                        Kalender Emosi Mingguan
                    </h2>
                    <div style="display:flex; align-items:center; gap:14px; flex-wrap:wrap;">
                        @foreach([['#02838D','Stabil'],['#F59E0B','Distress'],['#D92D20','Krisis']] as [$color,$label])
                        <span style="display:flex; align-items:center; gap:5px; font-size:11px; font-weight:600; color:#9CA3AF;">
                            <span style="width:8px; height:8px; border-radius:50%; background:{{ $color }}; display:inline-block;"></span>
                            {{ $label }}
                        </span>
                        @endforeach
                    </div>
                </div>

                <div style="display:grid; grid-template-columns:repeat(7, 1fr); gap:10px;">
                    @foreach($weekData as $d)
                    @php
                        $c = $colorMap[$d['emotion']];
                        $style = "border-color:{$c['bar']}30; background:{$c['bg']};";
                    @endphp
                    <div style="display:flex; flex-direction:column; align-items:center; gap:6px; cursor:default;" title="{{ $d['day'] }} (skor {{ $d['score'] }})">
                        <span style="font-size:11px; font-weight:700; color:#9CA3AF;">{{ $d['day'] }}</span>
                        <div style="width:44px; height:44px; border-radius:12px; display:flex; align-items:center; justify-content:center; border:1.5px solid; transition:transform 0.15s ease; color:{{ $c['bar'] }}; {{ $style }}"
                            onmouseover="this.style.transform='scale(1.1) translateY(-2px)';"
                            onmouseout="this.style.transform='scale(1)';">
                            {!! $d['icon'] !!}
                        </div>
                        <span style="font-size:11px; font-weight:800; color:{{ $c['text'] }};">{{ $d['score'] }}</span>
                    </div>
                    @endforeach
                </div>
            </div>

            {{-- ── LOG MOOD TODAY ── --}}
            <div class="card" style="padding:24px; border-color:rgba(2,131,141,0.2); border-radius:16px; background:linear-gradient(135deg, #F3FBFC, rgba(2,131,141,0.03));">
                <h2 style="font-size:16px; font-weight:800; color:#231F20; margin:0 0 16px; display:flex; align-items:center; gap:6px;"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#02838D" stroke-width="2.5"><path d="M12 20h9"/><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"/></svg> Catat Mood Hari Ini</h2>
                <p style="font-size:14px; color:#5B5758; margin:0 0 20px; line-height:1.5;">Bagaimana perasaanmu sekarang? Pilih emoji yang paling sesuai.</p>

                <div style="display:flex; flex-wrap:wrap; gap:12px; margin-bottom:20px;">
                    @foreach([
                        ['<svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M8 14s1.5 2 4 2 4-2 4-2"/><line x1="9" y1="9" x2="9.01" y2="9"/><line x1="15" y1="9" x2="15.01" y2="9"/></svg>','Sangat Baik','Hijau', '#02838D'],
                        ['<svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M8 14s1.5 2 4 2 4-2 4-2"/><line x1="9" y1="9" x2="9.01" y2="9"/><line x1="15" y1="9" x2="15.01" y2="9"/></svg>','Baik','Hijau', '#4FAFB6'],
                        ['<svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="8" y1="15" x2="16" y2="15"/><line x1="9" y1="9" x2="9.01" y2="9"/><line x1="15" y1="9" x2="15.01" y2="9"/></svg>','Biasa','Kuning', '#F59E0B'],
                        ['<svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M16 16s-1.5-2-4-2-4 2-4 2"/><line x1="9" y1="9" x2="9.01" y2="9"/><line x1="15" y1="9" x2="15.01" y2="9"/></svg>','Kurang Baik','Kuning', '#F59E0B'],
                        ['<svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M16 16s-1.5-2-4-2-4 2-4 2"/><line x1="9" y1="9" x2="9.01" y2="9"/><line x1="15" y1="9" x2="15.01" y2="9"/><path d="M9 4L8 6"/></svg>','Tidak Baik','Merah', '#D92D20'],
                    ] as [$icon,$label,$cat, $iconColor])
                    <button onclick="selectMood(this, '{{ $cat }}')"
                        style="display:flex; flex-direction:column; align-items:center; gap:6px; padding:14px 16px; border-radius:12px; border:1.5px solid #E5E7EB; background:#FFFFFF; cursor:pointer; transition:all 0.2s ease; font-family:'Nunito',sans-serif; min-width:72px;"
                        onmouseover="if(!this.classList.contains('selected')){ this.style.borderColor='rgba(2,131,141,0.4)'; this.style.backgroundColor='rgba(2,131,141,0.04)'; }"
                        onmouseout="if(!this.classList.contains('selected')){ this.style.borderColor='#E5E7EB'; this.style.backgroundColor='#FFFFFF'; }">
                        <span style="display:flex; align-items:center; justify-content:center; color:{{ $iconColor }};">{!! $icon !!}</span>
                        <span style="font-size:11px; font-weight:700; color:#5B5758;">{{ $label }}</span>
                    </button>
                    @endforeach
                </div>

                <div style="margin-bottom:16px;">
                    <label style="display:block; font-size:13px; font-weight:700; color:#5B5758; margin-bottom:8px; text-transform:uppercase; letter-spacing:0.05em; font-size:11px;">Catatan (opsional)</label>
                    <textarea id="mood-note" placeholder="Ceritakan sedikit apa yang kamu rasakan hari ini..."
                        style="width:100%; resize:none; height:80px; border:1px solid #E5E7EB; border-radius:10px; padding:12px 14px; font-size:14px; font-family:'Nunito',sans-serif; color:#231F20; outline:none; box-sizing:border-box; transition:border-color 0.2s ease, box-shadow 0.2s ease;"
                        onfocus="this.style.borderColor='#02838D'; this.style.boxShadow='0 0 0 3px rgba(2,131,141,0.1)';"
                        onblur="this.style.borderColor='#E5E7EB'; this.style.boxShadow='none';"></textarea>
                </div>

                <button id="save-mood-btn" onclick="saveMood()" class="btn-primary" style="gap:8px;" disabled>
                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"/><polyline points="17 21 17 13 7 13 7 21"/><polyline points="7 3 7 8 15 8"/></svg>
                    Simpan Mood
                </button>
                <div id="mood-saved" style="display:none; margin-top:12px;" class="alert-success">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                    Mood berhasil disimpan! Terus semangat.
                </div>
            </div>

        </div>
    </div>

    {{-- ░░ MOBILE SIDEBAR OVERLAY ░░ --}}
    <div id="mobile-overlay" onclick="closeMobileSidebar()" style="display:none; position:fixed; inset:0; background:rgba(35,31,32,0.4); backdrop-filter:blur(4px); z-index:60;"></div>
    <aside id="sidebar-mobile" style="position:fixed; top:0; left:-100%; bottom:0; width:272px; background:#FFFFFF; border-right:1px solid #E5E7EB; display:flex; flex-direction:column; padding:24px; z-index:70; transition:left 0.3s cubic-bezier(0.16,1,0.3,1); overflow-y:auto;">
        <div style="display:flex; align-items:center; justify-content:space-between; margin-bottom:28px;">
            <span style="font-weight:800; font-size:17px; color:#231F20;">Aether</span>
            <button onclick="closeMobileSidebar()" style="background:none; border:1px solid #E5E7EB; border-radius:8px; padding:7px; cursor:pointer; color:#5B5758;" aria-label="Tutup menu">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M18 6L6 18M6 6l12 12"/></svg>
            </button>
        </div>
        <nav style="display:flex; flex-direction:column; gap:4px; flex:1;">
            <a href="{{ route('chat') }}" class="sidebar-nav-item">
                <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="margin-right:6px;"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
                Chat
            </a>
            <a href="{{ route('mood') }}" class="sidebar-nav-item active">
                <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="margin-right:6px;"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/></svg>
                Mood Journal
            </a>
            <a href="#" class="sidebar-nav-item">
                <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="margin-right:6px;"><path d="M12 2L2 7l10 5 10-5-10-5z"/><path d="M2 17l10 5 10-5"/><path d="M2 12l10 5 10-5"/></svg>
                Resource Center
            </a>
        </nav>
        <div style="margin-top:auto; padding-top:16px; border-top:1px solid #E5E7EB;">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" style="width:100%; display:flex; align-items:center; gap:10px; padding:10px 12px; border-radius:10px; background:none; border:none; font-size:14px; font-weight:600; color:#D92D20; cursor:pointer; font-family:'Nunito',sans-serif;">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 21H5a2 2 0 01-2-2V5a2 2 0 012-2h4M16 17l5-5-5-5M21 12H9"/></svg>
                    Keluar
                </button>
            </form>
        </div>
    </aside>

</div>
@endsection

@push('scripts')
<script>
// ── Responsive ──
function adjustLayout() {
    const sidebar = document.getElementById('sidebar-desktop');
    const main = document.getElementById('mood-main');
    const mobileTopbar = document.getElementById('mobile-topbar');
    const chartsGrid = document.getElementById('charts-grid');

    if (window.innerWidth < 768) {
        if (sidebar) sidebar.style.display = 'none';
        if (main) main.style.marginLeft = '0';
        if (mobileTopbar) mobileTopbar.style.display = 'flex';
    } else {
        if (sidebar) sidebar.style.display = 'flex';
        if (main) main.style.marginLeft = '272px';
        if (mobileTopbar) mobileTopbar.style.display = 'none';
    }

    if (chartsGrid) {
        chartsGrid.style.gridTemplateColumns = window.innerWidth >= 900 ? '1fr 380px' : '1fr';
    }
}
adjustLayout();
window.addEventListener('resize', adjustLayout);

// ── Mobile sidebar ──
function openMobileSidebar() {
    document.getElementById('sidebar-mobile').style.left = '0';
    document.getElementById('mobile-overlay').style.display = 'block';
    document.body.style.overflow = 'hidden';
}
function closeMobileSidebar() {
    document.getElementById('sidebar-mobile').style.left = '-100%';
    document.getElementById('mobile-overlay').style.display = 'none';
    document.body.style.overflow = '';
}

// ── Mood selection ──
let selectedMoodCat = null;
function selectMood(btn, cat) {
    selectedMoodCat = cat;
    document.querySelectorAll('[onclick^="selectMood"]').forEach(b => {
        b.style.borderColor = '#E5E7EB';
        b.style.backgroundColor = '#FFFFFF';
        b.classList.remove('selected');
    });
    btn.style.borderColor = '#02838D';
    btn.style.backgroundColor = 'rgba(2,131,141,0.08)';
    btn.classList.add('selected');

    const saveBtn = document.getElementById('save-mood-btn');
    saveBtn.disabled = false;
    saveBtn.style.opacity = '1';
    saveBtn.style.cursor = 'pointer';
}

// ── Save mood ──
function saveMood() {
    if (!selectedMoodCat) return;
    const note = document.getElementById('mood-note').value;
    const saveBtn = document.getElementById('save-mood-btn');
    const savedMsg = document.getElementById('mood-saved');

    saveBtn.disabled = true;
    saveBtn.innerHTML = `<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="animation:spin-slow 0.8s linear infinite;"><path d="M12 2v4M12 18v4M4.93 4.93l2.83 2.83M16.24 16.24l2.83 2.83M2 12h4M18 12h4M4.93 19.07l2.83-2.83M16.24 7.76l2.83-2.83"/></svg> Menyimpan...`;

    // Simulate save (replace with real API call)
    setTimeout(() => {
        savedMsg.style.display = 'flex';
        saveBtn.style.display = 'none';
        // Reset selection
        selectedMoodCat = null;
        document.getElementById('mood-note').value = '';
        document.querySelectorAll('[onclick^="selectMood"]').forEach(b => {
            b.style.borderColor = '#E5E7EB';
            b.style.backgroundColor = '#FFFFFF';
            b.classList.remove('selected');
        });
    }, 900);
}
</script>
@endpush
