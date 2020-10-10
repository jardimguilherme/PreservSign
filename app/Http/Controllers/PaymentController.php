<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function index(Request $request){
        
        if (Auth::check()) {
            $data= $request->all();
            return view("select_payment")->with(["plan_id" => $data["plan_id"], "address_id" => $data["address_id"]]); 
        }
        return redirect()->route('login');
    }

    public function boleto(){
        return view("select_billet");
    }

    public function finalizar(){
        return view('compra_finalizada');
    }
    // /**
    //  * Show the form for creating a new resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function create()
    // {
    //     if (Auth::check()) {
            
    //     }
    //     return redirect()->route('login');
    // }

}
