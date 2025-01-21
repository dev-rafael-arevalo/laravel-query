<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Models\Pedido;
use Illuminate\Http\Request;
class ConsultaController extends Controller
{
    //1. Inserta al menos 5 registros en las tablas de usuarios y pedidos.
    public function store()
    {
        // Insertamos 5 usuarios
        $usuarios = Usuario::factory()->count(5)->create();

        // Insertamos 5 pedidos asociados a los usuarios creados
        foreach ($usuarios as $usuario) {
            Pedido::factory()->count(5)->create([
                'usuario_id' => $usuario->id,  // Asociamos el pedido al usuario correspondiente
            ]);
        }

        return response()->json(['message' => 'Usuarios y pedidos creados correctamente']);
    }
    //2. Recupera todos los pedidos asociados al usuario con ID 2.
    public function getOrdersById()
    {
        // Obtener todos los pedidos del usuario con ID 2
        $pedidos = Pedido::where('usuario_id', 2)->get();

        return response()->json(['pedidos' => $pedidos]);
    }
    //3. Obtén la información detallada de los pedidos, incluyendo el nombre y correo electrónico de los usuarios.
    public function getOrdersDetailed(){
        // Obtener todos los pedidos con la información detallada del usuario
        $pedidos = Pedido::with('usuario')->get();
        return response()->json(['pedidos' => $pedidos]);
    }
    //4. Recupera todos los pedidos cuyo total esté en el rango de $100 a $250
    public function getOrdersByRange()
    {
        // Obtener todos los pedidos con un total entre 100 y 250
        $pedidos = Pedido::whereBetween('total', [100, 250])->get();

        return response()->json(['pedidos' => $pedidos]);
    }
    //5. Encuentra todos los usuarios cuyos nombres comiencen con la letra "R"
    public function getUsersByLetter()
    {
        // Obtener todos los usuarios cuyo nombre comience con "R"
        $usuarios = Usuario::where('nombre', 'like', 'R%')->get();

        return response()->json(['usuarios' => $usuarios]);
    }
    //6. Calcula el total de registros en la tabla de pedidos para el usuario con ID 5.
    public function getOrdersTotalByUser()
    {
        // Obtener el conteo de pedidos del usuario con ID 5
        $totalPedidos = Pedido::where('usuario_id', 5)->count();

        return response()->json(['total_pedidos' => $totalPedidos]);
    }
    //7. Recupera todos los pedidos junto con la información de los usuarios, ordenándolos de forma descendente según el total del pedido.
    public function getOrdersOrder()
    {
        // Obtener todos los pedidos con la información del usuario, ordenados por total descendente
        $pedidos = Pedido::with('usuario')
                         ->orderBy('total', 'desc')
                         ->get();

        return response()->json(['pedidos' => $pedidos]);
    }
    //8. Obtén la suma total del campo "total" en la tabla de pedidos.
    public function getOrdersTotal()
    {
        // Obtener la suma total de los pedidos
        $totalPedidos = Pedido::sum('total');
        return response()->json(['total_pedidos' => $totalPedidos]);
    }
    //9. Encuentra el pedido más económico, junto con el nombre del usuario asociado.
    public function getOrdersCheapest()
    {
        // Obtener el pedido más económico junto con el usuario asociado
        $pedido = Pedido::with('usuario')
                    ->orderBy('total', 'asc') // Ordenar por total ascendente (más barato primero)
                    ->first();

        return response()->json(['pedido' => $pedido]);
    }

    //10. Obtén el producto, la cantidad y el total de cada pedido, agrupándolos por usuario
    public function getOrdersGroup()
    {
        // Agrupar los pedidos por usuario y calcular un resumen usando Query Builder
        $pedidos = \DB::table('pedidos')
            ->select('usuario_id')
            ->selectRaw('GROUP_CONCAT(producto) as productos') // Concatena los productos del usuario
            ->selectRaw('SUM(cantidad) as total_cantidad') // Suma de cantidades
            ->selectRaw('SUM(total) as total_precio') // Suma de totales
            ->groupBy('usuario_id')
            ->get();

        return response()->json(['pedidos' => $pedidos]);
    }

}
