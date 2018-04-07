<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ficha Familiar:  {{$id}}</title>
    <link rel="stylesheet" type="text/css" href="../public/css/ficha.css">

</head>
<body>
<div class="row">
    @foreach($resguardo as $r)
    <table>
        <tr>
            <td>
                <img id="logoResguardo" src="web/{{ $r->logo_resg }}" style="height: 70px; width: 90px; opacity: 0.5"/>
            </td>
            <td style="line-height: 0.01; padding-left: 20px; padding-top: 40px">
                <p><h3>{{$r->resguardo}}</h3></p>
                <p>Dirección: {{$r->direccion_resg}}</p>
                <p>Identificación: {{$r->tipo_doc}} {{$r->identificacion}}</p>
                <p>Pueblo: {{$r->pueblo}}</p>
            </td>
        </tr>
    </table>
    @endforeach
</div>
<hr>
<div class="row" style="text-align: center; font-family: 'Bradley Hand ITC'; color: #5D6D7E"><h2>Ficha Familiar</h2></div>
<div class="datagrid">
    <table id="mytable">
        <thead>
        <tr>
            <th># Ficha</th>
            <th>Nombres y Apellidos</th>
            <th>Identificación</th>
            <th>Genero</th>
            <th>Dirección</th>
            <th>Cabeza Familia</th>
        </tr>
        </thead>
        <tbody>
        @foreach($grupos as $grupo)
            <tr>
                <td>{{$grupo->id}}</td>
                <td id="nombres">{{$grupo->nombre_1}} {{$grupo->nombre_2}} {{$grupo->apellido_1}} {{$grupo->apellido_2}}</td>
                <td>{{$grupo->codigo_doc}} - {{$grupo->identificacion}}</td>
                <td>{{$grupo->genero}}</td>
                <td>{{$grupo->direccion}}</td>
                <td>{{$grupo->cabeza_familia}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
<div style="font-size: 10px; color: #5D6D7E"> <b>Impreso:</b> {{ Carbon\Carbon::now()->toDateTimeString() }}</div>
<footer>
    <br>
    <hr>
    @foreach($resguardo as $r)
        <div class="footer" style="text-align: center; font-size: 10px; color: #5D6D7E; line-height: 0.1">
            <p>Correo Electrónico: {{$r->email_resg}}</p>
            <p>Jurisdicción: {{$r->jurisdiccion}}</p>
            <p>Teléfono: </p>
            <p><b>Censo-Web</b></p>
        </div>
    @endforeach
</footer>

</body>
</html>