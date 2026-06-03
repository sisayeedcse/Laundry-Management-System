<div class="w-full">

    {{-- Page Header --}}
    <div style="display:flex;align-items:center;gap:14px;margin-bottom:28px;">
        <div style="width:48px;height:48px;background:linear-gradient(135deg,#0d9488,#0f766e);border-radius:14px;display:flex;align-items:center;justify-content:center;box-shadow:0 0 20px rgba(13,148,136,0.35);">
            <svg style="width:24px;height:24px;color:#fff;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
            </svg>
        </div>
        <div>
            <h1 style="font-size:1.5rem;font-weight:700;color:#f9fafb;letter-spacing:-0.02em;margin:0;">Business Settings</h1>
            <p style="color:#64748b;font-size:0.85rem;margin:2px 0 0;">Configure your laundry business information &amp; branding</p>
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

        {{-- Business Information --}}
        <div style="background:rgba(255,255,255,0.04);border:1px solid rgba(255,255,255,0.07);border-radius:20px;padding:28px;margin-bottom:20px;">
            <div style="display:flex;align-items:center;gap:10px;margin-bottom:22px;padding-bottom:16px;border-bottom:1px solid rgba(255,255,255,0.06);">
                <div style="width:4px;height:22px;background:linear-gradient(180deg,#0d9488,#14b8a6);border-radius:4px;"></div>
                <h3 style="font-size:1rem;font-weight:700;color:#f9fafb;margin:0;">Business Information</h3>
            </div>

            <div style="display:grid;grid-template-columns:repeat(auto-fill,minmax(280px,1fr));gap:20px;">

                <div>
                    <label style="display:block;color:#94a3b8;font-size:0.75rem;font-weight:600;text-transform:uppercase;letter-spacing:0.05em;margin-bottom:8px;">Business Name <span style="color:#f43f5e;">*</span></label>
                    <input type="text" wire:model="business_name"
                        style="width:100%;background:rgba(255,255,255,0.05);border:1px solid rgba(255,255,255,0.1);border-radius:10px;padding:11px 14px;color:#f9fafb;font-size:0.9rem;outline:none;transition:border-color 0.2s;box-sizing:border-box;"
                        onfocus="this.style.borderColor='#0d9488'" onblur="this.style.borderColor='rgba(255,255,255,0.1)'"
                        placeholder="Amazing Laundry Qatar">
                    @error('business_name')
                        <p style="margin-top:5px;font-size:0.8rem;color:#fb7185;">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label style="display:block;color:#94a3b8;font-size:0.75rem;font-weight:600;text-transform:uppercase;letter-spacing:0.05em;margin-bottom:8px;">Business Phone</label>
                    <input type="text" wire:model="business_phone"
                        style="width:100%;background:rgba(255,255,255,0.05);border:1px solid rgba(255,255,255,0.1);border-radius:10px;padding:11px 14px;color:#f9fafb;font-size:0.9rem;outline:none;transition:border-color 0.2s;box-sizing:border-box;"
                        onfocus="this.style.borderColor='#0d9488'" onblur="this.style.borderColor='rgba(255,255,255,0.1)'"
                        placeholder="+974 XXXX XXXX">
                    @error('business_phone')
                        <p style="margin-top:5px;font-size:0.8rem;color:#fb7185;">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label style="display:block;color:#94a3b8;font-size:0.75rem;font-weight:600;text-transform:uppercase;letter-spacing:0.05em;margin-bottom:8px;">Business Email</label>
                    <input type="email" wire:model="business_email"
                        style="width:100%;background:rgba(255,255,255,0.05);border:1px solid rgba(255,255,255,0.1);border-radius:10px;padding:11px 14px;color:#f9fafb;font-size:0.9rem;outline:none;transition:border-color 0.2s;box-sizing:border-box;"
                        onfocus="this.style.borderColor='#0d9488'" onblur="this.style.borderColor='rgba(255,255,255,0.1)'"
                        placeholder="info@amazinglaundry.qa">
                    @error('business_email')
                        <p style="margin-top:5px;font-size:0.8rem;color:#fb7185;">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label style="display:block;color:#94a3b8;font-size:0.75rem;font-weight:600;text-transform:uppercase;letter-spacing:0.05em;margin-bottom:8px;">Currency</label>
                    <select wire:model="currency"
                        style="width:100%;background:rgba(255,255,255,0.05);border:1px solid rgba(255,255,255,0.1);border-radius:10px;padding:11px 14px;color:#f9fafb;font-size:0.9rem;outline:none;transition:border-color 0.2s;box-sizing:border-box;appearance:none;-webkit-appearance:none;"
                        onfocus="this.style.borderColor='#0d9488'" onblur="this.style.borderColor='rgba(255,255,255,0.1)'">
                        <option value="QAR" style="background:#0d1117;">QAR - Qatari Riyal</option>
                        <option value="USD" style="background:#0d1117;">USD - US Dollar</option>
                        <option value="EUR" style="background:#0d1117;">EUR - Euro</option>
                        <option value="GBP" style="background:#0d1117;">GBP - British Pound</option>
                        <option value="SAR" style="background:#0d1117;">SAR - Saudi Riyal</option>
                        <option value="AED" style="background:#0d1117;">AED - UAE Dirham</option>
                    </select>
                    @error('currency')
                        <p style="margin-top:5px;font-size:0.8rem;color:#fb7185;">{{ $message }}</p>
                    @enderror
                </div>

                <div style="grid-column:1/-1;">
                    <label style="display:block;color:#94a3b8;font-size:0.75rem;font-weight:600;text-transform:uppercase;letter-spacing:0.05em;margin-bottom:8px;">Business Address</label>
                    <textarea wire:model="business_address" rows="3"
                        style="width:100%;background:rgba(255,255,255,0.05);border:1px solid rgba(255,255,255,0.1);border-radius:10px;padding:11px 14px;color:#f9fafb;font-size:0.9rem;outline:none;transition:border-color 0.2s;box-sizing:border-box;resize:vertical;"
                        onfocus="this.style.borderColor='#0d9488'" onblur="this.style.borderColor='rgba(255,255,255,0.1)'"
                        placeholder="Enter your full business address"></textarea>
                    @error('business_address')
                        <p style="margin-top:5px;font-size:0.8rem;color:#fb7185;">{{ $message }}</p>
                    @enderror
                </div>

            </div>
        </div>

        {{-- Tax Settings --}}
        <div style="background:rgba(255,255,255,0.04);border:1px solid rgba(255,255,255,0.07);border-radius:20px;padding:28px;margin-bottom:20px;">
            <div style="display:flex;align-items:center;gap:10px;margin-bottom:22px;padding-bottom:16px;border-bottom:1px solid rgba(255,255,255,0.06);">
                <div style="width:4px;height:22px;background:linear-gradient(180deg,#f59e0b,#d97706);border-radius:4px;"></div>
                <h3 style="font-size:1rem;font-weight:700;color:#f9fafb;margin:0;">Tax Settings</h3>
            </div>

            <div style="display:grid;grid-template-columns:repeat(auto-fill,minmax(280px,1fr));gap:20px;">
                <div>
                    <label style="display:block;color:#94a3b8;font-size:0.75rem;font-weight:600;text-transform:uppercase;letter-spacing:0.05em;margin-bottom:8px;">Tax Rate (%) <span style="color:#f43f5e;">*</span></label>
                    <div style="position:relative;">
                        <input type="number" step="0.01" wire:model="tax_rate"
                            style="width:100%;background:rgba(255,255,255,0.05);border:1px solid rgba(255,255,255,0.1);border-radius:10px;padding:11px 50px 11px 14px;color:#f9fafb;font-size:0.9rem;outline:none;transition:border-color 0.2s;box-sizing:border-box;"
                            onfocus="this.style.borderColor='#0d9488'" onblur="this.style.borderColor='rgba(255,255,255,0.1)'"
                            placeholder="5.00">
                        <span style="position:absolute;right:14px;top:50%;transform:translateY(-50%);color:#64748b;font-size:0.85rem;font-weight:600;">%</span>
                    </div>
                    @error('tax_rate')
                        <p style="margin-top:5px;font-size:0.8rem;color:#fb7185;">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

        {{-- Logo Upload --}}
        <div style="background:rgba(255,255,255,0.04);border:1px solid rgba(255,255,255,0.07);border-radius:20px;padding:28px;margin-bottom:24px;">
            <div style="display:flex;align-items:center;gap:10px;margin-bottom:22px;padding-bottom:16px;border-bottom:1px solid rgba(255,255,255,0.06);">
                <div style="width:4px;height:22px;background:linear-gradient(180deg,#0d9488,#14b8a6);border-radius:4px;"></div>
                <h3 style="font-size:1rem;font-weight:700;color:#f9fafb;margin:0;">Business Logo</h3>
            </div>

            @if($current_logo)
                <div style="display:flex;align-items:center;gap:16px;margin-bottom:20px;padding:16px;background:rgba(255,255,255,0.03);border:1px solid rgba(255,255,255,0.06);border-radius:12px;">
                    <img src="{{ asset('storage/' . $current_logo) }}" alt="Current Logo"
                        style="height:70px;width:70px;object-fit:contain;border-radius:10px;border:1px solid rgba(255,255,255,0.1);background:rgba(255,255,255,0.05);">
                    <div style="flex:1;">
                        <p style="color:#94a3b8;font-size:0.8rem;margin:0 0 4px;">Current logo</p>
                        <p style="color:#64748b;font-size:0.75rem;margin:0;">Click remove to replace with a new logo</p>
                    </div>
                    <button type="button" wire:click="removeLogo"
                        style="padding:8px 16px;background:rgba(244,63,94,0.1);border:1px solid rgba(244,63,94,0.3);color:#fb7185;border-radius:8px;font-size:0.8rem;font-weight:600;cursor:pointer;transition:all 0.2s;"
                        onmouseover="this.style.background='rgba(244,63,94,0.2)'" onmouseout="this.style.background='rgba(244,63,94,0.1)'">
                        Remove Logo
                    </button>
                </div>
            @endif

            <div>
                <label style="display:block;color:#94a3b8;font-size:0.75rem;font-weight:600;text-transform:uppercase;letter-spacing:0.05em;margin-bottom:10px;">Upload Logo</label>
                <div style="border:2px dashed rgba(13,148,136,0.3);border-radius:12px;padding:24px;text-align:center;background:rgba(13,148,136,0.03);">
                    <svg style="width:32px;height:32px;color:#0d9488;margin:0 auto 10px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                    <p style="color:#64748b;font-size:0.8rem;margin:0 0 12px;">Drag &amp; drop or click to upload</p>
                    <input type="file" wire:model="logo" accept="image/*"
                        style="display:block;width:100%;color:#94a3b8;font-size:0.8rem;cursor:pointer;">
                </div>
                @error('logo')
                    <p style="margin-top:6px;font-size:0.8rem;color:#fb7185;">{{ $message }}</p>
                @enderror
                @if($logo)
                    <div style="margin-top:12px;display:flex;align-items:center;gap:10px;">
                        <span style="color:#94a3b8;font-size:0.8rem;">Preview:</span>
                        <img src="{{ $logo->temporaryUrl() }}" style="height:60px;width:60px;object-fit:contain;border-radius:8px;border:1px solid rgba(255,255,255,0.1);">
                    </div>
                @endif
            </div>
        </div>

        {{-- Submit Button --}}
        <div style="display:flex;justify-content:flex-end;gap:12px;">
            <button type="submit"
                style="padding:12px 28px;background:linear-gradient(135deg,#0d9488,#0f766e);color:#fff;font-size:0.9rem;font-weight:600;border:none;border-radius:12px;cursor:pointer;letter-spacing:0.02em;box-shadow:0 4px 15px rgba(13,148,136,0.3);transition:all 0.2s;"
                onmouseover="this.style.boxShadow='0 6px 20px rgba(13,148,136,0.5)'" onmouseout="this.style.boxShadow='0 4px 15px rgba(13,148,136,0.3)'">
                <svg style="width:16px;height:16px;display:inline;margin-right:6px;vertical-align:-3px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                </svg>
                Save Business Settings
            </button>
        </div>

    </form>
</div>