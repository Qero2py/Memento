<?php

namespace App\Livewire;

use App\Models\Game;
use Livewire\Component;
use Livewire\Attributes\Url; // Import class Url

class GameCatalog extends Component
{
    #[Url(except: '')]
    public string $search = '';

    public function render()
    {
        $games = Game::query()
            ->where('judul', 'like', '%'.$this->search.'%')
            ->latest()
            ->get();

        return view('livewire.game-catalog', [
            'games' => $games,
        ]);
    }
}