<?php
namespace app\chac\model;

use think\Model;

class User extends Model
{


    public function index(){

    }

    public function reg($data){
        $time = date('Y-m-d H:i:s',time());
        $user = new User([
            'nickname'  =>  $data['nickname'],
            'password' =>  $data['password'],
            'create_time'=>$time,
        ]);
        $re['code']=$user->save();
        $re['uid']=$user->user_id;
        return $re;
    }

    public function login($data){
        $user=User::get(['nickname'=>$data['nickname']]);
        $re=array(
            'code'=>null,
            'uid'=>null,
        );
        if(!$user):
            $re['code']=0;
        elseif($user->password==$data['password']):
            $re['code']=1;
            $re['uid']=$user->user_id;
        else:
            $re['code']=0;
        endif;
        return $re;
    }






    /*
     * 检查用户名是否已存在
     */
    public function nicknameExist($nickname){
        $user=User::get(['nickname'=>$nickname]);
        return $user;
    }












}