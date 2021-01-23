<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyController;


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

// Route::get('/', function () {
//     return view('Dashboard');
// });


/*
|--------------------------------------------------------------------------
| Navigation Part
|--------------------------------------------------------------------------
*/
// Homepage Routes
Route::get('/',[MyController::class, 'HomePage']);
Route::get('/Dashboard',[MyController::class, 'Dashboard']);
Route::get('/Contact',[MyController::class, 'Contact']);
Route::get('/Results',[MyController::class, 'Results']);

//Form List
Route::get('/Dashboard/ClassPage',[MyController::class, 'ClassForm']); //Done
Route::get('/Dashboard/UsersPage',[MyController::class, 'UsersForm']);
Route::get('/Dashboard/StudentPage',[MyController::class, 'StudentForm']); //Done
Route::get('/Dashboard/SubjectPage',[MyController::class, 'Subjectform']);//hanan

Route::get('/result',[MyController::class, 'result']);
Route::get('/admin',[MyController::class, 'admin']);
Route::get('/about',[MyController::class, 'about']);


//Data Connection= Class Table ===========================================
Route::post('addclass',[MyController::class,'addclass']);
Route::post('editclass',[MyController::class,'editclass']);
Route::get('changeclassstatus/{c}',[MyController::class, 'changeclassstatus'])->name('changeclassstatus'); //Active Deactive Button
Route::get('deleteclass/{c}',[MyController::class,'deleteclass'])->name('deleteclass'); //{c} = Passing variable


//Data Connection= User Table ===========================================
Route::post('adduser',[MyController::class,'adduser']);
Route::post('edituser',[MyController::class,'edituser']);
Route::get('changeusersstatus/{c}',[MyController::class, 'changeusersstatus'])->name('changeusersstatus'); //Active Deactive Button
Route::get('deleteuser/{c}',[MyController::class,'deleteuser'])->name('deleteuser'); //{c} = Passing variable


//Data Connection= User Table ===========================================
Route::post('addstudent',[MyController::class,'addstudent']);
Route::post('editstudent',[MyController::class,'editstudent']);
Route::get('changestudentstatus/{c}',[MyController::class, 'changestudentstatus'])->name('changestudentstatus'); //Active Deactive Button
Route::get('deletestudent/{c}',[MyController::class,'deletestudent'])->name('deletestudent'); //{c} = Passing variable


//Data connection=subject Table==========================================
Route::post('addsubject',[MyController::class,'addsubject']);
