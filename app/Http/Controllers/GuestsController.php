<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use App\quotes;
use App\background_quotes;
use App\Header;
use App\Product;
use Laratrust\LaratrustFacade as Laratrust;
use Illuminate\Support\Str;


class GuestsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Builder $htmlBuilder)
    {
         //$mobil = mobil::with('modell')->get();

       
       $quotes = quotes::all();
       $background_quotes = background_quotes::all();
       $Header = Header::all();
       $Product = Product::all();
       return view('guest.index')->with(compact('quotes','background_quotes','Header','Product'));
   }

}
