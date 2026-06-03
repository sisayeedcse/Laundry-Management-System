<div>
    @if ($showModal)
        <div class="fixed inset-0 z-50 flex items-center justify-center p-4" style="background:rgba(0,0,0,0.85);" x-data="{ show: @entangle('showModal') }" x-show="show" x-cloak>
            <div class="card-dark" style="width:100%;max-width:650px;padding:24px;" @click.outside="show = false">
                <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:20px;padding-bottom:16px;border-bottom:1px solid rgba(255,255,255,0.06);">
                    <div style="display:flex;align-items:center;gap:12px;">
                        <div style="width:40px;height:40px;border-radius:10px;background:linear-gradient(135deg,#0d9488,#0f766e);display:flex;align-items:center;justify-content:center;color:#fff;">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                        </div>
                        <div>
                            <h3 style="font-size:1.1rem;font-weight:700;color:#f9fafb;margin:0;">Create New Service</h3>
                            <p style="font-size:0.75rem;color:#64748b;margin:0;">Define a new laundry service</p>
                        </div>
                    </div>
                    <button @click="show = false" style="background:none;border:none;color:#94a3b8;cursor:pointer;">
                        <svg style="width:20px;height:20px;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                    </button>
                </div>

                <form wire:submit.prevent="create" style="display:flex;flex-direction:column;gap:16px;">
                    <div>
                        <label style="display:block;color:#94a3b8;font-size:0.75rem;font-weight:600;text-transform:uppercase;margin-bottom:8px;">Service Name *</label>
                        <input type="text" wire:model="name" class="input-dark" placeholder="e.g., Shirt, Pant, Thobe" required>
                        @error('name')<p style="margin-top:5px;font-size:0.8rem;color:#fb7185;">{{ $message }}</p>@enderror
                    </div>

                    <div>
                        <label style="display:block;color:#94a3b8;font-size:0.75rem;font-weight:600;text-transform:uppercase;margin-bottom:8px;">Category</label>
                        <input type="text" wire:model="category" class="input-dark" placeholder="e.g., Clothing, Traditional Wear, Bedding">
                        @error('category')<p style="margin-top:5px;font-size:0.8rem;color:#fb7185;">{{ $message }}</p>@enderror
                    </div>

                    <div style="display:grid;grid-template-columns:1fr 1fr;gap:16px;">
                        <div>
                            <label style="display:block;color:#94a3b8;font-size:0.75rem;font-weight:600;text-transform:uppercase;margin-bottom:8px;">Wash & Iron Price (QAR) *</label>
                            <input type="number" wire:model="price_wash_iron" step="0.01" min="0" class="input-dark" placeholder="0.00" required>
                            @error('price_wash_iron')<p style="margin-top:5px;font-size:0.8rem;color:#fb7185;">{{ $message }}</p>@enderror
                        </div>
                        <div>
                            <label style="display:block;color:#94a3b8;font-size:0.75rem;font-weight:600;text-transform:uppercase;margin-bottom:8px;">Iron Only Price (QAR)</label>
                            <input type="number" wire:model="price_iron_only" step="0.01" min="0" class="input-dark" placeholder="0.00 (Optional)">
                            @error('price_iron_only')<p style="margin-top:5px;font-size:0.8rem;color:#fb7185;">{{ $message }}</p>@enderror
                        </div>
                    </div>

                    <div>
                        <label style="display:block;color:#94a3b8;font-size:0.75rem;font-weight:600;text-transform:uppercase;margin-bottom:8px;">Size Variant</label>
                        <input type="text" wire:model="size_variant" class="input-dark" placeholder="e.g., Small, Medium, Large">
                        @error('size_variant')<p style="margin-top:5px;font-size:0.8rem;color:#fb7185;">{{ $message }}</p>@enderror
                    </div>

                    <div>
                        <label style="display:block;color:#94a3b8;font-size:0.75rem;font-weight:600;text-transform:uppercase;margin-bottom:8px;">Description</label>
                        <textarea wire:model="description" rows="3" class="input-dark" placeholder="Optional service description..." style="resize:vertical;"></textarea>
                        @error('description')<p style="margin-top:5px;font-size:0.8rem;color:#fb7185;">{{ $message }}</p>@enderror
                    </div>

                    <div>
                        <label style="display:block;color:#94a3b8;font-size:0.75rem;font-weight:600;text-transform:uppercase;margin-bottom:8px;">Service Image</label>
                        
                        <label style="display:flex;flex-direction:column;align-items:center;justify-content:center;height:120px;border:2px dashed rgba(255,255,255,0.1);border-radius:12px;background:rgba(255,255,255,0.02);cursor:pointer;transition:0.2s;" onmouseover="this.style.borderColor='#0d9488';this.style.background='rgba(13,148,136,0.05)'" onmouseout="this.style.borderColor='rgba(255,255,255,0.1)';this.style.background='rgba(255,255,255,0.02)'">
                            <svg style="width:32px;height:32px;color:#0d9488;margin-bottom:8px;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/></svg>
                            <span style="color:#0d9488;font-size:0.85rem;font-weight:600;">Click to upload image</span>
                            <span style="color:#64748b;font-size:0.7rem;margin-top:4px;">PNG, JPG — Max 2MB</span>
                            <input type="file" wire:model="image" class="hidden" accept="image/png,image/jpeg,image/jpg">
                        </label>
                        @error('image')<p style="margin-top:5px;font-size:0.8rem;color:#fb7185;">{{ $message }}</p>@enderror

                        @if ($imagePreview)
                            <div style="margin-top:12px;">
                                <img src="{{ $imagePreview }}" alt="Preview" style="height:100px;width:100px;object-fit:cover;border-radius:10px;border:2px solid #0d9488;">
                            </div>
                        @endif
                    </div>

                    <div style="display:flex;justify-content:flex-end;gap:12px;margin-top:10px;">
                        <button type="button" @click="show = false" class="btn-secondary">Cancel</button>
                        <button type="submit" class="btn-primary">Create Service</button>
                    </div>
                </form>
            </div>
        </div>
    @endif
</div>