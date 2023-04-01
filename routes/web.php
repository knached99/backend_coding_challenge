<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AuthenticationMiddleware;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('login'); 
});

Route::post('login', [AdminController::class, 'login'])->name('login');

// These are the protected routes which cannot be accessed if the admin is not authenticated
Route::group(['middleware' => [AuthenticationMiddleware::class]], function(){
    Route::get('/admin/dash', [DashboardController::class, 'index'])->name('admin.dash');
    Route::get('logout', [AdminController::class, 'logout'])->name('logout');
    Route::post('/admin/dash/create_user', [DashboardController::class, 'create_user'])->name('admin.dash.create_user');
    Route::match(['get','put'],'admin/user/{id}/edit', [DashboardController::class, 'update_user'])->name('admin.user.edit');
    Route::delete('admin/user/{id}/delete', [DashboardController::class, 'delete_user'])->name('admin.user.delete');
});