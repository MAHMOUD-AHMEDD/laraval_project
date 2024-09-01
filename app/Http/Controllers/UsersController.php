<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
        $data=User::query();
        if(request()->filled('username')){
           $data->where('username','LIKE','%'.request('username').'%')->get();
        }
        $result=$data->orderBy('id','DESC')->get();
        return view('users',compact('result'));
    }
    public function base()
    {
        return view('register');
    }
    public function register()
    {
        request()->validate([
            'username'=>'required|min:5|max:100',
            'email' => ['required', 'email:rfc,dns'],
            'password'=>'required|min:5|max:100',
        ]);

//        save data
        User::query()->create([
            'username'=>request('username'),
            'email'=>request('email'),
            'password'=>request('password'),
            'type'=>'client'
        ]);
//        return success message
        return redirect()->back()->with('success','user has been added successfully');

    }
}
