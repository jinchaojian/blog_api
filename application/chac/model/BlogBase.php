<?php

namespace app\chac\model;
use think\Model;
use think\DB;

class BlogBase extends Model
{
    public function publish($data){
        $time = date('Y-m-d H:i:s',time());
        $blog=new BlogBase([
            'user_base_id'=>$data['uid'],
            'title'=>$data['title'],
            'content'=>$data['content'],
            'create_time'=>$time
        ]);
        $blog->save();
    }

    public function getIndexBlog(){
        $data=Db::table('blog_base')->where('id',1)->find();
        print_r($data);
        return  $data;
    }

}