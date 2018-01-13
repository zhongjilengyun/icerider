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
        $arr =Request()->input();
        unset($arr['_token']);
        $arr['entering'] = 'liushengjie';
        $arr['enter_time'] = date('Y-m-d H:i:s');
        $filiale = new Filiale();
        $data = $filiale->add($arr);
        return redirect('/admin/filialeIndex');

    }

    public function del(){
        $str = Input::get('id');
        $ids = explode(',',$str);
        $region = new Filiale();
        echo $region->del($ids);
    }

    public function upd()
    {
        $id = Input::get('id');
        $region = new Filiale();
        $data['filiale'] = $region->one([['id',$id]]);
        $data['region'] = $this->getRegion();
        $data['province'] = $this->getProvince(false);
        $data['city'] = $this->getCity();
        echo json_encode($data);
    }

    public function update()
    {
        $arr = Request()->input();
        unset($arr['_token']);
        $id = $arr['filiale_id'];
        unset($arr['filiale_id']);
        $region = new Filiale();
        $data = $region->upd(['id'=>$id],$arr);
        return redirect('/admin/filialeIndex');
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
        $filiale = new Filiale();
        $address = new Address();
        $region = new Region();
        $data = $filiale->read();

        foreach($data as $key=>$val){
            $provinceWhere = [['bianhao',$val['province']]];
            $cityWhere = [['bianhao',$val['city']]];
            $regionWhere = [['id',$val['region']]];
            $province = $address->one($provinceWhere);
            $city = $address->one($cityWhere);
            $region1 = $region->one($regionWhere);
            $data[$key]['province'] = $province['address'];
            $data[$key]['city'] = $city['address'];
            $data[$key]['region'] = $region1['region_name'];
        }
        return $data;
    }

    public function getAdmin()
    {
        $region = new Admin();
        $data = $region->read();
        return $data;
    }


}
