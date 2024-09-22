<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterFormRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Barryvdh\DomPDF\PDF;
class UsersController extends Controller
{
    public function index(Request $request)
    {
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
        $users = User::query();
        if ($request->filled('search')) {
            $users->where('name', 'like', '%' . $request->search . '%')
                ->orWhere('email', 'like', '%' . $request->search . '%');
        }

        $users = $users->paginate(10); // Adjust as needed

        return view('admin.users.index', compact('users'));

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
    public function exportPDF()
    {
        $users = User::all();
        $pdf = PDF::loadView('admin.users.pdf', compact('users'));
        return $pdf->download('users.pdf');
    }
    public function sendNotification(Request $request, User $user)
    {
        $request->validate(['message' => 'required|string']);

        $user->notify(new \App\Notifications\CustomNotification($request->message));

        return redirect()->route('admin.users.index')->with('success', 'Notification sent to ' . $user->name);
    }



}
