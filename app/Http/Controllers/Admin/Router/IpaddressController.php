<?php

namespace App\Http\Controllers\Admin\Router;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\General;

class IpaddressController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $judul = ' IP Address';
        $generals = General::find(1);
        // $badans = Badan::all();
        return view('back.mikrotik.ipaddress', compact('judul', 'generals'));
    }
}
