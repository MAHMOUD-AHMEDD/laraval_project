<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
class AboutController extends Controller
{
    public function index()
    {
        $data=User::query();
        if(request()->filled('username')){
            $data->where('username','=','%'.request('username').'%');
        }
        $result=$data->orderBy('id','DESC')->get();
        return view('users',compact('result'));
    }
}
