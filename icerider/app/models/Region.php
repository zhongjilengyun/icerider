<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use App\models\Base;
use DB;

class Region extends Base
{
    //
    protected $table = 'region';
    public $timestamps = false;

    public function __construct()
    {
        parent::__construct();
    }
    public function selWhere($where)
    {
        $data = DB::select('select * from ice_region where '.$where);
        return $data;
    }
}
