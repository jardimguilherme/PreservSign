<?php

namespace App\Http\Controllers;

use App\Models\Log;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::check())
        {
            if(Auth::user()->groupid == 2){
                $users = User::all();
                return view('edit_role')->with(['users' => $users]);
            }
            return redirect()->route('profile');
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
        //
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
    public function update(Request $request)
    {
        if(Auth::check())
        {
            if(Auth::user()->groupid == 2){
                $data = $request->all();
                User::where('id', $data['user_id'])->update(['groupid' => $data['position']]);

                $user = User::where('id', $data['user_id'])->get();

                if($data['position'] == 1)
                    $cargo = 'rebaixado para usuário comum';
                else
                    $cargo = "promovido para administrador";    

                Log::create([
                    'name' => Auth::user()->name,
                    'email' => Auth::user()->email,
                    'action' => 2,
                    'message' => 'O usuário ' . $user[0]->name . ' foi '. $cargo. '!',
                ]);

                $success[0] = 'O cargo do usuário foi alterado com sucesso!';
                return view("auth/profile")->with(['success' => $success]);
            }
            return redirect()->route('profile');
        }
        return redirect()->route('login');
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
