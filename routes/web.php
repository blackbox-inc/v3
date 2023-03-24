<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\workerController;
use App\Http\Controllers\c_infoController;
use App\Http\Controllers\basic_info_Controller;
use App\Http\Controllers\contactController;
use App\Http\Controllers\fdhController;
use App\Http\Controllers\schoolController;
use App\Http\Controllers\c_catController;
use App\Http\Controllers\c_skillController;

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
Route::GET('/list/{year}', [workerController::class, 'filterYear']);
Route::POST('/update/{id}', [workerController::class, 'update']);
Route::POST('/contact_____________', [
    workerController::class,
    'contact_____________',
]);

/*
|--------------------------------------------------------------------------
| C_INFOS TABLE CRUD
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// BARCODE VALIDATION SHOW
Route::GET('/create', [c_infoController::class, 'create']);
// CHECK VALIDATION
Route::POST('/create', [c_infoController::class, 'checkbarcode']);
// STORE
Route::POST('/create/store', [c_infoController::class, 'store']);
// EDIT / SHOW
Route::GET('/create/edit/{id}', [c_infoController::class, 'edit']);
// UPDATE
Route::POST('/create/update', [c_infoController::class, 'update']);
// DELETE
Route::POST('/create/delete/{id}', [c_infoController::class, 'destroy']);

/*
|--------------------------------------------------------------------------
| BASIC INFOS
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::POST('/create/update-basic-info', [
    basic_info_Controller::class,
    'store',
]);

// MOVE PHOTO
Route::POST('/upload-photo', [basic_info_Controller::class, 'uploadphoto']);
// UPDATE PHOTO
Route::POST('/upload-photo/update', [basic_info_Controller::class, 'uploader']);

// CONTACTS
Route::GET('/contact', [contactController::class, 'index']);
Route::POST('/contact', [contactController::class, 'store']);

// CONTACTS PERSON
Route::POST('/contact-person', [
    contactController::class,
    'contactPersonstore',
]);

// DELETE FOR CONTACT INFO AND CONTACT PERSON
Route::POST('/delete_contact_details/{id}', [
    contactController::class,
    'destroy',
]);
//
Route::POST('/delete_contact_person/{id}', [
    contactController::class,
    'c_person_destroy',
]);

/*
|--------------------------------------------------------------------------
| GENERATE BARCODES
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::GET('/barcode', [fdhController::class, 'index']);
Route::POST('/dhusers', [fdhController::class, 'selectionUser']);
Route::POST('/generatedh', [fdhController::class, 'generatedh']);
Route::POST('/generateskilled', [fdhController::class, 'generateskilled']);
/*
|--------------------------------------------------------------------------
| SCHOOL ROUTES
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::POST('/create_educ', [schoolController::class, 'create']);
Route::POST('/create_educ/delete/{id}', [schoolController::class, 'destroy']);

/*
|--------------------------------------------------------------------------
| CATEGORIES POSITION ROUTES
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::POST('/category/update', [c_catController::class, 'update']);

/*
|--------------------------------------------------------------------------
| SKILLS ROUTES
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::POST('/skillsupdate', [c_skillController::class, 'update1']);
Route::POST('/skilled-update', [c_skillController::class, 'update2']);

/*
|--------------------------------------------------------------------------
| SEARCH POSITION ROUTES
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::GET('/home-search', [c_infoController::class, 'homesearch']);

Route::GET('/position', [c_infoController::class, 'position']);
Route::POST('/position', [c_infoController::class, 'position_find']);

Route::GET('/fullname', [c_infoController::class, 'fullname']);
Route::POST('/fullname', [c_infoController::class, 'fullname_find']);

/*
|--------------------------------------------------------------------------
| WORK EXPERIENCE ROUTES
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::POST('/experience', [c_infoController::class, 'experience']);
Route::POST('/pullexp', [c_infoController::class, 'pullexp']);
Route::POST('/pullupdate', [c_infoController::class, 'pullupdate']);
Route::POST('/pulldelete', [c_infoController::class, 'pulldelete']);

/*
|--------------------------------------------------------------------------
| UPLOAD DOCUMENTS
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::POST('/upload-file', [c_infoController::class, 'uploadfile']);
Route::POST('/uploadfile/update', [c_infoController::class, 'uploadUpdate']);
