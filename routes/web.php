<?php

use App\Http\Controllers\Admin\{
    UsersController,
    DashboardController,
    LabelsController
};

use App\Http\Controllers\Home\{AboutController, HomeController, ProductsController, ShopController, CartController, ContactController, ProductDetailsController, WishlistController};

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

    Route::controller(ShopController::class)->group(function () {
        Route::group(["prefix" => "tienda", "as" => "shop."], function(){
            //----- shop.* -----
            Route::get('/', 'index') -> name('index');
        });
    });

    Route::controller(ProductDetailsController::class)->group(function () {
        Route::group(["prefix" => "detalles-de-producto", "as" => "product-details."], function(){
            //----- product-details.* -----
            Route::get('/', 'index') -> name('index');
        });
    }); 
    
    Route::controller(CartController::class)->group(function () {
        Route::group(["prefix" => "carrito", "as" => "cart."], function () {
            //----- cart.* -----
            Route::get('/', 'index') -> name('index');
        });
    });

    Route::controller(AboutController::class)->group(function () {
        Route::group(["prefix" => "nosotros", "as" => "about."], function () {
            //----- about.* -----
            Route::get('/', 'index') -> name('index');
        });
    });

    Route::controller(ContactController::class)->group(function () {
        Route::group(["prefix" => "contactanos", "as" => "contact."], function () {
            //----- contact.* -----
            Route::get('/', 'index') -> name('index');
        });
    });

    Route::controller(WishlistController::class)->group(function () {
        Route::group(["prefix" => "lista-de-deseos", "as" => "wishlist."], function () {
            //----- wishlist.* -----
            Route::get('/', 'index') -> name('index');
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
