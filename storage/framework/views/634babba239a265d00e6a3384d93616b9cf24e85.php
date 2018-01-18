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
                <?php echo $__env->make('institution.partials.enrollment.optionsEnrollmentCard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <!--<a href="<?php echo e(route('student.create')); ?>" class="btn btn-primary btn-sm pull-right">Crear Insctipción</a>-->
                </div>

                <div class="panel-body">
                    <?php if(isset($grades)): ?>
                        <?php echo Form::open(['route' => 'enrollment.card.generate', 'method' => 'post', 'files' => true]); ?>

                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <?php echo Form::label('grade_id', 'Seleccione un Grado'); ?>

                                    <select name="grade_id" id="grade_id" class="form-control chosen-select">
                                        <option value="">Seleccione un Grado</option>
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

                    <?php endif; ?>


                    <?php if(isset($groups)): ?>
                        <?php echo Form::open(['route' => 'enrollment.card.generate', 'method' => 'post', 'files' => true]); ?>

                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <?php echo Form::label('group_id', 'Seleccione un Grupo'); ?>

                                    <select name="group_id" id="group_id" class="form-control chosen-select">
                                        <option value="">Seleccione un Grupo</option>
                                        <?php $__currentLoopData = $groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($group->id); ?>" value="<?php echo e(old('group_id')); ?>"><?php echo e($group->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group" style="padding-top: 25px;">
                                    <?php echo Form::submit('Generar Fichas', ['class'=>'btn btn-primary']); ?>

                                </div>
                            </div>
                        </div>
                        <?php echo Form::close(); ?>

                    <?php endif; ?>

                    <?php if(isset($student)): ?>
                        <?php echo Form::open(['route' => 'enrollment.card.generate', 'method' => 'post', 'files' => true]); ?>


                        <div class="row">
                            <div class="col-md-12">
                                <p>
                                    Buscar por nombres de estudiantes
                                </p>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <?php echo Form::label('grade_id', 'Nombre Estudiante'); ?>

                                    <input type="text" id="name_id" class="form-control">
                                    <ul id="list">

                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group" style="padding-top: 25px;">
                                    <?php echo Form::submit('Generar Fichas', ['class'=>'btn btn-primary']); ?>

                                </div>
                            </div>
                        </div>
                        <?php echo Form::close(); ?>

                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    <script src="<?php echo e(asset('js/bootstrap-datepicker.js')); ?>"></script>
    <script src="<?php echo e(asset('js/jquery.min.js')); ?>"></script>
    <script type="text/javascript">



        $('#name_id').keypress(function () {

            var text = $('#name_id').val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({

                type: "POST",
                url: '<?php echo URL::route('enrollment.autocomplete'); ?>',
                data: {text: $('#name_id').val()},
                success: function (data) {

                    txt = "";
                    for(var i=0; i < data.length ; i++){
                        txt += "<li>"+data[i].value+"</li>";

                    }

                    $('#list')[0].innerHTML = txt;
                }
            });

        })

    </script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('institution.dashboard.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>