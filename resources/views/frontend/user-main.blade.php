<!DOCTYPE html>
<html lang="en">

<head>
    <title>Password Management Vault</title>
    @include('frontend.layouts.meta')
    @include('frontend.layouts.styles')
    @stack('styles')
    <script>
        window.baseUrl = "{{ env('APP_URL') }}";
    </script>
</head>

  <body class="site-background">

    <main class="min-h-screen pb-24 lg:pb-10">
        @yield('content')
    </main>

    @include('frontend.layouts.footer')
    @include('frontend.layouts.scripts')

    @stack('scripts')
   
  </body>

</html>