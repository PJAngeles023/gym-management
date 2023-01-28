<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\MembershipController;
use App\Http\Controllers\TrainerController;
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


Route::get('/', [MemberController::class, 'index'])->name('index');
Route::post('/createmembers', [MemberController::class, 'create'])->name('createmembers');
Route::delete('/deletemembers/{id}', [MemberController::class, 'destroy'])->name('destroymembers');
Route::get('/editmembers/{id}', [MemberController::class, 'edit'])->name('editmembers');
Route::post('/updatemembers', [MemberController::class, 'update'])->name('updatemembers');

Route::get('/trainer/{id}', [MemberController::class, 'trainer'])->name('memberTrainers');

Route::get('/membership/{id}', [MemberController::class, 'membership'])->name('memberMembership');