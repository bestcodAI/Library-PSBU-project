<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FacebookController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BorrowerController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\ShopSettingController;
use App\Http\Controllers\CategoryLanguageController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\AttandentController;
use App\Http\Controllers\LocalizationController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\DashboardController;
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

Route::get('/testing', function(){
 return 'testing';
});



Route::get('/google/redirect', [App\Http\Controllers\GoogleLoginController::class, 'redirectToGoogle'])->name('google.redirect');
Route::get('/google/callback', [App\Http\Controllers\GoogleLoginController::class, 'handleGoogleCallback'])->name('google.callback');

Route::controller(FacebookController::class)->group(function(){
    Route::get('auth/facebook', 'redirectToFacebook')->name('auth.facebook');
    Route::get('auth/facebook/callback', 'handleFacebookCallback');
});

Route::middleware('auth')->group(function () {

    Route::prefix(prefix_url().'/admin')->group(function () {
        Route::get('/', [DashboardController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

        Route::get('/localization/{locale}',[LocalizationController::class , 'index']);
        
        //reports
        Route::prefix('/reports')->group(function() {
            Route::get('/books', [ReportController::class,'books']);
            Route::get('/users', [ReportController::class,'users']);
            Route::get('/borrowers', [ReportController::class,'borrowers']);
            Route::get('/categories', [ReportController::class,'categories']);
            Route::get('/category_languages', [ReportController::class,'category_languages']);
        });

        // sales
        Route::prefix('/sales')->group(function() {
            Route::resource('/', SaleController::class);
        });

        // purchases
        Route::prefix('/purchases')->group(function(){
            Route::resource('/', PurcheseController::class);
        });

        // products
        Route::prefix('/products')->group(function() {
            Route::resource('/', ProductController::class);
        });

        // books
        Route::prefix('/group_book')->group(function() {
            Route::resource('/books', BookController::class);
            Route::get('/print_barcodes', [BookController::class, 'print_barcodes']);
            Route::post('/print_barcodes', [BookController::class, 'print_barcodes']);
            Route::get('/import', [BookController::class, 'import']);
            Route::get('/import', [BookController::class, 'import']);
            Route::get('/filters/{val}', [BookController::class, 'filters']);
        });

        // borrower book
        // Route::prefix('/brorrowers')->group(function() {

        // });

        Route::resource('/borrowers', BorrowerController::class);
        Route::get('/borrowers/get_data/{term}',[BorrowerController::class,'get_data']);

        Route::prefix('/attendances')->group(function() {
            Route::resource('/', AttandentController::class);
        });
        Route::prefix('/shop_settings')->group(function () {
            Route::resource('/', ShopSettingController::class);
        });

        // people
        Route::prefix('/peoples')->group(function () {
            Route::resource('/users', UserController::class);
            Route::resource('/students', StudentsController::class);
            // student import and export
            // Route::get('/file-import',[StudentsController::class,'importView'])->name('import-view'); 
            // Route::post('/import',[UserController::class,'import'])->name('import');
            // Route::get('/export-users',[UserController::class,'exportUsers'])->name('export-users');
        });

        // shop settings
        Route::prefix('/shop_settings')->group(function () {
            Route::resource('/', ShopSettingController::class);
        });

        // settings
        Route::prefix('/settings')->group(function () {
            Route::get('/', [SettingsController::class, 'index']);
            Route::post('/', [SettingsController::class, 'store'])->name('settings.store');
            Route::resource('/categories', CategoryController::class);
            Route::resource('/brands', BrandController::class);
            Route::resource('/category_langauges', CategoryLanguageController::class);
        });
         
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::post('/profile/update_avatar', [ProfileController::class, 'update_avatar'])->name('profile.avatar');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
        
    });
    
});

require __DIR__.'/auth.php';
