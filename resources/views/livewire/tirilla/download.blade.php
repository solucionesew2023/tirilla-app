<?php //para no tener problemas en produccion con la carga de images
$nombreImagen = 'img/encabezado.png';
$imagenBase64 = 'data:image/png;base64,' . base64_encode(file_get_contents($nombreImagen));

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
                margin-top: 2.5cm;
                margin-left: 1.5cm;
                margin-right: 1.5cm;
                margin-bottom: 1cm;
                font-family: Arial Narrow;
            }
            
            .titulo{
                text-align: right;
                text-font-size:12px;
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
                height: 3.5cm;
                margin-top: 0cm;
                margin-left: 0cm;
            }
            .encabezado{
                border:none;
                text-align: left;
                text-font-size:12px;
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
                .imagenbg{
                    /*background-image: url(img/backgroung.png);
                         background: url() no-repeat center center fixed;
                        -webkit-background-size: 100%;
                        -moz-background-size: 100%;
                        -o-background-size: 100%;
                         background-size: 100%;*/
                }
                /** Defina ahora los márgenes reales de cada página en el PDF **/
            
            main{
                margin-top: 0.5cm;
                margin-left: 1cm;
                margin-right: 1cm;
                margin-bottom: 1cm;
                font-family: Arial Narrow;
            }
            .fecha{
                top: 0cm;
                right: 0cm;
                margin-top: -5.5cm;
                margin-left: 20.5cm;
                text-align:  right;
                font-family: Calibri, Arial;
                font-size:12px;
            }
        </style>
</head>

<body>
    <!-- Defina bloques de encabezado y pie de página antes de su contenido -->
    <header>
        <strong class="fecha">17-06-2023</strong>
        <img src="<?php echo $imagenBase64; ?>" width="45%" height="100%" class="img" />
    </header>
    <main>
        <h5 class="titulo">
            COMPROBANTE DE PAGO 
        </h5>
        @foreach ($tirilla as $t) 
        @php
            $nombre = $t["nombre"];
            $cedula = $t["codigo"];
            $banco  = $t["nombanco"];
            $cuenta  = $t["ctatrab"];
        @endphp
        @endforeach
        <table >
            
                <tr class="encabezado">
                    <th class="encabezado negrita">NOMINA:</th>
                    <th class="encabezado"></th>
                </tr>
                <tr class="encabezado">
                    <th class="encabezado negrita">CODIGO:</th>
                    <th class="encabezado">{{$cedula}}</th>
                    <th class="encabezado">NOMBRE:</th>
                    <th class="encabezado">{{$nombre}}</th>
                </tr>
                <tr class="encabezado">
                    <th class="encabezado">DOCUMENTO:</th>
                    <th class="encabezado">{{$cedula}}</th>
                    <th class="encabezado">CARGO:</th>
                    <th class="encabezado">12123123</th>
                </tr>
                <tr class="encabezado">
                    <th class="encabezado">BASICO:</th>
                    <th class="encabezado">123</th>
                    <th class="encabezado">SECCION:</th>
                    <th class="encabezado">12123123</th>
                </tr>
                <tr class="encabezado">
                    <th class="encabezado">FECHA INGRESO:</th>
                    <th class="encabezado">123</th>
                    <th class="encabezado">AREA:</th>
                    <th class="encabezado">12123123</th>
                </tr>
            
        </table>
        <br><br>
        
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>CODIGO</th>
                    <th>CONCEPTO</th>
                    <th>CANTIDAD</th>
                    <th>DEVENGADOS</th>
                    <th>DESCUENTOS</th>
                    <th>SALDO / BASE</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($tirilla as $tir)  
                <tr>
                    
                    
                    <td >{{ $tir["conceptoid"]}}</td>
                    <td>{{ $tir["nomconcepto"]}}</td>
                    <td>{{ $tir["cantida"]}}</td>
                    <td>@if($tir["tipodc"]=="D"){{ $tir["valor"]}} @endif</td>
                    <td>@if($tir["tipodc"]=="C"){{ $tir["valor"]}} @endif</td>
                    <td>@if($tir["tipodc"]=="C"){{ $tir["saldo"]}} @endif</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    
    </main>
    <footer>
        <div class="firma">
            <!--<img src="img/firma.png" width="200px" height="100px"/>-->
            <p ><b>Banco:<b>{{$banco}}.</p>
        </div>

        <!--<img src="footer.png" width="100%" height="100%"/>-->
        <p>Numero Cuenta: {{$cuenta}}<br>
        </p>
    </footer>
</body>

</html>
