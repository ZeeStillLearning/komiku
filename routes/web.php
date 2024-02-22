<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ComicController;
use App\Http\Middleware\CheckIfLogin;
use Illuminate\Support\Facades\Route; 


Route::middleware(CheckIfLogin::class)->controller(ComicController::class)->prefix("comics")->group(function (){
    Route::get("/", "index")->name("comics.index");
    Route::get("/create", "create")->name("comics.create");
    Route::post("/store", "store")->name("comics.store");
    Route::get("/edit/{id}", "edit")->name("comics.edit");
    Route::put("/update/{id}", "update")->name("comics.update");
    Route::delete("/destroy/{id}", "destroy")->name("comics.destroy");
    Route::get("/show/{id}", "show")->name("comics.show");
});

Route::controller(AuthController::class)->group(function (){
    Route::get("/login", "form_login")->name("login");
    Route::post("/login", "login");
    Route::get("/register", "form_register")->name("register");
    Route::post("/register", "register");
    Route::post('/logout', 'logout')->name('logout');
});