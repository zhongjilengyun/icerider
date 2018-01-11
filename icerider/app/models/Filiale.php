<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use App\models\Base;

class Filiale extends Base
{
    protected $table = 'filiale';
    public $timestamps = false;

    public function __construct()
    {
        parent::__construct();
    }
}
