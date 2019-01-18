@extends('layouts.app')
@section('titulo')
  {{trans('login.perfil')}}
@stop
@section('content')
  <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="clearfix"></div>
    <div class="box">
      <div class="box-body">
        <div class="col-sm-8">
          <div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
            <label for="nombre">{{trans('login.nombre')}}</label>
            <input type="text" class="form-control" name="nombre" placeholder="{{trans('login.nombre')}}" value="{{ $me->nombre }}" autofocus>
            @if ($errors->has('nombre'))
              <span class="help-block">
                <strong>{{ $errors->first('nombre') }}</strong>
              </span>
            @endif
          </div>

          <div class="form-group{{ $errors->has('passwordactual') ? ' has-error' : '' }}">
            <label for="passwordactual">{{trans('login.passwordactual')}}</label>
            <input type="password" class="form-control" name="passwordactual" placeholder="{{trans('login.passwordactual')}}">
            @if ($errors->has('passwordactual'))
              <span class="help-block">
                <strong>{{ $errors->first('passwordactual') }}</strong>
              </span>
            @endif
          </div>

          <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <label for="password">{{trans('login.nuevapassword')}}</label>
            <input type="password" class="form-control" name="password" placeholder="{{trans('login.passwordnocambiar')}}">
            @if ($errors->has('password'))
              <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
              </span>
            @endif
          </div>
          <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
            <label for="password_confirmation">{{trans('login.repetirpassword')}}</label>
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="{{trans('login.repetirpassword')}}">
            @if ($errors->has('password_confirmation'))
              <span class="help-block">
                <strong>{{ $errors->first('password_confirmation') }}</strong>
              </span>
            @endif
          </div>
        </div>
        <div class="col-sm-4">
          <div class="attachment-block clearfix">
            <div class="col-sm-12">
              @if($me->avatar)
                <img src="data:image/png;base64,{{Auth::user()->avatar}}" class="img-circle pull-right" alt="Usuario">
              @else
                <img src="/images/user-generic.jpg" class="img-circle pull-right" alt="Usuario">
              @endif
              <div class="clearfix"></div>
              <div class="form-group">
                <label for="exampleInputFile">{{trans('login.perfilfoto')}}</label>
                <input type="file" name="foto">
                <p class="help-block">100x100 px</p>
                @if ($errors->has('foto'))
                  <span class="help-block">
                    <strong>{{ $errors->first('foto') }}</strong>
                  </span>
                @endif
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="box-footer">
        <input type="submit" class="btn btn-primary" value="{{trans('login.guardar')}}">
      </div>
    </div>
  </form>
@endsection
