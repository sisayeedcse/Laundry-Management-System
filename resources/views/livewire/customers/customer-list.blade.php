<div class="w-full" style="font-family: 'Plus Jakarta Sans', sans-serif;">

    {{-- ===================== FLASH MESSAGES ===================== --}}
    @if (session()->has('message'))
        <div class="alert-success" style="
            display: flex; align-items: center; gap: 12px;
            margin: 0 0 20px 0; padding: 14px 20px;
            background: linear-gradient(135deg, rgba(16,185,129,0.15), rgba(16,185,129,0.08));
            border: 1px solid rgba(16,185,129,0.35); border-radius: 14px;
            color: #6ee7b7; font-size: 0.875rem; font-weight: 500;">
            <svg style="width:20px;height:20px;flex-shrink:0;color:#10b981;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
            <span>{{ session('message') }}</span>
        </div>
    @endif

    @if (session()->has('error'))
        <div class="alert-error" style="
            display: flex; align-items: center; gap: 12px;
            margin: 0 0 20px 0; padding: 14px 20px;
            background: linear-gradient(135deg, rgba(244,63,94,0.15), rgba(244,63,94,0.08));
            border: 1px solid rgba(244,63,94,0.35); border-radius: 14px;
            color: #fda4af; font-size: 0.875rem; font-weight: 500;">
            <svg style="width:20px;height:20px;flex-shrink:0;color:#f43f5e;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
            <span>{{ session('error') }}</span>
        </div>
    @endif

    {{-- ===================== PAGE HEADER ===================== --}}
    <div style="
        display: flex; align-items: center; justify-content: space-between;
        flex-wrap: wrap; gap: 16px;
        margin-bottom: 32px;">

        {{-- Title Block --}}
        <div style="display: flex; align-items: center; gap: 16px;">
            {{-- Icon Badge --}}
            <div style="
                width: 52px; height: 52px; border-radius: 16px;
                background: linear-gradient(135deg, #0d9488, #0891b2);
                display: flex; align-items: center; justify-content: center;
                box-shadow: 0 0 24px rgba(13,148,136,0.45);
                flex-shrink: 0;">
                <svg style="width:26px;height:26px;color:#fff;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                          d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>
                </svg>
            </div>

            <div>
                <h1 style="
                    font-size: 1.75rem; font-weight: 700; margin: 0;
                    color: #f9fafb; letter-spacing: -0.02em; line-height: 1.2;">
                    Customers
                </h1>
                <p style="margin: 2px 0 0 0; color: #64748b; font-size: 0.83rem; font-weight: 400;">
                    Manage your customer base &amp; loyalty
                </p>
            </div>
        </div>

        {{-- Metrics + Add Button --}}
        <div style="display: flex; align-items: center; gap: 12px; flex-wrap: wrap;">

            {{-- Total Count Chip --}}
            <div style="
                display: flex; align-items: center; gap: 8px;
                padding: 8px 16px; border-radius: 50px;
                background: rgba(255,255,255,0.04);
                border: 1px solid rgba(255,255,255,0.08);
                color: #9ca3af; font-size: 0.82rem; font-weight: 500;">
                <span style="
                    width: 8px; height: 8px; border-radius: 50%;
                    background: #0d9488;
                    box-shadow: 0 0 8px rgba(13,148,136,0.7);
                    display: inline-block;"></span>
                {{ $this->customers->total() }} Total Customers
            </div>

            {{-- Add New Customer Button --}}
            <button
                wire:click="openCreateModal"
                class="btn-primary"
                style="
                    display: inline-flex; align-items: center; gap: 8px;
                    padding: 10px 22px; border-radius: 12px;
                    background: linear-gradient(135deg, #0d9488, #0891b2);
                    color: #fff; font-size: 0.875rem; font-weight: 600;
                    border: none; cursor: pointer;
                    box-shadow: 0 4px 20px rgba(13,148,136,0.4);
                    transition: all 0.2s ease;
                    white-space: nowrap;"
                onmouseover="this.style.boxShadow='0 6px 28px rgba(13,148,136,0.6)'; this.style.transform='translateY(-1px)'"
                onmouseout="this.style.boxShadow='0 4px 20px rgba(13,148,136,0.4)'; this.style.transform='translateY(0)'">
                <svg style="width:18px;height:18px;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                </svg>
                Add New Customer
            </button>
        </div>
    </div>

    {{-- ===================== SEARCH & FILTER BAR ===================== --}}
    <div style="
        background: rgba(255,255,255,0.03);
        border: 1px solid rgba(255,255,255,0.07);
        border-radius: 20px; padding: 20px 24px;
        margin-bottom: 24px;
        backdrop-filter: blur(12px);
        -webkit-backdrop-filter: blur(12px);
        box-shadow: 0 4px 32px rgba(0,0,0,0.25);">

        <div style="display: flex; align-items: center; gap: 16px; flex-wrap: wrap;">

            {{-- Search Input --}}
            <div style="flex: 1; min-width: 260px; position: relative;">
                <div style="
                    position: absolute; left: 14px; top: 50%; transform: translateY(-50%);
                    color: #4b5563; pointer-events: none;">
                    <svg style="width:17px;height:17px;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                </div>
                <input
                    wire:model.live.debounce.300ms="search"
                    type="text"
                    placeholder="Search by name, phone, or address…"
                    class="input-dark"
                    style="
                        width: 100%; padding: 11px 14px 11px 42px;
                        background: rgba(255,255,255,0.05);
                        border: 1px solid rgba(255,255,255,0.09);
                        border-radius: 12px; color: #f9fafb;
                        font-size: 0.875rem; font-family: inherit;
                        outline: none; transition: border-color 0.2s, box-shadow 0.2s;
                        box-sizing: border-box;"
                    onfocus="this.style.borderColor='rgba(13,148,136,0.6)'; this.style.boxShadow='0 0 0 3px rgba(13,148,136,0.12)'"
                    onblur="this.style.borderColor='rgba(255,255,255,0.09)'; this.style.boxShadow='none'"/>
            </div>

            {{-- Divider --}}
            <div style="width:1px; height:36px; background: rgba(255,255,255,0.07); flex-shrink:0;"></div>

            {{-- Status Filter --}}
            <div style="position: relative; min-width: 180px;">
                <div style="
                    position: absolute; left: 14px; top: 50%; transform: translateY(-50%);
                    color: #4b5563; pointer-events: none; z-index: 1;">
                    <svg style="width:15px;height:15px;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2a1 1 0 01-.293.707L13 13.414V19a1 1 0 01-.553.894l-4 2A1 1 0 017 21v-7.586L3.293 6.707A1 1 0 013 6V4z"/>
                    </svg>
                </div>
                <select
                    wire:model.live="statusFilter"
                    class="select-dark"
                    style="
                        width: 100%; padding: 11px 36px 11px 38px;
                        background: rgba(255,255,255,0.05);
                        border: 1px solid rgba(255,255,255,0.09);
                        border-radius: 12px; color: #f9fafb;
                        font-size: 0.875rem; font-family: inherit;
                        outline: none; appearance: none;
                        cursor: pointer; transition: border-color 0.2s;
                        box-sizing: border-box;"
                    onfocus="this.style.borderColor='rgba(13,148,136,0.6)'"
                    onblur="this.style.borderColor='rgba(255,255,255,0.09)'">
                    <option value="" style="background:#0f172a;">All Status</option>
                    <option value="1" style="background:#0f172a;">Active</option>
                    <option value="0" style="background:#0f172a;">Inactive</option>
                </select>
                <div style="
                    position: absolute; right: 12px; top: 50%; transform: translateY(-50%);
                    color: #4b5563; pointer-events: none;">
                    <svg style="width:14px;height:14px;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </div>
            </div>

            {{-- Legend chips --}}
            <div style="display: flex; align-items: center; gap: 8px; margin-left: auto;">
                <span style="
                    display: inline-flex; align-items: center; gap: 6px;
                    padding: 5px 12px; border-radius: 50px; font-size: 0.75rem;
                    background: rgba(13,148,136,0.12); border: 1px solid rgba(13,148,136,0.25);
                    color: #2dd4bf; font-weight: 500;">
                    <span style="width:6px;height:6px;border-radius:50%;background:#10b981;display:inline-block;"></span>
                    Active
                </span>
                <span style="
                    display: inline-flex; align-items: center; gap: 6px;
                    padding: 5px 12px; border-radius: 50px; font-size: 0.75rem;
                    background: rgba(100,116,139,0.12); border: 1px solid rgba(100,116,139,0.25);
                    color: #94a3b8; font-weight: 500;">
                    <span style="width:6px;height:6px;border-radius:50%;background:#64748b;display:inline-block;"></span>
                    Inactive
                </span>
                <span style="
                    display: inline-flex; align-items: center; gap: 6px;
                    padding: 5px 12px; border-radius: 50px; font-size: 0.75rem;
                    background: rgba(245,158,11,0.12); border: 1px solid rgba(245,158,11,0.25);
                    color: #fbbf24; font-weight: 500;">
                    ★ Regular
                </span>
            </div>
        </div>
    </div>

    {{-- ===================== CUSTOMER CARDS GRID ===================== --}}
    @if ($this->customers->count() > 0)

        <div style="display: flex; flex-direction: column; gap: 12px; margin-bottom: 28px;">

            @foreach ($this->customers as $customer)
                <div
                    wire:key="customer-{{ $customer->id }}"
                    style="
                        background: rgba(255,255,255,0.03);
                        border: 1px solid rgba(255,255,255,0.06);
                        border-radius: 18px; padding: 18px 22px;
                        display: flex; align-items: center; gap: 18px;
                        flex-wrap: wrap;
                        transition: all 0.25s ease;
                        position: relative; overflow: hidden;
                        cursor: default;"
                    onmouseover="
                        this.style.background='rgba(13,148,136,0.07)';
                        this.style.borderColor='rgba(13,148,136,0.3)';
                        this.style.boxShadow='0 0 32px rgba(13,148,136,0.12), 0 4px 20px rgba(0,0,0,0.3)';
                        this.style.transform='translateY(-1px)'"
                    onmouseout="
                        this.style.background='rgba(255,255,255,0.03)';
                        this.style.borderColor='rgba(255,255,255,0.06)';
                        this.style.boxShadow='none';
                        this.style.transform='translateY(0)'">

                    {{-- Decorative left accent bar --}}
                    <div style="
                        position: absolute; left: 0; top: 0; bottom: 0; width: 3px;
                        background: {{ $customer->is_active ? 'linear-gradient(180deg, #0d9488, #06b6d4)' : 'linear-gradient(180deg, #374151, #1f2937)' }};
                        border-radius: 3px 0 0 3px;">
                    </div>

                    {{-- Customer Number --}}
                    <div style="
                        font-size: 0.72rem; font-weight: 600; color: #4b5563;
                        letter-spacing: 0.05em; min-width: 36px; text-align: center;
                        padding-left: 8px;">
                        #{{ $customer->customer_order_number ?? str_pad($loop->iteration, 3, '0', STR_PAD_LEFT) }}
                    </div>

                    {{-- Avatar Circle --}}
                    <div style="position: relative; flex-shrink: 0;">
                        <div style="
                            width: 48px; height: 48px; border-radius: 14px;
                            background: linear-gradient(135deg, #0d9488 0%, #0891b2 100%);
                            display: flex; align-items: center; justify-content: center;
                            font-size: 1.1rem; font-weight: 700; color: #fff;
                            letter-spacing: -0.02em;
                            box-shadow: 0 4px 16px rgba(13,148,136,0.35);
                            position: relative;">
                            {{ strtoupper(substr($customer->name, 0, 1)) }}{{ strtoupper(substr(strstr($customer->name, ' ') ?: ' x', 1, 1)) }}

                            {{-- Regular Star Badge --}}
                            @if ($customer->isRegular)
                                <div style="
                                    position: absolute; top: -6px; right: -6px;
                                    width: 18px; height: 18px; border-radius: 50%;
                                    background: linear-gradient(135deg, #f59e0b, #d97706);
                                    display: flex; align-items: center; justify-content: center;
                                    border: 2px solid #040c18;
                                    box-shadow: 0 2px 8px rgba(245,158,11,0.5);
                                    font-size: 9px; color: #fff; line-height: 1;">
                                    ★
                                </div>
                            @endif
                        </div>
                    </div>

                    {{-- Name + Regular Label --}}
                    <div style="flex: 1; min-width: 160px;">
                        <div style="display: flex; align-items: center; gap: 8px; flex-wrap: wrap;">
                            <span style="
                                font-size: 0.975rem; font-weight: 650; color: #f9fafb;
                                letter-spacing: -0.01em; line-height: 1.3;">
                                {{ $customer->name }}
                            </span>

                            @if ($customer->isRegular)
                                <span style="
                                    display: inline-flex; align-items: center; gap: 4px;
                                    padding: 2px 9px; border-radius: 50px;
                                    background: rgba(245,158,11,0.14);
                                    border: 1px solid rgba(245,158,11,0.3);
                                    color: #fbbf24; font-size: 0.68rem; font-weight: 700;
                                    letter-spacing: 0.04em; text-transform: uppercase;">
                                    ★ Regular
                                </span>
                            @endif

                            {{-- Status Badge --}}
                            @if ($customer->is_active)
                                <span class="badge badge-active" style="
                                    display: inline-flex; align-items: center; gap: 4px;
                                    padding: 2px 9px; border-radius: 50px;
                                    background: rgba(13,148,136,0.14);
                                    border: 1px solid rgba(13,148,136,0.3);
                                    color: #2dd4bf; font-size: 0.68rem; font-weight: 600;
                                    text-transform: uppercase; letter-spacing: 0.04em;">
                                    <span style="width:5px;height:5px;border-radius:50%;background:#10b981;display:inline-block;"></span>
                                    Active
                                </span>
                            @else
                                <span class="badge" style="
                                    display: inline-flex; align-items: center; gap: 4px;
                                    padding: 2px 9px; border-radius: 50px;
                                    background: rgba(100,116,139,0.12);
                                    border: 1px solid rgba(100,116,139,0.25);
                                    color: #94a3b8; font-size: 0.68rem; font-weight: 600;
                                    text-transform: uppercase; letter-spacing: 0.04em;">
                                    <span style="width:5px;height:5px;border-radius:50%;background:#475569;display:inline-block;"></span>
                                    Inactive
                                </span>
                            @endif
                        </div>

                        {{-- Contact Info Row --}}
                        <div style="display: flex; align-items: center; gap: 16px; margin-top: 5px; flex-wrap: wrap;">
                            @if ($customer->phone)
                                <span style="
                                    display: inline-flex; align-items: center; gap: 5px;
                                    color: #64748b; font-size: 0.8rem;">
                                    <svg style="width:13px;height:13px;color:#0d9488;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                    </svg>
                                    {{ $customer->phone }}
                                </span>
                            @endif

                            @if ($customer->address)
                                <span style="
                                    display: inline-flex; align-items: center; gap: 5px;
                                    color: #64748b; font-size: 0.8rem;
                                    max-width: 280px; white-space: nowrap;
                                    overflow: hidden; text-overflow: ellipsis;">
                                    <svg style="width:13px;height:13px;color:#0d9488;flex-shrink:0;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    </svg>
                                    {{ Str::limit($customer->address, 40) }}
                                </span>
                            @endif
                        </div>
                    </div>

                    {{-- Orders Stats --}}
                    <div style="
                        display: flex; align-items: center; gap: 6px;
                        padding: 10px 16px;
                        background: rgba(255,255,255,0.03);
                        border: 1px solid rgba(255,255,255,0.06);
                        border-radius: 12px; min-width: 110px; text-align: center;
                        flex-direction: column;">
                        <div style="
                            font-size: 1.4rem; font-weight: 700; color: #f9fafb;
                            line-height: 1; letter-spacing: -0.02em;">
                            {{ $customer->total_orders ?? 0 }}
                        </div>
                        <div style="font-size: 0.7rem; color: #4b5563; font-weight: 500; text-transform: uppercase; letter-spacing: 0.05em;">
                            Orders
                        </div>
                    </div>

                    {{-- Action Buttons --}}
                    <div style="display: flex; align-items: center; gap: 8px; flex-shrink: 0;">

                        {{-- View Button --}}
                        <button
                            wire:click="viewCustomer({{ $customer->id }})"
                            title="View Customer Details"
                            style="
                                display: inline-flex; align-items: center; gap: 6px;
                                padding: 8px 16px; border-radius: 10px;
                                background: rgba(13,148,136,0.14);
                                border: 1px solid rgba(13,148,136,0.28);
                                color: #2dd4bf; font-size: 0.8rem; font-weight: 600;
                                cursor: pointer; transition: all 0.2s ease;
                                font-family: inherit;"
                            onmouseover="this.style.background='rgba(13,148,136,0.28)'; this.style.boxShadow='0 0 14px rgba(13,148,136,0.3)'"
                            onmouseout="this.style.background='rgba(13,148,136,0.14)'; this.style.boxShadow='none'">
                            <svg style="width:15px;height:15px;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                            </svg>
                            View
                        </button>

                        {{-- Toggle Status Button --}}
                        <button
                            wire:click="toggleStatus({{ $customer->id }})"
                            title="{{ $customer->is_active ? 'Deactivate Customer' : 'Activate Customer' }}"
                            style="
                                width: 36px; height: 36px; border-radius: 10px;
                                display: inline-flex; align-items: center; justify-content: center;
                                background: rgba(245,158,11,0.12);
                                border: 1px solid rgba(245,158,11,0.25);
                                color: #fbbf24; cursor: pointer; transition: all 0.2s ease;"
                            onmouseover="this.style.background='rgba(245,158,11,0.25)'; this.style.boxShadow='0 0 12px rgba(245,158,11,0.3)'"
                            onmouseout="this.style.background='rgba(245,158,11,0.12)'; this.style.boxShadow='none'">
                            @if ($customer->is_active)
                                <svg style="width:16px;height:16px;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636"/>
                                </svg>
                            @else
                                <svg style="width:16px;height:16px;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            @endif
                        </button>

                        {{-- Delete Button --}}
                        <button
                            wire:click="deleteCustomer({{ $customer->id }})"
                            wire:confirm="Are you sure you want to delete this customer? This action cannot be undone."
                            title="Delete Customer"
                            style="
                                width: 36px; height: 36px; border-radius: 10px;
                                display: inline-flex; align-items: center; justify-content: center;
                                background: rgba(244,63,94,0.12);
                                border: 1px solid rgba(244,63,94,0.25);
                                color: #fb7185; cursor: pointer; transition: all 0.2s ease;"
                            onmouseover="this.style.background='rgba(244,63,94,0.25)'; this.style.boxShadow='0 0 12px rgba(244,63,94,0.3)'"
                            onmouseout="this.style.background='rgba(244,63,94,0.12)'; this.style.boxShadow='none'">
                            <svg style="width:16px;height:16px;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                            </svg>
                        </button>
                    </div>

                </div>
            @endforeach
        </div>

        {{-- ===================== PAGINATION ===================== --}}
        @if ($this->customers->hasPages())
            <div style="
                padding: 16px 20px;
                background: rgba(255,255,255,0.02);
                border: 1px solid rgba(255,255,255,0.06);
                border-radius: 16px;
                display: flex; justify-content: center;">
                <div style="color: #64748b;">
                    {{ $this->customers->links() }}
                </div>
            </div>
        @endif

    @else
        {{-- ===================== EMPTY STATE ===================== --}}
        <div style="
            display: flex; flex-direction: column; align-items: center; justify-content: center;
            padding: 80px 40px;
            background: rgba(255,255,255,0.02);
            border: 1px dashed rgba(255,255,255,0.08);
            border-radius: 24px; text-align: center;">

            {{-- Glowing Icon --}}
            <div style="
                width: 90px; height: 90px; border-radius: 24px;
                background: linear-gradient(135deg, rgba(13,148,136,0.15), rgba(8,145,178,0.15));
                border: 1px solid rgba(13,148,136,0.2);
                display: flex; align-items: center; justify-content: center;
                margin-bottom: 24px;
                box-shadow: 0 0 48px rgba(13,148,136,0.12);">
                <svg style="width:42px;height:42px;color:#0d9488;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.3"
                          d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>
                </svg>
            </div>

            <h3 style="
                font-size: 1.25rem; font-weight: 700; color: #f9fafb;
                margin: 0 0 10px 0; letter-spacing: -0.01em;">
                No Customers Found
            </h3>
            <p style="
                color: #4b5563; font-size: 0.875rem; margin: 0 0 28px 0;
                max-width: 340px; line-height: 1.6;">
                No customers match your current search or filter criteria. Try adjusting your filters or add a new customer to get started.
            </p>

            <button
                wire:click="openCreateModal"
                style="
                    display: inline-flex; align-items: center; gap: 8px;
                    padding: 11px 24px; border-radius: 12px;
                    background: linear-gradient(135deg, #0d9488, #0891b2);
                    color: #fff; font-size: 0.875rem; font-weight: 600;
                    border: none; cursor: pointer;
                    box-shadow: 0 4px 20px rgba(13,148,136,0.35);
                    font-family: inherit; transition: all 0.2s ease;"
                onmouseover="this.style.boxShadow='0 6px 28px rgba(13,148,136,0.55)'; this.style.transform='translateY(-1px)'"
                onmouseout="this.style.boxShadow='0 4px 20px rgba(13,148,136,0.35)'; this.style.transform='translateY(0)'">
                <svg style="width:17px;height:17px;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                </svg>
                Add First Customer
            </button>
        </div>
    @endif

    {{-- ===================== CREATE CUSTOMER MODAL ===================== --}}
    @if($showCreateModal)
        <div style="
            position: fixed; inset: 0; z-index: 50;
            background: rgba(0,0,0,0.82);
            backdrop-filter: blur(6px);
            -webkit-backdrop-filter: blur(6px);
            display: flex; align-items: center; justify-content: center;
            padding: 20px;">
            <div style="
                background: #0b1628;
                border: 1px solid rgba(255,255,255,0.08);
                border-radius: 24px;
                width: 100%; max-width: 640px;
                max-height: 90vh; overflow-y: auto;
                box-shadow: 0 25px 80px rgba(0,0,0,0.7), 0 0 0 1px rgba(13,148,136,0.08);
                position: relative;">
                {{-- Modal top accent --}}
                <div style="
                    height: 3px; border-radius: 24px 24px 0 0;
                    background: linear-gradient(90deg, #0d9488, #0891b2, #0d9488);
                    background-size: 200% 100%;"></div>
                @livewire('customers.create-customer')
            </div>
        </div>
    @endif

    {{-- ===================== CUSTOMER DETAILS MODAL ===================== --}}
    @if($showDetailsModal && $selectedCustomerId > 0)
        <div style="
            position: fixed; inset: 0; z-index: 50;
            background: rgba(0,0,0,0.82);
            backdrop-filter: blur(6px);
            -webkit-backdrop-filter: blur(6px);
            display: flex; align-items: center; justify-content: center;
            padding: 20px;">
            <div style="
                background: #0b1628;
                border: 1px solid rgba(255,255,255,0.08);
                border-radius: 24px;
                width: 100%; max-width: 720px;
                max-height: 90vh; overflow-y: auto;
                box-shadow: 0 25px 80px rgba(0,0,0,0.7), 0 0 0 1px rgba(13,148,136,0.08);
                position: relative;">
                {{-- Modal top accent --}}
                <div style="
                    height: 3px; border-radius: 24px 24px 0 0;
                    background: linear-gradient(90deg, #0d9488, #06b6d4, #0d9488);
                    background-size: 200% 100%;"></div>
                @livewire('customers.customer-details', ['customerId' => $selectedCustomerId])
            </div>
        </div>
    @endif

    {{-- ===================== EDIT CUSTOMER (Always Mounted) ===================== --}}
    @livewire('customers.edit-customer')

</div>