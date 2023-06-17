<!doctype html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
    <title>Tirilla de Pago - Prodeho</title>
</head>

<body>
    <p class="font-bold">Cordial Saludo.</p>
    @foreach ($details as $tira)
    <p>{{$tira->title}}</p>
    <p>{{$tira->body}}</p>
    @endforeach
    
</body>

</html>
