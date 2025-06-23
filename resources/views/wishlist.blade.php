<x-app-layout :background-color="'rgba(18, 18, 18, 0.95)'">
    <header class="mb-8">
        <h1 class="text-4xl font-bold text-white drop-shadow-lg">My Wishlist</h1>
        <p class="text-gray-300 mt-1 drop-shadow-lg">Game yang ingin kamu mainkan selanjutnya.</p>
    </header>

    @forelse($games as $game)
        @if($loop->first)
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-8">
        @endif

        <x-game-card :game="$game" />

        @if($loop->last)
            </div>
        @endif
    @empty
        <div class="text-center py-16 px-6 bg-gray-800/20 rounded-2xl">
            <svg class="mx-auto h-12 w-12 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 016.364 0L12 7.5l1.318-1.182a4.5 4.5 0 116.364 6.364L12 18.75l-7.682-7.682a4.5 4.5 0 010-6.364z"></path></svg>
            <h3 class="mt-2 text-lg font-semibold text-white">Wishlist Anda Kosong</h3>
            <p class="mt-1 text-sm text-gray-400">Klik ikon hati pada game untuk menambahkannya ke sini.</p>
        </div>
    @endforelse
</x-app-layout>