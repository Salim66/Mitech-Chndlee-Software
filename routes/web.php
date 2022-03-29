<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TestMedicalController;
use App\Http\Controllers\EntryPassportController;

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

Route::middleware(['auth'])->group(function () {

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

        // User Profile
        Route::get('/profile', [AdminController::class, 'userProfile'])->name('user.profile');
        Route::get('/profile/edit/{id}', [AdminController::class, 'userProfileEdit'])->name('user.profile.edit');
        Route::patch('/profile/update/{id}', [AdminController::class, 'usersUpdateProfile'])->name('update.user.profile');

        // User Change Password
        Route::get('/change-password', [AdminController::class, 'changePassword'])->name('user.change-password');
        Route::patch('/password-update/{id}', [AdminController::class, 'updatePassword'])->name('user.password-update');
    });

    // Entry Passport
    Route::prefix('passport')->group(function(){
        Route::get('/list', [EntryPassportController::class, 'passportList'])->name('passport.list');
        Route::get('/create', [EntryPassportController::class, 'passportCreate'])->name('add.passport');
        Route::post('/store', [EntryPassportController::class, 'passportStore'])->name('store.passport');
        Route::get('/edit/{id}', [EntryPassportController::class, 'passportEdit'])->name('edit.passport');
        Route::patch('/update/{id}', [EntryPassportController::class, 'passportUpdate'])->name('update.passport');
        Route::get('/delete/{id}', [EntryPassportController::class, 'passportDelete'])->name('delete.passport');
        Route::get('/trash-list', [EntryPassportController::class, 'passportTrashList'])->name('trash.passport');
        Route::get('/revocer/{id}', [EntryPassportController::class, 'passportRecover'])->name('recover.passport');
        Route::get('/permanent-delete/{id}', [EntryPassportController::class, 'passportPermanentDelete'])->name('permanent.delete.passport');
    });

    // Test Medical
    Route::prefix('test-medical')->group(function(){
        Route::get('/list', [TestMedicalController::class, 'tMedicalList'])->name('tMedical.list');
        Route::get('/create', [TestMedicalController::class, 'tMedicalCreate'])->name('add.tMedical');
        Route::post('/store', [TestMedicalController::class, 'tMedicalStore'])->name('store.tMedical');
        Route::get('/edit/{id}', [TestMedicalController::class, 'tMedicalEdit'])->name('edit.tMedical');
        Route::patch('/update/{id}', [TestMedicalController::class, 'tMedicalUpdate'])->name('update.tMedical');
        Route::get('/delete/{id}', [TestMedicalController::class, 'tMedicalDelete'])->name('delete.tMedical');
        Route::get('/trash-list', [TestMedicalController::class, 'tMedicalTrashList'])->name('trash.tMedical');
        Route::get('/revocer/{id}', [TestMedicalController::class, 'tMedicalRecover'])->name('recover.tMedical');
        Route::get('/permanent-delete/{id}', [TestMedicalController::class, 'tMedicalPermanentDelete'])->name('permanent.delete.tMedical');
    });



});
