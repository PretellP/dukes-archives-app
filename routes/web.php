<?php

use App\Http\Controllers\Admin\{
    UsersController,
    DashboardController,
    LabelsController
};

use App\Http\Controllers\Home\{HomeController, ProductsController};

use Illuminate\Support\Facades\{Auth, Route};

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

Route::post('/registro-usuario/validar-registro/{column}', [UsersController::class, 'registerValidate'])->name('users.validateRegister');


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
                Route::post('/validar-edición/{column}', 'editValidate')->name('validateEdit');

                Route::delete('/eliminar/{user}', 'destroy')->name('destroy');
            });
        });

        // ---------------- LABELS -------------------
        // ---- admin.labels.* ------
        Route::group(['prefix' => 'categorías', 'as' => 'labels.'], function () {

            Route::controller(LabelsController::class)->group(function () {

                Route::get('/', 'index')->name('index');
                Route::get('/ver/{label}', 'show')->name('show');
                Route::get('/editar/{label}', 'edit')->name('edit');
                Route::post('/registrar', 'store')->name('store');
                Route::post('/actualizar/{label}', 'update')->name('update');
                Route::delete('/eliminar/{label}', 'destroy')->name('destroy');
            });
        });
    });
});
