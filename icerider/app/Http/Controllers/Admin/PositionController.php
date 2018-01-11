<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\models\Admin;
use App\models\Region;

class PositionController extends Controller
{
    public function index()
    {
        return view('admin/position/index');
    }

    public function create()
    {
        return view('admin/position/create');
    }
}
