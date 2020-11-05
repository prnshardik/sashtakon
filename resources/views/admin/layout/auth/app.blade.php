<!DOCTYPE html>
<html lang="en">

    <head>        
        @include('admin.layout.auth.meta')

        <title>@yield('title') | {{ _setting('site_title') }}</title>

        @include('admin.layout.auth.styles')
    </head>

    <body class="bg-silver-300">

        @yield('content')
        
        @include('admin.layout.auth.loader')

        @include('admin.layout.auth.scripts')

    </body>

</html>