<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

////////// ENDPOINTS QUE REQUIEREN AUTENTIFICACIÓN ////////////////////

Route::group(["middleware" => "jwt.auth"], function () {

    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('user/myProfile', [UserController::class, 'showMyProfile']);
    Route::put('user/editMyProfile', [UserController::class, 'editMyProfile']);
    Route::delete('user/deleteMyProfile', [UserController::class, 'deleteMyProfile']);

    Route::get('book/showAllBooks', [BookController::class, 'showAllBooks']);
    Route::post('book/createBook', [BookController::class, 'createBook']);
    Route::put('book/editBookById/{id}', [BookController::class, 'editBookById']);

});

////////// ENDPOINTS QUE REQUIEREN EL MIDDLEWARE "isAdmin" ////////////////////

Route::group(["middleware" => ["jwt.auth", "isAdmin"]], function () {

    Route::get('/user/getAllUsers', [UserController::class, 'getUsers']);
});

////////// ENDPOINTS QUE REQUIEREN EL MIDDLEWARE "isSuperAdmin" ////////////////////

Route::group(["middleware" => ["jwt.auth", "isSuperAdmin"]], function () {

    Route::post('/role/newRole', [RoleController::class, 'newRole']);
    Route::delete('/role/deleteRole/{id}', [RoleController::class, 'deleteRole']);

    Route::post('/user/admin/{id}', [UserController::class, 'addAdminRoleToUser']);
    Route::delete('/user/admin_remove/{id}', [UserController::class, 'removeAdminRoleToUser']);
});
