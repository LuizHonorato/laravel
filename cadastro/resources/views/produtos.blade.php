@extends('layout.app', ["current"=>"produtos"])

@section('body')
	<div class="card border">
		<div class="card-body">
			<h5 class="card-title">Cadastro de produtos</h5>
			@if(count($produtos) > 0)
			<table class="table table-ordered table-hover">
				<thead>
					<tr>
						<th>Código</th>
						<th>Nome do produto</th>
						<th>Categoria</th>
						<th>Estoque</th>
						<th>Preço</th>
						<th>Ações</th>
					</tr>
				</thead>
				<tbody>
					@foreach($produtos as $p)
						<tr>
							<td>{{$p->id}}</td>
							<td>{{$p->nome}}</td>
							<td>{{$p->categoria_id}}</td>
							<td>{{$p->estoque}}</td>
							<td>{{$p->preco}}</td>
							<td>
								<a href="/produtos/editar/{{$p->id}}" class="btn btn-sm btn-warning">Editar</a>
								<a href="/produtos/apagar/{{$p->id}}" class="btn btn-sm btn-danger">Apagar</a>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
			@endif
		</div>
		<div class="card-footer">
			<a href="/produtos/novo" class="btn btn-sm btn-success" role="button">Novo produto</a>
		</div>
	</div>
@endsection