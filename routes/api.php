<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
    // Permissions
    Route::apiResource('permissions', 'PermissionsApiController');

    // Roles
    Route::apiResource('roles', 'RolesApiController');

    // Users
    Route::apiResource('users', 'UsersApiController');

    // Category
    Route::apiResource('categories', 'CategoryApiController');

    // Color
    Route::apiResource('colors', 'ColorApiController');

    // Special For
    Route::apiResource('special-fors', 'SpecialForApiController');

    // Location
    Route::apiResource('locations', 'LocationApiController');

    // Item
    Route::apiResource('items', 'ItemApiController');

    // Cart
    Route::apiResource('carts', 'CartApiController');
});
