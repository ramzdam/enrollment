<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Enrollment System</title>
    @include('partials.header')

</head>
<body>
    @include('partials.nav')
    <div class="container" style="margin-top: 50px;">

        <div id="content">
            <div class="alert alert-danger error_container" role="alert" style="display: none;">
                <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                <span class="sr-only">Error:</span>
                <span class="error_message">Enter a valid email address</span>
            </div>
            @yield('content')
        </div>

    </div>
    @include('partials.footer')
</body>
</html>