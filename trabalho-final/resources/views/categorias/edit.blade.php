@extends('layouts.app')

@section('title', 'Editar Categoria')

@section('content')
<div class="card">
    <h2 style="margin-bottom: 20px;">Editar Categoria</h2>
    
    <form method="POST" action="{{ route('categorias.update', $categoria) }}">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label>Nome:</label>
            <input type="text" name="nome" value="{{ old('nome', $categoria->nome) }}" required>
        </div>

        <div class="form-group">
            <label>Descrição:</label>
            <textarea name="descricao" rows="4">{{ old('descricao', $categoria->descricao) }}</textarea>
        </div>

        <div style="margin-top: 20px;">
            <button type="submit" class="btn btn-success">Atualizar</button>
            <a href="{{ route('categorias.index') }}" class="btn">Cancelar</a>
        </div>
    </form>
</div>
@endsection
