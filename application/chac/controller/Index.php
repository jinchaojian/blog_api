<?php
namespace app\chac\controller;
use \app\chac\model\User as User;

class Index
{
    public function index($name)
    {
/*        $b=new \app\chac\model\user;
        $c=$b->index();*/
        $b=new user();
        $b->index();
        $a[0]=$name;
        return $a[0];
    }
}
