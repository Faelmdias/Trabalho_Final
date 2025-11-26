<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Usuario;
use App\Models\Categoria;
use App\Models\Produto;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Criar usuário admin
        Usuario::create([
            'nome' => 'Administrador',
            'email' => 'admin@teste.com',
            'senha' => Hash::make('123456')
        ]);

        // Criar categorias
        $categorias = [
            ['nome' => 'Sementes', 'descricao' => 'Sementes para plantio'],
            ['nome' => 'Fertilizantes', 'descricao' => 'Adubos e fertilizantes'],
            ['nome' => 'Ferramentas', 'descricao' => 'Ferramentas agrícolas'],
            ['nome' => 'Defensivos', 'descricao' => 'Produtos para controle de pragas'],
        ];

        foreach ($categorias as $cat) {
            Categoria::create($cat);
        }

        // Criar alguns produtos de exemplo
        Produto::create([
            'nome' => 'Semente de Milho',
            'descricao' => 'Semente de milho híbrido de alta produtividade',
            'preco' => 150.00,
            'quantidade_estoque' => 100,
            'categoria_id' => 1
        ]);

        Produto::create([
            'nome' => 'Adubo NPK',
            'descricao' => 'Fertilizante NPK 10-10-10',
            'preco' => 85.00,
            'quantidade_estoque' => 50,
            'categoria_id' => 2
        ]);
    }
}
