<div class="w-full">

    {{-- Flash Messages --}}
    @if (session()->has('success'))
        <div class="alert-success mb-6">
            <svg class="w-5 h-5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" /></svg>
            <span>{{ session('success') }}</span>
        </div>
    @endif
    @if (session()->has('error'))
        <div class="alert-error mb-6">
            <svg class="w-5 h-5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" /></svg>
            <span>{{ session('error') }}</span>
        </div>
    @endif
    @if (session()->has('info'))
        <div class="alert-info mb-6">
            <svg class="w-5 h-5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" /></svg>
            <span>{{ session('info') }}</span>
        </div>
    @endif

    {{-- Page Header --}}
    <div class="flex items-center justify-between mb-8">
        <div class="flex items-center gap-4">
            <div class="w-12 h-12 rounded-2xl flex items-center justify-center flex-shrink-0"
                 style="background:linear-gradient(135deg,#0d9488,#0f766e);box-shadow:0 0 20px rgba(13,148,136,0.3);">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
            </div>
            <div>
                <h1 class="text-2xl font-bold text-white">Orders Management</h1>
                <p class="text-sm mt-0.5" style="color:#64748b;">Track and manage all laundry orders</p>
            </div>
        </div>
        <a href="/pos"
           class="btn-primary">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            New Order
        </a>
    </div>

    {{-- Filters Card --}}
    <div class="rounded-2xl p-6 mb-6" style="background:rgba(255,255,255,0.04);border:1px solid rgba(255,255,255,0.07);">
        <div class="flex items-center gap-2 mb-5">
            <svg class="w-4 h-4" style="color:#0d9488;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
            </svg>
            <h3 class="font-semibold text-white text-sm">Filter Orders</h3>
        </div>
        <div class="grid grid-cols-1 gap-4 md:grid-cols-6">
            <div class="md:col-span-2">
                <label class="block text-xs font-medium mb-1.5" style="color:#64748b;">Search</label>
                <div class="relative">
                    <input type="text" wire:model.live.debounce.300ms="search" placeholder="Order #, customer name..."
                        class="input-dark pl-10" />
                    <svg class="w-4 h-4 absolute left-3 top-1/2 -translate-y-1/2" style="color:#64748b;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
            </div>
            <div>
                <label class="block text-xs font-medium mb-1.5" style="color:#64748b;">Order Status</label>
                <select wire:model.live="statusFilter" class="select-dark">
                    <option value="all">All Status</option>
                    <option value="pending">Pending</option>
                    <option value="processing">Processing</option>
                    <option value="ready">Ready</option>
                    <option value="delivered">Delivered</option>
                </select>
            </div>
            <div>
                <label class="block text-xs font-medium mb-1.5" style="color:#64748b;">Payment</label>
                <select wire:model.live="paymentFilter" class="select-dark">
                    <option value="all">All Payments</option>
                    <option value="pending">Unpaid</option>
                    <option value="partial">Partial</option>
                    <option value="paid">Paid</option>
                </select>
            </div>
            <div>
                <label class="block text-xs font-medium mb-1.5" style="color:#64748b;">From Date</label>
                <input type="date" wire:model.live="dateFrom" class="input-dark" />
            </div>
            <div>
                <label class="block text-xs font-medium mb-1.5" style="color:#64748b;">To Date</label>
                <input type="date" wire:model.live="dateTo" class="input-dark" />
            </div>
        </div>
        @if($search || $statusFilter !== 'all' || $paymentFilter !== 'all' || $dateFrom || $dateTo)
            <div class="mt-4 pt-4" style="border-top:1px solid rgba(255,255,255,0.06);">
                <button wire:click="clearFilters" class="flex items-center gap-2 text-sm font-medium" style="color:#0d9488;">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                    Clear All Filters
                </button>
            </div>
        @endif
    </div>

    {{-- Pending Payment Section --}}
    @if($this->pendingOrder)
        <div class="rounded-2xl p-5 mb-6" style="background:rgba(245,158,11,0.06);border:1px solid rgba(245,158,11,0.2);">
            <div class="flex items-start justify-between gap-4 mb-4">
                <div class="flex items-center gap-4">
                    <div class="w-10 h-10 rounded-xl flex items-center justify-center" style="background:rgba(245,158,11,0.15);">
                        <svg class="w-5 h-5" style="color:#f59e0b;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div>
                        <h4 class="font-semibold text-white text-sm">Complete Payment</h4>
                        <p class="text-xs mt-0.5" style="color:#94a3b8;">Order {{ $this->pendingOrder->order_number }} — {{ $this->pendingOrder->customer->name }}</p>
                    </div>
                </div>
                <button wire:click="cancelPendingPayment" class="text-xs font-medium" style="color:#64748b;">Dismiss</button>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                <button wire:click="completePayment('cash')"
                    class="group flex items-center gap-3 p-4 rounded-xl transition-all"
                    style="background:rgba(16,185,129,0.08);border:1px solid rgba(16,185,129,0.2);"
                    onmouseover="this.style.background='rgba(16,185,129,0.15)';this.style.borderColor='rgba(16,185,129,0.4)';"
                    onmouseout="this.style.background='rgba(16,185,129,0.08)';this.style.borderColor='rgba(16,185,129,0.2)';">
                    <div class="w-10 h-10 rounded-xl flex items-center justify-center" style="background:rgba(16,185,129,0.15);">
                        <svg class="w-5 h-5" style="color:#10b981;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </div>
                    <div class="text-left">
                        <p class="font-bold text-white text-sm">Cash Payment</p>
                        <p class="text-xs" style="color:#64748b;">Paid in cash</p>
                    </div>
                </button>
                <button wire:click="completePayment('card')"
                    class="group flex items-center gap-3 p-4 rounded-xl transition-all"
                    style="background:rgba(56,189,248,0.08);border:1px solid rgba(56,189,248,0.2);"
                    onmouseover="this.style.background='rgba(56,189,248,0.15)';this.style.borderColor='rgba(56,189,248,0.4)';"
                    onmouseout="this.style.background='rgba(56,189,248,0.08)';this.style.borderColor='rgba(56,189,248,0.2)';">
                    <div class="w-10 h-10 rounded-xl flex items-center justify-center" style="background:rgba(56,189,248,0.15);">
                        <svg class="w-5 h-5" style="color:#38bdf8;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                        </svg>
                    </div>
                    <div class="text-left">
                        <p class="font-bold text-white text-sm">Card Payment</p>
                        <p class="text-xs" style="color:#64748b;">Paid by card</p>
                    </div>
                </button>
            </div>
        </div>
    @endif

    {{-- Orders List --}}
    <div class="space-y-3">
        @forelse ($this->orders as $order)
            <div wire:key="order-{{ $order->id }}"
                 class="rounded-2xl transition-all duration-200"
                 style="background:rgba(255,255,255,0.04);border:1px solid rgba(255,255,255,0.07);"
                 onmouseover="this.style.borderColor='rgba(13,148,136,0.2)';this.style.boxShadow='0 4px 20px rgba(0,0,0,0.3)';"
                 onmouseout="this.style.borderColor='rgba(255,255,255,0.07)';this.style.boxShadow='none';">
                <div class="p-5">
                    {{-- Order Header --}}
                    <div class="flex items-start justify-between mb-4 pb-4" style="border-bottom:1px solid rgba(255,255,255,0.06);">
                        <div class="flex items-center gap-4">
                            <div class="w-11 h-11 rounded-xl flex items-center justify-center flex-shrink-0"
                                 style="background:rgba(13,148,136,0.12);border:1px solid rgba(13,148,136,0.2);">
                                <svg class="w-5 h-5" style="color:#2dd4bf;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-base font-bold" style="color:#2dd4bf;">{{ $order->order_number }}</h3>
                                <p class="text-xs mt-0.5" style="color:#64748b;">{{ $order->created_at->format('d M Y, h:i A') }}</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-2">
                            <button wire:click="viewOrder({{ $order->id }})"
                                class="px-4 py-2 text-sm font-medium rounded-xl transition-all"
                                style="background:rgba(13,148,136,0.1);color:#2dd4bf;border:1px solid rgba(13,148,136,0.2);"
                                onmouseover="this.style.background='rgba(13,148,136,0.2)';"
                                onmouseout="this.style.background='rgba(13,148,136,0.1)';">
                                View Details
                            </button>
                            @if($order->status !== 'delivered')
                                <button wire:click="deleteOrder({{ $order->id }})"
                                    wire:confirm="Are you sure you want to delete this order?"
                                    class="p-2 rounded-xl transition-all"
                                    style="color:#f43f5e;background:rgba(244,63,94,0.08);border:1px solid rgba(244,63,94,0.2);"
                                    onmouseover="this.style.background='rgba(244,63,94,0.15)';"
                                    onmouseout="this.style.background='rgba(244,63,94,0.08)';"
                                    title="Delete">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </button>
                            @endif
                        </div>
                    </div>

                    {{-- Order Details Grid --}}
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                        {{-- Customer --}}
                        <div>
                            <p class="text-xs font-semibold uppercase tracking-wider mb-2" style="color:#475569;">Customer</p>
                            <p class="text-sm font-semibold text-white">{{ $order->customer->name }}</p>
                            <p class="text-xs mt-0.5" style="color:#64748b;">{{ $order->customer->phone }}</p>
                            @if($order->notes)
                                <p class="text-xs mt-2 italic" style="color:#64748b;">📝 {{ $order->notes }}</p>
                            @endif
                        </div>

                        {{-- Items & Total --}}
                        <div>
                            <p class="text-xs font-semibold uppercase tracking-wider mb-2" style="color:#475569;">Order Details</p>
                            <p class="text-xs" style="color:#94a3b8;">{{ $order->items->count() }} item(s)</p>
                            <p class="text-lg font-bold text-white mt-1">
                                {{ number_format($order->total_amount, 2) }}
                                <span class="text-xs font-normal" style="color:#64748b;">QAR</span>
                            </p>
                        </div>

                        {{-- Order Status --}}
                        <div>
                            <p class="text-xs font-semibold uppercase tracking-wider mb-2" style="color:#475569;">Order Status</p>
                            <select wire:change="updateStatus({{ $order->id }}, $event.target.value)"
                                wire:key="status-{{ $order->id }}"
                                class="w-full rounded-xl px-3 py-2 text-xs font-semibold cursor-pointer transition-all"
                                style="
                                    background:{{ $order->status === 'pending' ? 'rgba(245,158,11,0.12)' : ($order->status === 'processing' ? 'rgba(56,189,248,0.12)' : ($order->status === 'ready' ? 'rgba(13,148,136,0.12)' : 'rgba(16,185,129,0.12)')) }};
                                    color:{{ $order->status === 'pending' ? '#fbbf24' : ($order->status === 'processing' ? '#38bdf8' : ($order->status === 'ready' ? '#2dd4bf' : '#34d399')) }};
                                    border:1px solid {{ $order->status === 'pending' ? 'rgba(245,158,11,0.25)' : ($order->status === 'processing' ? 'rgba(56,189,248,0.25)' : ($order->status === 'ready' ? 'rgba(13,148,136,0.25)' : 'rgba(16,185,129,0.25)')) }};
                                ">
                                <option value="pending" {{ $order->status === 'pending' ? 'selected' : '' }}>⏳ Pending</option>
                                <option value="processing" {{ $order->status === 'processing' ? 'selected' : '' }}>🔄 Processing</option>
                                <option value="ready" {{ $order->status === 'ready' ? 'selected' : '' }}>✅ Ready</option>
                                <option value="delivered" {{ $order->status === 'delivered' ? 'selected' : '' }}>🚚 Delivered</option>
                            </select>
                        </div>

                        {{-- Payment & Delivery --}}
                        <div>
                            <p class="text-xs font-semibold uppercase tracking-wider mb-2" style="color:#475569;">Payment</p>
                            <div class="flex items-center gap-2 flex-wrap mb-2">
                                <span class="badge {{ $order->payment_status === 'pending' ? 'badge-unpaid' : ($order->payment_status === 'partial' ? 'badge-partial' : 'badge-paid') }}">
                                    {{ ucfirst($order->payment_status) }}
                                </span>
                                @if($order->payment_method)
                                    <span class="badge {{ $order->payment_method === 'cash' ? 'badge-paid' : 'badge-processing' }}">
                                        {{ $order->payment_method === 'cash' ? '💵' : '💳' }} {{ strtoupper($order->payment_method) }}
                                    </span>
                                @endif
                            </div>
                            <p class="text-xs font-semibold uppercase tracking-wider mb-1" style="color:#475569;">Delivery Date</p>
                            <p class="text-sm text-white">{{ \Carbon\Carbon::parse($order->delivery_date)->format('d M Y') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="rounded-2xl p-16 text-center" style="background:rgba(255,255,255,0.03);border:1px solid rgba(255,255,255,0.06);">
                <div class="w-20 h-20 rounded-2xl flex items-center justify-center mx-auto mb-5" style="background:rgba(255,255,255,0.05);">
                    <svg class="w-10 h-10" style="color:#374151;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                </div>
                <h3 class="text-lg font-bold text-white mb-2">No Orders Found</h3>
                <p class="text-sm mb-6" style="color:#64748b;">Start creating orders from the POS system</p>
                <a href="/pos" class="btn-primary inline-flex">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    Go to POS
                </a>
            </div>
        @endforelse
    </div>

    {{-- Pagination --}}
    @if($this->orders->hasPages())
        <div class="mt-6 rounded-2xl p-4" style="background:rgba(255,255,255,0.04);border:1px solid rgba(255,255,255,0.07);">
            {{ $this->orders->links() }}
        </div>
    @endif

    {{-- Order Details Modal --}}
    @if($showDetailsModal && $selectedOrderId)
        <div wire:key="order-details-{{ $selectedOrderId }}">
            @livewire('orders.order-details', ['orderId' => $selectedOrderId], 'order-details-' . $selectedOrderId)
        </div>
    @endif
</div>