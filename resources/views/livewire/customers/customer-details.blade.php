<div>
    @if($showModal)
        <div class="fixed inset-0 z-50 flex items-center justify-center p-4" style="background:rgba(0,0,0,0.85);" wire:click="closeModal">
            <div wire:click.stop class="w-full max-w-4xl max-h-[90vh] overflow-y-auto card-dark" style="background:#040c18;padding:0;">

                {{-- Header --}}
                <div style="background:linear-gradient(135deg,rgba(13,148,136,0.15),rgba(15,118,110,0.1));padding:24px;border-bottom:1px solid rgba(255,255,255,0.08);display:flex;align-items:center;justify-content:space-between;position:sticky;top:0;z-index:10;backdrop-filter:blur(10px);">
                    <div style="display:flex;align-items:center;gap:16px;">
                        <div style="width:56px;height:56px;border-radius:50%;background:linear-gradient(135deg,#0d9488,#0f766e);display:flex;align-items:center;justify-content:center;font-size:24px;font-weight:bold;color:#fff;box-shadow:0 0 20px rgba(13,148,136,0.3);">
                            {{ strtoupper(substr($this->customer->name, 0, 1)) }}
                        </div>
                        <div>
                            <h2 style="font-size:1.5rem;font-weight:700;color:#f9fafb;margin:0;">{{ $this->customer->name }}</h2>
                            <p style="color:#2dd4bf;font-size:0.9rem;margin:0;">Customer Profile</p>
                        </div>
                    </div>
                    <button wire:click="closeModal" style="background:rgba(255,255,255,0.05);border:1px solid rgba(255,255,255,0.1);color:#94a3b8;border-radius:10px;width:40px;height:40px;display:flex;align-items:center;justify-content:center;cursor:pointer;transition:0.2s;" onmouseover="this.style.background='rgba(244,63,94,0.15)';this.style.color='#f43f5e'" onmouseout="this.style.background='rgba(255,255,255,0.05)';this.style.color='#94a3b8'">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
                    </button>
                </div>

                {{-- Body --}}
                <div style="padding:24px;">
                    
                    {{-- Flash Messages --}}
                    @if(session()->has('message'))
                        <div class="alert-success" style="margin-bottom:20px;">
                            {{ session('message') }}
                        </div>
                    @endif
                    
                    @if($errors->any())
                        <div class="alert-error" style="margin-bottom:20px;">
                            Please fix the errors below
                        </div>
                    @endif

                    {{-- Edit Mode Banner --}}
                    @if($editMode)
                        <div style="background:rgba(245,158,11,0.1);border:1px solid rgba(245,158,11,0.3);border-radius:12px;padding:16px;margin-bottom:24px;display:flex;align-items:center;justify-content:space-between;">
                            <div style="display:flex;align-items:center;gap:12px;">
                                <svg style="width:24px;height:24px;color:#f59e0b;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                                <span style="font-weight:600;color:#fbbf24;">Edit Mode Active - Make changes and click Save</span>
                            </div>
                            <div style="display:flex;gap:12px;">
                                <button type="button" wire:click="cancelEdit" class="btn-secondary">Cancel</button>
                                <button type="button" wire:click="saveCustomer" class="btn-primary">Save Changes</button>
                            </div>
                        </div>
                    @endif

                    {{-- Customer Information Card --}}
                    <div style="background:rgba(255,255,255,0.02);border:1px solid rgba(255,255,255,0.06);border-radius:20px;padding:24px;margin-bottom:24px;">
                        <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:24px;">
                            <h3 style="font-size:1.1rem;font-weight:700;color:#f9fafb;display:flex;align-items:center;gap:10px;margin:0;">
                                <svg style="width:20px;height:20px;color:#0d9488;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" /></svg>
                                Contact Information
                            </h3>
                            @if(!$editMode)
                                <button type="button" wire:click="enableEdit" class="btn-secondary">
                                    <svg style="width:16px;height:16px;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" /></svg>
                                    Edit Details
                                </button>
                            @endif
                        </div>

                        <div style="display:grid;grid-template-columns:1fr 1fr;gap:20px;">
                            {{-- Customer Name --}}
                            <div>
                                <label style="display:block;color:#94a3b8;font-size:0.75rem;font-weight:600;text-transform:uppercase;margin-bottom:8px;">Customer Name *</label>
                                @if($editMode)
                                    <input type="text" wire:model="editName" class="input-dark">
                                    @error('editName')<p style="margin-top:5px;font-size:0.8rem;color:#fb7185;">{{ $message }}</p>@enderror
                                @else
                                    <div style="font-size:1rem;font-weight:600;color:#f9fafb;padding:12px 16px;background:rgba(255,255,255,0.03);border:1px solid rgba(255,255,255,0.05);border-radius:12px;">
                                        {{ $this->customer->name }}
                                    </div>
                                @endif
                            </div>

                            {{-- Phone --}}
                            <div>
                                <label style="display:block;color:#94a3b8;font-size:0.75rem;font-weight:600;text-transform:uppercase;margin-bottom:8px;">Phone Number *</label>
                                @if($editMode)
                                    <input type="text" wire:model="editPhone" class="input-dark">
                                    @error('editPhone')<p style="margin-top:5px;font-size:0.8rem;color:#fb7185;">{{ $message }}</p>@enderror
                                @else
                                    <div style="font-size:1rem;font-weight:600;color:#f9fafb;padding:12px 16px;background:rgba(255,255,255,0.03);border:1px solid rgba(255,255,255,0.05);border-radius:12px;">
                                        {{ $this->customer->phone }}
                                    </div>
                                @endif
                            </div>

                            {{-- Address --}}
                            <div style="grid-column:1 / -1;">
                                <label style="display:block;color:#94a3b8;font-size:0.75rem;font-weight:600;text-transform:uppercase;margin-bottom:8px;">Address (Optional)</label>
                                @if($editMode)
                                    <textarea wire:model="editAddress" rows="2" class="input-dark" style="resize:vertical;"></textarea>
                                    @error('editAddress')<p style="margin-top:5px;font-size:0.8rem;color:#fb7185;">{{ $message }}</p>@enderror
                                @else
                                    <div style="font-size:1rem;color:#e2e8f0;padding:12px 16px;background:rgba(255,255,255,0.03);border:1px solid rgba(255,255,255,0.05);border-radius:12px;">
                                        {{ $this->customer->address ?? 'No address provided' }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    {{-- Statistics Cards --}}
                    <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(200px,1fr));gap:16px;margin-bottom:24px;">
                        <div class="card-metric" style="border-left:4px solid #0d9488;">
                            <p style="color:#94a3b8;font-size:0.75rem;font-weight:600;text-transform:uppercase;margin:0 0 8px;">Total Orders</p>
                            <p style="color:#f9fafb;font-size:2rem;font-weight:700;margin:0;">{{ $this->statistics['total_orders'] }}</p>
                        </div>
                        <div class="card-metric" style="border-left:4px solid #f59e0b;">
                            <p style="color:#94a3b8;font-size:0.75rem;font-weight:600;text-transform:uppercase;margin:0 0 8px;">Total Spent</p>
                            <p style="color:#fbbf24;font-size:2rem;font-weight:700;margin:0;">{{ number_format($this->statistics['total_spent'], 2) }}</p>
                            <p style="color:#64748b;font-size:0.75rem;margin:4px 0 0;">QAR</p>
                        </div>
                        <div class="card-metric" style="border-left:4px solid #f43f5e;">
                            <p style="color:#94a3b8;font-size:0.75rem;font-weight:600;text-transform:uppercase;margin:0 0 8px;">Total Due</p>
                            <p style="color:#fb7185;font-size:2rem;font-weight:700;margin:0;">{{ number_format($this->statistics['total_pending'], 2) }}</p>
                            <p style="color:#64748b;font-size:0.75rem;margin:4px 0 0;">QAR</p>
                        </div>
                    </div>

                    {{-- Order History --}}
                    <div>
                        <h3 style="font-size:1.2rem;font-weight:700;color:#f9fafb;margin:0 0 16px;">Order History</h3>

                        @if($this->customer->orders->count() > 0)
                            <div style="display:flex;flex-direction:column;gap:12px;">
                                @foreach($this->customer->orders->sortByDesc('created_at')->take(10) as $order)
                                    <div style="background:rgba(255,255,255,0.03);border:1px solid rgba(255,255,255,0.06);border-radius:12px;padding:16px;display:flex;align-items:center;justify-content:space-between;transition:0.2s;" onmouseover="this.style.background='rgba(255,255,255,0.05)';this.style.borderColor='rgba(13,148,136,0.3)'" onmouseout="this.style.background='rgba(255,255,255,0.03)';this.style.borderColor='rgba(255,255,255,0.06)'">
                                        <div>
                                            <div style="display:flex;align-items:center;gap:12px;margin-bottom:8px;">
                                                <span style="font-size:1.1rem;font-weight:700;color:#2dd4bf;">#{{ $order->order_number }}</span>
                                                <span style="font-size:0.85rem;color:#94a3b8;">{{ $order->created_at->format('M d, Y h:i A') }}</span>
                                            </div>
                                            <div style="display:flex;align-items:center;gap:12px;flex-wrap:wrap;">
                                                <span style="font-size:0.85rem;color:#cbd5e1;"><strong>{{ $order->orderItems->count() }}</strong> items</span>
                                                <span class="badge {{ $order->status === 'pending' ? 'badge-pending' : ($order->status === 'processing' ? 'badge-processing' : ($order->status === 'ready' ? 'badge-ready' : 'badge-delivered')) }}">
                                                    {{ ucfirst($order->status) }}
                                                </span>
                                                <span class="badge {{ $order->payment_status === 'paid' ? 'badge-paid' : 'badge-unpaid' }}">
                                                    {{ ucfirst($order->payment_status) }}
                                                </span>
                                            </div>
                                        </div>
                                        <div style="text-align:right;">
                                            <p style="font-size:1.2rem;font-weight:700;color:#f9fafb;margin:0;">{{ number_format($order->total_amount, 2) }}</p>
                                            <p style="font-size:0.75rem;color:#94a3b8;margin:2px 0 0;">QAR</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div style="text-align:center;padding:40px;background:rgba(255,255,255,0.02);border:1px dashed rgba(255,255,255,0.1);border-radius:16px;">
                                <svg style="width:48px;height:48px;color:#475569;margin:0 auto 12px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                                <p style="font-size:1.1rem;font-weight:600;color:#e2e8f0;margin:0;">No Orders Yet</p>
                                <p style="font-size:0.85rem;color:#94a3b8;margin:4px 0 0;">This customer hasn't placed any orders</p>
                            </div>
                        @endif
                    </div>
                </div>

            </div>
        </div>
    @endif
</div>