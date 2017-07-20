<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Aplikasi;
use Session;

class AplikasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('aplikasi.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validate the data
        $this->validate($request, array(
                'nama_aplikasi' => 'required|max:45',
                'unit' => 'required',
                'url_aplikasi' => 'required|max:100',
                'url_sop' => 'required|max:200'
            ));

        //Store in the database
        $aplikasi = new Aplikasi;
        $aplikasi->nama_aplikasi = $request->nama_aplikasi;
        $aplikasi->unit = $request->unit;
        $aplikasi->url_aplikasi = $request->url_aplikasi;
        $aplikasi->url_sop = $request->url_sop;

        $aplikasi->save();

        Session::flash('success', 'Successfully inserted new SOP');

        //Redirect to another page
        return redirect()->route('aplikasi.show', $aplikasi->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $aplikasi = Aplikasi::find($id);

        return view('aplikasi.show')->withAplikasi($aplikasi);
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
