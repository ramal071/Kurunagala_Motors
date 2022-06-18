<?php

Auth::routes();


Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index')->name('home');


Route::prefix('admins')->group(function (){
    Route::get('/', 'AdminController@index')->name('admin.index');
});

Route::resource('users', 'UsersController')->middleware('role:cashier,manager');;

Route::resource('cashier', 'CashierController');

Route::resource('customer', 'CustomerController'); 
Route::resource('customervehicle', 'CustomerVehicleController');
// Route::get('customervehicle/{id}', 'CustomerVehicleController');

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
Route::resource('salary', 'SalaryController')->middleware('role:cashier,manager');;
//  Route::get('/employee/employeeservice', 'EmployeeController@employeeservice')->name('employeeservice');
Route::resource('employee_serviceRepair', 'EmployeeServiceRepairController');


Route::resource('bike', 'BikeController');
Route::resource('brand', 'BrandController');
//Route::post('/brand/fetch', 'BrandController@fetch')->name('brand.fetch');
Route::resource('product', 'ProductController');
Route::get("dropdown","ProductController@upload_info")->name('admin-dropdown');
Route::get("child-dropdown","ProductController@child_info")->name('child-dropdown');

Route::get('/detail/{id}', 'ProductController@detail');

Route::resource('stock', 'StockController')->middleware('role:cashier,manager');
Route::resource('damage', 'DamageProductController')->middleware('role:manager');
Route::resource('recondition', 'ReconditionProductController')->middleware('role:manager');

// user profile
Route::get('profile-show/{id}', 'UserProfileController@userprofilepage')->name('profile.show');
Route::put('profile-edit/{id}','UserProfileController@userprofile')->name('user.profile');
Route::put('profile-update/{id}','UserProfileController@userprofileUpdate')->name('user.profile_update');

//contact
Route::get('contactus','ContactUsController@contactView')->name('contact.view');
Route::post('/contact','ContactUsController@sendMessage')->name('contact.send');

Route::get('contact','ContactController@index')->name('contact.index');
Route::get('contact/{id}','ContactController@show')->name('contact.show');
Route::delete('contact/{id}','ContactController@destroy')->name('contact.destroy');


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
