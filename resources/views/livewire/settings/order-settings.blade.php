<div class="w-full">

    {{-- Page Header --}}
    <div style="display:flex;align-items:center;gap:14px;margin-bottom:28px;">
        <div style="width:48px;height:48px;background:linear-gradient(135deg,#0d9488,#0f766e);border-radius:14px;display:flex;align-items:center;justify-content:center;box-shadow:0 0 20px rgba(13,148,136,0.35);">
            <svg style="width:24px;height:24px;color:#fff;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"/>
            </svg>
        </div>
        <div>
            <h1 style="font-size:1.5rem;font-weight:700;color:#f9fafb;letter-spacing:-0.02em;margin:0;">Order Settings</h1>
            <p style="color:#64748b;font-size:0.85rem;margin:2px 0 0;">Configure order numbering, delivery timelines &amp; options</p>
        </div>
    </div>

    {{-- Flash Message --}}
    @if (session()->has('success'))
        <div style="margin-bottom:20px;padding:14px 18px;background:rgba(16,185,129,0.1);border:1px solid rgba(16,185,129,0.3);border-radius:12px;display:flex;align-items:center;gap:10px;">
            <svg style="width:18px;height:18px;color:#34d399;flex-shrink:0;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
            <span style="color:#34d399;font-size:0.875rem;font-weight:500;">{{ session('success') }}</span>
        </div>
    @endif

    <form wire:submit.prevent="save">

        {{-- Order Numbering --}}
        <div style="background:rgba(255,255,255,0.04);border:1px solid rgba(255,255,255,0.07);border-radius:20px;padding:28px;margin-bottom:20px;">
            <div style="display:flex;align-items:center;gap:10px;margin-bottom:22px;padding-bottom:16px;border-bottom:1px solid rgba(255,255,255,0.06);">
                <div style="width:4px;height:22px;background:linear-gradient(180deg,#0d9488,#14b8a6);border-radius:4px;"></div>
                <h3 style="font-size:1rem;font-weight:700;color:#f9fafb;margin:0;">Order Numbering</h3>
            </div>

            <div style="display:grid;grid-template-columns:repeat(auto-fill,minmax(280px,1fr));gap:20px;">

                <div>
                    <label style="display:block;color:#94a3b8;font-size:0.75rem;font-weight:600;text-transform:uppercase;letter-spacing:0.05em;margin-bottom:8px;">Order Number Prefix <span style="color:#f43f5e;">*</span></label>
                    <input type="text" wire:model="order_prefix"
                        style="width:100%;background:rgba(255,255,255,0.05);border:1px solid rgba(255,255,255,0.1);border-radius:10px;padding:11px 14px;color:#f9fafb;font-size:0.9rem;outline:none;transition:border-color 0.2s;box-sizing:border-box;"
                        onfocus="this.style.borderColor='#0d9488'" onblur="this.style.borderColor='rgba(255,255,255,0.1)'"
                        placeholder="ORD">
                    @error('order_prefix')
                        <p style="margin-top:5px;font-size:0.8rem;color:#fb7185;">{{ $message }}</p>
                    @enderror
                    <p style="margin-top:6px;font-size:0.75rem;color:#64748b;">
                        Example: <span style="color:#0d9488;font-weight:600;">{{ $order_prefix }}-001</span>, <span style="color:#0d9488;font-weight:600;">{{ $order_prefix }}-002</span>
                    </p>
                </div>

                <div>
                    <label style="display:block;color:#94a3b8;font-size:0.75rem;font-weight:600;text-transform:uppercase;letter-spacing:0.05em;margin-bottom:8px;">Default Order Status <span style="color:#f43f5e;">*</span></label>
                    <select wire:model="default_order_status"
                        style="width:100%;background:rgba(255,255,255,0.05);border:1px solid rgba(255,255,255,0.1);border-radius:10px;padding:11px 14px;color:#f9fafb;font-size:0.9rem;outline:none;transition:border-color 0.2s;box-sizing:border-box;appearance:none;-webkit-appearance:none;"
                        onfocus="this.style.borderColor='#0d9488'" onblur="this.style.borderColor='rgba(255,255,255,0.1)'">
                        <option value="pending" style="background:#0d1117;">Pending</option>
                        <option value="processing" style="background:#0d1117;">Processing</option>
                        <option value="ready" style="background:#0d1117;">Ready for Delivery</option>
                        <option value="delivered" style="background:#0d1117;">Delivered</option>
                    </select>
                    @error('default_order_status')
                        <p style="margin-top:5px;font-size:0.8rem;color:#fb7185;">{{ $message }}</p>
                    @enderror
                </div>

            </div>
        </div>

        {{-- Delivery Settings --}}
        <div style="background:rgba(255,255,255,0.04);border:1px solid rgba(255,255,255,0.07);border-radius:20px;padding:28px;margin-bottom:20px;">
            <div style="display:flex;align-items:center;gap:10px;margin-bottom:22px;padding-bottom:16px;border-bottom:1px solid rgba(255,255,255,0.06);">
                <div style="width:4px;height:22px;background:linear-gradient(180deg,#f59e0b,#d97706);border-radius:4px;"></div>
                <h3 style="font-size:1rem;font-weight:700;color:#f9fafb;margin:0;">Delivery Settings</h3>
            </div>

            <div style="display:grid;grid-template-columns:repeat(auto-fill,minmax(280px,1fr));gap:20px;">

                <div>
                    <label style="display:block;color:#94a3b8;font-size:0.75rem;font-weight:600;text-transform:uppercase;letter-spacing:0.05em;margin-bottom:8px;">Default Delivery Days <span style="color:#f43f5e;">*</span></label>
                    <div style="position:relative;">
                        <input type="number" wire:model="default_delivery_days" min="1" max="30"
                            style="width:100%;background:rgba(255,255,255,0.05);border:1px solid rgba(255,255,255,0.1);border-radius:10px;padding:11px 60px 11px 14px;color:#f9fafb;font-size:0.9rem;outline:none;transition:border-color 0.2s;box-sizing:border-box;"
                            onfocus="this.style.borderColor='#0d9488'" onblur="this.style.borderColor='rgba(255,255,255,0.1)'">
                        <span style="position:absolute;right:14px;top:50%;transform:translateY(-50%);color:#64748b;font-size:0.8rem;font-weight:600;">days</span>
                    </div>
                    @error('default_delivery_days')
                        <p style="margin-top:5px;font-size:0.8rem;color:#fb7185;">{{ $message }}</p>
                    @enderror
                    <p style="margin-top:6px;font-size:0.75rem;color:#64748b;">Standard turnaround time in days</p>
                </div>

            </div>
        </div>

        {{-- Order Options --}}
        <div style="background:rgba(255,255,255,0.04);border:1px solid rgba(255,255,255,0.07);border-radius:20px;padding:28px;margin-bottom:24px;">
            <div style="display:flex;align-items:center;gap:10px;margin-bottom:22px;padding-bottom:16px;border-bottom:1px solid rgba(255,255,255,0.06);">
                <div style="width:4px;height:22px;background:linear-gradient(180deg,#0d9488,#14b8a6);border-radius:4px;"></div>
                <h3 style="font-size:1rem;font-weight:700;color:#f9fafb;margin:0;">Order Options</h3>
            </div>

            <div style="display:flex;flex-direction:column;gap:14px;">

                {{-- Toggle: Require Customer --}}
                <label style="display:flex;align-items:center;justify-content:space-between;padding:16px 18px;background:rgba(255,255,255,0.03);border:1px solid rgba(255,255,255,0.06);border-radius:12px;cursor:pointer;">
                    <div>
                        <div style="color:#f9fafb;font-size:0.9rem;font-weight:500;">Require customer selection</div>
                        <div style="color:#64748b;font-size:0.78rem;margin-top:2px;">Require customer selection for all orders</div>
                    </div>
                    <div style="position:relative;display:inline-block;width:48px;height:26px;flex-shrink:0;">
                        <input type="checkbox" wire:model="require_customer" id="require_customer"
                            style="opacity:0;width:0;height:0;position:absolute;">
                        <span onclick="this.previousElementSibling.click()" style="position:absolute;cursor:pointer;top:0;left:0;right:0;bottom:0;background:rgba(255,255,255,0.1);border-radius:13px;transition:0.3s;border:1px solid rgba(255,255,255,0.15);"></span>
                    </div>
                </label>

                {{-- Toggle: Express Service --}}
                <label style="display:flex;align-items:center;justify-content:space-between;padding:16px 18px;background:rgba(255,255,255,0.03);border:1px solid rgba(255,255,255,0.06);border-radius:12px;cursor:pointer;">
                    <div>
                        <div style="color:#f9fafb;font-size:0.9rem;font-weight:500;">Enable express service</div>
                        <div style="color:#64748b;font-size:0.78rem;margin-top:2px;">Enable express service option for customers</div>
                    </div>
                    <div style="position:relative;display:inline-block;flex-shrink:0;">
                        <input type="checkbox" wire:model="enable_express_service" id="enable_express_service"
                            style="width:20px;height:20px;accent-color:#0d9488;cursor:pointer;border-radius:4px;">
                    </div>
                </label>

                {{-- Toggle: Auto Print Receipt --}}
                <label style="display:flex;align-items:center;justify-content:space-between;padding:16px 18px;background:rgba(255,255,255,0.03);border:1px solid rgba(255,255,255,0.06);border-radius:12px;cursor:pointer;">
                    <div>
                        <div style="color:#f9fafb;font-size:0.9rem;font-weight:500;">Auto-print receipt</div>
                        <div style="color:#64748b;font-size:0.78rem;margin-top:2px;">Automatically print receipt after creating order</div>
                    </div>
                    <div style="position:relative;display:inline-block;flex-shrink:0;">
                        <input type="checkbox" wire:model="auto_print_receipt" id="auto_print_receipt"
                            style="width:20px;height:20px;accent-color:#0d9488;cursor:pointer;border-radius:4px;">
                    </div>
                </label>

            </div>
        </div>

        {{-- Submit Button --}}
        <div style="display:flex;justify-content:flex-end;">
            <button type="submit"
                style="padding:12px 28px;background:linear-gradient(135deg,#0d9488,#0f766e);color:#fff;font-size:0.9rem;font-weight:600;border:none;border-radius:12px;cursor:pointer;letter-spacing:0.02em;box-shadow:0 4px 15px rgba(13,148,136,0.3);transition:all 0.2s;"
                onmouseover="this.style.boxShadow='0 6px 20px rgba(13,148,136,0.5)'" onmouseout="this.style.boxShadow='0 4px 15px rgba(13,148,136,0.3)'">
                <svg style="width:16px;height:16px;display:inline;margin-right:6px;vertical-align:-3px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                </svg>
                Save Order Settings
            </button>
        </div>

    </form>
</div>