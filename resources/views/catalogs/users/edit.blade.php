@extends($template)

@section('breadcrumb')
    {!! $breadcrumb !!}
@stop

@section('titulo')
{!!$data?'Editar':'Nuevo'!!} Usuario
@stop

@section('content')
    @if(Session::get('message'))
        <div class="alert alert-{!! Session::get('type') !!} alert-dismissable .mrgn-top">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            {!! Session::get('message') !!}
        </div>
    @endif
    @if($data)
    <form action="/catalogos/usuarios/{{$id}}" method="POST" class="form-horizontal" id="frmUsuario">
        <input type="hidden" name="_method" value="PUT"/>
    @else
    <form action="/catalogos/usuarios" method="POST" class="form-horizontal" id="frmUsuario">
    @endif

        {{csrf_field()}}
        <div class="form-group">
        <label for="{!! trans('login.nombre') !!}" class="col-sm-2 control-label">{!! trans('login.nombre') !!}</label>
        <div class="col-sm-5">
            <?php $campo = 'nombre'; ?>
          <input
                    type         = "text"
                    class        = "form-control"
                    id           = "nombre"
                    name         = "nombre"
                    placeholder  = "{!! trans('login.nombre') !!}"
                    value        = "{!! $data?$data->nombre:'' !!}"
                    autocomplete = "off"
            data-fv-notempty = "true"
            >
        </div>
        </div>

        <div class="form-group">
        <label for="{!! trans('login.email') !!}" class="col-sm-2 control-label">{!! trans('login.email') !!}</label>
        <div class="col-sm-5">
            <?php $campo = 'email'; ?>
          <input
                    type         = "text"
                    class        = "form-control"
                    id           = "email"
                    name         = "email"
                    placeholder  = "{!! trans('login.email') !!}"
                    value        = "{!! $data?$data->email:'' !!}"
                    autocomplete = "off"
            data-fv-notempty = "true"
            <?php if(config('csgtlogin.usuario.tipo','email')=='email') { ?>
            data-fv-emailAddress = "true"
            data-fv-emailAddress-message = "{{trans('login.incorrect')}}"
                    <?php } ?>
            >
        </div>
      </div>
      <div class="form-group">
      <label for="rolid" class="col-sm-2 control-label">{{trans('cancerbero.rol')}}</label>

        <div class="col-sm-10">
        <select name="rolid[]" class="selectpicker" multiple autocomplete="off">
            @foreach ($roles as $rol)
                <option value="{{Crypt::encrypt($rol->rolid)}}" {!! (in_array($rol->rolid, $usuarioroles) ? 'selected="selected"':'') !!}>{{$rol->nombre}}</option>
            @endforeach
        </select>
      </div>
    </div>
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <label>
                <input type="checkbox" name="activo" value="1" {{($data?($data->activo?'checked':''):'checked')}}>
                {{ trans('usuario.activo') }}
            </label>
        </div>
      </div>
      @if(config('csgtlogin.vencimiento.habilitado'))
      <div class="form-group">
        <div class="col-sm-2">&nbsp;</div>
        <div class="col-sm-10">
            <input type="checkbox" value="1" checked name="vencimiento"> <label for="vencimiento">Usuario debe cambiar la contraseña</label>
        </div>
      </div>
      @endif
    <div class="form-group">
      <label for="password" class="col-sm-2 control-label">{!! trans('login.password') !!}</label>
      <div class="col-sm-5">
        <input
                    type                         = "password"
                    class                        = "form-control"
                    name                         = "password"
                    id                           = "password"
                    autocomplete                                 = "off"
                    placeholder                  = "{!! trans('login.password') !!}"
                    autocomplete                 = "off"
                    data-fv-identical            = "true"
                    data-fv-identical-field      = "password2"
                    data-fv-identical-message    = "{{ trans('login.passwordnoigual') }}"
                    data-fv-stringlength         = "true"
                    data-fv-stringlength-min     = "6"
                    data-fv-stringlength-message = "{{ trans('login.passwordmin') }}"
                    {!!$data?'':'data-fv-notEmpty = "true"'!!}>
      </div>
       <div class="col-sm-5">
        <input
                    type                         = "password"
                    class                        = "form-control"
                    name                         = "password2"
                    autocomplete                                 = "off"
                    placeholder                  = "{!! trans('login.repetirpassword') !!}"
                    autocomplete                 = "off"
                    data-fv-identical            = "true"
                    data-fv-identical-field      = "password"
                    data-fv-identical-message    = "{{ trans('login.passwordnoigual') }}"
                    data-fv-stringlength         = "true"
                    data-fv-stringlength-min     = "6"
                    data-fv-stringlength-message = "{{ trans('login.passwordmin') }}" >
      </div>
    </div>
    @if($data)
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <small>{{ trans('usuario.nocambiarpassword') }}</small>
        </div>
      </div>
      @endif
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <input type="submit" value="Guardar" class="btn btn-primary">
        </div>
      </div>
    </form>
@stop
@section('javascript')
    <script type="text/javascript">
        $(function() {
            @if(!$data)
                $('input').value = "";
            @endif

            $('.selectpicker').selectize();

            $('#frmUsuario').formValidation({
        message: 'El campo es requerido',
        live: 'submitted',
        excluded: [':disabled'],
        feedbackIcons: {
          valid: 'glyphicon glyphicon-ok',
          invalid: 'glyphicon glyphicon-remove',
          validating: 'glyphicon glyphicon-refresh'
        }
      });
        });
    </script>
@stop
