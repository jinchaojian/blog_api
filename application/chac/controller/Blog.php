<?php


namespace app\chac\controller;
use app\chac\model\BlogBase as BlogBase;
use \think\Controller;

session_start();
class Blog extends Controller
{
    public function publish($title,$content){
        $data=array(
            'uid'=>$_SESSION['uid'],
            'title'=>$title,
            'content'=>$content,
        );
        $re=null;
        if(!$data['uid']){
            return $api=['code'=>401,'data'=>$re,'message'=>'未登录'];
        }
        $blog=new BlogBase();
        $re=$blog->publish($data);
        return $re;
    }

    public function getIndexBlog(){
        $blog=new BlogBase();
        $re=$blog->getIndexBlog();
        return $re;
    }



}