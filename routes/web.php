<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Product\ProductController; 
use App\Http\Controllers\ProductDataController;
use App\Models\post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostCont;
use App\Http\Controllers\ExceptionController;
use App\Http\Controllers\PostController;
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
    $posts = post::all();  

    return view('dashboard', compact('posts'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

// Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
Route::get('/onetone', [PostController::class, 'onetoone'])->name('posts.subscribe');
Route::get('/onetmany', [PostController::class, 'onetomany']);
Route::get('/getdata', [ExceptionController::class, 'getdata']);
Route::get('/add-product', [ProductController::class, 'addproduct']);
//
 


// Route::post('/product/save', [ProductDataController::class, 'saveFormData'])->name('product.save');


 
 // for adding product
Route::post('/product/save', [ProductDataController::class, 'saveProduct'])->name('product.save');
// product discount route
Route::post('/product/discounts', [ProductDataController::class, 'discountStore'])->name('discounts.store');



});

require __DIR__.'/auth.php';

Route::get('/send-email', function(){

$usermail='sardarnawaz122@gmail.com';
dispatch(new App\Jobs\sendemailjob($usermail));
return view('UserEmialJob');
});