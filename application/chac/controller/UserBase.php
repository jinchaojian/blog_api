<?php
namespace app\chac\controller;
use \app\chac\model\UserBase as ModelUser;
//use \app\chac\common\DataFromate as DataFormate;

class UserBase
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
    public function reg($nickname,$password){
        $data=array(
            'nickname'=>$nickname,
            'password'=>$password,
        );
        $re=0;
        $model=new ModelUser();
       // $data_formate=new \app\chac\common\DataFromate();

        $nicknameExist=$model->nicknameExist($nickname);
        if(!$nicknameExist):
            $re=$model->reg($data);
        endif;
      //  $data_formate->data=$re;
        return $re;
    }

}