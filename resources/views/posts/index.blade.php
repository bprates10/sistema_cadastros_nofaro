@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            {{--@include('admin.sidebar')--}}

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Lista de Cadastros</div>
                    <div class="card-body">
                        <a href="{{ url('/posts/create') }}" class="btn btn-success btn-sm" title="Adicionar Novo">
                            <i class="fa fa-plus" aria-hidden="true"></i> Novo
                        </a>

                        <form method="GET" action="{{ url('/posts') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
                            <div class="input-group">
                                <input type="text" class="form-control" name="Procurar" placeholder="Buscar..." value="{{ request('search') }}">
                                <span class="input-group-append">
                                    <button class="btn btn-secondary" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </form>

                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nome</th>
                                        <th>E-Mail</th>
                                        <th>DDD</th>
                                        <th>Telefone</th>
                                        <th>Ação</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($posts as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->mail }}</td>
                                        <td>{{ $item->ddd }}</td>
                                        <td>{{ $item->phone }}</td>
                                        <td>
                                            <a href="{{ url('/posts/' . $item->id) }}" title="Visualizar"><button class="btn btn-info btn-sm">
                                                    <i class="fa fa-eye" aria-hidden="true"></i> Visualizar</button>
                                            </a>
                                            <a href="{{ url('/posts/' . $item->id . '/edit') }}" title="Editar"><button class="btn btn-primary btn-sm">
                                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>

                                            <form method="POST" action="{{ url('/posts' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Apagar"
                                                        onclick="return confirm(&quot;Deseja mesmo excluir o cadastro?&quot;)">
                                                    <i class="fa fa-trash-o" aria-hidden="true"></i> Apagar
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $posts->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
