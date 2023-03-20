<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>PM Vault</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body class="antialiased">
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
                <section class="text-gray-700 body-font">
                  <div class="container mx-auto flex px-5 py-24 md:flex-row flex-col items-center">
                    <div class="lg:flex-grow md:w-1/2 lg:pr-24 md:pr-16 flex flex-col md:items-start md:text-left mb-16 md:mb-0 items-center text-center">
                      <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900">Password Management Vault
                      </h1>
                      <p class="mb-8 leading-relaxed">Secure your passwords with a password management vault to safeguard your digital identity.</p>
                      @if (Route::has('login'))
                          <div class="flex justify-center">
                            @auth
                                <a href="{{ url('/dashboard') }}" class="inline-flex text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg">Dashboard</a>
                            @else
                                <a href="{{ route('login') }}" class="inline-flex text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg">Login</a>
                                    @if (Route::has('register'))
                                        <a href="{{ route('register') }}" class="ml-4 inline-flex text-gray-700 bg-gray-200 border-0 py-2 px-6 focus:outline-none hover:bg-gray-300 rounded text-lg">Register</a>
                                    @endif
                            @endauth
                          </div>
                      @endif
                    </div>
                  </div>
                </section>
            </div>
        </div>
    </body>
</html>
