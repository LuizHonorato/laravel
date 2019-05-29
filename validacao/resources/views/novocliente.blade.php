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
		input {
			margin-bottom: 20px;
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
							<h4>Cadastro de clientes</h4>
						</div>
					</div>
					<div class="card-body">
						<form action="/cliente" method="POST">
							@csrf
							<div class="form-group">
								<!--<label for="nome">Nome</label>-->
								<input type="text" id="nome" name="nome" class="form-control {{ $errors->has('nome') ? 'is-invalid' : '' }}" placeholder="Nome">
								@if($errors->has('nome'))
									<div class="invalid-feedback">
										{{ $errors->first('nome') }}
									</div>
								@endif
							</div>
							<div class="form-group">
								<!--<label for="idade">Idade</label>-->
								<input type="number" id="idade" name="idade" class="form-control {{ $errors->has('idade') ? 'is-invalid' : '' }}" placeholder="Idade">
								@if($errors->has('idade'))
									<div class="invalid-feedback">
										{{ $errors->first('idade') }}
									</div>
								@endif
							</div>
							<div class="form-group">
								<!--<label for="endereco">Endereço</label>-->
								<input type="text" id="endereco" name="endereco" class="form-control {{ $errors->has('endereco') ? 'is-invalid' : '' }}" placeholder="Endereço">
								@if($errors->has('endereco'))
									<div class="invalid-feedback">
										{{ $errors->first('endereco') }}
									</div>
								@endif
							</div>
							<div class="form-group">
								<!--<label for="email">E-mail</label>-->
								<input type="text" id="email" name="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" placeholder="E-mail">
								@if($errors->has('email'))
									<div class="invalid-feedback">
										{{ $errors->first('email') }}
									</div>
								@endif
							</div>
							<button type="submit" class="btn btn-success btn-md">Salvar</button>
							<button type="cancel" class="btn btn-danger btn-md">Cancelar</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</main>
	<script type="text/javascript" src="{{asset('js/app.js')}}"></script>
</body>
</html>