<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\paket;

class PaketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(request $request)
    {
        // 
        $paket = paket::all();
        return view('paket.index',compact('paket'));
     }
}
