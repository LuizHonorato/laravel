<?php

use App\Categoria;

Route::get('/', function () {
    $categorias = Categoria::all();
    foreach ($categorias as $c) {
    	echo "id: " . $c->id . ', ';
    	echo "nome: " . $c->nome . "<br>";
    }
});

Route::get('/inserir/{nome}', function ($nome) {
	$cat = new Categoria();
	$cat->nome = $nome;
	$cat->save();
	return redirect('/');
});

Route::get('/categoria/{id}', function ($id) {
	$cat = Categoria::find($id);
	if(isset($cat)) {
		echo "id: " . $cat->id . ', ';
    	echo "nome: " . $cat->nome . "<br>";
	} 
	else {
		echo "<h1>Categoria não encontrada.</h1>";
	}
});

Route::get('/atualizar/{id}/{nome}', function ($id, $nome) {
	$cat = Categoria::find($id);
	if(isset($cat)) {
    	$cat->nome = $nome;
    	$cat->save();
    	return redirect('/');
	} 
	else {
		echo "<h1>Categoria não encontrada.</h1>";
	}
});

Route::get('/remover/{id}', function ($id) {
	$cat = Categoria::find($id);
	if(isset($cat)) {
    	$cat->delete();
    	return redirect('/');
	} 
	else {
		echo "<h1>Categoria não encontrada.</h1>";
	}
});

Route::get('/categoriapornome/{nome}', function ($nome) {
	$cats = Categoria::where('nome', $nome)->get();
	foreach ($cats as $c) {
		echo "id: " . $c->id . ', ';
    	echo "nome: " . $c->nome . "<br>";
	}
});

Route::get('/categoriaidmaiorque/{id}', function ($id) {
	$cats = Categoria::where('id', '>', $id)->get();
	foreach ($cats as $c) {
		echo "id: " . $c->id . ', ';
    	echo "nome: " . $c->nome . "<br>";
	}
	$count = Categoria::where('id', '>=', $id)->count();
	echo "Count: $count";

	$max = Categoria::where('id', '>=', $id)->max('id');
	echo "Max: $max";

});

Route::get('/ids123', function () {
	$cats = Categoria::find([1,2,4]);
	foreach ($cats as $c) {
		echo "id: " . $c->id . ', ';
    	echo "nome: " . $c->nome . "<br>";
	}
});

Route::get('/todas', function () {
    $categorias = Categoria::withTrashed()->get();
    foreach ($categorias as $c) {
    	echo "id: " . $c->id . ', ';
    	echo "nome: " . $c->nome;
    	if ($c->trashed())
    		echo ' (apagado)<br>';
    	else
    		echo '<br>';
    }
});

Route::get('/ver/{id}', function ($id) {
	//$cat = Categoria::withTrashed()->find($id);
	$cat = Categoria::withTrashed()->where('id', $id)->get()->first();
	if(isset($cat)) {
		echo "id: " . $cat->id . ', ';
    	echo "nome: " . $cat->nome . "<br>";
	} 
	else {
		echo "<h1>Categoria não encontrada.</h1>";
	}
});

Route::get('/somenteapagadas', function () {
    $categorias = Categoria::onlyTrashed()->get();
    foreach ($categorias as $c) {
    	echo "id: " . $c->id . ', ';
    	echo "nome: " . $c->nome;
    	if ($c->trashed())
    		echo ' (apagado)<br>';
    	else
    		echo '<br>';
    }
});

Route::get('/restaurar/{id}', function ($id) {
	$cat = Categoria::withTrashed()->find($id);
	//$cat = Categoria::withTrashed()->where('id', $id)->get()->first();
	if(isset($cat)) {
		$cat->restore();
		echo "Categoria restaurada: " . $cat->id . "<br>";
    	echo "<a href=\"/\">Listar todas";
	} 
	else {
		echo "<h1>Categoria não encontrada.</h1>";
	}
});

Route::get('/apagarpermanente/{id}', function ($id) {
	$cat = Categoria::withTrashed()->find($id);
	//$cat = Categoria::withTrashed()->where('id', $id)->get()->first();
	if(isset($cat)) {
		$cat->forceDelete();
		return redirect('/todas');
	} 
	else {
		echo "<h1>Categoria não encontrada.</h1>";
	}
});