<?php

namespace App\Http\Controllers;

use App\Http\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('auth/profile');
    }

    public function destroy_account()
    {

        $user = Auth::user();
        $user->delete();

        return redirect()->route('home');
    }

    public function indexEditProfile()
    {
       return view('auth/editProfile');
    }

    public function editProfile(Request $request)
    {
        $data = $request->all();

        $date = explode("/", $data['birth_date']);
        $date = $date[2] . "-" . $date[1] . "-" . $date[0];

        $user = Auth::user();
        $user->name = $data['name'];
        $user->phone_number = $data['phone_number'];
        $user->birth_date = $date;
        $user->save();

        $success[0] = 'O perfil foi atualizado com sucesso!';
        return view("auth/profile")->with(['success' => $success]);
    }

    public function editEmail(Request $request)
    {
        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            // The passwords matches
            $error[0] = 'A senha informada não corresponde a senha cadastrada. Por favor, tente novamente.';
            return view("auth/editEmail")->with(['error' => $error]);
        }

        if(strcmp($request->get('email'), $request->get('new-email')) != 0){
            //Current password and new password are same
            $error[0] = "Os novos e-mails estão diferentes. Por favor, tente novamente.";
            return view("auth/editEmail")->with(['error' => $error]);
        }

        if(strcmp(Auth::user()->email, $request->get('email')) == 0){
            //Current password and new password are same
            $error[0] = "O novo e-mail está igual ao anterior. Por favor, escolha um e-mail diferente.";
            return view("auth/editEmail")->with(['error' => $error]);
        }

        $users = DB::select('select * from users', [1]);

        foreach($users as $user)
        {
            if ($user->email == $request->get("email"))
            {
                $error[0] = "Este e-mail já está cadastrado no sitema. Por favor, escolha um e-mail diferente.";
                return view("auth/editEmail")->with(['error' => $error]);
            }
        }

        $user = Auth::user();
        $user->email = $request->get("email");
        $user->save();

        $success[0] = 'O e-mail foi alterado com sucesso!';
        return view("auth/profile")->with(['success' => $success]);
    }
    
    public function indexEmail()
    {
        return view("auth/editEmail");
    }

    public function indexPassword(){
        return view("auth/passwords/reset");
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function changePassword(Request $request){

        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            // The passwords matches
            $error[0] = 'A senha informada não corresponde a senha cadastrada. Por favor, tente novamente.';
            return view("auth/passwords/reset")->with(['error' => $error]);
        }


        if(strcmp($request->get('password'), $request->get('new-password')) != 0){
            //Current password and new password are same
            $error[0] = "As novas senhas estão diferentes. Por favor, tente novamente.";
            return view("auth/passwords/reset")->with(['error' => $error]);
        }

        if(strcmp($request->get('current-password'), $request->get('password')) == 0){
            //Current password and new password are same
            $error[0] = "A nova senha é igual a senha anterior. Por favor, escolha uma senha diferente.";
            return view("auth/passwords/reset")->with(['error' => $error]);
        }


        // $validatedData = $request->validate([
        //     'password' => ['required', 'min:8'],
        //     'current-password' => ['required'],
        // ]);

        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();

        $success[0] = 'A senha foi alterada com sucesso!';
        return view("auth/profile")->with(['success' => $success]);

    }
}