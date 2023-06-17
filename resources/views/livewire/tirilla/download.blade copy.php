<?php //para no tener problemas en produccion con la carga de images
    $nombreImagen = "img/encabezado.png";
    $imagenBase64 = "data:image/png;base64," . base64_encode(file_get_contents($nombreImagen));
    
    //$nombreImagen2 = "img/backgroung.png";
    //$imagenBase64_2 = "data:image/png;base64," . base64_encode(file_get_contents($nombreImagen2));
?>
<!doctype html>
<html lang="en">

<head>
    <title>Tirilla</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        table {
            font-size: 12px;
        }
    </style>
</head>

<body>
    <!-- Defina bloques de encabezado y pie de página antes de su contenido -->
    <header>
        <img src="<?php echo $imagenBase64 ?>" width="100%" height="100%" class="img"/>
    </header>
    <main>
        <div class="container py-5">
            <h5 class=" font-weight-bold">


            </h5>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Codigo</th>
                        <th>Nombres</th>
                        <th>Documento</th>
                        <th>Concepto</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($tirilla as $tir)
                    <tr>
                        <td>{{ $tir->id }}</td>
                        <td>{{ $tir->codigo }}</td>
                        <td>{{ $tir->nombre }}</td>
                        <td>{{ $tir->personalid }}</td>
                        <td>{{ $tir->nomconcepto }}</td>

                        
                    </tr>
                    @empty
                    <p>Error</p>
                    @endforelse
                </tbody>
            </table>
        </div>
    </main>
    <footer>
        <div class="firma">
        <!--<img src="img/firma.png" width="200px" height="100px"/>-->
        <p class="textojustificado"><b>Banco:<b>Bamcolombia.</p>       
        </div>
        
        <!--<img src="footer.png" width="100%" height="100%"/>-->
        <p>Numero Cuenta:<br>
            1111111111111<br>
        </p>
    </footer>
</body>

</html>
