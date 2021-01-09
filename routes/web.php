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
Route::get('/',[MyController::class, 'HomePage']);
//Form List
Route::get('/class',[MyController::class, 'ClassForm']);
Route::get('/teacher',[MyController::class, 'teacher']);
Route::get('/student',[MyController::class, 'student']);
Route::get('/subject',[MyController::class, 'subject']);
Route::get('/results',[MyController::class, 'results']);


Route::get('/result',[MyController::class, 'result']);
Route::get('/admin',[MyController::class, 'admin']);
Route::get('/about',[MyController::class, 'about']);
Route::get('/contact',[MyController::class, 'contact']);


//Data Connection============================================
Route::post('addclass',[MyController::class,'addclass']);
Route::post('editclass',[MyController::class,'editclass']);
Route::get('delete/{c}',[MyController::class,'delete'])->name('delete'); //{c} = Passing variable