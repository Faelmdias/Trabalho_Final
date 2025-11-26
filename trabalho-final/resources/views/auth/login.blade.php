@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div class="card" style="max-width: 400px; margin: 50px auto;">
    <h2 style="margin-bottom: 20px;">Login</h2>
    
    <form method="POST" action="{{ route('login') }}">
        @csrf
        
        <div class="form-group">
            <label>Email:</label>
            <input type="email" name="email" value="{{ old('email') }}" required>
        </div>

        <div class="form-group">
            <label>Senha:</label>
            <input type="password" name="senha" required>
        </div>

        <button type="submit" class="btn btn-success" style="width: 100%;">Entrar</button>
    </form>

    <p style="margin-top: 20px; text-align: center;">
        Não tem conta? <a href="{{ route('register') }}">Cadastre-se</a>
    </p>
</div>
@endsection
