<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- jQuery (important for Toastr and Bootstrap) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard_style/dashboard9.css') }}">

    <title>Responsive Sidebar</title>
</head>
<body>    
    <div class="upbar d-flex">
        <h4 class="mt-2" style="text-indent: 100px; color: white; font-family: FreeMono, monospace; letter-spacing: 2px;">
            {{ (isset($product) ? 'Product' : '') . (isset($purchase) ? 'Purchase' : '') . (isset($dashboard) ? 'Dashboard' : '') }}
        </h4>
    </div>

    <div id="overlay" class="overlay"></div>
  
    <!-- Sidebar -->
    <div id="sidebar" class="sidebar"> 
        <ul>
            <li class="mt-4"><a href=""><i class="bi bi-person-circle"></i> User</a></li>
            <li><a href="{{route('dashboard')}}"><i class="bi bi-bar-chart"></i> Dashboard</a></li>
            <li><a href="{{route('purchase')}}"><i class="bi bi-cart"></i> Purchase</a></li>
            <li><a href="{{route('product')}}"><i class="bi bi-box"></i> Product</a></li>
            <li><a href="{{route('product')}}"><i class="bi bi-box"></i> Budget</a></li>
            <li><a href="#"><i class="bi bi-envelope"></i> Contact developer</a></li>
        </ul>
    </div>
    <button id="openBtn" class="open-btn">&#9776; </button>
    <!-- Sidebar end -->

    <!-- Include any additional scripts -->
    @include('layout.script')

</body>
</html>
