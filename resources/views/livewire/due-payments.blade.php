<div class="w-full">

    {{-- Header --}}
    <div class="flex items-center justify-between mb-8">
        <div class="flex items-center gap-4">
            <div class="w-12 h-12 rounded-2xl flex items-center justify-center flex-shrink-0"
                 style="background:linear-gradient(135deg,#f43f5e,#e11d48);box-shadow:0 0 20px rgba(244,63,94,0.3);">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 14l6-6m-5.5.5h.01m4.99 5h.01M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16l3.5-2 3.5 2 3.5-2 3.5 2zM10 8.5a.5.5 0 11-1 0 .5.5 0 011 0zm5 5a.5.5 0 11-1 0 .5.5 0 011 0z" />
                </svg>
            </div>
            <div>
                <h1 class="text-2xl font-bold text-white">Due Payments</h1>
                <p class="text-sm mt-0.5" style="color:#64748b;">Track and manage all pending customer payments</p>
            </div>
        </div>
    </div>

    {{-- Stats Cards --}}
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-8">
        {{-- Total Due --}}
        <div class="card-metric" style="border-left:3px solid #f43f5e;">
            <div class="flex items-start justify-between">
                <div>
                    <p class="text-xs font-semibold uppercase tracking-wider mb-3" style="color:#64748b;">Total Due Amount</p>
                    <p class="text-3xl font-bold" style="color:#fb7185;">{{ number_format($this->dueStats['total_due'], 2) }}</p>
                    <p class="text-xs mt-1" style="color:#64748b;">QAR outstanding</p>
                </div>
                <div class="w-10 h-10 rounded-xl flex items-center justify-center" style="background:rgba(244,63,94,0.12);">
                    <svg class="w-5 h-5" style="color:#f43f5e;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
            </div>
        </div>

        {{-- Customers --}}
        <div class="card-metric" style="border-left:3px solid #0d9488;">
            <div class="flex items-start justify-between">
                <div>
                    <p class="text-xs font-semibold uppercase tracking-wider mb-3" style="color:#64748b;">Customers</p>
                    <p class="text-3xl font-bold text-white">{{ $this->dueStats['total_customers'] }}</p>
                    <p class="text-xs mt-1" style="color:#64748b;">with due balance</p>
                </div>
                <div class="w-10 h-10 rounded-xl flex items-center justify-center" style="background:rgba(13,148,136,0.12);">
                    <svg class="w-5 h-5" style="color:#0d9488;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                </div>
            </div>
        </div>

        {{-- Total Orders --}}
        <div class="card-metric" style="border-left:3px solid #f59e0b;">
            <div class="flex items-start justify-between">
                <div>
                    <p class="text-xs font-semibold uppercase tracking-wider mb-3" style="color:#64748b;">Unpaid Orders</p>
                    <p class="text-3xl font-bold text-white">{{ $this->dueStats['total_orders'] }}</p>
                    <p class="text-xs mt-1" style="color:#64748b;">awaiting payment</p>
                </div>
                <div class="w-10 h-10 rounded-xl flex items-center justify-center" style="background:rgba(245,158,11,0.12);">
                    <svg class="w-5 h-5" style="color:#f59e0b;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                </div>
            </div>
        </div>

        {{-- Pending --}}
        <div class="card-metric" style="border-left:3px solid #38bdf8;">
            <div class="flex items-start justify-between">
                <div>
                    <p class="text-xs font-semibold uppercase tracking-wider mb-3" style="color:#64748b;">Pending</p>
                    <p class="text-3xl font-bold text-white">{{ $this->dueStats['pending_orders'] }}</p>
                    <p class="text-xs mt-1" style="color:#64748b;">not yet paid</p>
                </div>
                <div class="w-10 h-10 rounded-xl flex items-center justify-center" style="background:rgba(56,189,248,0.12);">
                    <svg class="w-5 h-5" style="color:#38bdf8;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
            </div>
        </div>
    </div>

    {{-- Filters --}}
    <div class="rounded-2xl p-6 mb-6" style="background:rgba(255,255,255,0.04);border:1px solid rgba(255,255,255,0.07);">
        <h3 class="text-sm font-semibold text-white mb-4">Filter & Sort</h3>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div>
                <label class="block text-xs font-medium mb-1.5" style="color:#64748b;">Search Customer</label>
                <input type="text" wire:model.live.debounce.300ms="dueSearch" placeholder="Name or phone..."
                    class="input-dark" />
            </div>
            <div>
                <label class="block text-xs font-medium mb-1.5" style="color:#64748b;">Sort By</label>
                <select wire:model.live="dueSortBy" class="select-dark">
                    <option value="amount_desc">Highest Due First</option>
                    <option value="amount_asc">Lowest Due First</option>
                    <option value="name_asc">Name (A-Z)</option>
                    <option value="name_desc">Name (Z-A)</option>
                    <option value="orders_desc">Most Orders</option>
                </select>
            </div>
            <div>
                <label class="block text-xs font-medium mb-1.5" style="color:#64748b;">Payment Status</label>
                <select wire:model.live="duePaymentStatus" class="select-dark">
                    <option value="all">All Status</option>
                    <option value="pending">Pending Only</option>
                    <option value="partial">Partial Only</option>
                </select>
            </div>
        </div>
    </div>

    {{-- Customers List --}}
    <div class="rounded-2xl overflow-hidden" style="background:rgba(255,255,255,0.04);border:1px solid rgba(255,255,255,0.07);">
        <div class="px-6 py-4" style="border-bottom:1px solid rgba(255,255,255,0.06);background:rgba(255,255,255,0.02);">
            <div class="flex items-center justify-between">
                <h3 class="font-semibold text-white text-sm">Customers with Due Payments</h3>
                <span class="badge badge-unpaid">{{ $this->duePayments->count() }} found</span>
            </div>
        </div>

        <div style="divide-y:1px solid rgba(255,255,255,0.05);">
            @forelse($this->duePayments as $customer)
                <div class="p-6 transition-all" style="border-bottom:1px solid rgba(255,255,255,0.05);"
                     onmouseover="this.style.background='rgba(244,63,94,0.03)';"
                     onmouseout="this.style.background='transparent';">

                    {{-- Customer Header --}}
                    <div class="flex items-center justify-between mb-5">
                        <div class="flex items-center gap-4">
                            <div class="w-14 h-14 rounded-2xl flex items-center justify-center text-white font-bold text-xl flex-shrink-0"
                                 style="background:linear-gradient(135deg,#f43f5e,#e11d48);">
                                {{ strtoupper(substr($customer->name, 0, 1)) }}
                            </div>
                            <div>
                                <h4 class="text-base font-bold text-white">{{ $customer->name }}</h4>
                                <div class="flex items-center gap-3 mt-1">
                                    <span class="text-xs" style="color:#64748b;">📞 {{ $customer->phone }}</span>
                                    <span style="color:#334155;">•</span>
                                    <span class="text-xs" style="color:#64748b;">{{ $customer->due_orders_count }} unpaid order(s)</span>
                                    @if($customer->is_regular)
                                        <span class="badge badge-ready">⭐ Regular</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="text-right">
                            <p class="text-xs mb-1" style="color:#64748b;">Total Due</p>
                            <p class="text-2xl font-bold" style="color:#fb7185;">
                                {{ number_format($customer->total_due, 2) }}
                                <span class="text-sm font-normal" style="color:#64748b;">QAR</span>
                            </p>
                        </div>
                    </div>

                    {{-- Orders Grid --}}
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-3">
                        @foreach($customer->orders as $order)
                            <div class="rounded-xl p-4 transition-all" style="background:rgba(244,63,94,0.05);border:1px solid rgba(244,63,94,0.12);">
                                <div class="flex items-start justify-between mb-3">
                                    <div>
                                        <p class="text-sm font-bold" style="color:#2dd4bf;">{{ $order->order_number }}</p>
                                        <p class="text-xs mt-0.5" style="color:#64748b;">{{ $order->created_at->format('d M Y') }}</p>
                                    </div>
                                    <span class="badge {{ $order->payment_status === 'pending' ? 'badge-unpaid' : 'badge-partial' }}">
                                        {{ ucfirst($order->payment_status) }}
                                    </span>
                                </div>
                                <div class="space-y-1.5 pt-3" style="border-top:1px solid rgba(255,255,255,0.06);">
                                    <div class="flex justify-between text-xs">
                                        <span style="color:#64748b;">Total:</span>
                                        <span class="font-medium text-white">{{ number_format((float) $order->total_amount, 2) }} QAR</span>
                                    </div>
                                    @if($order->advance_payment > 0)
                                        <div class="flex justify-between text-xs">
                                            <span style="color:#64748b;">Paid:</span>
                                            <span class="font-medium" style="color:#10b981;">{{ number_format((float) $order->advance_payment, 2) }} QAR</span>
                                        </div>
                                    @endif
                                    <div class="flex justify-between text-xs font-bold pt-2" style="border-top:1px solid rgba(255,255,255,0.06);">
                                        <span style="color:#94a3b8;">Due:</span>
                                        <span style="color:#fb7185;">{{ number_format($order->due_balance, 2) }} QAR</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @empty
                <div class="p-16 text-center">
                    <div class="w-16 h-16 rounded-2xl flex items-center justify-center mx-auto mb-4" style="background:rgba(16,185,129,0.1);">
                        <svg class="w-8 h-8" style="color:#10b981;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="text-base font-bold text-white mb-2">No Due Payments Found</h3>
                    <p class="text-sm" style="color:#64748b;">
                        @if(!empty($dueSearch) || $duePaymentStatus !== 'all')
                            No customers match your filter criteria.
                        @else
                            All customers have cleared their payments. 🎉
                        @endif
                    </p>
                </div>
            @endforelse
        </div>
    </div>
</div>