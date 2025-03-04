<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index(){
        // $users = DB::table('users')->get();
        $users = User::all();
        return view('users', compact('users'));
    }

    public function create(){
        // DB::table('users')->insert([
        //     'name' => $_POST['name'],
        //     'email' => $_POST['email'],
        //     'password' => $_POST['password'],
        // ]);
        $user = new User();
        $user->name = $_POST['name'];
        $user->email = $_POST['email'];
        $user->password = $_POST['password'];
        $user->save();
        return redirect()->back();
    }

    public function destroy ($id){
        // DB::table('users')->where('id' ,$id)->delete();
        $user = User::find($id);
        $user->delete();
        return redirect()->back();
    }

    public function edit($id){
        // $user = DB::table('users')->where('id' , $id)->first();
        $user = User::find($id);
        // $users = DB::table('users')->get();
        $users = User::all();
        return view('users' , compact("user" , "users"));
    }

    public  function update(){
        // DB::table('users')->where("id" , $_POST['id'])->update([
        //     'name' => $_POST['name'],
        //     'email' => $_POST['email'],
        //     'password' => $_POST['password'],
        // ]);
        $user = User::find($_POST['id']);
        $user->name = $_POST['name'];
        $user->email = $_POST['email'];
        $user->password = $_POST['password'];
        $user->save();
        return redirect('/users');
    }
}
