<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
=======
use Illuminate\Http\Request;

>>>>>>> ccd36d9 (DashBoard)
class AboutController extends Controller
{
    public function index()
    {
<<<<<<< HEAD
        $data=User::query();
        if(request()->filled('username')){
            $data->where('username','=','%'.request('username').'%');
        }
        $result=$data->orderBy('id','DESC')->get();
        return view('users',compact('result'));
=======
        echo 'Test function about controller';
>>>>>>> ccd36d9 (DashBoard)
    }
}
