<!DOCTYPE html>
<html lang="en">

    <head>        
        @include('admin.layout.meta')

        <title>@yield('title') | Sashtakon</title>

        @include('admin.layout.styles')
    </head>

    <body class="fixed-navbar">
        <div class="page-wrapper">

            @include('admin.layout.header')

            @include('admin.layout.sidebar')
            <div class="content-wrapper">
                
                @include('admin.layout.breadcumb')

                @yield('content')
                
                @include('admin.layout.footer')

            </div>

        </div>

        <!-- admin.layout.theme-config -->

        @include('admin.layout.loader')

        @include('admin.layout.scripts')

    </body>

</html>