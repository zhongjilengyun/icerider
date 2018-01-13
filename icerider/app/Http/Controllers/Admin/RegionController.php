<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\models\Admin;
use App\models\Region;
use DB;
class RegionController extends Controller
{
    public function index()
    {
        $data['region'] = $this->getRegion();
        return view('admin/region/index',$data);
    }

    public function add()
    {
        $arr['region_name']=Request()->input('region_name');

        $arr['entering'] = 'liushengjie';
        $arr['enter_time'] = date('Y-m-d H:i:s');
        $region = new Region();
        $data = $region->add($arr);
        return redirect('/admin/regionIndex');

    }

    public function del(){
        $str = Input::get('id');
        $ids = explode(',',$str);
        $region = new Region();
        echo $region->del($ids);
    }

    public function upd()
    {
        $id = Input::get('id');
        $region = new Region();
        $data = $region->one([['id',$id]]);
        echo json_encode($data);
    }

    public function update()
    {
        $id = Request()->input('region_id');
        $arr['region_name'] = Request()->input('region_name');
        $region = new Region();
        $data = $region->upd(['id'=>$id],$arr);
        return redirect('/admin/regionIndex');
    }

    public function getRegion(){
        $Region = new Region();
        $data = $Region->read();
        return $data;
    }

}
