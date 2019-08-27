@extends($template)
@section('title')
	{!! $title !!}
@stop
@section('breadcrumb')
	{!! $breadcrumb !!}
@stop
@section('content')

	@if(Session::get('flashMessage'))
    <div class="alert alert-{!! Session::get('flashType', 'danger') !!} alert-dismissable">
      	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      	{!!Session::get('flashMessage')!!}
    </div>
  @endif
  @if($data)
	<form method="POST" action="/catalogos/roles/{{ $id }}">
		<input type="hidden" name="_method" value="PUT"/>
	@else
	<form method="POST" action="/catalogos/roles">
	@endif
		{{ csrf_field() }}
		<div class="box box-default">
			<div class="box-body">
				<div clas="row">
					<div class="form-group col-sm-12">
						<label for="name">Nombre</label>
						<input name="name" type="text" class="form-control" id="name" value="{{ ($data?$data->name:'') }}"/>
					</div>
					<div class="form-group col-sm-12">
						<label for="description">Descripción</label>
						<input name="description" type="text" class="form-control" id="description" value="{{ ($data?$data->description:'') }}"/>
					</div>

					<div class="col-sm-12">
						<a href="javascript:void(0);" class="lnkTodosC">Todos</a> |
						<a href="javascript:void(0);" class="lnkNingunoC">Ninguno</a>
					</div>

					<div class="clearfix"></div>
					<br>
					<div class="col-md-12">
						<input type="submit" class="btn btn-primary" value="Guardar">
					</div>
					<input type="hidden" name="id" value="{{ $id }}" />
				</div>
			</div>
		</div>
	</form>
	<div class="clearfix"></div>
@stop
@section('javascript')
<script>
	$(document).ready(function(){
		function pintar(){
			$.each($('.col-sm-4 .box'), function(){
				$(this).removeClass('box-default');
				$(this).removeClass('box-success');
				$(this).removeClass('box-danger');
				$(this).removeClass('box-warning');
				var si = 0; var no=0;
				$.each($(this).find('input'), function(){
					if ($(this).attr('checked')) si++;
					else no++;
				});
				if ((no==0) && (si!=0)) {
					$(this).addClass('box-success');
				}
				else if ((si==0) && (no!=0)) {
					$(this).addClass('box-danger');
				}
				else {
					$(this).addClass('box-warning');
				}
			})
		}

		$('.lnkTodos').click(function(){
			id = $(this).attr('id').substr(3);
			$('.chk' + id).attr('checked',true);
			$('.chk' + id).prop('checked',true);
			pintar();
		});

		$('.lnkNinguno').click(function(){
			id = $(this).attr('id').substr(3);
			$('.chk' + id).removeAttr('checked');
			$('.chk' + id).prop('checked',false);
			pintar();
		});

		$('.lnkTodosC').click(function(){
			$('.chks').attr('checked',true);
			$('.chks').prop('checked',true);
			pintar();
		});

		$('.lnkNingunoC').click(function(){
			$('.chks').removeAttr('checked');
			$('.chks').prop('checked',false);
			pintar();
		});

		$('.chks').click(function(){
			console.log($(this).checked);
			if ($(this).attr('checked')) {
				$(this).removeAttr('checked');
				$(this).prop('checked',false);
			}
			else {
				$(this).attr('checked', true);
				$(this).prop('checked',true);
			}
			pintar();
		});

		pintar();

	});
</script>
@stop
