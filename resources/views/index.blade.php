<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
        <h2>Playlists</h2>
        <div class="row">
            @foreach ($playlists as $playlist)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $playlist->titulo }}</h5>
                            <p class="card-text">{{ $playlist->descricao }}</p>
                            <p>Autor:</p>
                            <p class="car-text">{{ $playlist->autor}}</p>
                            <a href="{{ route('playlists.edit', $playlist->id) }}" class="btn btn-primary btn-sm" title="Editar">
                                Editar
                            </a>
                            
                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $playlist->id }}" title="Excluir">
                                Excluir Playlist
                            </button>
                            @if ($playlist->conteudos->count() > 0)
                            <a href="{{ route('playlists.conteudos', $playlist->id) }}" class="btn btn-primary btn-sm" title="Ver Conteúdos">
                                Ver Conteúdo
                            </a>
                        @else
                            <a href="{{ route('conteudos.create', $playlist->id) }}" class="btn btn-success btn-sm" title="Adicionar Conteúdo">
                                Adicionar Conteúdo
                            </a>
                        @endif
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="deleteModal{{ $playlist->id }}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title text-danger" id="deleteModalLabel">Confirmar Exclusão</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p class="text-muted">Tem certeza de que deseja excluir esta playlist?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                <form action="{{ route('playlists.destroy', $playlist->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Excluir</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                
            @endforeach
        </div>
        <div class="row mt-3">
            <div class="col-6">
                <a href="{{ route('playlists.create') }}" class="btn btn-success" data-bs-toggle="tooltip" data-bs-placement="top" title="Adicionar Playlist">
                    Adicionar Playlist
                </a>
            </div>
        </div>
    </div>
    <div class="paginate">
        @if ($playlists->lastPage() > 1 && $playlists->total() > 9)
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li class="page-item {{ ($playlists->currentPage() == 1) ? 'disabled' : '' }}">
                    <a class="page-link" href="{{ $playlists->url(1) }}" aria-label="Previous">
                        <span aria-hidden="true">«</span>
                    </a>
                </li>
                @for ($i = 1; $i <= $playlists->lastPage(); $i++)
                    <li class="page-item {{ ($playlists->currentPage() == $i) ? 'active' : '' }}">
                        <a class="page-link" href="{{ $playlists->url($i) }}">{{ $i }}</a>
                    </li>
                @endfor
                <li class="page-item {{ ($playlists->currentPage() == $playlists->lastPage()) ? 'disabled' : '' }}">
                    <a class="page-link" href="{{ $playlists->url($playlists->currentPage() + 1) }}" aria-label="Next">
                        <span aria-hidden="true">»</span>
                    </a>
                </li>
            </ul>
        </nav>
     @endif
    </div>
    
    
    @include('footer')

    <script>
        $(document).ready(function() {
            @foreach ($playlists as $playlist)
                $('#deleteModal{{ $playlist->id }}').modal({
                    show: false
                });
            @endforeach
        });
    </script>
</body>
</html>
