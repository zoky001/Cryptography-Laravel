<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="../../favicon.ico">

        <title>Blog Template for Bootstrap</title>

        <!-- Bootstrap core CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
       <!--
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>
       -->

        <link rel="stylesheet"  type="text/css"  href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css">

        <!-- proba-->
        <link rel="stylesheet"  type="text/css"  href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
        <link rel="stylesheet"  type="text/css"  href="https://cdn.datatables.net/buttons/1.4.1/css/buttons.dataTables.min.css">
        <!-- proba-->


    </head>

    <body>

        @include('layouts.nav')




        <div class="blog-header">
            <div class="container">
                <h1 class="blog-title">The Bootstrap Blog</h1>
                <p class="lead blog-description">An example blog template built with Bootstrap.</p>
            </div>
        </div>

        <div class="container">

            <div class="row">

                @yield ('content')

                @include ('layouts.sidebar')





            </div><!-- /.row -->

        </div><!-- /.container -->

        @include ('layouts.footer')

    </body>

    <!-- Jquery-->







    <!--
       <script src="https://cdn.datatables.net/buttons/1.4.1/js/dataTables.buttons.min.js"></script>
       <script src="//cdn.datatables.net/buttons/1.4.1/js/buttons.print.min.js"></script>
       <script src="https://cdn.datatables.net/select/1.2.2/js/dataTables.select.min.js"></script>
      <script src="//code.jquery.com/jquery-1.12.4.js"></script>
    
    -->






    <!-- proba-->
    <script src="//code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.4.1/js/dataTables.buttons.min.js"></script>
    <script src="//cdn.datatables.net/buttons/1.4.1/js/buttons.flash.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>

    <script src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>

    <script src="//cdn.datatables.net/buttons/1.4.1/js/buttons.html5.min.js"></script>
    <script src="//cdn.datatables.net/buttons/1.4.1/js/buttons.print.min.js"></script>
    <!-- proba-->


    <!-- Custom styles for this template -->
    <link href="css/blog.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <script src="js/domMyHome.js" ></script>










</html>