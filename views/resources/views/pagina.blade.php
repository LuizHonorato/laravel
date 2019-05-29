<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="{{asset('css/app.css')}}">
	<title></title>
</head>
<body>
	@alerta(['tipo'=>'danger'])
		<strong>Erro: </strong> Mensagem de erro.
		@slot('titulo')
			Erro fatal
		@endslot
	@endalerta
	@alerta(['tipo'=>'warning'])
		<strong>Erro: </strong> Mensagem de erro.
		@slot('titulo')
			Erro fatal
		@endslot
	@endalerta

	<script src="{{asset('js/app.js')}}" type="text/javascript"></script>
</body>
</html>