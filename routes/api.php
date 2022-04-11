<?php

use App\Http\Controllers\API\CaseController;
use App\Http\Controllers\API\DiseaseController;
use App\Http\Controllers\API\SolutionController;
use App\Http\Controllers\API\SympthonController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//disease API
Route::post('disease',[DiseaseController::class,'add']);
Route::get('disease',[DiseaseController::class,'all']);
//sympthon API
Route::post('sympthon',[SympthonController::class,'add']);
Route::get('sympthon',[SympthonController::class,'all']);
//case API
Route::post('case',[CaseController::class,'add']);
Route::get('case',[CaseController::class,'all']);
//case pivot
Route::post('casePivot',[CaseController::class,'addCasePivot']);
Route::get('casePivot',[CaseController::class,'allCasePivot']);
//solution
Route::post('solution',[SolutionController::class,'add']);
Route::get('solution',[SympthonController::class,'all']);


