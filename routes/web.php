<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\workerController;

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

Auth::routes();

// DISABLED REGISTER
// Route::match(['get', 'post'], 'register', function () {
//     abort(404);
// });

Route::get('/home', [HomeController::class, 'index'])->name('home');

// WORKER
Route::GET('/list', [workerController::class, 'index']);
Route::POST('/update/{id}', [workerController::class, 'update']);

// Route::group(['middleware' => 'auth'], function () {
//     if (Auth::check()) {
//         if (Auth::user()->type == 0) {
//             Route::get('/register', 'ManagerController@index');
//         } elseif (Auth::user()->role == 'rater') {
//             Route::get('/', 'RaterController@index');
//         }
//     }
// });

// dump(auth()->check());

Route::GET('/create', [workerController::class, 'create']);
Route::POST('/create', [workerController::class, 'checkbarcode']);
Route::POST('/create/post', [workerController::class, 'store']);
