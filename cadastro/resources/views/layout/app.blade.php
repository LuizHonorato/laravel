<!DOCTYPE html>
<html>
<head>
	<title>Cadastro de Produtos</title>
	<meta name="csrf-token" content="{{csrf_token()}}" charset="utf-8">
	<link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}">
	<style>
		body {
			padding: 20px;
		}

		.navbar {
			margin-bottom: 20px;
		}

		input, select {
			margin-bottom: 20px;
		}

		.actions {
			padding: 20px;
		}
	</style>
</head>
<body>
	<div class="container">
		@component('component_navbar', ["current"=>$current])
		@endcomponent
		<main role="main">
			@hasSection('body')
				@yield('body')
			@endif
		</main>
	</div>

	<script type="text/javascript" src="{{asset('js/app.js')}}"></script>

	@hasSection('javascript')
		@yield('javascript')
	@endif
</body>
</html>