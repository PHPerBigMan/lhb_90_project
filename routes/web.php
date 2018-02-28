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

function routes()
{
    return function () {
        Route::get('/', 'Page@home');
        Route::get('/login', 'Page@login');
        Route::get('/register', 'Page@register');
        Route::get('/purchase', 'Page@purchase');
        Route::get('/user', 'Page@user');
        Route::get('/user-auth', 'Page@userAuth');
        Route::get('/change-pwd', 'Page@changePwd');
        Route::get('/email-auth', 'Page@emailAuth');
    };
}

Route::group(['middleware' => ['lang'], 'namespace' => 'Frontend'], routes());

Route::group(['prefix' => 'cn', 'namespace' => 'Frontend'], routes());

Route::group(['prefix' => 'en', 'namespace' => 'Frontend'], routes());

Route::get('/canvas', function () {
    return view('frontend.canvas');
});


Route::group(['prefix'=>'api','namespace'=>'Api','middleware'=>'VerifyCsrfToken'],function(){
    Route::post('/index','IndexController@index');
    Route::post('/register','RegisterController@register');
    Route::post('/login','RegisterController@login');
    Route::post('/forget','RegisterController@forget');
    Route::post('/sendMail','RegisterController@mail');
    Route::get('/checkMail/{token}','RegisterController@checkMail');
    Route::post('/userInfo','UserController@ChangeUserInfo');
    Route::post('/changepwd','UserController@ChangePwd');
    Route::get('/phoneCheck','UserController@UserPhoneCheck');
    Route::post('/userInfo','UserController@UserInfo');

});