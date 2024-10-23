<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Casier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class loginController extends Controller
{
    //

    public function login()
    {
        if (Session::has('client')) {
            return redirect('/client/home');
        } elseif (Session::has('admin')) {
        } elseif (Session::has('casier')) {
        } else {
            return view('login');
        }
    }

    public function access(Request $request)
    {
        $account = Account::where('email', $request->email)->first();
        if ($account) {
            if ($account->password == $request->password) {

                Session::put('client', $account);
                return redirect('client/home');
            } else {
                return back()->with('status', 'Wrong email or password');
            }
        } else {
            return back()->with('status', 'Wrong email or password');
        }
    }

    public function loginaccess(Request $request){
        $casier = Casier::where('email', $request->email)->first();
        if ($casier) {
            if ($casier->password == $request->password) {

                Session::put('casier', $casier);
                return redirect('casier/home');
            } else {
                return back()->with('status', 'Wrong email or password');
            }
        } else {
            return back()->with('status', 'Wrong email or password');
        }
    }

    public function logoutc(){
        Session::forget('casier');
        return view('login');
    }

    public function logout()
    {
        Session::forget('client');
        return view('login');
    }
}
