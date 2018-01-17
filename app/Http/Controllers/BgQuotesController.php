<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use App\background_quotes;
use Session;
use Illuminate\Support\Facades\File;
use App\Http\Requests\StoreBookRequest;

class BgQuotesController extends Controller
{
 
   public function index(Request $request, Builder $htmlBuilder)
    {
        $bgquotes = background_quotes::all();

     if ($request->ajax()) {
        $bgquotes = background_quotes::select(['id','text','background']);
        return Datatables::of($bgquotes)
        ->addColumn('background', function($bgquotes){
            return '<img src="/img/img5/'.$bgquotes->background. '" height="100px" width="200px">';
        })
               ->addColumn('action', function($bgquotes){
            return view('datatable._action', [
                'model'=> $bgquotes,
                'edit_url'=> route('bgquotes.edit', $bgquotes->id)
                ]);
        })->make(true);
    }
 
    $html = $htmlBuilder
    ->addColumn(['data' => 'background', 'name'=>'background', 'title'=>'Background'])
    ->addColumn(['data' => 'action', 'name'=>'action', 'title'=>'', 'orderable'=>false, 'searchable'=>false]);
    return view('background_quotes.index')->with(compact('bgquotes','html'));
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
           $bgquotes = background_quotes::find($id);
        return view('background_quotes.edit')->with(compact('bgquotes'));
    
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
        $this->validate($request, ['text' => 'required|unique:background_quotes,text,'. $id,
            'background'=> 'image|max:2048'
            ]);
        $poto = background_quotes::find($id);
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
            $destinationPath = public_path() . DIRECTORY_SEPARATOR . 'img/img5';
// memindahkan file ke folder public/img
            $uploaded_background->move($destinationPath, $filename);
// hapus cover lama, jika ada
            if ($poto->background) {
                $old_cover = $poto->background;
                $filepath = public_path() . DIRECTORY_SEPARATOR . 'img/img5'
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
        return redirect()->route('bgquotes.index');
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
            