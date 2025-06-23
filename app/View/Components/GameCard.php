<?php

namespace App\View\Components;

use App\Models\Game;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class GameCard extends Component
{
    /**
     * Instance dari model Game.
     */
    public ?Game $game;

    /**
     * Membuat instance komponen.
     */
    public function __construct(?Game $game = null)
    {
        $this->game = $game;
    }

    /**
     * Mendapatkan view yang merepresentasikan komponen.
     */
    public function render(): View|Closure|string
    {
        return view('components.game-card');
    }
}