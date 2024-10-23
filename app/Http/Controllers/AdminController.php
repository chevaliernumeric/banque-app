<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Casier;
use App\Models\Message;
use App\Models\Notice;
use App\Models\Statement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    //

    public function home()
    {
        $accounts = Account::All();
        return view('admin.home')->with('accounts',$accounts);
    }

    public function account()
    {
        $casiers = Casier::all();
        return view('admin.accounts')->with('casiers', $casiers);
    }
    public function addcaisier(Request $request)
    {
        $casier = new Casier();
        $casier->email = $request->input('email');
        $casier->password = $request->input('password');
        $casier->accounttype = 'Caisier';

        $casier->save();

        return back()->with('status', 'votre compte a bien été ajouté');
    }

    public function updatecasier(Request $request)
    {
        $casier = Casier::find($request->input('id'));
        $casier->email = $request->input('email');
        $casier->password = $request->input('password');
        $casier->update();
        return back()->with('status', 'votre compte a bien été modifié');
    }
    public function deletecasier($id)
    {
        $casier = Casier::find($id);
        $casier->delete();
        return back()->with('status', 'votre compte a bien été supprimé');
    }
    public function addaccount()
    {
        return view('admin.addaccount');
    }
    public function saveaccount(Request $request)
    {
        $this->validate($request, [
            'photo' => 'image|max:1999'
        ]);
        $fileNameWithExt = $request->file('photo')->getClientOriginalName();
        $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
        $ext = $request->file('photo')->getClientOriginalExtension();
        $fileNameToStore = $fileName . '_' . time() . '.' . $ext;

        $account = new Account();
        $account->name = $request->input('name');
        $account->accountnumber = $request->input('accountnumber');
        $account->city = $request->input('city');
        $account->email = $request->input('email');
        $account->balanche = $request->input('balanche');
        $account->phone = $request->input('phone');
        $account->cnic = $request->input('cnic');
        $account->accounttype = $request->input('accounttype');
        $account->address = $request->input('address');
        $account->password = $request->input('password');
        $account->source = $request->input('source');
        $account->photo = $fileNameToStore;
        $account->branchname = 'Equity BCDD';
        $account->branchcode = 1111332;

        $account->save();
        $statement = new Statement();
        $statement->name = $request->input('name');
        $statement->source = $request->input('accountnumber');
        $statement->destination = $request->input('accountnumber');
        $statement->amount = $request->input('balanche');
        $statement->status = 0;
        $statement->save();

        //uploaded image
        $path = $request->file('photo')->storeAs('public/account_images', $fileNameToStore);
        return back()->with('status', 'Votre a bien été ajouté avec success');
    }
    public function feedback()
    {
        $messages = Message::All();
        return view('admin.feedback')->with('messages',$messages);
    }
    public function deletefeed($id){
        $message = Message::find($id);
        $message->delete();
        return back()->with('status', 'Votre message a bien été supprimer avec success');


    }
    public function clientdetail($id)
    {
        $account = Account::find($id);
        return view('admin.clientdetails')->with('account',$account);
    }
    public function sendnotice($id)
    {
        $account = Account::find($id);
        return view('admin.sendnotice')->with('account',$account);
    }

    public function deleteclient($id){
        $account = Account::find($id);
        Storage::delete('public/account_image/'.$account->photo);
        $account->delete();
        return back()->with('status','votre compte a bien été supprimé avec success'); 
    }

    public function notice(Request $request){
        $notice = new Notice();

        $notice->message = $request->input('notice');
        $notice->accountnumber = $request->input('accountnumber');
        $notice->save();
        return back()->with('status','votre message a bien été envoyé avec success'); 

    }
}
