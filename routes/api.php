<?php

use App\Http\Controllers\API\AuthController;
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

Route::group(['middleware'=>['auth:sanctum']],function(){
    Route::post('logout',[AuthController::class,'logout']);

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
    Route::get('solution',[SolutionController::class,'all']);
    Route::post('solutionPivot',[SolutionController::class,'addSolutionPivot']);
    Route::get('solutionPivot',[SolutionController::class,'allSolutionPivot']);
});

Route::post('register',[AuthController::class,'register']);
Route::post('login',[AuthController::class,'login']);
