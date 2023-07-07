<?php

use App\Http\Controllers\ResepController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('resepfree');
// })->name('home');

Route::get('/', [ResepController::class, 'index'])->name('allresep');
// route::view('/dashboard', 'dashboard')->name('dashboard');

Route::group(['middleware' => ['auth', 'verified']], function () {
    route::get('/resepsaya', [ResepController::class, 'resepsaya'])->name('resepsaya');
    Route::get('/addresep', [ResepController::class, 'vaddresep'])->name('addresep');
    Route::post('/storeresep', [ResepController::class, 'storeresep'])->name('storeresep');
    Route::get('/detail/{id}', [ResepController::class, 'detailresep'])->name('detailresep');
});

require __DIR__ . '/auth.php';
