<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Message;
use App\Models\Notice;
use App\Models\Statement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class clientController extends Controller
{
    //

    public function home()
    {
        if(Session::has('client')){

            return view('client.home');
        }else{
            return redirect('/');
        }
    }
    public function account()
    {
        $account = Account::where('accountnumber',Session::get('client')->accountnumber)->first();
        return view('client.account')->with('account',$account);
    }
    public function statement()
    {
        return view('client.statement');
    }
    public function fund()
    {
        return view('client.fund');
    }
    public function clienttransfer(Request $request){
        $account = Account::where('accountnumber',$request->accountnumber)->first();
        if($account){
            if($account != Session::get('client')->accountnumber){
                return view("client.tranferdetail")->with('account',$account);

            }else{
                return back()->with('status','Vous pouvez faire le tranfer sur votre propre compte');
            }

        }else{
            return back()->with('status','Ce numéro de compte n\'existe pas');
       }
    }

    public function transfer(Request $request){
        $account = Account::where('accountnumber',Session::get('client')->accountnumber)->first();
        $account1 = Account::where('accountnumber',$request->accountnumber)->first();
        $account->balanche = $account->balanche - $request->amount;
      

        $account1->balanche = $account1->balanche + $request->amount;

        $statement = new Statement();
        $statement->name=$account1->name;
        $statement->source =$account->accountnumber;
        $statement->destination =$account1->accountnumber;
        $statement->amount=$request->amount;
        $statement->status =1;
        $statement->save();

        $statement = new Statement();
        $statement->name=$account1->name;
        $statement->source =$account->accountnumber;
        $statement->destination =$account1->accountnumber;
        $statement->amount=$request->amount;
        $statement->status =2;
        $statement->save();

        $account->update();
        $account1->save();
        Session::forget('client');
        Session::put('client',$account);
        return redirect('client/fund')->with('status','votre transfert a été fait avec success');
    }

    public function feedback()
    {
        return view('client.feedback');
    }

    public function notice()
    {
        $notices = Notice::where('accountnumber',Session::get('client')->accountnumber)->get();
        return view('client.notice')->with('notices',$notices);
    }

    public function clientmessage(Request $request){
        $message = new Message();

        $message->name = Session::get('client')->name;
        $message->accountnumber = Session::get('client')->accountnumber;
        $message->phone = Session::get('client')->phone;
        $message->message = $request->input('message');
        $message->save();
        return back()->with('status', 'Votre message a bien été ajouté avec success');

    }
}
