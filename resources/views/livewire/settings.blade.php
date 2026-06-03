<div class="w-full">
    {{-- Header --}}
    <div class="mb-6 flex items-center gap-4">
        <div class="w-12 h-12 rounded-2xl flex items-center justify-center flex-shrink-0"
             style="background:linear-gradient(135deg,#0d9488,#0f766e);box-shadow:0 0 20px rgba(13,148,136,0.3);">
            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
            </svg>
        </div>
        <div>
            <h1 class="text-2xl font-bold text-white">Settings</h1>
            <p class="mt-1 text-sm" style="color:#64748b;">Manage your business configuration and system preferences</p>
        </div>
    </div>

    {{-- Tabs Navigation --}}
    <div class="mb-6 overflow-x-auto" style="border-bottom:1px solid rgba(255,255,255,0.08);">
        <nav class="-mb-px flex space-x-6 sm:space-x-8 min-w-max" aria-label="Tabs">
            <button wire:click="switchTab('business')"
                class="{{ $activeTab === 'business' ? 'border-[#0d9488] text-[#2dd4bf]' : 'border-transparent text-[#64748b] hover:text-[#e2e8f0] hover:border-[rgba(255,255,255,0.2)]' }} whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm transition-all">
                <div class="flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                    </svg>
                    Business Settings
                </div>
            </button>

            <button wire:click="switchTab('orders')"
                class="{{ $activeTab === 'orders' ? 'border-[#0d9488] text-[#2dd4bf]' : 'border-transparent text-[#64748b] hover:text-[#e2e8f0] hover:border-[rgba(255,255,255,0.2)]' }} whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm transition-all">
                <div class="flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    Order Configuration
                </div>
            </button>

            <button wire:click="switchTab('users')"
                class="{{ $activeTab === 'users' ? 'border-[#0d9488] text-[#2dd4bf]' : 'border-transparent text-[#64748b] hover:text-[#e2e8f0] hover:border-[rgba(255,255,255,0.2)]' }} whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm transition-all">
                <div class="flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                    User Management
                </div>
            </button>

            <button wire:click="switchTab('system')"
                class="{{ $activeTab === 'system' ? 'border-[#0d9488] text-[#2dd4bf]' : 'border-transparent text-[#64748b] hover:text-[#e2e8f0] hover:border-[rgba(255,255,255,0.2)]' }} whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm transition-all">
                <div class="flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    System Preferences
                </div>
            </button>
        </nav>
    </div>

    {{-- Tab Content --}}
    <div>
        @if($activeTab === 'business')
            <livewire:settings.business-settings />
        @elseif($activeTab === 'orders')
            <livewire:settings.order-settings />
        @elseif($activeTab === 'users')
            <livewire:settings.user-management />
        @elseif($activeTab === 'system')
            <livewire:settings.system-preferences />
        @endif
    </div>
</div>