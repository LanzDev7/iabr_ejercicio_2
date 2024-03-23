<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});





 // Esta ruta nos permite calcular el Triángulo de Pascal para un número dado (n) y devuelve el resultado en formato JSON.

Route::get('/trianguloPascal/{n}', function ($n) {

   

    $trianguloPascal = [];  // Empezamos iniciando un arreglo que usaremos para almacenar los valores del Triángulo de Pascal



    for ($linea = 0; $linea < $n; $linea++) {
        $trianguloPascal[$linea] = [];  // Luego iniciamos un sub-arreglo para la linea actual
        for ($i = 0; $i <= $linea; $i++) {
            if ($i == 0 || $i == $linea) {
                $trianguloPascal[$linea][$i] = 1;  
            } else {
                // Estas variables nos sirven para calcular los valores internos mediante la suma de los valores superiores
                $trianguloPascal[$linea][$i] = $trianguloPascal[$linea - 1][$i - 1] + $trianguloPascal[$linea - 1][$i];
            }
        }
    }

    // Por ultimo se devuelve los valores del Triángulo de Pascal como una respuesta JSON
    return response()->json($trianguloPascal);


});