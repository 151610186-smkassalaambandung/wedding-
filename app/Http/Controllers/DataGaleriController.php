<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\datagaleri;

class DataGaleriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(request $request)
    {
        // 
        $datagaleri = datagaleri::all();
        return view('datagaleri.index',compact('datagaleri'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('datagaleri.create');
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
         $datagaleri=new datagaleri;
        $datagaleri->nama=$request->a;
        if($request->hasfile('cover')){
            $datagaleris=$request->file('cover');
            $extension=$datagaleris->getClientOriginalExtension();
            $filename=str_random(6). '.' .$extension;
            $destinationPath=public_path() .
            DIRECTORY_SEPARATOR . 'img';
            $datagaleris->move($destinationPath ,$filename);
            $datagaleri->cover=$filename;
        }
        $datagaleri->save();
        return redirect()->route('datagaleri.index');
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
         $datagaleri = datagaleri::findOrFail($id);
        return view('datagaleri.show', compact('datagaleri'));
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
         $datagaleri = datagaleri::findOrFail($id);
        return view('datagaleri.edit', compact('datagaleri'));
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
         $datagaleri = datagaleri::findOrFail($id);
         $datagaleri->nama=$request->a;
        if($request->hasfile('cover')){
            $datagaleris=$request->file('cover');
            $extension=$datagaleris->getClientOriginalExtension();
            $filename=str_random(6). '.' .$extension;
            $destinationPath=public_path() .
            DIRECTORY_SEPARATOR . 'img';
            $datagaleris->move($destinationPath ,$filename);
            $datagaleri->cover=$filename;
        }
        $datagaleri->save();
        return redirect()->route('datagaleri.index');
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
          $datagaleri = datagaleri::findOrFail($id);
        $datagaleri ->delete();
        return redirect()->route('datagaleri.index');
    }
}
