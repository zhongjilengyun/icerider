<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\models\Admin;
use App\models\Region;

class RegionController extends Controller
{
    public function index()
    {
        return view('admin/region/index');
    }

    public function create()
    {
        return view('admin/region/create');
    }
}
