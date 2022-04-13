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
    if (auth()->check()) {
        return view('page.feed')->with(['menu' => 'feed']);
    } else {
        return view('welcome');
    }
});
Route::middleware(['auth:sanctum', 'verified'])->get('/homes', function () {
    return view('page.homes')->with(['menu' => 'homes']);
});
Route::middleware(['auth:sanctum', 'verified'])->get('/register/home', function () {
    return view('page.new-home')->with(['menu' => 'homes']);
});
Route::middleware(['auth:sanctum', 'verified'])->get('/fundraise', function () {
    return view('page.fundraiser')->with(['menu' => 'fundraise']);
});


Route::middleware(['auth:sanctum', 'verified'])->get('/edit/h/{slug}', function ($slug) {
    $home = App\Models\Home::where('slug', $slug)->value('id');
    if(auth()->user()->homes()->where('home_id', $home)->where('home_user.status', 'approved')->count()) {
        return view('page.edit-home')->with(['id' => $home, 'menu' => 'homes']);
    }
    abort(404);
});

Route::middleware(['auth:sanctum', 'verified'])->get('/f/delete/{id}', [App\Http\Controllers\HomesController::class, 'deleteFeed']);

Route::middleware(['auth:sanctum', 'verified'])->get('/p/{user}/{subslug}', function($user, $subslug){
    $feed = App\Models\Feed::where('slug', '/'.request()->path());
    if($feed) {
        $feed = $feed->first();
        if ($feed->type == 'fundraise') {
            return view('page.fundraiser-detail')->with(['feed' => $feed, 'menu' => 'fundraise']);
        } else if ($feed && $feed->type == 'post') {
        // return view('page.fundraiser-detail')->with(['feed' => $feed]);
        }
    }
    abort(404);
});

Route::middleware(['auth:sanctum', 'verified'])->get('/admin/{admin}/delete/{page}', [App\Http\Controllers\HomesController::class, 'removeAdmin']);

Route::middleware(['auth:sanctum', 'verified'])->get('/admin/{admin}/add/{page}', [App\Http\Controllers\HomesController::class, 'addAdmin']);

Route::middleware(['auth:sanctum', 'verified'])->get('/fundraise/new', function () {
    return view('page.fundraiser-form')->with(['menu' => 'fundraise']);
});

Route::middleware(['auth:sanctum', 'verified'])->get('/complaints', function () {
    return view('page.complaint')->with(['menu' => 'complaint']);
});

Route::middleware(['auth:sanctum', 'verified'])->get('/h/{home}', function ($home) {
    if($h = App\Models\Home::where('slug', $home)) {
        return view('page.home')->with(['home' => $h->first(), 'menu' => 'homes']);
    } else {
        abort(404);
    }
});

Route::middleware(['auth:sanctum', 'verified'])->get('/accept-invitation/{home}', [App\Http\Controllers\HomesController::class, 'accept']);
Route::middleware(['auth:sanctum', 'verified'])->get('/reject-invitation/{home}', [App\Http\Controllers\HomesController::class, 'reject']);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return redirect('/');
    // return view('dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/mark-as-read-all', function () {
    auth()->user()->unreadNotifications->markAsRead();
});

// Route::get('create-transaction', [App\Http\Controllers\PayPalController::class, 'createTransaction'])->name('createTransaction');
Route::middleware(['auth:sanctum', 'verified'])->get('process-transaction', [App\Http\Controllers\PayPalController::class, 'processTransaction'])->name('processTransaction');
Route::get('success-transaction', [App\Http\Controllers\PayPalController::class, 'successTransaction'])->name('successTransaction');
Route::get('cancel-transaction', [App\Http\Controllers\PayPalController::class, 'cancelTransaction'])->name('cancelTransaction');

Route::middleware(['auth:sanctum', 'verified'])->prefix('admin')->group(function () {
    Route::get('/approvals/home', [App\Http\Controllers\AdminsController::class, 'home']);
    Route::get('/approvals/fundraise', [App\Http\Controllers\AdminsController::class, 'fundraise']);
    Route::get('/complaints', [App\Http\Controllers\AdminsController::class, 'complaints']);
    Route::get('/payout', [App\Http\Controllers\AdminsController::class, 'payout']);
    Route::get('/report', [App\Http\Controllers\AdminsController::class, 'report']);
    Route::get('/users', [App\Http\Controllers\AdminsController::class, 'users']);
    Route::put('/fund/pay-back', [App\Http\Controllers\AdminsController::class, 'saveFund']);

    Route::delete('/detach-admin', [App\Http\Controllers\AdminsController::class, 'removeAdmin']);
    Route::post('/attach-admin', [App\Http\Controllers\AdminsController::class, 'addAdmin']);

    Route::put('/complaint-updates', [App\Http\Controllers\AdminsController::class, 'updateComplaint']);

    Route::post('/approval/home', [App\Http\Controllers\AdminsController::class, 'homeApproval']);
    Route::post('/reject/home', [App\Http\Controllers\AdminsController::class, 'homeRejection']);
    Route::post('/approval/feed', [App\Http\Controllers\AdminsController::class, 'feedApproval']);
    Route::post('/reject/feed', [App\Http\Controllers\AdminsController::class, 'feedRejection']);
});
