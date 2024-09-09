<?php

namespace App\Http\Controllers\Admin\Router;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\General;
use App\Models\Router\Setting;
use Sabberworm\CSS\Settings;
use MikrotikAPI\Talker\Talker;
use MikrotikAPI\Commands\IP\Hotspot\HotspotUserProfiles;

class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $judul = ' Settings';
        $generals = General::find(1);
        $settings = Setting::all();

        // $talker = new Talker(
        //     'host' => config('services.mikrotik.host'),
        //     'user' => config('services.mikrotik.user'),
        //     'pass' => config('services.mikrotik.pass'),
        // );
        // $profiles = new HotspotUserProfiles($talker);
        // dd($profiles);
        // Create "where" Query object for RouterOS
        // $query =
        //     (new Talker('/ip/address/print'));

        // Send query and read response from RouterOS
        // $response = $client->Talker($query)->read();

        // return view('testing', compact('response'));

        // $talker = Talker::create('192.168.88.1', 'admin', 'BlankOne123');
        // $profiles = new HotspotUserProfiles($talker);
        // dd($profiles);

        // var_dump($this->$talker->getAll());


        // $badans = Badan::all();
        // $s = $this->
        // return view('back.mikrotik.setting', compact('judul', 'generals', 'settings'));
    }

    public function addrouter()
    {
        $judul = ' Add Router';
        $generals = General::find(1);
        // $badans = Badan::all();
        return view('back.mikrotik.addrouter', compact('judul', 'generals'));
    }

    public function editrouter()
    {
        $judul = ' Edit Router';
        $generals = General::find(1);
        // $badans = Badan::all();
        return view('back.mikrotik.addrouter', compact('judul', 'generals'));
    }

    public function store(Request $request)
    {
        $judul = ' Add Router';
        $generals = General::find(1);

        $this->validate($request, [
            'image' => 'image|mimes:jpg,png,jpeg'
        ]);

        if (!$file = $request->file('image')) {

            $data = new Setting();
            $data->session_name = $request->session_name;
            $data->ip_mikrotik = $request->ip_mikrotik;
            $data->username = $request->username;
            $data->password = $request->password;
            $data->port = $request->port;
            // $data->user_id = $request->user_id;
            $data->hotspot_name = $request->hotspot_name;
            $data->dns_name = $request->dns_name;
            $data->currency = $request->currency;
            $data->session_timeout = $request->session_timeout;
            $data->live_reportsession_timeout;
            $data->phone = $request->phone;
            // $data->image = $request->image;
            $data->save();

            return redirect('/admin/setting')->with('success', 'berhasil disimpan');
            // return view('back.mikrotik.addrouter', compact('judul', 'generals', 'data'));
        } else {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = $request->id . time() . "." . $ext;
            $tujuan_upload = 'data_file';
            $file->move($tujuan_upload, $filename);

            $data = new Setting();
            $data->session_name = $request->session_name;
            $data->ip_mikrotik = $request->ip_mikrotik;
            $data->username = $request->username;
            $data->password = $request->password;
            $data->port = $request->port;
            // $data->user_id = $request->user_id;
            $data->hotspot_name = $request->hotspot_name;
            $data->dns_name = $request->dns_name;
            $data->currency = $request->currency;
            $data->session_timeout = $request->session_timeout;
            $data->live_reportsession_timeout;
            $data->phone = $request->phone;
            $data->image = $request->filename;
            $data->save();

            return redirect('/admin/setting')->with('success', 'berhasil disimpan');
        }
    }
}
