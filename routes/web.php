<?php

use App\Http\Controllers\Admin\{
    AnnouncementsController,
    CustomerController,
    UsersController,
    DashboardController,
    LabelsController,
    ProductController,
    SalesController
};

use App\Http\Controllers\Home\{AboutController, ProfileController, HomeController, ProductsController, ShopController, CartController, ContactController, ProductDetailsController, WishlistController};

use Illuminate\Support\Facades\{Auth, Route};

Auth::routes();

Route::controller(HomeController::class)->group(function () {
             //----- home.* -----
            Route::get('/', 'index')->name('home.index');
});



Route::group(["prefix" => "inicio", "as" => "home."], function () {


    Route::controller(ProductsController::class)->group(function () {

        Route::group(["prefix" => "productos", "as" => "products."], function () {
             //----- home.products.* -----
             Route::get('/', 'index')->name('index');
             Route::get('/search', 'search')->name('search');

        });
    });

    Route::controller(ShopController::class)->group(function () {
        Route::group(["prefix" => "tienda", "as" => "shop."], function(){
            //----- shop.* -----
            Route::get('/', 'index') -> name('index');
            Route::get('/product/{product}', 'show') -> name('show');
        });
    });

    /* Route::controller(ProfileController::class)->group(function () {
        Route::group(["prefix" => "perfil", "as" => "profile."], function(){
            //----- shop.* -----
            Route::get('/', 'index') -> name('index');
            Route::patch('/user/{user}', 'update') -> name('update');
        });
    }); */

    Route::controller(ProductDetailsController::class)->group(function () {
        Route::group(["prefix" => "detalles-de-producto", "as" => "product-details."], function(){
            //----- product-details.* -----
            Route::get('/{product}', 'index') -> name('index');
        });
    });

    Route::controller(CartController::class)->group(function () {

        Route::group(["prefix" => "carrito", "as" => "cart."], function () {
            //----- cart.* -----
            Route::get('/', 'index') -> name('index');
            Route::post('/agregar-todo','addAll')->name('addAll');
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
            Route::post('/actualizar-cantidad/{product}','update')->name('updateQuantity');
            Route::get('agregandoProducto/{p}', 'agregar')->name('agregarProducto');
            Route::get('eliminando/{p}', 'eliminar')->name('eliminarProducto');
        });
    });

    Route::controller(ProfileController::class)->group(function () {

        Route::group(["prefix" => "perfil", "as" => "profile."], function () {
             //----- profile.* -----
            Route::get('/', 'index')->name('index');
            Route::post('/validar-edicion/{column}', 'editValidate')->name('validateEdit');
            Route::get('/mis-compras', 'order')->name('order');
            Route::get('/cambiar-contrasena', 'password')->name('password');
            Route::post('/editar-contrasena', 'editarContrasena')->name('editar-contrasena');
            Route::post('/verificar-contrasena', 'verificarContrasena')->name('verificar-contrasena');

            // Route::get('/mis-metodos-de-pago', 'pay')->name('pay');
            // Route::get('/', 'lista-de-deseos')->name('list');
            // Route::get('/ver/{user}', 'show')->name('show');
            // Route::get('/editar/{user}', 'edit')->name('edit');
            // Route::post('/validar-edición/{column}', 'editValidate')->name('validateEdit');
        });
    });

    // ---------- ONLY CUSTOMERS -----------------

    Route::group(['middleware' => ['auth', 'check.valid.user']], function () {

        Route::group(["prefix" => "carrito", "as" => "cart."], function () {

            Route::controller(CartController::class)->group(function () {

                Route::post('/actualizar-cantidad/{product}','update')->name('updateQuantity');
                Route::get('/agregandoProducto/{p}', 'agregar')->name('agregarProducto');
                Route::get('/eliminando/{p}', 'eliminar')->name('eliminarProducto');
                Route::get('/cancelando', 'vaciar')->name('cancelando');
                Route::get('/pago-realizado-con-exito', 'paymentSuccess')->name('paymentSuccess');
                Route::get('/procesar-venta','processSell')->name('processSell');
            });
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

        // ---------------- PRODUCTS ...................
        // ------ admin.products.* -----------------
        Route::group(['prefix' => 'productos', 'as' => 'products.'], function () {

            Route::controller(ProductController::class)->group(function () {

                Route::get('/', 'index')->name('index');
                Route::get('/editar/{product}', 'edit')->name('edit');
                Route::post('/registrar', 'store')->name('store');
                Route::post('/actualizar/{product}', 'update')->name('update');
                Route::delete('/eliminar/{product}', 'destroy')->name('destroy');
            });
        });

        // ---------------- ANNOUNCEMENTS -------------------
        // ------ admin.announcements.* -----------------
        Route::group(['prefix' => 'anuncios', 'as' => 'announcements.'], function () {

            Route::controller(AnnouncementsController::class)->group(function () {

                Route::get('/', 'index')->name('index');
                Route::get('/obtener-banner/{banner}', 'editBanner')->name('edit');
                Route::post('/registrar-banner', 'store')->name('store');
                Route::post('/actualizar-banner/{banner}', 'updateBanner')->name('update');
                Route::delete('/eliminar-banner/{banner}', 'destroyBanner')->name('destroy');
            });
        });

         // ---------------- CUSTOMERS -------------------

         // ------ admin.customers.* -----------------
        Route::group(['prefix' => 'clientes', 'as' => 'customers.'], function () {

            Route::controller(CustomerController::class)->group(function () {

                Route::get('/', 'index')->name('index');
                 Route::get('/exportar-excel', 'exportExcel')->name('exportExcel');
            });
        });

        // ---------------- SELLS ---------------

        // --------- admin.sales.*

        Route::group(['prefix' => 'ventas', 'as' => 'sales.'], function () {

            Route::controller(SalesController::class)->group(function () {

                Route::get('/', 'index')->name('index');
                Route::get('/exportar-excel', 'exportExcel')->name('exportExcel');
            });
        });
    });
});
