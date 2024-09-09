<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\General;
use App\Models\Team;
use App\Models\Categoryteam;

class TeamController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $judul = 'Team';
        $generals = General::find(1);
        $teams = Team::all();
        return view('back.team.index', compact('judul', 'generals', 'teams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $judul = 'Team Create';
        $generals = General::find(1);
        $categoryteams = Categoryteam::all();
        return view('back.team.create', compact('judul', 'generals', 'categoryteams'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name = $request->title ; 
        $spons = Team::where('title',$name)->first();

        if ($spons) {           
            return redirect('/admin/team/create')->with('message','Data Sudah Ada');
            
        }
        else{
            $content = $request->deskripsi;
            $dom = new \DomDocument();
            $dom->loadHtml($content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
            $imageFile = $dom->getElementsByTagName('imageFile');
        
            foreach($imageFile as $item => $image){
                $data = $img->getAttribute('src');
                list($type, $data) = explode(';', $data);
                list(, $data)      = explode(',', $data);
                $imgeData = base64_decode($data);
                $image_name= 'upload_file' . time().$item.'.png';
                $path = public_path() . $image_name;
                file_put_contents($path, $imgeData);
                
                $image->removeAttribute('src');
                $image->setAttribute('src', $image_name);
                }
        
            $content = $dom->saveHTML();

            if (!$file = $request->file('image')) {
                $data = new Team();
                $data->title = $request->title;
                $data->deskripsi = $content ;

                $data->category_id = $request->category_id;
                $data->url = $request->url;            
                $data->save();           
                return redirect('/admin/team')->with('success','Data Berhasil di Simpan');
           
            } else {
                $file = $request->file('image');
                $name = $file->getClientOriginalName();
                $filename = $name;  
                $tujuan_upload = 'data_file';
                $file->move($tujuan_upload,$filename);
                $data = new Team();
                $data->title = $request->title;
                $data->deskripsi = $content ;

                $data->category_id = $request->category_id;
                $data->url = $request->url; 
                $data->image = $filename;            
                $data->save();           
                return redirect('/admin/team')->with('success','Data Berhasil di Simpan');
           
            }
        }   
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $judul = 'Team Show';
        $generals = General::find(1);
        $teams = Team::find($id);
        $categoryteams = Categoryteam::all();
        return view('back.team.show', compact('judul', 'generals', 'categoryteams', 'teams'));//
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $judul = 'Team Edit';
        $generals = General::find(1);
        $teams = Team::find($id);
        $categoryteams = Categoryteam::all();
        return view('back.team.edit', compact('judul', 'generals', 'categoryteams', 'teams'));
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
        $content = $request->deskripsi;
        $dom = new \DomDocument();
        @$dom->loadHtml($content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $imageFile = $dom->getElementsByTagName('imageFile');
    
        foreach($imageFile as $item => $image){
            $data = $img->getAttribute('src');
            list($type, $data) = explode(';', $data);
            list(, $data)      = explode(',', $data);
            $imgeData = base64_decode($data);
            $image_name= 'upload_file' . time().$item.'.png';
            $path = public_path() . $image_name;
            file_put_contents($path, $imgeData);
            
            $image->removeAttribute('src');
            $image->setAttribute('src', $image_name);
            }
    
        $content = $dom->saveHTML();

        if (!$file = $request->file('image')) {
            $data = Team::where('id','=', $request->id)->first();
            $data->title = $request->title;
            $data->deskripsi = $content ;
            $data->category_id = $request->category_id;
            $data->url = $request->url;            
            $data->save();           
            return redirect('/admin/team')->with('success','Data Berhasil di Simpan');
       
        } else {
            $file = $request->file('image');
            $name = $file->getClientOriginalName();
            $filename = $name;  
            $tujuan_upload = 'data_file';
            $file->move($tujuan_upload,$filename);
            $data = Team::where('id','=', $request->id)->first();
            $data->title = $request->title;
            $data->deskripsi = $content ;
            $data->category_id = $request->category_id;
            $data->url = $request->url; 
            $data->image = $filename;            
            $data->save();           
            return redirect('/admin/team')->with('success','Data Berhasil di Simpan');
       
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
        $data = Team::find($id);
        $data->delete($data);
        return redirect('/admin/team')->with('success', 'Data Berhasil Dihapus');
    }

    public function publish($id)
    {       
        $teams = Team::find($id);
        $teams->is_published = !$teams->is_published;
        $teams->save();  
        return redirect('/admin/team');
    }
}
