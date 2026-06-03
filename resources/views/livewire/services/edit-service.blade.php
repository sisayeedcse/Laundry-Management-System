<div>
    @if ($showModal)
        <div class="fixed inset-0 z-50 flex items-center justify-center p-4" style="background:rgba(0,0,0,0.85);" x-data="{ show: @entangle('showModal') }" x-show="show" x-cloak>
            <div class="card-dark" style="width:100%;max-width:650px;padding:24px;" @click.outside="show = false">
                <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:20px;padding-bottom:16px;border-bottom:1px solid rgba(255,255,255,0.06);">
                    <div style="display:flex;align-items:center;gap:12px;">
                        <div style="width:40px;height:40px;border-radius:10px;background:linear-gradient(135deg,#f59e0b,#d97706);display:flex;align-items:center;justify-content:center;color:#fff;">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                        </div>
                        <div>
                            <h3 style="font-size:1.1rem;font-weight:700;color:#f9fafb;margin:0;">Edit Service</h3>
                            <p style="font-size:0.75rem;color:#64748b;margin:0;">Modify laundry service details</p>
                        </div>
                    </div>
                    <button @click="show = false" style="background:none;border:none;color:#94a3b8;cursor:pointer;">
                        <svg style="width:20px;height:20px;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                    </button>
                </div>

                <form wire:submit.prevent="update" style="display:flex;flex-direction:column;gap:16px;">
                    <div>
                        <label style="display:block;color:#94a3b8;font-size:0.75rem;font-weight:600;text-transform:uppercase;margin-bottom:8px;">Service Name *</label>
                        <input type="text" wire:model="name" class="input-dark" placeholder="e.g., Shirt Wash" required>
                        @error('name')<p style="margin-top:5px;font-size:0.8rem;color:#fb7185;">{{ $message }}</p>@enderror
                    </div>

                    <div>
                        <label style="display:block;color:#94a3b8;font-size:0.75rem;font-weight:600;text-transform:uppercase;margin-bottom:8px;">Category</label>
                        <input type="text" wire:model="category" class="input-dark" placeholder="e.g., Clothing, Bedding">
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
                        <input type="text" wire:model="size_variant" class="input-dark" placeholder="e.g., Small, Medium, Large, Big">
                        @error('size_variant')<p style="margin-top:5px;font-size:0.8rem;color:#fb7185;">{{ $message }}</p>@enderror
                    </div>

                    <div>
                        <label style="display:block;color:#94a3b8;font-size:0.75rem;font-weight:600;text-transform:uppercase;margin-bottom:8px;">Description</label>
                        <textarea wire:model="description" rows="3" class="input-dark" placeholder="Optional service description..." style="resize:vertical;"></textarea>
                        @error('description')<p style="margin-top:5px;font-size:0.8rem;color:#fb7185;">{{ $message }}</p>@enderror
                    </div>

                    <div>
                        <label style="display:block;color:#94a3b8;font-size:0.75rem;font-weight:600;text-transform:uppercase;margin-bottom:8px;">Service Image</label>
                        
                        <div style="display:flex;gap:16px;">
                            {{-- Image Display Area --}}
                            @if($currentImage && !$removeImage && !$imagePreview)
                                <div style="position:relative;">
                                    <img src="{{ asset('storage/' . $currentImage) }}" alt="Current Image" style="height:100px;width:100px;object-fit:cover;border-radius:10px;border:2px solid rgba(255,255,255,0.1);">
                                    <button type="button" wire:click="removeCurrentImage" style="position:absolute;top:-8px;right:-8px;background:#f43f5e;color:#fff;border:none;border-radius:50%;width:24px;height:24px;display:flex;align-items:center;justify-content:center;cursor:pointer;">
                                        <svg style="width:14px;height:14px;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                                    </button>
                                </div>
                            @endif

                            @if($imagePreview)
                                <div style="position:relative;">
                                    <img src="{{ $imagePreview }}" alt="New Image Preview" style="height:100px;width:100px;object-fit:cover;border-radius:10px;border:2px solid #0d9488;">
                                    <button type="button" wire:click="$set('image', null); $set('imagePreview', null)" style="position:absolute;top:-8px;right:-8px;background:#f43f5e;color:#fff;border:none;border-radius:50%;width:24px;height:24px;display:flex;align-items:center;justify-content:center;cursor:pointer;">
                                        <svg style="width:14px;height:14px;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                                    </button>
                                </div>
                            @endif

                            <label style="flex:1;display:flex;flex-direction:column;align-items:center;justify-content:center;height:100px;border:2px dashed rgba(255,255,255,0.1);border-radius:12px;background:rgba(255,255,255,0.02);cursor:pointer;transition:0.2s;" onmouseover="this.style.borderColor='#0d9488';this.style.background='rgba(13,148,136,0.05)'" onmouseout="this.style.borderColor='rgba(255,255,255,0.1)';this.style.background='rgba(255,255,255,0.02)'">
                                <svg style="width:28px;height:28px;color:#0d9488;margin-bottom:8px;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/></svg>
                                <span style="color:#0d9488;font-size:0.8rem;font-weight:600;">Upload new image</span>
                                <input type="file" wire:model="image" class="hidden" accept="image/png,image/jpeg,image/jpg">
                            </label>
                        </div>
                        @error('image')<p style="margin-top:5px;font-size:0.8rem;color:#fb7185;">{{ $message }}</p>@enderror
                        <div wire:loading wire:target="image" style="color:#0d9488;font-size:0.8rem;margin-top:5px;">Uploading image...</div>
                    </div>

                    <div style="display:flex;justify-content:flex-end;gap:12px;margin-top:10px;">
                        <button type="button" @click="show = false" class="btn-secondary">Cancel</button>
                        <button type="submit" class="btn-primary" wire:loading.attr="disabled">
                            <span wire:loading.remove wire:target="update">Update Service</span>
                            <span wire:loading wire:target="update">Updating...</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    @endif
</div>