@extends('institution.dashboard.index')


@section('breadcrums')
	<ol class="breadcrumb">
	  <li class="active">Inscripciones</li>
	</ol>
@endsection

@section('content')
    <div class="row">
    	<div class="col-md-12">
    		<div class="panel panel-default">
			  	<div class="panel-heading clearfix">
			    	<h3 class="panel-title pull-left">Alumnos Inscriptos</h3>
			    	<a href="{{route('student.create')}}" class="btn btn-primary btn-sm pull-right">Crear Insctipción</a>
			  	</div>
			  	<div class="panel-body">

			  		<table class="table" id="table">
			  			<thead>
			  				<tr>
			  					<th>Nombres</th>
			  					<th>Apellidos</th>
			  					<th>Tipo de identificación</th>
			  					<th>Número de identificación</th>
			  					<th>Sede</th>
			  					{{-- <th>Grupo</th> --}}
			  					<th></th>
			  				</tr>
			  			</thead>
			  			<tbody>
			  				@foreach($enrollments as $enrollment)
								<tr>
									<td>{{ $enrollment->student->name}}</td>
									<td>{{ $enrollment->student->last_name}}</td>
									<td>{{ $enrollment->student->identification->identification_type->name}}</td>
									<td>{{ $enrollment->student->identification->identification_number}}</td>
									<td>{{ $enrollment->headquarter->name}}</td>
									{{-- <td>{{ $enrollment->group->name}}</td> --}}

									<td>
										<a href="{{ route('enrollment.edit', $enrollment->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
									</td>
								</tr>
			  				@endforeach
			  			</tbody>
			  		</table>
			  	</div>
			</div>
		</div>
	</div>
@endsection

@section('js')
	<script>
		$(document).ready(function(){

			$(".table").DataTable( {
				"language": {
				    "url": "{{asset('DataTables/languaje/Spanish.json')}}"
				},
				"info":     false,
				"autoWidth": false,
		    });
		});
	</script>
@endsection