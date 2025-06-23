<div>
    <header class="flex flex-wrap justify-between items-center gap-4 mb-8 text-white">
        <div>
            <h1 class="text-4xl font-bold drop-shadow-lg">Game Catalog</h1>
            <p class="text-gray-300 mt-1 drop-shadow-lg">Jelajahi semua game yang tersedia di Memento.</p>
        </div>

       <div class="w-full max-w-sm">
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="white" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
                <input
                    type="text"
                    wire:model.live.debounce.300ms="search"
                    placeholder="Search games..."
                    class="w-full bg-white/10 backdrop-blur-lg border-none rounded-full py-3 pl-12 pr-4 text-white placeholder-white focus:outline-none focus:ring-2 focus:ring-white/35"
                >
            </div>
        </div>

    </header>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
        @forelse($games as $game)
            <div wire:key="game-card-{{ $game->id }}">
                <x-game-card :game="$game" />
            </div>
        @empty
            <div class="col-span-full text-center mt-12">
                @if(request('search'))
                    <p class="text-white text-xl">Tidak ada game yang cocok dengan pencarian "<span class="font-semibold">{{ request('search') }}</span>".</p>
                @else
                    <p class="text-white text-xl">Belum ada game di dalam portal.</p>
                @endif
            </div>
        @endforelse
    </div>
</div>
