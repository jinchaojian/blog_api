<?php
namespace app\chac\model;

use think\Model;

class UserBase extends Model
{


    public function index(){

    }

    public function reg($data){
        $time = date('Y-m-d H:i:s',time());
        $user = new UserBase([
            'name'  =>  $data['nickname'],
            'password' =>  $data['password'],
            'createTime'=>$time,
        ]);
        $re=$user->save();
        return $re;
    }

    public function login($data){
        $user=UserBase::get(['name'=>$data['nickname']]);
        if(!$user):
            return 0;
        elseif($user->password==$data['password']):
            return 1;
        else:
            return 0;
        endif;
    }






    /*
     * 检查用户名是否已存在
     */
    public function nicknameExist($nickname){
        $user=UserBase::get(['name'=>$nickname]);
        return $user;
    }












}