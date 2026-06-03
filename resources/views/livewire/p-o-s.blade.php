<div class="w-full page-wrapper" style="font-family:'Plus Jakarta Sans',sans-serif;">

    {{-- ══════════════════════════════════════════════════════════════ --}}
    {{-- FLASH MESSAGES                                                  --}}
    {{-- ══════════════════════════════════════════════════════════════ --}}
    @if (session()->has('message'))
        <div class="alert-success" style="margin:1.25rem 1.5rem 0;border-radius:1rem;display:flex;align-items:center;gap:.75rem;">
            <svg style="width:1.25rem;height:1.25rem;color:#10b981;flex-shrink:0;" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            <span style="color:#d1fae5;font-size:.9rem;font-weight:500;">{{ session('message') }}</span>
        </div>
    @endif
    @if (session()->has('error'))
        <div class="alert-error" style="margin:1.25rem 1.5rem 0;border-radius:1rem;display:flex;align-items:center;gap:.75rem;">
            <svg style="width:1.25rem;height:1.25rem;color:#f43f5e;flex-shrink:0;" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            <span style="color:#ffe4e6;font-size:.9rem;font-weight:500;">{{ session('error') }}</span>
        </div>
    @endif

    {{-- ══════════════════════════════════════════════════════════════ --}}
    {{-- PAGE HEADER                                                      --}}
    {{-- ══════════════════════════════════════════════════════════════ --}}
    <div class="p-4 lg:px-8 lg:pt-8">
        <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 mb-2">
            <div style="display:flex;align-items:center;gap:1rem;">
                <div style="width:3rem;height:3rem;background:linear-gradient(135deg,#0d9488,#0f766e);border-radius:.875rem;display:flex;align-items:center;justify-content:center;box-shadow:0 0 20px rgba(13,148,136,.35);">
                    <svg style="width:1.5rem;height:1.5rem;color:#fff;" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                </div>
                <div>
                    <h1 style="font-size:1.5rem;font-weight:700;color:#f9fafb;margin:0;letter-spacing:-.025em;">Point of Sale</h1>
                    <p style="font-size:.8rem;color:#64748b;margin:0;">Amazing Laundry Qatar &mdash; New Order</p>
                </div>
            </div>
            <div style="display:flex;align-items:center;gap:.5rem;background:rgba(255,255,255,.04);border:1px solid rgba(255,255,255,.06);border-radius:.75rem;padding:.5rem 1rem;">
                <div style="width:.5rem;height:.5rem;background:#10b981;border-radius:50%;animation:pulse 2s infinite;"></div>
                <span style="font-size:.8rem;color:#9ca3af;">Live Session</span>
            </div>
        </div>
    </div>

    {{-- ══════════════════════════════════════════════════════════════ --}}
    {{-- STEP PROGRESS BAR                                               --}}
    {{-- ══════════════════════════════════════════════════════════════ --}}
    <div class="px-4 pt-4 lg:px-8 lg:pt-7">
        <div class="hidden sm:block" style="background:rgba(255,255,255,.04);border:1px solid rgba(255,255,255,.06);border-radius:1.25rem;padding:1.5rem 2rem;">
            <div style="display:flex;align-items:center;justify-content:center;gap:0;position:relative;">
                {{-- Step 1 --}}
                <div style="display:flex;flex-direction:column;align-items:center;z-index:1;min-width:7rem;">
                    <div style="width:2.75rem;height:2.75rem;border-radius:50%;background:linear-gradient(135deg,#0d9488,#14b8a6);display:flex;align-items:center;justify-content:center;box-shadow:0 0 16px rgba(13,148,136,.5);border:2px solid #14b8a6;">
                        <svg style="width:1.1rem;height:1.1rem;color:#fff;" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                    </div>
                    <span style="margin-top:.5rem;font-size:.75rem;font-weight:600;color:#14b8a6;letter-spacing:.02em;text-align:center;">Order Details</span>
                    <span style="font-size:.65rem;color:#64748b;">Step 1</span>
                </div>
                {{-- Connector 1-2 --}}
                <div style="flex:1;height:2px;background:linear-gradient(to right,#14b8a6,rgba(255,255,255,.1));max-width:8rem;margin-bottom:1.5rem;"></div>
                {{-- Step 2 --}}
                <div style="display:flex;flex-direction:column;align-items:center;z-index:1;min-width:7rem;">
                    <div style="width:2.75rem;height:2.75rem;border-radius:50%;background:linear-gradient(135deg,#0d9488,#14b8a6);display:flex;align-items:center;justify-content:center;box-shadow:0 0 16px rgba(13,148,136,.4);border:2px solid #14b8a6;">
                        <span style="color:#fff;font-size:.95rem;font-weight:700;">2</span>
                    </div>
                    <span style="margin-top:.5rem;font-size:.75rem;font-weight:600;color:#14b8a6;letter-spacing:.02em;text-align:center;">Add Items</span>
                    <span style="font-size:.65rem;color:#64748b;">Step 2</span>
                </div>
                {{-- Connector 2-3 --}}
                <div style="flex:1;height:2px;background:rgba(255,255,255,.1);max-width:8rem;margin-bottom:1.5rem;"></div>
                {{-- Step 3 --}}
                <div style="display:flex;flex-direction:column;align-items:center;z-index:1;min-width:7rem;">
                    <div style="width:2.75rem;height:2.75rem;border-radius:50%;background:rgba(255,255,255,.06);display:flex;align-items:center;justify-content:center;border:2px solid rgba(255,255,255,.15);">
                        <span style="color:#64748b;font-size:.95rem;font-weight:700;">3</span>
                    </div>
                    <span style="margin-top:.5rem;font-size:.75rem;font-weight:500;color:#64748b;letter-spacing:.02em;text-align:center;">Additional Details</span>
                    <span style="font-size:.65rem;color:#475569;">Step 3</span>
                </div>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 p-4 lg:p-8">

        {{-- ════════════════════════════════════════════════════════ --}}
        {{-- LEFT COLUMN                                               --}}
        {{-- ════════════════════════════════════════════════════════ --}}
        <div style="display:flex;flex-direction:column;gap:1.5rem;">

            {{-- ── STEP 1: Order Details ── --}}
            <div style="background:rgba(255,255,255,.04);border:1px solid rgba(255,255,255,.06);border-radius:1.5rem;padding:1.75rem;position:relative;overflow:hidden;">
                {{-- Glow accent --}}
                <div style="position:absolute;top:-3rem;left:-3rem;width:10rem;height:10rem;background:radial-gradient(circle,rgba(13,148,136,.12),transparent 70%);pointer-events:none;"></div>

                <div style="display:flex;align-items:center;gap:.75rem;margin-bottom:1.5rem;">
                    <div style="width:2rem;height:2rem;background:rgba(13,148,136,.15);border:1px solid rgba(13,148,136,.3);border-radius:.5rem;display:flex;align-items:center;justify-content:center;">
                        <span style="color:#14b8a6;font-size:.8rem;font-weight:700;">1</span>
                    </div>
                    <div>
                        <h2 style="font-size:1.05rem;font-weight:700;color:#f9fafb;margin:0;">Order Details</h2>
                        <p style="font-size:.75rem;color:#64748b;margin:0;">Enter customer & order information</p>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    {{-- Custom Order ID --}}
                    <div>
                        <label style="display:block;font-size:.75rem;font-weight:600;color:#9ca3af;margin-bottom:.4rem;text-transform:uppercase;letter-spacing:.06em;">Order ID</label>
                        <div style="position:relative;">
                            <div style="position:absolute;left:.75rem;top:50%;transform:translateY(-50%);pointer-events:none;">
                                <svg style="width:1rem;height:1rem;color:#64748b;" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14"/></svg>
                            </div>
                            <input
                                type="text"
                                wire:model="customOrderId"
                                placeholder="e.g. ORD-2024-001"
                                class="input-dark"
                                style="width:100%;padding:.65rem .75rem .65rem 2.25rem;background:rgba(255,255,255,.06);border:1px solid rgba(255,255,255,.1);border-radius:.75rem;color:#f9fafb;font-size:.875rem;outline:none;transition:border-color .2s,box-shadow .2s;box-sizing:border-box;"
                                onfocus="this.style.borderColor='#14b8a6';this.style.boxShadow='0 0 0 3px rgba(20,184,166,.15)'"
                                onblur="this.style.borderColor='rgba(255,255,255,.1)';this.style.boxShadow='none'"
                            />
                        </div>
                        @error('customOrderId') <span style="color:#f43f5e;font-size:.72rem;margin-top:.3rem;display:block;">{{ $message }}</span> @enderror
                    </div>

                    {{-- Customer Name --}}
                    <div>
                        <label style="display:block;font-size:.75rem;font-weight:600;color:#9ca3af;margin-bottom:.4rem;text-transform:uppercase;letter-spacing:.06em;">Customer Name</label>
                        <div style="position:relative;">
                            <div style="position:absolute;left:.75rem;top:50%;transform:translateY(-50%);pointer-events:none;">
                                <svg style="width:1rem;height:1rem;color:#64748b;" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                            </div>
                            <input
                                type="text"
                                wire:model="customerName"
                                placeholder="Full name"
                                class="input-dark"
                                style="width:100%;padding:.65rem .75rem .65rem 2.25rem;background:rgba(255,255,255,.06);border:1px solid rgba(255,255,255,.1);border-radius:.75rem;color:#f9fafb;font-size:.875rem;outline:none;transition:border-color .2s,box-shadow .2s;box-sizing:border-box;"
                                onfocus="this.style.borderColor='#14b8a6';this.style.boxShadow='0 0 0 3px rgba(20,184,166,.15)'"
                                onblur="this.style.borderColor='rgba(255,255,255,.1)';this.style.boxShadow='none'"
                            />
                        </div>
                        @error('customerName') <span style="color:#f43f5e;font-size:.72rem;margin-top:.3rem;display:block;">{{ $message }}</span> @enderror
                    </div>

                    {{-- Customer Phone --}}
                    <div style="position:relative;">
                        <label style="display:block;font-size:.75rem;font-weight:600;color:#9ca3af;margin-bottom:.4rem;text-transform:uppercase;letter-spacing:.06em;">Phone Number</label>
                        <div style="position:relative;">
                            <div style="position:absolute;left:.75rem;top:50%;transform:translateY(-50%);pointer-events:none;">
                                <svg style="width:1rem;height:1rem;color:#64748b;" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                            </div>
                            <input
                                type="text"
                                wire:model.live="customerPhone"
                                wire:blur="searchCustomer"
                                placeholder="+974 XXXX XXXX"
                                class="input-dark"
                                style="width:100%;padding:.65rem .75rem .65rem 2.25rem;background:rgba(255,255,255,.06);border:1px solid rgba(255,255,255,.1);border-radius:.75rem;color:#f9fafb;font-size:.875rem;outline:none;transition:border-color .2s,box-shadow .2s;box-sizing:border-box;"
                                onfocus="this.style.borderColor='#14b8a6';this.style.boxShadow='0 0 0 3px rgba(20,184,166,.15)'"
                                onblur="this.style.borderColor='rgba(255,255,255,.1)';this.style.boxShadow='none'"
                            />
                        </div>
                        @error('customerPhone') <span style="color:#f43f5e;font-size:.72rem;margin-top:.3rem;display:block;">{{ $message }}</span> @enderror

                        {{-- Customer Found Badge --}}
                        @if ($selectedCustomerId)
                            <div style="margin-top:.5rem;display:flex;align-items:center;gap:.5rem;background:rgba(16,185,129,.1);border:1px solid rgba(16,185,129,.25);border-radius:.5rem;padding:.4rem .75rem;">
                                <svg style="width:.875rem;height:.875rem;color:#10b981;" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                <span style="color:#10b981;font-size:.75rem;font-weight:600;">
                                    Customer found: {{ $this->selectedCustomer?->name ?? 'Existing Customer' }}
                                </span>
                            </div>
                        @endif
                    </div>

                    {{-- Delivery Date --}}
                    <div>
                        <label style="display:block;font-size:.75rem;font-weight:600;color:#9ca3af;margin-bottom:.4rem;text-transform:uppercase;letter-spacing:.06em;">Delivery Date</label>
                        <div style="position:relative;">
                            <div style="position:absolute;left:.75rem;top:50%;transform:translateY(-50%);pointer-events:none;">
                                <svg style="width:1rem;height:1rem;color:#64748b;" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                            </div>
                            <input
                                type="date"
                                wire:model="deliveryDate"
                                class="input-dark"
                                style="width:100%;padding:.65rem .75rem .65rem 2.25rem;background:rgba(255,255,255,.06);border:1px solid rgba(255,255,255,.1);border-radius:.75rem;color:#f9fafb;font-size:.875rem;outline:none;transition:border-color .2s,box-shadow .2s;box-sizing:border-box;color-scheme:dark;"
                                onfocus="this.style.borderColor='#14b8a6';this.style.boxShadow='0 0 0 3px rgba(20,184,166,.15)'"
                                onblur="this.style.borderColor='rgba(255,255,255,.1)';this.style.boxShadow='none'"
                            />
                        </div>
                        @error('deliveryDate') <span style="color:#f43f5e;font-size:.72rem;margin-top:.3rem;display:block;">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>

            {{-- ── STEP 3: Additional Details ── --}}
            <div style="background:rgba(255,255,255,.04);border:1px solid rgba(255,255,255,.06);border-radius:1.5rem;padding:1.75rem;position:relative;overflow:hidden;">
                <div style="position:absolute;bottom:-3rem;right:-3rem;width:9rem;height:9rem;background:radial-gradient(circle,rgba(245,158,11,.07),transparent 70%);pointer-events:none;"></div>

                <div style="display:flex;align-items:center;gap:.75rem;margin-bottom:1.5rem;">
                    <div style="width:2rem;height:2rem;background:rgba(245,158,11,.12);border:1px solid rgba(245,158,11,.25);border-radius:.5rem;display:flex;align-items:center;justify-content:center;">
                        <span style="color:#f59e0b;font-size:.8rem;font-weight:700;">3</span>
                    </div>
                    <div>
                        <h2 style="font-size:1.05rem;font-weight:700;color:#f9fafb;margin:0;">Additional Details</h2>
                        <p style="font-size:.75rem;color:#64748b;margin:0;">Notes & discount options</p>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    {{-- Notes --}}
                    <div>
                        <label style="display:block;font-size:.75rem;font-weight:600;color:#9ca3af;margin-bottom:.4rem;text-transform:uppercase;letter-spacing:.06em;">Special Notes</label>
                        <textarea
                            wire:model="notes"
                            placeholder="Special instructions, fabric care notes..."
                            rows="4"
                            style="width:100%;padding:.75rem;background:rgba(255,255,255,.06);border:1px solid rgba(255,255,255,.1);border-radius:.75rem;color:#f9fafb;font-size:.875rem;outline:none;resize:vertical;min-height:7rem;transition:border-color .2s,box-shadow .2s;box-sizing:border-box;font-family:inherit;"
                            onfocus="this.style.borderColor='#14b8a6';this.style.boxShadow='0 0 0 3px rgba(20,184,166,.15)'"
                            onblur="this.style.borderColor='rgba(255,255,255,.1)';this.style.boxShadow='none'"
                        ></textarea>
                    </div>

                    {{-- Discount --}}
                    <div>
                        <label style="display:block;font-size:.75rem;font-weight:600;color:#9ca3af;margin-bottom:.4rem;text-transform:uppercase;letter-spacing:.06em;">Discount (QAR)</label>
                        <div style="position:relative;">
                            <div style="position:absolute;left:.75rem;top:50%;transform:translateY(-50%);pointer-events:none;">
                                <svg style="width:1rem;height:1rem;color:#f59e0b;" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M17 17h.01M7 17L17 7M9.5 9.5a2 2 0 110-4 2 2 0 010 4zm5 5a2 2 0 110 4 2 2 0 010-4z"/></svg>
                            </div>
                            <input
                                type="number"
                                wire:model="discount"
                                placeholder="0.00"
                                min="0"
                                step="0.01"
                                style="width:100%;padding:.65rem .75rem .65rem 2.25rem;background:rgba(255,255,255,.06);border:1px solid rgba(255,255,255,.1);border-radius:.75rem;color:#f9fafb;font-size:.875rem;outline:none;transition:border-color .2s,box-shadow .2s;box-sizing:border-box;"
                                onfocus="this.style.borderColor='#f59e0b';this.style.boxShadow='0 0 0 3px rgba(245,158,11,.12)'"
                                onblur="this.style.borderColor='rgba(255,255,255,.1)';this.style.boxShadow='none'"
                            />
                        </div>
                        @error('discount') <span style="color:#f43f5e;font-size:.72rem;margin-top:.3rem;display:block;">{{ $message }}</span> @enderror

                        {{-- Discount summary preview --}}
                        <div style="margin-top:1rem;background:rgba(245,158,11,.07);border:1px solid rgba(245,158,11,.15);border-radius:.75rem;padding:.875rem;">
                            <div style="font-size:.72rem;color:#9ca3af;text-transform:uppercase;letter-spacing:.05em;margin-bottom:.4rem;">Discount applied</div>
                            <div style="font-size:1.3rem;font-weight:700;color:#f59e0b;">
                                QAR {{ number_format($discount ?? 0, 2) }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- ── TOTAL & SUBMIT ── --}}
            <div style="background:rgba(255,255,255,.04);border:1px solid rgba(255,255,255,.06);border-radius:1.5rem;padding:1.75rem;position:relative;overflow:hidden;">
                <div style="position:absolute;inset:0;background:linear-gradient(135deg,rgba(13,148,136,.06),rgba(245,158,11,.04),transparent);pointer-events:none;border-radius:1.5rem;"></div>

                <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:1.25rem;">
                    <span style="font-size:.9rem;font-weight:600;color:#9ca3af;text-transform:uppercase;letter-spacing:.06em;">Order Total</span>
                    <div style="display:flex;align-items:baseline;gap:.4rem;">
                        <span style="font-size:.85rem;color:#64748b;font-weight:500;">QAR</span>
                        <span style="font-size:2.5rem;font-weight:800;color:#f59e0b;line-height:1;letter-spacing:-.04em;">{{ number_format($this->totalAmount, 2) }}</span>
                    </div>
                </div>

                <div style="height:1px;background:rgba(255,255,255,.06);margin-bottom:1.25rem;"></div>

                <div style="display:flex;align-items:center;gap:.75rem;margin-bottom:1rem;">
                    <div style="flex:1;display:flex;justify-content:space-between;font-size:.8rem;">
                        <span style="color:#64748b;">Subtotal</span>
                        <span style="color:#9ca3af;">QAR {{ number_format(collect($items)->sum(fn($i) => ($i['price'] ?? 0) * ($i['quantity'] ?? 1)), 2) }}</span>
                    </div>
                </div>
                <div style="display:flex;align-items:center;gap:.75rem;margin-bottom:1.5rem;">
                    <div style="flex:1;display:flex;justify-content:space-between;font-size:.8rem;">
                        <span style="color:#f59e0b;">Discount</span>
                        <span style="color:#f59e0b;">- QAR {{ number_format($discount ?? 0, 2) }}</span>
                    </div>
                </div>

                <button
                    wire:click="createOrder"
                    style="width:100%;padding:1rem;background:linear-gradient(135deg,#059669,#10b981);border:none;border-radius:1rem;color:#fff;font-size:1.05rem;font-weight:700;cursor:pointer;display:flex;align-items:center;justify-content:center;gap:.6rem;letter-spacing:.01em;box-shadow:0 4px 24px rgba(16,185,129,.35);transition:transform .15s,box-shadow .15s;font-family:inherit;"
                    onmouseover="this.style.transform='translateY(-2px)';this.style.boxShadow='0 8px 32px rgba(16,185,129,.45)'"
                    onmouseout="this.style.transform='translateY(0)';this.style.boxShadow='0 4px 24px rgba(16,185,129,.35)'"
                >
                    <svg style="width:1.25rem;height:1.25rem;" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    Create Order
                </button>
            </div>

        </div>{{-- /LEFT COLUMN --}}

        {{-- ════════════════════════════════════════════════════════ --}}
        {{-- RIGHT COLUMN: Add Laundry Items                          --}}
        {{-- ════════════════════════════════════════════════════════ --}}
        <div style="display:flex;flex-direction:column;gap:1.5rem;">

            {{-- ── STEP 2: Add Laundry Items ── --}}
            <div style="background:rgba(255,255,255,.04);border:1px solid rgba(255,255,255,.06);border-radius:1.5rem;padding:1.75rem;position:relative;overflow:hidden;">
                <div style="position:absolute;top:-4rem;right:-4rem;width:12rem;height:12rem;background:radial-gradient(circle,rgba(13,148,136,.1),transparent 70%);pointer-events:none;"></div>

                <div style="display:flex;align-items:center;gap:.75rem;margin-bottom:1.5rem;">
                    <div style="width:2rem;height:2rem;background:rgba(13,148,136,.15);border:1px solid rgba(13,148,136,.3);border-radius:.5rem;display:flex;align-items:center;justify-content:center;">
                        <span style="color:#14b8a6;font-size:.8rem;font-weight:700;">2</span>
                    </div>
                    <div>
                        <h2 style="font-size:1.05rem;font-weight:700;color:#f9fafb;margin:0;">Add Laundry Items</h2>
                        <p style="font-size:.75rem;color:#64748b;margin:0;">Select service and configure details</p>
                    </div>
                </div>

                {{-- Item Form --}}
                <div style="background:rgba(255,255,255,.03);border:1px solid rgba(255,255,255,.08);border-radius:1rem;padding:1.25rem;margin-bottom:1.5rem;">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-4">

                        {{-- Service Select --}}
                        <div>
                            <label style="display:block;font-size:.72rem;font-weight:600;color:#9ca3af;margin-bottom:.35rem;text-transform:uppercase;letter-spacing:.06em;">Service</label>
                            <select
                                wire:model.live="selectedServiceId"
                                class="select-dark"
                                style="width:100%;padding:.65rem .75rem;background:rgba(255,255,255,.07);border:1px solid rgba(13,148,136,.25);border-radius:.75rem;color:#f9fafb;font-size:.875rem;outline:none;cursor:pointer;transition:border-color .2s;box-sizing:border-box;font-family:inherit;"
                                onfocus="this.style.borderColor='#14b8a6';this.style.boxShadow='0 0 0 3px rgba(20,184,166,.12)'"
                                onblur="this.style.borderColor='rgba(13,148,136,.25)';this.style.boxShadow='none'"
                            >
                                <option value="" style="background:#0f172a;">Select Service...</option>
                                @foreach ($this->services as $service)
                                    <option value="{{ $service->id }}" style="background:#0f172a;">{{ $service->name }}</option>
                                @endforeach
                            </select>
                            @error('selectedServiceId') <span style="color:#f43f5e;font-size:.72rem;margin-top:.25rem;display:block;">{{ $message }}</span> @enderror
                        </div>

                        {{-- Service Type --}}
                        <div>
                            <label style="display:block;font-size:.72rem;font-weight:600;color:#9ca3af;margin-bottom:.35rem;text-transform:uppercase;letter-spacing:.06em;">Service Type</label>
                            <select
                                wire:model.live="serviceType"
                                class="select-dark"
                                style="width:100%;padding:.65rem .75rem;background:rgba(255,255,255,.07);border:1px solid rgba(13,148,136,.25);border-radius:.75rem;color:#f9fafb;font-size:.875rem;outline:none;cursor:pointer;transition:border-color .2s;box-sizing:border-box;font-family:inherit;"
                                onfocus="this.style.borderColor='#14b8a6';this.style.boxShadow='0 0 0 3px rgba(20,184,166,.12)'"
                                onblur="this.style.borderColor='rgba(13,148,136,.25)';this.style.boxShadow='none'"
                            >
                                <option value="" style="background:#0f172a;">Select Type...</option>
                                <option value="wash" style="background:#0f172a;">Wash</option>
                                <option value="dry_clean" style="background:#0f172a;">Dry Clean</option>
                                <option value="iron" style="background:#0f172a;">Iron</option>
                                <option value="wash_iron" style="background:#0f172a;">Wash & Iron</option>
                            </select>
                            @error('serviceType') <span style="color:#f43f5e;font-size:.72rem;margin-top:.25rem;display:block;">{{ $message }}</span> @enderror
                        </div>

                        {{-- Finish Type --}}
                        <div>
                            <label style="display:block;font-size:.72rem;font-weight:600;color:#9ca3af;margin-bottom:.35rem;text-transform:uppercase;letter-spacing:.06em;">Finish Type</label>
                            <select
                                wire:model.live="finishType"
                                class="select-dark"
                                style="width:100%;padding:.65rem .75rem;background:rgba(255,255,255,.07);border:1px solid rgba(245,158,11,.2);border-radius:.75rem;color:#f9fafb;font-size:.875rem;outline:none;cursor:pointer;transition:border-color .2s;box-sizing:border-box;font-family:inherit;"
                                onfocus="this.style.borderColor='#f59e0b';this.style.boxShadow='0 0 0 3px rgba(245,158,11,.1)'"
                                onblur="this.style.borderColor='rgba(245,158,11,.2)';this.style.boxShadow='none'"
                            >
                                <option value="" style="background:#0f172a;">Select Finish...</option>
                                <option value="standard" style="background:#0f172a;">Standard</option>
                                <option value="premium" style="background:#0f172a;">Premium</option>
                                <option value="express" style="background:#0f172a;">Express</option>
                                <option value="delicate" style="background:#0f172a;">Delicate Care</option>
                            </select>
                            @error('finishType') <span style="color:#f43f5e;font-size:.72rem;margin-top:.25rem;display:block;">{{ $message }}</span> @enderror
                        </div>

                        {{-- Quantity --}}
                        <div>
                            <label style="display:block;font-size:.72rem;font-weight:600;color:#9ca3af;margin-bottom:.35rem;text-transform:uppercase;letter-spacing:.06em;">Quantity</label>
                            <input
                                type="number"
                                wire:model.live="quantity"
                                placeholder="1"
                                min="1"
                                style="width:100%;padding:.65rem .75rem;background:rgba(255,255,255,.07);border:1px solid rgba(255,255,255,.1);border-radius:.75rem;color:#f9fafb;font-size:.875rem;outline:none;transition:border-color .2s;box-sizing:border-box;"
                                onfocus="this.style.borderColor='#14b8a6';this.style.boxShadow='0 0 0 3px rgba(20,184,166,.12)'"
                                onblur="this.style.borderColor='rgba(255,255,255,.1)';this.style.boxShadow='none'"
                            />
                            @error('quantity') <span style="color:#f43f5e;font-size:.72rem;margin-top:.25rem;display:block;">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    {{-- Price Row --}}
                    <div class="flex flex-wrap sm:flex-nowrap items-end gap-4">
                        <div style="flex:1;">
                            <label style="display:block;font-size:.72rem;font-weight:600;color:#9ca3af;margin-bottom:.35rem;text-transform:uppercase;letter-spacing:.06em;">Unit Price (QAR)</label>
                            <div style="position:relative;">
                                <div style="position:absolute;left:.75rem;top:50%;transform:translateY(-50%);pointer-events:none;font-size:.8rem;color:#f59e0b;font-weight:700;">QR</div>
                                <input
                                    type="number"
                                    wire:model.live="price"
                                    placeholder="0.00"
                                    step="0.01"
                                    min="0"
                                    style="width:100%;padding:.65rem .75rem .65rem 2.5rem;background:rgba(255,255,255,.07);border:1px solid rgba(245,158,11,.2);border-radius:.75rem;color:#f9fafb;font-size:.875rem;outline:none;transition:border-color .2s;box-sizing:border-box;"
                                    onfocus="this.style.borderColor='#f59e0b';this.style.boxShadow='0 0 0 3px rgba(245,158,11,.1)'"
                                    onblur="this.style.borderColor='rgba(245,158,11,.2)';this.style.boxShadow='none'"
                                />
                            </div>
                            @error('price') <span style="color:#f43f5e;font-size:.72rem;margin-top:.25rem;display:block;">{{ $message }}</span> @enderror
                        </div>
                        {{-- Line total preview --}}
                        <div style="background:rgba(245,158,11,.08);border:1px solid rgba(245,158,11,.15);border-radius:.75rem;padding:.55rem .9rem;min-width:7rem;text-align:center;">
                            <div style="font-size:.65rem;color:#9ca3af;text-transform:uppercase;letter-spacing:.04em;">Line Total</div>
                            <div style="font-size:1rem;font-weight:700;color:#f59e0b;">QAR {{ number_format(($price ?? 0) * ($quantity ?? 1), 2) }}</div>
                        </div>
                        {{-- Add Item Button --}}
                        <button
                            wire:click="addItem"
                            class="btn-primary"
                            style="padding:.65rem 1.25rem;background:linear-gradient(135deg,#0d9488,#14b8a6);border:none;border-radius:.75rem;color:#fff;font-size:.875rem;font-weight:700;cursor:pointer;display:flex;align-items:center;gap:.4rem;white-space:nowrap;box-shadow:0 2px 12px rgba(13,148,136,.3);transition:transform .15s,box-shadow .15s;font-family:inherit;"
                            onmouseover="this.style.transform='translateY(-1px)';this.style.boxShadow='0 6px 20px rgba(13,148,136,.4)'"
                            onmouseout="this.style.transform='translateY(0)';this.style.boxShadow='0 2px 12px rgba(13,148,136,.3)'"
                        >
                            <svg style="width:1rem;height:1rem;" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/></svg>
                            Add Item
                        </button>
                    </div>
                </div>

                {{-- Items List --}}
                <div>
                    <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:1rem;">
                        <h3 style="font-size:.85rem;font-weight:700;color:#9ca3af;text-transform:uppercase;letter-spacing:.06em;margin:0;">Order Items</h3>
                        @if (count($items) > 0)
                            <span style="background:rgba(13,148,136,.15);border:1px solid rgba(13,148,136,.25);color:#14b8a6;font-size:.72rem;font-weight:700;padding:.25rem .65rem;border-radius:99px;">{{ count($items) }} item{{ count($items) !== 1 ? 's' : '' }}</span>
                        @endif
                    </div>

                    {{-- Empty State --}}
                    @if (count($items) === 0)
                        <div style="text-align:center;padding:3rem 1rem;border:2px dashed rgba(255,255,255,.07);border-radius:1rem;">
                            <div style="width:3.5rem;height:3.5rem;background:rgba(255,255,255,.04);border-radius:50%;display:flex;align-items:center;justify-content:center;margin:0 auto 1rem;">
                                <svg style="width:1.75rem;height:1.75rem;color:#334155;" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
                            </div>
                            <p style="color:#475569;font-size:.85rem;font-weight:500;margin:0 0 .25rem;">No items added yet</p>
                            <p style="color:#334155;font-size:.75rem;margin:0;">Select a service above and click Add Item</p>
                        </div>
                    @else
                        <div style="display:flex;flex-direction:column;gap:.75rem;max-height:22rem;overflow-y:auto;padding-right:.25rem;">
                            @foreach ($items as $index => $item)
                                <div wire:key="item-{{ $index }}" style="background:rgba(255,255,255,.05);border:1px solid rgba(255,255,255,.08);border-radius:1rem;padding:1rem 1.25rem;display:flex;align-items:center;gap:1rem;transition:border-color .2s;"
                                    onmouseover="this.style.borderColor='rgba(13,148,136,.25)'"
                                    onmouseout="this.style.borderColor='rgba(255,255,255,.08)'"
                                >
                                    {{-- Index badge --}}
                                    <div style="width:2rem;height:2rem;background:rgba(13,148,136,.12);border:1px solid rgba(13,148,136,.2);border-radius:.5rem;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                                        <span style="color:#14b8a6;font-size:.75rem;font-weight:700;">{{ $index + 1 }}</span>
                                    </div>

                                    {{-- Item Info --}}
                                    <div style="flex:1;min-width:0;">
                                        <div style="font-size:.875rem;font-weight:600;color:#f9fafb;margin-bottom:.35rem;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">
                                            {{ $item['service_name'] ?? 'Service' }}
                                        </div>
                                        <div style="display:flex;flex-wrap:wrap;gap:.4rem;">
                                            @if (!empty($item['service_type']))
                                                <span style="background:rgba(13,148,136,.15);border:1px solid rgba(13,148,136,.25);color:#14b8a6;font-size:.65rem;font-weight:600;padding:.15rem .55rem;border-radius:99px;text-transform:capitalize;">{{ str_replace('_', ' ', $item['service_type']) }}</span>
                                            @endif
                                            @if (!empty($item['finish_type']))
                                                <span style="background:rgba(245,158,11,.12);border:1px solid rgba(245,158,11,.22);color:#f59e0b;font-size:.65rem;font-weight:600;padding:.15rem .55rem;border-radius:99px;text-transform:capitalize;">{{ $item['finish_type'] }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    {{-- Qty --}}
                                    <div style="text-align:center;flex-shrink:0;">
                                        <div style="font-size:.65rem;color:#64748b;text-transform:uppercase;letter-spacing:.04em;">Qty</div>
                                        <div style="font-size:.95rem;font-weight:700;color:#f9fafb;">{{ $item['quantity'] ?? 1 }}</div>
                                    </div>

                                    {{-- Amount --}}
                                    <div style="text-align:right;flex-shrink:0;min-width:5.5rem;">
                                        <div style="font-size:.65rem;color:#64748b;text-transform:uppercase;letter-spacing:.04em;">Amount</div>
                                        <div style="font-size:1rem;font-weight:700;color:#f59e0b;">QAR {{ number_format(($item['price'] ?? 0) * ($item['quantity'] ?? 1), 2) }}</div>
                                    </div>

                                    {{-- Remove --}}
                                    <button
                                        wire:click="removeItem({{ $index }})"
                                        style="width:2.25rem;height:2.25rem;background:rgba(244,63,94,.08);border:1px solid rgba(244,63,94,.2);border-radius:.625rem;color:#f43f5e;cursor:pointer;display:flex;align-items:center;justify-content:center;flex-shrink:0;transition:background .2s,border-color .2s;"
                                        onmouseover="this.style.background='rgba(244,63,94,.18)';this.style.borderColor='rgba(244,63,94,.4)'"
                                        onmouseout="this.style.background='rgba(244,63,94,.08)';this.style.borderColor='rgba(244,63,94,.2)'"
                                        title="Remove item"
                                    >
                                        <svg style="width:.875rem;height:.875rem;" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"/></svg>
                                    </button>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>

            </div>{{-- /Step 2 card --}}

        </div>{{-- /RIGHT COLUMN --}}

    </div>{{-- /grid --}}

    {{-- ══════════════════════════════════════════════════════════════ --}}
    {{-- PAYMENT MODAL                                                   --}}
    {{-- ══════════════════════════════════════════════════════════════ --}}
    @if ($showPaymentModal)
        <div style="position:fixed;inset:0;z-index:9000;display:flex;align-items:center;justify-content:center;padding:1rem;">
            {{-- Backdrop --}}
            <div style="position:absolute;inset:0;background:rgba(4,12,24,.85);backdrop-filter:blur(8px);" wire:click="$set('showPaymentModal', false)"></div>

            {{-- Modal Card --}}
            <div class="w-full max-w-xl p-6 sm:p-10" style="position:relative;z-index:1;background:linear-gradient(135deg,rgba(15,23,42,.98),rgba(4,12,24,.98));border:1px solid rgba(255,255,255,.1);border-radius:2rem;box-shadow:0 32px 80px rgba(0,0,0,.6);">

                {{-- Header --}}
                <div style="text-align:center;margin-bottom:2rem;">
                    <div style="width:4rem;height:4rem;background:linear-gradient(135deg,rgba(13,148,136,.2),rgba(20,184,166,.1));border:1px solid rgba(13,148,136,.3);border-radius:1.25rem;display:flex;align-items:center;justify-content:center;margin:0 auto 1rem;">
                        <svg style="width:2rem;height:2rem;color:#14b8a6;" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                    </div>
                    <h2 style="font-size:1.4rem;font-weight:800;color:#f9fafb;margin:0 0 .4rem;">Select Payment Method</h2>
                    <p style="color:#64748b;font-size:.875rem;margin:0;">Choose how the customer will pay</p>
                    <div style="margin-top:.75rem;display:inline-flex;align-items:baseline;gap:.35rem;background:rgba(245,158,11,.08);border:1px solid rgba(245,158,11,.2);border-radius:.75rem;padding:.4rem 1rem;">
                        <span style="font-size:.8rem;color:#f59e0b;font-weight:600;">Total:</span>
                        <span style="font-size:1.6rem;font-weight:800;color:#f59e0b;line-height:1;">QAR {{ number_format($this->totalAmount, 2) }}</span>
                    </div>
                </div>

                {{-- Payment Method Cards --}}
                <div style="display:grid;grid-template-columns:repeat(3,1fr);gap:1rem;margin-bottom:1.75rem;">

                    {{-- Card Payment --}}
                    <button
                        wire:click="processOrderWithPayment('card')"
                        style="padding:1.5rem 1rem;background:rgba(14,165,233,.07);border:2px solid rgba(14,165,233,.2);border-radius:1.25rem;cursor:pointer;display:flex;flex-direction:column;align-items:center;gap:.6rem;transition:all .2s;font-family:inherit;"
                        onmouseover="this.style.background='rgba(14,165,233,.15)';this.style.borderColor='#38bdf8';this.style.transform='translateY(-3px)';this.style.boxShadow='0 8px 24px rgba(14,165,233,.25)'"
                        onmouseout="this.style.background='rgba(14,165,233,.07)';this.style.borderColor='rgba(14,165,233,.2)';this.style.transform='translateY(0)';this.style.boxShadow='none'"
                    >
                        <div style="width:3rem;height:3rem;background:rgba(14,165,233,.12);border-radius:.875rem;display:flex;align-items:center;justify-content:center;">
                            <svg style="width:1.5rem;height:1.5rem;color:#38bdf8;" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/></svg>
                        </div>
                        <span style="font-size:.875rem;font-weight:700;color:#f9fafb;">Card</span>
                        <span style="font-size:.65rem;background:rgba(14,165,233,.15);border:1px solid rgba(14,165,233,.25);color:#7dd3fc;padding:.15rem .5rem;border-radius:99px;font-weight:600;">Instant</span>
                    </button>

                    {{-- Cash Payment --}}
                    <button
                        wire:click="processOrderWithPayment('cash')"
                        style="padding:1.5rem 1rem;background:rgba(16,185,129,.07);border:2px solid rgba(16,185,129,.2);border-radius:1.25rem;cursor:pointer;display:flex;flex-direction:column;align-items:center;gap:.6rem;transition:all .2s;font-family:inherit;"
                        onmouseover="this.style.background='rgba(16,185,129,.15)';this.style.borderColor='#34d399';this.style.transform='translateY(-3px)';this.style.boxShadow='0 8px 24px rgba(16,185,129,.25)'"
                        onmouseout="this.style.background='rgba(16,185,129,.07)';this.style.borderColor='rgba(16,185,129,.2)';this.style.transform='translateY(0)';this.style.boxShadow='none'"
                    >
                        <div style="width:3rem;height:3rem;background:rgba(16,185,129,.12);border-radius:.875rem;display:flex;align-items:center;justify-content:center;">
                            <svg style="width:1.5rem;height:1.5rem;color:#34d399;" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                        </div>
                        <span style="font-size:.875rem;font-weight:700;color:#f9fafb;">Cash</span>
                        <span style="font-size:.65rem;background:rgba(16,185,129,.15);border:1px solid rgba(16,185,129,.25);color:#6ee7b7;padding:.15rem .5rem;border-radius:99px;font-weight:600;">Paid</span>
                    </button>

                    {{-- Due Payment --}}
                    <button
                        wire:click="processOrderWithPayment('due')"
                        style="padding:1.5rem 1rem;background:rgba(251,113,133,.06);border:2px solid rgba(245,158,11,.2);border-radius:1.25rem;cursor:pointer;display:flex;flex-direction:column;align-items:center;gap:.6rem;transition:all .2s;font-family:inherit;"
                        onmouseover="this.style.background='rgba(245,158,11,.12)';this.style.borderColor='#f59e0b';this.style.transform='translateY(-3px)';this.style.boxShadow='0 8px 24px rgba(245,158,11,.2)'"
                        onmouseout="this.style.background='rgba(251,113,133,.06)';this.style.borderColor='rgba(245,158,11,.2)';this.style.transform='translateY(0)';this.style.boxShadow='none'"
                    >
                        <div style="width:3rem;height:3rem;background:rgba(245,158,11,.12);border-radius:.875rem;display:flex;align-items:center;justify-content:center;">
                            <svg style="width:1.5rem;height:1.5rem;color:#f59e0b;" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        </div>
                        <span style="font-size:.875rem;font-weight:700;color:#f9fafb;">Due</span>
                        <span style="font-size:.65rem;background:rgba(244,63,94,.12);border:1px solid rgba(244,63,94,.25);color:#fb7185;padding:.15rem .5rem;border-radius:99px;font-weight:600;">Pending</span>
                    </button>

                </div>

                {{-- Cancel --}}
                <button
                    wire:click="$set('showPaymentModal', false)"
                    style="width:100%;padding:.9rem;background:rgba(255,255,255,.05);border:1px solid rgba(255,255,255,.1);border-radius:1rem;color:#9ca3af;font-size:.9rem;font-weight:600;cursor:pointer;transition:all .2s;font-family:inherit;"
                    onmouseover="this.style.background='rgba(255,255,255,.09)';this.style.color='#f9fafb'"
                    onmouseout="this.style.background='rgba(255,255,255,.05)';this.style.color='#9ca3af'"
                >
                    Cancel &mdash; Go Back
                </button>
            </div>
        </div>
    @endif

    {{-- ══════════════════════════════════════════════════════════════ --}}
    {{-- SUCCESS MODAL                                                   --}}
    {{-- ══════════════════════════════════════════════════════════════ --}}
    <div
        x-data="{ show: @entangle('showSuccessModal') }"
        x-show="show"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 scale-95"
        x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-95"
        style="position:fixed;inset:0;z-index:9500;display:flex;align-items:center;justify-content:center;padding:1rem;display:none;"
        x-cloak
    >
        {{-- Backdrop --}}
        <div style="position:absolute;inset:0;background:rgba(4,12,24,.9);backdrop-filter:blur(12px);"></div>

        {{-- Glassmorphic Card --}}
        <div style="position:relative;z-index:1;background:rgba(15,23,42,.95);border:1px solid rgba(255,255,255,.1);border-radius:2rem;padding:3rem 2.5rem;width:100%;max-width:30rem;text-align:center;box-shadow:0 40px 100px rgba(0,0,0,.7);backdrop-filter:blur(20px);">

            {{-- Animated Checkmark --}}
            <div style="position:relative;width:6rem;height:6rem;margin:0 auto 1.75rem;">
                <div style="position:absolute;inset:0;border-radius:50%;background:rgba(16,185,129,.08);animation:ping-slow 2s cubic-bezier(0,0,.2,1) infinite;"></div>
                <div style="position:absolute;inset:.5rem;border-radius:50%;background:rgba(16,185,129,.12);animation:ping-slow 2s cubic-bezier(0,0,.2,1) infinite;animation-delay:.3s;"></div>
                <div style="position:relative;width:6rem;height:6rem;border-radius:50%;background:linear-gradient(135deg,#059669,#10b981);display:flex;align-items:center;justify-content:center;box-shadow:0 0 40px rgba(16,185,129,.5);">
                    <svg style="width:2.5rem;height:2.5rem;color:#fff;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/>
                    </svg>
                </div>
            </div>

            <h2 style="font-size:1.6rem;font-weight:800;color:#f9fafb;margin:0 0 .5rem;letter-spacing:-.025em;">Order Created!</h2>
            <p style="color:#64748b;font-size:.9rem;margin:0 0 1.75rem;">Your order has been successfully processed.</p>

            {{-- Order Number --}}
            <div style="background:rgba(245,158,11,.08);border:1px solid rgba(245,158,11,.2);border-radius:1rem;padding:1.1rem;margin-bottom:1.25rem;">
                <div style="font-size:.72rem;color:#9ca3af;text-transform:uppercase;letter-spacing:.07em;margin-bottom:.3rem;">Order Number</div>
                <div style="font-size:1.5rem;font-weight:800;color:#f59e0b;letter-spacing:.04em;">{{ $successOrderNumber }}</div>
            </div>

            {{-- Payment Status Badge --}}
            <div style="margin-bottom:2rem;">
                @if ($successPaymentMethod === 'cash')
                    <span style="display:inline-flex;align-items:center;gap:.4rem;background:rgba(16,185,129,.12);border:1px solid rgba(16,185,129,.25);color:#10b981;font-size:.8rem;font-weight:700;padding:.4rem 1rem;border-radius:99px;">
                        <svg style="width:.875rem;height:.875rem;" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4"/></svg>
                        Paid — Cash
                    </span>
                @elseif ($successPaymentMethod === 'card')
                    <span style="display:inline-flex;align-items:center;gap:.4rem;background:rgba(14,165,233,.12);border:1px solid rgba(14,165,233,.25);color:#38bdf8;font-size:.8rem;font-weight:700;padding:.4rem 1rem;border-radius:99px;">
                        <svg style="width:.875rem;height:.875rem;" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1"/></svg>
                        Paid — Card
                    </span>
                @elseif ($successPaymentMethod === 'due')
                    <span style="display:inline-flex;align-items:center;gap:.4rem;background:rgba(244,63,94,.1);border:1px solid rgba(244,63,94,.25);color:#f43f5e;font-size:.8rem;font-weight:700;padding:.4rem 1rem;border-radius:99px;">
                        <svg style="width:.875rem;height:.875rem;" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        Payment Due
                    </span>
                @else
                    <span style="display:inline-flex;align-items:center;gap:.4rem;background:rgba(255,255,255,.07);border:1px solid rgba(255,255,255,.12);color:#9ca3af;font-size:.8rem;font-weight:700;padding:.4rem 1rem;border-radius:99px;">
                        Payment: {{ ucfirst($successPaymentMethod) }}
                    </span>
                @endif
            </div>

            {{-- Action Buttons --}}
            <div style="display:grid;grid-template-columns:1fr 1fr;gap:.875rem;">
                <button
                    wire:click="createAnotherOrder"
                    style="padding:.875rem;background:rgba(13,148,136,.12);border:1px solid rgba(13,148,136,.3);border-radius:1rem;color:#14b8a6;font-size:.875rem;font-weight:700;cursor:pointer;transition:all .2s;font-family:inherit;"
                    onmouseover="this.style.background='rgba(13,148,136,.22)';this.style.borderColor='#14b8a6'"
                    onmouseout="this.style.background='rgba(13,148,136,.12)';this.style.borderColor='rgba(13,148,136,.3)'"
                >
                    <div style="display:flex;align-items:center;justify-content:center;gap:.4rem;">
                        <svg style="width:.95rem;height:.95rem;" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                        New Order
                    </div>
                </button>
                <button
                    wire:click="goToOrders"
                    style="padding:.875rem;background:linear-gradient(135deg,#0d9488,#14b8a6);border:none;border-radius:1rem;color:#fff;font-size:.875rem;font-weight:700;cursor:pointer;transition:all .2s;box-shadow:0 2px 12px rgba(13,148,136,.3);font-family:inherit;"
                    onmouseover="this.style.transform='translateY(-1px)';this.style.boxShadow='0 6px 20px rgba(13,148,136,.4)'"
                    onmouseout="this.style.transform='translateY(0)';this.style.boxShadow='0 2px 12px rgba(13,148,136,.3)'"
                >
                    <div style="display:flex;align-items:center;justify-content:center;gap:.4rem;">
                        <svg style="width:.95rem;height:.95rem;" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
                        View Orders
                    </div>
                </button>
            </div>
        </div>
    </div>

    {{-- ══════════════════════════════════════════════════════════════ --}}
    {{-- STYLES & ANIMATIONS                                             --}}
    {{-- ══════════════════════════════════════════════════════════════ --}}
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap');

        * { box-sizing: border-box; }

        ::-webkit-scrollbar { width: 4px; }
        ::-webkit-scrollbar-track { background: rgba(255,255,255,.03); border-radius: 2px; }
        ::-webkit-scrollbar-thumb { background: rgba(13,148,136,.4); border-radius: 2px; }
        ::-webkit-scrollbar-thumb:hover { background: rgba(13,148,136,.6); }

        input[type="date"]::-webkit-calendar-picker-indicator {
            filter: invert(1) brightness(.5);
            cursor: pointer;
        }
        input[type="number"]::-webkit-inner-spin-button,
        input[type="number"]::-webkit-outer-spin-button { opacity: .4; }

        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50%       { opacity: .4; }
        }
        @keyframes ping-slow {
            0%   { transform: scale(1);   opacity: .6; }
            100% { transform: scale(1.8); opacity: 0;  }
        }

        [x-cloak] { display: none !important; }
    </style>

    {{-- ══════════════════════════════════════════════════════════════ --}}
    {{-- SCRIPT                                                          --}}
    {{-- ══════════════════════════════════════════════════════════════ --}}
    <script>
        document.addEventListener('livewire:initialized', () => {

            Livewire.on('orderCreated', (data) => {
                // Payment modal closes automatically via Livewire property
                // Success modal opens via showSuccessModal property
                console.log('Order created:', data);
            });

            Livewire.on('showPaymentModal', () => {
                // Handled via $showPaymentModal Livewire property
            });

            Livewire.on('orderProcessed', (event) => {
                console.log('Payment processed:', event);
            });

            Livewire.on('notification', (event) => {
                // Optional: integrate with toast notification library
                const message = Array.isArray(event) ? event[0] : event;
                if (message && message.type && message.text) {
                    console.log(`[${message.type.toUpperCase()}] ${message.text}`);
                }
            });
        });
    </script>

</div>