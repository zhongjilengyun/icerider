<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\models\Admin;
use App\models\Region;

class CityController extends Controller
{
    public function index()
    {
        return view('admin/city/index');
    }

    public function create()
    {
        return view('admin/city/create');
    }
}
