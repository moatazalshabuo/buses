<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- @vite('resources/css/app.css') --}}
       <title>جامعتي</title>
       <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
       <link href="https://fonts.googleapis.com/css?family=Cairo&display=swap" rel="stylesheet">
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
       <script src="https://cdn.tailwindcss.com"></script>
       <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
       <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
       <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
       <script>
        tailwind.config = {
          theme: {
            extend: {
              colors: {
                clifford: '#da373d',
              }
            }
          }
        }
      </script>
       <style type="text/tailwindcss">
    @layer utilities {
      .content-auto {
        content-visibility: auto;
      }
    }
  </style>
     <style>

           @import url('https://fonts.googleapis.com/css?family=Cairo&display=swap');

           .cairo {

               font-family: 'Cairo', sans-serif;

           }
#d1{
    width: 100%;
    height: 70%;

float: right;
}
#d2{
    width: 15%;
    height: 450px;
    float: right;

}
#d3{
    width: 50%;
    height:  400px;
    float: right;
}
       </style>
</head>
<body class="cairo"  dir="rtl">
    <!-- header-->
<div  id="d1">
    @include('dashboard.navbar')
</div>
    <!--end header -->

        <!-- Sidebar -->
<div id="d2" >
    @include('dashboard.sidebar')

</div>


        <!-- end sidebar-->

    <!-- content section  -->

 <div class="" id="d3">
     @yield('content')
    </div>
    <!-- end content -->

    <!-- footer -->
    @yield('cz')
    <!-- end footer-->

</body>
</html>
