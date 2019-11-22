<?php $__env->startSection('content'); ?>
    <div class="container-fluid app-body app-home">
        <div class="row">
            <div class="col-sm-4">
                <input type="text" class="form-control" placeholder="Search">
            </div>
            <div class="col-sm-4">
                <select name="group_type" id="" class="form-control">
                    <?php $__currentLoopData = $buffers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $buffer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($buffer->created_at); ?>"><?php  echo date('d/M/y', strtotime($buffer->created_at))  ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <div class="col-sm-4">
                <select name="group_type" id="" class="form-control">
                    <?php $__currentLoopData = $group; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $g): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($g->name); ?>"><?php echo e($g->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
        </div>
            <table class="table">
                <thead>
                    <tr>
                        <th>Group Name</th>
                        <th>Group Type</th>
                        <th>Account Name</th>
                        <th>Post Text</th>
                        <th>Time</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $buffers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $buffer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td> <?php echo e($buffer->group->name); ?> </td>
                            <td> <?php echo e($buffer->group->type); ?> </td>
                            <td> <?php echo e($buffer->user->name); ?> </td>
                            <td> <?php echo e($buffer->post->text); ?> </td>
                            <td></td>
                            <td><?php  echo date('d/M/y', strtotime($buffer->created_at))  ?></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        <?php echo e($buffers); ?>

    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>