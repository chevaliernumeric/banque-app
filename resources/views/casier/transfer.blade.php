@extends('clientlayout.master')

@section('title')
    Transfer de fonds
@endsection
@section('content')
      <!-- start content -->
      <div class="row w-100" style="padding: 11px">
        <div class="col">
          <div class="card text-center w-75 mx-auto">
            <div class="card-header">
              Account Information
            </div>  
            <div class="card-body">
              <div class="row">
                <div class="col">
                  Account No.
                  <input type="text" value="{{$account->accountnumber}}" name="otherNo" class="form-control " readonly="" required="">
                  Account Holder Name.
                  <input type="text" class="form-control" value="{{$account->name}}" readonly="" required="">
                  Account Holder Bank Name.
                  <input type="text" class="form-control" value="{{$account->branchname}}" readonly="" required="">Bank Balance
                  <input type="text" class="form-control my-1" value="{{$account->balanche}}" readonly="" required="">
                </div>
                <div class="col">
                  Transaction Process.
                  <form action="{{url('casier/withdraw')}}" method="POST">
                    @csrf 
                    <input type="hidden" name="accountnumber" value="{{$account->accountnumber}}">
                    <div class="form-group">
                        <input type="number" class="form-control my-1" name="amount" placeholder="Write Amount for withdraw" max="16200" required="">
                    </div> 
  
                    <button type="submit" name="withdraw" class="btn btn-primary btn-bloc btn-sm my-1"> Withdraw</button>
  
                  </form>
                    
                  <form action="{{url('casier/deposit')}}" method="POST">
                    <input type="hidden" name="accountnumber" value="{{$account->accountnumber}}">

                    @csrf
  
                    <div class="form-group">
                          <input type="number" class="form-control my-1" name="amount" placeholder="Write Amount for deposit" required="">
                    </div>
  
                    <button type="submit" name="deposit" class="btn btn-success btn-bloc btn-sm my-1"> Deposit</button>
  
                  </form>
                </div>
              </div>
            </div>
            <div class="card-footer text-muted">
              MCB Bank  
            </div>
          </div>
        </div> 
      </div>
      <!-- end content -->
@endsection