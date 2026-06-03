<div>
    @if($showModal)
        <div x-data="{ show: @entangle('showModal') }" x-show="show" x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0" class="fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title"
            role="dialog" aria-modal="true" style="background: rgba(0,0,0,0.85);">
            <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                <!-- Background overlay -->
                <div class="fixed inset-0 transition-opacity" @click="$wire.closeModal()"></div>

                <!-- Modal panel -->
                <div x-show="show" x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                    x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                    x-transition:leave="transition ease-in duration-200"
                    x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                    x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                    class="inline-block align-bottom rounded-2xl text-left overflow-hidden shadow-2xl transform transition-all sm:my-8 sm:align-middle sm:max-w-2xl sm:w-full"
                    style="background: #0a1628; border: 1px solid rgba(255,255,255,0.08);">

                    <form wire:submit="update">
                        <!-- Header -->
                        <div class="px-6 py-5" style="background: linear-gradient(135deg, rgba(13,148,136,0.25) 0%, rgba(20,184,166,0.1) 100%); border-bottom: 1px solid rgba(255,255,255,0.08);">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center space-x-3">
                                    <div class="flex-shrink-0">
                                        <div class="h-11 w-11 rounded-xl flex items-center justify-center" style="background: rgba(13,148,136,0.2); border: 1px solid rgba(13,148,136,0.4);">
                                            <svg class="h-5 w-5" style="color: #14b8a6;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                        </div>
                                    </div>
                                    <div>
                                        <h3 class="text-lg font-bold" style="color: #f9fafb;" id="modal-title">Edit Customer</h3>
                                        <p class="text-xs" style="color: #64748b;">Update customer information</p>
                                    </div>
                                </div>
                                <button type="button" @click="$wire.closeModal()"
                                    class="flex items-center justify-center w-8 h-8 rounded-lg transition-all duration-200"
                                    style="color: #9ca3af; background: rgba(255,255,255,0.05);"
                                    onmouseover="this.style.background='rgba(244,63,94,0.15)'; this.style.color='#f43f5e';"
                                    onmouseout="this.style.background='rgba(255,255,255,0.05)'; this.style.color='#9ca3af';">
                                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </div>
                        </div>

                        <!-- Body -->
                        <div class="px-6 py-6">
                            <div class="space-y-5">
                                <!-- Name -->
                                <div>
                                    <label for="edit-name" class="block text-sm font-semibold mb-2" style="color: #9ca3af;">
                                        Customer Name <span style="color: #f43f5e;">*</span>
                                    </label>
                                    <input type="text" id="edit-name" wire:model="name"
                                        class="block w-full px-4 py-3 rounded-xl text-sm font-medium outline-none transition-all duration-200 @error('name') ring-2 ring-red-500 @enderror"
                                        style="background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1); color: #f9fafb;"
                                        onfocus="this.style.borderColor='#0d9488'; this.style.boxShadow='0 0 0 3px rgba(13,148,136,0.15)';"
                                        onblur="this.style.borderColor='rgba(255,255,255,0.1)'; this.style.boxShadow='none';"
                                        placeholder="Enter customer name">
                                    @error('name')
                                        <p class="mt-1.5 text-xs flex items-center gap-1" style="color: #f43f5e;">
                                            <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" /></svg>
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>

                                <!-- Phone -->
                                <div>
                                    <label for="edit-phone" class="block text-sm font-semibold mb-2" style="color: #9ca3af;">
                                        Phone Number <span style="color: #f43f5e;">*</span>
                                    </label>
                                    <input type="tel" id="edit-phone" wire:model="phone" pattern="[0-9]*"
                                        inputmode="numeric" oninput="this.value = this.value.replace(/[^0-9]/g, '')"
                                        onkeypress="return event.charCode >= 48 && event.charCode <= 57"
                                        class="block w-full px-4 py-3 rounded-xl text-sm font-medium outline-none transition-all duration-200 @error('phone') ring-2 ring-red-500 @enderror"
                                        style="background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1); color: #f9fafb;"
                                        onfocus="this.style.borderColor='#0d9488'; this.style.boxShadow='0 0 0 3px rgba(13,148,136,0.15)';"
                                        onblur="this.style.borderColor='rgba(255,255,255,0.1)'; this.style.boxShadow='none';"
                                        placeholder="Enter phone number">
                                    @error('phone')
                                        <p class="mt-1.5 text-xs flex items-center gap-1" style="color: #f43f5e;">
                                            <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" /></svg>
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>

                                <!-- Email -->
                                <div>
                                    <label for="edit-email" class="block text-sm font-semibold mb-2" style="color: #9ca3af;">
                                        Email Address <span class="text-xs font-normal" style="color: #64748b;">(Optional)</span>
                                    </label>
                                    <input type="email" id="edit-email" wire:model="email"
                                        class="block w-full px-4 py-3 rounded-xl text-sm font-medium outline-none transition-all duration-200 @error('email') ring-2 ring-red-500 @enderror"
                                        style="background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1); color: #f9fafb;"
                                        onfocus="this.style.borderColor='#0d9488'; this.style.boxShadow='0 0 0 3px rgba(13,148,136,0.15)';"
                                        onblur="this.style.borderColor='rgba(255,255,255,0.1)'; this.style.boxShadow='none';"
                                        placeholder="customer@example.com">
                                    @error('email')
                                        <p class="mt-1.5 text-xs flex items-center gap-1" style="color: #f43f5e;">
                                            <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" /></svg>
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>

                                <!-- Address -->
                                <div>
                                    <label for="edit-address" class="block text-sm font-semibold mb-2" style="color: #9ca3af;">
                                        Address <span class="text-xs font-normal" style="color: #64748b;">(Optional)</span>
                                    </label>
                                    <textarea id="edit-address" wire:model="address" rows="3"
                                        class="block w-full px-4 py-3 rounded-xl text-sm font-medium outline-none transition-all duration-200 resize-none @error('address') ring-2 ring-red-500 @enderror"
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

                                <!-- Status -->
                                <div>
                                    <label for="edit-status" class="block text-sm font-semibold mb-2" style="color: #9ca3af;">
                                        Status <span style="color: #f43f5e;">*</span>
                                    </label>
                                    <select id="edit-status" wire:model="status"
                                        class="block w-full px-4 py-3 rounded-xl text-sm font-medium outline-none transition-all duration-200 @error('status') ring-2 ring-red-500 @enderror"
                                        style="background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1); color: #f9fafb;"
                                        onfocus="this.style.borderColor='#0d9488'; this.style.boxShadow='0 0 0 3px rgba(13,148,136,0.15)';"
                                        onblur="this.style.borderColor='rgba(255,255,255,0.1)'; this.style.boxShadow='none';">
                                        <option value="active" style="background: #0a1628; color: #f9fafb;">Active</option>
                                        <option value="inactive" style="background: #0a1628; color: #f9fafb;">Inactive</option>
                                    </select>
                                    @error('status')
                                        <p class="mt-1.5 text-xs flex items-center gap-1" style="color: #f43f5e;">
                                            <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" /></svg>
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Footer -->
                        <div class="px-6 py-4 flex justify-end space-x-3" style="border-top: 1px solid rgba(255,255,255,0.08); background: rgba(255,255,255,0.02);">
                            <button type="button" wire:click="closeModal"
                                class="inline-flex items-center px-5 py-2.5 text-sm font-semibold rounded-xl transition-all duration-200"
                                style="background: rgba(255,255,255,0.06); border: 1px solid rgba(255,255,255,0.1); color: #9ca3af;"
                                onmouseover="this.style.background='rgba(255,255,255,0.1)'; this.style.color='#f9fafb';"
                                onmouseout="this.style.background='rgba(255,255,255,0.06)'; this.style.color='#9ca3af';">
                                Cancel
                            </button>
                            <button type="submit" wire:loading.attr="disabled"
                                class="inline-flex items-center gap-2 px-6 py-2.5 text-sm font-bold text-white rounded-xl transition-all duration-200 disabled:opacity-50 disabled:cursor-not-allowed"
                                style="background: linear-gradient(135deg, #0d9488, #14b8a6); box-shadow: 0 4px 15px rgba(13,148,136,0.35);"
                                onmouseover="this.style.transform='translateY(-1px)'; this.style.boxShadow='0 6px 20px rgba(13,148,136,0.5)';"
                                onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 15px rgba(13,148,136,0.35)';">
                                <span wire:loading.remove>
                                    <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>
                                    Update Customer
                                </span>
                                <span wire:loading class="flex items-center gap-2">
                                    <svg class="animate-spin h-4 w-4" fill="none" viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                    </svg>
                                    Updating...
                                </span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endif
</div>