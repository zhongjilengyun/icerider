<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use App\models\Base;

class Rank extends Base
{
    //
    protected $table = 'rank';
    public $timestamps = false;

    public function __construct()
    {
        parent::__construct();
    }
}
