@extends('layouts.login')
@section('content')
  <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
    {{ csrf_field() }}
    <h3>{{trans('login.iniciarsesion')}}</h3>
    <div class="clearfix"></div>
    <div class="col-sm-12">
      @if(config('csgtlogin.facebook.habilitado', false))
      <div class="form-group">
        <a href="/oauth/facebook" class="btn btn-social btn-block btn-facebook">
          <i class="fa fa-facebook"></i>{{trans('login.loginfacebook')}}
        </a>
      </div>
      @endif
      @if(config('csgtlogin.google.habilitado', false))
      <div class="form-group">
        <a href="/oauth/google" class="btn btn-social btn-block btn-google-plus">
          <i class="fa fa-google-plus"></i>{{trans('login.logingoogle')}}
        </a>
      </div>
      @endif
    </div>
    <div class="clearfix"></div>
    <hr>
    @if($errors->has('extra'))
      @foreach ($errors->all() as $error)
        <div class="alert alert-danger" role="alert">{{ $error }}</div>
      @endforeach
    @endif
    <div class="col-sm-12">
      <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
        <input type="text" class="form-control" name="email" placeholder="{{trans('login.email')}}" value="{{ old('email') }}" autofocus>
        @if ($errors->has('email'))
          <span class="help-block">
            <strong>{{ $errors->first('email') }}</strong>
          </span>
        @endif
      </div>
    </div>
    <div class="col-sm-12">
      <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
        <input type="password" class="form-control" name="password" placeholder="{{trans('login.password')}}">
        @if ($errors->has('password'))
          <span class="help-block">
            <strong>{{ $errors->first('password') }}</strong>
          </span>
        @endif
      </div>
    </div>
    <div class="row">
      <div class="col-xs-6 text-left">
        <div class="checkbox">
            <label>
                <input type="checkbox" name="remember">{{trans('login.recuerdame')}}
            </label>
        </div>
      </div>
      <div class="col-xs-6">
        <input type="submit" class="btn btn-primary btn-block" value="{{trans('login.login')}}">
      </div>
    </div>

    <a class="btn btn-link btn-forgot" href="{{ url('/password/reset') }}"><small>{{trans('login.olvidaste')}}</small></a>
    <br>
    @if(config('csgtlogin.registro.habilitado', false))
    <a class="btn btn-link btn-forgot" href="{{ url('/register') }}"><small>{{trans('login.registrate')}}</small></a>
    @endif
  </form>
@endsection
