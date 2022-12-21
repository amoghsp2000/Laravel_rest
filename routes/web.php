<?php

use App\Models\Posts;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use Symfony\Component\HttpFoundation\Request;
use function CommonMark\Parse;

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

Route::get('/register', function () {
    return view('register');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/profile', function (Request $request) {
    $id = $request->session()->get('uid');
    $role = User::where("id","=",$id)->get();
    return view('profile',['data' => $role[0]->role]);
});

Route::get('/editProfile', function (Request $request) {
    return view('edit');
});

Route::get('logout', function (Request $request) {
    $request->session()->forget('user');
    return view('login');
});


Route::get("createPost", function (Request $request) {
    return view('create');
});