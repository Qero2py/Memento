<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Game extends Model
{
    protected $fillable = [
    'judul',
    'deskripsi',
    'developer',
    'publisher',
    'tanggal_rilis',
    'genre',
    'gambar_cover',
    'link_download',
    'link_trailer',
    'screenshots',
    ];

    protected $casts = [
    'screenshots' => 'array',
];

    public function getEmbedUrlAttribute(): ?string
    {
        $url = $this->link_trailer;

        if (!$url) {
            return null;
        }

        preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url, $match);
        
        $youtube_id = $match[1] ?? null;

        return $youtube_id ? 'https://www.youtube.com/embed/' . $youtube_id : null;
    }

     public function wishlistedBy(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }
}