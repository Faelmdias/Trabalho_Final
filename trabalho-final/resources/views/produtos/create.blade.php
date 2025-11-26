@extends('layouts.app')

@section('title', 'Novo Produto')

@section('content')
<div class="card">
    <h2 style="margin-bottom: 20px;">Novo Produto</h2>
    
    <form method="POST" action="{{ route('produtos.store') }}" enctype="multipart/form-data">
        @csrf
        
        <div class="form-group">
            <label>Nome:</label>
            <input type="text" name="nome" value="{{ old('nome') }}" required>
        </div>

        <div class="form-group">
            <label>Descrição:</label>
            <textarea name="descricao" rows="4">{{ old('descricao') }}</textarea>
        </div>

        <div class="form-group">
            <label>Categoria:</label>
            <select name="categoria_id" required>
                <option value="">Selecione uma categoria</option>
                @foreach($categorias as $categoria)
                    <option value="{{ $categoria->id }}" {{ old('categoria_id') == $categoria->id ? 'selected' : '' }}>
                        {{ $categoria->nome }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Preço:</label>
            <input type="number" name="preco" step="0.01" value="{{ old('preco') }}" required>
        </div>

        <div class="form-group">
            <label>Quantidade em Estoque:</label>
            <input type="number" name="quantidade_estoque" value="{{ old('quantidade_estoque') }}" required>
        </div>

        <div class="form-group">
            <label>Imagem (PNG ou JPG):</label>
            <input type="file" name="imagem" accept="image/png,image/jpeg,image/jpg">
        </div>

        <div style="margin-top: 20px;">
            <button type="submit" class="btn btn-success">Salvar</button>
            <a href="{{ route('produtos.index') }}" class="btn">Cancelar</a>
        </div>
    </form>
</div>
@endsection
