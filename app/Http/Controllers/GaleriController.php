<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\galeri;

class GaleriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(request $request)
    {
        // 
        $galeri = galeri::all();
        return view('galeri.index',compact('galeri'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('galeri.create');
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
         $galeri=new galeri;
        $galeri->nama=$request->a;
        if($request->hasfile('cover')){
            $galeris=$request->file('cover');
            $extension=$galeris->getClientOriginalExtension();
            $filename=str_random(6). '.' .$extension;
            $destinationPath=public_path() .
            DIRECTORY_SEPARATOR . 'img';
            $galeris->move($destinationPath ,$filename);
            $galeri->cover=$filename;
        }
        $galeri->save();
        return redirect()->route('galeri.index');
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
         $galeri = galeri::findOrFail($id);
        return view('galeri.show', compact('galeri'));
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
         $galeri = galeri::findOrFail($id);
        return view('galeri.edit', compact('galeri'));
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
         $galeri = galeri::findOrFail($id);
         $galeri->nama=$request->a;
        if($request->hasfile('cover')){
            $galeris=$request->file('cover');
            $extension=$galeris->getClientOriginalExtension();
            $filename=str_random(6). '.' .$extension;
            $destinationPath=public_path() .
            DIRECTORY_SEPARATOR . 'img';
            $galeris->move($destinationPath ,$filename);
            $galeri->cover=$filename;
        }
        $galeri->save();
        return redirect()->route('galeri.index');
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
          $galeri = galeri::findOrFail($id);
        $galeri ->delete();
        return redirect()->route('galeri.index');
    }
}
