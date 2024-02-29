<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <title>Sectoteca</title>
</head>
<body>
    @include('header')
    <div class="container mt-4">
        <div class="card">
            <div class="card-header">
                <h2>Editar Playlist</h2>
            </div>
            <div class="card-body">
                <form method="post" action="{{ route('playlists.update', $playlist->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="titulo" class="form-label">Título:</label>
                        <input type="text" class="form-control" id="titulo" name="titulo" value="{{ $playlist->titulo }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="descricao" class="form-label">Descrição:</label>
                        <textarea class="form-control" id="descricao" name="descricao" rows="3" required>{{ $playlist->descricao }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="autor" class="form-label">Autor:</label>
                        <input type="text" class="form-control" id="autor" name="autor" value="{{ $playlist->autor }}" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Atualizar Playlist</button>
                    <a href="{{ route('index') }}" class="btn btn-danger">Cancelar</a>
                </form>
            </div>
        </div>
    </div>
    
</body>
</html>

