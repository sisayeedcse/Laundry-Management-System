<div>
    @if($showModal)
        <div class="fixed inset-0 z-50 flex items-center justify-center p-4" style="background:rgba(0,0,0,0.85);" x-data="{ show: @entangle('showModal') }" x-show="show" x-cloak>
            <div class="card-dark" style="width:100%;max-width:450px;padding:24px;" @click.outside="show = false">
                
                {{-- Header --}}
                <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:20px;padding-bottom:16px;border-bottom:1px solid rgba(255,255,255,0.06);">
                    <div style="display:flex;align-items:center;gap:12px;">
                        <div style="width:40px;height:40px;border-radius:10px;background:linear-gradient(135deg,#10b981,#059669);display:flex;align-items:center;justify-content:center;color:#fff;">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        </div>
                        <div>
                            <h3 style="font-size:1.1rem;font-weight:700;color:#f9fafb;margin:0;">Record Payment</h3>
                            <p style="font-size:0.75rem;color:#64748b;margin:0;">Order #{{ $order->order_number }}</p>
                        </div>
                    </div>
                    <button @click="show = false" style="background:none;border:none;color:#94a3b8;cursor:pointer;">
                        <svg style="width:20px;height:20px;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                    </button>
                </div>

                <form wire:submit.prevent="record" style="display:flex;flex-direction:column;gap:16px;">
                    
                    {{-- Balance Summary --}}
                    <div style="background:linear-gradient(135deg,rgba(13,148,136,0.1),rgba(15,118,110,0.05));border:1px solid rgba(13,148,136,0.2);border-radius:12px;padding:16px;">
                        <div style="display:flex;justify-content:space-between;margin-bottom:8px;">
                            <span style="color:#cbd5e1;font-size:0.85rem;">Total Amount</span>
                            <span style="color:#f9fafb;font-weight:600;font-size:0.85rem;">QAR {{ number_format($order->total_amount, 2) }}</span>
                        </div>
                        <div style="display:flex;justify-content:space-between;margin-bottom:12px;">
                            <span style="color:#cbd5e1;font-size:0.85rem;">Already Paid</span>
                            <span style="color:#10b981;font-weight:600;font-size:0.85rem;">QAR {{ number_format($order->total_paid, 2) }}</span>
                        </div>
                        <div style="display:flex;justify-content:space-between;align-items:center;padding-top:12px;border-top:1px solid rgba(13,148,136,0.2);">
                            <span style="color:#f9fafb;font-weight:600;">Remaining Balance</span>
                            <span style="color:#fb7185;font-weight:700;font-size:1.1rem;">QAR {{ number_format($remainingBalance, 2) }}</span>
                        </div>
                    </div>

                    {{-- Payment Amount --}}
                    <div>
                        <label style="display:block;color:#94a3b8;font-size:0.75rem;font-weight:600;text-transform:uppercase;margin-bottom:8px;">Payment Amount (QAR) *</label>
                        <div style="position:relative;">
                            <input type="number" wire:model="amount" step="0.01" min="0.01" max="{{ $remainingBalance }}" class="input-dark" placeholder="0.00" style="padding-right:80px;" required>
                            <button type="button" wire:click="payFull" style="position:absolute;right:8px;top:50%;transform:translateY(-50%);background:rgba(13,148,136,0.15);color:#2dd4bf;border:none;border-radius:6px;padding:4px 10px;font-size:0.75rem;font-weight:600;cursor:pointer;transition:0.2s;" onmouseover="this.style.background='rgba(13,148,136,0.25)'" onmouseout="this.style.background='rgba(13,148,136,0.15)'">Pay Full</button>
                        </div>
                        @error('amount')<p style="margin-top:5px;font-size:0.8rem;color:#fb7185;">{{ $message }}</p>@enderror
                    </div>

                    {{-- Payment Method --}}
                    <div>
                        <label style="display:block;color:#94a3b8;font-size:0.75rem;font-weight:600;text-transform:uppercase;margin-bottom:8px;">Payment Method *</label>
                        <select wire:model="payment_method" class="select-dark">
                            <option value="cash" style="background:#040c18;">Cash</option>
                            <option value="card" style="background:#040c18;">Card</option>
                        </select>
                        @error('payment_method')<p style="margin-top:5px;font-size:0.8rem;color:#fb7185;">{{ $message }}</p>@enderror
                    </div>

                    {{-- Payment Date --}}
                    <div>
                        <label style="display:block;color:#94a3b8;font-size:0.75rem;font-weight:600;text-transform:uppercase;margin-bottom:8px;">Payment Date *</label>
                        <input type="date" wire:model="payment_date" class="input-dark" required>
                        @error('payment_date')<p style="margin-top:5px;font-size:0.8rem;color:#fb7185;">{{ $message }}</p>@enderror
                    </div>

                    {{-- Notes --}}
                    <div>
                        <label style="display:block;color:#94a3b8;font-size:0.75rem;font-weight:600;text-transform:uppercase;margin-bottom:8px;">Notes (Optional)</label>
                        <textarea wire:model="notes" rows="2" class="input-dark" placeholder="Additional notes about this payment..." style="resize:vertical;"></textarea>
                        @error('notes')<p style="margin-top:5px;font-size:0.8rem;color:#fb7185;">{{ $message }}</p>@enderror
                    </div>

                    {{-- Summary Preview --}}
                    @if($amount)
                        <div style="background:rgba(16,185,129,0.1);border:1px solid rgba(16,185,129,0.2);border-radius:12px;padding:16px;">
                            <p style="color:#34d399;font-size:0.85rem;font-weight:600;margin:0 0 12px 0;">Payment Summary</p>
                            <div style="display:flex;justify-content:space-between;margin-bottom:8px;">
                                <span style="color:#6ee7b7;font-size:0.85rem;">Paying Now:</span>
                                <span style="color:#f9fafb;font-weight:600;font-size:0.85rem;">QAR {{ number_format((float)$amount, 2) }}</span>
                            </div>
                            <div style="display:flex;justify-content:space-between;margin-bottom:12px;">
                                <span style="color:#6ee7b7;font-size:0.85rem;">Remaining After:</span>
                                <span style="color:#f9fafb;font-weight:600;font-size:0.85rem;">QAR {{ number_format($remainingBalance - (float)$amount, 2) }}</span>
                            </div>
                            <div style="display:flex;justify-content:space-between;align-items:center;padding-top:12px;border-top:1px solid rgba(16,185,129,0.2);">
                                <span style="color:#6ee7b7;font-size:0.85rem;">New Status:</span>
                                @if($remainingBalance - (float)$amount <= 0)
                                    <span class="badge badge-paid">Paid</span>
                                @else
                                    <span class="badge badge-processing" style="background:rgba(245,158,11,0.1);color:#fbbf24;">Partial</span>
                                @endif
                            </div>
                        </div>
                    @endif

                    <div style="display:flex;justify-content:flex-end;gap:12px;margin-top:8px;">
                        <button type="button" @click="show = false" class="btn-secondary">Cancel</button>
                        <button type="submit" class="btn-primary" wire:loading.attr="disabled" style="background:linear-gradient(135deg,#10b981,#059669);box-shadow:0 4px 15px rgba(16,185,129,0.35);">
                            <span wire:loading.remove wire:target="record">Record Payment</span>
                            <span wire:loading wire:target="record">Recording...</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    @endif
</div>
