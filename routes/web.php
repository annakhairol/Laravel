<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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
    return view('login');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/register', function () {
    return view('register');
});

Route::get('/userlist', function () {
    return view('viewuser');
});

Route::get('/userget', function () {
    return view('edituser');
});

Route::get('/search', function () {
    return view('search');
});

Route::get('/logout', function () {
    Session::forget('user');
    return redirect('login');
});



Route::post('/register',[UserController::class, 'register']);

Route::get('/userlist',[UserController::class, 'listuser']);

Route::post('/login',[UserController::class, 'login']);

Route::get('/userdelete',[UserController::class, 'deleteuser']);

Route::get('/userget',[UserController::class, 'getuser']);

Route::post('/useredit',[UserController::class,'edituser']);

Route::post('/userlist',[UserController::class,'edituser']);

// Route::post('/search', [UserController::class, 'search']);

Route::post('/userlist/search',[UserController::class, 'search']);