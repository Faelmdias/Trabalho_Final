@extends('layouts.app')

@section('title', 'Editar Produto')

@section('content')
<div class="card">
    <h2 style="margin-bottom: 20px;">Editar Produto</h2>
    
    <form method="POST" action="{{ route('produtos.update', $produto) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label>Nome:</label>
            <input type="text" name="nome" value="{{ old('nome', $produto->nome) }}" required>
        </div>

        <div class="form-group">
            <label>Descrição:</label>
            <textarea name="descricao" rows="4">{{ old('descricao', $produto->descricao) }}</textarea>
        </div>

        <div class="form-group">
            <label>Categoria:</label>
            <select name="categoria_id" required>
                <option value="">Selecione uma categoria</option>
                @foreach($categorias as $categoria)
                    <option value="{{ $categoria->id }}" {{ old('categoria_id', $produto->categoria_id) == $categoria->id ? 'selected' : '' }}>
                        {{ $categoria->nome }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Preço:</label>
            <input type="number" name="preco" step="0.01" value="{{ old('preco', $produto->preco) }}" required>
        </div>

        <div class="form-group">
            <label>Quantidade em Estoque:</label>
            <input type="number" name="quantidade_estoque" value="{{ old('quantidade_estoque', $produto->quantidade_estoque) }}" required>
        </div>

        @if($produto->imagem)
            <div style="margin-bottom: 10px;">
                <img src="{{ asset('storage/' . $produto->imagem) }}" alt="{{ $produto->nome }}" style="max-width: 200px; border-radius: 8px;">
                <p style="margin-top: 5px; font-size: 14px; color: #666;">Imagem atual</p>
            </div>
        @endif

        <div class="form-group">
            <label>Nova Imagem (PNG ou JPG):</label>
            <input type="file" name="imagem" accept="image/png,image/jpeg,image/jpg">
        </div>

        <div style="margin-top: 20px;">
            <button type="submit" class="btn btn-success">Atualizar</button>
            <a href="{{ route('produtos.index') }}" class="btn">Cancelar</a>
        </div>
    </form>
</div>
@endsection
