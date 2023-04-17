<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminsController;
use App\Http\Controllers\ProjectTypesController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::post('login',[UserController::class, 'login']);

Route::middleware('auth:sanctum')->group( function () {
    Route::post('admin/add',[AdminsController::class, 'addAdmin']);
    Route::post('projecttype/add',[ProjectTypesController::class, 'addProjectTypes']);
    Route::get('projecttype/show',[ProjectTypesController::class, 'showProjectTypes']);
    Route::get('projecttype/find/{id}',[ProjectTypesController::class, 'findProjectTypes']);
    Route::post('projecttype/update/{id}',[ProjectTypesController::class, 'updateProjectTypes']);
    Route::delete('projecttype/delete/{id}',[ProjectTypesController::class, 'deleteProjectTypes']);

});

Route::post('admin',[AdminsController::class, 'adminLogin']);
// Route::post('admin/add',[AdminsController::class, 'addAdmin']);

