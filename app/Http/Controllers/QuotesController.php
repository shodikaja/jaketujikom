<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use App\quotes;
use Session;
use Illuminate\Support\Facades\File;
use App\Http\Requests\StoreBookRequest;


class QuotesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Builder $htmlBuilder)
    {
        $quotes = quotes::all();

     if ($request->ajax()) {
        $quotes = quotes::select(['id','text']);
        return Datatables::of($quotes)
        ->addColumn('action', function($quotes){
            return view('datatable._action', [
                'model'=> $quotes,
                'edit_url'=> route('quotes.edit', $quotes->id)
                ]);
        })->make(true);
    }
 
    $html = $htmlBuilder
    ->addColumn(['data' => 'text', 'name'=>'text', 'title'=>'Quotes'])
    ->addColumn(['data' => 'action', 'name'=>'action', 'title'=>'', 'orderable'=>false, 'searchable'=>false]);
    return view('quotes.index')->with(compact('quotes','html'));
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
           $quotes = quotes::find($id);
        return view('quotes.edit')->with(compact('quotes'));
    
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
        $this->validate($request, ['text' => 'required|unique:quotes,text,'. $id,
            ]);
        $poto = quotes::find($id);
        $poto->update($request->all());
    
        Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Berhasil Menyimpan Data"
            ]);
        return redirect()->route('quotes.index');
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
            