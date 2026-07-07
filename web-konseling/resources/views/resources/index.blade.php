@extends('layouts.app')

@section('title', 'Pusat Sumber Daya — Aether')

@section('content')
<div style="min-height:100vh; background-color:#FAFAFA; display:flex; font-family:'Nunito',sans-serif; color:#231F20;">

    {{-- ░░ LEFT SIDEBAR ░░ --}}
    <aside style="position:fixed; top:0; left:0; bottom:0; width:272px; background:#FAFAFA; border-right:1px solid #E5E7EB; display:flex; flex-direction:column; padding:20px; z-index:40; overflow-y:auto;">

        {{-- Logo --}}
        <div style="display:flex; align-items:center; justify-content:space-between; margin-bottom:28px; padding:0 8px;">
            <a href="{{ url('/') }}" style="text-decoration:none; display:flex; align-items:center; gap:10px;">
                <div style="width:32px; height:32px; background:linear-gradient(135deg, #02838D, #4FAFB6); border-radius:8px; display:flex; align-items:center; justify-content:center;">
                    <span style="color:#FFF; font-weight:900; font-family:'Playfair Display', serif; font-size:18px;">Æ</span>
                </div>
                <span style="font-family:'Playfair Display', serif; font-weight:800; font-size:20px; color:#231F20;">Aether</span>
            </a>
        </div>

        {{-- Navigation --}}
        <nav style="display:flex; flex-direction:column; gap:6px;">
            <a href="{{ route('chat') }}" style="display:flex; align-items:center; gap:12px; padding:12px 16px; background:transparent; border-radius:12px; color:#5B5758; text-decoration:none; font-size:14px; font-weight:600; transition:all 0.2s;" onmouseover="this.style.color='#02838D'; this.style.background='#F3FBFC';" onmouseout="this.style.color='#5B5758'; this.style.background='transparent';">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
                Chat
            </a>
            <a href="{{ route('mood') }}" style="display:flex; align-items:center; gap:12px; padding:12px 16px; background:transparent; border-radius:12px; color:#5B5758; text-decoration:none; font-size:14px; font-weight:600; transition:all 0.2s;" onmouseover="this.style.color='#02838D'; this.style.background='#F3FBFC';" onmouseout="this.style.color='#5B5758'; this.style.background='transparent';">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/></svg>
                Mood Tracking
            </a>
            <a href="{{ route('resources.index') }}" style="display:flex; align-items:center; gap:12px; padding:12px 16px; background:#F3FBFC; border-radius:12px; color:#02838D; text-decoration:none; font-size:14px; font-weight:700; border:1px solid rgba(2,131,141,0.1);">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#02838D" stroke-width="2"><path d="M12 2L2 7l10 5 10-5-10-5z"/><path d="M2 17l10 5 10-5"/><path d="M2 12l10 5 10-5"/></svg>
                Resource Center
            </a>
        </nav>

        {{-- User Profile Area --}}
        <div style="margin-top:auto; padding-top:20px;">
            <div style="display:flex; align-items:center; gap:12px; padding:12px; border-radius:16px; background:#FFFFFF; border:1px solid #E5E7EB; box-shadow:0 2px 4px rgba(0,0,0,0.02);">
                <div style="width:40px; height:40px; border-radius:12px; background:#F3FBFC; display:flex; align-items:center; justify-content:center; color:#02838D; font-weight:800; font-size:16px;">
                    {{ strtoupper(substr(auth()->user()->name ?? 'U', 0, 1)) }}
                </div>
                <div style="flex:1; min-width:0;">
                    <p style="margin:0; font-size:14px; font-weight:700; color:#231F20; white-space:nowrap; overflow:hidden; text-overflow:ellipsis;">{{ auth()->user()->name ?? 'Guest' }}</p>
                </div>
                <form method="POST" action="{{ route('logout') }}" style="margin:0;">
                    @csrf
                    <button type="submit" style="background:none; border:none; cursor:pointer; color:#9CA3AF; padding:8px; border-radius:8px; transition:all 0.2s;" onmouseover="this.style.color='#EF4444'; this.style.background='#FEF2F2';" onmouseout="this.style.color='#9CA3AF'; this.style.background='none';">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" y1="12" x2="9" y2="12"/></svg>
                    </button>
                </form>
            </div>
        </div>
    </aside>

    {{-- ░░ MAIN CONTENT ░░ --}}
    <main style="flex:1; margin-left:272px; padding:40px 60px; max-width:1200px;">
        <header style="margin-bottom:40px;">
            <h1 style="font-family:'Proxima Nova Condensed', sans-serif; font-size:40px; font-weight:700; color:#231F20; margin:0 0 8px; line-height:1.15;">Pusat Sumber Daya</h1>
            <p style="font-size:16px; color:#5B5758; margin:0; line-height:1.5;">Kumpulan artikel, video, dan layanan darurat terkurasi untuk membantu menjaga kesehatan mentalmu.</p>
        </header>

        <div style="display:grid; grid-template-columns:repeat(auto-fill, minmax(300px, 1fr)); gap:24px;">
            @foreach($resources as $resource)
            <a href="{{ $resource->url }}" target="_blank" style="text-decoration:none; display:flex; flex-direction:column; background:#FFFFFF; border:1px solid #E5E7EB; border-radius:16px; overflow:hidden; transition:all 0.2s; box-shadow:0 4px 12px rgba(0,0,0,0.02);" onmouseover="this.style.transform='translateY(-4px)'; this.style.boxShadow='0 12px 24px rgba(0,0,0,0.06)'; this.style.borderColor='#02838D';" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 12px rgba(0,0,0,0.02)'; this.style.borderColor='#E5E7EB';">
                
                @if($resource->thumbnail_url)
                <div style="height:160px; background-image:url('{{ $resource->thumbnail_url }}'); background-size:cover; background-position:center;"></div>
                @else
                <div style="height:160px; background:#F3FBFC; display:flex; align-items:center; justify-content:center; color:#02838D;">
                    @if($resource->type === 'artikel')
                        <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                    @elseif($resource->type === 'kontak')
                        <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                    @endif
                </div>
                @endif
                
                <div style="padding:20px; display:flex; flex-direction:column; flex:1;">
                    <div style="display:flex; justify-content:space-between; align-items:flex-start; margin-bottom:12px;">
                        <span style="background:rgba(2,131,141,0.1); color:#02838D; font-size:11px; font-weight:700; padding:4px 10px; border-radius:99px; text-transform:uppercase; letter-spacing:0.05em;">
                            {{ $resource->category }}
                        </span>
                        
                        @if($resource->type === 'video')
                        <span style="color:#EF4444;" title="Video">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><polygon points="10 8 16 12 10 16 10 8"></polygon></svg>
                        </span>
                        @elseif($resource->type === 'artikel')
                        <span style="color:#02838D;" title="Artikel">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline></svg>
                        </span>
                        @else
                        <span style="color:#10B981;" title="Kontak Darurat">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                        </span>
                        @endif
                    </div>
                    
                    <h3 style="font-size:16px; font-weight:700; color:#231F20; margin:0 0 8px; line-height:1.4;">{{ $resource->title }}</h3>
                    <p style="font-size:14px; color:#5B5758; margin:0; line-height:1.55;">{{ $resource->description }}</p>
                </div>
            </a>
            @endforeach
        </div>
    </main>

</div>
@endsection
