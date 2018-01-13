<?php

namespace App\Http\Controllers\Admin;

use App\models\Filiale;
use App\models\Position;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\models\Admin;
use App\models\Region;
use App\models\Address;
use App\models\City;
use App\models\Rank;
use App\models\Menu;
use DB;

class AdminController extends Controller
{
    /**
     * 首页展示
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $data['region'] = $this->getRegion(false);
        $data['province'] = $this->getProvince(false);
        $data['city'] = $this->getCity();
        $data['filiale'] = $this->getFiliale();
        $data['admin'] = $this->getAdmin();

        return view('admin/admin/index',$data);
    }

    /**
     * 展示添加页面
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $data['region'] = $this->getRegion(false);
        $data['province'] = $this->getProvince(false);
        $data['city'] = $this->getCity();
        $data['filiale'] = $this->getFiliale();
        $data['position'] = $this->getPosition();
        $data['rank'] = $this->getRank();
        $data['menu'] = $this->getMenu();

        return view('admin/admin/create',$data);
    }

    public function add()
    {
        $arr =Request()->input();
        unset($arr['_token']);
        $arr['entering'] = 'liushengjie';
        $arr['entering_time'] = date('Y-m-d H:i:s');
        $arr['status'] = 0;
        $admin = new Admin();
        $data = $admin->add($arr);
        return redirect('/admin/adminIndex');
    }

    public function del(){
        $str = Input::get('id');
        $ids = explode(',',$str);
        $region = new Admin();
        echo $region->del($ids);
    }

    public function editStatus()
    {
        $str = Input::get('id');
        $ids = explode(',',$str);
        $status = Input::get('status');
        $row = DB::table('admin')->whereIn('id',$ids)->update(array('status'=>$status));
        return $row;
    }

    public function getMenu(){
        $region = new Menu();
        $data = $region->readMenu();
        return $data;
    }

    /**
     * 获取大区
     * @param bool $display
     * @return array
     */
    protected function getRegion($display=true)
    {
        $region = new region();
        $data = $region->read();
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

    public function getPosition()
    {
        $region = new Position();
        $data = $region->read();
        return $data;
    }

    public function getRank()
    {
        $rank = new Rank();
        return $rank->read();
    }

    public function getAdmin(){
        $admin = new Admin();
        $filiale = new Filiale();
        $address = new Address();
        $region = new Region();
        $position = new Position();
        $data = $admin->read();

        foreach($data as $key=>$val){
            $provinceWhere = [['bianhao',$val['province']]];
            $cityWhere = [['bianhao',$val['city']]];
            $regionWhere = [['id',$val['area_id']]];
            $filialeWhere = [['id',$val['company_id']]];
            $positionWhere = [['id',$val['position']]];
            $province = $address->one($provinceWhere);
            $city = $address->one($cityWhere);
            $area = $region->one($regionWhere);
            $company = $filiale->one($filialeWhere);
            $position1 = $position->one($positionWhere);
            $data[$key]['province'] = $province['address'];
            $data[$key]['city'] = $city['address'];
            $data[$key]['area_id'] = $area['region_name'];
            $data[$key]['company_id'] = $company['filiale'];
            $data[$key]['position'] = $position1['position'];

        }
        return $data;
    }

}
