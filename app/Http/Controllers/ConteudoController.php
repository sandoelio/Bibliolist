<?php

namespace App\Http\Controllers;
use App\Models\Conteudo;
use App\Models\Playlist;


use Illuminate\Http\Request;

class ConteudoController extends Controller
{
    public function showConteudos(Playlist $playlist)
    {
        $conteudos = Conteudo::where('playlist_id', $playlist->id)->paginate(9);
    
        return view('conteudo.conteudo', compact('conteudos', 'playlist'));
    }
    

    public function create(Playlist $playlist)
    {
        return view('conteudo.create', compact('playlist'));
    }

    public function store(Request $request, Playlist $playlist)
    {
        $request->validate([
            'titulo' => 'required',
            'url' => 'required',
            'autor' => 'required',
        ]);

        $conteudo = new Conteudo([
            'titulo' => $request->get('titulo'),
            'url' => $request->get('url'),
            'autor' => $request->get('autor'),
        ]);

        $playlist->conteudos()->save($conteudo);

        return redirect()->route('playlists.conteudos', ['playlist' => $playlist->id])->with('success', 'Conteúdo adicionado com sucesso.');


    }

    public function edit(Playlist $playlist, Conteudo $conteudo)
    {
        return view('conteudo.edit', compact('playlist', 'conteudo'));
    }

    public function update(Request $request, Playlist $playlist, Conteudo $conteudo)
    {
        $request->validate([
            'titulo' => 'required',
            'url' => 'required',
            'autor' => 'required',
        ]);

        $conteudo->update([
            'titulo' => $request->get('titulo'),
            'url' => $request->get('url'),
            'autor' => $request->get('autor'),
        ]);

        return redirect()->route('playlists.conteudos', ['playlist' => $playlist->id])->with('success', 'Conteúdo adicionado com sucesso.');

    }

    public function destroy(Playlist $playlist, Conteudo $conteudo)
    {
        $conteudo->delete();

        return redirect()->route('playlists.conteudos', ['playlist' => $playlist->id])->with('success', 'Conteúdo adicionado com sucesso.');

    }
}
