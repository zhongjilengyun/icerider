<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use App\models\Base;

class Region extends Base
{
    //
    protected $table = 'region';
    public $timestamps = false;

    public function __construct()
    {
        parent::__construct();
    }
}
