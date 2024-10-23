<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Casier;
use App\Models\Statement;
use Illuminate\Http\Request;

class CasierController extends Controller
{
    //

    public function home()
    {

        return view('casier.home');
    }

    public function casiertransfer(Request $request)
    {
        $account = Account::where('accountnumber', $request->accountnumber)->first();
        if ($account) {

            return view("casier.transfer")->with('account', $account);
        } else {
            return back()->with('status', 'Ce numéro de compte n\'existe pas');
        }
    }

    public function withdraw(Request $request){
        $account = Account::where('accountnumber',$request->accountnumber)->first();
        $account->balanche = $account->balanche - $request->input('amount');

        $statement = new Statement();
        $statement->name =$account->name;
        $statement->source = $account->accountnumber;
        $statement->destination = $account->accountnumber;
        $statement->amount = $request->amount;
        $statement->status = 3;
        $account->update();
        $statement->save();
        return redirect('casier/home')->with('status','votre retrait a été effectué avec success');
    }

    public function deposit(Request $request){
        $account = Account::where('accountnumber',$request->accountnumber)->first();
        $account->balanche = $account->balanche + $request->input('amount');

        $statement = new Statement();
        $statement->name =$account->name;
        $statement->source = $account->accountnumber;
        $statement->destination = $account->accountnumber;
        $statement->amount = $request->amount;
        $statement->status = 0;
        $account->update();
        $statement->save();
        return redirect('casier/home')->with('status','votre retrait a été effectué avec success');
    }
}
