<?php

namespace app\chac\model;
use think\Model;

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

}