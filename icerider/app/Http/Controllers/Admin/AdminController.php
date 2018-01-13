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

    public function getAdmin()
    {
        $region = new Admin();
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

}
