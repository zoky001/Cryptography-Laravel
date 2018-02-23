<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" href="" type="image/ico">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Cryptography') }}</title>

        <!-- Jquery-->







 <!-- Angular Material style sheet -->
  <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/angular_material/1.1.0/angular-material.min.css">


        <!-- Styles -->
        <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">
      

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="http://www.w3schools.com/lib/w3-colors-highway.css">
        <link rel="stylesheet" href="http://www.w3schools.com/lib/w3-colors-food.css">
        <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">


        <!-- datatable-css-->
        <link rel="stylesheet"  type="text/css"  href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
        <link rel="stylesheet"  type="text/css"  href="https://cdn.datatables.net/buttons/1.4.1/css/buttons.dataTables.min.css">
        <!-- datatable-css-->
        
        
   <link rel="stylesheet"  type="text/css"  href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css">



        <style>
            body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", Arial, Helvetica, sans-serif}

        </style>

    </head>
    <body >
        <div id="app">
            
            @if($flash = session('message'))
   
     
             <div id="flash-message" class="panel panel-success hidden-xs hidden-sm">
      <div class="panel-heading">
          Obavijest
      </div>
      
      <div class="panel-body">
          {{ $flash }}
      </div>
    </div>
    @endif

            @include('layouts.navbar')

            @yield('content')

            @include('layouts.footer')
        </div>





        <!-- datatable-->
        <script src="//code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.4.1/js/dataTables.buttons.min.js"></script>


        <script src="//cdn.datatables.net/buttons/1.4.1/js/buttons.flash.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>

        <script src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>

        <script src="//cdn.datatables.net/buttons/1.4.1/js/buttons.html5.min.js"></script>
        <script src="//cdn.datatables.net/buttons/1.4.1/js/buttons.print.min.js"></script>

        <script src="//cdn.datatables.net/buttons/1.4.1/js/buttons.colVis.min.js"></script>
        <!-- datatable-->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.js"></script>

        <!--angular -->
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular-animate.js"></script>
        
        
        <!-- angular -->
        
  <!-- Angular Material requires Angular.js Libraries
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular-animate.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular-aria.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular-messages.min.js"></script>

  <!-- Angular Material Library 
  <script src="https://ajax.googleapis.com/ajax/libs/angular_material/1.1.0/angular-material.min.js"></script>
  
Your application bootstrap  -->
 
        <!-- angular-->
        <script src="{{secure_asset('js/myApp.js')}}"></script>

        <script src="{{ secure_asset('js/myCtrl.js') }}"></script>
        <!--angular -->

        <!-- Scripts 
        <script src="{{ asset('js/app.js') }}"></script>
        <!-- Custom styles for this template -->


    
        
        
               
    </body>
</html>
