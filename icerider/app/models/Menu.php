<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use App\models\Base;

class Menu extends Base
{
    protected $table = 'menu';
    public $timestamps = false;

    public function __construct()
    {
        parent::__construct();
    }

    public function readMenu($pid=0){
        $menu = $this->readWhere([['pid',$pid],['is_menu',1]]);
        if(empty($menu)){
            return $menu;
        }
        foreach($menu as $key=>$value){
            $menu[$key]['son'] = $this->readMenu($value['id']);
        }
        return $menu;
    }
}
