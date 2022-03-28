<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');




// Admin All Routes

// Admin Logout Route
Route::get('/logout', [AdminController::class, 'logout'])->name('logout');

Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    // User List Routes
    Route::prefix('users')->group(function () {
        Route::get('/list', [AdminController::class, 'usersList'])->name('users.list');
        Route::get('/create', [AdminController::class, 'usersCreate'])->name('add.user');
        Route::post('/store', [AdminController::class, 'usersStore'])->name('store.user');
        Route::get('/edit/{id}', [AdminController::class, 'usersEdit'])->name('edit.user');
        Route::patch('/update/{id}', [AdminController::class, 'usersUpdate'])->name('update.user');
        Route::get('/delete/{id}', [AdminController::class, 'usersDelete'])->name('delete.user');
        Route::get('/trash-list', [AdminController::class, 'usersTrashList'])->name('trash.user');
        Route::get('/revocer/{id}', [AdminController::class, 'usersRecover'])->name('recover.user');
        Route::get('/permanent-delete/{id}', [AdminController::class, 'usersPermanentDelete'])->name('permanent.delete.user');
    });

});
