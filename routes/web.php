<?php

Auth::routes();


Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index')->name('home');


Route::prefix('admins')->group(function (){
    Route::get('/', 'AdminController@index')->name('admin.index');
});

Route::resource('users', 'UsersController');

Route::resource('cashier', 'CashierController');

Route::resource('customer', 'CustomerController'); 
Route::resource('customervehicle', 'CustomerVehicleController');
Route::resource('customerjobdetail', 'CustomerJobDetailController');    
Route::resource('customerpendingpayment', 'CustomerPendingPaymentController');
Route::resource('customerpendingservice', 'CustomerPendingServiceController');

Route::get("dropdown1","CustomerPendingServiceController@upload_info")->name('admin-dropdown1');
Route::get("child-dropdown1","CustomerPendingServiceController@child_info1")->name('child-dropdown1');

Route::resource('completejob', 'CompleteJobController'); 
Route::resource('servicerepair', 'ServiceRepairController'); 
Route::get('service-show', 'ServiceRepairController@usedProductService');

Route::resource('service', 'ServiceController');
Route::resource('servicetype', 'ServiceTypeController');

// Route::prefix('user')->group(function (){
   //  Route::get('/','UsersController@viewAllUser')->name('user.index');
// });

Route::resource('role' , 'RoleController')->middleware('role:manager');
Route::resource('employee', 'EmployeeController')->middleware('role:manager');
Route::resource('salary', 'SalaryController');

Route::resource('bike', 'BikeController');
Route::resource('brand', 'BrandController');
Route::resource('product', 'ProductController');
Route::get("dropdown","ProductController@upload_info")->name('admin-dropdown');
Route::get("child-dropdown","ProductController@child_info")->name('child-dropdown');


Route::resource('stock', 'StockController')->middleware('role:cashier,manager');
Route::resource('damage', 'DamageProductController')->middleware('role:manager');
Route::resource('recondition', 'ReconditionProductController')->middleware('role:manager');

// user profile
Route::get('profile-show/{id}', 'UserProfileController@userprofilepage')->name('profile.show');
Route::put('profile-edit/{id}','UserProfileController@userprofile')->name('user.profile');
Route::put('profile-update/{id}','UserProfileController@userprofileUpdate')->name('user.profile_update');

// quick update status
Route::post('/quickupdate/role/{id}', 'QuickUpdateController@roleQuick')->name('role.quick');
Route::post('/quickupdate/employee/{id}', 'QuickUpdateController@employeeQuick')->name('employee.quick');
Route::post('/quickupdate/product/{id}', 'QuickUpdateController@productQuick')->name('product.quick');
Route::post('/quickupdate/cashier/{id}', 'QuickUpdateController@cashierQuick')->name('cashier.quick');
Route::post('/quickupdate/user/{id}', 'QuickUpdateController@userQuick')->name('user.quick');
Route::post('/quickupdate/damage/{id}', 'QuickUpdateController@damageQuick')->name('damage.quick');
Route::post('/quickupdate/servicerepair/{id}', 'QuickUpdateController@servicerepairQuick')->name('servicerepair.quick');
Route::post('/quickupdate/isborrow/{id}', 'QuickUpdateController@isborrowQuick')->name('isborrow.quick');
Route::post('/quickupdate/iscomplete/{id}', 'QuickUpdateController@iscompleteQuick')->name('iscomplete.quick');
Route::post('/quickupdate/isrepaircomplete/{id}', 'QuickUpdateController@isrepaircompleteQuick')->name('isrepaircomplete.quick');
