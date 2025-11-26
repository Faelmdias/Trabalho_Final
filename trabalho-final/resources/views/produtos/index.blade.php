@extends('layouts.app')

@section('title', 'Produtos')

@section('content')
<div class="card">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <h2>Lista de Produtos</h2>
        <a href="{{ route('produtos.create') }}" class="btn btn-success">Novo Produto</a>
    </div>

    @if($ultimaCategoria)
        <p style="margin-bottom: 15px; color: #666;">
            Última categoria visualizada: <strong>{{ $ultimaCategoria }}</strong>
        </p>
    @endif

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Categoria</th>
                <th>Preço</th>
                <th>Estoque</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse($produtos as $produto)
                <tr>
                    <td>{{ $produto->id }}</td>
                    <td>{{ $produto->nome }}</td>
                    <td>{{ $produto->categoria->nome }}</td>
                    <td>R$ {{ number_format($produto->preco, 2, ',', '.') }}</td>
                    <td>{{ $produto->quantidade_estoque }}</td>
                    <td>
                        <a href="{{ route('produtos.show', $produto) }}" class="btn" style="padding: 5px 10px;">Ver</a>
                        <a href="{{ route('produtos.edit', $produto) }}" class="btn" style="padding: 5px 10px;">Editar</a>
                        <form method="POST" action="{{ route('produtos.destroy', $produto) }}" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" style="padding: 5px 10px;" onclick="return confirm('Tem certeza?')">Excluir</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" style="text-align: center;">Nenhum produto cadastrado</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div style="margin-top: 20px;">
        {{ $produtos->links() }}
    </div>
</div>
@endsection
