<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemberController;
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
Route::get('/createmembers', [MemberController::class, 'create'])->name('createmembers');
Route::post('/', [MemberController::class, 'store'])->name('store');
Route::get('/editmembers/{id}', [MemberController::class, 'edit'])->name('editmembers');
Route::post('/updatemembers/{id}', [MemberController::class, 'update'])->name('updatemembers');
Route::delete('/deletemembers/{id}', [MemberController::class, 'destroy'])->name('destroymembers');
