<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\AuthController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\TourController;
use App\Http\Controllers\Backend\TourDepartureController;
use App\Http\Controllers\Backend\BookingController;
use App\Http\Controllers\Backend\MenuController;
use App\Http\Controllers\Fontend\AccountController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Fontend\HomeController;
use App\Http\Middleware\AuthenticateMiddleware;
use App\Http\Middleware\LoginMiddleware;


Route::get('/',
    [HomeController::class, 'index']
    )->name('home');




Route::get('services', function () {
    return view('fontend.services');
})->name('services');

Route::get('about', function () {
    return view('fontend.about');
})->name('about');

Route::get('contact', function () {
    return view('fontend.contact');
})->name('contact');

Route::get('blog', function () {
    return view('fontend.blog');
})->name('blog');



Route::get('resulteSearch',
    [HomeController::class, 'search']
    )->name('search');



Route::group(['prefix'=>'tour'], function(){
    Route::get('index',
    'App\Http\Controllers\Fontend\TourController@index'
    )->name('tour.index');

    Route::get('detail/{url}',
    'App\Http\Controllers\Fontend\TourController@detail'
    )->name('tour.detail');  

    Route::post('booking',
    [BookingController::class, 'create']
    )->name('tour.booking'); 

});

Route::group(['prefix'=>'account'], function(){
    Route::get('login', 
    [AccountController::class, 'showLoginForm']
    )->name('account.loginForm');

    Route::get('register', 
    [AccountController::class, 'showRegisterForm']
    )->name('account.registerForm');

    Route::post('register', 
    [AccountController::class, 'register']
    )->name('account.register');

    Route::post('login', 
    [AccountController::class, 'login']
    )->name('account.login');

    Route::get('logout', 
    [AccountController::class, 'logout']
    )->name('account.logout');

    Route::get('profile', function () {
        return view('fontend.user.profile');
    })->name('profile');

    Route::post('update2/{id}', 
        [UserController::class, 'update']
        )->name('user.update2');
});


Route::group(['prefix' =>'backend'],function(){
    Route::get('dashboard/index', 
    [DashboardController::class, 'index']
    )->name('dashboard.index')->middleware('admin');

    Route::group(['prefix'=>'auth'], function(){
        Route::get('admin', 
        [AuthController::class, 'index']
        )->name('auth.admin')->middleware('login');

        Route::get('logout', 
        [AuthController::class, 'logout']
        )->name('auth.logout');

        Route::post('login', 
        [AuthController::class, 'login']
        )->name('auth.login');

        Route::get('login', 
        [AuthController::class, 'login']
        )->name('login');
    });

    Route::group(['prefix'=>'user'], function(){
        Route::get('index', 
        [UserController::class, 'index']
        )->name('user.index')->middleware('admin');

        Route::get('create', 
        [UserController::class, 'formCreate']
        )->name('user.formCreate')->middleware('admin');

        Route::post('create', 
        [UserController::class, 'create']
        )->name('user.create')->middleware('admin');

        Route::get('edit/{id}', 
        [UserController::class, 'edit']
        )->name('user.edit')->middleware('admin');

        Route::post('update/{id}', 
        [UserController::class, 'update']
        )->name('user.update')->middleware('admin');

        Route::get('delete/{id}', 
        [UserController::class, 'delete']
        )->name('user.delete')->middleware('admin');
        
    });

    Route::group(['prefix'=>'tour'], function(){
        Route::get('getTour', 
        [TourController::class, 'getTour']
        )->name('tour.getTour')->middleware('admin');

        Route::get('create', 
        [TourController::class, 'formCreate']
        )->name('tour.formCreate')->middleware('admin');

        Route::post('create', 
        [TourController::class, 'create']
        )->name('tour.create')->middleware('admin');

        Route::get('edit/{id}', 
        [TourController::class, 'edit']
        )->name('tour.edit')->middleware('admin');

        Route::post('update/{id}', 
        [TourController::class, 'update']
        )->name('tour.update')->middleware('admin');

        Route::get('delete/{id}', 
        [TourController::class, 'delete']
        )->name('tour.delete')->middleware('admin');
        
    });

    Route::group(['prefix'=>'tourdeparture'], function(){
        Route::get('getTourDeparture', 
        [TourDepartureController::class, 'getTourDeparture']
        )->name('tourdeparture.getTourDeparture')->middleware('admin');

        Route::get('create', 
        [TourDepartureController::class, 'formCreate']
        )->name('tourdeparture.formCreate')->middleware('admin');

        Route::post('create', 
        [TourDepartureController::class, 'create']
        )->name('tourdeparture.create')->middleware('admin');

        Route::get('edit/{id}', 
        [TourDepartureController::class, 'edit']
        )->name('tourdeparture.edit')->middleware('admin');

        Route::post('update/{id}', 
        [TourDepartureController::class, 'update']
        )->name('tourdeparture.update')->middleware('admin');

        Route::get('delete/{id}', 
        [TourDepartureController::class, 'delete']
        )->name('tourdeparture.delete')->middleware('admin');
  
    });

    Route::group(['prefix'=>'booking'], function(){
        Route::get('getBooking', 
        [BookingController::class, 'getBooking']
        )->name('booking.getBooking')->middleware('admin');

        Route::get('edit/{id}',
         [BookingController::class, 'edit']
        )->name('booking.edit')->middleware('admin');

        Route::post('update/{id}', 
        [BookingController::class, 'update']
        )->name('booking.update')->middleware('admin');

        Route::get('delete/{id}',
         [BookingController::class, 'delete']
        )->name('booking.delete')->middleware('admin');
        
    });

    Route::group(['prefix'=>'menu'], function(){
        Route::get('getMenu', 
        [MenuController::class, 'getMenu']
        )->name('menu.getMenu')->middleware('admin');

        Route::get('create',
         [MenuController::class, 'createForm']
        )->name('menu.formCreate')->middleware('admin');

        Route::post('create', 
        [MenuController::class, 'create']
        )->name('menu.create')->middleware('admin');

        Route::get('edit/{id}',
         [MenuController::class, 'edit']
        )->name('menu.edit')->middleware('admin');

        Route::post('update/{id}', 
        [MenuController::class, 'update']
        )->name('menu.update')->middleware('admin');

        Route::get('delete/{id}', 
        [MenuController::class, 'delete']
        )->name('menu.delete')->middleware('admin');
        
    });
});