<html lang="fa" dir="rtl">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>فروشگاه اینترنتی دیجی‌کالا</title>

   <!-- Style And Bootstrap -->
   <link rel="stylesheet" href="{{ asset('Frontend/css/all.css') }}">
   <link rel="stylesheet" href="{{ asset('Frontend/css/bootstrap.min.css') }}">
   <link rel="stylesheet" href="{{ asset('Frontend/css/swiper-bundle.min.css') }}">
   <link rel="stylesheet" href="{{ asset('Frontend/css/style.css') }}">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
   <!-- Style And Bootstrap -->
   @foreach ($logo as $item)
      @if ($item->position == 'favicon')
         <link rel="icon" href="{{ asset('images/logo').'/'.$item->image }}">
      @endif
   @endforeach
</head>
<body>

   @include('layouts.header')

   <div>
      @yield('content')
   </div>

   @include('layouts.footer')
   
   <!-- Script -->
   <script src="{{ asset('Frontend/js/jquery.js') }}"></script>
   <script src="{{ asset('Frontend/js/all.js') }}"></script>
   <script src="{{ asset('Frontend/js/persianumber.min.js') }}"></script>
   <script src="{{ asset('Frontend/js/jalali.js') }}"></script>
   <script src="{{ asset('Frontend/js/bootstrap.bundle.min.js') }}"></script>
   <script src="{{ asset('Frontend/js/swiper-bundle.min.js') }}"></script>
   <script src="{{ asset('Frontend/js/script.js') }}"></script>

   <script>
      $(document).ready(function (){
         $('*').persiaNumber();
      });
      
   </script>
   <!-- Script -->
</body>
</html>