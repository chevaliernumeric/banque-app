<!DOCTYPE html>
<html>
  <head>
    <title>Banking</title>
    <link rel="stylesheet" type="text/css" href="{{asset('style/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('style/css/custom.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('style/font-awesome/css/font-awesome.min.css')}}">
    <script src='{{asset('style/js/jquery-3.2.1.min.js')}}'></script>
    <script src='{{asset('style/js/popper.min.js')}}'></script>
    <script src='{{asset('style/js/bootstrap.min.js')}}'></script>
    <script type="text/javascript">
      $(function () {
      $('[data-toggle="tooltip"]').tooltip()
    });
    </script>    
  </head>

  <body style="background:#96D678;background-size: 100%">
    <!-- start navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <a class="navbar-brand" href="#">
        <img src="{{asset('style/images/logo.png')}}" width="30" height="30" class="d-inline-block align-top" alt="">
        MCB Bank  
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item ">
            <a class="nav-link active" href="cindex.html">Home <span class="sr-only">(current)</span></a>
          </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
          <button class="btn btn-outline-success">Welecome Cashier</button>
          <a href="{{url('casier/logoutc')}}" data-toggle="tooltip" title="Logout" class="btn btn-outline-danger mx-1" ><i class="fa fa-sign-out fa-fw"></i></a>    
        </form>    
      </div>
    </nav><br><br><br>
    <!-- end navbar -->