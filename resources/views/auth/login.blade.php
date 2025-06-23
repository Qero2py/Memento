<x-guest-layout>
    <div class="w-full max-w-md bg-white/10 backdrop-blur-xl rounded-2xl p-8 shadow-2xl">

        <div class="text-center mb-6">
            <h1 class="text-white text-3xl font-bold tracking-wider">MEMENTO</h1>
        </div>

        <div class="text-center mb-5">
            <h2 class="text-white text-2xl font-bold">Login</h2>
        </div>

        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-4">
                <input id="email"
                       class="block w-full bg-white/10 border-none rounded-full py-3 px-5 text-white placeholder-white focus:outline-none focus:ring-2 focus:ring-white/35"
                       type="email" name="email" :value="old('email')" required autofocus placeholder="Email" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div class="mb-6">
                <input id="password"
                       class="block w-full bg-white/10 border-none rounded-full py-3 px-5 text-white placeholder-white focus:outline-none focus:ring-2 focus:ring-white/35"
                       type="password" name="password" required autocomplete="current-password" placeholder="Password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>
            
            <div class="flex items-center justify-between mb-6">
                <a href="{{ route('register') }}" class="text-sm text-gray-300 hover:text-white underline">
                    {{ __('Don’t have an account? Register') }}
                </a>
            </div>

            <div class="mt-8">
                <button type="submit"
                        class="w-full bg-grey-800 text-white font-bold rounded-full py-3 px-5 hover:bg-black/50 backdrop-blur-xl transition duration-300">
                    {{ __('Log in') }}
                </button>
            </div>
        </form>
    </div>
</x-guest-layout>
