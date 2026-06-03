<div class="w-full">

    {{-- Page Header --}}
    <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:28px;">
        <div style="display:flex;align-items:center;gap:14px;">
            <div style="width:48px;height:48px;background:linear-gradient(135deg,#0d9488,#0f766e);border-radius:14px;display:flex;align-items:center;justify-content:center;box-shadow:0 0 20px rgba(13,148,136,0.35);">
                <svg style="width:24px;height:24px;color:#fff;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
            </div>
            <div>
                <h1 style="font-size:1.5rem;font-weight:700;color:#f9fafb;letter-spacing:-0.02em;margin:0;">System Users</h1>
                <p style="color:#64748b;font-size:0.85rem;margin:2px 0 0;">Manage user accounts and access permissions</p>
            </div>
        </div>
        
        <div>
            <button wire:click="openCreateModal" class="btn-primary">
                <svg style="width:18px;height:18px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Add User
            </button>
        </div>
    </div>

    {{-- Flash Messages --}}
    @if (session()->has('success'))
        <div class="alert-success" style="margin-bottom:20px;">
            <svg style="width:20px;height:20px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
            </svg>
            {{ session('success') }}
        </div>
    @endif
    @if (session()->has('error'))
        <div class="alert-error" style="margin-bottom:20px;">
            <svg style="width:20px;height:20px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
            {{ session('error') }}
        </div>
    @endif

    {{-- Controls --}}
    <div style="background:rgba(255,255,255,0.04);border:1px solid rgba(255,255,255,0.07);border-radius:16px;padding:20px;margin-bottom:20px;display:flex;align-items:center;justify-content:space-between;">
        <div style="width:100%;max-width:320px;position:relative;">
            <svg style="position:absolute;left:14px;top:50%;transform:translateY(-50%);width:18px;height:18px;color:#64748b;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
            </svg>
            <input type="text" wire:model.live="search" placeholder="Search users..." class="input-dark" style="padding-left:40px;">
        </div>
    </div>

    {{-- Table --}}
    <div class="card-dark" style="overflow-x:auto;">
        <table class="table-dark">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Created</th>
                    <th style="text-align:right;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($users as $user)
                    <tr>
                        <td>
                            <div style="display:flex;align-items:center;gap:12px;">
                                <div style="width:36px;height:36px;border-radius:50%;background:linear-gradient(135deg,#0d9488,#0f766e);display:flex;align-items:center;justify-content:center;color:#fff;font-weight:bold;font-size:12px;">
                                    {{ strtoupper(substr($user->name, 0, 2)) }}
                                </div>
                                <span style="font-weight:600;color:#f9fafb;">{{ $user->name }}</span>
                            </div>
                        </td>
                        <td style="color:#94a3b8;">{{ $user->email }}</td>
                        <td>
                            <span class="badge {{ $user->role === 'admin' ? 'badge-active' : ($user->role === 'manager' ? 'badge-processing' : 'badge-inactive') }}">
                                {{ ucfirst($user->role ?? 'staff') }}
                            </span>
                        </td>
                        <td style="color:#64748b;font-size:13px;">
                            {{ $user->created_at->format('M d, Y') }}
                        </td>
                        <td style="text-align:right;">
                            <button wire:click="editUser({{ $user->id }})" style="background:none;border:none;color:#0d9488;cursor:pointer;font-weight:600;padding:4px 8px;margin-right:8px;" onmouseover="this.style.color='#14b8a6'" onmouseout="this.style.color='#0d9488'">Edit</button>
                            @if($user->id !== auth()->id())
                                <button wire:click="deleteUser({{ $user->id }})" wire:confirm="Are you sure you want to delete this user?" style="background:none;border:none;color:#fb7185;cursor:pointer;font-weight:600;padding:4px 8px;" onmouseover="this.style.color='#f43f5e'" onmouseout="this.style.color='#fb7185'">Delete</button>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" style="text-align:center;padding:40px;color:#64748b;">
                            <svg style="width:48px;height:48px;margin:0 auto 12px;opacity:0.5;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                            </svg>
                            <p>No users found</p>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        
        <div style="padding:16px;border-top:1px solid rgba(255,255,255,0.06);">
            {{ $users->links() }}
        </div>
    </div>

    {{-- Create User Modal --}}
    @if($showCreateModal)
        <div class="fixed inset-0 z-50 flex items-center justify-center" style="background:rgba(0,0,0,0.85);" x-data="{ show: @entangle('showCreateModal') }" x-show="show" x-cloak>
            <div class="card-dark" style="width:100%;max-width:450px;padding:24px;" @click.outside="show = false">
                <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:20px;padding-bottom:16px;border-bottom:1px solid rgba(255,255,255,0.06);">
                    <h3 style="font-size:1.1rem;font-weight:700;color:#f9fafb;margin:0;">Create New User</h3>
                    <button @click="show = false" style="background:none;border:none;color:#94a3b8;cursor:pointer;">
                        <svg style="width:20px;height:20px;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                    </button>
                </div>

                <form wire:submit.prevent="createUser" style="display:flex;flex-direction:column;gap:16px;">
                    <div>
                        <label style="display:block;color:#94a3b8;font-size:0.75rem;font-weight:600;text-transform:uppercase;margin-bottom:8px;">Name *</label>
                        <input type="text" wire:model="name" class="input-dark">
                        @error('name')<p style="margin-top:5px;font-size:0.8rem;color:#fb7185;">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label style="display:block;color:#94a3b8;font-size:0.75rem;font-weight:600;text-transform:uppercase;margin-bottom:8px;">Email *</label>
                        <input type="email" wire:model="email" class="input-dark">
                        @error('email')<p style="margin-top:5px;font-size:0.8rem;color:#fb7185;">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label style="display:block;color:#94a3b8;font-size:0.75rem;font-weight:600;text-transform:uppercase;margin-bottom:8px;">Role *</label>
                        <select wire:model="role" class="select-dark">
                            <option value="staff" style="background:#040c18;">Staff</option>
                            <option value="manager" style="background:#040c18;">Manager</option>
                            <option value="admin" style="background:#040c18;">Admin</option>
                        </select>
                        @error('role')<p style="margin-top:5px;font-size:0.8rem;color:#fb7185;">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label style="display:block;color:#94a3b8;font-size:0.75rem;font-weight:600;text-transform:uppercase;margin-bottom:8px;">Password *</label>
                        <input type="password" wire:model="password" class="input-dark">
                        @error('password')<p style="margin-top:5px;font-size:0.8rem;color:#fb7185;">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label style="display:block;color:#94a3b8;font-size:0.75rem;font-weight:600;text-transform:uppercase;margin-bottom:8px;">Confirm Password *</label>
                        <input type="password" wire:model="password_confirmation" class="input-dark">
                    </div>
                    <div style="display:flex;justify-content:flex-end;gap:12px;margin-top:10px;">
                        <button type="button" @click="show = false" class="btn-secondary">Cancel</button>
                        <button type="submit" class="btn-primary">Create User</button>
                    </div>
                </form>
            </div>
        </div>
    @endif

    {{-- Edit User Modal --}}
    @if($showEditModal)
        <div class="fixed inset-0 z-50 flex items-center justify-center" style="background:rgba(0,0,0,0.85);" x-data="{ show: @entangle('showEditModal') }" x-show="show" x-cloak>
            <div class="card-dark" style="width:100%;max-width:450px;padding:24px;" @click.outside="show = false">
                <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:20px;padding-bottom:16px;border-bottom:1px solid rgba(255,255,255,0.06);">
                    <h3 style="font-size:1.1rem;font-weight:700;color:#f9fafb;margin:0;">Edit User</h3>
                    <button @click="show = false" style="background:none;border:none;color:#94a3b8;cursor:pointer;">
                        <svg style="width:20px;height:20px;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                    </button>
                </div>

                <form wire:submit.prevent="updateUser" style="display:flex;flex-direction:column;gap:16px;">
                    <div>
                        <label style="display:block;color:#94a3b8;font-size:0.75rem;font-weight:600;text-transform:uppercase;margin-bottom:8px;">Name *</label>
                        <input type="text" wire:model="name" class="input-dark">
                        @error('name')<p style="margin-top:5px;font-size:0.8rem;color:#fb7185;">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label style="display:block;color:#94a3b8;font-size:0.75rem;font-weight:600;text-transform:uppercase;margin-bottom:8px;">Email *</label>
                        <input type="email" wire:model="email" class="input-dark">
                        @error('email')<p style="margin-top:5px;font-size:0.8rem;color:#fb7185;">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label style="display:block;color:#94a3b8;font-size:0.75rem;font-weight:600;text-transform:uppercase;margin-bottom:8px;">Role *</label>
                        <select wire:model="role" class="select-dark">
                            <option value="staff" style="background:#040c18;">Staff</option>
                            <option value="manager" style="background:#040c18;">Manager</option>
                            <option value="admin" style="background:#040c18;">Admin</option>
                        </select>
                        @error('role')<p style="margin-top:5px;font-size:0.8rem;color:#fb7185;">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label style="display:block;color:#94a3b8;font-size:0.75rem;font-weight:600;text-transform:uppercase;margin-bottom:8px;">New Password (Optional)</label>
                        <input type="password" wire:model="password" class="input-dark">
                        @error('password')<p style="margin-top:5px;font-size:0.8rem;color:#fb7185;">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label style="display:block;color:#94a3b8;font-size:0.75rem;font-weight:600;text-transform:uppercase;margin-bottom:8px;">Confirm New Password</label>
                        <input type="password" wire:model="password_confirmation" class="input-dark">
                    </div>
                    <div style="display:flex;justify-content:flex-end;gap:12px;margin-top:10px;">
                        <button type="button" @click="show = false" class="btn-secondary">Cancel</button>
                        <button type="submit" class="btn-primary">Update User</button>
                    </div>
                </form>
            </div>
        </div>
    @endif
</div>