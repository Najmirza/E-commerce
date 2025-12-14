<div class="min-h-screen flex items-center justify-center p-4 relative overflow-hidden" x-data="{ tab: '{{ $tab }}' }">
    <!-- Premium Mesh Gradient Background -->
    <div class="absolute inset-0 bg-brand-dark z-0">
        <div class="absolute top-[-10%] left-[-10%] w-[50%] h-[50%] bg-brand-copper/30 rounded-full blur-[120px] animate-pulse"></div>
        <div class="absolute bottom-[-10%] right-[-10%] w-[50%] h-[50%] bg-brand-sage/20 rounded-full blur-[120px] animate-pulse" style="animation-duration: 4s;"></div>
        <div class="absolute top-[20%] right-[20%] w-[40%] h-[40%] bg-brand-blue/10 rounded-full blur-[100px]"></div>
    </div>

    <div class="bg-white/95 backdrop-blur-xl w-full max-w-6xl rounded-[2.5rem] shadow-2xl overflow-hidden flex min-h-[700px] relative z-10 border border-white/20">
        
        <!-- Left Side: Auth Forms -->
        <div class="w-full lg:w-5/12 p-8 md:p-12 flex flex-col relative z-10">
            <!-- Brand Logo -->
            <div class="mb-8">
                <a href="{{ route('home') }}" class="text-2xl font-serif font-bold tracking-tight text-brand-dark flex items-center gap-2">
                    <span class="w-8 h-8 bg-brand-dark text-white rounded-lg flex items-center justify-center">K</span>
                    Kettle.
                </a>
            </div>

            <!-- Tab Navigation (Pills) -->
            <div class="bg-gray-100/80 p-1 rounded-full flex gap-1 mb-10 w-fit mx-auto lg:mx-0">
                <button 
                    @click="tab = 'signin'" 
                    class="px-6 py-2 rounded-full text-sm font-medium transition-all duration-300"
                    :class="tab === 'signin' ? 'bg-white text-brand-dark shadow-sm' : 'text-gray-500 hover:text-brand-dark'">
                    Sign In
                </button>
                <button 
                    @click="tab = 'signup'" 
                    class="px-6 py-2 rounded-full text-sm font-medium transition-all duration-300"
                    :class="tab === 'signup' ? 'bg-white text-brand-dark shadow-sm' : 'text-gray-500 hover:text-brand-dark'">
                    Sign Up
                </button>
                <button 
                    @click="tab = 'recovery'" 
                    class="px-6 py-2 rounded-full text-sm font-medium transition-all duration-300"
                    :class="tab === 'recovery' ? 'bg-white text-brand-dark shadow-sm' : 'text-gray-500 hover:text-brand-dark'">
                    Recovery
                </button>
            </div>

            <!-- Header Dynamic -->
            <div class="mb-8 text-center lg:text-left">
                <h2 class="font-serif text-4xl text-brand-dark mb-2 animate-fade-in-up">
                    <span x-show="tab === 'signin'">Welcome Back</span>
                    <span x-show="tab === 'signup'">Create Account</span>
                    <span x-show="tab === 'recovery'">Reset Password</span>
                </h2>
                <p class="text-brand-dark/50 text-sm">
                    <span x-show="tab === 'signin'">Enter your credentials to access your account.</span>
                    <span x-show="tab === 'signup'">Join the community of seamless brewing.</span>
                    <span x-show="tab === 'recovery'">Enter your email to receive recovery instructions.</span>
                </p>
            </div>

            @if (session('status'))
                <div class="mb-6 bg-green-50 text-green-600 p-4 rounded-xl text-sm font-medium">
                    {{ session('status') }}
                </div>
            @endif

            <!-- Forms Container -->
            <div class="flex-grow relative">
                
                <!-- Sign In Form -->
                <form wire:submit.prevent="login" x-show="tab === 'signin'" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-2" x-transition:enter-end="opacity-100 translate-y-0" class="space-y-5">
                    <div>
                        <div class="relative group">
                            <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-gray-400 group-focus-within:text-brand-copper transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" /></svg>
                            </span>
                            <input wire:model="login_email" type="email" placeholder="Email or Username" 
                                class="w-full bg-gray-50 border border-gray-100 rounded-xl py-4 pl-12 pr-4 outline-none focus:border-brand-copper/30 focus:ring-4 focus:ring-brand-copper/5 transition-all @error('login_email') border-red-500 bg-red-50 text-red-900 @enderror">
                        </div>
                        @error('login_email') <span class="text-xs text-red-500 mt-1 pl-1 block">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <div class="relative group">
                            <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-gray-400 group-focus-within:text-brand-copper transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" /></svg>
                            </span>
                            <input wire:model="login_password" type="password" placeholder="Password" 
                                class="w-full bg-gray-50 border border-gray-100 rounded-xl py-4 pl-12 pr-4 outline-none focus:border-brand-copper/30 focus:ring-4 focus:ring-brand-copper/5 transition-all">
                        </div>
                        @error('login_password') <span class="text-xs text-red-500 mt-1 pl-1 block">{{ $message }}</span> @enderror
                    </div>

                    <div class="flex items-center justify-between text-sm pt-2">
                        <label class="flex items-center cursor-pointer">
                            <input type="checkbox" wire:model="remember" class="w-4 h-4 rounded border-gray-300 text-brand-copper focus:ring-brand-copper/20">
                            <span class="ml-2 text-gray-500">Remember me</span>
                        </label>
                        <!-- <button type="button" @click="tab = 'recovery'" class="text-brand-copper hover:text-brand-dark font-medium transition-colors">Forgot Password?</button> -->
                    </div>

                    <button type="submit" class="w-full py-4 bg-brand-dark text-white rounded-xl font-bold shadow-lg shadow-brand-dark/20 hover:bg-brand-copper hover:translate-y-[-2px] hover:shadow-brand-copper/30 transition-all duration-300 flex items-center justify-center gap-2">
                        <span wire:loading.remove wire:target="login">Sign In</span>
                        <span wire:loading wire:target="login" class="animate-pulse">Authenticating...</span>
                    </button>
                    
                     <div class="text-center mt-6">
                         <span class="text-xs text-gray-400">or continue with</span>
                         <div class="flex gap-4 justify-center mt-4">
                             <button type="button" class="w-12 h-12 rounded-full border border-gray-100 flex items-center justify-center hover:bg-gray-50 transition-colors">
                                 <img src="https://www.svgrepo.com/show/475656/google-color.svg" class="w-5 h-5" alt="Google">
                             </button>
                             <button type="button" class="w-12 h-12 rounded-full border border-gray-100 flex items-center justify-center hover:bg-gray-50 transition-colors">
                                 <img src="https://www.svgrepo.com/show/475647/facebook-color.svg" class="w-5 h-5" alt="Facebook">
                             </button>
                         </div>
                     </div>
                </form>

                <!-- Sign Up Form -->
                <form wire:submit.prevent="register" x-show="tab === 'signup'" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-2" x-transition:enter-end="opacity-100 translate-y-0" class="space-y-4">
                     <div>
                        <div class="relative group">
                            <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-gray-400 group-focus-within:text-brand-copper transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" /></svg>
                            </span>
                            <input wire:model="register_name" type="text" placeholder="Full Name" 
                                class="w-full bg-gray-50 border border-gray-100 rounded-xl py-4 pl-12 pr-4 outline-none focus:border-brand-copper/30 focus:ring-4 focus:ring-brand-copper/5 transition-all @error('register_name') border-red-500 bg-red-50 text-red-900 @enderror">
                        </div>
                         @error('register_name') <span class="text-xs text-red-500 mt-1 pl-1 block">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <div class="relative group">
                            <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-gray-400 group-focus-within:text-brand-copper transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" /></svg>
                            </span>
                            <input wire:model="register_email" type="email" placeholder="Email Address" 
                                class="w-full bg-gray-50 border border-gray-100 rounded-xl py-4 pl-12 pr-4 outline-none focus:border-brand-copper/30 focus:ring-4 focus:ring-brand-copper/5 transition-all @error('register_email') border-red-500 bg-red-50 text-red-900 @enderror">
                        </div>
                        @error('register_email') <span class="text-xs text-red-500 mt-1 pl-1 block">{{ $message }}</span> @enderror
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                             <div class="relative group">
                                <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-gray-400 group-focus-within:text-brand-copper transition-colors">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" /></svg>
                                </span>
                                <input wire:model="register_password" type="password" placeholder="Password" 
                                    class="w-full bg-gray-50 border border-gray-100 rounded-xl py-4 pl-12 pr-4 outline-none focus:border-brand-copper/30 focus:ring-4 focus:ring-brand-copper/5 transition-all @error('register_password') border-red-500 bg-red-50 text-red-900 @enderror">
                            </div>
                        </div>
                        <div>
                             <div class="relative group">
                                <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-gray-400 group-focus-within:text-brand-copper transition-colors">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                                </span>
                                <input wire:model="register_password_confirmation" type="password" placeholder="Confirm" 
                                    class="w-full bg-gray-50 border border-gray-100 rounded-xl py-4 pl-12 pr-4 outline-none focus:border-brand-copper/30 focus:ring-4 focus:ring-brand-copper/5 transition-all">
                            </div>
                        </div>
                    </div>
                     @error('register_password') <span class="text-xs text-red-500 mt-1 pl-1 block">{{ $message }}</span> @enderror
                    
                    <div>
                         <div class="relative group">
                            <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-gray-400 group-focus-within:text-brand-copper transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                            </span>
                             <div class="relative">
                                <select wire:model="register_country" class="w-full bg-gray-50 border border-gray-100 rounded-xl py-4 pl-12 pr-10 outline-none focus:border-brand-copper/30 focus:ring-4 focus:ring-brand-copper/5 appearance-none text-gray-500">
                                    <option>United States</option>
                                    <option>United Kingdom</option>
                                    <option>Canada</option>
                                    <option>Australia</option>
                                </select>
                                <span class="absolute inset-y-0 right-4 flex items-center pointer-events-none text-gray-400">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" /></svg>
                                </span>
                             </div>
                        </div>
                    </div>

                    <div class="flex items-center gap-3 pt-2">
                         <input type="checkbox" required class="w-4 h-4 rounded border-gray-300 text-brand-copper focus:ring-brand-copper/20">
                         <span class="text-xs text-gray-500">I agree to the <a href="#" class="text-brand-dark font-bold hover:underline">Terms of Use</a> & Privacy Policy</span>
                    </div>

                    <button type="submit" class="w-full py-4 bg-brand-dark text-white rounded-xl font-bold shadow-lg shadow-brand-dark/20 hover:bg-brand-copper hover:translate-y-[-2px] hover:shadow-brand-copper/30 transition-all duration-300 flex items-center justify-center gap-2">
                         <span wire:loading.remove wire:target="register">Sign Up</span>
                        <span wire:loading wire:target="register" class="animate-pulse">Creating Account...</span>
                    </button>
                </form>

                <!-- Recovery Form -->
                <form wire:submit.prevent="recover" x-show="tab === 'recovery'" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-2" x-transition:enter-end="opacity-100 translate-y-0" class="space-y-6">
                     <div>
                        <div class="relative group">
                            <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-gray-400 group-focus-within:text-brand-copper transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" /></svg>
                            </span>
                            <input wire:model="recovery_email" type="email" placeholder="Recovery Email" 
                                class="w-full bg-gray-50 border border-gray-100 rounded-xl py-4 pl-12 pr-4 outline-none focus:border-brand-copper/30 focus:ring-4 focus:ring-brand-copper/5 transition-all @error('recovery_email') border-red-500 bg-red-50 text-red-900 @enderror">
                        </div>
                        @error('recovery_email') <span class="text-xs text-red-500 mt-1 pl-1 block">{{ $message }}</span> @enderror
                    </div>

                    <button type="submit" class="w-full py-4 bg-brand-dark text-white rounded-xl font-bold shadow-lg shadow-brand-dark/20 hover:bg-brand-copper hover:translate-y-[-2px] hover:shadow-brand-copper/30 transition-all duration-300 flex items-center justify-center gap-2">
                         <span wire:loading.remove wire:target="recover">Send Recovery Link</span>
                        <span wire:loading wire:target="recover" class="animate-pulse">Sending...</span>
                    </button>
                    
                    <div class="text-center pt-4">
                        <button type="button" @click="tab = 'signin'" class="text-sm text-brand-dark font-medium hover:text-brand-copper transition-colors flex items-center justify-center gap-2 mx-auto">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" /></svg>
                             Back to Login
                        </button>
                    </div>
                </form>

            </div>

            <!-- Footer -->
            <div class="mt-8 text-center text-xs text-gray-400">
                &copy; 2025 Kettle Inc. Secure Authentication.
            </div>
        </div>

        <!-- Right Side: Illustration -->
        <div class="hidden lg:block w-7/12 relative overflow-hidden bg-brand-dark">
             <!-- Background Image -->
             <img src="{{ asset('images/auth-illustration.png') }}" class="absolute inset-0 w-full h-full object-cover opacity-80" alt="Universal Trading Style">
             
             <!-- Gradient Overlay -->
             <div class="absolute inset-0 bg-gradient-to-br from-brand-dark/90 via-transparent to-brand-copper/20"></div>

             <div class="absolute bottom-16 left-16 z-20 max-w-lg text-white">
                 <div class="w-16 h-16 bg-white/10 backdrop-blur-md rounded-2xl flex items-center justify-center mb-6">
                     <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" /></svg>
                 </div>
                 <h2 class="font-serif text-5xl font-bold leading-tight mb-4">Welcome to the <br> <span class="text-brand-copper">Kettle</span> Digital Experience</h2>
                 <p class="text-white/60 text-lg leading-relaxed">
                     Join thousands of coffee and tea enthusiasts who have elevated their daily ritual with our smart, premium brewing technology.
                 </p>
             </div>
        </div>

    </div>
</div>
