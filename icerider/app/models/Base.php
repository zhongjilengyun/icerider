<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

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
    public function one($key,$val)
    {
        return $this->where($key,$val)->first()->toArray();
    }
    public function del($data)//删
    {
        $country = $this->where($data);
        return $country->delete();
    }
    public function upd($data,$list,$arr)//改
    {
        $country = $this->where($data,$list);
        return $country->update($arr);
    }
    public function add($data)//增
    {
        return DB::table('country')->insertGetId($data);
    }

}
