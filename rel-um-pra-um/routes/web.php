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

use App\Cliente;
use App\Endereco;

Route::get('/clientes', function () {
    $clientes = Cliente::all();
    foreach ($clientes as $c) {
    	echo "<p>ID: " . $c->id . "</p>";
    	echo "<p>Nome: " . $c->nome . "</p>";
    	echo "<p>Rua: " . $c->endereco->rua . "</p>";
    	echo "<p>Número: " . $c->endereco->numero . "</p>";
    	echo "<p>Bairro: " . $c->endereco->bairro . "</p>";
    	echo "<p>Cidade: " . $c->endereco->cidade . "</p>";
    	echo "<p>UF: " . $c->endereco->uf . "</p>";
    	echo "<p>CEP: " . $c->endereco->cep . "</p>";
    	echo "<hr>";
    }
});

Route::get('/enderecos', function () {
    $enderecos = Endereco::all();
    foreach ($enderecos as $e) {
    	echo "<p>ID do cliente: " . $e->cliente_id . "</p>";
    	echo "<p>Nome: " . $e->cliente->nome . "</p>";
    	echo "<p>Telefone: " . $e->cliente->telefone . "</p>";
    	echo "<p>Rua: " . $e->rua . "</p>";
    	echo "<p>Número: " . $e->numero . "</p>";
    	echo "<p>Bairro: " . $e->bairro . "</p>";
    	echo "<p>Cidade: " . $e->cidade . "</p>";
    	echo "<p>UF: " . $e->uf . "</p>";
    	echo "<p>CEP: " . $e->cep . "</p>";
    	echo "<hr>";
    }
});

Route::get('/inserir', function() {

	$c = new Cliente();
	$c->nome = "Luiz Henrique";
	$c->telefone = "01636386827";
	$c->save();

	$e = new Endereco();
	$e->rua = "Av. do Estado";
	$e->numero = "400";
	$e->bairro = "Centro";
	$e->cidade = "Ribeirão Preto";
	$e->uf = "SP";
	$e->cep = "14070480";

	$c->endereco()->save($e);

	$c = new Cliente();
	$c->nome = "Marcos";
	$c->telefone = "01636382456";
	$c->save();

	$e = new Endereco();
	$e->rua = "Rua das Techs";
	$e->numero = "456";
	$e->bairro = "Centro";
	$e->cidade = "Ribeirão Preto";
	$e->uf = "SP";
	$e->cep = "14070530";

	$c->endereco()->save($e);

});

Route::get('/clientes/json', function() {

	//Lazy Loading
	//$clientes = Cliente::all();

	//Eager Loading
	$clientes = Cliente::with(['endereco'])->get();
	return $clientes->toJson();
});

Route::get('/enderecos/json', function() {

	//Lazy Loading
	//$clientes = Cliente::all();

	//Eager Loading
	$enderecos = Endereco::with(['cliente'])->get();
	return $enderecos->toJson();
});