<?php

namespace App\Http\Controllers;

use App\Mail\RequestReceived;
use App\Models\User;
use App\Models\Order;
use Illuminate\Auth;
use Illuminate\Http\Request;
use App\Models\Horoscope;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\RazorpayController;

class HoroscopeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['show']]);
    }

    /**
     * Display a listing of the users
     *
     * @param  \App\Horoscope  $model
     * @return \Illuminate\View\View
     */
    public function index(Horoscope $model)
    {

        $horoscopes = Horoscope::all();

        return view('horoscope.index', ['horoscopes' => $model->paginate(5)]);

    }

    public function create() {
        return view('horoscope.create');
    }

    public function store()
    {

        $data = request()->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'pob' => 'required',
            'dob' => 'required',
            'cob' => 'required',
            'tob' => 'required',
            'gender' => '',
            'reptype' => 'required',
            'amount'    => '',
            'paymenttype' =>    '',
            'paymentstatus' => '',
            'reftype'=> '',
            'refdetails'   => '',
            'comments' => '',
        ]);

        $user = auth()->user();
        $orderid = time() . '-' . $user->id;

        auth()->user()->horoscopes()->create([
            'name' => $data['name'],
            'orderID' => $orderid,
            'reptype' => $data['reptype'],
            'gender' => $data['gender'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'pob' => $data['pob'],
            'cob' => $data['cob'],
            'dob' => $data['dob'],
            'tob' => $data['tob'],
            'comments' => $data['comments'],
            'reftype' => $data['reftype'],
            'refdetails'=> $data['refdetails'],
        ]);


        /*    Mail::to($data['email'])->send(new RequestReceived());*/

        return redirect('/thankyou');
    }

    public function show($id)
    {
        $horoscopes = Horoscope::findorfail($id);
        return view('horoscope.show', compact('horoscopes'));
    }

    public function edit($id, User $user, Horoscope $horoscope)
    {
        $horoscopes = Horoscope::all();
        return view('horoscope.edit', compact('horoscopes'));
    }

    public function destroy(Horoscope $horoscopes) {
        $horoscopes->delete();
        return back();
    }
}

