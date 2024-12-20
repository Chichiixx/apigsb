<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::post('/visiteur/initpwds',[\App\Http\Controllers\VisiteurController::class,"initPasswords"]);
Route::post('/visiteur/login/',[\App\Http\Controllers\VisiteurController::class,"login"]);
Route::get('/visiteur/logout',[\App\Http\Controllers\VisiteurController::class,"logout"])->middleware('auth:sanctum');
Route::get('/visiteur/unauth',[\App\Http\Controllers\VisiteurController::class,"unauthorized"])->name("login");
Route::get('/frais/{idFrais}',[\App\Http\Controllers\FraisController::class,"GetFraisById"]);
Route::post('/frais/ajout',[\App\Http\Controllers\FraisController::class,"ajout"]);
Route::post('/frais/modif',[\App\Http\Controllers\FraisController::class,"modif"]);
Route::delete('/frais/suppr',[\App\Http\Controllers\FraisController::class,"suppr"]);
