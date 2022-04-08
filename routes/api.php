<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\InvoiceDetailsController;
use App\Http\Controllers\InvoiceHeaderController;
use App\Models\InvoiceDetails;
use App\Models\InvoiceHeader;
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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
//public routes
Route::prefix("users")->group(function(){
    Route::post("/login",[AuthController::class,"login"])->name("user.login");
    Route::post("/",[AuthController::class,"store"])->name("user.store");
   
});

//private routes
Route::middleware("auth:sanctum")->group(function(){
    Route::post("users/logout",[AuthController::class,"logout"])->name("user.logout");
    Route::resource("companies",CompanyController::class);
    Route::get("companies/showBranches/{id}",[CompanyController::class,"showBranches"])->name("companies.show.branches");
    Route::resource("branches",BranchController::class);
    Route::resource("headers",InvoiceHeaderController::class);
    Route::resource("details",InvoiceDetailsController::class);
    Route::get("headers/{id}/details",[InvoiceHeaderController::class,"showDetails"])->name("headers.showDetails");
});