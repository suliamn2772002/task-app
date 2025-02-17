<?php


use Illuminate\Support\Facades\DB;
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


Route::get('tasks' , function(){
    $tasks = DB::table('tasks')->get();
    return view('tasks', compact('tasks'));
});

Route::post('create' , function (){
    DB::table('tasks')->insert([
        'name' => $_POST['name'],
    ]);
    return redirect()->back();
});

Route::post('delete/{id}' , function ($id){
    // DB::table('tasks')->delete($id);
    DB::table('tasks')->where('id' ,$id)->delete();
    return redirect()->back();
});

Route::post('edit/{id}' , function ($id){
    $task = DB::table('tasks')->where('id' , $id)->first();
    $tasks = DB::table('tasks')->get();
    return view('tasks' , compact("task" , "tasks"));
});


Route::post('update', function (){
    DB::table('tasks')->where("id" , $_POST['id'])->update([
        "name" => $_POST['name']
    ]);

    return redirect('/tasks');
});
