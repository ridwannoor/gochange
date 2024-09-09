<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\General;
use App\Models\Bank;
use App\Models\Accountbank;
class GeneralController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $judul = 'General' ;
        $generals = General::find(1);
        $banks = Bank::all();
        $accountbanks = Accountbank::all();
        // dd($generals);
        return view('back.general.index', compact('judul','generals', 'banks', 'accountbanks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function permission(Request $request)
    {
        $generals = General::where('id','=', $request->id)->first();
        $generals->service = $request->service;
        $generals->portfolio = $request->portfolio;
        $generals->team = $request->team;
        $generals->slider = $request->slider;
        $generals->testimoni = $request->testimoni;
        $generals->blog = $request->blog;
        $generals->product = $request->product;
        $generals->gallery = $request->gallery;
        $generals->video = $request->video;
        $generals->banner = $request->banner;
        $generals->sponsor = $request->sponsor;
        $generals->save();

        return redirect()->back()->with('success', 'permission berhasil diperbarui');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $judul = 'General Edit' ;
        $generals = General::find(1);
        // dd($generals);
        return view('back.general.edit', compact('judul','generals'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'image' => 'image|mimes:jpg,png,jpeg'
        ]);

        if (!$file = $request->file('image')) {
            $generals = General::where('id', $request->id)->first();
            $generals->title = $request->title ;
            $generals->deskripsi = $request->deskripsi ;
            $generals->phone = $request->phone ;
            $generals->alamat = $request->alamat ;
            $generals->email = $request->email ;
            $generals->website = $request->website ;
            $generals->facebook = $request->facebook ;
            $generals->whatsapp = $request->whatsapp ;
            $generals->instagram = $request->instagram ;
            // $generals->image = $filename ;
            $generals->save();    
            return redirect('/admin/general')->with('success', 'Data Berhasil diperbarui');
        } else {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = $request->id.time().".".$ext; 
            $tujuan_upload = 'data_file';
            $file->move($tujuan_upload,$filename);

            $generals = General::where('id', $request->id)->first();
            $generals->title = $request->title ;
            $generals->deskripsi = $request->deskripsi ;
            $generals->phone = $request->phone ;
            $generals->alamat = $request->alamat ;
            $generals->email = $request->email ;
            $generals->website = $request->website ;
            $generals->facebook = $request->facebook ;
            $generals->whatsapp = $request->whatsapp ;
            $generals->instagram = $request->instagram ;
            $generals->image = $filename ;
            $generals->save();
    
            return redirect('/admin/general')->with('success', 'Data Berhasil diperbarui');
        }        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
