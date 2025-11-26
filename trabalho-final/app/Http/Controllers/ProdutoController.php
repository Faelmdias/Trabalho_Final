<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\Categoria;
use Illuminate\Support\Facades\Storage;

class ProdutoController extends Controller
{
    public function index(Request $request)
    {
        $produtos = Produto::with('categoria')->paginate(10);
        $ultimaCategoria = $request->cookie('ultima_categoria');
        
        return view('produtos.index', compact('produtos', 'ultimaCategoria'));
    }

    public function create()
    {
        $categorias = Categoria::all();
        return view('produtos.create', compact('categorias'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'preco' => 'required|numeric|min:0',
            'quantidade_estoque' => 'required|integer|min:0',
            'categoria_id' => 'required|exists:categorias,id',
            'imagem' => 'nullable|image|mimes:jpeg,jpg,png|max:2048'
        ]);

        if ($request->hasFile('imagem')) {
            $validated['imagem'] = $request->file('imagem')->store('produtos', 'public');
        }

        Produto::create($validated);

        return redirect()->route('produtos.index')
            ->with('success', 'Produto criado com sucesso!');
    }

    public function show(Produto $produto)
    {
        $cookie = cookie('ultima_categoria', $produto->categoria->nome, 60 * 24 * 30);
        
        return response()
            ->view('produtos.show', compact('produto'))
            ->withCookie($cookie);
    }

    public function edit(Produto $produto)
    {
        $categorias = Categoria::all();
        return view('produtos.edit', compact('produto', 'categorias'));
    }

    public function update(Request $request, Produto $produto)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'preco' => 'required|numeric|min:0',
            'quantidade_estoque' => 'required|integer|min:0',
            'categoria_id' => 'required|exists:categorias,id',
            'imagem' => 'nullable|image|mimes:jpeg,jpg,png|max:2048'
        ]);

        if ($request->hasFile('imagem')) {
            if ($produto->imagem) {
                Storage::disk('public')->delete($produto->imagem);
            }
            $validated['imagem'] = $request->file('imagem')->store('produtos', 'public');
        }

        $produto->update($validated);

        return redirect()->route('produtos.index')
            ->with('success', 'Produto atualizado com sucesso!');
    }

    public function destroy(Produto $produto)
    {
        if ($produto->imagem) {
            Storage::disk('public')->delete($produto->imagem);
        }
        
        $produto->delete();

        return redirect()->route('produtos.index')
            ->with('success', 'Produto excluído com sucesso!');
    }
}
