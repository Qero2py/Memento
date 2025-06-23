<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;

class PortalController extends Controller
{
    public function index()
    {
        $games = Game::latest()->get();
        return view('home', ['games' => $games]);
    }

    public function catalog(Request $request)
    {
        $query = Game::query();

        if ($request->has('search') && $request->input('search') != '') {
            $query->where('judul', 'like', '%' . $request->input('search') . '%');
        }

        $games = $query->latest()->get();

        return view('catalog', [
            'games' => $games
        ]);
    }


    public function show(Game $game)
    {
        return view('detail', [
            'game' => $game,
            'coverUrl' => asset('storage/' . $game->gambar_cover),
        ]);
    }
}