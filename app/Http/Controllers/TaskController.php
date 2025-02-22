<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    public function index(){
        $tasks = DB::table('tasks')->get();
        return view('tasks', compact('tasks'));
    }

    public function create(){
        DB::table('tasks')->insert([
            'name' => $_POST['name'],
        ]);
        return redirect()->back();
    }

    public function destroy ($id){
        // DB::table('tasks')->delete($id);
        DB::table('tasks')->where('id' ,$id)->delete();
        return redirect()->back();
    }

    public function edit($id){
        $task = DB::table('tasks')->where('id' , $id)->first();
        $tasks = DB::table('tasks')->get();
        return view('tasks' , compact("task" , "tasks"));
    }

    public  function update(){
        DB::table('tasks')->where("id" , $_POST['id'])->update([
            "name" => $_POST['name']
        ]);

        return redirect('/tasks');
    }
}
