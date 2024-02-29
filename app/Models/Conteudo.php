<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conteudo extends Model
{
    use HasFactory;
    protected $fillable = ['titulo', 'url', 'autor', 'playlist_id'];

    public function playlist()
    {
        return $this->belongsTo(Playlist::class);
    }
}
