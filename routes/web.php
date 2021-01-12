<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

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

Route::group(['namespace' => 'Frontend'], function () {

    Route::get('/', 'HomeController@index')->name('home');
    Route::get('celebrities/', 'CelebritiesController@index')->name('celebrity.list');
    Route::get('celebrity/{username}', 'CelebritiesController@celebrity')->name('celebrity.single');
    Route::get('categories/', 'CategoriesController@index')->name('categories.list');



    Route::group(['prefix' => 'chat','namespace'=>'Chat'], function () {

        Route::get('/', 'ChatController@index')->name('chat.index');
        Route::post('/message/send', 'ChatController@sendMessage')->name('chat.send.message');
        Route::post('/message/get', 'ChatController@getMessage')->name('chat.get.message');


    });

});

Auth::routes(['verify' => true]);


Route::get('account/profile', 'Auth\ProfileController@showProfileForm')->name('account.profile');
Route::post('account/profile', 'Auth\ProfileController@showProfileUpdate')->name('account.profile.update');
Route::post('account/avatar', 'Auth\ProfileController@uploadProfileAvatar')->name('account.profile.avatar');


Route::get('booking/checkout/{celebrity}', 'BookingController@showCheckoutForm')->name('booking.checkout');








Route::get('auth/facebook', 'Auth\SocialAuth\FaceBookLoginController@redirectToFacebook')->name('login.instagram');
Route::get('auth/facebook/callback', 'Auth\SocialAuth\FaceBookLoginController@handleFacebookCallback');


Route::get('auth/facebook', 'Auth\SocialAuth\FaceBookLoginController@redirectToFacebook')->name('login.facebook');
Route::get('auth/facebook/callback', 'Auth\SocialAuth\FaceBookLoginController@handleFacebookCallback');
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


Route::get('square/payment', 'Payment\SquareController@getAccessToken')->name('payment.square');

Route::post('square/payment', 'Payment\SquareController@createPayment')->name('payment.square.ajax');





Route::get('/clear-cache', function () {
    $exitCode = Artisan::call('cache:clear');
});


Route::get('/migrate', function () {
    $exitCode = Artisan::call('migrate');
});


Route::get('/states', function (Request $request) {

    return DB::table('states')->where('country_id', $request->country_id)->get();
})->name('states');


Route::get('/cities', function (Request $request) {
    return DB::table('cities')->where('state_id', $request->state_id)->get();
})->name('cities');
