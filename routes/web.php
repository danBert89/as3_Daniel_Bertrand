<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get("/home", function () {
    return view("home", ["title" => "Home"]);
});
Route::get("/manage", function () {
    return view("manage", ["title" => "Manage"]);
});
Route::get("/search", function () {
    return view("search", ["title" => "Search"]);
});
Route::get("/about", function () {
    return view("about", ["title" => "About"]);
});
