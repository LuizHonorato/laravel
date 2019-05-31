<?php

use Illuminate\Database\Seeder;

class ProdutoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('produtos')->insert(
        	['nome' => 'Camiseta Polo', 'preco'=> 100,
        		'estoque'=> 10, 'categoria_id'=> 1]);

        DB::table('produtos')->insert(
        	['nome' => 'Calça Jeans', 'preco'=> 120,
        		'estoque'=> 10, 'categoria_id'=> 1]);

        DB::table('produtos')->insert(
        	['nome' => 'Camiseta Manga Longa', 'preco'=> 70,
        		'estoque'=> 6, 'categoria_id'=> 1]);

        DB::table('produtos')->insert(
        	['nome' => 'PC Games', 'preco'=> 56,
        		'estoque'=> 4, 'categoria_id'=> 2]);

        DB::table('produtos')->insert(
        	['nome' => 'Impressora', 'preco'=> 3000,
        		'estoque'=> 5, 'categoria_id'=> 6]);

        DB::table('produtos')->insert(
        	['nome' => 'Perfume 212 Masculino', 'preco'=> 400,
        		'estoque'=> 10, 'categoria_id'=> 3]);
    }
}
