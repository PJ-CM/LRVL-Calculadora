@extends('layouts.layout_calculadora')

@section('contenido_central')
                <div class="title m-b-md">
                    Laravel :: Calculadora
                </div>

                <div class="row flex-center">
                    <div class="col-xs|sm|md|lg|xl-1-12">
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                    </div>
                </div>

                <div class="container">
                    <p>Personaliza la calculadora con tu <span class="font-weight-bold">nombre</span> antes de iniciarla:</p>
                    <form action="{{ route('calculadora_nuevo') }}" method="post" role="form">
                        @csrf
                        <div class="form-group row flex-center form-fila">
                            <label for="nombre" class="col-sm-1-12 col-form-label">Nombre:</label>
                            <div class="col-sm-1-12">
                                <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Teclea tu nombre">
                            </div>
                        </div>
                        <div class="form-group row flex-center">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="version" id="v_radiobtns" value="v_radiobtns" checked>
                                <label class="form-check-label" for="v_radiobtns">Versión RadioButtons</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="version" id="v_btns" value="v_btns">
                                <label class="form-check-label" for="v_btns">Versión Botones</label>
                            </div>
                        </div>
                        <div class="form-group row flex-center">
                            <button type="submit" class="btn btn-primary">Enviar</button>
                        </div>
                    </form>
                </div>
@endsection
