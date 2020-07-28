@extends('layouts.insideApp.app')

@section('content')



    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col">

                    {{ __('Gerenciamento de Usuários') }}

                </div>

                <div class="col text-right">

                    <button class="btn btn-sm btn-outline-primary" id="new_user"><i class="fa fa-user-plus pr-2"></i>
                        Adicionar novo usuário
                    </button>

                </div>

            </div>
        </div>

        <div class="card-body">


            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab"
                       aria-controls="pills-home" aria-selected="true">Todos</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab"
                       aria-controls="pills-profile" aria-selected="false">Administradores</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab"
                       aria-controls="pills-contact" aria-selected="false">Visualizadores</a>
                </li>

                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab"
                       aria-controls="pills-contact" aria-selected="false">Cmt / Scmt PEF</a>
                </li>

                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab"
                       aria-controls="pills-contact" aria-selected="false">Seriais Enviados</a>
                </li>

            </ul>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                    Todos
                </div>
                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">1
                </div>
                <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">2
                </div>
            </div>


            {{--tabela--}}
            <div class="row">

                <div class="col-md-12">
                    <table class="table table-responsive-sm table-bordered table-sm table-hover" id="user_table">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nome</th>
                            <th>Tipo</th>
                            <th>Om</th>
                            <th class="actions-size">Ações</th>

                        </tr>
                        </thead>
                        <tbody id="body_user">

                        </tbody>
                    </table>
                </div>

            </div>

        </div>

    </div>


    {{--modal de exibir dados de uma pessoa--}}
    <div class="modal fade" id="exibe_pessoa" tabindex="-1" role="dialog"
         aria-labelledby="exibe_pessoaLabel"
         aria-hidden="true">

        <div class="modal-dialog modal-lg" role="document">

            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Detalhes - <span class="the_posto_grad"></span> <span
                            class="the_nome_guerra"></span></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                {{--modal body--}}
                <div class="modal-body">

                    <div class=" alert alert-meu">

                        {{---nome e nome de guerra (posto)--}}
                        <div class="row">

                            {{--nome--}}
                            <div class="col">

                                <b>Nome: </b> <span class="the_nome"></span>

                            </div>

                            {{--nome de guerra / posto--}}
                            <div class="col">

                                <b>Nome de Guerra: </b> <span class="the_posto_grad"></span> <span
                                    class="the_nome_guerra"></span>

                            </div>

                        </div>

                        {{---email e tel contato--}}
                        <div class="row">

                            {{--email--}}
                            <div class="col">

                                <b>Email: </b> <span class="the_email"></span>

                            </div>

                            {{--tel contato--}}
                            <div class="col">

                                <b>Telefone de Contato: </b> <span class="the_tel"></span>

                            </div>

                        </div>

                        <div id="espaco_forma" class="d-none">
                            <div class="row">
                                <div class="col">
                                    <b>Turma de formação: </b> <span class="the_formacao"></span>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="alert alert-dark">

                        {{---tipo de usuario e om --}}
                        <div class="row">

                            {{--tipo de usuario--}}
                            <div class="col">

                                <b>Tipo de usuário: </b> <span class="the_tipo"></span>

                            </div>

                            {{--om--}}
                            <div class="col">

                                <b>Om: </b> <span class="the_om"></span>

                            </div>

                        </div>

                    </div>

                </div>

                {{--modal footer--}}
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>

                </div>

            </div>

        </div>

    </div>

    {{--modal de cadastrar uma pessoa--}}
    <div class="modal fade" id="cadastra_pessoa" tabindex="-1" role="dialog"
         aria-labelledby="cadastra_pessoaLabel"
         aria-hidden="true">

        <div class="modal-dialog modal-xl" role="document">

            <div class="modal-content">

                {{--modal header--}}
                <div class="modal-header">

                    <h5 class="modal-title">Cadastramento de novo Usuário</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>

                </div>


                <form id="form_new_user">

                    {{--modal body--}}
                    <div class="modal-body">

                        {{--explicação geral--}}
                        <div class="row">

                            <div class="col">

                                <div class="alert alert-dark text-justify">

                                    <h3>Sobre o sistema de cadastramento</h3>
                                    <p>O sistema de cadastramento de usuários funciona através da geração de um
                                        "serial" de acesso (Séries de numeros e outros caracteres), que deve ser
                                        repassado para
                                        o
                                        novo usuário do SisPef.</p>
                                    <p>De posse desse serial, o usuário conseguirá finalizar de forma autônoma o seu
                                        cadastro (É obrigatório o uso do serial para finalizar o processo, e a única
                                        forma de se cadastrar usuários no SisPef).</p>

                                </div>

                            </div>

                        </div>

                        {{--om e tipo de conta--}}
                        <div class="row">

                            {{--om--}}
                            <div class="col">

                                <div class="form-group">

                                    <label for="select_om_new_user">Om</label>
                                    <select class="form-control" id="select_om_new_user" required
                                            aria-describedby="select_om_new_user_help"></select>

                                    <small id="select_om_new_user_help" class="form-text text-muted">Selecione a Om do
                                        novo Usuário.</small>

                                </div>

                            </div>

                            {{--tipo de conta---}}
                            <div class="col" id="selectContainer">

                                <div class="form-group d-none" id="select_space">

                                    <label for="select_type_new_user">Tipo</label>
                                    <select class="form-control" id="select_type_new_user" required
                                            aria-describedby="select_type_new_user_help"></select>

                                    <small id="select_type_new_user_help" class="form-text text-muted">Selecione o tipo
                                        de conta do novo Usuário.</small>

                                </div>


                            </div>

                        </div>

                        {{--explicações om e tipo--}}
                        <div class="row">

                            {{--explica OM e define algum dado do novo usuário--}}
                            <div class="col">

                                <div class="alert alert-warning text-justify">

                                    <p>Escolha a Om do novo usuário. A Om tem papel fundamental na definição dos tipos
                                        de usuários permitidos.</p>

                                </div>

                                {{--dado do novo usuário--}}
                                <div class="form-group">

                                    <label for="dado_new_user">Informe pra qual usuário esta chave está sendo
                                        gerada.</label>
                                    <input type="text" class="form-control" id="dado_new_user"
                                           aria-describedby="dado_new_user_help">

                                    <small id="dado_new_user_help" class="form-text text-muted">Insira uma informação
                                        sobre o usuário.</small>

                                </div>

                                <div class="alert alert-warning text-justify">

                                    <p>Para fins de gerenciamento de chaves de acesso, no campo acima insira qualquer
                                        informação que ajude a rastrear a pessoa que deverá usar a chave de acesso, por
                                        exemplo: <i>Cel Marcelo</i>, ou ainda por exemplo: <i>E4 CMA</i>.</p>
                                    <p>Essa informação facilitará futuras análises por parte dos administradores. </p>

                                </div>

                            </div>

                            {{--explica o tipo--}}
                            <div class="col">

                                <div class="alert alert-warning text-justify">

                                    <p>O sispef possui diversos tipos de acesso, que são diretamente influenciados pela
                                        Om escolhida:</p>
                                    <ul>
                                        <li><b>Administrador: </b> Pode cadastrar novos usuários, mas apenas para a
                                            própria Om,
                                            e seus subordinados, além de gerenciar as atividades inerentes a sua OM,
                                            como homologar relatórios.
                                        </li>

                                        <li><b>Visualizador: </b> Tem acesso apenas as informações estatísticas
                                            (Dependendo da OM, poderá ver todas as informações, ou apenas as informações
                                            das estruturas subordinadas).
                                        </li>

                                        <li><b>Cmt / Scmt PEF: </b> Tipo de acesso exclusivo de PEFs. Permite o uso de
                                            funcionalidades ligadas a Pelotões de Fronteira
                                        </li>
                                    </ul>

                                </div>

                            </div>


                        </div>

                    </div>

                    {{--modal footer--}}
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Cadastrar</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>

                    </div>

                </form>

            </div>

        </div>

    </div>

