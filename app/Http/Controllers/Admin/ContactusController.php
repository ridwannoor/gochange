<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\General;
use App\Models\Contactus;
// use App\Models\Badan;

class ContactusController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $judul = 'Contact Us';
        $generals = General::find(1);
        $contactus = Contactus::all();
        return view('back.contactus.index', compact('judul', 'generals', 'contactus'));
    }

}
