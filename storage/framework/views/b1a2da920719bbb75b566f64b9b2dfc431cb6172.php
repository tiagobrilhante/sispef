<?php $__env->startSection('content'); ?>


    <div id="chart-container"></div>



    <div class="card">
        <div class="card-header"><?php echo e(__('Cadastro de Organizações Militares')); ?></div>

        <div class="card-body">


            
            <form action="" name="frm_cadastro" id="frm_cadastro" method="post">

                <div class="row">

                    
                    <div class="col-12">

                        <div class="form-group">
                            <label for="nome">Nome <span class="text-danger">*</span></label>
                            <input class="form-control" name="nome" id="nome" type="text" required autofocus>
                        </div>

                    </div>

                </div>

                
                <button type="submit" class="btn btn-primary">Cadastrar</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>

            </form>


        </div>

    </div>

    <hr>

    <div class="card">
        <div class="card-header"><?php echo e(__('Gerenciamento de Organizações Militares')); ?></div>

        <div class="card-body">

            
            <div class="row">

                <div class="col-md-12">
                    <table class="table table-responsive-sm table-bordered table-sm" id="user_table">
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


    <div id="orgChartContainer">
        <div id="orgChart"></div>
    </div>
    <div id="consoleOutput">
    </div>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('myScripts'); ?>

    <script>


        $(function () {


            var testData = [
                {id: 1, name: 'Comando Militar da Amazônia',sigla:'CMA',cor:'#000000', parent: 0, podeVerTudo: true},
                {id: 2, name: '12ª Região Militar',sigla:'12ª RM',cor:'#000000', parent: 1, podeVerTudo: true},
                {id: 3, name: '1ª Brigada de Infantaria de Selva',sigla:'1ª Bda Inf Sl',cor:'#CCCFF0', parent: 1, podeVerTudo: false},
                {id: 4, name: '17ª Brigada de Infantaria de Selva',sigla:'17ª Bda Inf Sl',cor:'#BBBCCC', parent: 1, podeVerTudo: false},
                {id: 5, name: '16ª Brigada de Infantaria de Selva',sigla:'16ª Bda Inf Sl',cor:'#123456', parent: 1, podeVerTudo: false},
                {id: 6, name: '5º Batalhão de Infantaria de Selva',sigla:'5º BIS',cor:'#654321', parent: 3, podeVerTudo: false},


            ];




            org_chart = $('#orgChart').orgChart({
                data: testData,
                showControls: true,
                allowEdit: true,
                onAddNode: function (node) {
                    log('Created new node on node ' + node.data.id);
                    org_chart.newNode(node.data.id);
                },
                onDeleteNode: function (node) {
                    log('Deleted node ' + node.data.id);
                    org_chart.deleteNode(node.data.id);
                },
                onClickNode: function (node) {
                    log('Clicked node ' + node.data.id);
                }

            });


            // just for example purpose
            function log(text) {
                $('#consoleOutput').append('<p>' + text + '</p>')
            }


            $.ajax({
                type: 'GET',
                url: '/alluser',

                success: function (data) {

                    console.log('data');
                    console.log(data);

                    const tableSpace = $('#body_user')
                    for (let i = 0; i < data.length; i++) {
                        tableSpace.append('<tr><td>' + data[i].id + '</td><td>' + data[i].nome + '</td><td>' + data[i].user_tipo.tipo + '</td></tr>');
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

<?php echo $__env->make('layouts.insideApp.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/tiagobrilhante/Workspace/sispef/resources/views/insideApp/ommanager/index.blade.php ENDPATH**/ ?>