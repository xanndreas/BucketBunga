<?php

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
    Route::post('items/media', 'ItemController@storeMedia')->name('items.storeMedia');
    Route::post('items/ckmedia', 'ItemController@storeCKEditorImages')->name('items.storeCKEditorImages');
    Route::resource('items', 'ItemController');

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
