<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;

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
Auth::routes();
Route::get('/',[FrontendController::class, 'index'])->name('home');



Route::group( ['prefix'=>'dashboard','middleware'=>['auth'], 'namespace' => 'App\Http\Controllers\Admin' ],function(){
    Route::get('/', 'AdminController@index')->name('dashboard_index');
    Route::get('/admin','AdminController@admin_index')->name('admin_index');
    Route::get('/outlet-activity','AdminController@outlet_activity')->name('admin_outlet_activity');

    Route::group( ['prefix'=>'/user'],function(){
        Route::get('/','UserController@get')->name('admin_user_get');
        Route::post('/create','UserController@store')->name('admin_user_store');
        Route::post('/update','UserController@update')->name('admin_user_update');
        Route::get('/delete/{id}','UserController@delete')->name('admin_user_delete');
    });

    Route::group( ['prefix'=>'/user-role'],function(){
        Route::get('/','UserRoleController@get')->name('admin_user_role_get');
        Route::post('/create','UserRoleController@store')->name('admin_user_role_store');
        Route::post('/update','UserRoleController@update')->name('admin_user_role_update');
        Route::get('/delete/{id}','UserRoleController@delete')->name('admin_user_role_delete');
    });
    Route::group( ['prefix'=>'/role-permission'],function(){
        Route::get('/','RolePrermissionController@get')->name('admin_role_permission_get');
        Route::post('/update_page','RolePrermissionController@update_page')->name('admin_role_permission_update_page');
        Route::post('/update','RolePrermissionController@update')->name('admin_role_permission_update');
        Route::get('/delete/{id}','RolePrermissionController@delete')->name('admin_role_permission_delete');
    });

    Route::group( ['prefix'=>'/outlet'],function(){
        Route::get('/','OutletController@get')->name('admin_outlet_get');
        Route::post('/create','OutletController@store')->name('admin_outlet_store');
        Route::post('/update','OutletController@update')->name('admin_outlet_update');
        Route::get('/delete/{id}','OutletController@delete')->name('admin_outlet_delete');
    });

});