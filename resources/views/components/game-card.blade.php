@props(['game'])

@if ($game)
    <div class="relative group">
        <a href="{{ route('games.show', $game) }}">
            <div class="relative overflow-hidden rounded-xl aspect-[16/9] bg-memento-gray">
                <img src="{{ asset('storage/' . $game->gambar_cover) }}" alt="{{ $game->judul }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300 ease-in-out">
            </div>
        </a>

        @auth
            <livewire:wishlist-button :game="$game" :key="$game->id" />
        @endauth
    </div>
@endif