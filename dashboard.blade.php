<x-app-layout>
    <x-slot name="header">
        <div style="display:flex; align-items:center; justify-content:space-between;">
            <div>
                <div style="font-size:9px; letter-spacing:3px; text-transform:uppercase; color:#555; margin-bottom:4px;">
                    Dashboard / Overview
                </div>
                <h2 style="font-family:'Syne',sans-serif; font-weight:800; font-size:22px; color:#fff; letter-spacing:-0.5px; margin:0;">
                    Selamat Datang, <span style="color:#c8ff00;">{{ Auth::user()->name }}</span>
                </h2>
            </div>
            <span style="font-family:'Space Mono',monospace; font-size:10px; letter-spacing:2px; color:#444; text-transform:uppercase;">
                {{ now()->format('D, d M Y') }}
            </span>
        </div>
    </x-slot>

    <div style="padding: 36px 0;">
        <div style="max-width:900px; margin:0 auto; padding:0 24px;">

            {{-- Hero card --}}
            <div class="dash-hero">
                <div class="dash-hero-inner">
                    <div class="dash-corner tl"></div>
                    <div class="dash-corner tr"></div>
                    <div class="dash-corner bl"></div>
                    <div class="dash-corner br"></div>

                    <div class="dash-tag">SYS.STATUS — ONLINE</div>

                    <p class="dash-quote">
                        "Sistem stok siap dikelola.<br>Pantau terus arus barang Anda."
                    </p>

                    <div style="margin-top:32px;">
                        <a href="{{ route('items.index') }}" class="dash-cta">
                            Buka Inventaris <span class="dash-arrow">→</span>
                        </a>
                    </div>
                </div>
            </div>

            {{-- Stats row --}}
            <div class="dash-stats">
                <div class="stat-card">
                    <div class="stat-label">Status Sistem</div>
                    <div class="stat-value" style="color:#c8ff00;">AKTIF</div>
                </div>
                <div class="stat-card">
                    <div class="stat-label">Login Sebagai</div>
                    <div class="stat-value">{{ Auth::user()->name }}</div>
                </div>
                <div class="stat-card">
                    <div class="stat-label">Waktu Masuk</div>
                    <div class="stat-value">{{ now()->format('H:i') }}</div>
                </div>
            </div>

        </div>
    </div>

    <style>
        :root {
            --bg:       #0f0f0f;
            --surface:  #1a1a1a;
            --surface2: #161616;
            --border:   #2e2e2e;
            --border2:  #252525;
            --accent:   #c8ff00;
            --accent2:  #9abf00;
            --text:     #e8e8e8;
            --muted:    #555;
        }

        body { background: var(--bg) !important; }

        .min-h-screen, main, .bg-gray-100 {
            background: var(--bg) !important;
        }

        header.bg-white {
            background: var(--surface) !important;
            border-bottom: 2px solid var(--border2) !important;
            box-shadow: none !important;
        }

        .dash-hero {
            background: var(--surface2);
            border: 1.5px solid var(--border2);
            border-left: 4px solid var(--accent);
            border-radius: 4px;
            margin-bottom: 20px;
            position: relative;
            overflow: hidden;
        }

        .dash-hero::after {
            content: '';
            position: absolute;
            top: -80px; right: -80px;
            width: 280px; height: 280px;
            background: radial-gradient(circle, rgba(200,255,0,0.06) 0%, transparent 70%);
            pointer-events: none;
        }

        .dash-hero::before {
            content: '';
            position: absolute;
            inset: 0;
            background-image:
                linear-gradient(rgba(200,255,0,0.025) 1px, transparent 1px),
                linear-gradient(90deg, rgba(200,255,0,0.025) 1px, transparent 1px);
            background-size: 32px 32px;
            pointer-events: none;
        }

        .dash-hero-inner {
            padding: 40px 36px;
            position: relative;
            z-index: 1;
        }

        .dash-corner {
            position: absolute;
            width: 14px; height: 14px;
            z-index: 2;
        }
        .dash-corner.tl { top:10px; left:10px;     border-top:2px solid var(--accent2);    border-left:2px solid var(--accent2); }
        .dash-corner.tr { top:10px; right:10px;    border-top:2px solid var(--accent2);    border-right:2px solid var(--accent2); }
        .dash-corner.bl { bottom:10px; left:10px;  border-bottom:2px solid var(--accent2); border-left:2px solid var(--accent2); }
        .dash-corner.br { bottom:10px; right:10px; border-bottom:2px solid var(--accent2); border-right:2px solid var(--accent2); }

        .dash-tag {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-family: 'Space Mono', monospace;
            font-size: 9px;
            letter-spacing: 3px;
            text-transform: uppercase;
            color: var(--accent);
            margin-bottom: 20px;
        }

        .dash-tag::before {
            content: '';
            display: inline-block;
            width: 6px; height: 6px;
            background: var(--accent);
            border-radius: 50%;
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50%       { opacity: 0.2; }
        }

        .dash-quote {
            font-family: 'Syne', sans-serif;
            font-weight: 700;
            font-size: 26px;
            color: var(--text);
            letter-spacing: -0.5px;
            line-height: 1.35;
        }

        .dash-cta {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            font-family: 'Space Mono', monospace;
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 0.5px;
            padding: 11px 22px;
            background: var(--accent);
            color: #0f0f0f;
            text-decoration: none;
            border-radius: 3px;
            border: 2px solid var(--accent);
            transition: all 0.15s ease;
        }

        .dash-cta:hover {
            background: transparent;
            color: var(--accent);
        }

        .dash-arrow { transition: transform 0.15s ease; }
        .dash-cta:hover .dash-arrow { transform: translateX(4px); }

        .dash-stats {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 12px;
        }

        .stat-card {
            background: var(--surface2);
            border: 1.5px solid var(--border2);
            border-radius: 4px;
            padding: 18px 20px;
            transition: border-color 0.15s ease;
        }

        .stat-card:hover { border-color: var(--accent2); }

        .stat-label {
            font-family: 'Space Mono', monospace;
            font-size: 9px;
            letter-spacing: 2.5px;
            text-transform: uppercase;
            color: var(--muted);
            margin-bottom: 8px;
        }

        .stat-value {
            font-family: 'Syne', sans-serif;
            font-weight: 800;
            font-size: 18px;
            color: var(--text);
            letter-spacing: -0.3px;
        }

        @media (max-width: 540px) {
            .dash-stats { grid-template-columns: 1fr; }
            .dash-quote  { font-size: 20px; }
        }
    </style>

</x-app-layout>
