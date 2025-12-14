<div>
    <div x-data="{ open: @entangle('isOpen') }" 
         x-show="open" 
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         class="fixed inset-0 z-50 overflow-y-auto" 
         style="display: none;">
        
        <!-- Backdrop -->
        <div class="fixed inset-0 bg-brand-dark/40 backdrop-blur-sm transition-opacity" @click="open = false"></div>

        <!-- Modal -->
        <div class="flex min-h-full items-center justify-center p-4 text-center sm:p-0">
            <div x-show="open" 
                 x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                 x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                 x-transition:leave="transition ease-in duration-200"
                 x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                 x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                 class="relative transform overflow-hidden rounded-2xl bg-white text-left shadow-2xl transition-all sm:my-8 sm:w-full sm:max-w-md border border-white/20">
                
                <div class="p-8">
                    <div class="text-center mb-8">
                        <span class="font-serif text-3xl font-bold text-brand-dark">Welcome Back</span>
                        <p class="mt-2 text-sm text-brand-dark/60">Please login to continue your purchase.</p>
                    </div>

                    <form wire:submit.prevent="authenticate" class="space-y-6">
                        <div>
                            <label for="email" class="block text-sm font-medium text-brand-dark/70">Email Access</label>
                            <input wire:model="email" type="email" id="email" class="mt-1 block w-full rounded-lg border-brand-dark/10 bg-brand-beige/30 focus:border-brand-copper focus:ring-brand-copper sm:text-sm px-4 py-3 placeholder:text-brand-dark/30" placeholder="hello@example.com">
                            @error('email') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                        </div>

                        <div>
                             <label for="password" class="block text-sm font-medium text-brand-dark/70">Secure Code</label>
                            <input wire:model="password" type="password" id="password" class="mt-1 block w-full rounded-lg border-brand-dark/10 bg-brand-beige/30 focus:border-brand-copper focus:ring-brand-copper sm:text-sm px-4 py-3" placeholder="••••••••">
                            @error('password') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                        </div>

                        <div class="flex items-center justify-between text-sm">
                            <label class="flex items-center">
                                <input type="checkbox" wire:model="remember" class="rounded border-gray-300 text-brand-copper focus:ring-brand-copper">
                                <span class="ml-2 text-brand-dark/60">Remember me</span>
                            </label>
                            <a href="#" class="font-medium text-brand-copper hover:text-brand-dark transition-colors">Forgot?</a>
                        </div>

                        <button type="submit" class="w-full flex justify-center py-3 px-4 border border-transparent rounded-full shadow-lg text-sm font-bold text-white bg-brand-dark hover:bg-brand-copper focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-brand-copper transition-all transform hover:-translate-y-0.5">
                            <svg wire:loading wire:target="authenticate" class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                            Unlock Experience
                        </button>
                    </form>
                    
                    <div class="mt-6 text-center text-xs">
                        <span class="text-brand-dark/40">New to Kettle?</span>
                        <a href="{{ route('register') }}" class="font-bold text-brand-dark hover:text-brand-copper transition-colors ml-1">Create an account</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
