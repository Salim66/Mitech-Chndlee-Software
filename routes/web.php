<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MofaController;
use App\Http\Controllers\VisaController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FlightController;
use App\Http\Controllers\ManPowerController;
use App\Http\Controllers\TranCertiController;
use App\Http\Controllers\TestMedicalController;
use App\Http\Controllers\FinalMedicalController;
use App\Http\Controllers\EntryPassportController;
use App\Http\Controllers\FinalStateController;
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
        Route::get('/pending-list', [TestMedicalController::class, 'tMedicalPendingList'])->name('tMedical.pending.list');
        Route::get('/done-list', [TestMedicalController::class, 'tMedicalDoneList'])->name('tMedical.done.list');
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
        Route::get('/pending-list', [FinalMedicalController::class, 'fMedicalPendingList'])->name('fMedical.pending.list');
        Route::get('/done-list', [FinalMedicalController::class, 'fMedicalDoneList'])->name('fMedical.done.list');
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
        Route::get('/pending-list', [PoliceClearanceController::class, 'pClearancePendingList'])->name('pClearance.pending.list');
        Route::get('/done-list', [PoliceClearanceController::class, 'pClearanceDoneList'])->name('pClearance.done.list');
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
        Route::get('/pending-list', [MofaController::class, 'mofaPendingList'])->name('mofa.pending.list');
        Route::get('/done-list', [MofaController::class, 'mofaDoneList'])->name('mofa.done.list');
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

    // Visa
    Route::prefix('visa')->group(function(){
        Route::get('/list', [VisaController::class, 'visaList'])->name('visa.list');
        Route::get('/pending-list', [VisaController::class, 'visaPendingList'])->name('visa.pending.list');
        Route::get('/done-list', [VisaController::class, 'visaDoneList'])->name('visa.done.list');
        Route::get('/create', [VisaController::class, 'visaCreate'])->name('add.visa');
        Route::post('/store', [VisaController::class, 'visaStore'])->name('store.visa');
        Route::get('/edit/{id}', [VisaController::class, 'visaEdit'])->name('edit.visa');
        Route::patch('/update/{id}', [VisaController::class, 'visaUpdate'])->name('update.visa');
        Route::get('/delete/{id}', [VisaController::class, 'visaDelete'])->name('delete.visa');
        Route::get('/status/{id}', [VisaController::class, 'visaStatus'])->name('status.visa');
        Route::get('/trash-list', [VisaController::class, 'visaTrashList'])->name('trash.visa');
        Route::get('/revocer/{id}', [VisaController::class, 'visaRecover'])->name('recover.visa');
        Route::get('/permanent-delete/{id}', [VisaController::class, 'visaPermanentDelete'])->name('permanent.delete.visa');
    });

    // Training Certificate
    Route::prefix('training')->group(function(){
        Route::get('/list', [TranCertiController::class, 'tranList'])->name('tran.list');
        Route::get('/pending-list', [TranCertiController::class, 'tranPendingList'])->name('tran.pending.list');
        Route::get('/done-list', [TranCertiController::class, 'tranDoneList'])->name('tran.done.list');
        Route::get('/create', [TranCertiController::class, 'tranCreate'])->name('add.tran');
        Route::post('/store', [TranCertiController::class, 'tranStore'])->name('store.tran');
        Route::get('/edit/{id}', [TranCertiController::class, 'tranEdit'])->name('edit.tran');
        Route::patch('/update/{id}', [TranCertiController::class, 'tranUpdate'])->name('update.tran');
        Route::get('/delete/{id}', [TranCertiController::class, 'tranDelete'])->name('delete.tran');
        Route::get('/status/{id}', [TranCertiController::class, 'tranStatus'])->name('status.tran');
        Route::get('/trash-list', [TranCertiController::class, 'tranTrashList'])->name('trash.tran');
        Route::get('/revocer/{id}', [TranCertiController::class, 'tranRecover'])->name('recover.tran');
        Route::get('/permanent-delete/{id}', [TranCertiController::class, 'tranPermanentDelete'])->name('permanent.delete.tran');
    });

    // Man Power
    Route::prefix('man-power')->group(function(){
        Route::get('/list', [ManPowerController::class, 'manList'])->name('man.list');
        Route::get('/pending-list', [ManPowerController::class, 'manPendingList'])->name('man.pending.list');
        Route::get('/done-list', [ManPowerController::class, 'manDoneList'])->name('man.done.list');
        Route::get('/create', [ManPowerController::class, 'manCreate'])->name('add.man');
        Route::post('/store', [ManPowerController::class, 'manStore'])->name('store.man');
        Route::get('/edit/{id}', [ManPowerController::class, 'manEdit'])->name('edit.man');
        Route::patch('/update/{id}', [ManPowerController::class, 'manUpdate'])->name('update.man');
        Route::get('/delete/{id}', [ManPowerController::class, 'manDelete'])->name('delete.man');
        Route::get('/status/{id}', [ManPowerController::class, 'manStatus'])->name('status.man');
        Route::get('/trash-list', [ManPowerController::class, 'manTrashList'])->name('trash.man');
        Route::get('/revocer/{id}', [ManPowerController::class, 'manRecover'])->name('recover.man');
        Route::get('/permanent-delete/{id}', [ManPowerController::class, 'manPermanentDelete'])->name('permanent.delete.man');
    });

    // Flight
    Route::prefix('flight')->group(function(){
        Route::get('/list', [FlightController::class, 'flightList'])->name('flight.list');
        Route::get('/pending-list', [FlightController::class, 'flightPendingList'])->name('flight.pending.list');
        Route::get('/done-list', [FlightController::class, 'flightDoneList'])->name('flight.done.list');
        Route::get('/create', [FlightController::class, 'flightCreate'])->name('add.flight');
        Route::post('/store', [FlightController::class, 'flightStore'])->name('store.flight');
        Route::get('/edit/{id}', [FlightController::class, 'flightEdit'])->name('edit.flight');
        Route::patch('/update/{id}', [FlightController::class, 'flightUpdate'])->name('update.flight');
        Route::get('/delete/{id}', [FlightController::class, 'flightDelete'])->name('delete.flight');
        Route::get('/status/{id}', [FlightController::class, 'flightStatus'])->name('status.flight');
        Route::get('/trash-list', [FlightController::class, 'flightTrashList'])->name('trash.flight');
        Route::get('/revocer/{id}', [FlightController::class, 'flightRecover'])->name('recover.flight');
        Route::get('/permanent-delete/{id}', [FlightController::class, 'flightPermanentDelete'])->name('permanent.delete.flight');
    });

    // Final State
    Route::get('/final-state', [FinalStateController::class, 'finalStateList'])->name('final.state.list');
    Route::get('/delete/final-state/{id}', [FinalStateController::class, 'deleteFinalState'])->name('delete.final.state');



});
