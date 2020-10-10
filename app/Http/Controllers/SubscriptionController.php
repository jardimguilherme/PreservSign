<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscription;
use App\Models\Plan;
use App\Models\Address;
use App\Models\Credit_card;
use App\Models\Payment;
use App\Models\Charge;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use PhpParser\Node\Stmt\Break_;

class SubscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check()) {
            $data = DB::table('subscriptions')
                ->join('addresses', 'addresses.address_id', '=', 'subscriptions.address_id')
                ->join('plans', 'plans.plan_id', '=', 'subscriptions.plan_id')
                ->join('payments', 'payments.subscription_id', '=', 'subscriptions.subscription_id')
                ->leftjoin('charges', 'payments.payment_id', '=', 'charges.payment_id') 
                ->leftjoin('credit_cards', 'payments.payment_id', '=', 'credit_cards.payment_id')
                ->where('subscriptions.client_id', '=',  Auth::user()->id)->select('subscriptions.subscription_id', 'subscriptions.client_id', 'subscriptions.plan_id'
                , 'subscriptions.address_id', 'subscriptions.created_at', 'subscriptions.updated_at', 'plans.plan_name', 'plans.price', 'plans.description', 
                'addresses.street', 'addresses.street_number', 'addresses.cep','addresses.city', 'addresses.country', 'addresses.state', 'addresses.complement', 
                'addresses.neighborhood', 'payments.payment_id', 'payments.type', 'charges.charge_code', 'charges.payer_name',
                'credit_cards.card_number', 'credit_cards.security_number', 'credit_cards.expires_date', 'credit_cards.card_name')->get();


            foreach ($data as $subscription)
            {
                $subscription->created_at = date('d', strtotime($subscription->created_at));
            }

            return view('view_subscriptions')->with(['subscriptions' => $data]);
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
            $addresses = Address::where('client_id', Auth::user()->id)->get();

            $plans = Plan::all();

