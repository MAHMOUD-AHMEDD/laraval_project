<?php

namespace App\Service\Users;

use App\Models\User;

class SaveUserInfoService
{
public static function save($data,$id=null)
{
//    if($id==null){
//        User::query()->create($data);
//    }
//    else{
//        $user=User::query()->find($id)->update($data);
//    }
//    same method
    User::query()->updateOrCreate([
        'id'=>$id
    ],$data);
//    get user for id==> 1 for example
//    if exist==> update with data sent
//    else create with data sent

}
}
