@extends('clientlayout.master')

@section('title')
    Detail
@endsection
@section('content')
 <!-- start content -->
 <div class="container">
    <div class="card  w-75 mx-auto">
      <div class="card-header text-center">
        Funds Transfer
      </div>
      <div class="card-body">
        <div class="alert alert-success w-50 mx-auto">
          <form action="{{url('client/transfer')}}" method="POST">
            @csrf
            Account No.
            <input type="text" value="{{$account->accountnumber}}" name="accountnumber" class="form-control " readonly="" required="">
            Account Holder Name.
            <input type="text" class="form-control" name="accountname" value="{{$account->name}}" readonly="" required="">
            Account Holder Bank Name.
            <input type="text" class="form-control" name="accountbanque" value="{{$account->branchname}}" readonly="" required="">
            Enter Amount for tranfer.
            <input type="number" name="amount" class="form-control" min="1" max="16200" required="">
            <button type="submit" name="transferSelf" class="btn btn-primary btn-bloc btn-sm my-1">Tranfer</button>
          </form>
        </div> <br>
        <h5>Transfer History</h5>
        <div class="alert alert-warning">Transfer have been made for  Rs.200 from your account at 2022-03-28 15:35:46 in  account no.10054777
        </div>  
      </div>
      <div class="card-footer text-muted">
      MCB Bank  
      </div>
    </div>
  </div>
  <!-- end content -->
@endsection