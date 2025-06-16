<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Trolley Way</title>
		
		<!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="{{asset('manager\assets\img\favicon.png')}}">

		<!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{asset('manager\assets\css\bootstrap.min.css')}}">
		
		<!-- Fontawesome CSS -->
        <link rel="stylesheet" href="{{asset('manager\assets\css\font-awesome.min.css')}}">
		
		<!-- Main CSS -->
        <link rel="stylesheet" href="{{asset('manager\assets\css\style.css')}}">

        <!-- vuejs -->
        <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="https://unpkg.com/vue-currency-input"></script>
        
    </head>
    <body>
	
        <div>
            @yield('content')
        </div>
		
		<!-- jQuery -->
        <script src="{{asset('manager\assets\js\jquery-3.2.1.min.js')}}"></script>
		
		<!-- Bootstrap Core JS -->
        <script src="{{asset('manager\assets\js\popper.min.js')}}"></script>
        <script src="{{asset('manager\assets\js\bootstrap.min.js')}}"></script>
		
		<!-- Custom JS -->
		<script src="{{asset('manager\assets\js\script.js')}}"></script>
		<script src="{{asset('js\app.js')}}"></script>
    </body>
</html>