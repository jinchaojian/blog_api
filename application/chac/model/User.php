<?php
namespace app\chac\model;

use think\DB;
use think\Model;

class User extends Model
{
    public function index(){
        $a=Db::query('select * from user_base');
        dump($a);
        return null;
    }

}