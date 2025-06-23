<nav class="lg:hidden fixed bottom-0 left-0 right-0 h-16 bg-gray-900/80 backdrop-blur-lg border-t border-gray-700 z-40">
    <div class="flex justify-around items-center h-full max-w-lg mx-auto">

        @auth
            @if(auth()->user()->role == 'admin')
                        <a href="{{ route('admin.games.create') }}" class="flex items-center space-x-3 text-gray-300 hover:text-white bg-black/20 hover:bg-black/40 p-2 rounded-lg transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </a>
                        <a href="{{ route('admin.games.index') }}" class="flex items-center space-x-3 text-gray-300 hover:text-white bg-black/20 hover:bg-black/40 p-2 rounded-lg transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                        </a>
                <hr class="border-white/10 backdrop-blur-xl my-6">
            @endif
        @endauth

        <a href="{{ route('home') }}" class="flex flex-col items-center justify-center text-xs space-y-1 {{ request()->routeIs('home') ? 'text-white' : 'text-gray-400' }}">
            <svg class="w-6 h-6 mb-1" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
            <span>Home</span>
        </a>

        <a href="{{ route('catalog') }}" class="flex flex-col items-center justify-center text-xs space-y-1 {{ request()->routeIs('catalog') ? 'text-white' : 'text-gray-400' }}">
            <svg class="w-6 h-6 mb-1" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7"></path></svg>
            <span>Catalog</span>
        </a>

        <a href="{{ route('wishlist.index') }}" class="flex flex-col items-center justify-center text-xs space-y-1 {{ request()->routeIs('wishlist.index') ? 'text-white' : 'text-gray-400' }}">
            <svg class="w-6 h-6 mb-1" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 016.364 0L12 7.5l1.318-1.182a4.5 4.5 0 116.364 6.364L12 18.75l-7.682-7.682a4.5 4.5 0 010-6.364z"></path></svg>
            <span>Wishlist</span>
        </a>

        @auth
            <a href="{{ route('profile.edit') }}" class="flex flex-col items-center justify-center text-xs space-y-1 {{ request()->routeIs('profile.edit') ? 'text-white' : 'text-gray-400' }}">
                <svg class="w-6 h-6 mb-1" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                <span>Profile</span>
            </a>
        @else
            <a href="{{ route('login') }}" class="flex flex-col items-center justify-center text-xs space-y-1">
                <svg class="w-6 h-6 mb-1" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path></svg>
                <span>Login</span>
            </a>
        @endauth

    </div>
</nav>