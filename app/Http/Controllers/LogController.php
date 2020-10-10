<?php

namespace App\Http\Controllers;

use App\Models\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogController extends Controller
{
    public function index()
    {
        if(Auth::check())
        {
            if(Auth::user()->groupid == 2)
            {
                $logs = Log::latest()->paginate(5);

                return view('view_logs')->with(['logs' => $logs]);
            }
            return redirect()->route('profile');
        }
        return redirect()->route('login');
    }
}
