<?php

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


Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index')->name('home');

//  Admin
Route::prefix('admins')->group(function (){
    Route::get('/', 'AdminController@index')->name('admin.index');
});


// Route::resource('users', 'UsersController');

Route::resource('cashier', 'CashierController');

Route::resource('role' , 'RoleController');

Route::resource('employee', 'EmployeeController');

Route::resource('brand', 'BrandController');

Route::resource('bike', 'BikeController');

Route::resource('product', 'ProductController');

// quick update status
Route::post('/quickupdate/role/{id}', 'QuickUpdateController@roleQuick')->name('role.quick');
Route::post('/quickupdate/employee/{id}', 'QuickUpdateController@employeeQuick')->name('employee.quick');
Route::post('/quickupdate/product/{id}', 'QuickUpdateController@productQuick')->name('product.quick');
Route::post('/quickupdate/cashier/{id}', 'QuickUpdateController@cashierQuick')->name('cashier.quick');

 // Route::get('aaa', 'Auth\AuthController@showLoginForm');
// Route::post('login', 'Auth\AuthController@login');
// Route::get('logout', 'Auth\AuthController@logout');