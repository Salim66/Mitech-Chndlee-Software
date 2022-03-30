<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MofaController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TestMedicalController;
use App\Http\Controllers\FinalMedicalController;
use App\Http\Controllers\EntryPassportController;
use App\Http\Controllers\PoliceClearanceController;

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
        Route::get('/status/{id}', [EntryPassportController::class, 'passportStatus'])->name('status.passport');
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
        Route::get('/status/{id}', [TestMedicalController::class, 'tMedicalStatus'])->name('status.tMedical');
        Route::get('/trash-list', [TestMedicalController::class, 'tMedicalTrashList'])->name('trash.tMedical');
        Route::get('/revocer/{id}', [TestMedicalController::class, 'tMedicalRecover'])->name('recover.tMedical');
        Route::get('/permanent-delete/{id}', [TestMedicalController::class, 'tMedicalPermanentDelete'])->name('permanent.delete.tMedical');
    });

    // Final Medical
    Route::prefix('final-medical')->group(function(){
        Route::get('/list', [FinalMedicalController::class, 'fMedicalList'])->name('fMedical.list');
        Route::get('/create', [FinalMedicalController::class, 'fMedicalCreate'])->name('add.fMedical');
        Route::post('/store', [FinalMedicalController::class, 'fMedicalStore'])->name('store.fMedical');
        Route::get('/edit/{id}', [FinalMedicalController::class, 'fMedicalEdit'])->name('edit.fMedical');
        Route::patch('/update/{id}', [FinalMedicalController::class, 'fMedicalUpdate'])->name('update.fMedical');
        Route::get('/delete/{id}', [FinalMedicalController::class, 'fMedicalDelete'])->name('delete.fMedical');
        Route::get('/status/{id}', [FinalMedicalController::class, 'fMedicalStatus'])->name('status.fMedical');
        Route::get('/trash-list', [FinalMedicalController::class, 'fMedicalTrashList'])->name('trash.fMedical');
        Route::get('/revocer/{id}', [FinalMedicalController::class, 'fMedicalRecover'])->name('recover.fMedical');
        Route::get('/permanent-delete/{id}', [FinalMedicalController::class, 'fMedicalPermanentDelete'])->name('permanent.delete.fMedical');
    });

    // Police Clearance
    Route::prefix('police-clearance')->group(function(){
        Route::get('/list', [PoliceClearanceController::class, 'pClearanceList'])->name('pClearance.list');
        Route::get('/create', [PoliceClearanceController::class, 'pClearanceCreate'])->name('add.pClearance');
        Route::post('/store', [PoliceClearanceController::class, 'pClearanceStore'])->name('store.pClearance');
        Route::get('/edit/{id}', [PoliceClearanceController::class, 'pClearanceEdit'])->name('edit.pClearance');
        Route::patch('/update/{id}', [PoliceClearanceController::class, 'pClearanceUpdate'])->name('update.pClearance');
        Route::get('/delete/{id}', [PoliceClearanceController::class, 'pClearanceDelete'])->name('delete.pClearance');
        Route::get('/status/{id}', [PoliceClearanceController::class, 'pClearanceStatus'])->name('status.pClearance');
        Route::get('/trash-list', [PoliceClearanceController::class, 'pClearanceTrashList'])->name('trash.pClearance');
        Route::get('/revocer/{id}', [PoliceClearanceController::class, 'pClearanceRecover'])->name('recover.pClearance');
        Route::get('/permanent-delete/{id}', [PoliceClearanceController::class, 'pClearancePermanentDelete'])->name('permanent.delete.pClearance');
    });

    // Mofa
    Route::prefix('mofa')->group(function(){
        Route::get('/list', [MofaController::class, 'mofaList'])->name('mofa.list');
        Route::get('/create', [MofaController::class, 'mofaCreate'])->name('add.mofa');
        Route::post('/store', [MofaController::class, 'mofaStore'])->name('store.mofa');
        Route::get('/edit/{id}', [MofaController::class, 'mofaEdit'])->name('edit.mofa');
        Route::patch('/update/{id}', [MofaController::class, 'mofaUpdate'])->name('update.mofa');
        Route::get('/delete/{id}', [MofaController::class, 'mofaDelete'])->name('delete.mofa');
        Route::get('/status/{id}', [MofaController::class, 'mofaStatus'])->name('status.mofa');
        Route::get('/trash-list', [MofaController::class, 'mofaTrashList'])->name('trash.mofa');
        Route::get('/revocer/{id}', [MofaController::class, 'mofaRecover'])->name('recover.mofa');
        Route::get('/permanent-delete/{id}', [MofaController::class, 'mofaPermanentDelete'])->name('permanent.delete.mofa');
    });



});
