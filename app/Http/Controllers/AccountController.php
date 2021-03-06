<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\User;
use Session;
use Datatables;

class AccountController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('account.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('account.create');
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
            'name' => 'required|max:100',
            'email' => 'required|max:100|unique:users',
            'password' => 'required|min:6',
            'confirm_password' => 'required|min:6|same:password'
        ));

        $acc = new User;
        $acc->name = $request->name;
        $acc->email = $request->email;
        $acc->password = bcrypt($request->password);
        $acc->type = $request->type;

        $acc->save();

        Session::flash('success', 'Successfully created new account');

        return redirect()->route('account.create');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $acc = User::where('id', $id)->first();

        return view('account.profile')->with('account',$acc);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $acc = User::where('id', $id)->first();

        return view('account.edit')->with('account', $acc);
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
        $this->validate($request, array(
            'name' => 'required|max:100',
            'email' => 'required|max:100'
        ));

        if( !empty($request->input('passsword')) )
        {
            $this->validate($request, array(
                'password' => 'min:6',
                'confirm_password' => 'min:6|same:password'
            ));
        }

        $acc = User::where('id', $id)->first();

        $acc->name = $request->input('name');
        $acc->email = $request->input('email');
        $acc->type = $request->input('type');

        if( !empty($request->input('password')) )
        {
            $acc->password = bcrypt($request->input('password'));
        }

        Session::flash('success', 'Successfully saved');

        $acc->save();

        return redirect()->route('account.show', $acc->id);

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

    //Get All Data SOP
    public function getAnyData()
    {
        $acc = User::select(['id', 'name', 'email', 'type']);

        return Datatables::of($acc)
            ->addColumn('action', function($acc) {
                return '<a href="account/'.$acc->id.'" class="btn btn-default btn-sm">View</a>  <a href="account/'.$acc->id.'/edit" class="btn btn-default btn-sm">Edit</a>';
            })
            ->rawColumns(['action'])
            ->make(true)
        ;
    }

}