@endsection

@section('myScripts')

    <script>
        $(function () {

            // inicializa o datatables
            $('#user_table').DataTable({
                processing: false,
                serverSide: false,
                autoWidth: false,
                language: {
                    emptyTable: "Nenhum usuário cadastrado",
                    info: "Mostrando _START_ até _END_ de _TOTAL_ registros",
                    infoEmpty: "Não existem registros a serem mostrados",
                    infoFiltered: "(Filtrado de um total de _MAX_ registros)",
                    infoPostFix: "",
                    thousands: ",",
                    lengthMenu: "Mostrar _MENU_ registros",
                    loadingRecords: "Carregando...",
                    processing: "Processando...",
                    search: "Pesquisar:",
                    zeroRecords: "Nenhum registro encontrado correspondente a busca",
                    paginate: {
                        "first": "Primeiro",
                        "last": "Último",
                        "next": "Próximo",
                        "previous": "Anterior"
                    },
                    aria: {
                        "sortAscending": ": Ative para organizar de forma crescente.",
                        "sortDescending": ": Ative para organizar de forma decrescente."
                    }
                },
                pageLength: 50,

                ajax: "/allusers",
                type: 'GET',
                rowId: function (a) {
                    return 'user_' + a.id;
                },
                columns: [
                    {data: "id", name: 'id', 'visible': false},
                    {data: "nome"},
                    {data: "user_tipo.tipo", className: 'text-center'},
                    {data: "om.sigla", className: 'text-center'},
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        className: 'text-center',
                        render: function (data, type, row) {
                            return '<button id="show_' + row.id + '" class="btn btn-sm btn-success btn_show" title="Detalhes sobre a pessoa" data-tippy-content="Exibe detalhes sobre a pessoa">' +
                                '<i class="fa fa-search"></i>' +
                                '</button>' +
                                '<span class="separaicon"></span>' +
                                '<button id="editar_' + row.id + '" class="btn btn-sm btn-warning btn_edit" title="Alterar Informações" data-tippy-content="Alterar Informações">' +
                                '<i class="fa fa-edit"></i>' +
                                '</button>' +
                                '<span class="separaicon"></span>' +
                                '<button id="desativa_' + row.id + '" class="btn btn-sm btn-outline-danger btn_desativa" title="Desativar pessoa" data-tippy-content="Desativar Pessoa">' +
                                '<i class="fa fa-ban"></i>' +
                                '</button>' +
                                '<span class="separaicon"></span>' +
                                '<button id="excluir_' + row.id + '" class="btn btn-sm btn-danger btn_exclude" title="Excluir pessoa" data-tippy-content="Excluir Pessoa">' +
                                '<i class="fa fa-trash"></i>' +
                                '</button>';

                        }
                    },
                ],
                order: [[0, 'desc']]
            });

            $('#user_table').on('draw.dt', function () {
                tippy('[data-tippy-content]');
            });

            // retorna informações sobre a pessoa
            $(document).on('click', '.btn_show', function (e) {

                e.preventDefault();

                var id = $(this).attr('id').split('_')[1];

                $.ajax({
                    type: 'GET',
                    url: '/admin/usermanager/' + id,

                    success: function (data) {

                        $('.the_posto_grad').text(data.posto_grad);
                        $('.the_nome_guerra').text(data.nome_guerra);
                        $('.the_nome').text(data.nome);
                        $('.the_email').text(data.email);
                        $('.the_tel').text(data.tel_contato);

                        if (data.tu_formacao != null) {
                            $('#espaco_forma').removeClass('d-none');
                            $('.the_formacao').text(data.tu_formacao);
                        } else {

                            $('#espaco_forma').addClass('d-none');

                        }

                        $('.the_tipo').text(data.user_tipo.tipo);
                        $('.the_om').text(data.om.name);

                        // show modal
                        $('#exibe_pessoa').modal('show');
                    },
                    error: function () {

                        // alert de erro
                        toastr.error('Não foi possível obter as informações!', 'Falha!');

                    }

                });

            });

            // abre o modal de cadastro de novos usuários e monta o select de OM
            $(document).on('click', '#new_user', function (e) {

                e.preventDefault();

                $('#select_space').addClass('d-none');

                $.ajax({
                    type: 'GET',
                    url: '/myom',

                    success: function (data) {

                        const arrayOms = [];

                        function omRecursiva(om) {
                            return om.map(function (oms) {
                                const existeSubordinada = oms.om.length;

                                const newOptions = {
                                    id: oms.id,
                                    name: oms.sigla,
                                };

                                if (existeSubordinada > 0) {
                                    omRecursiva(oms.om);
                                }

                                arrayOms.push(newOptions);
                            });
                        }

                        const oms = data;

                        oms.map((teste) => {
                            arrayOms.push({ id: teste.id, name: teste.sigla });
                            const resul = omRecursiva(teste.om);
                            return resul;
                        });

                        let options = '<option value=""> --- Selecione ---</option>';

                        arrayOms.map(function(resultadoFinal){

                            options+=`<option value=${resultadoFinal.id}>${resultadoFinal.name}</option>`;
                        })

                        $('#select_om_new_user').append(options);

                        // show modal
                        $('#cadastra_pessoa').modal('show');

                    },
                    error: function () {

                        // alert de erro
                        toastr.error('Não foi possível obter as informações!', 'Falha!');

                    }

                });


            });


            $(document).on('change','#select_om_new_user', function (e) {

                e.preventDefault();

                const id = $(this).val();

                $.ajax({
                    type: 'GET',
                    url: '/mytypes/'+id ,

                    beforeSend: function(){

                        $('#selectContainer').LoadingOverlay("show");

                    },
                    success: function (data) {

                        $('#select_space').removeClass('d-none');



                        $('#select_type_new_user').empty();

                      for(let i = 0; i<data.length; i++){
                          $('#select_type_new_user').append('<option>' + data[i] + '</option>');
                      }


                        $('#selectContainer').LoadingOverlay("hide");


                    },
                    error: function () {

                        // alert de erro
                        toastr.error('Não foi possível obter as informações!', 'Falha!');

                    }

                });


            });


        });
    </script>

@endsection
