<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use App\models\Base;

class Address extends Base
{
    //
    protected $table = 'address';
    public $timestamps = false;

    public function __construct()
    {
        parent::__construct();
    }
}
