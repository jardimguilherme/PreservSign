<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
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
                $contacts = Contact::paginate(4);
                return view('view_contact')->with(['contacts' => $contacts]);
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
        return view('home_contact');
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
            if (Auth::user()->groupid != 2) {
                return redirect()->route('profile');
            } else {
                $data = $request->all();
                Contact::create($data);
                return redirect()->route('home');
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
    public function destroy(Request $request)
    {

        if (Auth::check()) {
            $data = $request->all();
            Contact::where('contact_id', $data['contact_id'])->delete();

            Log::create([
                'name' => Auth::user()->name,
                'email' => Auth::user()->email,
                'action' => 1,
                'message' => 'E-mail: ' . $data['email'] . "\n" . "Mensagem removida: " . $data['message'],
            ]);

            return redirect()->route('contact.index');
        }
        return redirect()->route('login');
    }
    
}
