<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\models\Admin;
use App\models\Region;
use App\models\Address;

class AdminController extends Controller
{
    public function index()
    {
        $data['region'] = $this->getRegion(false);
        $data['province'] = $this->getProvince(false);
        return view('admin/admin/index',$data);
    }

    public function create()
    {
        return view('admin/admin/create');
    }


    protected function getRegion($display=true)
    {
        $region = new region();
        $data = $region->read();
        return $data;

    }
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

}
