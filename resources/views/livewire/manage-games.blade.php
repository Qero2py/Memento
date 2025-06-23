<div>
    <header class="mb-8">
        <h1 class="text-4xl font-bold text-white drop-shadow-lg">Manage Games</h1>
        <div class="flex justify-between items-center mt-4">
            <p class="text-gray-300 drop-shadow-lg">Here you can edit or delete existing games.</p>
            <input wire:model.live.debounce.300ms="search" type="text" placeholder="Search games..." class="w-1/3 bg-white/20 backdrop-blur-xl rounded-full px-4 py-2 text-white placeholder:text-white">
        </div>
    </header>

    @if (session('success'))
        <div
            x-data="{ show: true }"
            x-init="setTimeout(() => show = false, 1000)"
            x-show="show"
            x-transition:leave="transition ease-in duration-300"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            class="bg-green-500/20 text-green-300 p-4 rounded-lg mb-6"
        >
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-black/20 backdrop-blur-lg rounded-2xl overflow-x-auto">
        <table class="w-full text-left text-gray-300">
            <thead class="text-xs text-gray-400 uppercase border-b border-gray-700">
                <tr>
                    <th scope="col" class="px-6 py-3">Cover</th>
                    <th scope="col" class="px-6 py-3 cursor-pointer" wire:click="sortBy('judul')">
                        Judul @if($sortField === 'judul')<span>{{ $sortDirection === 'asc' ? '↑' : '↓' }}</span>@endif
                    </th>
                    <th scope="col" class="px-6 py-3 cursor-pointer" wire:click="sortBy('genre')">
                        Genre @if($sortField === 'genre')<span>{{ $sortDirection === 'asc' ? '↑' : '↓' }}</span>@endif
                    </th>
                    <th scope="col" class="px-6 py-3 text-right">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($games as $game)
                    <tr class="border-b border-gray-800 hover:bg-gray-800/50">
                        <td class="px-6 py-4">
                            <img src="{{ asset('storage/' . $game->gambar_cover) }}" alt="Cover" class="w-16 h-20 object-cover rounded-md">
                        </td>
                        <th scope="row" class="px-6 py-4 font-medium text-white whitespace-nowrap">{{ $game->judul }}</th>
                        <td class="px-6 py-4">{{ $game->genre }}</td>
                        <td class="px-6 py-4 text-right space-x-4">
                            <a href="{{ route('admin.games.edit', $game) }}" class="font-medium text-blue-400 hover:underline">Edit</a>
                            <button wire:click="delete({{ $game->id }})" wire:confirm="Apakah Anda yakin ingin menghapus game '{{ $game->judul }}'?" class="font-medium text-red-500 hover:underline">
                                Delete
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center py-8">
                            Tidak ada game yang cocok dengan pencarian Anda.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-8">
        {{ $games->links() }}
    </div>
</div>