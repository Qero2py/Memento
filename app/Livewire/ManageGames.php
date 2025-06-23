<?php

namespace App\Livewire;

use App\Models\Game;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithPagination;

class ManageGames extends Component
{
    use WithPagination;

    public string $search = '';

    public string $sortField = 'created_at';
    public string $sortDirection = 'desc';

    public function sortBy(string $field)
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortDirection = 'asc';
        }
        $this->sortField = $field;
    }

    public function delete(Game $game)
    {
        if ($game->gambar_cover) {
            Storage::disk('public')->delete($game->gambar_cover);
        }

        $game->delete();

        session()->flash('success', 'Game berhasil dihapus!');
    }

    public function render()
    {
        $games = Game::query()
            ->where('judul', 'like', '%'.$this->search.'%')
            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate(10);

        return view('livewire.manage-games', [
            'games' => $games,
        ]);
    }
}