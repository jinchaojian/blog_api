<?php

namespace app\chac\model;
use think\Model;
use think\DB;

class Blog extends Model
{
    public function category()
    {
        return $this->hasOne('Category','category_id');
    }
    public function publish($data)
    {
        $time = date('Y-m-d H:i:s',time());
        $blog=new Blog([
            'user_base_id'=>$data['uid'],
            'title'=>$data['title'],
            'content'=>$data['content'],
            'create_time'=>$time
        ]);
        $blog->save();
    }

    public function getIndexBlog($pn)
    {
        $page=5;
        if(!$pn):
            $pn=0;
        else:
            $pn=$pn*5;
        endif;
        $sql='SELECT * FROM blog LEFT JOIN category ON blog.category_id=category.category_id '.
            "LIMIT $page OFFSET $pn";

        $data=Db::query($sql);
        return  $data;
    }

}