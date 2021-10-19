<?php

use App\Http\Controllers\CategorieController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientAuthController;
use App\Http\Controllers\LieuController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\CommentaireController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FavoriController;

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

    Route::resource('user', UserController::class)->except('create, store');
    Route::patch('/user/{id}/updatePassword', [UserController::class, 'update_password'])->name('user.updatePassword');

    Route::resource('commentaires', CommentaireController::class);
    
    Route::get('search', [LieuController::class, 'search'])->name('lieu.search');

    Route::get('admin', [AdminController::class, 'index'])->name('admin.index');
    Route::get('admin/lieux', [AdminController::class, 'getLieux'])->name('admin.lieux');
    Route::get('admin/commentaires', [AdminController::class, 'getCommentaires'])->name('admin.commentaires');

    Route::resource('favoris', FavoriController::class)->except('show, update, edit, create');

});

