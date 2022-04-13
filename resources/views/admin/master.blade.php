<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Admin Dashboard</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{url('backend/assets/css/bootstrap.css')}}">

    <link rel="stylesheet" href="{{url('backend/assets/vendors/iconly/bold.css')}}">

    <link rel="stylesheet" href="{{url('backend/assets/vendors/perfect-scrollbar/perfect-scrollbar.css')}}">
    <link rel="stylesheet" href="{{url('backend/assets/vendors/bootstrap-icons/bootstrap-icons.css')}}">
    <link rel="stylesheet" href="{{url('backend/assets/css/app.css')}}">
    <link rel="shortcut icon" href="{{url('backend/assets/images/favicon.svg')}}" type="image/x-icon">
</head>

<body>
    <div id="app">
        {{-- Sidebar --}}
        @include('admin.partials.sidebar')
        <div id="main">
            @include('admin.partials.header')
                @yield('content')
            @include('admin.partials.footer')
        </div>
    </div>

    <script src="{{url('backend/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
    <script src="{{url('backend/assets/js/bootstrap.bundle.min.js')}}"></script>

    <script src="{{url('backend/assets/vendors/apexcharts/apexcharts.js')}}"></script>
    <script src="{{url('backend/assets/js/pages/dashboard.js')}}"></script>

    <script src="{{url('backend/assets/js/main.js')}}"></script>
</body>

</html>
