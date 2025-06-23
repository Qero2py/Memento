<?php

namespace App\Livewire;

use App\Models\Game;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class WishlistButton extends Component
{
    public Game $game;

    public bool $isWishlisted;

    public function mount()
    {
        $this->isWishlisted = Auth::check() && Auth::user()->wishlist->contains($this->game);
    }
    public function toggleWishlist()
    {
        if (!Auth::check()) {
            return $this->redirect(route('login'), navigate: true);
        }

        Auth::user()->wishlist()->toggle($this->game->id);

        $this->isWishlisted = !$this->isWishlisted;
    }

    public function render()
    {
        return view('livewire.wishlist-button');
    }
}