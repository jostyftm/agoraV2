<?php $__env->startSection('css'); ?>
	<link rel="stylesheet" href="<?php echo e(asset('css/bootstrap-chosen.css')); ?>">
	<link rel="stylesheet" href="<?php echo e(asset('css/datepicker.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrums'); ?>
	<ol class="breadcrumb">
	  <li><a href="/institution/student/index">Estudiante</a></li>
	  <li class="active">Crear</li>
	</ol>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
	<div class="row">
		<div class="col-md-12">
			<?php echo Form::open(['route' => 'student.store', 'method' => 'post']); ?>

				<div class="panel panel-default">
				  	<div class="panel-heading">
				    	<h3 class="panel-title">Crear estudiante</h3>
				  	</div>
				  	<div class="panel-body">
				  		
				  		<?php echo $__env->make('complements.error', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

				  		<div class="container-fluid">
				  			
				  			<div id="identification" class="section_inscription">
				  				<div class="section_inscription__tittle">
				  					<h4>Datos de indentificaión</h4>
				  				</div>
				  				<div class="row">
				  					<div class="col-md-3">
				  						<div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
				  							<?php echo Form::label('name', 'Nombres'); ?>

				  							<?php echo Form::text('name', old('name'), ['class'=>'form-control']); ?>

				  						</div>
				  					</div>
				  					<div class="col-md-3">
				  						<div class="form-group<?php echo e($errors->has('last_name') ? ' has-error' : ''); ?>">
				  							<?php echo Form::label('last_name', 'Apellidos'); ?>

				  							<?php echo Form::text('last_name', old('last_name'), ['class'=>'form-control']); ?>

				  						</div>
				  					</div>
				  					<div class="col-md-3">
				  						<div class="form-group<?php echo e($errors->has('identification_type_id') ? ' has-error' : ''); ?>">
				  							<?php echo Form::label('identification_type_id', 'Tipo de identificación'); ?>

				  							<?php echo Form::select('identification_type_id', $identification_types, old('identification_type_id'), ['class'=>'form-control chosen-select', 'placeholder' => 'Seleccione el tipo de identificación']); ?>

				  						</div>
				  					</div>
				  					<div class="col-md-3">
				  						<div class="form-group<?php echo e($errors->has('identification_number') ? ' has-error' : ''); ?>">
				  							<?php echo Form::label('identification_number', 'Número de identificación'); ?>

				  							<?php echo Form::text('identification_number', old('identification_number'), ['class'=>'form-control']); ?>

				  						</div>
				  					</div>
				  				</div>
				  				<div class="row">
				  					<!--  CITY  EXPEDITION / BIRTH-->
				  					<div class="col-md-3">
				  						<div class="form-group<?php echo e($errors->has('id_city_expedition') ? ' has-error' : ''); ?>">
				  							<?php echo Form::label('id_city_expedition', 'Ciudad de expedición'); ?>

				  							<?php echo Form::select('id_city_expedition', $cities, old('id_city_expedition'), ['class'=>'form-control chosen-select', 'placeholder'=>'Selecciona una ciudad']); ?>

				  						</div>
				  					</div>
				  					<div class="col-md-3">
				  						<div class="form-group<?php echo e($errors->has('id_city_of_birth') ? ' has-error' : ''); ?>">
				  							<?php echo Form::label('id_city_of_birth', 'Ciudad de nacimiento'); ?>

				  							<?php echo Form::select('id_city_of_birth', $cities, old('id_city_of_birth'), ['class'=>'form-control chosen-select', 'placeholder'=>'Selecciona una ciudad']); ?>

				  						</div>
				  					</div>
				  					<div class="col-md-3">
			  							<div class="form-group<?php echo e($errors->has('birthdate') ? ' has-error' : ''); ?>">
				  							<?php echo Form::label('birthdate', 'Fecha de nacimiento'); ?>

				  							<?php echo Form::text('birthdate', old('birthdate'), ['class'=>'form-control datepicker']); ?>

				  						</div>
				  					</div>
				  					<div class="col-md-3">
				  						<div class="form-group<?php echo e($errors->has('gender_id') ? ' has-error' : ''); ?>">
				  							<?php echo Form::label('gender_id', 'Genero'); ?>

				  							<?php echo Form::select('gender_id', $genders, old('gender_id'), ['class'=>'form-control chosen-select', 'placeholder'=>'seleccione un genero']); ?>

				  						</div>
				  					</div>
				  				</div>
				  			</div>

				  			
				  			<div id="identification" class="section_inscription">
				  				<div class="section_inscription__tittle">
				  					<h4>Dirección Residencia</h4>
				  				</div>
				  				<div class="row">
				  					<div class="col-md-2">
				  						<div class="form-group <?php echo e($errors->has('address') ? ' has-error' : ''); ?>">
				  							<?php echo Form::label('address', 'Dirección'); ?>

				  							<?php echo Form::text('address', old('address'), ['class' => 'form-control', 'id'=>'adress']); ?>

				  						</div>
				  					</div>
				  					<div class="col-md-3">
				  						<div class="form-group <?php echo e($errors->has('neighborhood') ? ' has-error' : ''); ?>">
				  							<?php echo Form::label('neighborhood', 'Barrio'); ?>

				  							<?php echo Form::text('neighborhood', old('neighborhood'), ['class' => 'form-control', 'id'=>'neighborhood']); ?>

				  						</div>
				  					</div>
				  					<div class="col-md-2">
				  						<div class="form-group <?php echo e($errors->has('phone') ? ' has-error' : ''); ?>">
				  							<?php echo Form::label('phone', 'Telefono'); ?>

				  							<?php echo Form::text('phone', old('phone'), ['class' => 'form-control', 'id'=>'phone']); ?>

				  						</div>
				  					</div>
				  					<div class="col-md-2">
				  						<div class="form-group <?php echo e($errors->has('mobil') ? ' has-error' : ''); ?>">
				  							<?php echo Form::label('mobil', 'Celular'); ?>

				  							<?php echo Form::text('mobil', old('mobil'), ['class' => 'form-control', 'id'=>'mobil']); ?>

				  						</div>
				  					</div>
				  					<div class="col-md-3">
				  						<div class="form-group <?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
				  							<?php echo Form::label('email', 'Email'); ?>

				  							<?php echo Form::text('email', old('email'), ['class' => 'form-control', 'id'=>'email']); ?>

				  						</div>
				  					</div>
				  				</div>
				  				<div class="row">
				  					<div class="col-md-3">
				  						<div class="form-group <?php echo e($errors->has('id_city_address') ? ' has-error' : ''); ?>">
				  							<?php echo Form::label('id_city_address', 'Ciudad'); ?>

				  							<?php echo Form::select('id_city_address', $cities, old('id_city_address'), ['class'=>'form-control chosen-select', 'placeholder'=>'seleccione una ciudad']); ?>

				  						</div>
				  					</div>
				  					<div class="col-md-3">
				  						<div class="form-group <?php echo e($errors->has('zone_id') ? ' has-error' : ''); ?>">
				  							<?php echo Form::label('zone_id', 'Zona'); ?>

				  							<?php echo Form::select('zone_id', $zones, old('zone_id'), ['class'=>'form-control chosen-select', 'placeholder'=>'seleccione una zona']); ?>

				  						</div>
				  					</div>
				  				</div>
				  			</div>

				  			<div class="form-group text-center">
				  				<?php echo Form::hidden('state', 'n'); ?>

				  				<?php echo Form::submit('Guardar', ['class'=>'btn btn-primary']); ?>

				  			</div>
				  		</div>
				  	</div>
				</div>
			<?php echo Form::close(); ?>

		</div>
	</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
	<script src="<?php echo e(asset('js/chosen.jquery.js')); ?>"></script>
	<script src="<?php echo e(asset('js/bootstrap-datepicker.js')); ?>"></script>
	<script>
    	$(function() {
	        $('.chosen-select').chosen({width: "100%"});
	        $('.chosen-select-deselect').chosen({ allow_single_deselect: true });
	        $('.datepicker').datepicker({
			    format: 'yyyy/mm/dd',
			    startDate: '-3d'
			});
    	});
	</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('institution.dashboard.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>