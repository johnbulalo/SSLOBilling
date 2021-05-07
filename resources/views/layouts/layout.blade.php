<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>SSLO Billing</title>

        <link href="/css/style.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.18/vue.min.js"></script>
        <!-- Styles -->
        
    </head>
    <body class="antialiased">
        @yield('content')

        <footer class="footer">
            <div class="container">
                <div class="row align-items-left">
                    <div class="col-lg-4 text-lg-left">Copyright © Santiago & Santiago Law Office 2021</div>
                </div>
            </div>
        </footer>
    </body>
</html>