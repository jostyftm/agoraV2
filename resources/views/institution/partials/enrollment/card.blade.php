@extends('institution.dashboard.index')


@section('breadcrums')
    <ol class="breadcrumb">
        <li class="active">Ficha Académica</li>
    </ol>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading clearfix">
                    <h3 class="panel-title pull-left">Opciones</h3>
                    <a href="{{route('student.create')}}" class="btn btn-primary btn-sm pull-right">Crear Insctipción</a>
                </div>
                <div class="panel-body">
                    {!! Form::open(['route' => 'enrollment.card.generate', 'method' => 'post', 'files' => true]) !!}
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                {!! Form::label('grade_id', 'Grado')!!}
                                <select name="grade_id" id="grade_id" class="form-control chosen-select" >
                                <option value="">Seleccione un grado</option>
                                @foreach($grades as $grade)
                                    <option value="{{$grade->id}}" value="{{old('grade_id')}}">{{$grade->name}}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                {!! Form::label('school_year', 'Año Lectivo')!!}
                                {!! Form::select('school_year', [], old('school_year'), ['class'=>'form-control chosen-select',
                                'placeholder'=>'Seleccione un año']) !!}
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group" style="padding-top: 25px;">
                                {!! Form::submit('Generar Fichas', ['class'=>'btn btn-primary']) !!}
                            </div>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection