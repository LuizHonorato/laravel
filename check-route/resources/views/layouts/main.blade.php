<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}">
    <title>Home</title>
</head>
<body>
    @hasSection ('content')
        @yield('content')
    @endif

    <script type="text/javascript" src="{{asset('js/app.js')}}"></script>
    <script type="text/javascript">


        $('#checar_rota').click(function() {
            rota = $("#pagina").val();

        $.ajax({
            url: '/api/checar-rota/' + rota,
            type: 'GET',
            success: function(data) {
                url = JSON.parse(data)
                //console.log(url)
                if(rota == url.action.as) {
                    //console.log("Rotas iguais!")
                    $("#mensagem_pagina").removeClass("text-danger");
                    $("#mensagem_pagina").addClass("text-success");
                    document.getElementById("mensagem_pagina").innerHTML = "Página encontrada!";
                    $('#cadastra_pagina').prop('disabled', false);
                    $("#url").val(url.uri);
                }
                else {
                    //url = JSON.parse(data)
                    //console.log("Rotas diferentes: " + url.uri);
                    $("#mensagem_pagina").removeClass("text-success");
                    $("#mensagem_pagina").addClass("text-danger");
                    document.getElementById("mensagem_pagina").innerHTML = "Página não encontrada. Digite o nome correto ou entre em contato com o seu webmaster para obter ajuda.";
                    $('#cadastra_pagina').prop('disabled', true);
                    $("#url").val('');
                }
            },
            error: function(error) {
                //console.log('Deu erro');
                $("#mensagem_pagina").addClass("text-danger");
                document.getElementById("mensagem_pagina").innerHTML = "Não foi possível verificar a URL no momento. Tente novamente mais tarde.";
                $('#cadastra_pagina').prop('disabled', true);
                $("#url").val('');
            }
        });
    });
        
    </script>
</body>
</html>