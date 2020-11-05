<!DOCTYPE html>
<html lang="en">
    <head>

        @include('user.layout.meta')

        <title>@yield('title') | sashtakon</title>
        
        @include('user.layout.styles')        
    </head>

    <body>

        @include('user.layout.header')

        
        @yield('content')
        
        @include('user.layout.footer')
        
        @include('user.layout.auth_model')

        @include('user.layout.verticle-center')
    
        @include('user.layout.scripts')

    </body>
</html>