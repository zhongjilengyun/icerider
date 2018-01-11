<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use App\models\Base;

class Admin extends Base
{
    //
    protected $table = 'admin';
    public $timestamps = false;

    public function __construct()
    {
        parent::__construct();
    }
}
