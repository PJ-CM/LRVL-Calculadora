<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel :: Calculadora</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="/css/estilos.css">
    </head>
    <body>
        <div class="flex-center position-ref full-height">

            <div class="content">
                <div class="title m-b-md">
                    Laravel :: Calculadora - Calcular
                </div>

                <div class="row flex-center">
                    <div class="col-xs|sm|md|lg|xl-1-12">
                        @if (count($errors))
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                    </div>
                </div>

                <div class="container">
                    <h1>Aloha <strong>{{ $nombre }}</strong></h1>
                    <p>Efectúa una de las <span class="font-weight-bold text-primary">4 operaciones disponibles</span> con las <span class="font-weight-bold">2 cifras</span> que especifiques (por supuesto, <span class="font-weight-bold text-danger">deben ser datos numéricos</span>):</p>
                    <form action="{{ route('calculadora_calcular') }}" method="post" role="form">
                        @csrf
                        <div class="form-group row flex-center">
                            <div class="col-sm-1-12">
                                <label for="num_1" class="col-sm-1-12 col-form-label font-weight-bold">Número 1:</label> <input type="text" class="form-control" name="num_1" id="num_1" placeholder="Teclea 1er NÚMERO" value="@isset($num_1){{ $num_1 }}@endisset">
                            </div>
                            <div class="col-sm-1-12">
                                <label for="num_2" class="col-form-label font-weight-bold">Número 2:</label> <input type="text" class="form-control" name="num_2" id="num_2" placeholder="Teclea 2o NÚMERO" value="@isset($num_2){{ $num_2 }}@endisset">
                            </div>
                        </div>

                        @if ($version == 'v_radiobtns')
                        {{-- VERSIÓN RadioButtons --}}
                        @empty($operacion)
                            @php
                                $operacion = 'sumar';
                            @endphp
                        @endisset
                        <div class="row flex-center">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="operacion" id="sumar" value="sumar"@if($operacion == 'sumar') checked @endif>
                                <label class="form-check-label font-weight-bold text-primary" for="sumar">Sumar</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="operacion" id="restar" value="restar"@if($operacion == 'restar') checked @endif>
                                <label class="form-check-label font-weight-bold text-primary" for="restar">Restar</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="operacion" id="multiplicar" value="multiplicar"@if($operacion == 'multiplicar') checked @endif>
                                <label class="form-check-label font-weight-bold text-primary" for="multiplicar">Multiplicar</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="operacion" id="dividir" value="dividir"@if($operacion == 'dividir') checked @endif>
                                <label class="form-check-label font-weight-bold text-primary" for="dividir">Dividir</label>
                            </div>
                        </div>
                        <div class="form-group row flex-center">
                            <button type="submit" class="btn btn-primary">Calcular</button>
                        </div>

                        @else
                        {{-- VERSIÓN Botones --}}
                        <div class="form-group row flex-center">
                            <input type="submit" class="btn btn-primary @if (isset($operacion) && $operacion == 'sumar'){{ 'btnActivo' }}@endif" name="sumar" value="+" title="Sumar">
                            <input type="submit" class="btn btn-primary separacion-izq @if (isset($operacion) && $operacion == 'restar'){{ 'btnActivo' }}@endif" name="restar" value="-" title="Restar">
                            <input type="submit" class="btn btn-primary separacion-izq @if (isset($operacion) && $operacion == 'multiplicar'){{ 'btnActivo' }}@endif" name="multiplicar" value="x" title="Multiplicar">
                            <input type="submit" class="btn btn-primary separacion-izq @if (isset($operacion) && $operacion == 'dividir'){{ 'btnActivo' }}@endif" name="dividir" value="/" title="Dividir">
                        </div>

                        @endif
                        <input type="hidden" name="nombre" value="{{ $nombre }}">
                        <input type="hidden" name="version" value="{{ $version }}">
                        @isset($resultado)
                        <div class="form-group row flex-center form-fila">
                            <label for="num_1" class="col-sm-1-12 col-form-label label_margen_dcha">Resultado:</label>
                            <div class="col-sm-1-12">
                                <input type="text" class="form-control" name="resultado" id="resultado" value="{{ $resultado }}">
                            </div>
                        </div>
                        @endisset
                    </form>
                    <div class="row flex-center">
                        <p>(Volver a <a href="{{ route('calculadora_index') }}" title="Volver a iniciar la Calculadora">iniciar</a> la Calculadora con otro nombre)</p>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
