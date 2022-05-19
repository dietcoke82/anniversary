<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Auth;


use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Company\CompanyAdminController;
use App\Http\Controllers\PlayGroundController;
use App\Http\Controllers\Payment\ProcessController;
use App\Http\Controllers\Clova\ClovaController;
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

Route::prefix("auth")->group(function(){
    Route::get('login', [RegisterController::class,'login']);
    Route::get('register', [RegisterController::class,'register']);
});

Route::prefix('company')->group(function(){
    Route::prefix('admin')->group(function(){
        Route::get('list', [CompanyAdminController::class,'adminList']);
        Route::get('test', [CompanyAdminController::class,'test']);
        Route::get('info/{num}', [CompanyAdminController::class,'adminInfo']);
        Route::put('modify', [CompanyAdminController::class,'adminModify']);
        Route::post('duplicate', [CompanyAdminController::class,'checkDuplicate']);
    });
});

Route::prefix('playground')->group(function(){
    Route::get('props', [PlayGroundController::class,'props']);
    Route::get('event', [PlayGroundController::class,'event']);
    Route::get('router', [PlayGroundController::class,'router']);
    Route::get('axios', [PlayGroundController::class,'axios']);
    Route::post('axiosReturn', [PlayGroundController::class,'axiosReturn']);
    //Route::post('axiosFile', [PlayGroundController::class,'axiosFile']);
    Route::post('axiosForm', [PlayGroundController::class,'axiosForm']);
    Route::get('axiosGet/{idx}', [PlayGroundController::class,'axiosGet']);
    Route::get('editor', [PlayGroundController::class,'editor']);
    Route::post('editorInsert', [PlayGroundController::class,'editorInsert']);
    Route::get('editorInfo/{idx}', [PlayGroundController::class,'editorInfo']);
    Route::post('editorUpdate', [PlayGroundController::class,'editorUpdate']);
    Route::get('editorTest', [PlayGroundController::class,'editorTest']);
    Route::get('example', [PlayGroundController::class,'example']);

});

// clova
Route::prefix('clova')->group(function(){
    Route::get('upload', [ClovaController::class,'upload']);
    Route::post('faceUpload', [ClovaController::class,'faceFileUpload']);
});

Route::prefix('login')->group(function(){
    // 로그인
    Route::get('index', function(){

    });
    // 카카오
    Route::get('kakao', function(){

    // naver
    });
    Route::get('naver', function(){
    // google
    });
    Route::get('google', function(){


    });

});


Route::prefix('payment')->group(function(){
    Route::get('pay_kakao', function(){
        return view('payment.pay_kakao');
    });
    Route::get('cancel_pay', function(){
        return view('payment.cancel_pay');
    });
    Route::get('pay_naver', function(){
        return view('payment.pay_naver');
    });
    Route::get('complete_naver', function(){
        return view('payment.complete_naver');
    });
    Route::get('naverPay', function(){
        return view('payment.naverPay');
    });

    Route::get('process_naver', [ProcessController::class, 'process_naver']);
    Route::post('process_kakao', [ProcessController::class, 'process_kakao']);
    Route::post('cancel_kakao', [ProcessController::class, 'cancel_kakao']);
    Route::get('complete_kakao', [ProcessController::class, 'complete_kakao']);
    Route::get('result_kakao/{tid}', [ProcessController::class, 'result_kakao']);

});

Route::get('test', function(){
    return view('playground.test');
});

Route::get('pressbook', function(){
    return view('playground.pressbook');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
