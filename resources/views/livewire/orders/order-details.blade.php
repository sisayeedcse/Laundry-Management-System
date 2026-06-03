<div>
    @if($showModal)
        <div class="fixed inset-0 z-50 flex items-center justify-center p-4" style="background:rgba(0,0,0,0.85);" x-data="{ show: @entangle('showModal') }" x-show="show" x-cloak>
            <div class="card-dark" style="width:100%;max-width:1000px;padding:0;overflow:hidden;max-height:90vh;display:flex;flex-direction:column;" @click.outside="show = false">

                {{-- Header --}}
                <div style="background:linear-gradient(135deg,rgba(13,148,136,0.15),rgba(15,118,110,0.1));padding:24px;border-bottom:1px solid rgba(255,255,255,0.08);display:flex;align-items:center;justify-content:space-between;flex-shrink:0;">
                    <div style="display:flex;align-items:center;gap:16px;">
                        <div style="width:56px;height:56px;border-radius:14px;background:linear-gradient(135deg,#0d9488,#0f766e);display:flex;align-items:center;justify-content:center;color:#fff;box-shadow:0 0 20px rgba(13,148,136,0.3);">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                        </div>
                        <div>
                            <h2 style="font-size:1.5rem;font-weight:700;color:#f9fafb;margin:0;">Order Details</h2>
                            <p style="color:#2dd4bf;font-size:0.9rem;margin:0;font-weight:600;">Order #{{ $this->order->order_number }}</p>
                        </div>
                    </div>
                    <button @click="show = false" style="background:rgba(255,255,255,0.05);border:1px solid rgba(255,255,255,0.1);color:#94a3b8;border-radius:10px;width:40px;height:40px;display:flex;align-items:center;justify-content:center;cursor:pointer;transition:0.2s;" onmouseover="this.style.background='rgba(244,63,94,0.15)';this.style.color='#f43f5e'" onmouseout="this.style.background='rgba(255,255,255,0.05)';this.style.color='#94a3b8'">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
                    </button>
                </div>

                {{-- Body --}}
                <div style="padding:24px;overflow-y:auto;flex-grow:1;" class="custom-scrollbar">
                    
                    @if (session()->has('success'))
                        <div class="alert-success" style="margin-bottom:20px;">{{ session('success') }}</div>
                    @endif
                    @if (session()->has('error'))
                        <div class="alert-error" style="margin-bottom:20px;">{{ session('error') }}</div>
                    @endif

                    <div style="display:grid;grid-template-columns:2fr 1fr;gap:24px;">
                        
                        {{-- Left Column --}}
                        <div style="display:flex;flex-direction:column;gap:24px;">
                            
                            {{-- Order Information Card --}}
                            <div style="background:rgba(255,255,255,0.02);border:1px solid rgba(255,255,255,0.06);border-radius:20px;padding:24px;">
                                <h3 style="font-size:1.1rem;font-weight:700;color:#f9fafb;display:flex;align-items:center;gap:10px;margin:0 0 20px 0;">
                                    <svg style="width:20px;height:20px;color:#0d9488;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                                    Order Information
                                </h3>

                                <div style="display:grid;grid-template-columns:1fr 1fr 1fr;gap:20px;">
                                    <div>
                                        <p style="color:#94a3b8;font-size:0.75rem;font-weight:600;text-transform:uppercase;margin:0 0 4px 0;">Order Number</p>
                                        <p style="color:#f9fafb;font-size:1rem;font-weight:600;margin:0;">{{ $this->order->order_number }}</p>
                                    </div>
                                    <div>
                                        <p style="color:#94a3b8;font-size:0.75rem;font-weight:600;text-transform:uppercase;margin:0 0 4px 0;">Order Date</p>
                                        <p style="color:#f9fafb;font-size:0.9rem;margin:0;">{{ $this->order->created_at->format('d M Y, h:i A') }}</p>
                                    </div>
                                    <div>
                                        <p style="color:#94a3b8;font-size:0.75rem;font-weight:600;text-transform:uppercase;margin:0 0 4px 0;">Delivery Date</p>
                                        <p style="color:#f9fafb;font-size:0.9rem;margin:0;">{{ \Carbon\Carbon::parse($this->order->delivery_date)->format('d M Y') }}</p>
                                    </div>
                                    <div>
                                        <p style="color:#94a3b8;font-size:0.75rem;font-weight:600;text-transform:uppercase;margin:0 0 4px 0;">Payment Method</p>
                                        <p style="color:#f9fafb;font-size:0.9rem;margin:0;text-transform:capitalize;">{{ $this->order->payment_method ? str_replace('_', ' ', $this->order->payment_method) : 'Not Paid' }}</p>
                                    </div>
                                    <div>
                                        <p style="color:#94a3b8;font-size:0.75rem;font-weight:600;text-transform:uppercase;margin:0 0 4px 0;">Order Status</p>
                                        <span class="badge {{ $this->order->status === 'pending' ? 'badge-pending' : ($this->order->status === 'processing' ? 'badge-processing' : ($this->order->status === 'ready' ? 'badge-ready' : 'badge-delivered')) }}">
                                            {{ ucfirst($this->order->status) }}
                                        </span>
                                    </div>
                                    <div>
                                        <p style="color:#94a3b8;font-size:0.75rem;font-weight:600;text-transform:uppercase;margin:0 0 4px 0;">Payment Status</p>
                                        <span class="badge {{ $this->order->payment_status === 'paid' ? 'badge-paid' : ($this->order->payment_status === 'partial' ? 'badge-processing' : 'badge-unpaid') }}">
                                            {{ ucfirst($this->order->payment_status) }}
                                        </span>
                                    </div>
                                </div>

                                {{-- Order Notes --}}
                                <div style="margin-top:20px;padding-top:20px;border-top:1px solid rgba(255,255,255,0.06);">
                                    <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:12px;">
                                        <p style="color:#f9fafb;font-size:0.9rem;font-weight:600;margin:0;">Order Notes</p>
                                        @if(!$editingNotes)
                                            <button wire:click="toggleEditNotes" style="background:none;border:none;color:#0d9488;cursor:pointer;font-size:0.8rem;font-weight:600;display:flex;align-items:center;gap:4px;">
                                                <svg style="width:14px;height:14px;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                                Edit Notes
                                            </button>
                                        @endif
                                    </div>

                                    @if($editingNotes)
                                        <div style="display:flex;flex-direction:column;gap:12px;">
                                            <textarea wire:model="orderNotes" rows="3" class="input-dark" placeholder="Add notes for this order..."></textarea>
                                            <div style="display:flex;gap:8px;">
                                                <button wire:click="saveNotes" class="btn-primary" style="padding:6px 12px;font-size:0.8rem;">Save Notes</button>
                                                <button wire:click="toggleEditNotes" class="btn-secondary" style="padding:6px 12px;font-size:0.8rem;">Cancel</button>
                                            </div>
                                        </div>
                                    @else
                                        @if($this->order->notes)
                                            <p style="color:#e2e8f0;font-size:0.9rem;margin:0;white-space:pre-wrap;background:rgba(255,255,255,0.02);padding:12px;border-radius:8px;border:1px solid rgba(255,255,255,0.05);">{{ $this->order->notes }}</p>
                                        @else
                                            <p style="color:#64748b;font-size:0.9rem;font-style:italic;margin:0;">No notes added yet</p>
                                        @endif
                                    @endif
                                </div>
                            </div>

                            {{-- Customer Information Card --}}
                            <div style="background:rgba(255,255,255,0.02);border:1px solid rgba(255,255,255,0.06);border-radius:20px;padding:24px;">
                                <h3 style="font-size:1.1rem;font-weight:700;color:#f9fafb;display:flex;align-items:center;gap:10px;margin:0 0 20px 0;">
                                    <svg style="width:20px;height:20px;color:#0ea5e9;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                                    Customer Information
                                </h3>
                                
                                <div style="display:grid;grid-template-columns:1fr 1fr;gap:20px;">
                                    <div style="display:flex;align-items:center;gap:12px;">
                                        <div style="width:40px;height:40px;border-radius:50%;background:linear-gradient(135deg,#0ea5e9,#0284c7);display:flex;align-items:center;justify-content:center;color:#fff;font-weight:bold;">
                                            {{ strtoupper(substr($this->order->customer->name, 0, 1)) }}
                                        </div>
                                        <div>
                                            <p style="color:#94a3b8;font-size:0.75rem;font-weight:600;margin:0 0 2px 0;">Name</p>
                                            <p style="color:#f9fafb;font-size:1rem;font-weight:600;margin:0;">{{ $this->order->customer->name }}</p>
                                        </div>
                                    </div>

                                    @if($this->order->customer->phone)
                                    <div>
                                        <p style="color:#94a3b8;font-size:0.75rem;font-weight:600;margin:0 0 2px 0;">Phone</p>
                                        <p style="color:#f9fafb;font-size:0.95rem;margin:0;">{{ $this->order->customer->phone }}</p>
                                    </div>
                                    @endif

                                    @if($this->order->customer->address)
                                    <div style="grid-column:1 / -1;">
                                        <p style="color:#94a3b8;font-size:0.75rem;font-weight:600;margin:0 0 2px 0;">Address</p>
                                        <p style="color:#f9fafb;font-size:0.95rem;margin:0;">{{ $this->order->customer->address }}</p>
                                    </div>
                                    @endif
                                </div>
                            </div>

                            {{-- Order Items Table --}}
                            <div style="background:rgba(255,255,255,0.02);border:1px solid rgba(255,255,255,0.06);border-radius:20px;padding:24px;overflow-x:auto;">
                                <h3 style="font-size:1.1rem;font-weight:700;color:#f9fafb;display:flex;align-items:center;gap:10px;margin:0 0 20px 0;">
                                    <svg style="width:20px;height:20px;color:#f59e0b;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
                                    Order Items
                                </h3>

                                <table class="table-dark" style="margin:0;">
                                    <thead>
                                        <tr>
                                            <th>Service</th>
                                            <th>Type</th>
                                            <th>Finish</th>
                                            <th style="text-align:center;">Qty</th>
                                            <th style="text-align:right;">Price</th>
                                            <th style="text-align:right;">Subtotal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($this->order->orderItems as $item)
                                            <tr>
                                                <td style="color:#f9fafb;font-weight:500;">{{ $item->service->name }}</td>
                                                <td>
                                                    <span class="badge {{ $item->service_type === 'urgent' ? 'badge-unpaid' : 'badge-processing' }}">
                                                        {{ ucfirst($item->service_type) }}
                                                    </span>
                                                </td>
                                                <td>
                                                    <span class="badge badge-active" style="background:rgba(16,185,129,0.1);color:#10b981;">
                                                        {{ $item->finish_type === 'hanger' ? '👔 Hanger' : '📦 Fold' }}
                                                    </span>
                                                </td>
                                                <td style="text-align:center;color:#f9fafb;">{{ $item->quantity }}</td>
                                                <td style="text-align:right;color:#cbd5e1;">QAR {{ number_format($item->unit_price, 2) }}</td>
                                                <td style="text-align:right;color:#f59e0b;font-weight:600;">QAR {{ number_format($item->subtotal, 2) }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div>

                        {{-- Right Column --}}
                        <div style="display:flex;flex-direction:column;gap:24px;">
                            
                            {{-- Order Summary --}}
                            <div style="background:linear-gradient(135deg,rgba(13,148,136,0.1),rgba(15,118,110,0.05));border:1px solid rgba(13,148,136,0.2);border-radius:20px;padding:24px;">
                                <h3 style="font-size:1.1rem;font-weight:700;color:#f9fafb;margin:0 0 20px 0;">Order Summary</h3>
                                
                                <div style="display:flex;flex-direction:column;gap:12px;">
                                    <div style="display:flex;justify-content:space-between;color:#cbd5e1;font-size:0.9rem;">
                                        <span>Subtotal</span>
                                        <span style="color:#f9fafb;font-weight:600;">QAR {{ number_format($this->order->orderItems->sum('subtotal'), 2) }}</span>
                                    </div>
                                    @if($this->order->discount > 0)
                                    <div style="display:flex;justify-content:space-between;color:#cbd5e1;font-size:0.9rem;">
                                        <span>Discount</span>
                                        <span style="color:#fb7185;font-weight:600;">- QAR {{ number_format($this->order->discount, 2) }}</span>
                                    </div>
                                    @endif
                                    @if($this->order->tax > 0)
                                    <div style="display:flex;justify-content:space-between;color:#cbd5e1;font-size:0.9rem;">
                                        <span>Tax</span>
                                        <span style="color:#f9fafb;font-weight:600;">QAR {{ number_format($this->order->tax, 2) }}</span>
                                    </div>
                                    @endif
                                    
                                    <div style="margin-top:8px;padding-top:16px;border-top:1px solid rgba(13,148,136,0.2);display:flex;justify-content:space-between;align-items:center;">
                                        <span style="color:#f9fafb;font-weight:600;">Total Amount</span>
                                        <span style="color:#2dd4bf;font-size:1.5rem;font-weight:700;">QAR {{ number_format($this->order->total_amount, 2) }}</span>
                                    </div>

                                    <div style="margin-top:16px;padding-top:16px;border-top:1px solid rgba(13,148,136,0.2);">
                                        <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:12px;">
                                            <span style="color:#cbd5e1;font-size:0.9rem;">Payment Status</span>
                                            <span class="badge {{ $this->order->payment_status === 'paid' ? 'badge-paid' : ($this->order->payment_status === 'partial' ? 'badge-processing' : 'badge-unpaid') }}" style="font-size:0.85rem;">
                                                {{ strtoupper($this->order->payment_status) }}
                                            </span>
                                        </div>
                                        <button wire:click="togglePaymentStatus" class="btn-primary" style="width:100%;justify-content:center;background:{{ $this->order->payment_status === 'paid' ? 'rgba(244,63,94,0.1)' : 'rgba(16,185,129,0.1)' }};color:{{ $this->order->payment_status === 'paid' ? '#fb7185' : '#34d399' }};border:1px solid {{ $this->order->payment_status === 'paid' ? 'rgba(244,63,94,0.3)' : 'rgba(16,185,129,0.3)' }};box-shadow:none;">
                                            @if($this->order->payment_status === 'paid')
                                                Mark as Unpaid
                                            @else
                                                Mark as Paid
                                            @endif
                                        </button>
                                    </div>
                                </div>
                            </div>

                            {{-- Status Workflow --}}
                            @if($this->order->status !== 'delivered')
                                <div style="background:rgba(255,255,255,0.02);border:1px solid rgba(255,255,255,0.06);border-radius:20px;padding:24px;">
                                    <h3 style="font-size:1.1rem;font-weight:700;color:#f9fafb;margin:0 0 16px 0;">Update Status</h3>
                                    
                                    @php
                                        $nextStatus = $this->getNextStatus($this->order->status);
                                    @endphp
                                    @if($nextStatus)
                                        <button wire:click="updateStatus('{{ $nextStatus }}')" class="btn-primary" style="width:100%;justify-content:center;padding:12px;font-size:1rem;">
                                            Move to {{ ucfirst($nextStatus) }}
                                        </button>
                                    @endif

                                    <div style="margin-top:20px;padding-top:20px;border-top:1px solid rgba(255,255,255,0.06);">
                                        <p style="color:#94a3b8;font-size:0.8rem;font-weight:600;margin:0 0 12px 0;text-transform:uppercase;">Status Progress</p>
                                        <div style="display:flex;flex-direction:column;gap:12px;">
                                            @foreach(['pending', 'processing', 'ready', 'delivered'] as $status)
                                                <div style="display:flex;align-items:center;gap:12px;">
                                                    @if($this->order->status === $status)
                                                        <div style="width:12px;height:12px;border-radius:50%;background:#0d9488;box-shadow:0 0 10px #0d9488;"></div>
                                                        <span style="color:#2dd4bf;font-weight:600;font-size:0.9rem;">{{ ucfirst($status) }}</span>
                                                    @elseif(array_search($status, ['pending', 'processing', 'ready', 'delivered']) < array_search($this->order->status, ['pending', 'processing', 'ready', 'delivered']))
                                                        <div style="width:12px;height:12px;border-radius:50%;background:#10b981;"></div>
                                                        <span style="color:#94a3b8;font-size:0.9rem;">{{ ucfirst($status) }}</span>
                                                    @else
                                                        <div style="width:12px;height:12px;border-radius:50%;background:rgba(255,255,255,0.1);"></div>
                                                        <span style="color:#64748b;font-size:0.9rem;">{{ ucfirst($status) }}</span>
                                                    @endif
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endif

                            {{-- Payment History --}}
                            @if($this->order->payments->count() > 0)
                                <div style="background:rgba(255,255,255,0.02);border:1px solid rgba(255,255,255,0.06);border-radius:20px;padding:24px;">
                                    <h3 style="font-size:1.1rem;font-weight:700;color:#f9fafb;margin:0 0 16px 0;">Payment History</h3>
                                    <div style="display:flex;flex-direction:column;gap:12px;">
                                        @foreach($this->order->payments as $payment)
                                            <div style="display:flex;justify-content:space-between;padding-bottom:12px;border-bottom:1px solid rgba(255,255,255,0.06);last-child:border-bottom:none;">
                                                <div>
                                                    <p style="color:#f9fafb;font-size:0.9rem;font-weight:600;margin:0;">QAR {{ number_format($payment->amount, 2) }}</p>
                                                    <p style="color:#64748b;font-size:0.75rem;margin:2px 0 0;">{{ $payment->payment_date->format('d M Y') }}</p>
                                                </div>
                                                <span class="badge badge-active" style="height:fit-content;text-transform:capitalize;">{{ str_replace('_', ' ', $payment->payment_method) }}</span>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endif

                            {{-- Actions --}}
                            <div style="background:rgba(255,255,255,0.02);border:1px solid rgba(255,255,255,0.06);border-radius:20px;padding:24px;">
                                <h3 style="font-size:1.1rem;font-weight:700;color:#f9fafb;margin:0 0 16px 0;">Actions</h3>
                                <div style="display:flex;flex-direction:column;gap:12px;">
                                    <a href="{{ route('orders.receipt.print', $this->order->id) }}" target="_blank" class="btn-secondary" style="justify-content:center;text-decoration:none;">
                                        <svg style="width:18px;height:18px;margin-right:8px;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"/></svg>
                                        Print Receipt
                                    </a>
                                    <a href="{{ route('orders.receipt.download', $this->order->id) }}" class="btn-primary" style="justify-content:center;text-decoration:none;">
                                        <svg style="width:18px;height:18px;margin-right:8px;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                                        Download PDF
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    {{-- Payment Method Selection Modal --}}
    @if($showPaymentModal)
        <div class="fixed inset-0 z-50 flex items-center justify-center p-4" style="background:rgba(0,0,0,0.85);">
            <div class="card-dark" style="width:100%;max-width:450px;padding:24px;text-align:center;">
                <div style="width:64px;height:64px;border-radius:50%;background:rgba(16,185,129,0.1);color:#10b981;display:flex;align-items:center;justify-content:center;margin:0 auto 16px;">
                    <svg style="width:32px;height:32px;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
                
                <h3 style="font-size:1.2rem;font-weight:700;color:#f9fafb;margin:0 0 8px 0;">Select Payment Method</h3>
                <p style="color:#94a3b8;font-size:0.9rem;margin:0 0 24px 0;">Order has been delivered. Please select the payment method used by customer.</p>

                <div style="display:flex;flex-direction:column;gap:12px;text-align:left;">
                    <label style="display:flex;align-items:center;gap:16px;padding:16px;background:{{ $selectedPaymentMethod === 'cash' ? 'rgba(16,185,129,0.1)' : 'rgba(255,255,255,0.02)' }};border:1px solid {{ $selectedPaymentMethod === 'cash' ? 'rgba(16,185,129,0.3)' : 'rgba(255,255,255,0.1)' }};border-radius:12px;cursor:pointer;transition:0.2s;">
                        <input type="radio" wire:model="selectedPaymentMethod" value="cash" style="display:none;">
                        <svg style="width:28px;height:28px;color:{{ $selectedPaymentMethod === 'cash' ? '#10b981' : '#64748b' }};" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                        <div>
                            <p style="color:{{ $selectedPaymentMethod === 'cash' ? '#10b981' : '#f9fafb' }};font-size:1rem;font-weight:600;margin:0;">Cash Payment</p>
                            <p style="color:{{ $selectedPaymentMethod === 'cash' ? 'rgba(16,185,129,0.8)' : '#64748b' }};font-size:0.8rem;margin:0;">Customer paid in cash</p>
                        </div>
                    </label>
                    <label style="display:flex;align-items:center;gap:16px;padding:16px;background:{{ $selectedPaymentMethod === 'card' ? 'rgba(14,165,233,0.1)' : 'rgba(255,255,255,0.02)' }};border:1px solid {{ $selectedPaymentMethod === 'card' ? 'rgba(14,165,233,0.3)' : 'rgba(255,255,255,0.1)' }};border-radius:12px;cursor:pointer;transition:0.2s;">
                        <input type="radio" wire:model="selectedPaymentMethod" value="card" style="display:none;">
                        <svg style="width:28px;height:28px;color:{{ $selectedPaymentMethod === 'card' ? '#0ea5e9' : '#64748b' }};" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/></svg>
                        <div>
                            <p style="color:{{ $selectedPaymentMethod === 'card' ? '#0ea5e9' : '#f9fafb' }};font-size:1rem;font-weight:600;margin:0;">Card Payment</p>
                            <p style="color:{{ $selectedPaymentMethod === 'card' ? 'rgba(14,165,233,0.8)' : '#64748b' }};font-size:0.8rem;margin:0;">Customer paid by card</p>
                        </div>
                    </label>
                </div>

                <div style="margin-top:16px;padding:12px;background:rgba(245,158,11,0.1);border-radius:8px;">
                    <p style="color:#f59e0b;font-size:0.85rem;margin:0;">Note: Total amount: <strong style="color:#fbbf24;">{{ number_format($this->order->total_amount, 2) }} QAR</strong></p>
                </div>

                <div style="display:flex;justify-content:center;gap:12px;margin-top:24px;">
                    <button type="button" wire:click="closePaymentModal" class="btn-secondary" style="flex:1;justify-content:center;">Cancel</button>
                    <button type="button" wire:click="completePayment" class="btn-primary" style="flex:1;justify-content:center;">Complete Payment</button>
                </div>
            </div>
        </div>
    @endif
</div>