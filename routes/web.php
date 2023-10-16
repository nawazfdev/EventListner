<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostCont;
use App\Http\Controllers\ExceptionController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

// Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
Route::post('/posts', [PostCont::class, 'store'])->name('posts.store');
Route::get('/onetone', [PostCont::class, 'onetoone'])->name('posts.subscribe');
Route::get('/onetmany', [PostCont::class, 'onetomany']);
Route::get('/getdata', [ExceptionController::class, 'getdata']);

 




});

require __DIR__.'/auth.php';

Route::get('/send-email', function(){

$usermail='sardarnawaz122@gmail.com';
dispatch(new App\Jobs\sendemailjob($usermail));
dd('send email successfully');

});