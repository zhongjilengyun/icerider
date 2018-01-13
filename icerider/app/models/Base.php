<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Base extends Model
{
    public function read()//查
    {
        return $this->all()->toArray();
    }
    public function readWhere($data)//多条件查询
    {
        return $this->where($data)->get()->toArray();
    }

    public function one($data)
    {
        return $this->where($data)->first()->toArray();
    }
    public function del($id){
        //删除
        return DB::table($this->table)->whereIn('id',$id)->delete();
    }

    public function upd($where,$data)//改
    {
        return DB::table($this->table)->where($where)->update($data);
    }
    public function add($data)//增
    {
        return DB::table($this->table)->insertGetId($data);
    }

}
