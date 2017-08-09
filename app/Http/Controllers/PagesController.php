<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\SopEntries;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Storage;


class PagesController extends Controller {

	public function getIndex() {
		return view('pages.welcome');
	}

	public function getAbout() {
		$first = 'Digital';
		$last = 'SOP';

		$fullname = $first . " " . $last;
		$email = 'bpo@telkom.co.id';
		$data = [];
		$data['email'] = $email;
		$data['fullname'] = $fullname;

		return view('pages.about')->withData($data);
	}

	public function getLogin() {
		return view('pages.login');
	}

	public function getDashboard() {
		return view('pages.dashboard');
	}

	//Download Data SOP
    public function getSop($filename)
    {
        $entry = SopEntries::where('filename', '=', $filename)->firstOrFail();
        $file = Storage::disk('public')->get($entry->filename);
 
        return (new Response($file, 200))
              ->header('Content-Type', $entry->mime);
    }

	//Get SOP Data in IPA
    public function getDataIPA()
    {
        $data['data'] = \DB::table('sopentries')->where('unit', 'IPA')->get();

       if(count($data) > 0)
       {
            return view('pages.ipa', $data);
       }
       else
       {
            return view('pages.ipa');
       }
    }

    //Get SOP Data in EPD
    public function getDataEPD()
    {
        $data['data'] = \DB::table('sopentries')->where('unit', 'EPD')->get();

       if(count($data) > 0)
       {
            return view('pages.epd', $data);
       }
       else
       {
            return view('pages.epd');
       }
    }

    //Get SOP Data in BPD
    public function getDataBPD()
    {
        $data['data'] = \DB::table('sopentries')->where('unit', 'BPD')->get();

       if(count($data) > 0)
       {
            return view('pages.bpd', $data);
       }
       else
       {
            return view('pages.bpd');
       }
    }

    //Get SOP Data in OPD
    public function getDataOPD()
    {
        $data['data'] = \DB::table('sopentries')->where('unit', 'OPD')->get();

       if(count($data) > 0)
       {
            return view('pages.opd', $data);
       }
       else
       {
            return view('pages.opd');
       }
    }

    //Get SOP Data in SPD
    public function getDataSPD()
    {
        $data['data'] = \DB::table('sopentries')->where('unit', 'SPD')->get();

       if(count($data) > 0)
       {
            return view('pages.spd', $data);
       }
       else
       {
            return view('pages.spd');
       }
    }

    //Get SOP Data in EPO
    public function getDataEPO()
    {
        $data['data'] = \DB::table('sopentries')->where('unit', 'EPO')->get();

       if(count($data) > 0)
       {
            return view('pages.epo', $data);
       }
       else
       {
            return view('pages.epo');
       }
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

    //Get SOP Data in OPO
    public function getDataOPO()
    {
        $data['data'] = \DB::table('sopentries')->where('unit', 'OPO')->get();

       if(count($data) > 0)
       {
            return view('pages.opo', $data);
       }
       else
       {
            return view('pages.opo');
       }
    }

    //Get SOP Data in SPO
    public function getDataSPO()
    {
        $data['data'] = \DB::table('sopentries')->where('unit', 'SPO')->get();

       if(count($data) > 0)
       {
            return view('pages.spo', $data);
       }
       else
       {
            return view('pages.spo');
       }
    }

    //Get SOP Data in CFU
    public function getDataCFU()
    {
        $data['data'] = \DB::table('sopentries')->where('unit', 'CFU')->get();

       if(count($data) > 0)
       {
            return view('pages.cfu', $data);
       }
       else
       {
            return view('pages.cfu');
       }
    }

    //Get SOP Data in GA
    public function getDataGA()
    {
        $data['data'] = \DB::table('sopentries')->where('unit', 'GA')->get();

       if(count($data) > 0)
       {
            return view('pages.ga', $data);
       }
       else
       {
            return view('pages.ga');
       }
    }

}