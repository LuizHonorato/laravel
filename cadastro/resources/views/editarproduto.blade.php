@extends('layout.app', ["current"=>"produtos"])

@section('body')
	<div class="card border">
		<div class="card-body">
			<form action="/produtos/{{$prod->id}}" method="POST">
				@csrf
				<div class="form-group">

					<label for="nomeProduto">Categoria</label>
					<select class="custom-select" id="categoriaProduto" name="categoriaProduto" aria-label="Categorias">
					    <option selected>Escolha uma categoria...</option>
					    @foreach($cats as $cat)
					    <option value="{{$cat->id}}">{{$cat->nome}}</option>
					    @endforeach
					</select>

					<label for="nomeProduto">Nome</label>
					<input type="text" name="nomeProduto" id="nomeProduto" 
						value="{{$prod->nome}}" placeholder="Nome da produto" class="form-control">

					<label for="quantEstoque">Estoque</label>
					<input type="number" name="quantEstoque" id="quantEstoque" 
						value="{{$prod->estoque}}" placeholder="Estoque" class="form-control">

					<label for="precoProduto">Preço</label>
					<div class="input-group mb-3">
					  <div class="input-group-prepend">
					    <span class="input-group-text">R$</span>
					  </div>
					  <input type="number" name="precoProduto" class="form-control" value="{{$prod->preco}}" aria-label="Preço">
					</div>

				</div>
				<button type="submit" class="btn btn-primary btn-sm">Salvar</button>
				<button type="cancel" class="btn btn-danger btn-sm">Cancelar</button>
			</form>
		</div>
	</div>
@endsection