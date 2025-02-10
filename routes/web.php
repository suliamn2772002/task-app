<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get("/about" , function(){
    $name = "Sulaiman M. Abu Hatab";
    $departments = [
        "1"=>"technical",
        "2"=>"financial",
        "3"=>"Sales",
    ];

    // return view('about')->with('name',$name);
    // return view('about', ["name"=>$name]);
    return view('about', compact("name" , "departments"));
});

Route::post("/about" , function(){
    $name = $_POST['name'];
    $departments = [
        "1"=>"technical",
        "2"=>"financial",
        "3"=>"Sales",
    ];
    return view('about', compact("name" , "departments"));
});
