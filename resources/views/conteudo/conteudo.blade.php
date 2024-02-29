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
                <h2>Playlist: {{ $playlist->titulo }}</h2>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Título</th>
                            <th>URL</th>
                            <th>Autor</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($conteudos as $conteudo)
                            <tr>
                                <td>{{ $conteudo->titulo }}</td>
                                <td>{{ $conteudo->url }}</td>
                                <td>{{ $conteudo->autor }}</td>
                                <td>
                                    <a href="{{ route('conteudos.edit', [$playlist->id, $conteudo->id]) }}" class="btn btn-sm btn-primary" title="Editar">Editar</a>
                                    <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $conteudo->id }}">Excluir</button>
                                    <div class="modal fade" id="deleteModal{{ $conteudo->id }}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title text-danger" id="deleteModalLabel">Confirmar Exclusão</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Tem certeza de que deseja excluir este conteúdo?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                    <form action="{{ route('conteudos.destroy', [$playlist->id, $conteudo->id]) }}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Excluir</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <a href="{{ route('conteudos.create', $playlist->id) }}" class="btn btn-success mb-3">Adicionar Conteúdo</a>
            </div>
        </div>
    </div>
    <div class="paginate">
        @if ($conteudos->lastPage() > 1 && $conteudos->total() > 9)
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item {{ ($conteudos->currentPage() == 1) ? 'disabled' : '' }}">
                        <a class="page-link" href="{{ $conteudos->url(1) }}" aria-label="Previous">
                            <span aria-hidden="true">«</span>
                        </a>
                    </li>
                    @for ($i = 1; $i <= $conteudos->lastPage(); $i++)
                        <li class="page-item {{ ($conteudos->currentPage() == $i) ? 'active' : '' }}">
                            <a class="page-link" href="{{ $conteudos->url($i) }}">{{ $i }}</a>
                        </li>
                    @endfor
                    <li class="page-item {{ ($conteudos->currentPage() == $conteudos->lastPage()) ? 'disabled' : '' }}">
                        <a class="page-link" href="{{ $conteudos->url($conteudos->currentPage() + 1) }}" aria-label="Next">
                            <span aria-hidden="true">»</span>
                        </a>
                    </li>
                </ul>
            </nav>
        @endif
    </div>
    
</body>
</html>

    