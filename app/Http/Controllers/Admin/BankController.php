<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\General;
use App\Models\Bank;
use App\Models\Accountbank;

class BankController extends Controller
{
    public function store(Request $request)
    {
        $gen = General::first();
        $data = new Accountbank();
        $data->general_id = $gen->id;
        $data->bank_id = $request->bank_id;
        $data->no_rek = $request->no_rek;
        $data->pemilik = $request->pemilik;
        $data->save();           
        return redirect('/admin/general')->with('success','Data Berhasil di Simpan');
    }

    public function update(Request $request)
    {
        $gen = General::first();
        $data = Accountbank::where('id','=', $request->id)->first();
        $data->general_id = $gen->id;
        $data->bank_id = $request->bank_id;
        $data->no_rek = $request->no_rek;
        $data->pemilik = $request->pemilik;
        $data->save();           
        return redirect('/admin/general')->with('success','Data Berhasil di Simpan');
    }

    public function destroy($id)
    {
        $data = Accountbank::find($id);
        $data->delete($data);
        return redirect('/admin/general')->with('success', 'Data Berhasil Dihapus');
    }
}
