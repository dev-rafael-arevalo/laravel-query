<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ConsultaController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('v1')->group(function () {
    // 1. Inserta al menos 5 registros en las tablas de usuarios y pedidos.
    Route::post('/task/1', [ConsultaController::class, 'store']);

    // 2. Recupera todos los pedidos asociados al usuario con ID 2.
    Route::get('/task/2', [ConsultaController::class, 'getOrdersById']);

    // 3. Obtén la información detallada de los pedidos, incluyendo el nombre y correo electrónico de los usuarios.
    Route::get('/task/3', [ConsultaController::class, 'getOrdersDetailed']);

    // 4. Recupera todos los pedidos cuyo total esté en el rango de $100 a $250.
    Route::get('/task/4', [ConsultaController::class, 'getOrdersByRange']);

    // 5. Encuentra todos los usuarios cuyos nombres comiencen con la letra "R".
    Route::get('/task/5', [ConsultaController::class, 'getUsersByLetter']);

    // 6. Calcula el total de registros en la tabla de pedidos para el usuario con ID 5.
    Route::get('/task/6', [ConsultaController::class, 'getOrdersTotalByUser']);

    // 7. Recupera todos los pedidos junto con la información de los usuarios, ordenándolos de forma descendente según el total del pedido.
    Route::get('/task/7', [ConsultaController::class, 'getOrdersOrder']);

    // 8. Obtén la suma total del campo "total" en la tabla de pedidos.
    Route::get('/task/8', [ConsultaController::class, 'getOrdersTotal']);

    // 9. Encuentra el pedido más económico, junto con el nombre del usuario asociado.
    Route::get('/task/9', [ConsultaController::class, 'getOrdersCheapest']);

    // 10. Obtén el producto, la cantidad y el total de cada pedido, agrupándolos por usuario.
    Route::get('/task/10', [ConsultaController::class, 'getOrdersGroup']);
});
