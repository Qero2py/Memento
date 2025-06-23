<x-app-layout>
    <div class="p-8">

        <div class="bg-white/20 backdrop-blur-lg rounded-2xl p-8">

            <header class="mb-8">
                <h1 class="text-3xl font-bold text-white">Add New Game</h1>
                <p class="text-gray-400 mt-1">Fill the form below to add a new game to the portal.</p>
            </header>

            @if ($errors->any())
                <div class="bg-red-500/20 border border-red-500/30 text-red-300 p-4 rounded-lg mb-6">
                    <strong class="font-bold">Oops! Ada beberapa masalah dengan input Anda.</strong>
                    <ul class="mt-2 list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.games.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-6">

                    <div>
                        <label for="judul" class="block text-sm font-medium text-gray-300 mb-2">Judul Game</label>
                        <input type="text" name="judul" id="judul" value="{{ old('judul') }}" class="w-full bg-gray-800/50 border-gray-700/50 rounded-lg focus:ring-indigo-500 focus:border-indigo-500" required>
                    </div>

                    <div>
                        <label for="developer" class="block text-sm font-medium text-gray-300 mb-2">Developer</label>
                        <input type="text" name="developer" id="developer" value="{{ old('developer') }}" class="w-full bg-gray-800/50 border-gray-700/50 rounded-lg focus:ring-indigo-500 focus:border-indigo-500">
                    </div>

                    <div>
                        <label for="publisher" class="block text-sm font-medium text-gray-300 mb-2">Publisher</label>
                        <input type="text" name="publisher" id="publisher" value="{{ old('publisher') }}" class="w-full bg-gray-800/50 border-gray-700/50 rounded-lg focus:ring-indigo-500 focus:border-indigo-500">
                    </div>

                     <div>
                        <label for="genre" class="block text-sm font-medium text-gray-300 mb-2">Genre</label>
                        <select name="genre" id="genre" class="w-full bg-gray-800/50 border-gray-700/50 rounded-lg focus:ring-indigo-500 focus:border-indigo-500" required>
                            <option value="" disabled selected>Pilih Genre</option>
                            <option value="Adventure" @if(old('genre') == 'Adventure') selected @endif>Adventure</option>
                            <option value="RPG" @if(old('genre') == 'RPG') selected @endif>RPG</option>
                            <option value="Action" @if(old('genre') == 'Action') selected @endif>Action</option>
                            <option value="Strategy" @if(old('genre') == 'Strategy') selected @endif>Strategy</option>
                            <option value="Simulation" @if(old('genre') == 'Simulation') selected @endif>Simulation</option>
                            <option value="Horror" @if(old('genre') == 'Horror') selected @endif>Horror</option>
                        </select>
                    </div>
                </div>

                <div>
                    <div>
                        <label for="tanggal_rilis" class="block text-sm font-medium text-gray-300 mb-2">Tanggal Rilis</label>
                        <input type="date" name="tanggal_rilis" id="tanggal_rilis" value="{{ old('tanggal_rilis') }}" class="w-full bg-gray-800/50 border-gray-700/50 rounded-lg focus:ring-indigo-500 focus:border-indigo-500">
                    </div>

                    <div class="mt-6">
                        <label for="link_download" class="block text-sm font-medium text-gray-300 mb-2">Link Download</label>
                        <input type="url" name="link_download" id="link_download" value="{{ old('link_download') }}" placeholder="https://store.steampowered.com/..." class="w-full bg-gray-800/50 border-gray-700/50 rounded-lg focus:ring-indigo-500 focus:border-indigo-500" required>
                    </div>

                     <div class="mt-6">
                        <label for="link_trailer" class="block text-sm font-medium text-gray-300 mb-2">Link Trailer (Embed YouTube)</label>
                        <input type="url" name="link_trailer" id="link_trailer" value="{{ old('link_trailer') }}" placeholder="https://www.youtube.com/embed/..." class="w-full bg-gray-800/50 border-gray-700/50 rounded-lg focus:ring-indigo-500 focus:border-indigo-500">
                    </div>

                    <div class="mt-6">
                        <label for="gambar_cover" class="block text-sm font-medium text-gray-300 mb-2">Cover Game</label>
                        <input type="file" name="gambar_cover" id="gambar_cover" class="w-full text-sm text-gray-400 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-gray-700 file:text-white hover:file:bg-gray-600" required>
                    </div>

                    <div class="mt-6">
                        <label for="screenshots" class="block ...">Screenshots</label>
                        <input type="file" name="screenshots[]" id="screenshots" multiple class="w-full text-sm text-gray-400 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-gray-700 file:text-white hover:file:bg-gray-600">
                    </div>
                </div>

                    <div class="md:col-span-2">
                        <label for="deskripsi" class="block text-sm font-medium text-gray-300 mb-2">Deskripsi</label>
                        <textarea name="deskripsi" id="deskripsi" rows="5" class="w-full bg-gray-800/50 border-gray-700/50 rounded-lg focus:ring-indigo-500 focus:border-indigo-500">{{ old('deskripsi') }}</textarea>
                    </div>
                    
                    <div class="md:col-span-2 pt-5 border-t border-gray-700/50">
                        <button type="submit" class="bg-indigo-600 text-white font-bold rounded-lg py-3 px-6 hover:bg-indigo-700 transition-colors">
                            Simpan Game
                        </button>
                    </div>
            </div>
        </form>
        </div>
    </div>
</x-app-layout>