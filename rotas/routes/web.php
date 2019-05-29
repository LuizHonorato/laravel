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

use Illuminate\Http\Request;

Route::get('/', function () {
    return "<h1>LARAVEL 5.6<h1>";
});

Route::get('/ola', function () {
    return "<h1>SEJA BEM-VINDO<h1>";
});

Route::get('/ola/sejabemvindo', function () {
    return "<h1>OLÁ Visitante, SEJA BEM-VINDO<h1>";
});

Route::get('/nome/{nome}/{sobrenome}', function ($nome, $sobrenome) {
	return "<h1>Olá, $nome $sobrenome</h1>";
});

Route::get('/seunomecomregra/{nome}/{n}', function ($nome, $n) {
	for($i=0;$i<$n;$i++) {
		echo "<h1>Ola, $nome! ($i)</h1>";
	}
})->where('n', '[0-9]+')->where('nome', '[A-Za-z]+');

Route::get('/seunomesemregra/{nome?}', function ($nome=null) {
	if(isset($nome)){
		echo "<h1>Ola, $nome!</h1>";
	}
	else {
		echo "Sem nome!";
	}
});


Route::prefix('app')->group(function() {
	Route::get("/", function() {
		return "Página principal do APP";
	});
	Route::get("/profile", function() {
		return "Página profile";
	});
	Route::get("/about", function() {
		return "Meu about";
	});
});

Route::redirect('/aqui', '/ola', 301);

/*Route::get('/hello', function () {
    return view('hello');
});*/

Route::view('/hello', 'hello');

Route::view('/viewnome', 'hellonome', 
			['nome'=>'Luiz', 'sobrenome'=>'Honorato']);

Route::get('/hellonome/{nome}/{sobrenome}', function($nome, $sn) {
	return view('hellonome', ['nome'=>$nome, 'sobrenome'=>$sn]);
});

Route::get('/rest/hello', function() {
	return "Hello (GET)";
});

Route::post('/rest/hello', function() {
	return "Hello (POST)";
});

Route::delete('/rest/hello', function() {
	return "Hello (DELETE)";
});

Route::put('/rest/hello', function() {
	return "Hello (PUT)";
});

Route::patch('/rest/hello', function() {
	return "Hello (PATCH)";
});

Route::options('/rest/hello', function() {
	return "Hello (OPTIONS)";
});

Route::post('/rest/imprimir', function(Request $req) {
	$nome = $req->input('nome');
	return "Hello $nome!!!";
});

Route::match(['get', 'post'], '/rest/hello2', function() {
	return "Olá mundo 2!";
});

Route::any('/rest/hello3', function() {
	return "Olá mundo 3!";
});

Route::get('/produtos', function() {
	echo "<h1>Produtos</h1>";
	echo "<ol>";
	echo "<li>Notebook</li>";
	echo "<li>Impressora</li>";
	echo "<li>Mouse</li>";
	echo "</ol>";
})->name('meusprodutos');

Route::get('/linkprodutos', function() {
	$url = route('meusprodutos');
	echo "<a href=\"" . $url . "\">Meus produtos</a>";
});

Route::get("/redirecionarprodutos", function() {
	return redirect()->route('meusprodutos');
});