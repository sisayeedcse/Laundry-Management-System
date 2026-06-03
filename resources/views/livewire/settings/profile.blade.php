<div class="w-full">

    {{-- Page Header --}}
    <div style="display:flex;align-items:center;gap:14px;margin-bottom:28px;">
        <div style="width:48px;height:48px;background:linear-gradient(135deg,#0d9488,#0f766e);border-radius:14px;display:flex;align-items:center;justify-content:center;box-shadow:0 0 20px rgba(13,148,136,0.35);">
            <svg style="width:24px;height:24px;color:#fff;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
            </svg>
        </div>
        <div>
            <h1 style="font-size:1.5rem;font-weight:700;color:#f9fafb;letter-spacing:-0.02em;margin:0;">Profile Settings</h1>
            <p style="color:#64748b;font-size:0.85rem;margin:2px 0 0;">Manage your account information and password</p>
        </div>
    </div>

    <div style="display:grid;grid-template-columns:1fr;gap:20px;">

        {{-- Profile Information Card --}}
        <div style="background:rgba(255,255,255,0.04);border:1px solid rgba(255,255,255,0.07);border-radius:20px;padding:28px;">

            {{-- Card Header --}}
            <div style="display:flex;align-items:center;gap:14px;margin-bottom:24px;padding-bottom:18px;border-bottom:1px solid rgba(255,255,255,0.06);">
                <div style="width:44px;height:44px;background:rgba(13,148,136,0.15);border:1px solid rgba(13,148,136,0.25);border-radius:12px;display:flex;align-items:center;justify-content:center;">
                    <svg style="width:22px;height:22px;color:#0d9488;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                    </svg>
                </div>
                <div>
                    <h2 style="font-size:1.05rem;font-weight:700;color:#f9fafb;margin:0;">Profile Information</h2>
                    <p style="color:#64748b;font-size:0.8rem;margin:2px 0 0;">Update your account name and email address</p>
                </div>
            </div>

            @if (session()->has('profile_success'))
                <div style="margin-bottom:20px;padding:13px 16px;background:rgba(16,185,129,0.1);border:1px solid rgba(16,185,129,0.3);border-radius:10px;display:flex;align-items:center;gap:10px;">
                    <svg style="width:17px;height:17px;color:#34d399;flex-shrink:0;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <span style="color:#34d399;font-size:0.875rem;font-weight:500;">{{ session('profile_success') }}</span>
                </div>
            @endif

            <form wire:submit.prevent="updateProfile">
                <div style="display:flex;flex-direction:column;gap:18px;">

                    <div>
                        <label style="display:block;color:#94a3b8;font-size:0.75rem;font-weight:600;text-transform:uppercase;letter-spacing:0.05em;margin-bottom:8px;">Full Name</label>
                        <input type="text" wire:model="name"
                            style="width:100%;background:rgba(255,255,255,0.05);border:1px solid rgba(255,255,255,0.1);border-radius:10px;padding:12px 14px;color:#f9fafb;font-size:0.9rem;outline:none;transition:border-color 0.2s;box-sizing:border-box;"
                            onfocus="this.style.borderColor='#0d9488'" onblur="this.style.borderColor='rgba(255,255,255,0.1)'"
                            placeholder="Enter your name">
                        @error('name')
                            <p style="margin-top:5px;font-size:0.8rem;color:#fb7185;">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label style="display:block;color:#94a3b8;font-size:0.75rem;font-weight:600;text-transform:uppercase;letter-spacing:0.05em;margin-bottom:8px;">Email Address</label>
                        <input type="email" wire:model="email"
                            style="width:100%;background:rgba(255,255,255,0.05);border:1px solid rgba(255,255,255,0.1);border-radius:10px;padding:12px 14px;color:#f9fafb;font-size:0.9rem;outline:none;transition:border-color 0.2s;box-sizing:border-box;"
                            onfocus="this.style.borderColor='#0d9488'" onblur="this.style.borderColor='rgba(255,255,255,0.1)'"
                            placeholder="Enter your email">
                        @error('email')
                            <p style="margin-top:5px;font-size:0.8rem;color:#fb7185;">{{ $message }}</p>
                        @enderror
                    </div>

                    <div style="padding-top:6px;">
                        <button type="submit"
                            style="padding:12px 28px;background:linear-gradient(135deg,#0d9488,#0f766e);color:#fff;font-size:0.9rem;font-weight:600;border:none;border-radius:12px;cursor:pointer;letter-spacing:0.02em;box-shadow:0 4px 15px rgba(13,148,136,0.3);transition:all 0.2s;"
                            onmouseover="this.style.boxShadow='0 6px 20px rgba(13,148,136,0.5)'" onmouseout="this.style.boxShadow='0 4px 15px rgba(13,148,136,0.3)'">
                            <svg style="width:16px;height:16px;display:inline;margin-right:6px;vertical-align:-3px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            Update Profile
                        </button>
                    </div>

                </div>
            </form>
        </div>

        {{-- Change Password Card --}}
        <div style="background:rgba(255,255,255,0.04);border:1px solid rgba(255,255,255,0.07);border-radius:20px;padding:28px;">

            {{-- Card Header --}}
            <div style="display:flex;align-items:center;gap:14px;margin-bottom:24px;padding-bottom:18px;border-bottom:1px solid rgba(255,255,255,0.06);">
                <div style="width:44px;height:44px;background:rgba(245,158,11,0.12);border:1px solid rgba(245,158,11,0.25);border-radius:12px;display:flex;align-items:center;justify-content:center;">
                    <svg style="width:22px;height:22px;color:#f59e0b;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                    </svg>
                </div>
                <div>
                    <h2 style="font-size:1.05rem;font-weight:700;color:#f9fafb;margin:0;">Change Password</h2>
                    <p style="color:#64748b;font-size:0.8rem;margin:2px 0 0;">Update your password to keep your account secure</p>
                </div>
            </div>

            @if (session()->has('password_success'))
                <div style="margin-bottom:20px;padding:13px 16px;background:rgba(16,185,129,0.1);border:1px solid rgba(16,185,129,0.3);border-radius:10px;display:flex;align-items:center;gap:10px;">
                    <svg style="width:17px;height:17px;color:#34d399;flex-shrink:0;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <span style="color:#34d399;font-size:0.875rem;font-weight:500;">{{ session('password_success') }}</span>
                </div>
            @endif

            <form wire:submit.prevent="updatePassword">
                <div style="display:flex;flex-direction:column;gap:18px;">

                    <div>
                        <label style="display:block;color:#94a3b8;font-size:0.75rem;font-weight:600;text-transform:uppercase;letter-spacing:0.05em;margin-bottom:8px;">Current Password</label>
                        <input type="password" wire:model="current_password"
                            style="width:100%;background:rgba(255,255,255,0.05);border:1px solid rgba(255,255,255,0.1);border-radius:10px;padding:12px 14px;color:#f9fafb;font-size:0.9rem;outline:none;transition:border-color 0.2s;box-sizing:border-box;"
                            onfocus="this.style.borderColor='#0d9488'" onblur="this.style.borderColor='rgba(255,255,255,0.1)'"
                            placeholder="Enter current password">
                        @error('current_password')
                            <p style="margin-top:5px;font-size:0.8rem;color:#fb7185;">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label style="display:block;color:#94a3b8;font-size:0.75rem;font-weight:600;text-transform:uppercase;letter-spacing:0.05em;margin-bottom:8px;">New Password</label>
                        <input type="password" wire:model="new_password"
                            style="width:100%;background:rgba(255,255,255,0.05);border:1px solid rgba(255,255,255,0.1);border-radius:10px;padding:12px 14px;color:#f9fafb;font-size:0.9rem;outline:none;transition:border-color 0.2s;box-sizing:border-box;"
                            onfocus="this.style.borderColor='#0d9488'" onblur="this.style.borderColor='rgba(255,255,255,0.1)'"
                            placeholder="Enter new password (min. 8 characters)">
                        @error('new_password')
                            <p style="margin-top:5px;font-size:0.8rem;color:#fb7185;">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label style="display:block;color:#94a3b8;font-size:0.75rem;font-weight:600;text-transform:uppercase;letter-spacing:0.05em;margin-bottom:8px;">Confirm New Password</label>
                        <input type="password" wire:model="new_password_confirmation"
                            style="width:100%;background:rgba(255,255,255,0.05);border:1px solid rgba(255,255,255,0.1);border-radius:10px;padding:12px 14px;color:#f9fafb;font-size:0.9rem;outline:none;transition:border-color 0.2s;box-sizing:border-box;"
                            onfocus="this.style.borderColor='#0d9488'" onblur="this.style.borderColor='rgba(255,255,255,0.1)'"
                            placeholder="Confirm new password">
                    </div>

                    <div style="padding-top:6px;">
                        <button type="submit"
                            style="padding:12px 28px;background:linear-gradient(135deg,#f59e0b,#d97706);color:#fff;font-size:0.9rem;font-weight:600;border:none;border-radius:12px;cursor:pointer;letter-spacing:0.02em;box-shadow:0 4px 15px rgba(245,158,11,0.3);transition:all 0.2s;"
                            onmouseover="this.style.boxShadow='0 6px 20px rgba(245,158,11,0.5)'" onmouseout="this.style.boxShadow='0 4px 15px rgba(245,158,11,0.3)'">
                            <svg style="width:16px;height:16px;display:inline;margin-right:6px;vertical-align:-3px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                            </svg>
                            Change Password
                        </button>
                    </div>

                </div>
            </form>
        </div>

    </div>
</div>