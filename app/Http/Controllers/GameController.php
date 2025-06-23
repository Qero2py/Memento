<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $games = Game::latest()->get();

        return view('admin.games.index', ['games' => $games]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.games.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'developer' => 'nullable|string',
            'publisher' => 'nullable|string',
            'tanggal_rilis' => 'nullable|date',
            'genre' => 'required|string',
            'gambar_cover' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'link_download' => 'required|url',
            'link_trailer' => 'nullable|url',
            'deskripsi' => 'nullable|string',
            'screenshots' => 'nullable|array',
            'screenshots.*' => 'image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        if ($request->hasFile('screenshots')) {
            $screenshotPaths = [];
            foreach ($request->file('screenshots') as $file) {
                $path = $file->store('screenshots', 'public');
                $screenshotPaths[] = $path;
            }
            $validated['screenshots'] = $screenshotPaths;
        }

        if ($request->hasFile('gambar_cover')) {
            $path = $request->file('gambar_cover')->store('covers', 'public');
            $validated['gambar_cover'] = $path;
        }

        Game::create($validated);

        return redirect()->route('home')->with('success', 'Game berhasil ditambahkan!');
    }


    /**
     * Display the specified resource.
     */
    public function show(Game $game)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Game $game)
    {
        return view('admin.games.edit', ['game' => $game]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Game $game)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'developer' => 'nullable|string',
            'publisher' => 'nullable|string',
            'tanggal_rilis' => 'nullable|date',
            'genre' => 'required|string',
            'gambar_cover' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'link_trailer' => 'nullable|url',
            'screenshots' => 'nullable|array',
            'screenshots.*' => 'image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'deskripsi' => 'nullable|string',
        ]);

        if ($request->hasFile('gambar_cover')) {
            if ($game->gambar_cover) {
                Storage::disk('public')->delete($game->gambar_cover);
            }
            $path = $request->file('gambar_cover')->store('covers', 'public');
            $validated['gambar_cover'] = $path;
        }

        if ($request->hasFile('screenshots')) {
        if ($game->screenshots) {
            foreach ($game->screenshots as $oldScreenshot) {
                Storage::disk('public')->delete($oldScreenshot);
            }
        }

        $screenshotPaths = [];
        foreach ($request->file('screenshots') as $file) {
            $path = $file->store('screenshots', 'public');
            $screenshotPaths[] = $path;
        }
        $validated['screenshots'] = $screenshotPaths;
    }

        $game->update($validated);

        return redirect()->route('admin.games.index')->with('success', 'Game berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Game $game)
    {
        if ($game->gambar_cover) {
            Storage::disk('public')->delete($game->gambar_cover);
        }

        $game->delete();

        return redirect()->route('admin.games.index')->with('success', 'Game berhasil dihapus!');
    }
}