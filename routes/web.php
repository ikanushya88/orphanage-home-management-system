<?php

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
    return view('page.feed');
});
Route::get('/homes', function () {
    return view('page.homes');
});
Route::get('/register/home', function () {
    return view('page.new-home');
});
Route::get('/h/{home}', function ($home) {
    if($h = App\Models\Home::where('slug', $home)) {
        return view('page.home')->with(['home' => $h->first()]);
    } else {
        abort(404);
    }
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return redirect('/');
    // return view('dashboard');
})->name('dashboard');
