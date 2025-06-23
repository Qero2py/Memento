<aside class="hidden lg:flex fixed inset-y-6 left-6 w-72 bg-white/10 backdrop-blur-xl p-8 flex-col rounded-3xl z-30">
    <h1 class="text-white text-2xl font-bold mb-12 tracking-wider">MEMENTO</h1>

    @auth
        @if(auth()->user()->role == 'admin')
            <div class="mb-6 px-2">
                <h3 class="text-xs uppercase text-white font-bold mb-3">Admin Panel</h3>
                <nav class="flex flex-col space-y-2">
                    <a href="{{ route('admin.games.create') }}" class="flex items-center space-x-3 text-gray-300 hover:text-white bg-black/20 hover:bg-black/40 p-2 rounded-lg transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <span>Add New Game</span>
                    </a>
                    <a href="{{ route('admin.games.index') }}" class="flex items-center space-x-3 text-gray-300 hover:text-white bg-black/20 hover:bg-black/40 p-2 rounded-lg transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                        <span>Manage Games</span>
                    </a>
                </nav>
            </div>
            <hr class="border-white/50 backdrop-blur-xl my-6">
        @endif
    @endauth

    <nav class="flex flex-col space-y-4">
        <a href="{{ route('home') }}" class="flex items-center space-x-3 {{ request()->routeIs('home') ? 'text-white font-semibold' : 'text-gray-400 hover:text-white' }}">
            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
            <span>Home</span>
        </a>
        <a href="{{ route('catalog') }}" class="flex items-center space-x-3 {{ request()->routeIs('catalog') ? 'text-white font-semibold' : 'text-gray-400 hover:text-white' }}">
            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><path d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
            <span>Catalog</span>
        </a>
        <a href="{{ route('wishlist.index') }}" class="flex items-center space-x-3 {{ request()->routeIs('wishlist.index') ? 'text-white font-semibold' : 'text-gray-400 hover:text-white' }}">
            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"></path></svg>
            <span>Wishlist</span>
        </a>
        <hr class="border-white/50 backdrop-blur-xl my-6">
    </nav>
    
    <div class="flex-grow"></div>

    <div class="flex flex-col space-y-4">
    @auth
        <div class="px-2 py-3">
            <p class="text-sm text-white/80">Signed in as</p>
            <p class="font-semibold text-white truncate">{{ auth()->user()->name }}</p>
        </div>

        <a href="{{ route('profile.edit') }}" class="flex items-center space-x-3 text-gray-300 hover:text-white bg-black/20 hover:bg-black/40 p-2 rounded-lg transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
            <span>Profile</span>
        </a>
    @else
        <a href="{{ route('login') }}" class="flex items-center space-x-3 text-gray-400 hover:text-white">
            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 3a1 1 0 011 1v12a1 1 0 11-2 0V4a1 1 0 011-1zm7.707 3.293a1 1 0 010 1.414L9.414 9H17a1 1 0 110 2H9.414l1.293 1.293a1 1 0 01-1.414 1.414l-3-3a1 1 0 010-1.414l3-3a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
            <span>Login</span>
        </a>
    @endguest
</div>
</aside>