<?php

use Illuminate\Support\Facades\Route;


/** user-start */
    Route::namespace('User')->group(function () {
        Route::get('/', 'UserController@index')->name('user');
    });    
/** user-start */

/** admin-start */

    Route::namespace('Admin')->prefix('admin')->group(function () {
        Route::get('login', 'AuthController@login')->name('admin.login');
        Route::post('signin', 'AuthController@signin')->name('admin.signin');
        Route::get('forget', 'AuthController@forget')->name('admin.forget');
        Route::post('reset', 'AuthController@reset')->name('admin.reset');

        Route::get('logout', 'AuthController@logout')->name('admin.logout');
        
        Route::group(['middleware' => 'auth'], function(){
            Route::get('/', 'DashboardController@index')->name('admin');

            /** setting */
                Route::get('/setting', 'SettingController@index')->name('admin.setting');
                Route::post('/setting-update', 'SettingController@setting_update')->name('admin.setting.update');
                Route::post('/setting-logo-update', 'SettingController@setting_logo_update')->name('admin.setting.logo.update');
            /** setting */

            /** profile */
                Route::get('/profile', 'DashboardController@profile')->name('admin.profile');
                Route::get('/change-password', 'DashboardController@change_password')->name('admin.change.password');
            /** profile */
        });
    });
/** admin-end */