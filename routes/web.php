<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\uploadController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return "this is the best part";
});

Route::get('/upload',function(){
return view('csvUpload');
});
Route::post('/upload',[uploadController::class,'upload']);

Route::get('/store',[uploadController::class,'store']);