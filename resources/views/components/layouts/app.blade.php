<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? 'Dashboard' }} — Amazing Laundry Qatar</title>
    <meta name="description" content="Amazing Laundry Qatar — Professional Laundry Management & POS System">

    <!-- Premium Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles

    <style>
        body { font-family: 'Plus Jakarta Sans', system-ui, sans-serif; }

        /* ── Sidebar ── */
        .sidebar-bg {
            background: linear-gradient(180deg, #050e20 0%, #040c1a 60%, #020810 100%);
            border-right: 1px solid rgba(255,255,255,0.05);
        }

        .logo-ring {
            box-shadow: 0 0 0 1px rgba(13,148,136,0.4), 0 0 20px rgba(13,148,136,0.25);
        }

        .nav-link {
            display: flex; align-items: center; gap: 12px;
            padding: 11px 16px; border-radius: 12px;
            font-size: 14px; font-weight: 500;
            color: #64748b; text-decoration: none;
            position: relative; overflow: hidden;
            transition: all 0.2s ease;
        }

        .nav-link:hover { color: #e2e8f0; background: rgba(255,255,255,0.04); }

        .nav-link.active {
            color: #ffffff;
            background: linear-gradient(135deg, rgba(13,148,136,0.20), rgba(15,118,110,0.12));
            border-left: 3px solid #0d9488;
            padding-left: 13px;
            box-shadow: inset 0 0 0 1px rgba(13,148,136,0.12), 0 2px 12px rgba(13,148,136,0.12);
        }

        .nav-link.active .nav-icon { color: #2dd4bf; }
        .nav-link:hover .nav-icon { color: #94a3b8; }

        .nav-section-label {
            font-size: 10px; font-weight: 700; letter-spacing: 0.1em;
            color: #334155; text-transform: uppercase;
            padding: 0 16px; margin: 8px 0 4px;
        }

        /* ── Header ── */
        .header-bg {
            background: rgba(4,12,26,0.92);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(255,255,255,0.06);
        }

        /* ── User Profile Bottom ── */
        .user-profile-card {
            background: linear-gradient(135deg, rgba(13,148,136,0.08), rgba(15,118,110,0.04));
            border: 1px solid rgba(13,148,136,0.15);
            border-radius: 14px;
            padding: 12px;
        }

        /* ── Sidebar Scrollbar ── */
        .sidebar-scroll { overflow-y: auto; }
        .sidebar-scroll::-webkit-scrollbar { width: 3px; }
        .sidebar-scroll::-webkit-scrollbar-track { background: transparent; }
        .sidebar-scroll::-webkit-scrollbar-thumb { background: rgba(13,148,136,0.3); border-radius: 99px; }

        /* ── Badge pulse ── */
        @keyframes badge-pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.08); }
        }
        .badge-new { animation: badge-pulse 2.5s ease-in-out infinite; }

        /* ── Main content area ── */
        .main-bg { background: #040c18; min-height: 100vh; }

        /* ── Dropdown ── */
        .dropdown-menu {
            background: #0e1a2d;
            border: 1px solid rgba(255,255,255,0.08);
            border-radius: 16px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.6);
        }

        .dropdown-item {
            display: flex; align-items: center; gap: 12px;
            padding: 10px 16px; font-size: 14px; font-weight: 500;
            color: #94a3b8; border-radius: 10px;
            transition: all 0.15s ease; cursor: pointer;
        }

        .dropdown-item:hover { background: rgba(13,148,136,0.1); color: #2dd4bf; }
        .dropdown-item.danger:hover { background: rgba(244,63,94,0.1); color: #fb7185; }

        /* ── Page title gradient ── */
        .page-title-gradient {
            background: linear-gradient(135deg, #f1f5f9 0%, #94a3b8 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        /* ── Footer ── */
        .footer-bg {
            background: rgba(4,12,26,0.8);
            border-top: 1px solid rgba(255,255,255,0.05);
        }

        /* ── Livewire loading bar ── */
        [wire\:loading] { opacity: 0.6; pointer-events: none; }
    </style>
</head>

<body class="antialiased" x-data="{ sidebarOpen: false }" style="background:#040c18; font-family:'Plus Jakarta Sans',system-ui,sans-serif;">

    <!-- Mobile Sidebar Backdrop -->
    <div x-show="sidebarOpen" x-cloak class="fixed inset-0 z-40 lg:hidden" style="background:rgba(0,0,0,0.6);backdrop-filter:blur(4px);display:none;" @click="sidebarOpen = false"></div>

    <!-- ═══ PREMIUM SIDEBAR ═══ -->
    <aside class="fixed top-0 left-0 z-50 w-72 h-screen sidebar-bg flex flex-col transition-transform duration-300 transform lg:translate-x-0"
           :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'">

        <!-- Logo -->
        <div class="px-6 py-7 flex-shrink-0" style="border-bottom:1px solid rgba(255,255,255,0.05);">
            <div class="flex items-center gap-4">
                <div class="w-11 h-11 rounded-xl flex items-center justify-center flex-shrink-0 logo-ring"
                     style="background:linear-gradient(135deg,#0d9488,#0f766e);">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                    </svg>
                </div>
                <div>
                    <h1 class="text-base font-bold text-white leading-tight">Amazing Laundry</h1>
                    <p class="text-xs font-medium mt-0.5" style="color:#0d9488;">Qatar POS System</p>
                </div>
            </div>
        </div>

        <!-- Navigation -->
        <nav class="flex-1 px-3 py-4 sidebar-scroll">
            <!-- Main -->
            <div class="nav-section-label">Main</div>

            <a href="{{ route('dashboard') }}"
               class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                <svg class="nav-icon w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
                <span>Dashboard</span>
            </a>

            <a href="{{ route('pos.index') }}"
               class="nav-link {{ request()->routeIs('pos.*') ? 'active' : '' }}">
                <svg class="nav-icon w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                </svg>
                <span>Point of Sale</span>
                <span class="ml-auto px-2 py-0.5 text-xs font-bold rounded-md badge-new"
                      style="background:linear-gradient(135deg,#0d9488,#0f766e);color:white;font-size:10px;">NEW</span>
            </a>

            <a href="{{ route('orders.index') }}"
               class="nav-link {{ request()->routeIs('orders.*') ? 'active' : '' }}">
                <svg class="nav-icon w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                </svg>
                <span>Orders</span>
            </a>

            <a href="{{ route('customers.index') }}"
               class="nav-link {{ request()->routeIs('customers.*') ? 'active' : '' }}">
                <svg class="nav-icon w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                </svg>
                <span>Customers</span>
            </a>

            <!-- Business -->
            <div class="nav-section-label mt-2">Business</div>

            <a href="{{ route('services.index') }}"
               class="nav-link {{ request()->routeIs('services.*') ? 'active' : '' }}">
                <svg class="nav-icon w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                </svg>
                <span>Services</span>
            </a>

            <a href="{{ route('reports.index') }}"
               class="nav-link {{ request()->routeIs('reports.index') ? 'active' : '' }}">
                <svg class="nav-icon w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                </svg>
                <span>Reports</span>
            </a>

            <a href="{{ route('due-payments.index') }}"
               class="nav-link {{ request()->routeIs('due-payments.*') ? 'active' : '' }}">
                <svg class="nav-icon w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span>Due Payments</span>
            </a>

            @if(Auth::user()->role === 'admin')
                <div class="nav-section-label mt-2">Admin</div>
                <a href="{{ route('settings.index') }}"
                   class="nav-link {{ request()->routeIs('settings.*') ? 'active' : '' }}">
                    <svg class="nav-icon w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    <span>Settings</span>
                </a>
            @endif
        </nav>

        <!-- User Profile Bottom -->
        @auth
        <div class="px-4 pb-5 flex-shrink-0" style="border-top:1px solid rgba(255,255,255,0.05);padding-top:16px;">
            <div class="user-profile-card">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl flex items-center justify-center text-white font-bold text-sm flex-shrink-0"
                         style="background:linear-gradient(135deg,#0d9488,#0f766e);">
                        {{ strtoupper(substr(Auth::user()->name ?? 'U', 0, 1)) }}
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-semibold text-white truncate">{{ Auth::user()->name ?? 'User' }}</p>
                        <p class="text-xs truncate" style="color:#64748b;">{{ Auth::user()->email ?? '' }}</p>
                    </div>
                    <span class="text-xs font-semibold px-2 py-0.5 rounded-md flex-shrink-0
                        {{ Auth::user()->role === 'admin' ? 'bg-teal-900/60 text-teal-300' : 'bg-slate-700 text-slate-300' }}">
                        {{ ucfirst(Auth::user()->role ?? 'staff') }}
                    </span>
                </div>
                <form method="POST" action="{{ route('logout') }}" class="mt-3">
                    @csrf
                    <button type="submit"
                        class="flex items-center justify-center gap-2 w-full px-3 py-2 rounded-lg text-sm font-medium transition-all"
                        style="color:#64748b;background:rgba(244,63,94,0.0);"
                        onmouseover="this.style.background='rgba(244,63,94,0.1)';this.style.color='#fb7185';"
                        onmouseout="this.style.background='rgba(244,63,94,0.0)';this.style.color='#64748b';">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                        </svg>
                        Sign Out
                    </button>
                </form>
            </div>
        </div>
        @endauth
    </aside>

    <!-- ═══ MAIN CONTENT AREA ═══ -->
    <div class="lg:ml-72 transition-all duration-300">

        <!-- Sticky Header -->
        <header class="header-bg sticky top-0 z-40">
            <div class="px-4 md:px-8 py-4">
                <div class="flex items-center justify-between">
                    <!-- Page Title & Mobile Toggle -->
                    <div class="flex items-center gap-3 md:gap-4">
                        <button @click="sidebarOpen = !sidebarOpen" class="lg:hidden p-2 -ml-2 text-gray-400 hover:text-white rounded-lg focus:outline-none">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                            </svg>
                        </button>
                        <div>
                            <h2 class="text-lg md:text-xl font-bold page-title-gradient">{{ $title ?? 'Dashboard' }}</h2>
                            <p class="text-[10px] md:text-xs mt-0.5 font-medium" style="color:#475569;">
                                {{ date('l, F j, Y') }}
                            </p>
                        </div>
                    </div>

                    <!-- Header Right -->
                    <div class="flex items-center gap-3">
                        @auth
                        <div class="relative" x-data="{ open: false }">
                            <button @click="open = !open" type="button"
                                class="flex items-center gap-3 px-3 py-2 rounded-xl transition-all"
                                style="border:1px solid rgba(255,255,255,0.06);"
                                onmouseover="this.style.background='rgba(13,148,136,0.08)';"
                                onmouseout="this.style.background='transparent';">
                                <div class="w-9 h-9 rounded-xl flex items-center justify-center shadow-lg text-white text-sm font-bold flex-shrink-0"
                                     style="background:linear-gradient(135deg,#0d9488,#0f766e);">
                                    {{ strtoupper(substr(auth()->user()->name ?? 'U', 0, 1)) }}
                                </div>
                                <div class="hidden md:block text-left">
                                    <p class="text-sm font-semibold text-white leading-tight">{{ auth()->user()->name ?? 'User' }}</p>
                                    <p class="text-xs" style="color:#64748b;">{{ ucfirst(auth()->user()->role ?? 'Staff') }}</p>
                                </div>
                                <svg class="w-4 h-4 ml-1" style="color:#64748b;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>

                            <!-- Dropdown -->
                            <div x-show="open" @click.away="open = false"
                                 x-transition:enter="transition ease-out duration-200"
                                 x-transition:enter-start="opacity-0 scale-95"
                                 x-transition:enter-end="opacity-100 scale-100"
                                 x-transition:leave="transition ease-in duration-150"
                                 x-transition:leave-start="opacity-100 scale-100"
                                 x-transition:leave-end="opacity-0 scale-95"
                                 class="absolute right-0 mt-2 w-64 dropdown-menu z-50"
                                 style="display:none;">
                                <!-- Profile Header -->
                                <div class="p-4" style="border-bottom:1px solid rgba(255,255,255,0.06);">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 rounded-xl flex items-center justify-center text-white font-bold text-sm"
                                             style="background:linear-gradient(135deg,#0d9488,#0f766e);">
                                            {{ strtoupper(substr(auth()->user()->name ?? 'U', 0, 1)) }}
                                        </div>
                                        <div>
                                            <p class="text-sm font-bold text-white">{{ auth()->user()->name ?? 'User' }}</p>
                                            <p class="text-xs" style="color:#64748b;">{{ auth()->user()->email ?? '' }}</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- Items -->
                                <div class="p-2">
                                    <a href="{{ route('profile') }}" wire:navigate class="dropdown-item rounded-xl">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                        </svg>
                                        Profile Settings
                                    </a>
                                </div>
                                <div class="p-2" style="border-top:1px solid rgba(255,255,255,0.06);">
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="dropdown-item danger w-full rounded-xl text-left">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                            </svg>
                                            Sign Out
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endauth
                    </div>
                </div>
            </div>
        </header>

        <!-- Main Content -->
        <main class="p-4 md:p-8" style="background:#040c18;min-height:calc(100vh - 73px);">
            {{ $slot }}
        </main>

        <!-- Footer -->
        <footer class="footer-bg">
            <div class="px-4 md:px-8 py-4 flex flex-col sm:flex-row items-center justify-between gap-4 text-center sm:text-left">
                <div>
                    <p class="text-sm font-medium" style="color:#475569;">
                        © {{ date('Y') }} <span style="color:#0d9488;">Amazing Laundry Qatar</span>. All rights reserved.
                    </p>
                    <p class="text-xs mt-0.5" style="color:#334155;">Street 18, Al-Attiya Market, Industrial Area, Doha, Qatar</p>
                </div>
                <div class="sm:text-right">
                    <p class="text-sm" style="color:#475569;">Tel: 33813886</p>
                    <p class="text-xs" style="color:#334155;">amazinglaundry82@gmail.com</p>
                </div>
            </div>
        </footer>
    </div>

    @livewireScripts
</body>

</html>