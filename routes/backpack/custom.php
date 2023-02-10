<?php

use Illuminate\Support\Facades\Route;

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\Base.
// Routes you generate using Backpack\Generators will be placed here.

$roleAdmin = \App\Models\Role::ADMIN;
$roleAgent = \App\Models\Role::AGENT;

Route::group([
    'prefix'     => config('backpack.base.route_prefix', 'admin'),
    'middleware' => array_merge(
        (array) config('backpack.base.web_middleware', 'web'),
        (array) config('backpack.base.middleware_key', 'admin'),
        (array) "role:{$roleAdmin}|{$roleAgent}",
        ['admin']
    ),
    'namespace'  => 'App\Http\Controllers\Admin',
], function () { // custom admin routes
    Route::crud('tour', 'TourCrudController');
    Route::get('tour/{tour}/{status}/status', 'TourCrudController@status')->name('tour-crud.status');
//    Route::crud('country', 'CountryCrudController');
    Route::crud('region', 'RegionCrudController');
    Route::crud('tag', 'TagCrudController');
    Route::crud('appeal', 'AppealCrudController');
    Route::crud('comment', 'CommentCrudController');
}); // this should be the absolute last line of this file