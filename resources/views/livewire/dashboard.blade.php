<div style="font-family:'Plus Jakarta Sans',sans-serif;">

    {{-- ══════════════════════════════════════════════════════════════════════
         TOP BAR — Greeting + Date Range + Refresh
    ══════════════════════════════════════════════════════════════════════ --}}
    <div style="display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:16px;margin-bottom:32px;">

        {{-- Greeting --}}
        <div>
            <div style="display:flex;align-items:center;gap:10px;margin-bottom:4px;">
                {{-- Animated pulse dot --}}
                <span style="display:inline-block;width:10px;height:10px;border-radius:50%;background:#0d9488;box-shadow:0 0 8px #0d9488;animation:pulse 2s infinite;"></span>
                <span style="font-size:13px;font-weight:500;color:#64748b;letter-spacing:0.08em;text-transform:uppercase;">
                    Amazing Laundry Qatar — Live Dashboard
                </span>
            </div>
            <h1 style="font-size:26px;font-weight:700;color:#f9fafb;margin:0;line-height:1.2;">
                Good
                @php
                    $hour = (int) now()->format('H');
                    if ($hour < 12) echo 'Morning';
                    elseif ($hour < 17) echo 'Afternoon';
                    else echo 'Evening';
                @endphp,
                <span style="color:#f59e0b;">
                    @auth {{ auth()->user()->name }} @else Guest @endauth
                </span>
                <span style="font-size:22px;">✦</span>
            </h1>
            <p style="font-size:13px;color:#64748b;margin:4px 0 0;">
                {{ now()->format('l, F j, Y · h:i A') }} &nbsp;·&nbsp; Overview of operations
            </p>
        </div>

        {{-- Controls --}}
        <div style="display:flex;align-items:center;gap:12px;flex-wrap:wrap;">
            {{-- Date Range Select --}}
            <div style="position:relative;">
                <select wire:model.live="dateRange"
                        style="appearance:none;-webkit-appearance:none;background:rgba(255,255,255,0.05);border:1px solid rgba(255,255,255,0.10);border-radius:12px;color:#f9fafb;font-size:13px;font-weight:500;padding:10px 40px 10px 16px;cursor:pointer;outline:none;transition:border-color .2s;min-width:160px;"
                        onmouseover="this.style.borderColor='rgba(13,148,136,0.5)'"
                        onmouseout="this.style.borderColor='rgba(255,255,255,0.10)'">
                    <option value="today"    style="background:#0f172a;">Today</option>
                    <option value="week"     style="background:#0f172a;">This Week</option>
                    <option value="month"    style="background:#0f172a;">This Month</option>
                    <option value="quarter"  style="background:#0f172a;">This Quarter</option>
                    <option value="year"     style="background:#0f172a;">This Year</option>
                </select>
                <svg style="position:absolute;right:12px;top:50%;transform:translateY(-50%);pointer-events:none;color:#9ca3af;" width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                </svg>
            </div>

            {{-- Refresh Button --}}
            <button wire:click="refresh"
                    style="display:flex;align-items:center;gap:8px;background:rgba(13,148,136,0.15);border:1px solid rgba(13,148,136,0.35);border-radius:12px;color:#14b8a6;font-size:13px;font-weight:600;padding:10px 18px;cursor:pointer;transition:all .2s;outline:none;"
                    onmouseover="this.style.background='rgba(13,148,136,0.28)';this.style.boxShadow='0 0 16px rgba(13,148,136,0.25)'"
                    onmouseout="this.style.background='rgba(13,148,136,0.15)';this.style.boxShadow='none'">
                <svg width="15" height="15" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2"
                          d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                </svg>
                Refresh
            </button>
        </div>
    </div>

    {{-- ══════════════════════════════════════════════════════════════════════
         ROW 1 — Financial Metric Cards (4 cards)
    ══════════════════════════════════════════════════════════════════════ --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4" style="gap:18px;margin-bottom:22px;">

        {{-- Card 1: Total Revenue --}}
        <div style="position:relative;background:rgba(255,255,255,0.04);border:1px solid rgba(255,255,255,0.06);border-radius:20px;padding:24px;overflow:hidden;transition:transform .2s,box-shadow .2s;"
             onmouseover="this.style.transform='translateY(-3px)';this.style.boxShadow='0 12px 40px rgba(13,148,136,0.18)'"
             onmouseout="this.style.transform='translateY(0)';this.style.boxShadow='none'">
            {{-- Glow aura --}}
            <div style="position:absolute;inset:0;background:radial-gradient(ellipse at top right,rgba(13,148,136,0.12) 0%,transparent 65%);pointer-events:none;"></div>
            {{-- Icon circle --}}
            <div style="position:absolute;top:20px;right:20px;width:44px;height:44px;border-radius:50%;background:linear-gradient(135deg,#0d9488,#14b8a6);display:flex;align-items:center;justify-content:center;box-shadow:0 0 20px rgba(13,148,136,0.4);">
                <svg width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="white">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>
            <p style="font-size:11px;font-weight:600;color:#64748b;text-transform:uppercase;letter-spacing:0.1em;margin:0 0 8px;">Total Revenue</p>
            <p style="font-size:30px;font-weight:800;color:#f59e0b;margin:0 0 6px;line-height:1;text-shadow:0 0 20px rgba(245,158,11,0.35);">
                QAR {{ number_format($this->financialStats['total_revenue'], 2) }}
            </p>
            <p style="font-size:12px;color:#9ca3af;margin:0;">
                <span style="color:#10b981;">↑</span> Cumulative earnings
            </p>
        </div>

        {{-- Card 2: Total Customers --}}
        <div style="position:relative;background:rgba(255,255,255,0.04);border:1px solid rgba(255,255,255,0.06);border-radius:20px;padding:24px;overflow:hidden;transition:transform .2s,box-shadow .2s;"
             onmouseover="this.style.transform='translateY(-3px)';this.style.boxShadow='0 12px 40px rgba(59,130,246,0.18)'"
             onmouseout="this.style.transform='translateY(0)';this.style.boxShadow='none'">
            <div style="position:absolute;inset:0;background:radial-gradient(ellipse at top right,rgba(59,130,246,0.12) 0%,transparent 65%);pointer-events:none;"></div>
            <div style="position:absolute;top:20px;right:20px;width:44px;height:44px;border-radius:50%;background:linear-gradient(135deg,#2563eb,#60a5fa);display:flex;align-items:center;justify-content:center;box-shadow:0 0 20px rgba(59,130,246,0.4);">
                <svg width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="white">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>
                </svg>
            </div>
            <p style="font-size:11px;font-weight:600;color:#64748b;text-transform:uppercase;letter-spacing:0.1em;margin:0 0 8px;">Total Customers</p>
            <p style="font-size:30px;font-weight:800;color:#f9fafb;margin:0 0 6px;line-height:1;">
                {{ number_format($this->quickStats['total_customers']) }}
            </p>
            <p style="font-size:12px;color:#9ca3af;margin:0;">
                <span style="color:#60a5fa;">{{ $this->quickStats['active_customers'] }}</span> active &nbsp;·&nbsp;
                <span style="color:#10b981;">+{{ $this->quickStats['new_customers_this_month'] }}</span> this month
            </p>
        </div>

        {{-- Card 3: Gross Profit --}}
        <div style="position:relative;background:rgba(255,255,255,0.04);border:1px solid rgba(255,255,255,0.06);border-radius:20px;padding:24px;overflow:hidden;transition:transform .2s,box-shadow .2s;"
             onmouseover="this.style.transform='translateY(-3px)';this.style.boxShadow='0 12px 40px rgba(139,92,246,0.18)'"
             onmouseout="this.style.transform='translateY(0)';this.style.boxShadow='none'">
            <div style="position:absolute;inset:0;background:radial-gradient(ellipse at top right,rgba(139,92,246,0.12) 0%,transparent 65%);pointer-events:none;"></div>
            <div style="position:absolute;top:20px;right:20px;width:44px;height:44px;border-radius:50%;background:linear-gradient(135deg,#7c3aed,#a78bfa);display:flex;align-items:center;justify-content:center;box-shadow:0 0 20px rgba(139,92,246,0.4);">
                <svg width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="white">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                </svg>
            </div>
            <p style="font-size:11px;font-weight:600;color:#64748b;text-transform:uppercase;letter-spacing:0.1em;margin:0 0 8px;">Gross Profit</p>
            <p style="font-size:30px;font-weight:800;color:#f9fafb;margin:0 0 6px;line-height:1;">
                QAR {{ number_format($this->financialStats['gross_profit'], 2) }}
            </p>
            <p style="font-size:12px;color:#9ca3af;margin:0;">
                Margin:
                <span style="color:#a78bfa;font-weight:600;">{{ number_format($this->financialStats['profit_margin'], 1) }}%</span>
            </p>
        </div>

        {{-- Card 4: Avg Order Value --}}
        <div style="position:relative;background:rgba(255,255,255,0.04);border:1px solid rgba(255,255,255,0.06);border-radius:20px;padding:24px;overflow:hidden;transition:transform .2s,box-shadow .2s;"
             onmouseover="this.style.transform='translateY(-3px)';this.style.boxShadow='0 12px 40px rgba(245,158,11,0.18)'"
             onmouseout="this.style.transform='translateY(0)';this.style.boxShadow='none'">
            <div style="position:absolute;inset:0;background:radial-gradient(ellipse at top right,rgba(245,158,11,0.12) 0%,transparent 65%);pointer-events:none;"></div>
            <div style="position:absolute;top:20px;right:20px;width:44px;height:44px;border-radius:50%;background:linear-gradient(135deg,#d97706,#f59e0b);display:flex;align-items:center;justify-content:center;box-shadow:0 0 20px rgba(245,158,11,0.4);">
                <svg width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="white">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/>
                </svg>
            </div>
            <p style="font-size:11px;font-weight:600;color:#64748b;text-transform:uppercase;letter-spacing:0.1em;margin:0 0 8px;">Avg Order Value</p>
            <p style="font-size:30px;font-weight:800;color:#f59e0b;margin:0 0 6px;line-height:1;text-shadow:0 0 20px rgba(245,158,11,0.25);">
                QAR {{ number_format($this->financialStats['average_order_value'], 2) }}
            </p>
            <p style="font-size:12px;color:#9ca3af;margin:0;">
                <span style="color:#10b981;">↑</span> Per transaction
            </p>
        </div>

    </div>

    {{-- ══════════════════════════════════════════════════════════════════════
         ROW 2 — Order Status Cards (4 cards)
    ══════════════════════════════════════════════════════════════════════ --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4" style="gap:18px;margin-bottom:22px;">

        {{-- Pending --}}
        <div style="position:relative;background:rgba(255,255,255,0.04);border:1px solid rgba(255,255,255,0.06);border-radius:20px;padding:22px 22px 22px 26px;overflow:hidden;transition:transform .2s,box-shadow .2s;"
             onmouseover="this.style.transform='translateY(-3px)';this.style.boxShadow='0 10px 36px rgba(245,158,11,0.2)'"
             onmouseout="this.style.transform='translateY(0)';this.style.boxShadow='none'">
            {{-- Left border glow strip --}}
            <div style="position:absolute;left:0;top:0;bottom:0;width:4px;background:linear-gradient(180deg,#f59e0b,#d97706);border-radius:20px 0 0 20px;box-shadow:0 0 12px rgba(245,158,11,0.6);"></div>
            <div style="position:absolute;inset:0;background:radial-gradient(ellipse at left,rgba(245,158,11,0.07) 0%,transparent 60%);pointer-events:none;"></div>
            <div style="display:flex;align-items:center;justify-content:space-between;">
                <div>
                    <p style="font-size:11px;font-weight:600;color:#92400e;text-transform:uppercase;letter-spacing:0.1em;margin:0 0 8px;">Pending</p>
                    <p style="font-size:36px;font-weight:800;color:#fbbf24;margin:0;line-height:1;">{{ $this->orderStats['pending'] }}</p>
                    <p style="font-size:12px;color:#78716c;margin:6px 0 0;">Awaiting pickup</p>
                </div>
                <div style="width:48px;height:48px;border-radius:14px;background:rgba(245,158,11,0.15);border:1px solid rgba(245,158,11,0.25);display:flex;align-items:center;justify-content:center;">
                    <svg width="22" height="22" fill="none" viewBox="0 0 24 24" stroke="#f59e0b">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
            </div>
        </div>

        {{-- Processing --}}
        <div style="position:relative;background:rgba(255,255,255,0.04);border:1px solid rgba(255,255,255,0.06);border-radius:20px;padding:22px 22px 22px 26px;overflow:hidden;transition:transform .2s,box-shadow .2s;"
             onmouseover="this.style.transform='translateY(-3px)';this.style.boxShadow='0 10px 36px rgba(14,165,233,0.2)'"
             onmouseout="this.style.transform='translateY(0)';this.style.boxShadow='none'">
            <div style="position:absolute;left:0;top:0;bottom:0;width:4px;background:linear-gradient(180deg,#0ea5e9,#38bdf8);border-radius:20px 0 0 20px;box-shadow:0 0 12px rgba(14,165,233,0.6);"></div>
            <div style="position:absolute;inset:0;background:radial-gradient(ellipse at left,rgba(14,165,233,0.07) 0%,transparent 60%);pointer-events:none;"></div>
            <div style="display:flex;align-items:center;justify-content:space-between;">
                <div>
                    <p style="font-size:11px;font-weight:600;color:#075985;text-transform:uppercase;letter-spacing:0.1em;margin:0 0 8px;">Processing</p>
                    <p style="font-size:36px;font-weight:800;color:#38bdf8;margin:0;line-height:1;">{{ $this->orderStats['processing'] }}</p>
                    <p style="font-size:12px;color:#78716c;margin:6px 0 0;">Being washed</p>
                </div>
                <div style="width:48px;height:48px;border-radius:14px;background:rgba(14,165,233,0.15);border:1px solid rgba(14,165,233,0.25);display:flex;align-items:center;justify-content:center;">
                    <svg width="22" height="22" fill="none" viewBox="0 0 24 24" stroke="#38bdf8">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                    </svg>
                </div>
            </div>
        </div>

        {{-- Ready --}}
        <div style="position:relative;background:rgba(255,255,255,0.04);border:1px solid rgba(255,255,255,0.06);border-radius:20px;padding:22px 22px 22px 26px;overflow:hidden;transition:transform .2s,box-shadow .2s;"
             onmouseover="this.style.transform='translateY(-3px)';this.style.boxShadow='0 10px 36px rgba(13,148,136,0.2)'"
             onmouseout="this.style.transform='translateY(0)';this.style.boxShadow='none'">
            <div style="position:absolute;left:0;top:0;bottom:0;width:4px;background:linear-gradient(180deg,#0d9488,#14b8a6);border-radius:20px 0 0 20px;box-shadow:0 0 12px rgba(13,148,136,0.6);"></div>
            <div style="position:absolute;inset:0;background:radial-gradient(ellipse at left,rgba(13,148,136,0.07) 0%,transparent 60%);pointer-events:none;"></div>
            <div style="display:flex;align-items:center;justify-content:space-between;">
                <div>
                    <p style="font-size:11px;font-weight:600;color:#134e4a;text-transform:uppercase;letter-spacing:0.1em;margin:0 0 8px;">Ready</p>
                    <p style="font-size:36px;font-weight:800;color:#14b8a6;margin:0;line-height:1;">{{ $this->orderStats['ready'] }}</p>
                    <p style="font-size:12px;color:#78716c;margin:6px 0 0;">For collection</p>
                </div>
                <div style="width:48px;height:48px;border-radius:14px;background:rgba(13,148,136,0.15);border:1px solid rgba(13,148,136,0.25);display:flex;align-items:center;justify-content:center;">
                    <svg width="22" height="22" fill="none" viewBox="0 0 24 24" stroke="#14b8a6">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
            </div>
        </div>

        {{-- Delivered --}}
        <div style="position:relative;background:rgba(255,255,255,0.04);border:1px solid rgba(255,255,255,0.06);border-radius:20px;padding:22px 22px 22px 26px;overflow:hidden;transition:transform .2s,box-shadow .2s;"
             onmouseover="this.style.transform='translateY(-3px)';this.style.boxShadow='0 10px 36px rgba(16,185,129,0.2)'"
             onmouseout="this.style.transform='translateY(0)';this.style.boxShadow='none'">
            <div style="position:absolute;left:0;top:0;bottom:0;width:4px;background:linear-gradient(180deg,#10b981,#34d399);border-radius:20px 0 0 20px;box-shadow:0 0 12px rgba(16,185,129,0.6);"></div>
            <div style="position:absolute;inset:0;background:radial-gradient(ellipse at left,rgba(16,185,129,0.07) 0%,transparent 60%);pointer-events:none;"></div>
            <div style="display:flex;align-items:center;justify-content:space-between;">
                <div>
                    <p style="font-size:11px;font-weight:600;color:#064e3b;text-transform:uppercase;letter-spacing:0.1em;margin:0 0 8px;">Delivered</p>
                    <p style="font-size:36px;font-weight:800;color:#34d399;margin:0;line-height:1;">{{ $this->orderStats['delivered'] }}</p>
                    <p style="font-size:12px;color:#78716c;margin:6px 0 0;">Completed today</p>
                </div>
                <div style="width:48px;height:48px;border-radius:14px;background:rgba(16,185,129,0.15);border:1px solid rgba(16,185,129,0.25);display:flex;align-items:center;justify-content:center;">
                    <svg width="22" height="22" fill="none" viewBox="0 0 24 24" stroke="#34d399">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                </div>
            </div>
        </div>

    </div>

    {{-- ══════════════════════════════════════════════════════════════════════
         ROW 3 — Today's Deliveries (2/3) + Quick Actions (1/3)
    ══════════════════════════════════════════════════════════════════════ --}}
    <div class="grid grid-cols-1 lg:grid-cols-3" style="gap:18px;align-items:start;">

        {{-- ─── Today's Deliveries Table ─── --}}
        <div class="lg:col-span-2" style="background:rgba(255,255,255,0.04);border:1px solid rgba(255,255,255,0.06);border-radius:20px;overflow:hidden;">
            {{-- Card Header --}}
            <div style="display:flex;align-items:center;justify-content:space-between;padding:20px 24px;border-bottom:1px solid rgba(255,255,255,0.06);">
                <div style="display:flex;align-items:center;gap:12px;">
                    <div style="width:36px;height:36px;border-radius:10px;background:linear-gradient(135deg,rgba(13,148,136,0.3),rgba(20,184,166,0.15));border:1px solid rgba(13,148,136,0.3);display:flex;align-items:center;justify-content:center;">
                        <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="#14b8a6">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <div>
                        <h3 style="font-size:15px;font-weight:700;color:#f9fafb;margin:0;line-height:1.2;">Today's Deliveries</h3>
                        <p style="font-size:12px;color:#64748b;margin:2px 0 0;">{{ now()->format('F j, Y') }}</p>
                    </div>
                </div>
                <span style="font-size:11px;font-weight:600;background:rgba(13,148,136,0.15);border:1px solid rgba(13,148,136,0.3);color:#14b8a6;padding:4px 12px;border-radius:99px;">
                    Live
                </span>
            </div>

            {{-- Table --}}
            @if(count($this->todayDeliveries) > 0)
            <div style="overflow-x:auto;">
                <table style="width:100%;border-collapse:collapse;">
                    <thead>
                        <tr style="border-bottom:1px solid rgba(255,255,255,0.05);">
                            <th style="padding:14px 24px;text-align:left;font-size:11px;font-weight:600;color:#64748b;text-transform:uppercase;letter-spacing:0.08em;white-space:nowrap;">Order #</th>
                            <th style="padding:14px 16px;text-align:left;font-size:11px;font-weight:600;color:#64748b;text-transform:uppercase;letter-spacing:0.08em;">Customer</th>
                            <th style="padding:14px 16px;text-align:left;font-size:11px;font-weight:600;color:#64748b;text-transform:uppercase;letter-spacing:0.08em;">Amount</th>
                            <th style="padding:14px 24px;text-align:left;font-size:11px;font-weight:600;color:#64748b;text-transform:uppercase;letter-spacing:0.08em;">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($this->todayDeliveries as $order)
                        <tr style="border-bottom:1px solid rgba(255,255,255,0.04);transition:background .15s;"
                            onmouseover="this.style.background='rgba(255,255,255,0.03)'"
                            onmouseout="this.style.background='transparent'">

                            {{-- Order Number --}}
                            <td style="padding:16px 24px;white-space:nowrap;">
                                <span style="font-size:13px;font-weight:700;color:#14b8a6;font-family:monospace;">
                                    {{ $order->order_number }}
                                </span>
                            </td>

                            {{-- Customer Name --}}
                            <td style="padding:16px 16px;">
                                <div style="display:flex;align-items:center;gap:10px;">
                                    <div style="width:32px;height:32px;border-radius:50%;background:linear-gradient(135deg,rgba(99,102,241,0.35),rgba(139,92,246,0.35));border:1px solid rgba(139,92,246,0.3);display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                                        <span style="font-size:12px;font-weight:700;color:#c4b5fd;">
                                            {{ strtoupper(substr($order->customer->name, 0, 1)) }}
                                        </span>
                                    </div>
                                    <span style="font-size:13px;font-weight:500;color:#f9fafb;">{{ $order->customer->name }}</span>
                                </div>
                            </td>

                            {{-- Amount --}}
                            <td style="padding:16px 16px;">
                                <span style="font-size:13px;font-weight:700;color:#f59e0b;">
                                    QAR {{ number_format($order->total_amount, 2) }}
                                </span>
                            </td>

                            {{-- Status Badge --}}
                            <td style="padding:16px 24px;">
                                @php
                                    $statusConfig = match(strtolower($order->status)) {
                                        'pending'    => ['bg'=>'rgba(245,158,11,0.15)',  'border'=>'rgba(245,158,11,0.35)',  'color'=>'#fbbf24', 'dot'=>'#f59e0b'],
                                        'processing' => ['bg'=>'rgba(14,165,233,0.15)',  'border'=>'rgba(14,165,233,0.35)',  'color'=>'#38bdf8', 'dot'=>'#0ea5e9'],
                                        'ready'      => ['bg'=>'rgba(13,148,136,0.15)',  'border'=>'rgba(13,148,136,0.35)',  'color'=>'#14b8a6', 'dot'=>'#0d9488'],
                                        'delivered'  => ['bg'=>'rgba(16,185,129,0.15)',  'border'=>'rgba(16,185,129,0.35)',  'color'=>'#34d399', 'dot'=>'#10b981'],
                                        'cancelled'  => ['bg'=>'rgba(244,63,94,0.15)',   'border'=>'rgba(244,63,94,0.35)',   'color'=>'#fb7185', 'dot'=>'#f43f5e'],
                                        default      => ['bg'=>'rgba(148,163,184,0.15)', 'border'=>'rgba(148,163,184,0.3)', 'color'=>'#94a3b8', 'dot'=>'#64748b'],
                                    };
                                @endphp
                                <span style="display:inline-flex;align-items:center;gap:6px;background:{{ $statusConfig['bg'] }};border:1px solid {{ $statusConfig['border'] }};color:{{ $statusConfig['color'] }};font-size:11px;font-weight:600;padding:4px 12px;border-radius:99px;text-transform:capitalize;white-space:nowrap;">
                                    <span style="width:6px;height:6px;border-radius:50%;background:{{ $statusConfig['dot'] }};display:inline-block;box-shadow:0 0 6px {{ $statusConfig['dot'] }};"></span>
                                    {{ ucfirst($order->status) }}
                                </span>
                            </td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @else
            {{-- Empty State --}}
            <div style="display:flex;flex-direction:column;align-items:center;justify-content:center;padding:60px 24px;text-align:center;">
                <div style="width:64px;height:64px;border-radius:50%;background:rgba(255,255,255,0.04);border:1px solid rgba(255,255,255,0.08);display:flex;align-items:center;justify-content:center;margin-bottom:16px;">
                    <svg width="28" height="28" fill="none" viewBox="0 0 24 24" stroke="#64748b">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/>
                    </svg>
                </div>
                <p style="font-size:15px;font-weight:600;color:#9ca3af;margin:0 0 6px;">No deliveries scheduled</p>
                <p style="font-size:13px;color:#64748b;margin:0;">Today's delivery list is empty</p>
            </div>
            @endif
        </div>

        {{-- ─── Quick Actions Panel ─── --}}
        <div class="lg:col-span-1" style="background:rgba(255,255,255,0.04);border:1px solid rgba(255,255,255,0.06);border-radius:20px;overflow:hidden;">
            {{-- Panel Header --}}
            <div style="padding:20px 24px;border-bottom:1px solid rgba(255,255,255,0.06);">
                <div style="display:flex;align-items:center;gap:12px;">
                    <div style="width:36px;height:36px;border-radius:10px;background:linear-gradient(135deg,rgba(245,158,11,0.3),rgba(217,119,6,0.15));border:1px solid rgba(245,158,11,0.3);display:flex;align-items:center;justify-content:center;">
                        <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="#f59e0b">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                        </svg>
                    </div>
                    <div>
                        <h3 style="font-size:15px;font-weight:700;color:#f9fafb;margin:0;line-height:1.2;">Quick Actions</h3>
                        <p style="font-size:12px;color:#64748b;margin:2px 0 0;">Shortcuts to key tasks</p>
                    </div>
                </div>
            </div>

            {{-- Action Buttons --}}
            <div style="padding:20px;display:flex;flex-direction:column;gap:12px;">

                {{-- Create Order --}}
                <a href="{{ route('pos.index') }}"
                   style="display:flex;align-items:center;justify-content:space-between;background:rgba(13,148,136,0.1);border:1px solid rgba(13,148,136,0.25);border-radius:14px;padding:16px 18px;text-decoration:none;transition:all .2s;group"
                   onmouseover="this.style.background='rgba(13,148,136,0.2)';this.style.borderColor='rgba(13,148,136,0.45)';this.style.transform='translateX(3px)'"
                   onmouseout="this.style.background='rgba(13,148,136,0.1)';this.style.borderColor='rgba(13,148,136,0.25)';this.style.transform='translateX(0)'">
                    <div style="display:flex;align-items:center;gap:14px;">
                        <div style="width:40px;height:40px;border-radius:12px;background:linear-gradient(135deg,#0d9488,#14b8a6);display:flex;align-items:center;justify-content:center;box-shadow:0 4px 12px rgba(13,148,136,0.4);flex-shrink:0;">
                            <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="white">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                            </svg>
                        </div>
                        <div>
                            <p style="font-size:14px;font-weight:600;color:#f9fafb;margin:0;line-height:1.3;">Create Order</p>
                            <p style="font-size:12px;color:#64748b;margin:2px 0 0;">New laundry order</p>
                        </div>
                    </div>
                    <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="#14b8a6">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/>
                    </svg>
                </a>

                {{-- Manage Customers --}}
                <a href="{{ route('customers.index') }}"
                   style="display:flex;align-items:center;justify-content:space-between;background:rgba(59,130,246,0.1);border:1px solid rgba(59,130,246,0.25);border-radius:14px;padding:16px 18px;text-decoration:none;transition:all .2s;"
                   onmouseover="this.style.background='rgba(59,130,246,0.2)';this.style.borderColor='rgba(59,130,246,0.45)';this.style.transform='translateX(3px)'"
                   onmouseout="this.style.background='rgba(59,130,246,0.1)';this.style.borderColor='rgba(59,130,246,0.25)';this.style.transform='translateX(0)'">
                    <div style="display:flex;align-items:center;gap:14px;">
                        <div style="width:40px;height:40px;border-radius:12px;background:linear-gradient(135deg,#2563eb,#60a5fa);display:flex;align-items:center;justify-content:center;box-shadow:0 4px 12px rgba(59,130,246,0.4);flex-shrink:0;">
                            <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="white">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                        </div>
                        <div>
                            <p style="font-size:14px;font-weight:600;color:#f9fafb;margin:0;line-height:1.3;">Customers</p>
                            <p style="font-size:12px;color:#64748b;margin:2px 0 0;">
                                {{ $this->quickStats['active_customers'] }} active accounts
                            </p>
                        </div>
                    </div>
                    <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="#60a5fa">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/>
                    </svg>
                </a>

                {{-- Manage Services --}}
                <a href="{{ route('services.index') }}"
                   style="display:flex;align-items:center;justify-content:space-between;background:rgba(16,185,129,0.1);border:1px solid rgba(16,185,129,0.25);border-radius:14px;padding:16px 18px;text-decoration:none;transition:all .2s;"
                   onmouseover="this.style.background='rgba(16,185,129,0.2)';this.style.borderColor='rgba(16,185,129,0.45)';this.style.transform='translateX(3px)'"
                   onmouseout="this.style.background='rgba(16,185,129,0.1)';this.style.borderColor='rgba(16,185,129,0.25)';this.style.transform='translateX(0)'">
                    <div style="display:flex;align-items:center;gap:14px;">
                        <div style="width:40px;height:40px;border-radius:12px;background:linear-gradient(135deg,#059669,#34d399);display:flex;align-items:center;justify-content:center;box-shadow:0 4px 12px rgba(16,185,129,0.4);flex-shrink:0;">
                            <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="white">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"/>
                            </svg>
                        </div>
                        <div>
                            <p style="font-size:14px;font-weight:600;color:#f9fafb;margin:0;line-height:1.3;">Services</p>
                            <p style="font-size:12px;color:#64748b;margin:2px 0 0;">
                                {{ $this->quickStats['active_services'] }} active services
                            </p>
                        </div>
                    </div>
                    <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="#34d399">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/>
                    </svg>
                </a>

            </div>

            {{-- Divider --}}
            <div style="height:1px;background:rgba(255,255,255,0.05);margin:0 20px;"></div>

            {{-- Quick Stats Footer --}}
            <div style="padding:16px 20px 20px;">
                <p style="font-size:11px;font-weight:600;color:#64748b;text-transform:uppercase;letter-spacing:0.08em;margin:0 0 12px;">This Month</p>
                <div style="display:flex;gap:8px;">
                    <div style="flex:1;background:rgba(255,255,255,0.03);border:1px solid rgba(255,255,255,0.06);border-radius:12px;padding:12px;text-align:center;">
                        <p style="font-size:18px;font-weight:800;color:#10b981;margin:0 0 2px;">{{ $this->quickStats['new_customers_this_month'] }}</p>
                        <p style="font-size:10px;color:#64748b;margin:0;font-weight:500;">New Clients</p>
                    </div>
                    <div style="flex:1;background:rgba(255,255,255,0.03);border:1px solid rgba(255,255,255,0.06);border-radius:12px;padding:12px;text-align:center;">
                        <p style="font-size:18px;font-weight:800;color:#a78bfa;margin:0 0 2px;">{{ $this->quickStats['active_services'] }}</p>
                        <p style="font-size:10px;color:#64748b;margin:0;font-weight:500;">Services</p>
                    </div>
                </div>
            </div>
        </div>

    </div>

    {{-- ══════════════════════════════════════════════════════════════════════
         Keyframe Animations (inline style tag)
    ══════════════════════════════════════════════════════════════════════ --}}
    <style>
        @keyframes pulse {
            0%, 100% { opacity: 1; box-shadow: 0 0 8px #0d9488; }
            50%       { opacity: 0.5; box-shadow: 0 0 16px #0d9488; }
        }
        @media (max-width: 1200px) {
            /* Responsive fallback for 4-col grids */
        }
    </style>

</div>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
<script>
    // Chart.js global defaults for dark theme
    Chart.defaults.color = '#9ca3af';
    Chart.defaults.borderColor = 'rgba(255,255,255,0.05)';

    document.addEventListener('livewire:navigated', function () {
        // Re-initialize charts if any are added in the future
    });
</script>
@endpush