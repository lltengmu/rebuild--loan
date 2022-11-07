<?php

use App\Http\Controllers\Api\GetCaseListController;
use App\Http\Controllers\Api\IndividualListApi;
use App\Http\Controllers\Api\VerificationController;
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

Route::apiResource('Verification', VerificationController::class);

/**
 * individual api
 */
Route::post('getDataByfilterCase',IndividualListApi::class);
Route::post('getDataByfilterClients',[IndividualListApi::class,'filterClientsData']);
/**
 * sp api
 */
Route::post('getCaseList',GetCaseListController::class);
