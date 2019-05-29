<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProdutoControlador extends Controller
{
    //
    public function listar() {
    	$produtos = [
    		"Notebook Asus i7 16GB",
    		"Mouse Microsoft",
    		"Monitor 21",
    		"Impressora HP",
    		"Disco SSD 512 GB"
    	];

    	return view('produtos', compact('produtos'));
    }

    public function secaoprodutos($palavra) {
    	return view('secao_produtos', compact('palavra'));
    }
}
