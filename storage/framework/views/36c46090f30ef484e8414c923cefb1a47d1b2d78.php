<?php $__env->startSection('breadcrums'); ?>
	<ol class="breadcrumb">
	  <li class="active">Inscripciones</li>
	</ol>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
    	<div class="col-md-12">
    		<div class="panel panel-default">
			  	<div class="panel-heading clearfix">
			    	<h3 class="panel-title pull-left">Alumnos Inscriptos</h3>
			    	<a href="<?php echo e(route('student.create')); ?>" class="btn btn-primary btn-sm pull-right">Crear Insctipción</a>
			  	</div>
			  	<div class="panel-body">

			  		<table class="table" id="table">
			  			<thead>
			  				<tr>
			  					<th>Nombres</th>
			  					<th>Apellidos</th>
			  					<th>Tipo de identificación</th>
			  					<th>N° de identificación</th>
			  					<th>Sede</th>
			  					<th>Grupo</th>
			  					<th></th>
			  				</tr>
			  			</thead>
			  			<tbody>
			  				<?php $__currentLoopData = $enrollments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $enrollment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<tr>
									<td><?php echo e($enrollment->student->name); ?></td>
									<td><?php echo e($enrollment->student->last_name); ?></td>
									<td><?php echo e($enrollment->student->identification->identification_type->name); ?></td>
									<td><?php echo e($enrollment->student->identification->identification_number); ?></td>
									<td><?php echo e($enrollment->headquarter->name); ?></td>
									<td><?php echo e(($enrollment->group != null) ? $enrollment->group->name : ''); ?></td>

									<td>
										<a href="<?php echo e(route('enrollment.edit', $enrollment->id)); ?>" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
									</td>
								</tr>
			  				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			  			</tbody>
			  		</table>
			  	</div>
			</div>
		</div>
	</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
	<script>
		$(document).ready(function(){

			$(".table").DataTable( {
				"language": {
				    "url": "<?php echo e(asset('plugin/DataTables/languaje/Spanish.json')); ?>"
				},
				"info":     false,
				"autoWidth": false,
		    });
		});
	</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('institution.dashboard.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>