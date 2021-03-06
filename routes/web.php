<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\PlayerController;
use Illuminate\Support\Facades\App;
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

Route::get('/', function () {
    return view('welcome');
});

Route::fallback([PlayerController::class, "index"])->middleware(["auth"]);

Route::get("/storage/{image}", function ($image){
    return "/storage/"+ $image;
})->name("image");

Route::resource("players", PlayerController::class)->middleware(['auth']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/set_language/{lang}', [Controller::class, 'set_language'])->name('set_language');

require __DIR__ . '/auth.php';
