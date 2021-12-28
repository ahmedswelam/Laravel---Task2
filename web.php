<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\blog;
use App\Http\Controllers\form;
use App\Http\Controllers\studentsController;

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

/*
general Route code:- 
Route::get('URLName',[ControllerName::class, 'FunctionName']);
*/


Route::get('create',[blog::class, 'create']);

Route::post('store',[blog::class, 'store']);

Route::get('display',[blog::class, 'display']);

Route::get('edit',[blog::class, 'edit']);

Route::get('update',[blog::class, 'update']);


#Student register
Route::get('students/register',[studentsController::class, 'studentsRegister']);

Route::post('students/store',[studentsController::class, 'studentsdata']);

Route::get('students',[studentsController::class, 'display']);

Route::get('students/edit/{id}',[studentsController::class, 'edit']);

Route::post('students/update',[studentsController::class, 'update']);

Route::get('students/remove/{id}', [studentsController::class, 'destroy']);

#students Login & Logout
Route::get('students/Login', [studentsController::class, 'Login']);
Route::post('students/DoLogin', [studentsController::class, 'DoLogin']);
Route::get('students/logout', [studentsController::class, 'logout']);






/*
//Route for form
Route::get('form/register',[form::class, 'formview']);

Route::post('form/storedata',[form::class, 'storedata']);
*/