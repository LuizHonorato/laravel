@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col-6">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Nome da página" id="pagina" name="pagina">
                    <div class="input-group-append">
                        <button class="btn btn-primary" id="checar_rota" role="button">Verificar</button>
                    </div>
            </div>
        </div>
    </div>

    <div class="row">
            <div class="col-6">
                <p class="h6 " id="mensagem_pagina"></p>
            </div>
    
        </div>

    <div class="row">
        <div class="col-6">
            <input type="text" class="form-control" id="url" name="url" disabled>
            <button type="submit" class="btn btn-success mb3" id="cadastra_pagina" disabled>Salvar</button>
        </div>

    </div>
    

@endsection