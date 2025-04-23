<?php

use App\Http\Controllers\master\UomController;
use Illuminate\Support\Facades\Route;

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
    return view('blank');
});


Route::get('/master/uom', [UomController::class, 'index'])->name('uom.index');
Route::post('/master/uom/store', [UomController::class, 'store'])->name('uom.store');
