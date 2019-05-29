<!DOCTYPE html>
<html>
<head>
	<title>Template base - @yield('titulo')</title>
</head>
<body>
	@section('barralateral')
		Esta parte da sessão é do template pai
	@show
	<div>
		@yield('conteudo')
	</div>
</body>
</html>