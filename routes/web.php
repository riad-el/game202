<?php

use App\Http\Controllers\GameController;
use Illuminate\Support\Facades\Route;

Route::get("/start",function(){
    return view("start");
});
Route::post("/start",[GameController::class,"start"])->name("start");

Route::get("/play",function(){
    return view("play");
})->name("showForm");
Route::post("/play",[GameController::class,"play"])->name("play");
