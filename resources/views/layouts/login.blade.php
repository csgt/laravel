<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Compuservice">
    <title>Login - {{config('app.name')}}</title>
    <link type="text/css" rel="stylesheet" href="/css/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="/css/font-awesome.min.css">
    <link type="text/css" rel="stylesheet" href="/css/AdminLTE.min.css">
    <link type="text/css" rel="stylesheet" href="/css/skins/{{config('csgtlogin.adminlte-skin','skin-black')}}.min.css">
    <style type="text/css">
      html, body {
        height: 100% !important;
      }
      hr {
        border-color: #ccc -moz-use-text-color -moz-use-text-color;
        margin-top: 15px;
      }

      h3 {
        font-weight: normal;
      }

      .box-login {
        /*background-color: #eee; */
        margin-top: 25%;
       /* box-shadow: 1px 1px 1px #666; */
      }

      .contenido {
        padding-top: 45px;
      }

      .icono {
        position: absolute;
        left: 50%;
        margin-top:-72px;
        margin-left: -56px;
        text-shadow: 1px 1px 1px #666;
      }

      .form-group {
        margin-bottom: 8px;
      }

      .btn-forgot {
        margin-top: 15px;
      }

      .btn-social{position:relative;padding-left:44px;text-align:left;white-space:nowrap;overflow:hidden;text-overflow:ellipsis}
      .btn-social>:first-child{position:absolute;left:0;top:0;bottom:0;width:32px;line-height:34px;font-size:1.6em;text-align:center;border-right:1px solid rgba(0,0,0,0.2)}
      .btn-social-icon{position:relative;padding-left:44px;text-align:left;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;height:34px;width:34px;padding:0}
      .btn-social-icon>:first-child{position:absolute;left:0;top:0;bottom:0;width:32px;line-height:34px;font-size:1.6em;text-align:center;border-right:1px solid rgba(0,0,0,0.2)}
      .btn-social-icon :first-child{border:none;text-align:center;width:100% !important}
      .btn-facebook{color:#fff;background-color:#3b5998;border-color:rgba(0,0,0,0.2)}.btn-facebook:hover,.btn-facebook:focus,.btn-facebook:active,.btn-facebook.active,.open>.dropdown-toggle.btn-facebook{color:#fff;background-color:#2d4373;border-color:rgba(0,0,0,0.2)}
      .btn-facebook:active,.btn-facebook.active,.open>.dropdown-toggle.btn-facebook{background-image:none}
      .btn-facebook.disabled,.btn-facebook[disabled],fieldset[disabled] .btn-facebook,.btn-facebook.disabled:hover,.btn-facebook[disabled]:hover,fieldset[disabled] .btn-facebook:hover,.btn-facebook.disabled:focus,.btn-facebook[disabled]:focus,fieldset[disabled] .btn-facebook:focus,.btn-facebook.disabled:active,.btn-facebook[disabled]:active,fieldset[disabled] .btn-facebook:active,.btn-facebook.disabled.active,.btn-facebook[disabled].active,fieldset[disabled] .btn-facebook.active{background-color:#3b5998;border-color:rgba(0,0,0,0.2)}
      .btn-facebook .badge{color:#3b5998;background-color:#fff}
      .btn-google-plus{color:#fff;background-color:#dd4b39;border-color:rgba(0,0,0,0.2)}.btn-google-plus:hover,.btn-google-plus:focus,.btn-google-plus:active,.btn-google-plus.active,.open>.dropdown-toggle.btn-google-plus{color:#fff;background-color:#c23321;border-color:rgba(0,0,0,0.2)}
      .btn-google-plus:active,.btn-google-plus.active,.open>.dropdown-toggle.btn-google-plus{background-image:none}
      .btn-google-plus.disabled,.btn-google-plus[disabled],fieldset[disabled] .btn-google-plus,.btn-google-plus.disabled:hover,.btn-google-plus[disabled]:hover,fieldset[disabled] .btn-google-plus:hover,.btn-google-plus.disabled:focus,.btn-google-plus[disabled]:focus,fieldset[disabled] .btn-google-plus:focus,.btn-google-plus.disabled:active,.btn-google-plus[disabled]:active,fieldset[disabled] .btn-google-plus:active,.btn-google-plus.disabled.active,.btn-google-plus[disabled].active,fieldset[disabled] .btn-google-plus.active{background-color:#dd4b39;border-color:rgba(0,0,0,0.2)}
      .btn-google-plus .badge{color:#dd4b39;background-color:#fff}
    </style>
  </head>
  <body class="{{config('csgtlogin.adminlte-skin','skin-black')}}">
    <div class="wrapper">
      <div class="col-lg-4 col-lg-offset-4 col-sm-offset-3 col-sm-6">
        <div class="box box-default box-login">
          <div class="box-body">
            <div class="icono">
              <span class="fa-stack fa-4x text-primary">
                <i class="fa fa-circle fa-stack-2x"></i>
                <i class="fa fa-{{$icon}} fa-stack-1x fa-inverse"></i>
              </span>
            </div>
            <div class="contenido text-center">
              @yield('content')
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>