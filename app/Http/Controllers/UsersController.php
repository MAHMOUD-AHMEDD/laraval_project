<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
=======
use App\Http\Requests\RegisterFormRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
>>>>>>> ccd36d9 (DashBoard)

class UsersController extends Controller
{
    public function index()
    {
<<<<<<< HEAD
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
=======
        // $data = User::query()
        //     // ->where('id','>',1)
        //     // ->orderBy('id','desc')
        //     ->first(); //get();
        // return $data;
        //////////////////////////////////
        // User::query()->create([
        //     'username'=>'mohamed',
        //     'email'=>'mohamed@gmail.com',
        //     'password'=>bcrypt('mohamed'),
        //     'phone'=>'012222222',
        //     'type'=>'client',
        // ]);
        //////////////////////////////////
        // $data =request()->all(); // get the data passed in GET method //http://127.0.0.1:8000/user?username=a
        // if(request()->filled('username')) // if there is query parameter called username and it has a value
        // {
        //     $data =User::query()
        //     ->where('username','LIKE','%'.request('username').'%')
        //     ->get();
        // return $data;
        // }else{
        //     echo 'No data';
        // }
        //////////////////////////////////

         //with('questions'); many to many relation data
        $data = User::query()->withCount('questions'); //many to many relation data count
        if(request()->filled('username'))
        {
            $data->where('username','LIKE','%'.request('username').'%');
        }
        $result = $data
        // ->select('username','email')
        ->get();

        // return view('about',compact('result'));
        return $result;

    }

    public function profile($id){

        $user = User::query()
            // ->where('id','=',$id)
            // ->get();
            // ==
            // ->find($id);
            // if($user){
            //     return $user;
            // }else{
            //     echo 'No data';
            // }
            //////////////////////////////////
            ->find($id);
            if($user){
                $user->update(['username'=>'test web']);
            }
    }

    public function all_users(Request $request)
    {
        $search = $request->input('search');
        $users = User::query()
            ->where('username', 'like', '%' . $search . '%')
            ->get();
        return view('all_users', compact('users', 'search'));
    }


>>>>>>> ccd36d9 (DashBoard)
}
