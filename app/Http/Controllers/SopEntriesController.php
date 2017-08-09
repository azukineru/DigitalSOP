<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\SopEntries;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Session;
use Storage;
use File;
use Datatables;

class SopEntriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Create a variable and store all the SOP in it
        //$sop = SopEntries::orderBy('id', 'desc')->paginate(10);

        //Return a view and pass in the above variable
        return view('sopentries.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sopentries.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, array(
                'nama_sop' => 'required|max:45',
                'file_aplikasi' => 'required'
            ));

        $last = \DB::table('sopentries')->orderBy('created_at', 'desc')->first();

        $file = $request->file_aplikasi;
        if( !empty($file) )
        {
            $extension = $file->getClientOriginalExtension();
            $id_file = (string)((int)$last->id+1);
            Storage::disk('public')->put($id_file.'_'.$file->getClientOriginalName(),  File::get($file));
        }

        $sop = new SopEntries;
        $sop->nama_sop = $request->nama_sop;
        $sop->unit = $request->unit;
        $sop->url_aplikasi = $request->url_aplikasi;
        $sop->deskripsi_aplikasi = $request->deskripsi_aplikasi;

        if( !empty($file) )
        {
            $sop->mime = $file->getClientMimeType();
            $sop->original_filename = $file->getClientOriginalName();
            $sop->filename = $id_file.'_'.$file->getClientOriginalName();
        }
        else
        {
            $sop->mime = null;
            $sop->original_filename = null;
            $sop->filename = null;
        }

        $sop->save();

        Session::flash('success', 'Successfully inserted new SOP');

        return redirect()->route('sopentries.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SopEntries  $sopEntries
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //$sop = SopEntries::find($sopEntries);
        $sop = SopEntries::where('id', $id)->first();

        return view('sopentries.show')->with('sop',$sop);
        //return view('sopentries.show')->withSop($sop);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SopEntries  $sopEntries
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sop = SopEntries::where('id', $id)->first();

        return view('sopentries.edit')->with('sop', $sop);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SopEntries  $sopEntries
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, array(
            'nama_sop' => 'required|max:45',
            'unit' => 'required'
        ));

        //Save the data to the database
        $sop = SopEntries::where('id', $id)->first();

        $sop->nama_sop = $request->input('nama_sop');
        $sop->unit = $request->input('unit');
        $sop->url_aplikasi = $request->input('url_aplikasi');

        $file = $request->file_aplikasi;
        if( !empty($file) )
        {
            // Delete old file
            if( !empty($sop->filename) )
            {
                $directory = 'app/sop/'.$sop->filename;
                File::delete(storage_path($directory));
            }
            $extension = $file->getClientOriginalExtension();
            $id_file = $sop->id;
            Storage::disk('public')->put($id_file.'_'.$file->getClientOriginalName(),  File::get($file));

            $sop->mime = $file->getClientMimeType();
            $sop->original_filename = $file->getClientOriginalName();
            $sop->filename = $id_file.'_'.$file->getClientOriginalName();
        }

        //Set flash data with success message
        Session::flash('success', 'Successfully saved');

        $sop->save();

        
        //Redirect with flash data to aplikasi.show
        return redirect()->route('sopentries.show', $sop->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SopEntries  $sopEntries
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sop = SopEntries::where('id', $id)->first();

        if( !empty($sop->filename) )
        {
            $directory = 'app/sop/'.$sop->filename;
            File::delete(storage_path($directory));
        }

        $sop->delete();

        Session::flash('success', 'Successfully deleted.');

        return redirect()->route('sopentries.index');
    }

    //Get All Data SOP
    public function getAnyData()
    {
        $sop = SopEntries::select(['id', 'nama_sop', 'unit', 'url_aplikasi', 'deskripsi_aplikasi', 'filename', 'original_filename', 'updated_at']);

        

        return Datatables::of($sop)
            ->addColumn('link', function($sop) {
                $extstring = strlen($sop->original_filename)>30 ? "..." : "";
                return '<a href="sopentries/getSop/'.$sop->filename.'">'.substr($sop->original_filename, 0, 30).''.$extstring.'</a>';
            })
            ->addColumn('action', function($sop) {
                return '<a href="sopentries/'.$sop->id.'" class="btn btn-default btn-sm">View</a>  <a href="sopentries/'.$sop->id.'/edit" class="btn btn-default btn-sm">Edit</a>';
            })
            ->rawColumns(['link','action'])
            ->make(true)
        ;
    }

    //Download Data SOP
    public function getSop($filename)
    {
        $entry = SopEntries::where('filename', '=', $filename)->firstOrFail();
        $file = Storage::disk('public')->get($entry->filename);
 
        return (new Response($file, 200))
              ->header('Content-Type', $entry->mime);
    }

    //Get SOP Data in BPO
    public function getDataBPO()
    {
        $data['data'] = \DB::table('sopentries')->where('unit', 'BPO')->get();

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
