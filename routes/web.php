<?php

use App\Http\Controllers\CategorieController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientAuthController;
use App\Http\Controllers\LieuController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\CommentaireController;

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

Route::get('dashboard', [ClientAuthController::class, 'dashboard']); 
Route::get('login', [ClientAuthController::class, 'index'])->name('login');
Route::get('/', [ClientAuthController::class, 'index'])->name('login');
Route::post('client-login', [ClientAuthController::class, 'clientLogin'])->name('login.client'); 
Route::get('registration', [ClientAuthController::class, 'registration'])->name('register-user');
Route::post('client-registration', [ClientAuthController::class, 'clientRegistration'])->name('register.client'); 
Route::get('signout', [ClientAuthController::class, 'signOut'])->name('signout');

Route::resource('lieu', LieuController::class);

Route::group(['middleware' => 'auth'], function() {
    
    Route::resource('categories', CategorieController::class)->except('show');
    
    Route::resource('regions', RegionController::class)->except('show');
    
    Route::post('commentaires', [CommentaireController::class, 'store'])->name('commentaires.store');
    Route::patch('commentaires/{id}', [CommentaireController::class, 'update'])->name('commentaires.update');
    Route::delete('commentaires/{id}', [CommentaireController::class, 'destroy'])->name('commentaires.destroy');

    Route::get('search', [LieuController::class, 'search'])->name('lieu.search');

});

