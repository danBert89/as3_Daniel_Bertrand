<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\CRUD;

Route::get('/', function () {
    return view('welcome');
});
Route::get("/home", function () {
    return view("home", ["title" => "Home"]);
});
Route::get("/manage", [CRUD::class, 'retrieve']);
Route::get("/search", function () {
    return view("search", ["title" => "Search"]);
});
Route::get("/about", function () {
    return view("about", ["title" => "About"]);
});
Route::delete("/manage/delete/{id}", [CRUD::class, 'delete']);
Route::post("/manage/insert", [CRUD::class, 'insert']);
Route::get('/manage/create', [CRUD::class, 'showCreateForm']);
Route::get('/manage/edit/{id}', [CRUD::class, 'showEditForm']);
Route::put('/manage/edit/{id}', [CRUD::class, 'edit']);
