<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalculadoraController extends Controller
{

    public function index()
    {
        return view('calculadora.index');
    }

    public function nuevo(Request $request)
    {
        //Estableciendo reglas de validación
        $reglas = [
            'nombre' => 'required|max:255',
        ];
        //Validando petición
        $request->validate($reglas);

        return view('calculadora.calculo')->with([
            'nombre' => $request->nombre,
            'version' => $request->version,
        ]);
    }

    //public function calcular_00(Request $request)
    public function calcular(Request $request)
    {
        $_arr_datos = [];
        $version = $request->version;
        $num_1 = $request->num_1;
        $num_2 = $request->num_2;
        $operacion = $request->operacion;
        $errors = [];
        //Estableciendo reglas de validación
        if($num_1 == '' || !is_numeric($num_1)) {
            if($num_1 == '')
                $errors[] = 'El campo NUM_1 es requerido.';
            else if(!is_numeric($num_1))
                $errors[] = 'El campo NUM_1 debe ser un dato NUMÉRICO.';
        }
        if($num_2 == '' || !is_numeric($num_2)) {
            if($num_2 == '')
                $errors[] = 'El campo NUM_2 es requerido.';
            else if(!is_numeric($num_2))
                $errors[] = 'El campo NUM_2 debe ser un dato NUMÉRICO.';
        }

        if(count($errors) > 0) {

            return view('calculadora.calculo')->with([
                'version' => $version,
                'nombre' => $request->nombre,
                'num_1' => $num_1,
                'num_2' => $num_2,
                'errors' => $errors,
                'operacion' => $operacion,
            ]);

        } else {

            $resultado = 0;

            if($version == 'v_radiobtns') {
                // VERSIÓN CON BOTONES de RADIO

                if($operacion == 'dividir') {
                    if($num_2 == 0) {
                        $errors[] = 'NO se puede dividir por 0';
                        $resultado = null;
                    }
                }

            } else if($version == 'v_btns') {
                // VERSIÓN CON BOTONES SUBMIT

                if($request->sumar) {
                    $operacion = 'sumar';
                }
                else if($request->restar) {
                    $operacion = 'restar';
                }
                else if($request->multiplicar) {
                    $operacion = 'multiplicar';
                }
                else if($request->dividir) {
                    if($num_2 == 0) {
                        $errors[] = 'NO se puede dividir por 0';
                        $resultado = null;
                    } else {
                        $operacion = 'dividir';
                    }
                }
                else {
                    $errors[] = 'NO se especificó una operación';
                    $resultado = null;
                }

            }

            //Si no hubo ERRORES
            if(count($errors) == 0)
                $resultado = $this->calcular_operacion($num_1, $num_2, $operacion);

            return view('calculadora.calculo')->with([
                'version' => $version,
                'nombre' => $request->nombre,
                'num_1' => $num_1,
                'num_2' => $num_2,
                'resultado' => $resultado,
                'errors' => $errors,
                'operacion' => $operacion,
            ]);

        }
    }

    public function calcular_con_validate(Request $request)
    //public function calcular(Request $request)
    {
        //Estableciendo reglas de validación
        $reglas = [
            'num_1' => 'required|numeric',
            'num_2' => 'required|numeric',
        ];

        //dd($reglas);
        //Validando petición
        $request->validate($reglas);

        $operacion = $request->operacion;
        $num_1 = $request->num_1;
        $num_2 = $request->num_2;
        $resultado = 0;
        $error_msg = '';

        switch ($operacion) {
            case 'sumar':
                $resultado = $num_1 + $num_2;
                break;

            case 'restar':
                $resultado = $num_1 - $num_2;
                break;

            case 'multiplicar':
                $resultado = $num_1 * $num_2;
                break;

            case 'dividir':
                if($num_2 == 0) {
                    $error_msg = 'NO se puede dividir por 0';
                } else {
                    $resultado = $num_1 / $num_2;
                    break;
                }

            default:
                $error_msg = 'No se especificó una operación';
                break;
        }

        return view('calculadora.calculo')->with([
            'nombre' => $request->nombre,
            'num_1' => $num_1,
            'num_2' => $num_2,
            'resultado' => $resultado,
        ]);;
    }

    public function calcular_operacion($num_1, $num_2, $operacion)
    {
        $resultado = 0;

        switch ($operacion) {
            case 'sumar':
                $resultado = $num_1 + $num_2;
                break;

            case 'restar':
                $resultado = $num_1 - $num_2;
                break;

            case 'multiplicar':
                $resultado = $num_1 * $num_2;
                break;

            case 'dividir':
                $resultado = $num_1 / $num_2;
                break;
        }

        return $resultado;
    }

}
