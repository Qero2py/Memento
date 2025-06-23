<x-layouts.catalog :coverUrl="$coverUrl">
    <header class="mb-8">
        <div class="flex items-center justify-between">
            <a href="{{ url()->previous() }}" class="inline-flex items-center space-x-2 text-gray-400 hover:text-white transition-colors duration-300 group">
                <svg class="w-6 h-6 group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                <span>Back to Catalog</span>
            </a>
            <h1 class="text-2xl font-bold text-white text-right bg-white bg-clip-text text-transparent">MEMENTO</h1>
        </div>
    </header>

    <div class="bg-white/20 backdrop-blur-lg rounded-2xl p-8 shadow-xl border border-white/10">
        <div class="relative p-8 sm:p-12 min-h-[500px] flex items-end">
            <img src="{{ asset('storage/' . $game->gambar_cover) }}" alt="Background" class="absolute inset-0 w-full h-full object-cover z-0 opacity-20 blur-lg scale-110">
            <div class="absolute inset-0 bg-gradient-to-t from-black via-black/30 to-transparent z-10"></div>

            <div class="relative z-20 flex flex-col md:flex-row gap-8 items-start w-full">
                <div class="relative group flex-shrink-0">
                    <img src="{{ asset('storage/' . $game->gambar_cover) }}" alt="Cover of {{ $game->judul }}" class="w-56 aspect-[3/4] object-cover rounded-xl shadow-2xl border-2 border-white/10 group-hover:border-purple-500 transition-all duration-300">
                    <div class="absolute inset-0 rounded-xl border-2 border-transparent group-hover:border-white/30 pointer-events-none transition-all duration-300"></div>
                </div>
                
                <div class="flex flex-col flex-grow">
                    <div class="flex items-center gap-3 mb-2">
                        @if($game->genre)
                        <span class="bg-purple-500/20 text-purple-300 text-sm px-3 py-1 rounded-full">{{ $game->genre }}</span>
                        @endif
                        @if($game->tanggal_rilis)
                        <span class="bg-blue-500/20 text-blue-300 text-sm px-3 py-1 rounded-full">{{ \Carbon\Carbon::parse($game->tanggal_rilis)->format('Y') }}</span>
                        @endif
                    </div>
                    
                    <h2 class="text-5xl font-bold text-white drop-shadow-lg mb-2">{{ $game->judul }}</h2>
                    
                    <p class="text-gray-300 max-w-2xl leading-relaxed mb-8">{{ $game->deskripsi }}</p>
                    
                    <div class="flex flex-wrap gap-4 mt-auto">
                        <a href="{{ $game->link_download }}" target="_blank"
                            class="relative inline-flex items-center justify-center text-white font-bold py-3 px-8 rounded-lg overflow-hidden transition-all duration-300 shadow-lg">
                            <div class="absolute inset-0 z-0 bg-cover bg-center blur-sm scale-110 opacity-40"
                                    style="background-image: url('{{ $coverUrl }}');">
                            </div>
                            <div class="absolute inset-0 z-10 bg-black/40"></div>
                            <span class="relative z-20 flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                                </svg>
                                DOWNLOAD NOW
                            </span>
                        </a>
                        @if($game->link_trailer)
                        <a href="{{ $game->link_trailer }}" target="_blank" class="inline-flex items-center justify-center bg-gray-800 text-white font-medium py-3 px-6 rounded-lg hover:bg-gray-700 transition-all duration-300 border border-gray-700">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            WATCH TRAILER
                        </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="p-8 sm:p-12 border-t border-white/10">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
                <div class="lg:col-span-1">
                    <h3 class="text-2xl font-bold text-white mb-6 pb-2 border-b border-white/10">Game Details</h3>
                    <div class="space-y-4">
                        <div class="bg-white/20 p-4 rounded-lg">
                            <h4 class="text-sm font-semibold text-white mb-2 uppercase tracking-wider">Release Info</h4>
                            <div class="space-y-3">
                                <div class="flex justify-between">
                                    <span class="text-gray">Release Date:</span>
                                    <span class="font-medium">{{ $game->tanggal_rilis ? \Carbon\Carbon::parse($game->tanggal_rilis)->format('d F Y') : 'N/A' }}</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray">Developer:</span>
                                    <span class="font-medium">{{ $game->developer ?? 'N/A' }}</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray">Publisher:</span>
                                    <span class="font-medium">{{ $game->publisher ?? 'N/A' }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="lg:col-span-2 space-y-10">
                    @if($game->link_trailer)
                    <section>
                        <div class="flex items-center justify-between mb-4 pb-2 border-b border-white/10">
                            <h3 class="text-2xl font-bold text-white">Trailer</h3>
                            <span class="text-sm text-gray-400">Official gameplay trailer</span>
                        </div>
                        <div class="aspect-video w-full rounded-xl overflow-hidden bg-black shadow-lg">
                            <iframe class="w-full h-full" src="{{ $game->embed_url }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                        </div>
                    </section>
                    @endif

                    @if(!empty($game->screenshots))
                    <section>
                        <div class="flex items-center justify-between mb-4 pb-2 border-b border-white/10">
                            <h3 class="text-2xl font-bold text-white">Screenshots</h3>
                            <span class="text-sm text-gray-400">{{ count($game->screenshots) }} images</span>
                        </div>
                        <div class="grid grid-cols-2 sm:grid-cols-3 gap-4">
                            @foreach($game->screenshots as $screenshot)
                                <a href="{{ asset('storage/' . $screenshot) }}" data-fancybox="gallery" class="group relative block overflow-hidden rounded-lg aspect-video">
                                    <img src="{{ asset('storage/' . $screenshot) }}" alt="Screenshot" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                                    <div class="absolute inset-0 bg-black/30 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                                        <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                        </svg>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </section>
                    @endif
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5/dist/fancybox/fancybox.css" />
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5/dist/fancybox/fancybox.umd.js" defer></script>
    <script>
    document.addEventListener('DOMContentLoaded', () => {
        Fancybox.bind("[data-fancybox]", {
            Thumbs: false,
            Toolbar: {
                display: {
                    left: [],
                    middle: [],
                    right: ["close"],
                },
            },
        });
    });
    </script>
@endpush

</x-layouts.catalog>