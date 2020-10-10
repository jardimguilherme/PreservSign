<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'HomeController@index')->name("home");

Route::get('/profile', 'ProfileController@index')->name("profile");


Route::post('payment/select', 'PaymentController@index')->name('payment.select');
Route::post('charge/select', 'ChargeController@selectCharge')->name('charge.select');
Route::get('charge/create', 'ChargeController@create')->name('charge.create');

Route::get('subscription/charge/signed', 'SubscriptionController@indexSignedCharge')->name('completed_transaction');
Route::get('subscription/card/signed', 'SubscriptionController@indexSignedCard')->name('completed_transaction');

Route::get('logs', 'LogController@index')->name('log.index');


Route::post('/plan/delete', 'PlansController@destroy')->name('plan.destroy');
Route::post('/plan/edit', 'PlansController@edit')->name('plan.edit');
Route::post('/plan/update', 'PlansController@update')->name('plan.update');
Route::resource('plan', 'PlansController', ['except' => ['destroy', 'update', 'edit']]);

Route::post('/credit_card/select', 'Credit_cardController@selectCredit_card')->name('credit_card.select');
Route::post('/credit_card/delete', 'Credit_cardController@destroy')->name('credit_card.destroy');
Route::post('/credit_card/update', 'Credit_cardController@update')->name('credit_card.update');
Route::post('/credit_card/create', 'Credit_cardController@create')->name('credit_card.create');
Route::resource('credit_card', 'Credit_cardController', ['except' => ['destroy', 'update', 'create']]);


Route::get('address/select/{plan}', 'AddressController@selectAddress')->name('address.select');
Route::post('/address/delete', 'AddressController@destroy')->name('address.destroy');
Route::post('/address/edit', 'AddressController@edit')->name('address.edit');
Route::post('/address/update', 'AddressController@update')->name('address.update');
Route::resource('address', 'AddressController', ['except' => ['destroy', 'update', 'edit']]);

Route::post('subscription/charge/update', 'SubscriptionController@updatePaymentCharge')->name('subscription.payment.charge.update');
Route::post('subscription/credit_card/update', 'SubscriptionController@updatePaymentCredit_card')->name('subscription.payment.credit_card.update');
Route::post('subscription/edit/credit_card/add', 'Credit_cardController@indexEditAddCredit_card')->name('subscription.edit.add.credit_card');
Route::post('subscription/address/update', 'SubscriptionController@updateAddress')->name('subscription.address.update');
Route::post('subscription/payment/charge', 'ChargeController@indexCharge')->name('subscription.edit.payment.charge');
Route::post('subscription/payment/credit_card', 'Credit_cardController@indexCredit_card')->name('subscription.edit.payment.credit_card');
Route::post('subscription/edit/address', 'AddressController@editAddress')->name("subscription.edit.address");
Route::post('subscription/edit/plan', 'PlansPageController@editPlan')->name('subscription.edit.plan');
Route::post('subscription/edit/update', 'SubscriptionController@updatePlan')->name('subscription.plan.update');
Route::post('/subscription/delete', 'SubscriptionController@destroy')->name('subscription.destroy');
Route::post('/subscription/edit', 'SubscriptionController@edit')->name('subscription.edit');
Route::post('/subscription/update', 'SubscriptionController@update')->name('subscription.update');
Route::post('subscription/create', 'SubscriptionController@storeCharge')->name('subscription.charge');
Route::resource('subscription', 'SubscriptionController', ['except' => ['destroy', 'update', 'edit', 'create']]);


Route::post('/contact/delete', 'ContactController@destroy')->name('contact.destroy');
Route::resource('contact', 'ContactController', ['except' => ['destroy']]);


Route::get('/profile/password', 'ProfileController@indexPassword')->name("profile.password");

Route::get('/profile/destroy', 'ProfileController@destroy_account')->name("profile.destroy");

Route::post('/profile/email/edit', 'ProfileController@editEmail')->name("profile.email.update");

Route::get('/profile/email', 'ProfileController@indexEmail')->name("profileemail");

Route::post('/profile/edit/update', 'ProfileController@editProfile')->name("profile.edit.update");

Route::get('/profile/edit', 'ProfileController@indexEditProfile')->name("profile.edit");


Route::post('/profile/password/update', 'ProfileController@changePassword')->name("profile.pass.update");

Route::post('/user/update', 'UserController@update')->name('user.update');
Route::resource('user', 'UserController', ['except' => ['update']]);

Auth::routes();


Route::get("/about", function()
{
    return view('home_about');
})->name("about");

Route::get("/user/upgrade", function()
{
    return view('edit_role');
})->name("user.upgrade");

Route::get("/history/log", function()
{
    return view('view_logs');
})->name("log.history");

Route::get("/history/payments", function()
{
    return view('payments_history');
})->name("payment.history");




Route::get('plans/select', 'PlansPageController@indexPlans')->name('plan.select');

Route::resource('plans', 'PlansPageController');
Route::get('plans/{plan}', 'PlansPageController@selectPlan')->name('plans.select');

Route::get('/home', function () {
    session()->forget('back_url');
    session()->forget('back_url_plan');
    session()->forget('error-msg');
    return view('home');
})->name('home');
Route::get('/', function () {
    session()->forget('back_url');
    session()->forget('back_url_plan');
    session()->forget('error-msg');
    return view('home');
})->name('home');

