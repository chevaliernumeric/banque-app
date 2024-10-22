@extends('casierlayout.master')

@section('title')
    Casier
    
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
              <p class="card-text">      
                <form action="{{url('casier/casiertransfer')}}" method="POST">
                  @csrf
                  <div class="alert alert-success w-50 mx-auto">
                    <h5>Enter Account Number</h5>
                    <div class="form-group">
                      <input type="text" name="accountnumber" class="form-control " placeholder="Enter  Account number" required>
                    </div>
                    <button type="submit" name="get" class="btn btn-primary btn-bloc btn-sm my-1">Get Account Info</button>
                  </div>
                </form>
              </p>
            </div>
            <div class="card-footer text-muted">
              MCB Bank  
            </div>
          </div>
        </div>
      </div>
      <!-- end content -->
@endsection