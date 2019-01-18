<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="{{env('APP_COMPANY')}}">
        <meta name="csrf-token" content="{{csrf_token()}}">
        <title>Login - {{config('app.name')}}</title>
        <link rel="stylesheet" type="text/css" href="{{ mix('/css/app.css') }}">
    </head>
    <body class="hold-transition login-page">
        <div class="login-box" id="app">
            <div class="login-logo">
                {{config('app.name')}}
            </div>
            <div class="card">
                <div class="card-body login-card-body">
                    @yield('content')
                </div>
            </div>
        </div>
        <script src="{{ mix('/js/app.js') }}"></script>
    </body>
</html>
