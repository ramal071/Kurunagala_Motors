<?php

Auth::routes();


Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@barchart')->name('barchart');
Route::post('/home','HomeController@sendMessage')->name('home');


Route::prefix('admins')->group(function (){
    Route::get('/', 'AdminController@index')->name('admin.index');   
});
//Route::get('admins', 'AdminController@userChart')->middleware('role:isManager');  except

Route::resource('users', 'UsersController');
Route::get("dropdown3","UsersController@upload_info")->name('admin-dropdown3');
Route::get("child-dropdown3","UsersController@child_info")->name('child-dropdown3');

Route::resource('cashier', 'CashierController');

Route::resource('customer', 'CustomerController'); 
Route::resource('customervehicle', 'CustomerVehicleController');

Route::get('customerVehicle-show/{id}', 'CustomerController@customerVehiclePage')->name('customer.vehicle.show');
Route::get('customerPending-service/{id}', 'CustomerController@PendingService')->name('customer.pending.serviice');
Route::get('customerPending-payment/{id}', 'CustomerController@CustomerPendingPayment')->name('customer.pending.payment');
Route::get('customerService-repair/{id}', 'CustomerController@ServiceRepair')->name('customer.service.repair');
Route::get('customerService-stoct/{id}', 'CustomerController@ServiceRepairStock')->name('customer.service.stock');
Route::get('completeJob/{id}', 'CustomerController@completeJob')->name('customer.service.done');
Route::get('customerbike', 'CustomerController@Bike')->name('customer.bike');
Route::get('customerbrand', 'CustomerController@Brand')->name('customer.brand');
Route::get('customerproduct', 'CustomerController@Product')->name('customer.product');


Route::resource('customerjobdetail', 'CustomerJobDetailController');    
Route::resource('customerpendingpayment', 'CustomerPendingPaymentController');
Route::resource('customerpendingservice', 'CustomerPendingServiceController');

Route::get("dropdown1","CustomerPendingServiceController@upload_info")->name('admin-dropdown1');
Route::get("child-dropdown1","CustomerPendingServiceController@child_info1")->name('child-dropdown1');

Route::resource('completejob', 'CompleteJobController');     
Route::resource('servicerepair', 'ServiceRepairController');


Route::resource('calendar', 'CalendarController');
 
Route::get('service-show', 'ServiceRepairController@usedProductService');
Route::resource('service', 'ServiceController');
Route::get("dropdown2","ServiceRepairController@upload_info")->name('admin-dropdown2');
Route::get("child-dropdown2","ServiceRepairController@child_info")->name('child-dropdown2');
Route::resource('service_servicerepair', 'ServiceServiceRepairController');
Route::resource('service_servicerepair', 'ServiceServiceRepairController');
Route::resource('stock_servicerepair', 'StockServiceRepairController');

Route::resource('income', 'IncomeController')->middleware('can:isManager');
Route::get("income-dropdown","IncomeController@upload_info")->name('income-dropdown');
Route::get("incomechild-dropdown","IncomeController@child_info")->name('incomechild-dropdown');
Route::get("job-per-date","IncomeController@getJobsperDate")->name('job.date');
Route::get("createMonth","IncomeController@createMonth")->name('income.createMonth');


Route::resource('role' , 'RoleController')->middleware('can:isManager');
Route::resource('employee', 'EmployeeController')->middleware('can:isManager');
Route::resource('salary', 'SalaryController')->middleware('can:isManager');
Route::resource('employee_serviceRepair', 'EmployeeServiceRepairController')->middleware('can:isManager');
Route::resource('attendance', 'AttendanceController')->middleware('can:isManager');
Route::resource('loan', 'LoanController')->middleware('can:isManager');
Route::resource('allowance', 'AllowanceController')->middleware('can:isManager');
Route::resource('leave', 'LeaveController')->middleware('can:isManager');
Route::get("salary-dropdown","SalaryController@upload_info")->name('salary-dropdown');
Route::get("salarychild-dropdown","SalaryController@child_info")->name('salarychild-dropdown');


Route::resource('bike', 'BikeController')->middleware('can:isManager');
Route::resource('brand', 'BrandController')->middleware('can:isManager');
Route::resource('product', 'ProductController')->middleware('can:isManager');
Route::get("dropdown","ProductController@upload_info")->name('admin-dropdown');
Route::get("child-dropdown","ProductController@child_info")->name('child-dropdown');

Route::get('/detail/{id}', 'ProductController@detail');

Route::resource('stock', 'StockController');
Route::resource('damage', 'DamageProductController');
Route::resource('recondition', 'ReconditionProductController');
Route::resource('gnr', 'GnrController')->middleware('can:isManager');
Route::resource('limit', 'LimitController');

// user profile     
Route::resource('profile', 'UserProfileController');
Route::get('profile-show/{id}', 'UserProfileController@userprofilepage')->name('profile.show');
Route::put('profile-update','UserProfileController@userprofileUpdate')->name('user.profile_update');

Route::get('password-update/{id}','UserProfileController@userpasswordpage')->name('password.update');
Route::post('password-update','UserProfileController@userpasswordUpdate')->name('user.password_update');

//contact
Route::get('contactus','ContactUsController@contactView')->name('contact.view');
Route::post('/contact','ContactUsController@sendMessage')->name('contact.send');
Route::get('contact','ContactController@index')->name('contact.index');
Route::get('contact/{id}','ContactController@show')->name('contact.show');
Route::delete('contact/{id}','ContactController@destroy')->name('contact.destroy');

// working hours
Route::resource('workinghour', 'WorkinghourController');  


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
Route::post('/quickupdate/isremind/{id}', 'QuickUpdateController@isremindQuick')->name('isremind.quick'); 
Route::post('/quickupdate/nextservice/{id}', 'QuickUpdateController@nextserviceQuick')->name('nextservice.quick'); 