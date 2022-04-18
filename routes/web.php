<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DatatransController;
use App\Http\Controllers\DatatransCategoryController;
use App\Http\Controllers\DatatransServiceController;
use App\Http\Controllers\DatatransLoginController;
use App\Http\Controllers\DatatransOrderController;
use App\Http\Controllers\DatatransMerchantController;
use App\Http\Controllers\DatatransUserController;
use App\Htt\Controllers\DatatransOnlineorder;
use App\Http\Controllers\DatatransLanguageController;
use App\Http\Controllers\DatatransMailcontentController;
use App\Http\Controllers\GoogleCalendarController;
use App\Http\Controllers\DatatransSettingController;
use App\Http\Controllers\DatatransLocationController;
use App\Http\Controllers\DatatransEmployeeController;
use App\Http\Controllers\ForgotPasswordController;
use Illuminate\Support\Facades\Artisan;

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

Route::get('/', function () {
    return view('welcome');
});
// Route::middleware('web')->group(function () {

    Route::get('datatrans-service/{id}', [DatatransController::class, 'index'])->name('datatrans.index');
    Route::post('datatrans-service-create', [DatatransController::class, 'create'])->name('datatrans.create');
    Route::post('datatrans-service-transaction', [DatatransController::class, 'transactionget'])->name('datatrans.transaction.get');
    Route::get('datatrans-service-pay', [DatatransController::class, 'pay'])->name('datatrans.pay');
	Route::get('datatrans-service-error', [DatatransController::class, 'error'])->name('datatrans.error');
	Route::get('datatrans-service-cancel', [DatatransController::class, 'cancel'])->name('datatrans.cancel');
	Route::post('getservice', [DatatransController::class, 'getservice'])->name('datatrans.getservice');
    
    Route::get('lang/{locale}', [DatatransLanguageController::class, 'swap']);

    Route::middleware('auth')->group(function () {
        Route::get('datatrans-category', [DatatransCategoryController::class, 'index'])->name('datatrans.category.index');
        Route::post('datatrans-category', [DatatransCategoryController::class, 'create'])->name('datatrans.category.create');
        Route::post('datatrans-category-update/{id}', [DatatransCategoryController::class, 'update'])->name('datatrans.category.update');
        Route::get('datatrans-category-delete/{id}', [DatatransCategoryController::class, 'delete'])->name('datatrans.category.delete');

        Route::get('datatrans-service-list', [DatatransServiceController::class, 'index'])->name('datatrans.service.index');	
        Route::post('datatrans-service-list', [DatatransServiceController::class, 'create'])->name('datatrans.service.create');
        Route::post('datatrans-service-update/{id}', [DatatransServiceController::class, 'update'])->name('datatrans.service.update');
        Route::get('datatrans-service-delete/{id}', [DatatransServiceController::class, 'delete'])->name('datatrans.service.delete');

        Route::get('datatrans-service-list/{id}', [DatatransServiceController::class, 'createpage'])->name('datatrans.service.createpage');





        Route::get('datatrans-order', [DatatransOrderController::class, 'index'])->name('datatrans.order.index');
        Route::post('datatrans-order', [DatatransOrderController::class, 'create'])->name('datatrans.order.create');
        Route::post('datatrans-order-update/{id}', [DatatransOrderController::class, 'update'])->name('datatrans.order.update');
        Route::get('datatrans-order-delete/{id}', [DatatransOrderController::class, 'delete'])->name('datatrans.order.delete');

        Route::get('datatrans-inlineorder', [DatatransOnlineorder::class, 'index'])->name('datatrans.inlineorder.index');

        Route::post('datatrans-inlineorder-update/{id}', [DatatransOnlineorder::class, 'update'])->name('datatrans.inlineorder.update');
        Route::get('datatrans-inlineorder-delete/{id}', [DatatransOnlineorder::class, 'delete'])->name('datatrans.inlineorder.delete');

        Route::get('datatrans-merchant', [DatatransMerchantController::class, 'index'])->name('datatrans.merchant.index');
        Route::post('datatrans-merchant', [DatatransMerchantController::class, 'create'])->name('datatrans.merchant.create');
        Route::post('datatrans-merchant-update/{id}', [DatatransMerchantController::class, 'update'])->name('datatrans.merchant.update');
        Route::get('datatrans-merchant-delete/{id}', [DatatransMerchantController::class, 'delete'])->name('datatrans.merchant.delete');

        Route::get('datatrans-mailcontent', [DatatransMailcontentController::class, 'index'])->name('datatrans.mailcontent.index');
        Route::post('datatrans-ordermailcontent-update/{id}', [DatatransMailcontentController::class, 'orderupdate'])->name('datatrans.ordermailcontent.orderupdate');

        Route::post('datatrans-confirmmailcontent-update/{id}', [DatatransMailcontentController::class, 'confirmupdate'])->name('datatrans.confirmmailcontent.orderupdate');

        Route::post('datatrans-declinedmailcontent-update/{id}', [DatatransMailcontentController::class, 'declinedupdate'])->name('datatrans.declinedmailcontent.orderupdate');


        Route::get('datatrans-user', [DatatransUserController::class, 'index'])->name('datatrans.user.index');
        Route::post('datatrans-user', [DatatransUserController::class, 'create'])->name('datatrans.user.create');
        Route::post('datatrans-user-update/{id}', [DatatransUserController::class, 'update'])->name('datatrans.user.update');
        Route::get('datatrans-user-delete/{id}', [DatatransUserController::class, 'delete'])->name('datatrans.user.delete');
		
		Route::get('datatrans-setting', [DatatransSettingController::class, 'index'])->name('datatrans.setting.index');
        Route::post('datatrans-setting-update/{id}', [DatatransSettingController::class, 'update'])->name('datatrans.setting.update');

        Route::get('home', [DatatransOrderController::class, 'index'])->name('home');

        Route::get('/google-calendar/connect', [GoogleCalendarController::class, 'getClient'])->name('calendar.index');
        Route::post('/google-calendar/connect', [GoogleCalendarController::class, 'store'])->name('calendar.store');
        Route::get('/getevents', [GoogleCalendarController::class, 'getevents'])->name('calendar.getevents');
		Route::post('/google-calendar/setcalenadr', [GoogleCalendarController::class, 'setcalendar'])->name('calendar.setcalendar');
		
		Route::get('datatrans-location', [DatatransLocationController::class, 'index'])->name('datatrans.location.index');
        Route::post('datatrans-location', [DatatransLocationController::class, 'create'])->name('datatrans.location.create');
        Route::post('datatrans-location-update/{id}', [DatatransLocationController::class, 'update'])->name('datatrans.location.update');
        Route::get('datatrans-location-delete/{id}', [DatatransLocationController::class, 'delete'])->name('datatrans.location.delete');      

        Route::get('datatrans-employee', [DatatransEmployeeController::class, 'index'])->name('datatrans.employee.index');
        Route::post('datatrans-employee', [DatatransEmployeeController::class, 'create'])->name('datatrans.employee.create');
        Route::post('datatrans-employee-update/{id}', [DatatransEmployeeController::class, 'update'])->name('datatrans.employee.update');
        Route::get('datatrans-employee-delete/{id}', [DatatransEmployeeController::class, 'delete'])->name('datatrans.employee.delete');
        
        
    });

    Route::get('login', [DatatransLoginController::class, 'index'])->name('login');
    Route::post('custom-login', [DatatransLoginController::class, 'customLogin'])->name('login.custom'); 
    Route::get('registration', [DatatransLoginController::class, 'registration'])->name('register-user');
    Route::post('custom-registration', [DatatransLoginController::class, 'customRegistration'])->name('register.custom'); 
    Route::get('signout', [DatatransLoginController::class, 'signOut'])->name('signout');
	
	Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
    Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post'); 
    Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
    Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');

    Route::get('/google-calendar/connect', [GoogleCalendarController::class, 'connect'])->name('calendar.index');
    Route::post('/google-calendar/connect', [GoogleCalendarController::class, 'store'])->name('calendar.store');
    Route::get('/get-resource', [GoogleCalendarController::class, 'getResources'])->name('calendar.getResources');

    //clear cache

    Route::get('/config-clear', function() {
        $exitCode = Artisan::call('config:clear');
        return 'Config cache cleared';
    });

    Route::get('/route-clear', function() {
        $exitCode = Artisan::call('route:clear');
        return 'Config cache cleared';
    });


    Route::get('/cache-clear', function() {
        $exitCode = Artisan::call('cache:clear');
        return 'Application cache cleared';
    });

    Route::get('/view-clear', function() {
        $exitCode = Artisan::call('view:clear');
        return 'View cache cleared';
    });
// });