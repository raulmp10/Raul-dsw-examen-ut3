<?php
//Raul Martin Peña
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
/*

| Aquí definimos las rutas del proyecto. Cada ruta apunta a un método del
| controlador o devuelve directamente una vista.

*/
Route::get('/', function () {
    return view('home');
});
/*

 Muestra el formulario donde el usuario introduce los datos del producto.
 Apunta al método create() del ProductController.
*/

Route::get('/product/create', [ProductController::class, 'create'])
    ->name('product.create');

    /*

 Ruta POST que recibe los datos enviados desde el formulario.
 Ejecuta el método store(), que valida, guarda en CSV y devuelve la vista
de confirmación.
*/
Route::post('/product', [ProductController::class, 'store'])->name('product.store');
