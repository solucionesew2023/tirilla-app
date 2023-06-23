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
            /** 
                Establezca los márgenes de la página en 0, por lo que el pie de página y el encabezado
                puede ser de altura y anchura completas.
             **/
            @page {
                margin-left: 0.2cm;
		        margin-right: 0.2cm;
            }
            body {
                margin-top: 8cm;
                margin-left: 1.5cm;
                margin-right: 1.5cm;
                margin-bottom: 1cm;
                font-family: Arial Narrow;
            }
            
            .titulo{
                text-align: center;
                font-size:12px;
            }
            .textojustificado{
                text-align: justify;
            }
            .negrita{
                font-weight: bold;
                text-transform: uppercase;
            }
            .footerSintra{
                background:#fff;
                width:90%;
                padding:5px;
                text-align: center;
                margin-left:5%;
            }
            
            /** Definir las reglas del encabezado **/
            header {
                position: fixed;
                top: -1cm;
                left: 0cm;
                right: 0cm;
                height: 4.5cm;
                margin-top: 0cm;
                margin-left: 0cm;
            }

            /** Definir las reglas del pie de página **/
            footer {
                position: fixed; 
                bottom: -1cm; 
                left: 0cm; 
                right: 0cm;
                height: 2cm;
                text-align:  center;
                font-family: Calibri, Arial;
                font-size:12px;
            }
            .firma {
                position: fixed; 
                bottom: 0.5cm; 
                left: 2cm; 
                right: 0cm;
                height: 3cm;
                text-align: left;
                font-family: Calibri, Arial;
                font-size:12px;
            }
            .qr{  
                position: fixed; 
                bottom: 3.5cm; 
                left: 2cm; 
                right: 0cm;
                height: 2cm;
                text-align: right;
                font-family: Calibri, Arial;
                font-size:12px;
            }
            
            .textoqr{
                position: relative; 
                bottom: 5cm; 
                left: -8cm; 
                right: 0cm;
                height: 3cm;
                font-size:9px;
                writing-mode: vertical;
                transform: rotate(-90deg);
                text-align:justify;
	            text-justify:inter-word;
            }
            .img{
                top: 0cm;
                left: 0cm;
            }
            table {
                width: 100%;
                border-collapse: collapse;
                }
                th, td {
                text-align: center;
                font-size: xx-small;
                vertical-align: top;
                border-right: 1px solid #000;
                }
                tr {
                border-top: 1px solid #000;
                border-left: 1px solid #000;
                border-right: 1px solid #000;
                border-bottom: 1px solid #000;
                border-collapse: collapse;
                }
                
                /** Defina ahora los márgenes reales de cada página en el PDF **/
            
            main{
                margin-top: 3cm;
                margin-left: 1.5cm;
                margin-right: 1.5cm;
                margin-bottom: 1cm;
                font-family: Arial Narrow;
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
