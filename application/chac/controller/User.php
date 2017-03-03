<?php
namespace app\chac\controller;
use app\chac\model\User as UserModel;
use \think\Controller;


session_start();
class User extends Controller
{


    public function index()
    {
    }


    /**
     * 用户注册接口
     * @param $nickname
     * @param $password
     * @return array
     * int data 接口返回数据 0代表注册失败，1代表注册成功，2代表用户名已存在
     * string message 注册提示信息
     * int code
     */
    public function reg($nickname,$password){
        $result=$this->validate(
            [
                'nickname'=>$nickname,
                'password'=>$password,
            ],
            [
                'nickname'=>'require|max:20',
                'password'=>'require|max:35',
            ]
        );
        if(true!==$result):
            return ['ret'=>200,'data'=>null,'message'=>'用户名或密码格式错误'];
        endif;
        $data=array(
            'nickname'=>$nickname,
            'password'=>$password,
        );
        $re['uid']=0;
        $re['code']=0;
        $message='操作完成';
        $model=new UserModel();
        $nicknameExist=$model->nicknameExist($nickname);
        if(!$nicknameExist):
            $re=$model->reg($data);
            $_SESSION['nickname']=$nickname;
            $_SESSION['uid']=$re['uid'];
            $_SESSION['password']=$password;
        else:
            $re['code']=2;
            $message='用户名已存在';
        endif;
        $api=['ret'=>200,'data'=>$re,'message'=>$message];
        return $api;
    }

    /**
     * 用户登陆接口
     * @param $nickname
     * @param $password
     * @return array
     * int data 登陆状态码 1代表成功 0代表失败
     * string message 登陆信息
     * int code
     */
    public function login($nickname,$password){
/*        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
        header('Access-Control-Allow-Methods: GET, POST, PUT');*/
        $result=$this->validate(
            [
                'nickname'=>$nickname,
                'password'=>$password,
            ],
            [
                'nickname'=>'require|max:20',
                'password'=>'require|max:35',
            ]
        );
        if(true!==$result):
            return ['ret'=>200,'data'=>null,'message'=>'用户名或密码格式错误'];
        endif;
        $data=array(
            'nickname'=>$nickname,
            'password'=>$password,
        );
        $model=new UserModel();
        $re=$model->login($data);
        if($re['code']):
            $message='登陆成功';
            $_SESSION['nickname']=$nickname;
            $_SESSION['uid']=$re['uid'];
            $_SESSION['password']=$password;
        else:
            $message='用户名或密码错误';
        endif;
        $api=['ret'=>200,'data'=>$re,'message'=>$message];
        return $api;
    }










}