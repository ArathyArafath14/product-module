<!DOCTYPE html>
<html>
<head>
<title>Dashboard</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">
<meta name="csrf-token" content="{{ csrf_token() }}">
<!--Bootsrap 4 CDN-->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="{{url('style.css')}}">
</head>
<style type="text/css">
.topnav {
  background-color: #333;
  overflow: hidden;
}

/* Style the links inside the navigation bar */
.topnav a {
  float: left;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

/* Change the color of links on hover */
.topnav a:hover {
  background-color: #ddd;
  color: black;
}

/* Create a right-aligned (split) link inside the navigation bar */
.topnav a.split {
  float: right;
  background-color: #090a0a;
  color: white;
}
</style>
<body>
<div class="container-fluid">
<div class="row no-gutter">
<div class="d-none d-md-flex col-md-12 col-lg-6"></div>
<div class="col-md-8 col-lg-12">
<div class="login d-flex align-items-center py-5">
<div class="container">
<div class="row">
<div class="col-md-9 col-lg-8 mx-auto">
<h3 class="login-heading mb-4">Welcome Dashboard!</h3>
<div class="card">

<div class="topnav">
  <a href='{{ route("products.index")}}'>Product</a>
 
  <a href="{{url('logout')}}" class="split">Logout</a>
</div>
<div class="card-body">
Welcome {{ ucfirst(Auth()->user()->name) }}
</div>
</div>
</div>
</div>


</div>
</div>
</div>
</div>
</div>
</body>
</html>