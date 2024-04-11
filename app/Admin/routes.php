<?php

use App\Admin\Controllers\ProductsController;
use App\Admin\Controllers\VeterinariosController;
use App\Admin\Controllers\MascotasController;
use App\Admin\Controllers\PropietarioController;
use App\Admin\Controllers\CitaController;

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
use OpenAdmin\Admin\Facades\Admin;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
    'as'            => config('admin.route.prefix') . '.',
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('home');
    $router->resource('products', ProductsController::class);
    $router->resource('veterinarios', VeterinariosController::class);
    $router->resource('mascotas', MascotasController::class);
    $router->resource('propietarios', PropietarioController::class);
    $router->resource('citas', CitaController::class);

});