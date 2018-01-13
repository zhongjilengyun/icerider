<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use App\models\Base;
use DB;

class Filiale extends Base
{
    protected $table = 'filiale';
    public $timestamps = false;

    public function __construct()
    {
        parent::__construct();
    }

    public function sel()
    {
        $data = DB::table($this->table)
            ->join('ice_address', 'province', '=', 'bianhao')
            ->get();
        return $data;
    }
}
