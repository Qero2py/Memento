<?php

namespace App\Http\Controllers;

use App\Models\Game; // <-- Import model Game
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    /**
     * Menampilkan halaman wishlist milik pengguna.
     */
    public function index()
    {
        // Ambil game yang ada di wishlist milik pengguna yang sedang login
        // Urutkan dari yang terbaru ditambahkan
        $games = auth()->user()->wishlist()->latest()->get();

        // Tampilkan view 'wishlist' dan kirim data games
        return view('wishlist', ['games' => $games]);
    }

    /**
     * Menambah atau menghapus game dari wishlist pengguna.
     */
    public function toggle(Game $game)
    {
        // 'toggle' adalah fungsi ajaib dari Laravel untuk hubungan many-to-many.
        // Jika relasi sudah ada, ia akan menghapusnya (detach).
        // Jika belum ada, ia akan menambahkannya (attach).
        auth()->user()->wishlist()->toggle($game->id);

        // Kembalikan pengguna ke halaman sebelumnya dengan pesan status.
        return back()->with('status', 'Wishlist berhasil diperbarui!');
    }
}