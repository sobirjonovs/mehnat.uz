<?php

use App\Http\Controllers\Api\Employer\EmployerController;
use App\Http\Controllers\Api\Organization\OrganizationController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::middleware('auth:sanctum')->group(function () {
    Route::prefix('organizations')->name('organization.')->group(function () {
        Route::put('/{organization}/update', [OrganizationController::class, 'update'])
            ->name('update')
            ->middleware('ability:crud,edit');

        Route::get('/', [OrganizationController::class, 'index'])
            ->name('index')
            ->middleware('ability:view-all');

        Route::middleware('ability:crud')->group(function () {
            Route::get('/{organization}', [OrganizationController::class, 'show'])->name('show');
            Route::post('/create', [OrganizationController::class, 'store'])->name('store');
            Route::delete('/{organization}/delete', [OrganizationController::class, 'destroy'])->name('delete');
        });
    });

    Route::prefix('employers')->name('employers.')->group(function () {
        Route::get('/', [EmployerController::class, 'index'])
            ->name('index')
            ->middleware('ability:view-related');
        Route::middleware('ability:edit')->group(function () {
            Route::get('/{employer}', [EmployerController::class, 'show'])->name('show');
            Route::post('/{organization}/employer/create', [EmployerController::class, 'store'])->name('store');
            Route::put('/{employer}/update', [EmployerController::class, 'update'])->name('update');
            Route::delete('/{employer}/delete', [EmployerController::class, 'destroy'])->name('delete');
        });
    });
});
