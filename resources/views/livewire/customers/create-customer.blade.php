<div class="rounded-2xl overflow-hidden" style="background: rgba(255,255,255,0.04); border: 1px solid rgba(255,255,255,0.08);">
    {{-- Header --}}
    <div class="flex items-center justify-between px-6 py-5" style="background: linear-gradient(135deg, rgba(13,148,136,0.25) 0%, rgba(20,184,166,0.12) 100%); border-bottom: 1px solid rgba(255,255,255,0.08);">
        <div class="flex items-center gap-3">
            <div class="flex items-center justify-center w-10 h-10 rounded-xl" style="background: rgba(13,148,136,0.2); border: 1px solid rgba(13,148,136,0.4);">
                <svg class="w-5 h-5" style="color: #14b8a6;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                </svg>
            </div>
            <div>
                <h3 class="text-lg font-bold" style="color: #f9fafb;">Add New Customer</h3>
                <p class="text-xs" style="color: #64748b;">Fill in the customer details below</p>
            </div>
        </div>
        <button wire:click="closeModal" class="flex items-center justify-center w-8 h-8 rounded-lg transition-all duration-200" style="color: #9ca3af; background: rgba(255,255,255,0.05);" onmouseover="this.style.background='rgba(244,63,94,0.15)'; this.style.color='#f43f5e';" onmouseout="this.style.background='rgba(255,255,255,0.05)'; this.style.color='#9ca3af';">
            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>

    {{-- Form --}}
    <form wire:submit.prevent="createCustomer" class="p-6">
        <div class="space-y-5">
            {{-- Name --}}
            <div>
                <label class="block text-sm font-semibold mb-2" style="color: #9ca3af;">
                    Customer Name <span style="color: #f43f5e;">*</span>
                </label>
                <input type="text" wire:model="name"
                    class="w-full rounded-xl px-4 py-3 text-sm font-medium transition-all duration-200 outline-none"
                    style="background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1); color: #f9fafb;"
                    onfocus="this.style.borderColor='#0d9488'; this.style.boxShadow='0 0 0 3px rgba(13,148,136,0.15)';"
                    onblur="this.style.borderColor='rgba(255,255,255,0.1)'; this.style.boxShadow='none';"
                    placeholder="Enter customer name" />
                @error('name')
                    <p class="mt-1.5 text-xs flex items-center gap-1" style="color: #f43f5e;">
                        <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" /></svg>
                        {{ $message }}
                    </p>
                @enderror
            </div>

            {{-- Phone --}}
            <div>
                <label class="block text-sm font-semibold mb-2" style="color: #9ca3af;">
                    Phone Number <span style="color: #f43f5e;">*</span>
                </label>
                <input type="text" wire:model="phone"
                    class="w-full rounded-xl px-4 py-3 text-sm font-medium transition-all duration-200 outline-none"
                    style="background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1); color: #f9fafb;"
                    onfocus="this.style.borderColor='#0d9488'; this.style.boxShadow='0 0 0 3px rgba(13,148,136,0.15)';"
                    onblur="this.style.borderColor='rgba(255,255,255,0.1)'; this.style.boxShadow='none';"
                    placeholder="Enter phone number" />
                @error('phone')
                    <p class="mt-1.5 text-xs flex items-center gap-1" style="color: #f43f5e;">
                        <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" /></svg>
                        {{ $message }}
                    </p>
                @enderror
            </div>

            {{-- Address --}}
            <div>
                <label class="block text-sm font-semibold mb-2" style="color: #9ca3af;">
                    Address <span class="text-xs font-normal" style="color: #64748b;">(Optional)</span>
                </label>
                <textarea wire:model="address" rows="3"
                    class="w-full rounded-xl px-4 py-3 text-sm font-medium transition-all duration-200 outline-none resize-none"
                    style="background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1); color: #f9fafb;"
                    onfocus="this.style.borderColor='#0d9488'; this.style.boxShadow='0 0 0 3px rgba(13,148,136,0.15)';"
                    onblur="this.style.borderColor='rgba(255,255,255,0.1)'; this.style.boxShadow='none';"
                    placeholder="Enter customer address"></textarea>
                @error('address')
                    <p class="mt-1.5 text-xs flex items-center gap-1" style="color: #f43f5e;">
                        <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" /></svg>
                        {{ $message }}
                    </p>
                @enderror
            </div>
        </div>

        {{-- Actions --}}
        <div class="mt-6 flex gap-3">
            <button type="submit"
                class="flex-1 flex items-center justify-center gap-2 rounded-xl px-4 py-3 text-sm font-bold text-white transition-all duration-200"
                style="background: linear-gradient(135deg, #0d9488, #14b8a6); box-shadow: 0 4px 15px rgba(13,148,136,0.35);"
                onmouseover="this.style.transform='translateY(-1px)'; this.style.boxShadow='0 6px 20px rgba(13,148,136,0.5)';"
                onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 15px rgba(13,148,136,0.35)';">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Create Customer
            </button>
            <button type="button" wire:click="closeModal"
                class="rounded-xl px-5 py-3 text-sm font-semibold transition-all duration-200"
                style="background: rgba(255,255,255,0.06); border: 1px solid rgba(255,255,255,0.1); color: #9ca3af;"
                onmouseover="this.style.background='rgba(255,255,255,0.1)'; this.style.color='#f9fafb';"
                onmouseout="this.style.background='rgba(255,255,255,0.06)'; this.style.color='#9ca3af';">
                Cancel
            </button>
        </div>
    </form>
</div>