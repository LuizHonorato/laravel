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
use App\Categoria;
use App\Produto;

Route::get('/categorias', function () {
    $cats = Categoria::all();
    if (count($cats) === 0)
    	echo "<h4>Você não possui categorias cadastradas.</h4>";
    else {
    	foreach ($cats as $c) {
    		echo "<p>" . $c->id . " - " . $c->nome . "</p>";
    	}
    }
});

Route::get('/produtos', function () {
    $prods = Produto::all();
    if (count($prods) === 0)
    	echo "<h4>Você não possui nenhum produto cadastrado.</h4>";
    else {
    	echo "<table>";
    	echo "<thead><tr><td>Nome</td><td>Estoque</td><td>Preço</td><td>Categoria</td></tr></thead>";
    	foreach ($prods as $p) {
    		echo "<tr>";
    		echo "<td>" . $p->nome . "</td>";
    		echo "<td>" . $p->estoque . "</td>";
    		echo "<td>" . $p->preco . "</td>";
    		echo "<td>" . $p->categoria->nome . "</td>";
    	}
    }
});

Route::get('/categoriasprodutos', function () {
    $cats = Categoria::all();
    if (count($cats) === 0)
    	echo "<h4>Você não possui categorias cadastradas.</h4>";
    else {
    	foreach ($cats as $c) {
    		echo "<p>" . $c->id . " - " . $c->nome . "</p>";

    		$produtos = $c->produtos;

    		if (count($produtos) > 0) {
    			echo "<ul>";
    				foreach ($produtos as $p) {
    					echo "<li>" . $p->nome . "</li>";
    				}
    			echo "</ul>";
    		}
    	}
    }
});

Route::get('/categoriasprodutos/json', function () {
	//Lazy Loading
	//$cats = Categoria::all();

	//Eagler Loading
	$cats = Categoria::with('produtos')->get();
	return $cats->toJson();
});

Route::get('/adicionarproduto', function () {
	$c = Categoria::find(6);
	$p = new Produto();
	$p->nome = "Monitor Dell";
	$p->estoque = 10;
	$p->preco = 100;
	$p->categoria()->associate($c);
	$p->save();
	return $p->toJson();
});

Route::get('/adicionarnovoproduto/{catid}', function ($catid) {
	$cat = Categoria::with('produtos')->find($catid);

	$p = new Produto();
	$p->nome = "Monitor HP";
	$p->estoque = 10;
	$p->preco = 85;

	if(isset($cat)) {
		$cat->produtos()->save($p);
	}
	$cat->load('produtos');
	return $cat->toJson();

});
