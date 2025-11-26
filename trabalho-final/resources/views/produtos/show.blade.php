@extends('layouts.app')

@section('title', 'Detalhes do Produto')

@section('content')
<div class="card">
    <h2 style="margin-bottom: 20px;">Detalhes do Produto</h2>
    
    @if($produto->imagem)
        <div style="margin-bottom: 20px;">
            <img src="{{ asset('storage/' . $produto->imagem) }}" alt="{{ $produto->nome }}" style="max-width: 300px; border-radius: 8px;">
        </div>
    @endif

    <p><strong>Nome:</strong> {{ $produto->nome }}</p>
    <p><strong>Descrição:</strong> {{ $produto->descricao ?? 'Sem descrição' }}</p>
    <p><strong>Categoria:</strong> {{ $produto->categoria->nome }}</p>
    <p><strong>Preço:</strong> R$ {{ number_format($produto->preco, 2, ',', '.') }}</p>
    <p><strong>Estoque:</strong> {{ $produto->quantidade_estoque }} unidades</p>

    <div style="margin-top: 20px;">
        <a href="{{ route('produtos.edit', $produto) }}" class="btn">Editar</a>
        <a href="{{ route('produtos.index') }}" class="btn">Voltar</a>
    </div>
</div>
@endsection
