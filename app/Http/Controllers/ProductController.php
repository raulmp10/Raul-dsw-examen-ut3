<?php
// Raul Martin peña 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


class ProductController extends Controller
{
      public function create()
    {
        return view('product.create');
    }

    public function store(Request $request)
    {
         /*
          VALIDACIÓN DE LOS DATOS
         */

          $validated = $request->validate([
            'nombre-producto' => 'required|string|max:100|min:3',
            'descripcion-producto' => 'required|string',
          'precio' => 'required|numeric|max:2999|min:1',
            'unidades' => 'required|numeric|min:1',
            'categoria-producto' => 'required|in:Electronica,Deporte',
      
        ]);
               /*
          OBTENCIÓN DE LOS DATOS
          Los datos ya han sido validados, así que
          podemos obtenerlos directamente.
         */
         $nombreProducto = $validated['nombre-producto'];
        $descripcionProducto = $validated['descripcion-producto'];
         $precio = $validated['precio'];
          $unidades = $validated['unidades'];
        $categoriaProducto = $validated['categoria-producto'];
       
  /*
         * FORMATO CSV
         Creamos una línea con formato:
         */

        $linea = '"' . $nombreProducto . '";"' . $descripcionProducto . '";"'. $precio . '";"' . $unidades . '";"'   . $categoriaProducto . "\"\n";

        file_put_contents(storage_path('app/productos.csv'), $linea, FILE_APPEND);
                /*
          RETORNO
         En lugar de volver al formulario directamente,
         devolvemos una vista de éxito donde colocaremos
          un mensaje y un enlace para volver al formulario.
         */

       return redirect()->route('product.create')->with('status', 'Se ha registrado ' . $unidades . '  unidades del producto Correctamente');
    }

}