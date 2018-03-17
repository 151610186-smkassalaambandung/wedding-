<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\datapaket;

class DataPaketController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(request $request)
    {
        // 
        $datapaket = datapaket::all();
        return view('datapaket.index',compact('datapaket'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('datapaket.create');
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
         $datapaket=new datapaket;
        $datapaket->nama=$request->a;
        if($request->hasfile('cover')){
            $datapakets=$request->file('cover');
            $extension=$datapakets->getClientOriginalExtension();
            $filename=str_random(6). '.' .$extension;
            $destinationPath=public_path() .
            DIRECTORY_SEPARATOR . 'img';
            $datapakets->move($destinationPath ,$filename);
            $datapaket->cover=$filename;
        }
        $datapaket->save();
        return redirect()->route('datapaket.index');
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
         $datapaket = datapaket::findOrFail($id);
        return view('datapaket.show', compact('datapaket'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
         $datapaket = datapaket::findOrFail($id);
        return view('datapaket.edit', compact('datapaket'));
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
        //
         $datapaket = datapaket::findOrFail($id);
         $datapaket->nama=$request->a;
        if($request->hasfile('cover')){
            $datapakets=$request->file('cover');
            $extension=$datapakets->getClientOriginalExtension();
            $filename=str_random(6). '.' .$extension;
            $destinationPath=public_path() .
            DIRECTORY_SEPARATOR . 'img';
            $datapakets->move($destinationPath ,$filename);
            $datapaket->cover=$filename;
        }
        $datapaket->save();
        return redirect()->route('datapaket.index');
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
          $datapaket = datapaket::findOrFail($id);
        $datapaket ->delete();
        return redirect()->route('datapaket.index');
    }
}