            return view('auth/create_subscription')->with(['addresses' => $addresses, 'plans' => $plans]);
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
            $data = $request->all();
                if(isset($data['submit'])){
                                      
                    $date = $data['expires_date'];
                    $date = explode('/', $date);
                    $date = '20' . $date['1'] .'-'. $date['0'] . '-01';

                    Subscription::create([
                        'plan_id' => $data['plan_id'],
                        'address_id' => $data['address_id'],
                        'client_id' => Auth::user()->id
                    ]);

                    Payment::create([
                        'subscription_id' => DB::getPdo()->lastInsertId(),
                        'type' => $data['type']
                    ]);

                    Credit_card::create([
                        'payment_id' => DB::getPdo()->lastInsertId(),
                        'card_number' => $data['card_number'],
                        'card_name' => $data['card_name'],
                        'expires_date' => $date,
                        'security_number' => $data['security_number']
                    ]);
                    
                    unset($data['submit']);
                    return Redirect::to('subscription/card/signed'); 
                }
                return view('view_completed_transaction')->with(['charge_code' => NULL]); 
            }
            return redirect()->route('login');   
    }

    public function storeCharge(Request $request)
    {
        if (Auth::check()) {
            $data = $request->all();
            if(isset($data['submit'])){
                unset($data['submit']);
            $charge_code = '23790.50400 42000.624231 07008.109204 4 82990000019900';

            Subscription::create([
                'plan_id' => $data['plan_id'],
                'address_id' => $data['address_id'],
                'client_id' => Auth::user()->id
            ]);

            Payment::create([
                'subscription_id' => DB::getPdo()->lastInsertId(),
                'type' => $data['type']
            ]);

            Charge::create([
                'payment_id' => DB::getPdo()->lastInsertId(),
                'charge_code' => $charge_code,
                'payer_name' => $data['payer_name']
            ]);

            unset($data['submit']);
            return Redirect::to('subscription/charge/signed');
        }
        return view('view_completed_transaction')->with(['charge_code' => NULL]); 
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

    public function indexSignedCharge()
    {
        return view("view_completed_transaction")->with(['charge_code' => '23790.50400 42000.624231 07008.109204 4 82990000019900']);;
    }

    public function indexSignedCard()
    {
        return view("view_completed_transaction")->with(['charge_code' => null]);;
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $data =  $request->all();
        if (Auth::check()) {
            $data = DB::table('subscriptions')
                ->join('addresses', 'addresses.address_id', '=', 'subscriptions.address_id')
                ->join('plans', 'plans.plan_id', '=', 'subscriptions.plan_id')
                ->join('payments', 'payments.subscription_id', '=', 'subscriptions.subscription_id')
                ->leftjoin('charges', 'payments.payment_id', '=', 'charges.payment_id') 
                ->leftjoin('credit_cards', 'payments.payment_id', '=', 'credit_cards.payment_id')
                ->where('subscriptions.client_id', '=',  Auth::user()->id)->where('subscriptions.subscription_id', '=', $data['subscription_id'])->get();


                foreach ($data as $subscription)
                {
                    $subscription->created_at = date('d', strtotime($subscription->created_at));
                }

            return view('edit_subscription')->with(['subscriptions' => $data]);
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
    public function update(Request $request, $id)
    {
        //
    }

    public function updatePlan(Request $request)
    {
        if (Auth::check()) {

                $data = $request->all();
               if($this->checkPlan($data['plan_id'])){
                    $plans = Plan::all();
                    return view('edit_subscription_plan')->with(['error' => 'Você ja possui este plano. Por favor, selecione outro.', 
                    'subscription_id' => $data['subscription_id'], 'plans' => $plans]); 
               }
                $plan = Subscription::where('subscription_id', $data['subscription_id'])->update(['plan_id' => $data['plan_id']]);

                return redirect()->route('subscription.index');
        }
        return redirect()->route('login');
    }

    public function updatePaymentCredit_card(Request $request)
    {
        
        if(Auth::check())
        {
            $data = $request->all();

            $date = $data['expires_date'];
            $date = explode('/', $date);
            $date = '20' . $date['1'] .'-'. $date['0'] . '-01';

            $payment = Payment::where('subscription_id', $data['subscription_id'])->delete();


            Payment::create([
                'subscription_id' => $data['subscription_id'],
                'type' => $data['type']
            ]);

            Credit_card::create([
                'payment_id' => DB::getPdo()->lastInsertId(),
                'card_number' => $data['card_number'],
                'card_name' => $data['card_name'],
                'expires_date' => $date,
                'security_number' => $data['security_number']
            ]);
             return view('edit_subscription_finished')->with(['subscription_id' => $data['subscription_id']]);
        }
        return redirect()->route('login');
    }

    public function updatePaymentCharge(Request $request)
    {
        if(Auth::check())
        {
            $data = $request->all();
            $payment = Payment::where('subscription_id', $data['subscription_id'])->delete();

            $charge_code = '23790.50400 42000.624231 07008.109204 4 82990000019900';

            Payment::create([
                'subscription_id' => $data['subscription_id'],
                'type' => $data['type']
            ]);

            Charge::create([
                'payment_id' => DB::getPdo()->lastInsertId(),
                'charge_code' => $charge_code,
                'payer_name' => Auth::user()->name
            ]);
             return view('edit_subscription_finished')->with(['charge_code' => $charge_code, 'subscription_id' => $data['subscription_id']]);
        }
        return redirect()->route('login');
    }

    public function updateAddress(Request $request)
    {
        if (Auth::check()) {
            $data = $request->all();
            if($this->checkAddress($data['address_id'], $data['subscription_id'])){
                $addresses = Address::where('client_id', Auth::user()->id)->get();
                return view('edit_subscription_address')->with(['error' => 'Você selecionou o mesmo endereço. Por favor, selecione outro.', 
                'subscription_id' => $data['subscription_id'], 'addresses' => $addresses]); 
           }
            $address = Subscription::where('subscription_id', $data['subscription_id'])->update(['address_id' => $data['address_id']]);

            return redirect()->route('subscription.index');
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
            $data = $request->all();

            Subscription::where('subscription_id', '=', $data['subscription_id'])->delete();
            return redirect()->route('subscription.index');
        }
        return redirect()->route('login');
    }
    public function checkPlan($plan_id)
    {
       $check =  DB::table('subscriptions')->join('plans', 'plans.plan_id', '=', 'subscriptions.plan_id')->where('client_id', '=', Auth::user()->id)->get();
       
       foreach ($check as $subs)
        if($subs->plan_id == $plan_id)
            return true;
        return false;
    }

    public function checkAddress($address_id, $subscription_id)
    {
       $check =  DB::table('subscriptions')->join('addresses', 'addresses.address_id', '=', 'subscriptions.address_id')->where('subscriptions.client_id', '=', Auth::user()->id)
      ->where('subscriptions.subscription_id', '=', $subscription_id)->get();
       
       foreach ($check as $subs)
        if($subs->address_id == $address_id)
            return true;
        return false;
    }
}
