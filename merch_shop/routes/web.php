<?php

use App\Http\Controllers\Web\ProductWebController;
use App\Http\Controllers\Web\OAuthController;
use App\Http\Controllers\Web\AuthWebController;
use App\Http\Controllers\Web\ProfileController;
use App\Http\Controllers\Web\NewsWebController;
use App\Http\Controllers\Web\PageWebController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\AppealWebController;
use App\Http\Controllers\Web\CategoriesWebController;

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

Route::get('/categories/{slug?}', [CategoriesWebController::class, 'index'])
    ->name('categories');

Route::get('/catalog/product/{slug}', [ProductWebController::class, 'index'])
    ->name('product');



Route::get('/appeal', [AppealWebController::class, 'form'])
    ->name('appeal.form');

Route::post('/appeal', [AppealWebController::class, 'send'])
    ->name('appeal.send');

Route::get('/page', [PageWebController::class, 'index']);
Route::get('/page/{slug}', [PageWebController::class, 'show']);

Route::get('/news', [NewsWebController::class, 'index']);
Route::get('/news/{slug}', [NewsWebController::class, 'show']);

Route::get('/profile', [ProfileController::class, 'show'])
    ->name('profile')
    ->middleware('auth');


Route::get('/login', [AuthWebController::class, 'loginForm'])
    ->name('login');

Route::post('/login', [AuthWebController::class, 'login'])
    ->name('login.post');

Route::post('/logout', [AuthWebController::class, 'logout'])
    ->name('logout');

Route::get('/register', [AuthWebController::class, 'registerForm'])
    ->name('register');

Route::post('/register', [AuthWebController::class, 'register'])
    ->name('register.post');

Route::prefix('/oauth')->group(function () {
    Route::get('/{provider}/redirect', [OAuthController::class, 'redirectToService'])->name('oauth.redirect');
    Route::get('/{provider}/login', [OAuthController::class, 'login'])->name('oauth.login');
});
