<?php

use App\Http\Controllers\Admin\{
   UsersController,
   DashboardController 
};

use App\Http\Controllers\Home\{HomeController, ProductsController};
use App\Http\Controllers\Auth\{LoginController};

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Auth::routes();

Route::controller(HomeController::class)->group(function () {
             //----- home.* -----
            Route::get('/', 'index')->name('home.index');
});


Route::group(["prefix" => "inicio", "as" => "home."], function () {

    Route::controller(ProductsController::class)->group(function () {
        Route::group(["prefix" => "productos", "as" => "products."], function () {
             //----- products.* -----
             Route::get('/', 'index')->name('index');
        });

    });

    

});


Route::group(['middleware' => ['auth', 'check.valid.user']], function () {

    // RUTAS DE LA INTERFAZ ADMINISTRADOR ------------------'
    // ---- admin.*
    Route::group(['middleware' => 'check.role:ADMINISTRADOR,ALMACENERO', 'prefix' => 'admin', 'as' => 'admin.'], function () {

        // -------- DASHBOARD ----------
        // ---- admin.dashboard.*
        Route::group(['prefix' => 'inicio', 'as' => 'dashboard.'], function () {

            Route::controller(DashboardController::class)->group(function () {
                Route::get('/', 'index')->name('index');
            });
        });
        
        // --------------- USERS -------------------------
        // ---- admin.users.* ------
        Route::group(['prefix' => 'usuarios', 'as' => 'users.'], function () {

            Route::controller(UsersController::class)->group(function () {

                Route::get('/', 'index')->name('index');
                Route::get('/ver/{user}', 'show')->name('show');
                Route::get('/editar/{user}', 'edit')->name('edit');
                Route::post('/registrar', 'store')->name('store');
                Route::post('/actualizar/{user}', 'update')->name('update');
                Route::post('/validar-registro/{column}', 'registerValidate')->name('validateRegister');
                Route::post('/validar-edición/{column}', 'editValidate')->name('validateEdit');

                Route::delete('/eliminar/{user}', 'destroy')->name('destroy');
            });
        });


    });

});
