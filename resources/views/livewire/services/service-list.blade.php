<div class="w-full page-wrapper" style="font-family:'Plus Jakarta Sans', sans-serif;">

    {{-- ═══════════════════════════════════════════════════════════════ --}}
    {{-- PAGE HEADER                                                     --}}
    {{-- ═══════════════════════════════════════════════════════════════ --}}
    <div style="display:flex; align-items:center; justify-content:space-between; margin-bottom:2rem; flex-wrap:wrap; gap:1rem;">

        <div style="display:flex; align-items:center; gap:1rem;">
            {{-- Laundry Icon --}}
            <div style="width:52px; height:52px; border-radius:14px; background:linear-gradient(135deg,#0d9488,#0f766e); display:flex; align-items:center; justify-content:center; box-shadow:0 0 24px rgba(13,148,136,0.4); flex-shrink:0;">
                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M3 6a3 3 0 0 1 3-3h12a3 3 0 0 1 3 3v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2Z"/>
                    <circle cx="12" cy="13" r="4"/>
                    <path d="M6 6h.01M8 6h.01"/>
                </svg>
            </div>

            <div>
                <h1 style="font-size:1.65rem; font-weight:800; color:#f9fafb; margin:0; letter-spacing:-0.3px; line-height:1.2;">
                    Services
                </h1>
                <p style="color:#64748b; font-size:0.82rem; margin:0; margin-top:2px; letter-spacing:0.3px;">
                    Manage laundry service catalogue &amp; pricing
                </p>
            </div>
        </div>

        <button wire:click="openCreateModal"
                class="btn-primary"
                style="display:inline-flex; align-items:center; gap:0.5rem; padding:0.6rem 1.3rem; font-size:0.875rem; font-weight:600; border-radius:10px; white-space:nowrap;">
            <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M5 12h14M12 5v14"/>
            </svg>
            Add New Service
        </button>
    </div>

    {{-- ═══════════════════════════════════════════════════════════════ --}}
    {{-- FILTER CARD                                                     --}}
    {{-- ═══════════════════════════════════════════════════════════════ --}}
    <div style="background:rgba(255,255,255,0.03); border:1px solid rgba(255,255,255,0.07); border-radius:16px; padding:1.25rem 1.5rem; margin-bottom:1.75rem; backdrop-filter:blur(12px);">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 items-end">

            {{-- Search --}}
            <div>
                <label style="display:block; font-size:0.72rem; font-weight:600; color:#64748b; text-transform:uppercase; letter-spacing:0.6px; margin-bottom:0.45rem;">
                    Search Services
                </label>
                <div style="position:relative;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="#64748b" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                         style="position:absolute; left:11px; top:50%; transform:translateY(-50%); pointer-events:none;">
                        <circle cx="11" cy="11" r="8"/><path d="m21 21-4.35-4.35"/>
                    </svg>
                    <input type="text"
                           wire:model.live.debounce.300ms="search"
                           placeholder="Service name, category…"
                           class="input-dark"
                           style="width:100%; padding:0.6rem 0.875rem 0.6rem 2.25rem; font-size:0.875rem; border-radius:9px; box-sizing:border-box;">
                </div>
            </div>

            {{-- Category Filter --}}
            <div>
                <label style="display:block; font-size:0.72rem; font-weight:600; color:#64748b; text-transform:uppercase; letter-spacing:0.6px; margin-bottom:0.45rem;">
                    Category
                </label>
                <select wire:model.live="categoryFilter"
                        class="select-dark"
                        style="width:100%; padding:0.6rem 0.875rem; font-size:0.875rem; border-radius:9px; box-sizing:border-box;">
                    <option value="">All Categories</option>
                    @foreach($this->categories as $category)
                        <option value="{{ $category }}">{{ $category }}</option>
                    @endforeach
                </select>
            </div>

            {{-- Status Filter --}}
            <div>
                <label style="display:block; font-size:0.72rem; font-weight:600; color:#64748b; text-transform:uppercase; letter-spacing:0.6px; margin-bottom:0.45rem;">
                    Status
                </label>
                <select wire:model.live="statusFilter"
                        class="select-dark"
                        style="width:100%; padding:0.6rem 0.875rem; font-size:0.875rem; border-radius:9px; box-sizing:border-box;">
                    <option value="">All Status</option>
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                </select>
            </div>

            {{-- Clear Filters --}}
            <div>
                <button wire:click="clearFilters"
                        style="display:inline-flex; align-items:center; gap:0.45rem; padding:0.6rem 1.1rem; background:rgba(255,255,255,0.05); border:1px solid rgba(255,255,255,0.09); border-radius:9px; color:#9ca3af; font-size:0.82rem; font-weight:600; cursor:pointer; transition:all 0.2s; white-space:nowrap;"
                        onmouseover="this.style.background='rgba(255,255,255,0.09)'; this.style.color='#f9fafb';"
                        onmouseout="this.style.background='rgba(255,255,255,0.05)'; this.style.color='#9ca3af';">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M18 6 6 18M6 6l12 12"/>
                    </svg>
                    Clear
                </button>
            </div>
        </div>

        {{-- Result count --}}
        <div style="margin-top:0.85rem; padding-top:0.85rem; border-top:1px solid rgba(255,255,255,0.05); display:flex; align-items:center; gap:0.5rem;">
            <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="#0d9488" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                <rect width="8" height="4" x="8" y="2" rx="1" ry="1"/><path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"/>
            </svg>
            <span style="font-size:0.78rem; color:#64748b;">
                Showing <span style="color:#14b8a6; font-weight:700;">{{ $this->services->count() }}</span> service(s) on this page
            </span>
        </div>
    </div>

    {{-- ═══════════════════════════════════════════════════════════════ --}}
    {{-- SERVICES GRID                                                   --}}
    {{-- ═══════════════════════════════════════════════════════════════ --}}
    @if($this->services->count() > 0)

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">

            @foreach($this->services as $service)

                <div wire:key="service-{{ $service->id }}"
                     style="background:rgba(255,255,255,0.04); border:1px solid rgba(255,255,255,0.07); border-radius:18px; overflow:hidden; display:flex; flex-direction:column; transition:box-shadow 0.3s, border-color 0.3s; position:relative;"
                     onmouseover="this.style.boxShadow='0 0 30px rgba(13,148,136,0.12)'; this.style.borderColor='rgba(13,148,136,0.25)';"
                     onmouseout="this.style.boxShadow='none'; this.style.borderColor='rgba(255,255,255,0.07)';">

                    {{-- ── IMAGE / ICON AREA ──────────────────────────────── --}}
                    <div style="position:relative; height:160px; overflow:hidden; background:linear-gradient(135deg,#0a1628 0%,#0d1f35 50%,#091520 100%);">

                        @if($service->image_path)
                            <img src="{{ asset('storage/' . $service->image_path) }}"
                                 alt="{{ $service->name }}"
                                 style="width:100%; height:100%; object-fit:cover; display:block; opacity:0.9;">
                            <div style="position:absolute; inset:0; background:linear-gradient(to bottom, transparent 40%, rgba(4,12,24,0.6) 100%);"></div>
                        @else
                            {{-- Decorative bg rings --}}
                            <div style="position:absolute; inset:0; display:flex; align-items:center; justify-content:center;">
                                <div style="position:absolute; width:120px; height:120px; border-radius:50%; border:1px solid rgba(13,148,136,0.12); top:50%; left:50%; transform:translate(-50%,-50%);"></div>
                                <div style="position:absolute; width:90px; height:90px; border-radius:50%; border:1px solid rgba(13,148,136,0.18); top:50%; left:50%; transform:translate(-50%,-50%);"></div>

                                {{-- Wash machine SVG icon --}}
                                <div style="width:62px; height:62px; border-radius:14px; background:linear-gradient(135deg,rgba(13,148,136,0.22),rgba(15,118,110,0.14)); border:1px solid rgba(13,148,136,0.3); display:flex; align-items:center; justify-content:center; backdrop-filter:blur(8px); position:relative; z-index:1; box-shadow:0 0 20px rgba(13,148,136,0.2);">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="#14b8a6" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M3 6a3 3 0 0 1 3-3h12a3 3 0 0 1 3 3v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2Z"/>
                                        <circle cx="12" cy="13" r="4"/>
                                        <path d="M6 6h.01M8 6h.01"/>
                                        <circle cx="12" cy="13" r="1.5" fill="#14b8a6" stroke="none"/>
                                    </svg>
                                </div>
                            </div>

                            {{-- Subtle grid pattern overlay --}}
                            <div style="position:absolute; inset:0; opacity:0.04;"
                                 style="background-image: repeating-linear-gradient(0deg,rgba(255,255,255,0.5) 0px,rgba(255,255,255,0.5) 1px,transparent 1px,transparent 20px), repeating-linear-gradient(90deg,rgba(255,255,255,0.5) 0px,rgba(255,255,255,0.5) 1px,transparent 1px,transparent 20px);">
                            </div>
                        @endif

                        {{-- Status badge top-right --}}
                        <div style="position:absolute; top:10px; right:10px; z-index:2;">
                            @if($service->is_active)
                                <span style="display:inline-flex; align-items:center; gap:4px; padding:3px 10px; border-radius:20px; background:rgba(16,185,129,0.18); border:1px solid rgba(16,185,129,0.35); color:#10b981; font-size:0.7rem; font-weight:700; letter-spacing:0.5px; backdrop-filter:blur(8px);">
                                    <span style="width:5px; height:5px; border-radius:50%; background:#10b981; display:inline-block;"></span>
                                    ACTIVE
                                </span>
                            @else
                                <span style="display:inline-flex; align-items:center; gap:4px; padding:3px 10px; border-radius:20px; background:rgba(100,116,139,0.18); border:1px solid rgba(100,116,139,0.3); color:#64748b; font-size:0.7rem; font-weight:700; letter-spacing:0.5px; backdrop-filter:blur(8px);">
                                    <span style="width:5px; height:5px; border-radius:50%; background:#64748b; display:inline-block;"></span>
                                    INACTIVE
                                </span>
                            @endif
                        </div>
                    </div>

                    {{-- ── CARD BODY ──────────────────────────────────────── --}}
                    <div style="padding:1.1rem 1.2rem 0.9rem; flex:1; display:flex; flex-direction:column; gap:0.75rem;">

                        {{-- Name + Category --}}
                        <div>
                            <h3 style="font-size:1rem; font-weight:800; color:#f9fafb; margin:0 0 0.45rem 0; line-height:1.3; letter-spacing:-0.1px;">
                                {{ $service->name }}
                            </h3>
                            <div style="display:flex; align-items:center; flex-wrap:wrap; gap:0.4rem;">
                                @if($service->category)
                                    <span style="display:inline-flex; align-items:center; gap:4px; padding:2px 9px; border-radius:20px; background:rgba(13,148,136,0.14); border:1px solid rgba(13,148,136,0.28); color:#14b8a6; font-size:0.7rem; font-weight:700; letter-spacing:0.4px;">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="9" height="9" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
                                        {{ $service->category }}
                                    </span>
                                @endif
                                @if($service->size_variant)
                                    <span style="display:inline-block; padding:2px 8px; border-radius:20px; background:rgba(255,255,255,0.05); border:1px solid rgba(255,255,255,0.1); color:#9ca3af; font-size:0.68rem; font-weight:600; letter-spacing:0.3px;">
                                        {{ $service->size_variant }}
                                    </span>
                                @endif
                            </div>
                        </div>

                        {{-- Description --}}
                        @if($service->description)
                            <p style="font-size:0.78rem; color:#64748b; margin:0; line-height:1.55; display:-webkit-box; -webkit-line-clamp:2; -webkit-box-orient:vertical; overflow:hidden;">
                                {{ $service->description }}
                            </p>
                        @endif

                        {{-- Divider --}}
                        <div style="height:1px; background:linear-gradient(to right, rgba(13,148,136,0.2), transparent);"></div>

                        {{-- Pricing --}}
                        <div style="display:flex; flex-direction:column; gap:0.4rem;">

                            {{-- Wash & Iron --}}
                            @if($service->price_wash_iron !== null)
                                <div style="display:flex; align-items:center; justify-content:space-between;">
                                    <div style="display:flex; align-items:center; gap:0.45rem;">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="#9ca3af" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M3 6a3 3 0 0 1 3-3h12a3 3 0 0 1 3 3v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2Z"/><circle cx="12" cy="13" r="4"/>
                                        </svg>
                                        <span style="font-size:0.78rem; color:#9ca3af; font-weight:500;">Wash &amp; Iron</span>
                                    </div>
                                    <span style="font-size:0.875rem; color:#f9fafb; font-weight:700; letter-spacing:0.2px;">
                                        QAR {{ number_format($service->price_wash_iron, 2) }}
                                    </span>
                                </div>
                            @endif

                            {{-- Iron Only --}}
                            @if($service->price_iron_only !== null)
                                <div style="display:flex; align-items:center; justify-content:space-between;">
                                    <div style="display:flex; align-items:center; gap:0.45rem;">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="#9ca3af" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M6 12H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"/><path d="M6 8h12"/><path d="M6 12v8"/><path d="M18 12v8"/>
                                        </svg>
                                        <span style="font-size:0.78rem; color:#9ca3af; font-weight:500;">Iron Only</span>
                                    </div>
                                    <span style="font-size:0.875rem; color:#14b8a6; font-weight:700; letter-spacing:0.2px;">
                                        QAR {{ number_format($service->price_iron_only, 2) }}
                                    </span>
                                </div>
                            @endif
                        </div>

                        {{-- Divider --}}
                        <div style="height:1px; background:rgba(255,255,255,0.05);"></div>

                        {{-- ── ACTION ROW ────────────────────────────────── --}}
                        <div style="display:flex; align-items:center; justify-content:space-between; padding-top:0.1rem;">

                            {{-- Toggle Status --}}
                            @if($service->is_active)
                                <button wire:click="toggleStatus({{ $service->id }})"
                                        style="display:inline-flex; align-items:center; gap:5px; background:none; border:none; padding:0; font-size:0.75rem; font-weight:600; color:#f43f5e; cursor:pointer; transition:color 0.2s;"
                                        onmouseover="this.style.color='#fb7185';"
                                        onmouseout="this.style.color='#f43f5e';">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M18.36 6.64A9 9 0 1 1 5.64 5.64"/><path d="M12 2v10"/>
                                    </svg>
                                    Deactivate
                                </button>
                            @else
                                <button wire:click="toggleStatus({{ $service->id }})"
                                        style="display:inline-flex; align-items:center; gap:5px; background:none; border:none; padding:0; font-size:0.75rem; font-weight:600; color:#10b981; cursor:pointer; transition:color 0.2s;"
                                        onmouseover="this.style.color='#34d399';"
                                        onmouseout="this.style.color='#10b981';">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M18.36 6.64A9 9 0 1 1 5.64 5.64"/><path d="M12 2v10"/>
                                    </svg>
                                    Activate
                                </button>
                            @endif

                            {{-- Edit + Delete icons --}}
                            <div style="display:flex; align-items:center; gap:0.5rem;">

                                {{-- Edit --}}
                                <button wire:click="editService({{ $service->id }})"
                                        title="Edit service"
                                        style="width:32px; height:32px; border-radius:8px; background:rgba(13,148,136,0.12); border:1px solid rgba(13,148,136,0.22); color:#14b8a6; display:inline-flex; align-items:center; justify-content:center; cursor:pointer; transition:all 0.2s;"
                                        onmouseover="this.style.background='rgba(13,148,136,0.25)'; this.style.boxShadow='0 0 10px rgba(13,148,136,0.25)';"
                                        onmouseout="this.style.background='rgba(13,148,136,0.12)'; this.style.boxShadow='none';">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M17 3a2.85 2.83 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5Z"/><path d="m15 5 4 4"/>
                                    </svg>
                                </button>

                                {{-- Delete --}}
                                <button wire:click="deleteService({{ $service->id }})"
                                        wire:confirm="Are you sure you want to delete this service? This action cannot be undone."
                                        title="Delete service"
                                        style="width:32px; height:32px; border-radius:8px; background:rgba(244,63,94,0.1); border:1px solid rgba(244,63,94,0.2); color:#f43f5e; display:inline-flex; align-items:center; justify-content:center; cursor:pointer; transition:all 0.2s;"
                                        onmouseover="this.style.background='rgba(244,63,94,0.22)'; this.style.boxShadow='0 0 10px rgba(244,63,94,0.2)';"
                                        onmouseout="this.style.background='rgba(244,63,94,0.1)'; this.style.boxShadow='none';">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M3 6h18"/><path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"/><path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"/>
                                    </svg>
                                </button>
                            </div>
                        </div>

                    </div>
                    {{-- ── END CARD BODY ──────────────────────────────────── --}}

                </div>

            @endforeach

        </div>

        {{-- ═══════════════════════════════════════════════════════════════ --}}
        {{-- PAGINATION                                                     --}}
        {{-- ═══════════════════════════════════════════════════════════════ --}}
        <div style="display:flex; justify-content:center; margin-top:0.5rem;">
            <div style="background:rgba(255,255,255,0.03); border:1px solid rgba(255,255,255,0.07); border-radius:12px; padding:0.6rem 1rem; backdrop-filter:blur(8px);">
                {{ $this->services->links() }}
            </div>
        </div>

    @else

        {{-- ═══════════════════════════════════════════════════════════════ --}}
        {{-- EMPTY STATE                                                     --}}
        {{-- ═══════════════════════════════════════════════════════════════ --}}
        <div style="display:flex; flex-direction:column; align-items:center; justify-content:center; padding:5rem 2rem; text-align:center;">

            {{-- Icon ring --}}
            <div style="position:relative; margin-bottom:1.75rem;">
                <div style="width:90px; height:90px; border-radius:50%; background:rgba(13,148,136,0.07); border:1px solid rgba(13,148,136,0.15); display:flex; align-items:center; justify-content:center; box-shadow:0 0 40px rgba(13,148,136,0.08);">
                    <div style="width:64px; height:64px; border-radius:50%; background:rgba(13,148,136,0.12); border:1px solid rgba(13,148,136,0.2); display:flex; align-items:center; justify-content:center;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="#14b8a6" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M3 6a3 3 0 0 1 3-3h12a3 3 0 0 1 3 3v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2Z"/>
                            <circle cx="12" cy="13" r="4"/>
                            <path d="M6 6h.01M8 6h.01"/>
                        </svg>
                    </div>
                </div>
                {{-- Orbiting dot --}}
                <div style="position:absolute; top:-4px; right:-4px; width:18px; height:18px; border-radius:50%; background:#040c18; border:2px solid rgba(13,148,136,0.3); display:flex; align-items:center; justify-content:center;">
                    <div style="width:6px; height:6px; border-radius:50%; background:#0d9488; opacity:0.7;"></div>
                </div>
            </div>

            <h3 style="font-size:1.15rem; font-weight:800; color:#f9fafb; margin:0 0 0.5rem 0; letter-spacing:-0.2px;">
                No Services Found
            </h3>

            <p style="font-size:0.85rem; color:#64748b; margin:0 0 1.75rem 0; max-width:340px; line-height:1.6;">
                No services match your current filters. Try adjusting your search or clearing the filters to see all services.
            </p>

            <div style="display:flex; gap:0.75rem; flex-wrap:wrap; justify-content:center;">
                <button wire:click="clearFilters"
                        style="display:inline-flex; align-items:center; gap:0.45rem; padding:0.6rem 1.2rem; background:rgba(255,255,255,0.05); border:1px solid rgba(255,255,255,0.1); border-radius:9px; color:#9ca3af; font-size:0.82rem; font-weight:600; cursor:pointer; transition:all 0.2s;"
                        onmouseover="this.style.background='rgba(255,255,255,0.09)'; this.style.color='#f9fafb';"
                        onmouseout="this.style.background='rgba(255,255,255,0.05)'; this.style.color='#9ca3af';">
                    <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18M6 6l12 12"/></svg>
                    Clear Filters
                </button>

                <button wire:click="openCreateModal"
                        class="btn-primary"
                        style="display:inline-flex; align-items:center; gap:0.45rem; padding:0.6rem 1.2rem; font-size:0.82rem; font-weight:600; border-radius:9px;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5v14"/></svg>
                    Add First Service
                </button>
            </div>
        </div>

    @endif

    {{-- ═══════════════════════════════════════════════════════════════ --}}
    {{-- MODALS                                                          --}}
    {{-- ═══════════════════════════════════════════════════════════════ --}}
    @if($showCreateModal)
        @livewire('services.create-service')
    @endif

    @if($showEditModal && $editingServiceId)
        @livewire('services.edit-service', ['serviceId' => $editingServiceId])
    @endif

    {{-- ═══════════════════════════════════════════════════════════════════ --}}
    {{-- RESPONSIVE STYLES                                                   --}}
    {{-- ═══════════════════════════════════════════════════════════════════ --}}
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap');

    /* Livewire loading state */
    [wire\:loading] { opacity: 0.6; pointer-events: none; }

    /* Pagination dark styling overrides */
    nav[aria-label="Pagination"] span,
    nav[aria-label="Pagination"] a,
    nav[aria-label="Pagination"] button {
        background: rgba(255,255,255,0.04) !important;
        border-color: rgba(255,255,255,0.08) !important;
        color: #9ca3af !important;
        font-family: 'Plus Jakarta Sans', sans-serif !important;
        font-size: 0.8rem !important;
        border-radius: 7px !important;
    }
    nav[aria-label="Pagination"] a:hover,
    nav[aria-label="Pagination"] button:hover {
        background: rgba(13,148,136,0.15) !important;
        color: #14b8a6 !important;
        border-color: rgba(13,148,136,0.3) !important;
    }
    nav[aria-label="Pagination"] span[aria-current="page"] span {
        background: linear-gradient(135deg,#0d9488,#0f766e) !important;
        color: #ffffff !important;
        border-color: transparent !important;
    }
    nav[aria-label="Pagination"] svg {
        color: inherit !important;
    }
</style>
</div>