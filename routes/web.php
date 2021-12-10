<?php

use App\Http\Controllers\Users\CartController;
use App\Http\Controllers\Users\HomeController;
use App\Http\Controllers\Users\ItemController;
Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes();

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Audit Logs
    Route::resource('audit-logs', 'AuditLogsController', ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);

    // Category
    Route::delete('categories/destroy', 'CategoryController@massDestroy')->name('categories.massDestroy');
    Route::resource('categories', 'CategoryController');

    // Color
    Route::delete('colors/destroy', 'ColorController@massDestroy')->name('colors.massDestroy');
    Route::resource('colors', 'ColorController');

    // Special For
    Route::delete('special-fors/destroy', 'SpecialForController@massDestroy')->name('special-fors.massDestroy');
    Route::resource('special-fors', 'SpecialForController');

    // Location
    Route::delete('locations/destroy', 'LocationController@massDestroy')->name('locations.massDestroy');
    Route::resource('locations', 'LocationController');

    // Item
    Route::delete('items/destroy', 'ItemController@massDestroy')->name('items.massDestroy');
    Route::resource('items', 'ItemController');
    Route::post('items/media', 'ItemController@storeMedia')->name('items.storeMedia');

    // Cart
    Route::delete('carts/destroy', 'CartController@massDestroy')->name('carts.massDestroy');
    Route::resource('carts', 'CartController');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});

Route::get('/florist-home', [HomeController::class, 'index'])->name('user.index');
Route::get('/user-login', [HomeController::class, 'login'])->name('user.login');
Route::get('/user-register', [HomeController::class, 'register'])->name('user.register');
Route::post('/storeRegister', [HomeController::class, 'storeRegister'])->name('storeRegister');
Route::get('/detail-product/{id}', [HomeController::class, 'detailProduct'])->name('user.detailProduct');
Route::get('/my-account', [HomeController::class, 'myAccount'])->name('user.myAccount');
Route::get('/about', [HomeController::class, 'about'])->name('user.about');
Route::get('/products', [HomeController::class, 'product'])->name('user.products');
Route::post('/storeLogout', [HomeController::class, 'storeLogout'])->name('storeLogout');
Route::get('/filter/{id}/{type}', [ItemController::class, 'filter'])->name('user.filter');
Route::post('/filter-item', [ItemController::class, 'filterItem'])->name('user.filterItem');

Route::post('cart', [CartController::class, 'addToCart'])->name('cart.store');
Route::post('update-cart', [CartController::class, 'updateCart'])->name('cart.update');
Route::post('remove', [CartController::class, 'removeCart'])->name('cart.remove');
Route::post('clear', [CartController::class, 'clearAllCart'])->name('cart.clear');
Route::post('checkout', [CartController::class, 'cartCheckout'])->name('cart.cartCheckout');


