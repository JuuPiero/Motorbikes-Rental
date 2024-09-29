<?php

use App\Http\Controllers\Admin\AccountController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\MotorbikeController;
use App\Http\Controllers\Admin\RentalController;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\UserController;
use App\Models\Motorbike;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/motorbike/detail/{id}', [HomeController::class, 'motorbikeDetail'])->name('motorbike.detail');
Route::get('/motorbikes', [HomeController::class, 'motorbikes'])->name('home.motorbikes');
Route::get('/rental/create/{bikeId}', [HomeController::class, 'createRental'])->name('rental.create');

Route::prefix('user')->group(function() {
    Route::get('login', [UserController::class, 'login'])->name('user.login');
    Route::post('checkLogin', [UserController::class, 'checkLogin'])->name('user.check.login');
    Route::get('register', [UserController::class, 'register'])->name('user.register');
    Route::post('postRegister', [UserController::class, 'postRegister'])->name('user.post.register');
    

    Route::prefix('/')->middleware('auth')->group(function() {
        Route::get('logout', [UserController::class, 'logout'])->name('user.logout');

        Route::post('/rental/store', [RentalController::class, 'storeRental'])->name('rental.store');

        // Route::get('account/profile', [UserController::class, 'profile'])->name('user.profile');
        // Route::post('profile/update', [UserController::class, 'updateProfie'])->name('user.profile.update');

        // Route::get('purchase', [UserController::class, 'purchase'])->name('user.purchase');
        // Route::post('create/rating', [UserController::class, 'createRating'])->name('user.create.rating');
    });
});


Route::prefix('admin')->group(function () {
    Route::get('login', [AdminController::class, 'login'])->name('admin.login');
    Route::post('checkLogin', [AdminController::class, 'checkLogin'])->name('admin.check.login');

    Route::prefix('/')->middleware('admin.auth')->group(function() {
        Route::get('', [AdminController::class, 'index'])->name('admin');
        Route::get('logout', [AdminController::class, 'logout'])->name('admin.logout');
        // Route::get('search', [AdminController::class, 'search'])->name('admin.search');
        Route::get('create', [AccountController::class, 'createAdmin'])->name('admin.create');
        Route::post('store', [AccountController::class, 'storeAdmin'])->name('admin.store');
          
        

        Route::get('accounts', [AccountController::class, 'accounts'])->name('admin.account');
        Route::delete('users/delete/{id}', [AccountController::class, 'deleteUser'])->name('admin.user.delete');
        

        Route::prefix('user')->group(function() {
            Route::get('detail/{id}', [AccountController::class, 'userDetail'])->name('admin.user.detail');
            Route::post('update/{id}', [AccountController::class, 'updateAccount'])->name('admin.user.update');
        });

        Route::prefix('motorbikes')->group(function() {
            Route::get('', [MotorbikeController::class, 'index'])->name('admin.motorbike');
            Route::get('create', [MotorbikeController::class, 'create'])->name('admin.motorbike.create');
            Route::post('store', [MotorbikeController::class, 'store'])->name('admin.motorbike.store');

            Route::get('edit/{id}', [MotorbikeController::class, 'edit'])->name('admin.motorbike.edit');
            Route::post('update/{id}', [MotorbikeController::class, 'update'])->name('admin.motorbike.update');

            Route::get('delete/{id}', [MotorbikeController::class, 'delete'])->name('admin.motorbike.delete');
            // Route::delete('delete/{id}', [ProductController::class, 'delete'])->name('admin.product.delete');
        });

        Route::prefix('rentals')->group(function() {
            Route::get('', [RentalController::class, 'index'])->name('admin.rentals');
            // Route::get('create', [CategoryController::class, 'create'])->name('admin.category.create');
            // Route::post('store', [CategoryController::class, 'store'])->name('admin.category.store');
            Route::post('update/{id}', [RentalController::class, 'update'])->name('admin.rental.update');
            Route::get('detail/{id}', action: [RentalController::class, 'detail'])->name('admin.rental.detail');
        //     Route::post('update/{id}', [OrderController::class, 'update'])->name('admin.order.update');

        //     // Route::get('delete/{id}', [CategoryController::class, 'delete'])->name('admin.category.delete');
        //     Route::delete('delete/{id}', [CategoryController::class, 'delete'])->name('admin.category.delete');
        });

        // Route::prefix('orders')->group(function() {
        //     Route::get('', [OrderController::class, 'index'])->name('admin.order');
        // });

        // Route::prefix('invoice')->group(function() {
        //     Route::get('show/{id}', [InvoiceController::class, 'show'])->name('admin.invoice.show');
        //     Route::get('create/{id}', [InvoiceController::class, 'create'])->name('admin.invoice.create');
        // });


    });
});

