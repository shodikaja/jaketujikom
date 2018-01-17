<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use App\Header;
use Session;
use Illuminate\Support\Facades\File;
use App\Http\Requests\StoreBookRequest;

class HeaderController extends Controller
{
   public function index(Request $request, Builder $htmlBuilder)
    {
        $Header = Header::all();

     if ($request->ajax()) {
$Header = Header::select(['id','text_besar','text_kecil','background']);
        return Datatables::of($Header)
        ->addColumn('background', function($Header){
            return '<img src="/img/img6/'.$Header->background. '" height="100px" width="200px">';
        })
               ->addColumn('action', function($Header){
            return view('datatable._action', [
                'model'=> $Header,
                'edit_url'=> route('Header.edit', $Header->id)
                ]);
        })->make(true);
    }
 
    $html = $htmlBuilder
    ->addColumn(['data' => 'text_besar', 'name'=>'text_besar', 'title'=>'Text Besar'])
    ->addColumn(['data' => 'text_kecil', 'name'=>'text_kecil', 'title'=>'Text Kecil'])
    ->addColumn(['data' => 'background', 'name'=>'background', 'title'=>'Background'])
    ->addColumn(['data' => 'action', 'name'=>'action', 'title'=>'', 'orderable'=>false, 'searchable'=>false]);
    return view('Header.index')->with(compact('Header','html'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
           $Header = Header::find($id);
        return view('Header.edit')->with(compact('Header'));
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function update(Request $request, $id)
    {
        $this->validate($request, ['text_besar' => 'required|unique:headers,text_besar,'. $id,
            'text_kecil' => 'required|unique:headers,text_kecil,'. $id,
            'background'=> 'image|max:2048'
            ]);
        $poto = Header::find($id);
        $poto->update($request->all());
        if ($request->hasFile('background')) {
// menambil cover yang diupload berikut ekstensinya
            $filename = null;
            $uploaded_background = $request->file('background');
// mengambil extension file
            $extension = $uploaded_background->getClientOriginalExtension();
// membuat nama file random dengan extension
            $filename = md5(time()) . '.' . $extension;
// menyimpan cover ke folder public/img
            $destinationPath = public_path() . DIRECTORY_SEPARATOR . 'img/img6';
// memindahkan file ke folder public/img
            $uploaded_background->move($destinationPath, $filename);
// hapus cover lama, jika ada
            if ($poto->background) {
                $old_cover = $poto->background;
                $filepath = public_path() . DIRECTORY_SEPARATOR . 'img/img6'
                . DIRECTORY_SEPARATOR . $poto->background;
                try {
                    File::delete($filepath);
                } catch (FileNotFoundException $e) {
// File sudah dihapus/tidak ada
                }
            }

            // ganti field cover dengan cover yang baru
            $poto->background = $filename;
            $poto->save();
        }
        Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Berhasil Menyimpan Data"
            ]);
        return redirect()->route('Header.index');
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
            