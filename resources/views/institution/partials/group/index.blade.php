@extends('institution.dashboard.index')


@section('breadcrums')
	<ol class="breadcrumb">
	  <li class="active">Grupos</li>
	</ol>
@endsection

@section('content')
    <div class="row">
    	<div class="col-md-12">
    		<div class="panel panel-default">
			  	<div class="panel-heading clearfix">
			    	<h3 class="panel-title pull-left">Ver grupos</h3>
			    	<a class="btn btn-primary btn-sm pull-right" href="{{route('group.create')}}">Crear grupo</a>
			  	</div>
			  	<div class="panel-body">

			  		<table class="table">
			  			<thead>
			  				<tr>
			  					<th>Grupo</th>
			  					<th>Sede</th>
			  					<th>Modalidad</th>
			  					<th>Tipo</th>
			  					<th>Jornada</th>
			  					<th></th>
			  				</tr>
			  			</thead>
			  			<tbody>
			  				@foreach($groups as $group)
								<tr>
									<td>{{ $group->name }}</td>
									<td>{{ $group->headquarter->name }}</td>
									<td>
										@if($group->modality == 'a')
											{{ 'Académica' }}
										@else
											{{ 'Técnica' }}
										@endif
										
									</td>
									<td>
										@if($group->type == 'group')
											{{ 'Grupo' }}
										@else
											{{ 'Sungrupo' }}
										@endif
									</td>
									<td>{{ $group->workingday->name }}</td>

									<td>
										<a href="{{route('group.edit', $group)}}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
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
				    "url": "{{asset('plugin/DataTables/languaje/Spanish.json')}}"
				},
				// "info":     false,
				"autoWidth": false,
		    });
		});
	</script>
@endsection