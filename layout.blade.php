<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mini Stock Manager</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Space+Mono:wght@400;700&family=Syne:wght@700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg: #0f0f0f;
            --surface: #1a1a1a;
            --border: #2e2e2e;
            --accent: #c8ff00;
            --accent-dim: #9abf00;
            --text: #e8e8e8;
            --muted: #666;
        }

        * { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            background-color: var(--bg);
            color: var(--text);
            font-family: 'Space Mono', monospace;
            min-height: 100vh;
            display: flex;
            overflow-x: hidden;
        }

        /* ─── Sidebar ─── */
        aside {
            width: 260px;
            min-height: 100vh;
            background: var(--surface);
            border-right: 3px solid var(--accent);
            display: flex;
            flex-direction: column;
            padding: 0;
            position: sticky;
            top: 0;
            flex-shrink: 0;
        }

        .sidebar-header {
            padding: 28px 24px 20px;
            border-bottom: 2px solid var(--border);
            position: relative;
            overflow: hidden;
        }

        .sidebar-header::before {
            content: '';
            position: absolute;
            top: -20px;
            right: -20px;
            width: 80px;
            height: 80px;
            background: var(--accent);
            opacity: 0.06;
            border-radius: 50%;
        }

        .sidebar-brand {
            font-family: 'Syne', sans-serif;
            font-weight: 800;
            font-size: 18px;
            letter-spacing: -0.5px;
            color: #fff;
            line-height: 1.2;
        }

        .sidebar-brand span {
            color: var(--accent);
        }

        .sidebar-tagline {
            font-size: 10px;
            color: var(--muted);
            letter-spacing: 2px;
            text-transform: uppercase;
            margin-top: 4px;
        }

        .sidebar-section {
            padding: 16px 16px 8px;
        }

        .sidebar-section-label {
            font-size: 9px;
            letter-spacing: 3px;
            text-transform: uppercase;
            color: var(--muted);
            padding: 0 8px;
            margin-bottom: 8px;
        }

        nav a {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px 12px;
            border-radius: 4px;
            text-decoration: none;
            color: #aaa;
            font-size: 13px;
            letter-spacing: 0.3px;
            transition: all 0.15s ease;
            border: 1px solid transparent;
            position: relative;
        }

        nav a::before {
            content: '';
            width: 6px;
            height: 6px;
            border: 1.5px solid var(--muted);
            border-radius: 1px;
            flex-shrink: 0;
            transition: all 0.15s ease;
        }

        nav a:hover,
        nav a.active {
            color: var(--accent);
            background: rgba(200, 255, 0, 0.06);
            border-color: rgba(200, 255, 0, 0.15);
        }

        nav a:hover::before,
        nav a.active::before {
            border-color: var(--accent);
            background: var(--accent);
        }

        .sidebar-footer {
            margin-top: auto;
            padding: 16px;
            border-top: 2px solid var(--border);
            font-size: 10px;
            color: var(--muted);
            letter-spacing: 1px;
        }

        .status-dot {
            display: inline-block;
            width: 6px;
            height: 6px;
            background: var(--accent);
            border-radius: 50%;
            margin-right: 6px;
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.3; }
        }

        /* ─── Main ─── */
        main {
            flex: 1;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            background: var(--bg);
        }

        /* Top bar */
        .topbar {
            height: 56px;
            border-bottom: 2px solid var(--border);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 28px;
            background: var(--surface);
            position: sticky;
            top: 0;
            z-index: 10;
        }

        .topbar-left {
            font-size: 11px;
            letter-spacing: 2px;
            text-transform: uppercase;
            color: var(--muted);
        }

        .topbar-right {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .badge {
            font-family: 'Space Mono', monospace;
            font-size: 10px;
            padding: 4px 10px;
            border-radius: 2px;
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        .badge-accent {
            background: var(--accent);
            color: #0f0f0f;
            font-weight: 700;
        }

        .badge-outline {
            border: 1px solid var(--border);
            color: var(--muted);
        }

        /* Content area */
        .content-area {
            flex: 1;
            padding: 32px 28px;
        }

        /* Corner decoration */
        .corner-mark {
            position: fixed;
            bottom: 20px;
            right: 24px;
            font-size: 9px;
            letter-spacing: 3px;
            text-transform: uppercase;
            color: var(--border);
            writing-mode: vertical-rl;
        }
    </style>
</head>
<body>

    {{-- Sidebar --}}
    <aside>
        <div class="sidebar-header">
            <div class="sidebar-brand">Stock<span>MGR</span></div>
            <div class="sidebar-tagline">Inventory System v1.0</div>
        </div>

        <div class="sidebar-section">
            <div class="sidebar-section-label">Menu Utama</div>
            <nav>
                <a href="{{ route('items.index') }}" class="{{ request()->routeIs('items.*') ? 'active' : '' }}">
                    Data Barang
                </a>
            </nav>
        </div>

        <div class="sidebar-footer">
            <span class="status-dot"></span>SYSTEM ONLINE
        </div>
    </aside>

    {{-- Main Content --}}
    <main>
        <div class="topbar">
            <div class="topbar-left">Mini Stock Manager</div>
            <div class="topbar-right">
                <span class="badge badge-outline">{{ date('d M Y') }}</span>
                <span class="badge badge-accent">Active</span>
            </div>
        </div>

        <div class="content-area">
            @yield('content')
        </div>
    </main>

    <div class="corner-mark">MSM &copy; {{ date('Y') }}</div>

</body>
</html>
