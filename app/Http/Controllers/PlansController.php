<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plan;
use App\Models\Log;
use Illuminate\Support\Facades\Auth;

class PlansController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check()) {
            if (Auth::user()->groupid != 2) {
                return redirect()->route('profile');
            } else {
                $plans = Plan::all();
                return view('view_plans')->with(['plans' => $plans]);
            }
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
        if (Auth::check()) {
            if (Auth::user()->groupid != 2) {
                return redirect()->route('profile');
            } else {
                return view('add_plan');
            }
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
        if (Auth::check()) {
            if (Auth::user()->groupid == 2) {
                $data = $request->all();

                Plan::create($data);

                return redirect()->route('plan.index');
            } else {
                return redirect()->route('profile');
            }
        }
        return redirect()->route('login');
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
    public function edit(Request $request)
    {
        if (Auth::check()) {
            if (Auth::user()->groupid == 2) {
                $data = $request->all();
                $plans = Plan::where('plan_id', $data['plan_id'])->get();

                return view('edit_plans')->with(["plans" => $plans]);

            } else {
                return redirect()->route('profile');
            }
        }
        return redirect()->route('login');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if (Auth::check()) {
            if (Auth::user()->groupid == 2) {
                $data = $request->all();
                $oldPlans = Plan::where('plan_id', $data['plan_id'])->get();

                foreach ($oldPlans as $plan){
                $oldName = $plan->plan_name;
                $oldPrice = $plan->price;
                $oldDescription = $plan->description;
            }
                $plan = Plan::where('plan_id', $data['plan_id'])->update(['plan_name' => $data['plan_name'], 'price' => $data['price'], 'description' => $data['description']]);

                Log::create([
                    'name' => Auth::user()->name,
                    'email' => Auth::user()->email,
                    'action' => 2,
                    'message' => $oldName . ' -> ' . $data['plan_name'] . "\nR$ " . $oldPrice . ' -> R$ ' . $data['price'] . "\n" . $oldDescription . ' -> ' . $data['description'],
                ]);

                return redirect()->route('plan.index');
            } else {
                return redirect()->route('profile');
            }
        }
        return redirect()->route('login');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if (Auth::check()) {
            if (Auth::user()->groupid == 2) {
                $data = $request->all();

                Plan::where('plan_id', $data['plan_id'])->delete();
                Log::create([
                    'name' => Auth::user()->name,
                    'email' => Auth::user()->email,
                    'action' => 1,
                    'message' => 'O plano ' . $data['plan_name'] . ' foi removido',
                ]);


                return redirect()->route('plan.index');
            } else {
                return redirect()->route('profile');
            }
        }
        return redirect()->route('login');
    }
}
