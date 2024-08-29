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
}
