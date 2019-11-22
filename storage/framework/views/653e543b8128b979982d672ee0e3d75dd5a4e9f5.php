<?php $__env->startSection('content'); ?>
    <div class="container-fluid app-body app-home">
        <div class="row">
            <div class="col-sm-4">
                <input type="text" class="form-control change" placeholder="Search" id="search">
            </div>
            <div class="col-sm-4">
                <select name="date" class="form-control change"  id="date">
                    <?php $__currentLoopData = $buffers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $buffer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($buffer->created_at); ?>"><?php echo e($buffer->created_at); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <div class="col-sm-4">
                <select name="group" class="form-control change" id="group" >
                    <?php $__currentLoopData = $group; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $g): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($g->id); ?>"><?php echo e($g->name); ?></option>
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
                <tbody id="t_body">










                </tbody>
            </table>


        <nav id="pagination" aria-label="Page navigation example">
            <ul class="pagination">

            </ul>
        </nav>
    </div>
    <script type="text/javascript">
        $( document ).ready(function() {
            let url = '<?php echo e(url('/get/data')); ?>/null/null/null';
            getData(url);
        });

        function getData(url) {
            $('#t_body').empty();
            $('.pagination').empty();
            let i = 1;
            $.ajax({
                method: 'get',
                url: url,
                success: function (result) {
                    console.log(result);
                    $.each(result.data, function (key, value) {
                        let element = '<tr><td>'+ value.group.name +'</td><td>'+ value.group.type +'</td><td>'+ value.user.name +'</td><td>'+ value.post.text +'</td><td>'+ value.created_at +'</td></tr>';
                        $('#t_body').append(element);
                    });
                    if (result.total > 9){
                        for( let j = 1; j< 10; j++ ){
                            let newUrl = url.split('=')[0]+'?page='+j;
                            console.log(newUrl);
                            let paginate = '<li class="page-item"><a class="page-link" data-id = "'+newUrl+'">'+ j +'</a></li>';
                            $('.pagination').append(paginate);
                        }
                    }

                },
                error: function (xhr) {
                    console.log(xhr);
                }
            })
        }

        $(document).on('input', '.change', function () {
            let search = $('#search').val();
            if (search){

            } else {
                search = 'null';
            }
            let date = $('#date').val();
            let group = $('#group').val();
            let url = '<?php echo e(url('/get/data')); ?>/'+search+'/'+date+'/'+group;
            getData(url);
        });

        $(document).on('click', '.page-link', function () {
            let link = $(this).data('id');
            getData(link);
        })

    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>