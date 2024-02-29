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
    <title>SectoTeca</title>
</head>
<body>
    @include('header')
    <div class="container mt-4">
        <div class="card">
            <div class="card-header">
                <h2>Editar Conteúdo</h2>
            </div>
            <div class="card-body">
                <form action="{{ route('conteudos.update', [$playlist->id, $conteudo->id]) }}" method="post">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="titulo">Título:</label>
                        <input type="text" name="titulo" id="titulo" class="form-control" value="{{ $conteudo->titulo }}" required>
                    </div>

                    <div class="form-group">
                        <label for="url">URL:</label>
                        <input type="text" name="url" id="url" class="form-control" value="{{ $conteudo->url }}" required>
                    </div>

                    <div class="form-group">
                        <label for="autor">Autor:</label>
                        <input type="text" name="autor" id="autor" class="form-control" value="{{ $conteudo->autor }}" required>
                    </div>
                </form>
                <button type="submit" class="btn btn-primary">Atualizar Conteúdo</button>
                <a href="{{ route('playlists.conteudos', $playlist->id) }}" class="btn btn-secondary">Cancelar</a> 
            </div>
        </div>
    </div>


</body>
</html>
    
    
    
    