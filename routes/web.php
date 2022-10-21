<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\frontend\Homecontroller;
use App\Http\Controllers\admin\Homemanager;
use Illuminate\Support\Facades\Auth;

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
//     return view('frontend.frontend_master');
// });


Route::controller(Homecontroller::class)->group(function () {
    Route::get('/', 'home')->name('home');
});


Route::group(['middleware' => 'prevent-back-history'], function () {
    Route::get('/dashboard', function () {
        return view('admin.index');
    })->middleware(['auth', 'verified'])->name('dashboard');

    Route::group(['middleware' => 'auth'], function () {
        Route::controller(AdminController::class)->group(function () {
            Route::get('/admin/logout', 'destroy')->name('admin.logout');
            Route::get('admin/profile', 'Profile')->name('admin.profile');
            Route::get('edit/profile', 'EditProfile')->name('edit.profile');
            Route::post('profile/save', 'saveProfile')->name('store.profile');
            Route::get('admin/changepassword', 'changePassword')->name('change.password');
            Route::post('changepassword/save', 'savePassword')->name('changepassword.save');
        });
        Route::controller(Homemanager::class)->group(function () {
            Route::get('homeslider/edit', 'viewHomeSection')->name('home.section');
            Route::get('about/edit', 'viewAboutSection')->name('about.section');
            Route::post('homeslider/save', 'saveHomeSlider')->name('homeslider.save');//homeslider.save
        });
    });
});


require __DIR__ . '/auth.php';
