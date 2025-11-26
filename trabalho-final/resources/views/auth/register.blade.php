@extends('layouts.app')

@section('title', 'Cadastro')

@section('content')
<div class="card" style="max-width: 400px; margin: 50px auto;">
    <h2 style="margin-bottom: 20px;">Cadastro</h2>
    
    <form method="POST" action="{{ route('register') }}">
        @csrf
        
        <div class="form-group">
            <label>Nome:</label>
            <input type="text" name="nome" value="{{ old('nome') }}" required>
        </div>

        <div class="form-group">
            <label>Email:</label>
            <input type="email" name="email" value="{{ old('email') }}" required>
        </div>

        <div class="form-group">
            <label>Senha:</label>
            <input type="password" name="senha" required>
        </div>

        <div class="form-group">
            <label>Confirmar Senha:</label>
            <input type="password" name="senha_confirmation" required>
        </div>

        <button type="submit" class="btn btn-success" style="width: 100%;">Cadastrar</button>
    </form>

    <p style="margin-top: 20px; text-align: center;">
        Já tem conta? <a href="{{ route('login') }}">Faça login</a>
    </p>
</div>
@endsection
