<?php

namespace App\Http\Controllers;

use App\Models\Playlist;
use Illuminate\Http\Request;

class PlaylistController extends Controller
{
    public function index()
    {
        $playlists = Playlist::paginate(9); 
        return view('index', compact('playlists'));
    }
    

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required',
            'descricao' => 'required',
            'autor' => 'required',
        ]);

        Playlist::create([
            'titulo' => $request->titulo,
            'descricao' => $request->descricao,
            'autor' => $request->autor,
        ]);

        return redirect()->route('index')->with('success', 'Playlist criada com sucesso!');
    }


    public function show($id)
    {
        // Lógica para exibir uma playlist específica
        $playlist = Playlist::findOrFail($id);
        return view('show', compact('playlist'));
    }

    public function edit(Playlist $playlist)
    {
        return view('edit', compact('playlist'));
    }

    public function update(Request $request, Playlist $playlist)
    {
        $request->validate([
            'titulo' => 'required',
            'descricao' => 'required',
            'autor' => 'required',
        ]);

        $playlist->update([
            'titulo' => $request->titulo,
            'descricao' => $request->descricao,
            'autor' => $request->autor,
        ]);

        return redirect()->route('index')->with('success', 'Playlist atualizada com sucesso!');
    }

    public function destroy(Playlist $playlist)
    {
        $playlist->delete();

        return redirect()->route('index')->with('success', 'Playlist excluída com sucesso!');
    }
}
