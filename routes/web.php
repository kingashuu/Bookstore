<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\SlidersController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\BookCommentController;
use App\Http\Controllers\FilterSearchController;
use App\Http\Controllers\Public\PublicController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Public\PublicBookController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

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
//     return view('welcome');
// });


Route::get('/test', [Controller::class, 'index']);


Route::get('/', [PublicController::class, 'index'])->name('public');

Route::get('/books', [PublicBookController::class, 'index'])->name('public.book');
Route::get('/books/{slug}', [PublicBookController::class, 'show'])->name('public.show-book');
Route::get('books/{id}/download', [BookController::class, 'download'])->name('books.download');

Route::get('/search', [FilterSearchController::class, 'index'])->name('search');
Route::get('/categories/{slug}', [FilterSearchController::class, 'filter_by_category'])->name('filterCategory');




Route::middleware(['auth:sanctum',config('jetstream.auth_session'), 'admin'])->group(function () {

    Route::post('/books/{book:slug}/comments', [BookCommentController::class, 'store'])->name('store-comments');
});

Route::get('/contact-us', [ContactUsController::class, 'index'])->name('Contact-us');
Route::post('/contact-us', [ContactUsController::class, 'store'])->name('store-contact');
Route::get('/thankyou', [ContactUsController::class, 'thankyou'])->name('thankyou');
// Route::get('/thankyou', function () { return view('thankyou');
// });



Route::middleware(['auth:sanctum',config('jetstream.auth_session'), ])->group(function () {
    Route::get('dashboard', function () {return view('dashboard');})->name('dashboard');
});

Route::prefix('admin')->name('admin.')->middleware(['admin'])->group(function () {
    Route::get('dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

    Route::get('books', [BookController::class, 'index'])->name('books');
    Route::get('books/create', [BookController::class, 'create'])->name('books.create');
    Route::post('books', [BookController::class, 'store'])->name('books.store');
    Route::get('books/{book}', [BookController::class, 'show'])->name('books.show');
    Route::get('books/{book}/edit', [BookController::class, 'edit'])->name('books.edit');
    Route::patch('books/{book}', [BookController::class, 'update'])->name('books.update');
    Route::DELETE('books/{book}', [BookController::class, 'destroy'])->name('books.delete');

    Route::get('books/{id}/download', [BookController::class, 'download'])->name('books.download');

    Route::get('category', [CategoryController::class, 'index'])->name('category');
    Route::get('category/create', [CategoryController::class, 'create'])->name('category.create');
    Route::post('category', [CategoryController::class, 'store'])->name('category.store');
    // Route::get('category/{category}', [CategoryController::class, 'show'])->name('category.show');
    Route::get('category{category}/edit', [CategoryController::class, 'edit'])->name('category.edit');
    Route::patch('category/{category}', [CategoryController::class, 'update'])->name('category.update');
    Route::DELETE('category{category}', [CategoryController::class, 'destroy'])->name('category.delete');



    Route::get('slider', [SlidersController::class, 'index'])->name('slider');
    Route::get('slider/create', [SlidersController::class, 'create'])->name('slider.create');
    Route::post('slider', [SlidersController::class, 'store'])->name('slider.store');
    Route::get('slider/{slider}', [SlidersController::class, 'show'])->name('slider.show');
    Route::get('slider/{slider}/edit', [SlidersController::class, 'edit'])->name('slider.edit');
    Route::patch('slider/{slider}', [SlidersController::class, 'update'])->name('slider.update');
    Route::DELETE('slider/{slider}', [SlidersController::class, 'destroy'])->name('slider.delete');


    Route::get('users', [AdminUserController::class, 'index'])->name('users');

    Route::get('inbox', [ContactUsController::class, 'inbox'])->name('inbox');
    Route::get('compose', [ContactUsController::class, 'compose'])->name('compose');
    Route::post('compose', [ContactUsController::class, 'post_compose'])->name('post_compose');
    Route::get('inbox/{id}', [ContactUsController::class, 'show'])->name('view_inbox');
    Route::Patch('inbox/{id}', [ContactUsController::class, 'opened'])->name('opened');
    Route::Delete('inbox/{id}', [ContactUsController::class, 'destroy'])->name('inbox.delete');
});

Route::group(['middleware' => config('fortify.middleware', ['web'])], function () {
    $limiter = config('fortify.limiters.login');
    Route::post('/login', [AuthenticatedSessionController::class, 'store'])
        ->middleware(array_filter([
            'guest:' . config('fortify.guard'),
            $limiter ? 'throttle:' . $limiter : null,
        ]));
});
