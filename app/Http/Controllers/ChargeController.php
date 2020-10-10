<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\Plan;

use Illuminate\Support\Facades\DB;

class ChargeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    public function indexCharge(Request $request)
    {
        if(Auth::check())
        {
            $data = $request->all();
            $date = strtotime(date('d-m-Y'));
            $date = date('d/m/Y', strtotime('+ 2 days', $date));
            return view('edit_subscription_payment_charge')-> with(['payer_name' => Auth::user()->name,'price' => $data['price'], 'subscription_id' => $data['subscription_id'] , 'expires_date' => $date ]);  
        }
        return redirect()->route('login');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        sleep(2);
        header("Content-type: application/pdf");
        header("Content-Disposition: attachment; filename=boleto.pdf");
    
        $out = fopen( 'php://output', 'w' );
        fclose($out);
    }

    public function selectCharge(Request $request)
    {
        if(Auth::check())
        {
            
            $data = $request->all();
            $date = strtotime(date('d-m-Y'));
            $date = date('d/m/Y', strtotime('+ 2 days', $date));
            $plan = Plan::where('plan_id', $data['plan_id'])->get();

            return view ('select_billet')-> with(['plans' => $plan, 'address_id' => $data['address_id'],
            'payer_name' => Auth::user()->name, 'expires_date' => $date ] );  
        }

       return redirect()->route('login');
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
