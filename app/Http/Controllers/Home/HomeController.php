<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Device;

class HomeController extends Controller
{
    public function index() {
        $devices = Device::all();
        return view('home.index', compact('devices'));
    }

    public function detail() {
        return view('home.detail');
    }
}
