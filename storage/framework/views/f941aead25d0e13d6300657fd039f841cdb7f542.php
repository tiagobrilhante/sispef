<?php $__env->startSection('content'); ?>

            <div class="card">
                <div class="card-header"><?php echo e(__('Gerenciamento de Usuários')); ?></div>

                <div class="card-body">

                    
                    <div class="row">

                        <div class="col-md-12">
                            <table class="table table-responsive-sm table-bordered" id="user_table">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Nome</th>
                                    <th>Tipo</th>

                                </tr>
                                </thead>
                                <tbody id="body_user">

                                </tbody>
                            </table>
                        </div>

                    </div>

                </div>

            </div>




<?php $__env->stopSection(); ?>

<?php $__env->startSection('myScripts'); ?>

    <script>
        $(function () {

            $.ajax({
                type: 'GET',
                url: '/alluser',

                success: function (data) {

                    console.log('data');
                    console.log(data);

                    const tableSpace = $('#body_user')
                    for(let i = 0; i<data.length; i++){
                        tableSpace.append('<tr><td>'+ data[i].id +'</td><td>'+ data[i].nome +'</td><td>'+data[i].user_tipo.tipo+'</td></tr>');
                    }

                },
                error: function (data) {

                    // alert de erro
                    toastr.error('Não foi possível obter as informações!', 'Falha!');

                }

            });






        });
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.insideApp.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/tiagobrilhante/Workspace/sispef/resources/views/insideApp/usermanager/index.blade.php ENDPATH**/ ?>