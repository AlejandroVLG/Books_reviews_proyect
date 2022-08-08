<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/newRole', [RoleController::class, 'newRole']);

Route::group(["middleware" => "jwt.auth"], function () {

    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/myProfile', [UserController::class, 'showProfile']);
});

Route::group(["middleware" => ["jwt.auth", "isAdmin"]], function () {

    Route::get('/user/getAllUsers', [UserController::class, 'getUsers']);
});

Route::group(["middleware" => ["jwt.auth", "isSuperAdmin"]], function () {

    Route::post('/user/admin/{id}', [UserController::class, 'addAdminRoleToUser']);
    Route::post('/user/admin_remove/{id}', [UserController::class, 'removeAdminRoleToUser']);
});
