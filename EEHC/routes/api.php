<?php

use App\Http\Controllers\APIs\EmployeeController;
use App\Http\Controllers\APIs\ChatController;
use App\Http\Controllers\APIs\DeafController;
use App\Http\Controllers\APIs\BranchController;
use App\Http\Controllers\APIs\AboutController;
use App\Http\Controllers\APIs\FoundationController;
use App\Http\Controllers\APIs\ServiceController;
use App\Http\Controllers\APIs\DictionaryController;
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

Route::middleware("auth:sanctum", "verified")->get("/user", function (Request $request) {
    return $request->user();
});
Route::group(["prefix" => "v1"], function () {
    Route::group(["prefix" => "employee"], function () {
        Route::group(["prefix" => "auth"], function () {
            Route::post("login", [EmployeeController::class, "login"]);
            Route::post("register", [EmployeeController::class, "register"]);
            Route::get("logout", [EmployeeController::class, "logout"])->middleware(["auth:sanctum", "scopes:user"]);
        });
        Route::group(["prefix" => "profile", "middleware" => ["auth:sanctum", "scopes:user"]], function () {
            Route::post("edit", [EmployeeController::class, "edit"]);
            Route::post("image", [EmployeeController::class, "userProfileImage"]);
            Route::get("/", [EmployeeController::class, "profile"]);
        });

        Route::group(["prefix" => "chat", "middleware" => ["auth:sanctum", "scopes:user"]], function () {
            Route::get("openChat", [ChatController::class, "openChatForEmployee"]);
            Route::get("endChat", [ChatController::class, "endChatForEmployee"]);
            Route::post("sendMessage", [ChatController::class, "sendMessage"]);
        });
    });

    Route::group(["prefix" => "deaf"], function () {
        Route::group(["prefix" => "auth"], function () {
            Route::post("register", [DeafController::class, "register"]);
            Route::get("logout", [DeafController::class, "logout"])->middleware(["auth:sanctum", "scopes:user"]);
        });
        Route::group(["prefix" => "profile", "middleware" => ["auth:sanctum", "scopes:user"]], function () {
            Route::post("edit", [DeafController::class, "edit"]);
            Route::get("/", [DeafController::class, "profile"]);
        });

        Route::group(["prefix" => "chat", "middleware" => ["auth:sanctum", "scopes:user"]], function () {
            Route::post("scanChat", [ChatController::class, "scanChat"]);
            Route::get("openChat", [ChatController::class, "openChatForDeaf"]);
            Route::get("endChat", [ChatController::class, "endChatForDeaf"]);
            Route::post("sendMessage", [ChatController::class, "sendMessage"]);
        });
         //foundation
        Route::get("foundation", [FoundationController::class, "foundation"]);
        Route::get("checkUpdate", [FoundationController::class, "checkUpdate"]);

        //about
        Route::get("about", [AboutController::class, "about"]);

        //branches
        Route::get("branches", [BranchController::class, "branches"]);
        Route::get("branchesInState", [BranchController::class, "branchesInState"]);
        Route::get("states", [BranchController::class, "states"]);
        Route::get("get_branch", [BranchController::class, "details"]);

        //services
        Route::get("services", [ServiceController::class, "services"]);
        Route::get("branchServices", [ServiceController::class, "branchServices"]);
        Route::get("get_service", [ServiceController::class, "details"]);

    });

     //Dictionary
    Route::group(["prefix" => "dictionary"], function () {
        Route::get("column", [DictionaryController::class, "column"]);
        Route::get("getWord", [DictionaryController::class, "getWord"]);
    });



});
