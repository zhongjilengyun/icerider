<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\models\Admin;
use App\models\Region;
use App\models\Address;
use App\models\City;
use App\models\Filiale;


class FilialeController extends Controller
{
    public function index()
    {
        $data['filiale'] = $this->getFiliale();
        $data['region'] = $this->getRegion();
        $data['province'] = $this->getProvince(false);
        $data['city'] = $this->getCity();
        return view('admin/filiale/index',$data);
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

    /**
     * 获取省份
     * @param bool $display
     * @return array
     */
    public function getProvince($display=true)
    {
        $bianhao = empty(Input::get('bianhao'))?0:Input::get('bianhao');
//        $bianhao=0;
        $address = new Address();
        if($bianhao===0){
            $data = $address->readWhere([['bianhao','like','___']]);
        }else{
            $data = $address->readWhere([['bianhao','like',$bianhao.'___']]);
        }
        if(!$display){
            return $data;
        }else{
            echo json_encode($data);
        }
    }

    /**
     * 获取城市
     * @return array
     */
    public function getCity()
    {
        $city = new Address();
        $data = $city->readWhere([['bianhao','like','______']]);
        return $data;
    }

    public function getFiliale(){
        $region = new Filiale();
        $data = $region->read();
        return $data;
    }

    public function getAdmin()
    {
        $region = new Admin();
        $data = $region->read();
        return $data;
    }


}
