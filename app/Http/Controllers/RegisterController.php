<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\SaveUserInfoFormRequest;
use App\Output\SummaryOutput;
use App\Service\Users\SaveUserInfoService;
use Illuminate\Http\Request;
use App\traits\upload_image;
class RegisterController extends Controller
{
    use upload_image;
    public function index()
    {
        return view('auth.register');
    }

    public function save(SaveUserInfoFormRequest $request)
    {
    $data=$request->validated();
    $data['type']='client';
//    $data['phone']='013216545';
    $file=(request()->file('image'));
    if($file==null){
        $image_name='default.png';
    }
    else {
        $image_name = $this->upload($file, 'users');
    }
    SaveUserInfoService::save($data);
    return redirect()->back()->with('success','User Created Successfully please go to login page');


    }
}


