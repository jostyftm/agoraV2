<?php $__env->startSection('breadcrums'); ?>
    <ol class="breadcrumb">
        <li class="active">Ficha Académica</li>
    </ol>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading clearfix">
                    <h3 class="panel-title pull-left">Opciones</h3>
                    <a href="<?php echo e(route('student.create')); ?>" class="btn btn-primary btn-sm pull-right">Crear Insctipción</a>
                </div>
                <div class="panel-body">
                    <?php echo Form::open(['route' => 'enrollment.card.generate', 'method' => 'post', 'files' => true]); ?>

                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <?php echo Form::label('grade_id', 'Grado'); ?>

                                <select name="grade_id" id="grade_id" class="form-control chosen-select" >
                                <option value="">Seleccione un grado</option>
                                <?php $__currentLoopData = $grades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $grade): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($grade->id); ?>" value="<?php echo e(old('grade_id')); ?>"><?php echo e($grade->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                        <!--
                        <div class="col-md-3">
                            <div class="form-group">
                                <?php echo Form::label('school_year', 'Año Lectivo'); ?>

                                <?php echo Form::select('school_year', [], old('school_year'), ['class'=>'form-control chosen-select',
                                'placeholder'=>'Seleccione un año']); ?>

                            </div>
                        </div>
                        -->
                        <div class="col-md-3">
                            <div class="form-group" style="padding-top: 25px;">
                                <?php echo Form::submit('Generar Fichas', ['class'=>'btn btn-primary']); ?>

                            </div>
                        </div>
                    </div>
                    <?php echo Form::close(); ?>

                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('institution.dashboard.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>