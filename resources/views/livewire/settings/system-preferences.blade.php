<div class="w-full">

    {{-- Page Header --}}
    <div style="display:flex;align-items:center;gap:14px;margin-bottom:28px;">
        <div style="width:48px;height:48px;background:linear-gradient(135deg,#0d9488,#0f766e);border-radius:14px;display:flex;align-items:center;justify-content:center;box-shadow:0 0 20px rgba(13,148,136,0.35);">
            <svg style="width:24px;height:24px;color:#fff;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
            </svg>
        </div>
        <div>
            <h1 style="font-size:1.5rem;font-weight:700;color:#f9fafb;letter-spacing:-0.02em;margin:0;">System Preferences</h1>
            <p style="color:#64748b;font-size:0.85rem;margin:2px 0 0;">Configure localization, display, and notification settings</p>
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

        {{-- Localization --}}
        <div style="background:rgba(255,255,255,0.04);border:1px solid rgba(255,255,255,0.07);border-radius:20px;padding:28px;margin-bottom:20px;">
            <div style="display:flex;align-items:center;gap:10px;margin-bottom:22px;padding-bottom:16px;border-bottom:1px solid rgba(255,255,255,0.06);">
                <div style="width:4px;height:22px;background:linear-gradient(180deg,#0d9488,#14b8a6);border-radius:4px;"></div>
                <h3 style="font-size:1rem;font-weight:700;color:#f9fafb;margin:0;">Localization</h3>
            </div>

            <div style="display:grid;grid-template-columns:repeat(auto-fill,minmax(280px,1fr));gap:20px;">
                <div>
                    <label style="display:block;color:#94a3b8;font-size:0.75rem;font-weight:600;text-transform:uppercase;letter-spacing:0.05em;margin-bottom:8px;">Timezone <span style="color:#f43f5e;">*</span></label>
                    <select wire:model="timezone"
                        style="width:100%;background:rgba(255,255,255,0.05);border:1px solid rgba(255,255,255,0.1);border-radius:10px;padding:11px 14px;color:#f9fafb;font-size:0.9rem;outline:none;transition:border-color 0.2s;box-sizing:border-box;appearance:none;-webkit-appearance:none;"
                        onfocus="this.style.borderColor='#0d9488'" onblur="this.style.borderColor='rgba(255,255,255,0.1)'">
                        <option value="Asia/Qatar" style="background:#0d1117;">Asia/Qatar (GMT+3)</option>
                        <option value="Asia/Dubai" style="background:#0d1117;">Asia/Dubai (GMT+4)</option>
                        <option value="Asia/Riyadh" style="background:#0d1117;">Asia/Riyadh (GMT+3)</option>
                        <option value="Europe/London" style="background:#0d1117;">Europe/London (GMT+0)</option>
                        <option value="America/New_York" style="background:#0d1117;">America/New York (GMT-5)</option>
                        <option value="Asia/Kolkata" style="background:#0d1117;">Asia/Kolkata (GMT+5:30)</option>
                    </select>
                    @error('timezone')
                        <p style="margin-top:5px;font-size:0.8rem;color:#fb7185;">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label style="display:block;color:#94a3b8;font-size:0.75rem;font-weight:600;text-transform:uppercase;letter-spacing:0.05em;margin-bottom:8px;">Date Format <span style="color:#f43f5e;">*</span></label>
                    <select wire:model="date_format"
                        style="width:100%;background:rgba(255,255,255,0.05);border:1px solid rgba(255,255,255,0.1);border-radius:10px;padding:11px 14px;color:#f9fafb;font-size:0.9rem;outline:none;transition:border-color 0.2s;box-sizing:border-box;appearance:none;-webkit-appearance:none;"
                        onfocus="this.style.borderColor='#0d9488'" onblur="this.style.borderColor='rgba(255,255,255,0.1)'">
                        <option value="Y-m-d" style="background:#0d1117;">YYYY-MM-DD (2026-01-04)</option>
                        <option value="d/m/Y" style="background:#0d1117;">DD/MM/YYYY (04/01/2026)</option>
                        <option value="m/d/Y" style="background:#0d1117;">MM/DD/YYYY (01/04/2026)</option>
                        <option value="d-M-Y" style="background:#0d1117;">DD-MMM-YYYY (04-Jan-2026)</option>
                    </select>
                    @error('date_format')
                        <p style="margin-top:5px;font-size:0.8rem;color:#fb7185;">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label style="display:block;color:#94a3b8;font-size:0.75rem;font-weight:600;text-transform:uppercase;letter-spacing:0.05em;margin-bottom:8px;">Time Format <span style="color:#f43f5e;">*</span></label>
                    <select wire:model="time_format"
                        style="width:100%;background:rgba(255,255,255,0.05);border:1px solid rgba(255,255,255,0.1);border-radius:10px;padding:11px 14px;color:#f9fafb;font-size:0.9rem;outline:none;transition:border-color 0.2s;box-sizing:border-box;appearance:none;-webkit-appearance:none;"
                        onfocus="this.style.borderColor='#0d9488'" onblur="this.style.borderColor='rgba(255,255,255,0.1)'">
                        <option value="H:i:s" style="background:#0d1117;">24-hour (14:30:00)</option>
                        <option value="h:i A" style="background:#0d1117;">12-hour (02:30 PM)</option>
                    </select>
                    @error('time_format')
                        <p style="margin-top:5px;font-size:0.8rem;color:#fb7185;">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

        {{-- Display & Inventory Settings --}}
        <div style="background:rgba(255,255,255,0.04);border:1px solid rgba(255,255,255,0.07);border-radius:20px;padding:28px;margin-bottom:20px;">
            <div style="display:flex;align-items:center;gap:10px;margin-bottom:22px;padding-bottom:16px;border-bottom:1px solid rgba(255,255,255,0.06);">
                <div style="width:4px;height:22px;background:linear-gradient(180deg,#f59e0b,#d97706);border-radius:4px;"></div>
                <h3 style="font-size:1rem;font-weight:700;color:#f9fafb;margin:0;">Display & Inventory</h3>
            </div>

            <div style="display:grid;grid-template-columns:repeat(auto-fill,minmax(280px,1fr));gap:20px;">
                <div>
                    <label style="display:block;color:#94a3b8;font-size:0.75rem;font-weight:600;text-transform:uppercase;letter-spacing:0.05em;margin-bottom:8px;">Items Per Page <span style="color:#f43f5e;">*</span></label>
                    <input type="number" wire:model="items_per_page" min="5" max="100"
                        style="width:100%;background:rgba(255,255,255,0.05);border:1px solid rgba(255,255,255,0.1);border-radius:10px;padding:11px 14px;color:#f9fafb;font-size:0.9rem;outline:none;transition:border-color 0.2s;box-sizing:border-box;"
                        onfocus="this.style.borderColor='#0d9488'" onblur="this.style.borderColor='rgba(255,255,255,0.1)'">
                    @error('items_per_page')
                        <p style="margin-top:5px;font-size:0.8rem;color:#fb7185;">{{ $message }}</p>
                    @enderror
                    <p style="margin-top:6px;font-size:0.75rem;color:#64748b;">Number of items to display in tables and lists</p>
                </div>

                <div>
                    <label style="display:block;color:#94a3b8;font-size:0.75rem;font-weight:600;text-transform:uppercase;letter-spacing:0.05em;margin-bottom:8px;">Low Stock Threshold <span style="color:#f43f5e;">*</span></label>
                    <input type="number" wire:model="low_stock_threshold" min="0" max="1000"
                        style="width:100%;background:rgba(255,255,255,0.05);border:1px solid rgba(255,255,255,0.1);border-radius:10px;padding:11px 14px;color:#f9fafb;font-size:0.9rem;outline:none;transition:border-color 0.2s;box-sizing:border-box;"
                        onfocus="this.style.borderColor='#0d9488'" onblur="this.style.borderColor='rgba(255,255,255,0.1)'">
                    @error('low_stock_threshold')
                        <p style="margin-top:5px;font-size:0.8rem;color:#fb7185;">{{ $message }}</p>
                    @enderror
                    <p style="margin-top:6px;font-size:0.75rem;color:#64748b;">Alert when stock falls below this number</p>
                </div>
            </div>
        </div>

        {{-- Notification Settings --}}
        <div style="background:rgba(255,255,255,0.04);border:1px solid rgba(255,255,255,0.07);border-radius:20px;padding:28px;margin-bottom:24px;">
            <div style="display:flex;align-items:center;gap:10px;margin-bottom:22px;padding-bottom:16px;border-bottom:1px solid rgba(255,255,255,0.06);">
                <div style="width:4px;height:22px;background:linear-gradient(180deg,#0d9488,#14b8a6);border-radius:4px;"></div>
                <h3 style="font-size:1rem;font-weight:700;color:#f9fafb;margin:0;">Notification Settings</h3>
            </div>

            <label style="display:flex;align-items:center;justify-content:space-between;padding:16px 18px;background:rgba(255,255,255,0.03);border:1px solid rgba(255,255,255,0.06);border-radius:12px;cursor:pointer;">
                <div>
                    <div style="color:#f9fafb;font-size:0.9rem;font-weight:500;">Enable system notifications</div>
                    <div style="color:#64748b;font-size:0.78rem;margin-top:2px;">Receive pop-up notifications for system events</div>
                </div>
                <div style="position:relative;display:inline-block;flex-shrink:0;">
                    <input type="checkbox" wire:model="enable_notifications" id="enable_notifications"
                        style="width:20px;height:20px;accent-color:#0d9488;cursor:pointer;border-radius:4px;">
                </div>
            </label>
        </div>

        {{-- Submit Button --}}
        <div style="display:flex;justify-content:flex-end;">
            <button type="submit"
                style="padding:12px 28px;background:linear-gradient(135deg,#0d9488,#0f766e);color:#fff;font-size:0.9rem;font-weight:600;border:none;border-radius:12px;cursor:pointer;letter-spacing:0.02em;box-shadow:0 4px 15px rgba(13,148,136,0.3);transition:all 0.2s;"
                onmouseover="this.style.boxShadow='0 6px 20px rgba(13,148,136,0.5)'" onmouseout="this.style.boxShadow='0 4px 15px rgba(13,148,136,0.3)'">
                <svg style="width:16px;height:16px;display:inline;margin-right:6px;vertical-align:-3px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                </svg>
                Save System Preferences
            </button>
        </div>

    </form>
</div>