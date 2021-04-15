<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyController;

// Homepage Routes
Route::get('/',[MyController::class, 'HomePage']);
Route::get('Dashboard/{c}',[MyController::class, 'Dashboard'])->name('Dashboard');
Route::get('/login',[MyController::class, 'login']);
Route::get('/Contact',[MyController::class, 'Contact']);
Route::get('/Results',[MyController::class, 'Results']);
Route::post('/log',[MyController::class, 'log']);

//Form List
Route::get('/Dashboard/ClassPage',[MyController::class, 'ClassForm']); //Hazeer Done
Route::get('/Dashboard/UsersPage',[MyController::class, 'UsersForm']); //Hazeer Done
Route::get('/Dashboard/StudentPage',[MyController::class, 'StudentForm']); //Hazeer Done
Route::get('/Dashboard/SubjectPage',[MyController::class, 'Subjectform']);//Hanan Done
Route::get('/Dashboard/EnterResults/{c}',[MyController::class, 'EnterResults'])->name('Dashboard/EnterResults');//Hazeer Done
Route::get('/Dashboard/TeachersReport/{c}',[MyController::class, 'TeachersReport'])->name('Dashboard/TeachersReport');//Hazeer Done
Route::get('/Dashboard/TeachersProfile/{c}',[MyController::class, 'TeachersProfile'])->name('Dashboard/TeachersProfile');//Hazeer Done

Route::get('/result',[MyController::class, 'result']);
Route::get('/admin',[MyController::class, 'admin']);
Route::get('/about',[MyController::class, 'about']);


//Data Connection= Class Table ===========================================
Route::post('addclass',[MyController::class,'addclass']);
Route::post('editclass',[MyController::class,'editclass']);
Route::get('changeclassstatus/{c}',[MyController::class, 'changeclassstatus'])->name('changeclassstatus'); //Active Deactive Button
Route::get('deleteclass/{c}',[MyController::class,'deleteclass'])->name('deleteclass'); //{c} = Passing variable
//=========================================================================

//Data Connection= Users Table ============================================
Route::post('adduser',[MyController::class,'adduser']);
Route::post('edituser',[MyController::class,'edituser']);
Route::get('changeusersstatus/{c}',[MyController::class, 'changeusersstatus'])->name('changeusersstatus'); //Active Deactive Button
Route::get('deleteuser/{c}',[MyController::class,'deleteuser'])->name('deleteuser'); //{c} = Passing variable
//=========================================================================

//Data Connection= Student Table ===========================================
Route::post('addstudent',[MyController::class,'addstudent']);
Route::post('editstudent',[MyController::class,'editstudent']);
Route::get('changestudentstatus/{c}',[MyController::class, 'changestudentstatus'])->name('changestudentstatus'); //Active Deactive Button
Route::get('deletestudent/{c}',[MyController::class,'deletestudent'])->name('deletestudent'); //{c} = Passing variable
//==========================================================================

//Data connection= Subject Table============================================
Route::post('addsubject',[MyController::class,'addsubject']);
Route::post('editsubject',[MyController::class,'editsubject']);
Route::get('changesubjectsstatus/{c}',[MyController::class, 'changesubjectsstatus'])->name('changesubjectsstatus'); //Active Deactive Button
Route::get('deletesubject/{c}',[MyController::class,'deletesubject'])->name('deletesubject'); //{c} = Passing variable
//==========================================================================