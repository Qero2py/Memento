<x-guest-layout>
    <div class="w-full max-w-md bg-white/10 backdrop-blur-xl rounded-2xl p-8 shadow-2xl">

        <div class="text-center mb-4">
            <h1 class="text-white text-3xl font-bold tracking-wider">MEMENTO</h1>
        </div>

        <div class="text-center mb-8">
            <h2 class="text-white text-2xl font-bold">Register</h2>
        </div>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="mb-4">
                <input id="name"
                       class="block w-full bg-white/10 border-none rounded-full py-3 px-5 text-white placeholder-white focus:outline-none focus:ring-2 focus:ring-white/35"
                       type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="Name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <div class="mb-4">
                <input id="email"
                       class="block w-full bg-white/10 border-none rounded-full py-3 px-5 text-white placeholder-white focus:outline-none focus:ring-2 focus:ring-white/35"
                       type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="Email" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div class="mb-4">
                 <input id="password"
                       class="block w-full bg-white/10 border-none rounded-full py-3 px-5 text-white placeholder-white focus:outline-none focus:ring-2 focus:ring-white/35"
                       type="password" name="password" required autocomplete="new-password" placeholder="Password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <div class="mb-6">
                 <input id="password_confirmation"
                       class="block w-full bg-white/10 border-none rounded-full py-3 px-5 text-white placeholder-white focus:outline-none focus:ring-2 focus:ring-white/35"
                       type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>


            <div class="flex items-center justify-end mb-6">
                <a class="underline text-sm text-white hover:text-white/35 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>
            </div>

            <div>
                <button type="submit"
                        class="w-full bg-grey-800 text-white font-bold rounded-full py-3 px-5 hover:bg-black/50 backdrop-blur-xl transition duration-300">
                    {{ __('Register') }}
                </button>
            </div>
        </form>
    </div>
</x-guest-layout>