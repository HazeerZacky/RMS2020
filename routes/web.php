<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyController;

// Main Routes
Route::get('/',[MyController::class, 'HomePage']);
Route::get('Dashboard/{c}',[MyController::class, 'Dashboard'])->name('Dashboard');
Route::get('/login',[MyController::class, 'login']);
Route::get('/Contact/{c}',[MyController::class, 'Contact']);
Route::get('/Results',[MyController::class, 'Results']);
Route::get('/result',[MyController::class, 'result']);
Route::get('/admin',[MyController::class, 'admin']);
Route::get('/about',[MyController::class, 'about']);

Route::post('/log',[MyController::class, 'log']); //Login Function
Route::get('delcls/{c}',[MyController::class,'delclass'])->name('delcls'); //Teacher Profile Delete Class
Route::post('/select',[MyController::class,'select']); //Teacher Profile Select Class
Route::post('search/',[MyController::class,'search']); //Enter Results Page
Route::post('addresult/',[MyController::class,'addresult']); //Enter Results Page
Route::post('searchsubj/',[MyController::class,'searchsubj']); //Teacher Report Page
Route::post('stresult/',[MyController::class,'stresult']); //Students Results Page
Route::get('logout/',[MyController::class, 'logout']);  //Logout

// Form List
Route::get('/Dashboard/ClassPage/{c}',[MyController::class, 'ClassForm']); //Hazeer Done 
Route::get('/Dashboard/UsersPage/{c}',[MyController::class, 'UsersForm']); //Hazeer Done
Route::get('/Dashboard/StudentPage/{c}',[MyController::class, 'StudentForm']); //Hazeer Done
Route::get('/Dashboard/SubjectPage/{c}',[MyController::class, 'Subjectform']);
Route::get('/Dashboard/EnterResults/{c}',[MyController::class, 'EnterResults'])->name('Dashboard/EnterResults');//Hazeer Done
Route::get('/Dashboard/TeachersReport/{c}',[MyController::class, 'TeachersReport'])->name('Dashboard/TeachersReport');//Hazeer Done
Route::get('/Dashboard/TeachersProfile/{c}',[MyController::class, 'TeachersProfile'])->name('Dashboard/TeachersProfile');//Hazeer Done

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

//Data connection= Subject Table============================================
Route::get('/get-pdf-results',[MyController::class,'getResultsPDF']);
Route::get('/download-pdf/{x}/{y}/{z}/{t}/{a}/{r}',[MyController::class,'downloadPDF']);


Route::post('editmarks',[MyController::class,'editmarks']);
Route::post('marksrep',[MyController::class,'marksrep']);
Route::post('classrep',[MyController::class,'classrep']);
Route::get('/printmarksrep/{a}/{b}/{c}/{d}',[MyController::class, 'printmarksrep'])->name('printmarksrep');
Route::get('/printclassrep/{a}/{b}/{c}',[MyController::class, 'printclassrep'])->name('printclassrep');
Route::get('/teacherreportprint/{a}/{b}/{c}/{d}/{e}',[MyController::class, 'teacherreportprint'])->name('teacherreportprint');