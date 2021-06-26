<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ env('APP_NAME') }}</title>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        @include('layouts.css')
    </head>
    <body>
        <div id="app">
            <div class="{{ !Request::is('list-client') ? 'flex-center' : '' }} position-ref full-height">
                <div class="content">
                    <div class="title m-b-md">
                        {{ env('APP_NAME') }}
                    </div>
        
                    @yield('content')
                </div>
            </div>
        </div>
        <script src="{{ asset('js/app.js') }}"></script>
        @include('layouts.js')
    </body>
</html>
