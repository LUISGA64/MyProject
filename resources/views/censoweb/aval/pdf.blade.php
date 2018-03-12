<!DOCTYPE html>
<html lang="es">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <title><h1>Aval</h1></title>
  <link rel="stylesheet" type="text/css" href="public/css/aval.css">
</head>
<body>

  @foreach($aval as $av)

  <table style="width: 100%">
    <tr style="margin-left: 10px">
      <td>@foreach($resg as $r)
        <img id="logoResguardo" src="web/{{ $r->logo_resg }}" style="height: 90px; width: 110px; opacity: 0.5">
      @endforeach</td>

      <td style="text-align: right; line-height: 0.01">
        <h3><b>{{ $av->resguardo }}</b></h3>
        <p style="line-height: 0"><h5>Territorio Ancestral del Pueblo {{ $av->pueblo }}</h5>
        <h5>Escritura {{ $av->resolucion }}</h5>
        <h5>Jurisdicción {{ $av->jurisdiccion }}</h5></p>
      </td>
    </tr>
  </table>
  
  <p style="text-align: justify; margin-top: 50px; font-size: 12">El suscrito cabildo del <b>{{ $av->resguardo }}</b> en su condición de autoridad tradicional, en amparo de la facultades jurídicas, políticas y administrativas otorgadas según  usos y costumbres del pueblo {{ $av->pueblo }}, la ley 89 de 1890, la constitución política  de 1991 en sus artículos 246, 286, 287, 330, especialmente y demás normas  del fuero indígena vigente; a solicitud del interesado (a). Expiden el siguiente <b>{{ $av->formato }}</b>.
  </p>

  <p style="text-align: justify;">
    El (La) comunero (a) <b>{{ $av->nombre_1.' '.$av->nombre_2.' '.$av->apellido_1.' '.$av->apellido_2 }}</b>, Mayor de edad, identificado(a) con {{ $av->tipo_documento }} N° {{ $av->identidad }} de {{ $av->expedicion }}, Es comunero(a) de nuestro Resguardo y actualmente reside en él, conserva su identidad cultural y se encuentra inscrito(a) en el censo de la parcialidad con los datos actualizados al año .
    <br><br>
    El presente {{ $av->formato }} se concede a favor del (la) interesado (a) como soporte para {{ $av->detalle }} en el cargo: <b>{{ $av->cargoAspirante }}</b> en la {{ $av->entidadSolicita }}.
  </p>

  <p>Se expide y se firma en las oficinas del {{ $av->resguardo }}, el {{ Carbon\Carbon::parse($av->created_at)->format('d-m-Y') }}.</p>

  <p style="text-align: center;"><b><h4>AUTORIDAD ANCESTRAL</h4></b></p>
  @endforeach



    <table style="width: 100%; margin-top: 50px;">

        <tbody>
          <tr>
            {{-- Gobernador --}}
            <td style="width: 50%; columns: auto; "> 
              @foreach ($gb as $g1)
                <div class="gob" style="line-height: 0.02; text-align: center;">
                  <b>{{$g1->integrante}}</b>
                  <p>{{$g1->cargo}}</p>      
                </div>    
              @endforeach
              {{-- Gobernador Suplente--}}
              @foreach ($gbs as $gbs1)
                <div class="gob" style="line-height: 0.02; margin-top: 70px; text-align: center;">
                  <b>{{$gbs1->integrante}}</b>
                  <p>{{$gbs1->cargo}}</p>      
                </div>    
              @endforeach
              {{-- Capitan--}}
               @foreach ($cp as $cp1)
                <div class="gob" style="line-height: 0.02; margin-top: 70px; text-align: center;">
                  <b>{{$cp1->integrante}}</b>
                  <p>{{$cp1->cargo}}</p>      
                </div>    
              @endforeach
            </td>
            
          {{-- *******************************  --}}

            {{-- Secretario --}}
            <td style="width: 50%; columns: auto; "> 
              @foreach ($sc as $sc1)
                <div class="gob" style="line-height: 0.02;text-align: center;">
                  <b>{{$sc1->integrante}}</b>
                  <p>{{$sc1->cargo}}</p>      
                </div>    
              @endforeach
              {{-- Secretario --}}
              @foreach ($fc as $fc1)
                <div class="gob" style="line-height: 0.02; margin-top: 70px;text-align: center;">
                  <b>{{$fc1->integrante}}</b>
                  <p>{{$fc1->cargo}}</p>      
                </div>    
              @endforeach

              {{-- Secretario --}}
              @foreach ($scs as $scs1)
                <div class="gob" style="line-height: 0.02; margin-top: 70px;text-align: center;">
                  <b>{{$scs1->integrante}}</b>
                  <p>{{$scs1->cargo}}</p>      
                </div>    
              @endforeach
            </td>

            
          </tr>
        </tbody>
      </table>  

<footer>
  <div class="footer" style="position: fixed; bottom: 30px; left: 10px" >
    <hr style="background-color: #283747; opacity: 0.5">
    @foreach($resg as $rsg)
        <div style="line-height: 0.01">
          <p style="text-align: center; color: #5D6D7E; font-size: 9pt">Correo Electrónico: {{$rsg->email_resg}}</p>
          <p style="text-align: center; color: #5D6D7E; font-size: 9pt">Dirección: {{$rsg->direccion_resg}}</p>
          <p style="text-align: center; color: #5D6D7E; font-size: 9pt">Teléfono (s): 3103964915-3206696960</p>
        </div>
    @endforeach
  </div>
</footer>

</body>
</html>