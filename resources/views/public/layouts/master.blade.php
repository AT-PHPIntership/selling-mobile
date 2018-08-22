<!DOCTYPE html>
<html lang="en">
  <head>
    @include('public.includes.head')
  </head>
  <body>
    @include('public.includes.header')
    @include('public.includes.navigation')
    @yield('home')
    @yield('content')
    @include('public.includes.footer')
  </body>
</html>
