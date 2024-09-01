<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact');
    }
    public function save()
    {
//        validate
        request()->validate([
            'username'=>'required|min:5|max:100',
            'title'=>'required|min:5|max:100',
            'message'=>'required|min:30',
        ]);

//        save data
        contact::query()->create([
            'username'=>request('username'),
            'title'=>request('title'),
            'message'=>request('message')
        ]);
//        return success message
        return redirect()->back()->with('success','Question added successfully');

//        return request('username');
    }
}
