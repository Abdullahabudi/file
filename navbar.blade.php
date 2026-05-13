<style>
    .nav-root {
        font-family: 'Space Mono', monospace;
        background: #1a1a1a;
        border-bottom: 2px solid #2e2e2e;
        position: sticky;
        top: 0;
        z-index: 50;
    }

    .nav-container {
        max-width: 1280px;
        margin: 0 auto;
        padding: 0 24px;
        height: 56px;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .nav-left {
        display: flex;
        align-items: center;
        gap: 28px;
    }

    .nav-logo a {
        display: flex;
        align-items: center;
        text-decoration: none;
        gap: 10px;
    }

    .nav-logo-text {
        font-family: 'Syne', sans-serif;
        font-weight: 800;
        font-size: 17px;
        letter-spacing: -0.5px;
        color: #fff;
        line-height: 1;
    }

    .nav-logo-text span { color: #c8ff00; }

    .nav-logo svg {
        height: 26px;
        width: auto;
        fill: #c8ff00;
    }

    .nav-divider {
        width: 1px;
        height: 20px;
        background: #2e2e2e;
    }

    .nav-links {
        display: flex;
        align-items: center;
        gap: 2px;
    }

    .nav-link {
        display: flex;
        align-items: center;
        gap: 7px;
        padding: 6px 12px;
        border-radius: 3px;
        font-size: 11px;
        font-weight: 400;
        letter-spacing: 1px;
        text-transform: uppercase;
        color: #666;
        text-decoration: none;
        border: 1px solid transparent;
        transition: all 0.15s ease;
    }

    .nav-link:hover {
        color: #c8ff00;
        background: rgba(200,255,0,0.05);
        border-color: rgba(200,255,0,0.12);
    }

    .nav-link.active {
        color: #c8ff00;
        background: rgba(200,255,0,0.08);
        border-color: rgba(200,255,0,0.2);
    }

    .nav-link svg {
        width: 14px;
        height: 14px;
        stroke: currentColor;
        flex-shrink: 0;
    }

    /* Dropdown */
    .nav-right { position: relative; }

    .dropdown-trigger {
        display: flex;
        align-items: center;
        gap: 8px;
        padding: 5px 10px 5px 6px;
        border-radius: 3px;
        border: 1px solid #2e2e2e;
        background: #111;
        cursor: pointer;
        font-family: 'Space Mono', monospace;
        font-size: 11px;
        letter-spacing: 0.5px;
        color: #aaa;
        transition: all 0.15s ease;
    }

    .dropdown-trigger:hover {
        border-color: #c8ff00;
        color: #e8e8e8;
    }

    .avatar {
        width: 26px;
        height: 26px;
        border-radius: 2px;
        background: #c8ff00;
        color: #0f0f0f;
        font-size: 10px;
        font-weight: 700;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        letter-spacing: 0.5px;
    }

    .trigger-name {
        max-width: 110px;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }

    .chevron {
        width: 12px;
        height: 12px;
        stroke: #555;
        transition: transform 0.2s;
        flex-shrink: 0;
    }

    .dropdown-menu {
        position: absolute;
        right: 0;
        top: calc(100% + 6px);
        background: #111;
        border: 1.5px solid #2e2e2e;
        border-radius: 4px;
        padding: 6px;
        min-width: 200px;
        box-shadow: 0 8px 32px rgba(0,0,0,0.5);
        display: none;
        animation: dropIn 0.15s ease both;
    }

    @keyframes dropIn {
        from { opacity: 0; transform: translateY(-6px); }
        to   { opacity: 1; transform: translateY(0); }
    }

    .dropdown-menu.open { display: block; }

    .dropdown-user-info {
        padding: 10px 10px 12px;
        border-bottom: 1px solid #222;
        margin-bottom: 6px;
    }

    .dropdown-user-label {
        font-size: 8px;
        letter-spacing: 2.5px;
        text-transform: uppercase;
        color: #444;
        margin-bottom: 4px;
    }

    .dropdown-user-name {
        font-size: 13px;
        font-weight: 700;
        color: #e8e8e8;
        font-family: 'Syne', sans-serif;
    }

    .dropdown-user-email {
        font-size: 11px;
        color: #555;
        margin-top: 2px;
        letter-spacing: 0.2px;
    }

    .dropdown-item {
        display: flex;
        align-items: center;
        gap: 8px;
        width: 100%;
        padding: 7px 10px;
        border-radius: 3px;
        font-family: 'Space Mono', monospace;
        font-size: 11px;
        letter-spacing: 0.5px;
        color: #888;
        text-decoration: none;
        background: none;
        border: none;
        cursor: pointer;
        text-align: left;
        transition: all 0.12s ease;
    }

    .dropdown-item:hover {
        background: rgba(200,255,0,0.06);
        color: #c8ff00;
    }

    .dropdown-item.danger:hover {
        background: rgba(255,96,96,0.08);
        color: #ff6060;
    }

    .dropdown-item svg {
        width: 13px;
        height: 13px;
        stroke: currentColor;
        flex-shrink: 0;
    }

    .dropdown-divider {
        height: 1px;
        background: #1e1e1e;
        margin: 6px 0;
    }

    /* Hamburger */
    .hamburger {
        display: none;
        align-items: center;
        justify-content: center;
        width: 34px;
        height: 34px;
        border-radius: 3px;
        border: 1px solid #2e2e2e;
        background: transparent;
        cursor: pointer;
        color: #666;
        transition: all 0.15s;
    }

    .hamburger:hover {
        border-color: #c8ff00;
        color: #c8ff00;
    }

    .hamburger svg { width: 16px; height: 16px; stroke: currentColor; }

    /* Mobile menu */
    .mobile-menu {
        display: none;
        border-top: 1px solid #222;
        padding: 10px 16px 16px;
        background: #111;
    }

    .mobile-menu.open { display: block; }

    .mobile-nav-link {
        display: flex;
        align-items: center;
        gap: 8px;
        padding: 9px 12px;
        border-radius: 3px;
        font-family: 'Space Mono', monospace;
        font-size: 11px;
        letter-spacing: 1px;
        text-transform: uppercase;
        color: #666;
        text-decoration: none;
        margin-bottom: 2px;
        border: 1px solid transparent;
        transition: all 0.12s ease;
    }

    .mobile-nav-link:hover {
        background: rgba(200,255,0,0.05);
        border-color: rgba(200,255,0,0.12);
        color: #c8ff00;
    }

    .mobile-nav-link.active {
        background: rgba(200,255,0,0.08);
        border-color: rgba(200,255,0,0.2);
        color: #c8ff00;
    }

    .mobile-nav-link svg { width: 13px; height: 13px; stroke: currentColor; }

    .mobile-user-section {
        border-top: 1px solid #222;
        padding-top: 12px;
        margin-top: 10px;
    }

    .mobile-user-info {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 4px 12px 12px;
    }

    .mobile-user-name { font-size: 13px; font-weight: 700; color: #e8e8e8; font-family: 'Syne', sans-serif; }
    .mobile-user-email { font-size: 11px; color: #555; letter-spacing: 0.2px; }

    @media (max-width: 640px) {
        .nav-links, .nav-right, .nav-divider { display: none; }
        .hamburger { display: flex; }
    }
</style>

<nav class="nav-root" x-data="{ open: false, dropOpen: false }">
    <div class="nav-container">
        <!-- Left: Logo + Links -->
        <div class="nav-left">
            <div class="nav-logo">
                <a href="{{ route('dashboard') }}">
                    <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                    <span class="nav-logo-text">Stock<span>MGR</span></span>
                </a>
            </div>

            <div class="nav-divider"></div>

            <div class="nav-links">
                <a href="{{ route('dashboard') }}"
                   class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" /></svg>
                    Dashboard
                </a>
                <a href="{{ route('items.index') }}"
                   class="nav-link {{ request()->routeIs('items.*') ? 'active' : '' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" /></svg>
                    Inventory
                </a>
            </div>
        </div>

        <!-- Right: User Dropdown -->
        <div class="nav-right" x-data="{ dropOpen: false }">
            <button class="dropdown-trigger" @click="dropOpen = !dropOpen" @click.outside="dropOpen = false">
                <div class="avatar">{{ strtoupper(substr(Auth::user()->name, 0, 2)) }}</div>
                <span class="trigger-name">{{ Auth::user()->name }}</span>
                <svg class="chevron" :style="dropOpen ? 'transform:rotate(180deg)' : ''" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" /></svg>
            </button>

            <div class="dropdown-menu" :class="{ open: dropOpen }">
                <div class="dropdown-user-info">
                    <div class="dropdown-user-label">Logged in as</div>
                    <div class="dropdown-user-name">{{ Auth::user()->name }}</div>
                    <div class="dropdown-user-email">{{ Auth::user()->email }}</div>
                </div>

                <a href="{{ route('profile.edit') }}" class="dropdown-item">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" /></svg>
                    Profile
                </a>

                <div class="dropdown-divider"></div>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="dropdown-item danger">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15m3 0 3-3m0 0-3-3m3 3H9" /></svg>
                        Keluar
                    </button>
                </form>
            </div>
        </div>

        <!-- Hamburger -->
        <button class="hamburger" @click="open = !open">
            <svg x-show="!open" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/></svg>
            <svg x-show="open" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
        </button>
    </div>

    <!-- Mobile Menu -->
    <div class="mobile-menu" :class="{ open: open }">
        <a href="{{ route('dashboard') }}" class="mobile-nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" /></svg>
            Dashboard
        </a>
        <a href="{{ route('items.index') }}" class="mobile-nav-link {{ request()->routeIs('items.*') ? 'active' : '' }}">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" /></svg>
            Inventory
        </a>

        <div class="mobile-user-section">
            <div class="mobile-user-info">
                <div class="avatar">{{ strtoupper(substr(Auth::user()->name, 0, 2)) }}</div>
                <div>
                    <div class="mobile-user-name">{{ Auth::user()->name }}</div>
                    <div class="mobile-user-email">{{ Auth::user()->email }}</div>
                </div>
            </div>

            <a href="{{ route('profile.edit') }}" class="mobile-nav-link">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" /></svg>
                Profile
            </a>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="mobile-nav-link danger" style="width:100%;border:none;cursor:pointer;font-family:inherit;background:none;">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15m3 0 3-3m0 0-3-3m3 3H9" /></svg>
                    Keluar
                </button>
            </form>
        </div>
    </div>
</nav>
