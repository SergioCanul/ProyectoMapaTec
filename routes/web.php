<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\MapaMenuPrincipal;
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
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

});

Route::view('menuprincipal', 'livewire.menu.menuprincipal')->middleware('auth');
Route::view('menuadmin', 'livewire.menuadmin.menuadmin')->middleware('auth');
Route::get('/imagen/{id}', MapaMenuPrincipal::class)->name('imagen');
