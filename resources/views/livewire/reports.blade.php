<div wire:poll.10s class="w-full">

    {{-- Header --}}
    <div class="flex items-center justify-between mb-8">
        <div class="flex items-center gap-4">
            <div class="w-12 h-12 rounded-2xl flex items-center justify-center flex-shrink-0"
                 style="background:linear-gradient(135deg,#0d9488,#0f766e);box-shadow:0 0 20px rgba(13,148,136,0.3);">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                </svg>
            </div>
            <div>
                <h1 class="text-2xl font-bold text-white">Reports & Analytics</h1>
                <p class="text-sm mt-0.5" style="color:#64748b;">{{ $this->getReportTitle() }}</p>
            </div>
        </div>
        <div class="flex items-center gap-2 text-xs font-medium px-3 py-1.5 rounded-lg"
             style="background:rgba(13,148,136,0.1);color:#2dd4bf;border:1px solid rgba(13,148,136,0.2);">
            <div class="w-2 h-2 rounded-full" style="background:#2dd4bf;animation:pulse 2s infinite;"></div>
            Live Data
        </div>
    </div>

    {{-- Filter Card --}}
    <div class="rounded-2xl p-6 mb-6" style="background:rgba(255,255,255,0.04);border:1px solid rgba(255,255,255,0.07);">
        <div class="flex items-center gap-2 mb-5">
            <svg class="w-4 h-4" style="color:#0d9488;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" />
            </svg>
            <h3 class="font-semibold text-white text-sm">Report Filters</h3>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <div class="md:col-span-4">
                <label class="block text-xs font-medium mb-2" style="color:#64748b;">Report Period</label>
                <div class="flex gap-2 flex-wrap">
                    <button wire:click="$set('reportType', 'daily')"
                        class="px-4 py-2 rounded-xl font-semibold text-sm transition-all"
                        style="{{ $reportType === 'daily' ? 'background:linear-gradient(135deg,#0d9488,#0f766e);color:white;box-shadow:0 4px 12px rgba(13,148,136,0.3);' : 'background:rgba(255,255,255,0.05);color:#94a3b8;border:1px solid rgba(255,255,255,0.08);' }}">
                        📅 Daily
                    </button>
                    <button wire:click="$set('reportType', 'weekly')"
                        class="px-4 py-2 rounded-xl font-semibold text-sm transition-all"
                        style="{{ $reportType === 'weekly' ? 'background:linear-gradient(135deg,#0d9488,#0f766e);color:white;box-shadow:0 4px 12px rgba(13,148,136,0.3);' : 'background:rgba(255,255,255,0.05);color:#94a3b8;border:1px solid rgba(255,255,255,0.08);' }}">
                        📆 Weekly
                    </button>
                    <button wire:click="$set('reportType', 'monthly')"
                        class="px-4 py-2 rounded-xl font-semibold text-sm transition-all"
                        style="{{ $reportType === 'monthly' ? 'background:linear-gradient(135deg,#0d9488,#0f766e);color:white;box-shadow:0 4px 12px rgba(13,148,136,0.3);' : 'background:rgba(255,255,255,0.05);color:#94a3b8;border:1px solid rgba(255,255,255,0.08);' }}">
                        📊 Monthly
                    </button>
                    <button wire:click="$set('reportType', 'custom')"
                        class="px-4 py-2 rounded-xl font-semibold text-sm transition-all"
                        style="{{ $reportType === 'custom' ? 'background:linear-gradient(135deg,#0d9488,#0f766e);color:white;box-shadow:0 4px 12px rgba(13,148,136,0.3);' : 'background:rgba(255,255,255,0.05);color:#94a3b8;border:1px solid rgba(255,255,255,0.08);' }}">
                        🔧 Custom Range
                    </button>
                </div>
            </div>

            @if($reportType === 'custom')
                <div class="md:col-span-2">
                    <label class="block text-xs font-medium mb-1.5" style="color:#64748b;">From Date</label>
                    <input type="date" wire:model.live="dateFrom" class="input-dark" />
                </div>
                <div class="md:col-span-2">
                    <label class="block text-xs font-medium mb-1.5" style="color:#64748b;">To Date</label>
                    <input type="date" wire:model.live="dateTo" class="input-dark" />
                </div>
            @else
                <div class="md:col-span-2">
                    <label class="block text-xs font-medium mb-1.5" style="color:#64748b;">Select Date</label>
                    <input type="date" wire:model.live="selectedDate" class="input-dark" />
                </div>
            @endif
        </div>
    </div>

    {{-- Stats Overview (5 cards) --}}
    <div class="grid grid-cols-1 md:grid-cols-5 gap-4 mb-6">
        <div class="card-metric">
            <div class="flex items-start justify-between">
                <div>
                    <p class="text-xs font-semibold uppercase tracking-wider mb-3" style="color:#64748b;">Total Orders</p>
                    <p class="text-3xl font-bold text-white">{{ $this->salesData['total_orders'] }}</p>
                </div>
                <div class="w-10 h-10 rounded-xl flex items-center justify-center" style="background:rgba(13,148,136,0.12);">
                    <svg class="w-5 h-5" style="color:#0d9488;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                </div>
            </div>
        </div>

        <div class="card-metric">
            <div class="flex items-start justify-between">
                <div>
                    <p class="text-xs font-semibold uppercase tracking-wider mb-3" style="color:#64748b;">Total Revenue</p>
                    <p class="text-2xl font-bold" style="color:#f59e0b;">{{ number_format((float) $this->salesData['total_revenue'], 2) }}</p>
                    <p class="text-xs mt-1" style="color:#64748b;">QAR</p>
                </div>
                <div class="w-10 h-10 rounded-xl flex items-center justify-center" style="background:rgba(245,158,11,0.12);">
                    <svg class="w-5 h-5" style="color:#f59e0b;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
            </div>
        </div>

        <div class="card-metric">
            <div class="flex items-start justify-between">
                <div>
                    <p class="text-xs font-semibold uppercase tracking-wider mb-3" style="color:#64748b;">Paid Orders</p>
                    <p class="text-3xl font-bold" style="color:#10b981;">{{ $this->salesData['paid_orders'] }}</p>
                </div>
                <div class="w-10 h-10 rounded-xl flex items-center justify-center" style="background:rgba(16,185,129,0.12);">
                    <svg class="w-5 h-5" style="color:#10b981;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
            </div>
        </div>

        <div class="card-metric">
            <div class="flex items-start justify-between">
                <div>
                    <p class="text-xs font-semibold uppercase tracking-wider mb-3" style="color:#64748b;">Pending Payment</p>
                    <p class="text-3xl font-bold" style="color:#fb923c;">{{ $this->salesData['pending_orders'] }}</p>
                </div>
                <div class="w-10 h-10 rounded-xl flex items-center justify-center" style="background:rgba(251,146,60,0.12);">
                    <svg class="w-5 h-5" style="color:#fb923c;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
            </div>
        </div>

        <div class="card-metric">
            <div class="flex items-start justify-between">
                <div>
                    <p class="text-xs font-semibold uppercase tracking-wider mb-3" style="color:#64748b;">Delivered</p>
                    <p class="text-3xl font-bold" style="color:#38bdf8;">{{ $this->salesData['delivered_orders'] }}</p>
                </div>
                <div class="w-10 h-10 rounded-xl flex items-center justify-center" style="background:rgba(56,189,248,0.12);">
                    <svg class="w-5 h-5" style="color:#38bdf8;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0" />
                    </svg>
                </div>
            </div>
        </div>
    </div>

    {{-- Payment Method Comparison --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
        {{-- Cash --}}
        <div class="rounded-2xl p-6" style="background:rgba(16,185,129,0.05);border:1px solid rgba(16,185,129,0.15);">
            <div class="flex items-center gap-3 mb-6">
                <div class="w-12 h-12 rounded-xl flex items-center justify-center" style="background:rgba(16,185,129,0.12);">
                    <svg class="w-6 h-6" style="color:#10b981;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                </div>
                <div>
                    <h3 class="font-bold text-white text-lg">💵 Cash Payments</h3>
                    <p class="text-xs" style="color:#64748b;">Cash transactions</p>
                </div>
            </div>
            <div class="space-y-4">
                <div class="flex items-baseline justify-between">
                    <span class="text-sm" style="color:#94a3b8;">Total Amount</span>
                    <span class="text-3xl font-bold" style="color:#10b981;">{{ number_format((float) $this->paymentMethodData['cash_amount'], 2) }} <span class="text-sm font-normal" style="color:#64748b;">QAR</span></span>
                </div>
                <div class="flex items-baseline justify-between">
                    <span class="text-sm" style="color:#94a3b8;">Number of Orders</span>
                    <span class="text-2xl font-bold text-white">{{ $this->paymentMethodData['cash_count'] }}</span>
                </div>
                @if($this->paymentMethodData['cash_count'] > 0)
                    <div class="pt-4" style="border-top:1px solid rgba(255,255,255,0.06);">
                        <div class="flex items-baseline justify-between">
                            <span class="text-xs" style="color:#64748b;">Average per Order</span>
                            <span class="text-lg font-semibold" style="color:#10b981;">{{ number_format((float) $this->paymentMethodData['cash_amount'] / $this->paymentMethodData['cash_count'], 2) }} QAR</span>
                        </div>
                    </div>
                @endif
            </div>
        </div>

        {{-- Card --}}
        <div class="rounded-2xl p-6" style="background:rgba(56,189,248,0.05);border:1px solid rgba(56,189,248,0.15);">
            <div class="flex items-center gap-3 mb-6">
                <div class="w-12 h-12 rounded-xl flex items-center justify-center" style="background:rgba(56,189,248,0.12);">
                    <svg class="w-6 h-6" style="color:#38bdf8;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                    </svg>
                </div>
                <div>
                    <h3 class="font-bold text-white text-lg">💳 Card Payments</h3>
                    <p class="text-xs" style="color:#64748b;">Card transactions</p>
                </div>
            </div>
            <div class="space-y-4">
                <div class="flex items-baseline justify-between">
                    <span class="text-sm" style="color:#94a3b8;">Total Amount</span>
                    <span class="text-3xl font-bold" style="color:#38bdf8;">{{ number_format((float) $this->paymentMethodData['card_amount'], 2) }} <span class="text-sm font-normal" style="color:#64748b;">QAR</span></span>
                </div>
                <div class="flex items-baseline justify-between">
                    <span class="text-sm" style="color:#94a3b8;">Number of Orders</span>
                    <span class="text-2xl font-bold text-white">{{ $this->paymentMethodData['card_count'] }}</span>
                </div>
                @if($this->paymentMethodData['card_count'] > 0)
                    <div class="pt-4" style="border-top:1px solid rgba(255,255,255,0.06);">
                        <div class="flex items-baseline justify-between">
                            <span class="text-xs" style="color:#64748b;">Average per Order</span>
                            <span class="text-lg font-semibold" style="color:#38bdf8;">{{ number_format((float) $this->paymentMethodData['card_amount'] / $this->paymentMethodData['card_count'], 2) }} QAR</span>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>

    {{-- Orders Tables --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        {{-- Delivered Orders --}}
        <div class="rounded-2xl" style="background:rgba(255,255,255,0.04);border:1px solid rgba(255,255,255,0.07);">
            <div class="flex items-center gap-3 px-6 py-4" style="border-bottom:1px solid rgba(255,255,255,0.06);">
                <svg class="w-5 h-5" style="color:#10b981;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
                <h3 class="font-bold text-white">Delivered Orders</h3>
                <span class="badge badge-delivered ml-auto">{{ $this->deliveredOrders->total() }}</span>
            </div>
            <div class="p-4 space-y-2">
                @forelse($this->deliveredOrders as $order)
                    <div class="flex items-center justify-between p-3 rounded-xl transition-all"
                         style="background:rgba(16,185,129,0.05);"
                         onmouseover="this.style.background='rgba(16,185,129,0.1)';"
                         onmouseout="this.style.background='rgba(16,185,129,0.05)';">
                        <div>
                            <p class="font-semibold text-sm" style="color:#34d399;">{{ $order->order_number }}</p>
                            <p class="text-xs mt-0.5" style="color:#64748b;">{{ $order->customer->name }}</p>
                        </div>
                        <div class="text-right">
                            <p class="font-bold text-sm text-white">{{ number_format((float) $order->total_amount, 2) }} QAR</p>
                            <p class="text-xs" style="color:#64748b;">{{ $order->delivered_at->format('d M, h:i A') }}</p>
                        </div>
                    </div>
                @empty
                    <div class="text-center py-10">
                        <svg class="w-10 h-10 mx-auto mb-3" style="color:#1f2937;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                        <p class="text-sm" style="color:#64748b;">No delivered orders yet</p>
                    </div>
                @endforelse
            </div>
            @if($this->deliveredOrders->hasPages())
                <div class="px-4 pb-4 pt-2" style="border-top:1px solid rgba(255,255,255,0.05);">
                    {{ $this->deliveredOrders->links() }}
                </div>
            @endif
        </div>

        {{-- All Orders --}}
        <div class="rounded-2xl" style="background:rgba(255,255,255,0.04);border:1px solid rgba(255,255,255,0.07);">
            <div class="flex items-center gap-3 px-6 py-4" style="border-bottom:1px solid rgba(255,255,255,0.06);">
                <svg class="w-5 h-5" style="color:#0d9488;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <h3 class="font-bold text-white">All Orders</h3>
                <span class="badge badge-ready ml-auto">{{ $this->allOrders->total() }}</span>
            </div>
            <div class="p-4 space-y-2">
                @forelse($this->allOrders as $order)
                    <div class="flex items-center justify-between p-3 rounded-xl transition-all"
                         style="background:rgba(255,255,255,0.03);"
                         onmouseover="this.style.background='rgba(13,148,136,0.06)';"
                         onmouseout="this.style.background='rgba(255,255,255,0.03)';">
                        <div>
                            <p class="font-semibold text-sm" style="color:#2dd4bf;">{{ $order->order_number }}</p>
                            <p class="text-xs mt-0.5" style="color:#64748b;">{{ $order->customer->name }}</p>
                        </div>
                        <div class="text-right">
                            <p class="font-bold text-sm text-white">{{ number_format((float) $order->total_amount, 2) }} QAR</p>
                            <p class="text-xs" style="color:#64748b;">{{ $order->created_at->format('d M, h:i A') }}</p>
                        </div>
                    </div>
                @empty
                    <div class="text-center py-10">
                        <svg class="w-10 h-10 mx-auto mb-3" style="color:#1f2937;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                        <p class="text-sm" style="color:#64748b;">No orders found</p>
                    </div>
                @endforelse
            </div>
            @if($this->allOrders->hasPages())
                <div class="px-4 pb-4 pt-2" style="border-top:1px solid rgba(255,255,255,0.05);">
                    {{ $this->allOrders->links() }}
                </div>
            @endif
        </div>
    </div>
</div>