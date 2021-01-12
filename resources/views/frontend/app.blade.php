<!DOCTYPE html>
<html lang="en" class="no-js">

<head>
   
    @include('frontend.partials.head')

    @stack('styles')

</head>

<body>
    <!-- Loader -->
    <!-- <div id="preloader">
        <div id="status">
            <div class="spinner">
                <div class="double-bounce1"></div>
                <div class="double-bounce2"></div>
            </div>
        </div>
    </div> -->
    <!-- Loader -->

   @include('frontend.partials.header')

  
   @yield('content')
   

   @include('frontend.partials.footer')
   @stack('scripts')

</body>
</html>