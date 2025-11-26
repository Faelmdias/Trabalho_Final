@extends('layouts.app')

@section('title', 'Categorias')

@section('content')
<div class="card">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <h2>Lista de Categorias</h2>
        <a href="{{ route('categorias.create') }}" class="btn btn-success">Nova Categoria</a>
    </div>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Nº Produtos</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse($categorias as $categoria)
                <tr>
                    <td>{{ $categoria->id }}</td>
                    <td>{{ $categoria->nome }}</td>
                    <td>{{ $categoria->descricao ?? '-' }}</td>
                    <td>{{ $categoria->produtos_count }}</td>
                    <td>
                        <a href="{{ route('categorias.edit', $categoria) }}" class="btn" style="padding: 5px 10px;">Editar</a>
                        <form method="POST" action="{{ route('categorias.destroy', $categoria) }}" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" style="padding: 5px 10px;" onclick="return confirm('Tem certeza?')">Excluir</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" style="text-align: center;">Nenhuma categoria cadastrada</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div style="margin-top: 20px;">
        {{ $categorias->links() }}
    </div>
</div>
@endsection
