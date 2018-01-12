@extends('institution.dashboard.index')

@section('css')
	<link rel="stylesheet" href="{{asset('css/bootstrap-chosen.css')}}">
@endsection

@section('breadcrums')
	<ol class="breadcrumb">
	  <li><a href="{{route('group.index')}}">Grupos</a></li>
	  <li class="active">Crear</li>
	</ol>
@endsection

@section('content')
    <div class="row">
    	<div class="col-md-12">
			
			{!! Form::open(['route'=>['group.update', $group], 'method'=>'put'])!!}
				<div class="panel panel-default">
				  	<div class="panel-heading">
				    	<h3 class="panel-title">Actualizar grupo</h3>
				  	</div>
				  	<div class="panel-body">

				  		@include('complements.error')

				  		<div class="container-fluid">
				  			<div class="row">
				  				<div class="col-md-4">
				  					<div class="form-group">
				  						{!! Form::label('headquarter_id', 'Sede') !!}
				  						{!! Form::select('headquarter_id', $headquarters, $group->headquarter->id, ['class'=>'form-control chosen-select', 'placeholder'=>'Selecciones una sede']) !!}
				  					</div>
				  				</div>
				  				<div class="col-md-3">
				  					<div class="form-group">
				  						{!! Form::label('grade_id', 'Grado') !!}
				  						{!! Form::select('grade_id', $grades, $group->grade_id, ['class'=>'form-control chosen-select', 'placeholder'=>'Selecciones un grado']) !!}
				  					</div>
				  				</div>
				  				<div class="col-md-1">
				  					<div class="form-group">
				  						{!! Form::label('quota', 'Cupos') !!}
				  						{!! Form::text('quota', $group->quota, ['class'=>'form-control']) !!}
				  					</div>
				  				</div>
				  				<div class="col-md-2">
				  					<div class="form-group">
				  						{!! Form::label('type', 'Tipo') !!}
				  						{!! Form::select('type', ['group'=>'Grupo', 'sub_group'=>'Subgrupo'], $group->type, ['class'=>'form-control chosen-select', 'placeholder'=>'Tipo']) !!}
				  					</div>
				  				</div>
				  				<div class="col-md-2">
				  					<div class="form-group">
				  						{!! Form::label('modality', 'Modalidad') !!}
				  						{!! Form::select('modality', ['t'=>'ténica', 'a'=>'académica'], $group->modality, ['class'=>'form-control chosen-select', 'placeholder'=>'Modalidad']) !!}
				  					</div>
				  				</div>
				  			</div>
				  			<div class="row">
				  				<div class="col-md-3">
				  					<div class="form-group">
				  						{!! Form::label('working_day_id', 'Jornada') !!}
				  						{!! Form::select('working_day_id', $journeys, $group->working_day_id, ['class'=>'form-control chosen-select', 'placeholder'=>'Selecciones una jornada']) !!}
				  					</div>
				  				</div>
				  				<div class="col-md-3">
				  					<div class="form-group">
				  						{!! Form::label('name', 'Nombre del grupo') !!}
				  						{!! Form::text('name', $group->name, ['class'=>'form-control']) !!}
				  					</div>
				  				</div>
				  			</div>
				  		</div>
				  	</div>
				  	<div class="panel-footer">
						<div class="form-group text-center">
				  			{!! Form::submit('Actualizar', ['class'=>'btn btn-primary']) !!}
						</div>
					</div>
				</div>
			{!! Form::close()!!}
    	</div>
    </div>
@endsection

@section('js')
	<script src="{{asset('js/chosen.jquery.js')}}"></script>
	<script>
    	$(function() {
	        $('.chosen-select').chosen({width: "100%"});
	        $('.chosen-select-deselect').chosen({ allow_single_deselect: true });
    	});
	</script>
@endsection