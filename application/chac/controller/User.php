<?php
namespace app\chac\controller;
use app\chac\model\UserBase as Userbase;
use \think\Controller;
//use app\chac\common\DataFormate as DataFormate;

class User extends Controller
{
    public function index()
    {
        /*        $b=new \app\chac\model\user;
                $c=$b->index();*/
        // $b=new user();
        //   $b->index();
        $a[0]='hhhhui';
        return $a[0];
    }


    /**
     * 用户注册接口
     * @param $nickname
     * @param $password
     * @return array
     * int data 接口返回数据 0代表注册失败，1代表注册成功
     * string message 注册提示信息
     * int code
     */
    public function reg($nickname,$password){
        $result=$this->validate(
            [
                'name'=>$nickname,
                'password'=>$password,
            ],
            [
                'name'=>'require|max:20',
                'password'=>'require|max:35',
            ]
        );
        if(true!==$result):
            return ['code'=>200,'data'=>null,'message'=>'用户名或密码格式错误'];
        endif;
        $data=array(
            'nickname'=>$nickname,
            'password'=>$password,
        );
        $re=0;
        $message='操作完成';
        $model=new UserBase();
        $nicknameExist=$model->nicknameExist($nickname);
        if(!$nicknameExist):
            $re=$model->reg($data);
        else:
            $message='用户名已存在';
        endif;
        $api=['code'=>200,'data'=>$re,'message'=>$message];
        return $api;
    }

    /**
     * @param $nickname
     * @param $password
     * @return array
     * int data 登陆状态码 1代表成功 0代表失败
     * string message 登陆信息
     * int code
     */
    public function login($nickname,$password){
        $result=$this->validate(
            [
                'name'=>$nickname,
                'password'=>$password,
            ],
            [
                'name'=>'require|max:20',
                'password'=>'require|max:35',
            ]
        );
        if(true!==$result):
            return ['code'=>200,'data'=>null,'message'=>'用户名或密码格式错误'];
        endif;
        $data=array(
            'nickname'=>$nickname,
            'password'=>$password,
        );
        $model=new UserBase();
        $re=$model->login($data);
        if($re):
            $message='登陆成功';
        else:
            $message='用户名或密码错误';
        endif;
        $api=['code'=>200,'data'=>$re,'message'=>$message];
        return $api;
    }
}