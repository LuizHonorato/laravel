<!DOCTYPE html>
<html>
<head>
	<title>Cadastro de Cliente</title>
	<link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<style>
		body {
			padding: 20px;
		}
	</style>
</head>
<body>

	<main role="main">
		<div class="row">
			<div class="container col-md-8 offset-md-2">
				<div class="card border">
					<div class="card-header">
						<div class="card-title">
						<h4>Clientes</h4>
						</div>
					</div>
					<div class="card-body">
					@if(count($clientes) > 0)
						<table class="table table-bordered table-hover" id="tabelaProdutos">
							<thead>
								<tr>
									<th>ID</th>
									<th>Nome</th>
									<th>Endereço</th>
									<th>Idade</th>
									<th>Email</th>
								</tr>
							</thead>
							<tbody>
								@foreach($clientes as $c)
									<tr>
										<td>{{$c->id}}</td>
										<td>{{$c->nome}}</td>
										<td>{{$c->endereco}}</td>
										<td>{{$c->idade}}</td>
										<td>{{$c->email}}</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					@else
						<h1>Nenhum cliente cadastrado.</h1>
						<a href="/novocliente" class="btn btn-lg btn-primary">Novo cliente</a>
					@endif
					</div>
				</div>
			</div>
		</div>
	</main>
	<script type="text/javascript" src="{{asset('js/app.js')}}"></script>
</body>
</html>