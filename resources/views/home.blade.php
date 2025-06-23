<x-app-layout>
    <header class="sticky top-6 z-20 mb-8 px-6">
        <form action="{{ route('catalog') }}" method="GET">
            <div class="w-full max-w-lg mx-auto">
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                        <svg class="w-5 h-5 text-black-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                    <input type="text" name="search" placeholder="Search and press Enter..."
                        class="w-full bg-white/10 backdrop-blur-xl border-none rounded-full py-3 pl-12 pr-4 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-white">
                </div>
            </div>
        </form>
    </header>

    @if($games->isNotEmpty())
        <section class="mb-12 px-6">
            <h2 class="text-2xl font-bold text-white mb-6">Featured</h2>
            @if($games->count() > 1)
                <div class="swiper featured-slider rounded-2xl">
                    <div class="swiper-wrapper">
                        @foreach($games->take(3) as $game)
                            <div class="swiper-slide" data-background="{{ asset('storage/' . $game->gambar_cover) }}">
                                <x-game-card :game="$game" />
                            </div>
                        @endforeach
                    </div>
                </div>
            @else
                <x-game-card :game="$games->first()" />
            @endif
        </section>

        <section class="px-6 mb-12">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold text-white">New Games</h2>
                <a href="{{ route('catalog') }}" class="text-sm text-gray-400 hover:text-white">See all</a>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-6">
                @foreach($games->take(3) as $game)
                    <x-game-card :game="$game" />
                @endforeach
            </div>
        </section>
    @else
        <div class="text-center py-16 px-6 bg-white/10 rounded-2xl">
            <svg class="mx-auto h-12 w-12 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                aria-hidden="true">
                <path vector-effect="non-scaling-stroke" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z" />
            </svg>
            <h3 class="mt-2 text-lg font-semibold text-white">No Games Yet</h3>
            <p class="mt-1 text-sm text-gray-400">The administrator should add some games to the portal.</p>
        </div>
    @endif
</x-app-layout>

@push('scripts')
<script>

</script>
@endpush
