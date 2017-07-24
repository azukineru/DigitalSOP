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
        //Create a variable and store all the SOP in it
        $aplikasi = Aplikasi::all();

        //Return a view and pass in the above variable
        return view('aplikasi.index')->withAplikasi($aplikasi);
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
        //Find the application from database
        $aplikasi = Aplikasi::find($id);

        //Return the view and pass in the var we previously created
        return view('aplikasi.edit')->withAplikasi($aplikasi);
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
        //Validate the data
        $this->validate($request, array(
                'nama_aplikasi' => 'required|max:45',
                'unit' => 'required',
                'url_aplikasi' => 'required|max:100',
                'url_sop' => 'required|max:200'
            ));

        //Save the data to the database
        $aplikasi = Aplikasi::find($id);

        $aplikasi->nama_aplikasi = $request->input('nama_aplikasi');
        $aplikasi->unit = $request->input('unit');
        $aplikasi->url_aplikasi = $request->input('url_aplikasi');
        $aplikasi->url_sop = $request->input('url_sop');

        $aplikasi->save();

        //Set flash data with success message
        Session::flash('success', 'Successfully saved');

        //Redirect with flash data to aplikasi.show
        return redirect()->route('aplikasi.show', $aplikasi->id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $aplikasi = Aplikasi::find($id);

        $aplikasi->delete();

        Session::flash('success', 'Successfully deleted.');

        return redirect()->route('aplikasi.index');
    }

    //Get all SOP in BPO Unit
    public function getDataBPO()
    {
        //$sops = DB::table('aplikasis')->where('unit', 'BPO')->get();

        $data['data'] = \DB::table('aplikasis')->where('unit', 'BPO')->get();

       if(count($data) > 0)
       {
            return view('pages.bpo', $data);
       }
       else
       {
            return view('pages.bpo');
       }
    }

}
