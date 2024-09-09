<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\General;
use App\Models\Service;
use App\Models\Categoryservice;

class ServiceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $judul = 'Service';
        $generals = General::find(1);
        $services = Service::all();
        return view('back.service.index', compact('judul', 'generals', 'services'));
    }

    public function data(Request $request)
    {
        $categoryproduct_id = $request->categoryproduct_id;
        $subcategory = SubCategory::where('categoryproduct_id', '=', $categoryproduct_id)->get();
        return response()->json($subcategory);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $judul = 'Service Create';
        $generals = General::find(1);
        $categoryservices = Categoryservice::all();
        return view('back.service.create', compact('judul', 'generals', 'categoryservices'));
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
        $spons = Service::where('title',$name)->first();

        if ($spons) {           
            return redirect('/admin/service/create')->with('message','Data Sudah Ada');
            
        }
        else{
            if (!$file = $request->file('image')) {
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

                $data = new Service();
                $data->title = $request->title;
                $data->deskripsi = $content;
                // $data->expend = $request->expend;
                $data->categoryservice_id = $request->categoryservice_id;
                $data->url = $request->url;            
                $data->save();           
                return redirect('/admin/service')->with('success','Data Berhasil di Simpan');
           
            } else {
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
                $file = $request->file('image');
                $name = $file->getClientOriginalName();
                $filename = $name;  
                $tujuan_upload = 'data_file';
                $file->move($tujuan_upload,$filename);
                $data = new Service();
                $data->title = $request->title;
                $data->deskripsi = $content;
                // $data->expend = $request->expend;
                $data->categoryservice_id = $request->categoryservice_id;
                $data->url = $request->url; 
                $data->image = $filename;            
                $data->save();           
                return redirect('/admin/service')->with('success','Data Berhasil di Simpan');
           
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
        $judul = 'Service Show';
        $generals = General::find(1);
        $services = Service::find($id);
        $categoryservices = Categoryservice::all();
        return view('back.service.show', compact('judul', 'generals', 'categoryservices', 'services'));//
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $judul = 'Service Edit';
        $generals = General::find(1);
        $services = Service::find($id);
        $categoryservices = Categoryservice::all();
        return view('back.service.edit', compact('judul', 'generals', 'categoryservices', 'services'));
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
        if (!$file = $request->file('image')) {
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

            $data = Service::where('id','=', $request->id)->first();
            $data->title = $request->title;
            $data->deskripsi = $content;
            // $data->expend = $request->expend;
            $data->categoryservice_id = $request->categoryservice_id;
            $data->url = $request->url;            
            $data->save();           
            return redirect('/admin/service')->with('success','Data Berhasil di Simpan');
       
        } else {
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

            $file = $request->file('image');
            $name = $file->getClientOriginalName();
            $filename = $name;  
            $tujuan_upload = 'data_file';
            $file->move($tujuan_upload,$filename);
            $data = Service::where('id','=', $request->id)->first();
            $data->title = $request->title;
            $data->deskripsi = $content;
            $data->categoryservice_id = $request->categoryservice_id;
            $data->url = $request->url; 
            $data->image = $filename;            
            $data->save();           
            return redirect('/admin/service')->with('success','Data Berhasil di Simpan');
       
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
        $data = Service::find($id);
        $data->delete($data);
        return redirect('/admin/service')->with('success', 'Data Berhasil Dihapus');
    }

    public function publish($id)
    {       
        $services = Service::find($id);
        $services->is_published = !$services->is_published;
        $services->save();  
        return redirect('/admin/service');
    }
}
