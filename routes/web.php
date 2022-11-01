<?php

use App\Http\Controllers\admin\Aboutmanager;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\frontend\Homecontroller;
use App\Http\Controllers\admin\Homemanager;
use App\Http\Controllers\admin\PortfolioManagementController;
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

            Route::post('homeslider/save', 'saveHomeSlider')->name('homeslider.save'); //homeslider.save
        });

        Route::controller(Aboutmanager::class)->group(function () {
            Route::get('aboutus/view', 'aboutUsHome')->name('about.section');
            Route::post('aboutus/edit', 'saveAboutUs')->name('about.save');
        });

        Route::controller(PortfolioManagementController::class)->group(function () {
            Route::get('portfolio/view','portfolioHome')->name('portfolio.section');
            Route::get('portfolio/edit/{id}','portfolioEditView')->name('portfolio.edit');
            Route::get('portfolio/remove','portfolioRemvoe')->name('portfolio.remove');
            Route::get('portfolio/add','portfolioAddView')->name('portfolio.add');
            Route::post('portfolio/save','portfolioSave')->name('portfolio.save');
            Route::post('portfolio/update','portfolioUpdate')->name('portfolio.update');
        });
    });
});


require __DIR__ . '/auth.php';
