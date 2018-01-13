<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use App\models\Base;

class Position extends Base
{
    //
    protected $table = 'position';
    public $timestamps = false;

    public function __construct()
    {
        parent::__construct();
    }
}
