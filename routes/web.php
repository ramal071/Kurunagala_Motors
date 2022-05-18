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

// Route::resource('admins', 'AdminController');

Route::resource('users', 'UsersController');

Route::resource('cashier', 'CashierController');

Route::resource('brand', 'BrandController');

Route::resource('role' , 'RoleController');
Route::resource('employee', 'EmployeeController');
Route::resource('bike', 'BikeController');

Route::resource('product', 'ProductController');
Route::get("dropdown","ProductController@upload_info")->name('admin-dropdown');
Route::get("child-dropdown","ProductController@child_info")->name('child-dropdown');


Route::resource('stock', 'StockController');

// Route::resource('role' , 'RoleController')->middleware('can:isManager');
// Route::resource('employee', 'EmployeeController')->middleware('can:isManager');
// Route::resource('bike', 'BikeController')->middleware('role:cashier,manager');
// Route::resource('product', 'ProductController')->middleware('can:isManager');

// quick update status
Route::post('/quickupdate/role/{id}', 'QuickUpdateController@roleQuick')->name('role.quick');
Route::post('/quickupdate/employee/{id}', 'QuickUpdateController@employeeQuick')->name('employee.quick');
Route::post('/quickupdate/product/{id}', 'QuickUpdateController@productQuick')->name('product.quick');
Route::post('/quickupdate/cashier/{id}', 'QuickUpdateController@cashierQuick')->name('cashier.quick');
Route::post('/quickupdate/user/{id}', 'QuickUpdateController@userQuick')->name('user.quick');

 // Route::get('aaa', 'Auth\AuthController@showLoginForm');
// Route::post('login', 'Auth\AuthController@login');
// Route::get('logout', 'Auth\AuthController@logout');