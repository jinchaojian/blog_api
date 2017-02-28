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
        $re['code']=$user->save();
        $re['uid']=$user->id;
        return $re;
    }

    public function login($data){
        $user=UserBase::get(['name'=>$data['nickname']]);
        $re=array(
            'code'=>null,
            'uid'=>null,
        );
        if(!$user):
            $re['code']=0;
        elseif($user->password==$data['password']):
            $re['code']=1;
            $re['uid']=$user->id;
        else:
            $re['code']=0;
        endif;
        return $re;
    }






    /*
     * 检查用户名是否已存在
     */
    public function nicknameExist($nickname){
        $user=UserBase::get(['name'=>$nickname]);
        return $user;
    }












}