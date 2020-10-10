<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PlansPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $plans = Plan::all();

        return view('home_plans')->with(['plans' => $plans]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function indexPlans()
    {
        session()->put('back_url_plan', "{$_SERVER['REQUEST_URI']}");
        session()->put('error-msg', "Você precisa estar logado.");
        if(Auth::check())
        {
            $plans = Plan::all();
            session()->forget('back_url_plan');
            session()->forget('error-msg');
            return view('select_plans')->with(['plans' => $plans, 'error' => null]);
        }
        return redirect()->route("login");
    }


    public function editPlan(Request $request)
    {
        if (Auth::check()) {
            $plans = Plan::all();
            $data = $request->all();            
            return view('edit_subscription_plan')->with(['subscription_id' => $data['subscription_id'], 'plans' => $plans]);   
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
