<?php

namespace App\Http\Controllers;

use App\Mail\RequestReceived;
use App\Matchmaker;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MatchmakerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['show']]);
    }

    public function index(User $user)
    {
        $matchmakers = Matchmaker::all();

        return view('matchmaker.index', compact('matchmakers'));
    }

    public function create()
    {
        return view('matchmaker.create');
    }

    public function store()
    {
        $data = request()->validate([
            'name' => 'required',
            'email' => 'required | email',
            'phone' => 'required',
            'pob'   =>  'required',
            'dob'   =>  'required | date',
            'tob'   =>  'required',
            'cob'   =>  'required',
            'gender'=>  '',
            'amount'    => '',
            'paymenttype' =>    '',
            'paymentstatus' => '',
            'reftype'=> '',
            'refdetails'   => '',

            'comments' => '',

            'nameone' => 'required',
            'pobone' => 'required',
            'dobone' => 'required',
            'cobone' => 'required',
            'tobone' => 'required',

            'nametwo' => 'nullable|string',
            'pobtwo' => 'nullable|string',
            'dobtwo' => 'nullable|string',
            'tobtwo' => 'nullable|string',
            'cobtwo' => 'nullable|string',

            'namethree' => 'nullable|string',
            'pobthree' => 'nullable|string',
            'dobthree' => 'nullable|string',
            'tobthree' => 'nullable|string',
            'cobthree' => 'nullable|string',
        ]);

        auth()->user()->matchmakers()->create([
            'name' => $data['name'],
            'gender'  => $data['gender'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'pob'   =>  $data['pob'],
            'dob'   =>  $data['dob'],
            'tob'   =>  $data['tob'],
            'cob'   =>  $data['cob'],
            'comments' =>$data['comments'],

            'nameone' => $data['nameone'],
            'pobone'   =>  $data['pobone'],
            'dobone'   =>  $data['dobone'],
            'tobone'   =>  $data['tobone'],
            'cobone'   =>  $data['cobone'],

            'nametwo' => $data['nametwo'],
            'pobtwo'   =>  $data['pobtwo'],
            'dobtwo'   =>  $data['dobtwo'],
            'tobtwo'   =>  $data['tobtwo'],
            'cobtwo'   =>  $data['cobtwo'],

            'namethree' => $data['namethree'],
            'pobthree'   =>  $data['pobthree'],
            'dobthree'   =>  $data['dobthree'],
            'tobthree'   =>  $data['tobthree'],
            'cobthree'   =>  $data['cobthree'],

        ]);


        Mail::to($data['email'])->send(new RequestReceived());
        return redirect('/thankyou');    }

    public function update()
    {

    }

    public function show($id)  {
        $matchmakers = Matchmaker::findorfail($id);
        return view('horoscope.show', compact('matchmakers'));
    }

    public function destroy()
    {

    }

}

