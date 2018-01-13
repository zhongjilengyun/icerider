<?php

namespace App\Http\Controllers\Admin;

use App\models\Menu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\models\Admin;
use App\models\Region;
use App\models\Position;

class PositionController extends Controller
{
    public function index()
    {
        $data['position'] = $this->getPosition();
        return view('admin/position/index',$data);
    }

    public function add()
    {
        $arr['position']=Request()->input('position');
        $arr['enter_name'] = 'liushengjie';
        $arr['enter_time'] = date('Y-m-d H:i:s');
        $region = new Position();
        $data = $region->add($arr);
        return redirect('/admin/postIndex');

    }

    public function del(){
        $str = Input::get('id');
        $ids = explode(',',$str);
        $region = new Position();
        echo $region->del($ids);
    }

    public function upd()
    {
        $id = Input::get('id');
        $region = new Position();
        $data = $region->one([['id',$id]]);
        echo json_encode($data);
    }

    public function update()
    {
        $id = Request()->input('id');
        $arr['position'] = Request()->input('position');
        $region = new Position();
        $data = $region->upd(['id'=>$id],$arr);
        return redirect('/admin/postIndex');
    }

    public function auth()
    {
        $data['auth'] = $this->getAuth();
        $data['position'] = Request()->input('position');
        return view('admin/position/distribution',$data);
    }

    public function getRegion(){
        $Region = new Region();
        $data = $Region->read();
        return $data;
    }

    public function getPosition()
    {
        $position = new Position();
        $data = $position->read();
        return $data;
    }

    public function getAuth()
    {
        $auth = new Menu();
        $data = $auth->readAuth();
        return $data;
    }

}
