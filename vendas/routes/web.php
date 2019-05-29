<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\DB;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/categorias', function() {
	$cats = DB::table('categorias')->get();
	foreach ($cats as $c) {
		echo "id: " . $c->id . "; ";
		echo "nome: " . $c->nome . "<br>";
	}

	echo "<hr>";

	$nomes = DB::table('categorias')->pluck('nome');
	foreach($nomes as $nome) {
		echo "$nome <br>";
	}

	echo "<hr>";

	$cats = DB::table('categorias')->where('id', 1)->get();
	foreach ($cats as $c) {
		echo "id: " . $c->id . "; ";
		echo "nome: " . $c->nome . "<br>";
	}

	echo "<hr>";

	$cat = DB::table('categorias')->where('id', 3)->first();
	echo "id: " . $cat->id . "; ";
	echo "nome: " . $cat->nome . "<br>";

	echo "<hr>";

	echo "<p>Retorna um array utilizando um like.</p>";
	$cats = DB::table('categorias')->where('nome', 'like', 'p%')->get();
	foreach ($cats as $c) {
		echo "id: " . $c->id . "; ";
		echo "nome: " . $c->nome . "<br>";
	}

	echo "<hr>";

	echo "<p>Sentenças lógicas.</p>";
	$cats = DB::table('categorias')->where('id', 1)->orWhere('id', 2)->get();
	foreach ($cats as $c) {
		echo "id: " . $c->id . "; ";
		echo "nome: " . $c->nome . "<br>";
	}

	echo "<hr>";

	echo "<p>Intervalos.</p>";
	$cats = DB::table('categorias')->whereBetween('id', [1,3])->get();
	foreach ($cats as $c) {
		echo "id: " . $c->id . "; ";
		echo "nome: " . $c->nome . "<br>";
	}

	echo "<hr>";

	echo "<p>Intervalos - Negação.</p>";
	$cats = DB::table('categorias')->whereNotBetween('id', [1,3])->get();
	foreach ($cats as $c) {
		echo "id: " . $c->id . "; ";
		echo "nome: " . $c->nome . "<br>";
	}

	echo "<hr>";

	echo "<p>Intervalos - WhereIn.</p>";
	$cats = DB::table('categorias')->whereIn('id', [1,3, 4])->get();
	foreach ($cats as $c) {
		echo "id: " . $c->id . "; ";
		echo "nome: " . $c->nome . "<br>";
	}

	echo "<hr>";

	echo "<p>Intervalos - WhereNotIn.</p>";
	$cats = DB::table('categorias')->whereNotIn('id', [1,3,4])->get();
	foreach ($cats as $c) {
		echo "id: " . $c->id . "; ";
		echo "nome: " . $c->nome . "<br>";
	}

	echo "<hr>";

	echo "<p>Where And</p>";
	$cats = DB::table('categorias')->where([
		['id', 1],
		['nome', 'Informática']
	])->get();
	foreach ($cats as $c) {
		echo "id: " . $c->id . "; ";
		echo "nome: " . $c->nome . "<br>";
	}

	echo "<hr>";

	echo "<p>Ordenando por nome</p>";
	$cats = DB::table('categorias')->orderBy('nome')->get();
	foreach ($cats as $c) {
		echo "id: " . $c->id . "; ";
		echo "nome: " . $c->nome . "<br>";
	}

	echo "<hr>";

	echo "<p>Ordenando por decrescente</p>";
	$cats = DB::table('categorias')->orderBy('nome', 'desc')->get();
	foreach ($cats as $c) {
		echo "id: " . $c->id . "; ";
		echo "nome: " . $c->nome . "<br>";
	}
});

Route::get('/novascategorias', function () {
	DB::table('categorias')->insert([
		['nome'=>'Cama, Mesa e Banho'],
		['nome'=>'PET'],
		['nome'=>'Farmácia'],
		['nome'=>'Cozinha']
	]);
});

Route::get('/novascategorias', function () {
	$id = DB::table('categorias')->insertGetId(
		['nome'=>'Carros']
	);
	echo "Novo ID = $id <br>";
});

Route::get('/atualizandocategorias', function () {
	$cats = DB::table('categorias')->where('id', 1)->first();
	echo "<p>Antes da atualização</p>";
	echo "id: " . $cats->id . "; ";
	echo "nome: " . $cats->nome . "<br>";

	echo "<p>Atualizando dados...</p>";
	DB::table('categorias')->where('id', 1)
		->update(['nome' => 'Informática & Eletrônica & Tecnologia']);
	$cats = DB::table('categorias')->where('id', 1)->first();
	echo "id: " . $cats->id . "; ";
	echo "nome: " . $cats->nome . "<br>";
});

Route::get('/removendocategorias', function() {
	$cats = DB::table('categorias')->get();
	echo "<p>Antes da exclusão</p>";

	foreach($cats as $c) {
		echo "id: " . $c->id . "; ";
		echo "nome: " . $c->nome . "<br>";
	}

	echo "<hr>";

	echo "<p>Excluindo dados...</p>";
	DB::table('categorias')->where('id', 9)
		->delete();
	$cats = DB::table('categorias')->get();
	foreach($cats as $c) {
		echo "id: " . $c->id . "; ";
		echo "nome: " . $c->nome . "<br>";
	}
});