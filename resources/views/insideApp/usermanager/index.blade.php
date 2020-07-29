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

                {{--todos usuários--}}
                <li class="nav-item" role="presentation">
                    <a class="nav-link active mytabsselect" id="pills-todos-tab" data-toggle="pill" href="#pills-todos"
                       role="tab"
                       aria-selected="true">Todos Usuários</a>
                </li>

                {{--administradores--}}
                <li class="nav-item" role="presentation">
                    <a class="nav-link mytabsselect" id="pills-admin-tab" data-toggle="pill" href="#pills-todos"
                       role="tab"
                       aria-selected="false">Administradores</a>
                </li>

                {{--visualizadores---}}
                <li class="nav-item" role="presentation">
                    <a class="nav-link mytabsselect" id="pills-visu-tab" data-toggle="pill" href="#pills-todos"
                       role="tab"
                       aria-selected="false">Visualizadores</a>
                </li>

                {{--Cmt / Scmt PEF--}}
                <li class="nav-item" role="presentation">
                    <a class="nav-link mytabsselect" id="pills-pef-tab" data-toggle="pill" href="#pills-todos"
                       role="tab"
                       aria-selected="false">Cmt / Scmt PEF</a>
                </li>

                {{--seriais emitidos--}}
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="pills-serial-tab" data-toggle="pill" href="#pills-serial" role="tab"
                       aria-controls="pills-serial" aria-selected="false">Seriais Enviados</a>
                </li>

            </ul>

            <div class="tab-content" id="pills-tabContent">

                {{--espaço para usuarios--}}
                <div class="tab-pane show active" id="pills-todos" role="tabpanel">

                    {{--tabela de usuarios--}}
                    <div class="row">

                        <div class="col-md-12">

                            <table class="table table-responsive-sm table-bordered table-sm table-hover"
                                   id="user_table">

                                <thead>

                                <tr>

                                    <th>Id</th>
                                    <th>Nome</th>
                                    <th>Tipo</th>
                                    <th>Om</th>
                                    <th>Vê Tudo</th>
                                    <th>Status</th>
                                    <th class="actions-size">Ações</th>

                                </tr>

                                </thead>

                                <tbody id="body_user">

                                </tbody>

                            </table>

                        </div>

                    </div>

                </div>

                {{--espaço para seriais--}}
                <div class="tab-pane " id="pills-serial" role="tabpanel" aria-labelledby="pills-serial-tab">

                    {{--tabela de seriais--}}
                    <div class="row">

                        <div class="col-md-12">

                            <table class="table table-responsive-sm table-bordered table-sm table-hover"
                                   id="serial_table">

                                <thead>

                                <tr>
                                    <th class="d-none">id</th>
                                    <th class="width-serial">Serial</th>
                                    <th>Om</th>
                                    <th>Tipo</th>
                                    <th>Status</th>
                                    <th>Referencia</th>
                                    <th>Dono</th>
                                    <th>Responsável</th>
                                    <th class="actions-size-serial">Ações</th>

                                </tr>

                                </thead>

                                <tbody id="body_serial">

                                </tbody>

                            </table>

                        </div>

                    </div>

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


                    <div class="alert alert-primary">
                        <b>Token de Acesso: </b> <span class="the_token"></span>
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

                        <div id="retorno_chave">

                            <div class="alert alert-meu text-center">
                                <h3>A chave de acesso foi gerada com sucesso!</h3>

                                <p>Repasse o seguinte código para o usuário:</p>

                                <span id="serial_token"></span>

                            </div>

                        </div>

                        <div id="espaco_inputs">

                            <div id="sub_espaco_inputs">

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
                                            <p>De posse desse serial, o usuário conseguirá finalizar de forma autônoma o
                                                seu
                                                cadastro (É obrigatório o uso do serial para finalizar o processo, e a
                                                única
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

                                            <small id="select_om_new_user_help" class="form-text text-muted">Selecione a
                                                Om
                                                do
                                                novo Usuário.</small>

                                        </div>

                                    </div>

                                    {{--tipo de conta---}}
                                    <div class="col" id="selectContainer">

                                        <div class="form-group d-none" id="select_space">

                                            <label for="select_type_new_user">Tipo</label>
                                            <select class="form-control" id="select_type_new_user" required
                                                    aria-describedby="select_type_new_user_help"></select>

                                            <small id="select_type_new_user_help" class="form-text text-muted">Selecione
                                                o
                                                tipo
                                                de conta do novo Usuário.</small>

                                        </div>


                                    </div>

                                </div>

                                {{--explicações om e tipo--}}
                                <div class="row">

                                    {{--explica OM e define algum dado do novo usuário--}}
                                    <div class="col">

                                        <div class="alert alert-warning text-justify">

                                            <p>Escolha a Om do novo usuário. A Om tem papel fundamental na definição dos
                                                tipos
                                                de usuários permitidos.</p>

                                        </div>

                                        {{--dado do novo usuário--}}
                                        <div class="form-group">

                                            <label for="dado_new_user">Informe pra qual usuário esta chave está sendo
                                                gerada.</label>
                                            <input type="text" class="form-control" id="dado_new_user"
                                                   aria-describedby="dado_new_user_help">

                                            <small id="dado_new_user_help" class="form-text text-muted">Insira uma
                                                informação
                                                sobre o usuário.</small>

                                        </div>

                                        <div class="alert alert-warning text-justify">

                                            <p>Para fins de gerenciamento de chaves de acesso, no campo acima insira
                                                qualquer
                                                informação que ajude a rastrear a pessoa que deverá usar a chave de
                                                acesso,
                                                por
                                                exemplo: <i>Cel Marcelo</i>, ou ainda por exemplo: <i>E4 CMA</i>.</p>
                                            <p>Essa informação facilitará futuras análises por parte dos
                                                administradores. </p>

                                        </div>

                                    </div>

                                    {{--explica o tipo--}}
                                    <div class="col">

                                        <div class="alert alert-warning text-justify">

                                            <p>O sispef possui diversos tipos de acesso, que são diretamente
                                                influenciados
                                                pela
                                                Om escolhida:</p>
                                            <ul>
                                                <li><b>Administrador: </b> Pode cadastrar novos usuários, mas apenas
                                                    para a
                                                    própria Om,
                                                    e seus subordinados, além de gerenciar as atividades inerentes a sua
                                                    OM,
                                                    como homologar relatórios.
                                                </li>

                                                <li><b>Visualizador: </b> Tem acesso apenas as informações estatísticas
                                                    (Dependendo da OM, poderá ver todas as informações, ou apenas as
                                                    informações
                                                    das estruturas subordinadas).
                                                </li>

                                                <li><b>Cmt / Scmt PEF: </b> Tipo de acesso exclusivo de PEFs. Permite o
                                                    uso
                                                    de
                                                    funcionalidades ligadas a Pelotões de Fronteira
                                                </li>
                                            </ul>

                                        </div>

                                    </div>


                                </div>

                            </div>

                        </div>

                    </div>

                    {{--modal footer--}}
                    <div class="modal-footer">
                        <div id="botao_submit">
                            <button type="submit" class="btn btn-primary">Cadastrar</button>
                        </div>

                        <div id="botao_gerar_nova">
                            <button type="button" class="btn btn-success">Gerar Nova Chave</button>
                        </div>

                        <button type="button" class="btn btn-danger" id="cancel_new_user" data-dismiss="modal">
                            Cancelar
                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

    {{--modal de alterar dados de uma pessoa--}}
    <div class="modal fade" id="altera_pessoa" tabindex="-1" role="dialog"
         aria-labelledby="altera_pessoaLabel"
         aria-hidden="true">

        <div class="modal-dialog modal-xl" role="document">

            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Alteração de dados - <span class="the_posto_grad"></span> <span
                            class="the_nome_guerra"></span></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form id="form_alterar_user">

                    {{--modal body--}}
                    <div class="modal-body">

                        <div class=" alert alert-meu">

                            {{---nome e nome de guerra (posto)--}}
                            <div class="row">

                                {{--nome--}}
                                <div class="col">

                                    <div class="form-group">

                                        <label for="nome_user_edit">Nome</label>
                                        <input type="text" class="form-control" id="nome_user_edit"
                                               aria-describedby="name_user_edit_help">

                                        <input type="hidden" id="id_user_edit">

                                        <small id="name_user_edit_help" class="form-text text-muted">Altere o nome do
                                            usuário se desejar.</small>

                                    </div>

                                </div>

                                {{--nome de guerra / posto--}}
                                <div class="col">

                                    <div class="row">

                                        <div class="form-group col-5">

                                            <label for="nome_guerra_user_edit">P/G</label>
                                            <select class="form-control" id="posto_grad_user_edit"
                                                    aria-describedby="posto_grad_user_edit_help">
                                                <option>Gen Ex</option>
                                                <option>Gen Div</option>
                                                <option>Gen Bda</option>
                                                <option>Cel</option>
                                                <option>Ten Cel</option>
                                                <option>Maj</option>
                                                <option>Cap</option>
                                                <option>1º Ten</option>
                                                <option>2º Ten</option>
                                                <option>Asp</option>
                                                <option>S Ten</option>
                                                <option>1º Sgt</option>
                                                <option>2º Sgt</option>
                                                <option>3º Sgt</option>
                                                <option>Cb</option>
                                                <option>Sd</option>
                                                <option>SC</option>

                                            </select>

                                            <small id="posto_grad_user_edit_help" class="form-text text-muted">Altere o
                                                Posto/ Grad do usuário se desejar.</small>

                                        </div>

                                        <div class="form-group col-7">

                                            <label for="nome_guerra_user_edit">Nome de Guerra</label>
                                            <input type="text" class="form-control" id="nome_guerra_user_edit"
                                                   aria-describedby="nome_guerra_user_edit_help">

                                            <small id="nome_guerra_user_edit_help" class="form-text text-muted">Altere o
                                                nome de guerra do usuário se desejar.</small>

                                        </div>

                                    </div>

                                </div>

                            </div>

                            {{---email e tel contato--}}
                            <div class="row">

                                {{--email--}}
                                <div class="col">

                                    <div class="form-group">

                                        <label for="email_user_edit">Nome de Guerra</label>
                                        <input type="text" class="form-control" id="email_user_edit"
                                               aria-describedby="email_user_edit_help">

                                        <small id="email_user_edit_help" class="form-text text-muted">Altere o email do
                                            usuário se desejar.</small>

                                    </div>

                                </div>

                                {{--tel contato--}}
                                <div class="col">

                                    <div class="form-group">

                                        <label for="tel_user_edit">Telefone de Contato</label>
                                        <input type="tel" class="form-control tel_ctt" id="tel_user_edit"
                                               aria-describedby="tel_user_edit_help">

                                        <small id="tel_user_edit_help" class="form-text text-muted">Altere o Telefone de
                                            contato do usuário se desejar.</small>

                                    </div>

                                </div>

                            </div>


                            {{--tu de formação sfc--}}
                            <div class="row">

                                <div class="col">

                                    <div class="form-group">

                                        <label for="tu_form_user_edit">Turma de Formação</label>
                                        <input type="text" class="form-control" id="tu_form_user_edit"
                                               aria-describedby="tu_form_user_edit_help">

                                        <small id="tu_form_user_edit_help" class="form-text text-muted">Altere a turma
                                            de formação do usuário (SFC), obrigatório apenas para comandantes de PEF.
                                            Demais situações favor deixar em branco.</small>

                                    </div>

                                </div>

                                <div class="col"></div>
                            </div>


                        </div>

                        <div class="alert alert-dark">

                            {{---tipo de usuario e om --}}
                            <div class="row">

                                {{--om--}}
                                <div class="col">

                                    <div class="form-group">

                                        <label for="om_user_edit">Om</label>

                                        <select class="form-control" id="om_user_edit"
                                                aria-describedby="om_user_edit_help">

                                        </select>

                                        <small id="om_user_edit_help" class="form-text text-muted">Altere a Om do
                                            usuário se desejar.</small>

                                    </div>

                                </div>

                                {{--tipo de usuario--}}
                                <div class="col">
                                    <div id="selectContainer_edit">
                                        <div class="form-group">

                                            <label for="type_user_edit">Tipo de Usuário</label>

                                            <select class="form-control" id="type_user_edit"
                                                    aria-describedby="type_user_edit_help">

                                            </select>

                                            <small id="type_user_edit_help" class="form-text text-muted">Altere o tipo
                                                de usuário se desejar.</small>
                                        </div>

                                    </div>

                                </div>


                            </div>

                        </div>


                        <div class="alert alert-primary">
                            <b>Token de Acesso: </b> <span class="the_token"></span>
                        </div>


                    </div>

                    {{--modal footer--}}
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Alterar</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>

                    </div>

                </form>

            </div>

        </div>

    </div>

@endsection

@section('myScripts')

    {{-- load maskinput --}}
    <script src="{{ asset('js/maskinput.js') }}" defer></script>

    <script>
        $(function () {

            // masks

            // mask cpf
            $("#cpf").mask("999.999.999-99");

            // mask tel
            $(".tel_ctt").mask("(99) 99999-9999");


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

                ajax: "/allusers/todos",
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
                        data: "om.podeVerTudo", className: 'text-center', orderable: false,
                        render: function (data, type, row) {

                            if (data === 1) {

                                return '<i id="verGeral_' + row.id + '" data-tippy-content="Pode ver tudo" class="fa fa-eye"></i>';

                            } else {
                                return '<i id="verGeral_' + row.id + '" data-tippy-content="Não pode ver tudo" class="fa fa-eye-slash"></i>';
                            }


                        }
                    },
                    {data: "status", className: "text-center", name: "status"},
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        className: 'text-center',
                        render: function (data, type, row) {

                            let classe_button = '';
                            let classe_icon = '';
                            let text_tippy = '';

                            if (row.status == 'Ativo') {

                                classe_button = 'btn-outline-danger';
                                classe_icon = 'fa-ban';
                                text_tippy = 'Desativar Pessoa';

                            } else if (row.status == 'Inativo') {
                                classe_button = 'btn-outline-primary';
                                classe_icon = 'fa-check-circle';
                                text_tippy = 'Ativar Pessoa';
                            }

                            return '<button id="show_' + row.id + '" class="btn btn-sm btn-success btn_show" title="Detalhes sobre a pessoa" data-tippy-content="Exibe detalhes sobre a pessoa">' +
                                '<i class="fa fa-search"></i>' +
                                '</button>' +
                                '<span class="separaicon"></span>' +
                                '<button id="editar_' + row.id + '" class="btn btn-sm btn-warning btn_edit" title="Alterar Informações" data-tippy-content="Alterar Informações">' +
                                '<i class="fa fa-edit"></i>' +
                                '</button>' +
                                '<span class="separaicon"></span>' +
                                '<button id="desativa_' + row.id + '" class="btn btn-sm ' + classe_button + ' btn_desativa" title="Desativar pessoa" data-tippy-content="' + text_tippy + '">' +
                                '<i id="iconStatus_' + row.id + '" class="fa ' + classe_icon + '"></i>' +
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

            // monta as tabelas filtradas por tipos
            $(document).on('click', '.mytabsselect', function () {

                // destroi a instancia
                var leTable = $('#user_table').DataTable();
                leTable.destroy();

                let what_type = $(this).attr('id').split('-')[1];

                console.log(what_type);

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

                    ajax: "/allusers/" + what_type,
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
                            data: "om.podeVerTudo", className: 'text-center', orderable: false,
                            render: function (data, type, row) {

                                if (data === 1) {

                                    return '<i id="verGeral_' + row.id + '" data-tippy-content="Pode ver tudo" class="fa fa-eye"></i>';

                                } else {
                                    return '<i id="verGeral_' + row.id + '" data-tippy-content="Não pode ver tudo" class="fa fa-eye-slash"></i>';
                                }


                            }
                        },
                        {data: "status", className: "text-center", name: "status"},
                        {
                            data: 'action',
                            name: 'action',
                            orderable: false,
                            className: 'text-center',
                            render: function (data, type, row) {

                                let classe_button = '';
                                let classe_icon = '';
                                let text_tippy = '';

                                if (row.status == 'Ativo') {

                                    classe_button = 'btn-outline-danger';
                                    classe_icon = 'fa-ban';
                                    text_tippy = 'Desativar Pessoa';

                                } else if (row.status == 'Inativo') {
                                    classe_button = 'btn-outline-primary';
                                    classe_icon = 'fa-check-circle';
                                    text_tippy = 'Ativar Pessoa';
                                }

                                return '<button id="show_' + row.id + '" class="btn btn-sm btn-success btn_show" title="Detalhes sobre a pessoa" data-tippy-content="Exibe detalhes sobre a pessoa">' +
                                    '<i class="fa fa-search"></i>' +
                                    '</button>' +
                                    '<span class="separaicon"></span>' +
                                    '<button id="editar_' + row.id + '" class="btn btn-sm btn-warning btn_edit" title="Alterar Informações" data-tippy-content="Alterar Informações">' +
                                    '<i class="fa fa-edit"></i>' +
                                    '</button>' +
                                    '<span class="separaicon"></span>' +
                                    '<button id="desativa_' + row.id + '" class="btn btn-sm ' + classe_button + ' btn_desativa" title="Desativar pessoa" data-tippy-content="' + text_tippy + '">' +
                                    '<i id="iconStatus_' + row.id + '" class="fa ' + classe_icon + '"></i>' +
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

            });

            $('#user_table').on('draw.dt', function () {
                tippy('[data-tippy-content]');
            });

            // monta a tabela de seriais
            $(document).on('click', '#pills-serial-tab', function () {

                // inicializa o datatables
                var leSerial = $('#serial_table').DataTable();
                leSerial.destroy();

                $('#serial_table').DataTable({
                    processing: false,
                    serverSide: false,
                    autoWidth: false,
                    language: {
                        emptyTable: "Nenhum serial cadastrado",
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

                    ajax: "/alltoken/todos",
                    type: 'GET',
                    rowId: function (a) {
                        return 'user_' + a.id;
                    },
                    columns: [
                        {data: "id", name: 'id', 'visible': false},
                        {data: "token", className: 'text-center'},
                        {data: "om.sigla"},
                        {data: "type", className: 'text-center'},
                        {data: "status", className: "text-center", name: "status"},
                        {data: "reference", className: 'text-center'},
                        {
                            data: "user.nome", className: "text-center",
                            render: function (data, type, row) {

                                if (row.status == 'Utilizado') {

                                    return row.user.posto_grad + ' ' + row.user.nome_guerra + ' ';

                                } else {

                                    return '-';
                                }


                            }
                        },
                        {
                            data: "gerador_tokens.nome", className: "text-center",
                            render: function (data, type, row) {
                                return row.gerador_tokens.posto_grad + ' ' + row.gerador_tokens.nome_guerra + ' ';
                            }
                        },

                        {
                            data: 'action',
                            name: 'action',
                            orderable: false,
                            className: 'text-center',
                            render: function (data, type, row) {

                                if (row.status == 'Aguardando Uso') {


                                    return '<button id="excluir_' + row.id + '" class="btn btn-sm btn-danger btn_exclude" title="Excluir Chave" data-tippy-content="Excluir Chave">' +
                                        '<i class="fa fa-trash"></i>' +
                                        '</button>';

                                } else if (row.status == 'Expirado') {

                                    return '<button id="renovarToken_' + row.id + '" class="btn btn-sm btn-warning btn_renova_token" title="Renovar Chave" data-tippy-content="Renovar Chave">' +
                                        '<i class="fa fa-redo"></i>' +
                                        '</button>' +
                                        '<span class="separaicon"></span>' +
                                        '<button id="excluirToken_' + row.id + '" class="btn btn-sm btn-danger btn_exclude_token" title="Excluir Chave" data-tippy-content="Excluir Chave">' +
                                        '<i class="fa fa-trash"></i>' +
                                        '</button>';

                                } else {

                                    return '-';

                                }

                            }

                        },

                    ],
                    order: [[0, 'desc']]
                });

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
                        $('.the_token').text(data.token.token + ' ( Gerado por: ' + data.token.gerador_tokens.posto_grad + ' ' + data.token.gerador_tokens.nome_guerra + ' - ' + data.token.gerador_tokens.om.sigla + ' ) ');

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

                $('#select_om_new_user').empty();

                $('#select_space').addClass('d-none');
                $('#retorno_chave').addClass('d-none');
                $('#botao_gerar_nova').addClass('d-none');
                $('#botao_submit').removeClass('d-none');
                $('#cancel_new_user').text('Cancelar');

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
                            arrayOms.push({id: teste.id, name: teste.sigla});
                            const resul = omRecursiva(teste.om);
                            return resul;
                        });

                        let options = '<option value=""> --- Selecione ---</option>';

                        arrayOms.map(function (resultadoFinal) {

                            options += `<option value=${resultadoFinal.id}>${resultadoFinal.name}</option>`;
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

            // retorna os possiveis tipos que a OM admite cadastro
            $(document).on('change', '#select_om_new_user , #om_user_edit', function (e) {

                e.preventDefault();

                const id = $(this).val();

                $.ajax({
                    type: 'GET',
                    url: '/mytypes/' + id,

                    beforeSend: function () {

                        $('#selectContainer').LoadingOverlay("show");
                        $('#selectContainer_edit').LoadingOverlay("show");

                    },
                    success: function (data) {

                        $('#select_space').removeClass('d-none');


                        $('#select_type_new_user').empty();
                        $('#type_user_edit').empty();

                        for (let i = 0; i < data.length; i++) {
                            $('#select_type_new_user, #type_user_edit').append('<option>' + data[i] + '</option>');
                        }


                        $('#selectContainer').LoadingOverlay("hide");
                        $('#selectContainer_edit').LoadingOverlay("hide");


                    },
                    error: function () {

                        // alert de erro
                        toastr.error('Não foi possível obter as informações!', 'Falha!');

                    }

                });


            });

            // cria a chave da acesso do novo usuário
            $(document).on('submit', '#form_new_user', function (e) {

                e.preventDefault(e);

                $.ajax({
                    type: 'POST',
                    url: '/token',
                    data: {
                        _method: 'POST',
                        _token: $('meta[name=csrf-token]').attr('content'),
                        om_id: $('#select_om_new_user').val(),
                        type: $('#select_type_new_user').val(),
                        reference: $('#dado_new_user').val(),
                    },
                    beforeSend: function () {

                        $('#espaco_inputs').LoadingOverlay("show");

                    },
                    success: function (data) {

                        $('#sub_espaco_inputs').addClass('d-none');
                        $('#retorno_chave').removeClass('d-none');
                        $('#botao_gerar_nova').removeClass('d-none');
                        $('#botao_submit').addClass('d-none');
                        $('#cancel_new_user').text('Fechar');


                        $('#serial_token').text(data.token);

                        // alerta de sucesso
                        toastr.success('O Token de Acesso foi criado com sucesso!', 'Sucesso!');


                    },
                    error: function (data) {

                        toastr.error('Não foi possível criar o Token de Acesso!', 'Falha!');

                    },
                    complete: function () {

                        $('#espaco_inputs').LoadingOverlay("hide");

                    }

                });

            });

            // ao clicar ajusta para gerar uma nova chave
            $(document).on('click', '#botao_gerar_nova', function (e) {

                e.preventDefault();

                $('#sub_espaco_inputs').removeClass('d-none');
                $('#retorno_chave').addClass('d-none');
                $('#botao_gerar_nova').addClass('d-none');
                $('#botao_submit').removeClass('d-none');
                $('#select_space').addClass('d-none');
                $('#cancel_new_user').text('Cancelar');

                $('#dado_new_user').val('');
                $('#select_om_new_user').val('');
                $('#select_type_new_user').empty();

            });

            // remove user
            $(document).on('click', '.btn_exclude', function (e) {

                e.preventDefault();

                var id = $(this).attr('id').split('_')[1];

                $.confirm({
                    title: 'Você esta certo disso?',
                    content: 'A ação de excluir um usuário não deve ser usada a não ser que vc tenha plena certeza do que está fazendo! O ideal, é apenas desativar o mesmo, pois assim é possível manter o histórico dele ao longo de toda a utilização do SisPef. O pessoa será excluída do sistema!',
                    buttons: {
                        Confirmar: {
                            action: function () {

                                $.ajaxSetup({
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    }
                                });

                                $.ajax({
                                    type: 'POST',
                                    url: '/admin/usermanager/' + id,

                                    data: {
                                        _method: 'DELETE',
                                    },
                                    success: function (data) {

                                        // remove da tabela do grupo
                                        var tablePerson = $('#user_table').DataTable();
                                        tablePerson.row('tr[id = "user_' + id + '" ]').remove().draw(false);


                                        // alerta de sucesso
                                        toastr.success('O usuário foi excluído com sucesso!', 'Sucesso!');

                                    },
                                    error: function () {

                                        // alert de erro
                                        toastr.error('Não foi possível excluir o usuário!', 'Falha!');

                                    }

                                });
                            },
                            btnClass: 'btn-outline-dark'
                        },
                        Cancelar: {
                            btnClass: 'btn-outline-danger'
                        },
                    },
                    columnClass: 'col-md-6'
                });


            });

            // muda status user (Ativo Inativo)
            $(document).on('click', '.btn_desativa', function (e) {

                e.preventDefault();

                var id = $(this).attr('id').split('_')[1];

                $.confirm({
                    title: 'Você esta certo disso?',
                    content: 'A ação de desativar um usuário vai impedir o mesmo de ter acesso ao SisPef, no entanto manterá todos os dados relativos a histórico de ações e acessos!',
                    buttons: {
                        Confirmar: {
                            action: function () {

                                $.ajaxSetup({
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    }
                                });

                                $.ajax({
                                    type: 'POST',
                                    url: '/user/status/' + id,

                                    data: {
                                        _method: 'GET',
                                    },
                                    success: function (data) {

                                        var $userTable = $('#user_table').dataTable();

                                        // The second parameter will be the row, and the third is the column.
                                        $userTable.fnUpdate(data.status, '#user_' + id, 5);

                                        //arruma botão

                                        if (data.status == 'Inativo') {

                                            $('#desativa_' + id).removeClass('btn-outline-danger').addClass('btn-outline-primary');
                                            $('#iconStatus_' + id).removeClass('fa-ban').addClass('fa-check-circle');
                                            $('#desativa_' + id).attr('data-tippy-content', 'Ativar Pessoa');

                                        } else if (data.status == 'Ativo') {

                                            $('#desativa_' + id).addClass('btn-outline-danger').removeClass('btn-outline-primary');
                                            $('#iconStatus_' + id).addClass('fa-ban').removeClass('fa-check-circle');
                                            $('#desativa_' + id).attr('data-tippy-content', 'Desativar Pessoa');

                                        }

                                        // reload tippy
                                        tippy('[data-tippy-content]');

                                        // alerta de sucesso
                                        toastr.success('O usuário foi desativado com sucesso!', 'Sucesso!');

                                    },
                                    error: function (data) {

                                        // alert de erro
                                        toastr.error('Não foi possível desativar o usuário!', 'Falha!');

                                    }

                                });
                            },
                            btnClass: 'btn-outline-dark'
                        },
                        Cancelar: {
                            btnClass: 'btn-outline-danger'
                        },
                    },
                    columnClass: 'col-md-6'
                });


            });

            // abre o modal de editar pessoa
            $(document).on('click', '.btn_edit', function (e) {

                e.preventDefault();

                var id = $(this).attr('id').split('_')[1];

                $.ajax({
                    type: 'GET',
                    url: '/admin/usermanager/' + id,

                    success: function (data) {

                        $('.the_posto_grad').text(data.posto_grad);
                        $('.the_nome_guerra').text(data.nome_guerra);

                        $('#id_user_edit').val(data.id);

                        $('#nome_user_edit').val(data.nome);
                        $('#nome_guerra_user_edit').val(data.nome_guerra);

                        $('#email_user_edit').val(data.email);
                        $('#tel_user_edit').val(data.tel_contato);

                        $('#tu_form_user_edit').val(data.tu_formacao);

                        $('#posto_grad_user_edit').val(data.posto_grad)

                        var id_my_om = data.om.id;
                        var meutipo_edit = data.user_tipo.tipo;

                        // monta o select de OM possiveis
                        $.ajax({
                            type: 'GET',
                            url: '/myom',

                            success: function (data) {

                                $('#om_user_edit').empty();

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
                                    arrayOms.push({id: teste.id, name: teste.sigla});
                                    const resul = omRecursiva(teste.om);
                                    return resul;
                                });

                                let options = '<option value=""> --- Selecione ---</option>';

                                arrayOms.map(function (resultadoFinal) {

                                    let selecionado = '';

                                    if (resultadoFinal.id == id_my_om) {
                                        selecionado = 'selected';
                                    }

                                    options += `<option ${selecionado} value=${resultadoFinal.id}>${resultadoFinal.name}</option>`;
                                })

                                $('#om_user_edit').append(options);


                                $.ajax({
                                    type: 'GET',
                                    url: '/mytypes/' + id,

                                    beforeSend: function () {

                                        $('#selectContainer_edit').LoadingOverlay("show");

                                    },
                                    success: function (data) {

                                        $('#type_user_edit').empty();

                                        for (let i = 0; i < data.length; i++) {

                                            var typeUserEditSelected = '';
                                            if (data[i] == meutipo_edit) {
                                                typeUserEditSelected = 'selected';
                                            }

                                            $('#type_user_edit').append('<option ' + typeUserEditSelected + '>' + data[i] + '</option>');
                                        }


                                        $('#selectContainer_edit').LoadingOverlay("hide");


                                    },
                                    error: function () {

                                        // alert de erro
                                        toastr.error('Não foi possível obter as informações!', 'Falha!');

                                    }

                                });


                            },
                            error: function () {

                                // alert de erro
                                toastr.error('Não foi possível obter as informações!', 'Falha!');

                            }

                        });

                        $('.the_token').text(data.token.token + ' ( Gerado por: ' + data.token.gerador_tokens.posto_grad + ' ' + data.token.gerador_tokens.nome_guerra + ' - ' + data.token.gerador_tokens.om.sigla + ' ) ');

                        // show modal
                        $('#altera_pessoa').modal('show');
                    },
                    error: function () {

                        // alert de erro
                        toastr.error('Não foi possível obter as informações!', 'Falha!');

                    }

                });

            });

            // submete a edição de um usuário já cadastrado
            $(document).on('submit', '#form_alterar_user', function (e) {

                e.preventDefault(e);

                let le_id_edit = $('#id_user_edit').val();

                $.ajax({
                    type: 'POST',
                    url: '/admin/usermanager/' + le_id_edit,
                    data: {
                        _method: 'PUT',
                        _token: $('meta[name=csrf-token]').attr('content'),
                        om_id: $('#om_user_edit').val(),
                        type: $('#type_user_edit').val(),
                        nome: $('#nome_user_edit').val(),
                        nome_guerra: $('#nome_guerra_user_edit').val(),
                        posto_grad: $('#posto_grad_user_edit').val(),
                        tel_contato: $('#tel_user_edit').val(),
                        email: $('#email_user_edit').val(),

                    },

                    success: function (data) {


                        console.log(data);


                        var $userTable = $('#user_table').dataTable();

                        // The second parameter will be the row, and the third is the column.
                        $userTable.fnUpdate(data.nome, '#user_' + data.id, 1);
                        $userTable.fnUpdate(data.user_tipo.tipo, '#user_' + data.id, 2);
                        $userTable.fnUpdate(data.om.sigla, '#user_' + data.id, 3);

                        if (data.om.podeVerTudo) {

                            $('#verGeral_' + data.id).removeClass('fa-eye-slash').addClass('fa-eye');

                        } else {

                            $('#verGeral_' + data.id).removeClass('fa-eye').addClass('fa-eye-slash');

                        }

                        $('#altera_pessoa').modal('hide');


                        // alerta de sucesso
                        toastr.success('O usuário foi alterado com sucesso!', 'Sucesso!');


                    },
                    error: function (data) {

                        console.log(data);

                        toastr.error('Não foi possível alterar o usuário!', 'Falha!');

                    }


                });

            });

            //renova token
            $(document).on('click','.btn_renova_token', function (e) {

                e.preventDefault();

                console.log('renova');


                var id = $(this).attr('id').split('_')[1];

                $.confirm({
                    title: 'Você esta certo disso?',
                    content: 'A data de criação do Token será ajustada para o dia de hoje. ',
                    buttons: {
                        Confirmar: {
                            action: function () {

                                $.ajaxSetup({
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    }
                                });

                                $.ajax({
                                    type: 'GET',
                                    url: '/renovatoken/' + id,

                                    success: function (data) {

                                        console.log(data);

                                        // alerta de sucesso


                                        // TENHO QUE ATUALIZAR O STATUS DO TOKEN E REMOVER O BOTÃO DE RENOVAR

                                        toastr.success('O Token foi renovado com sucesso!', 'Sucesso!');

                                    },
                                    error: function () {

                                        // alert de erro
                                        toastr.error('Não foi possível renovar o Token!', 'Falha!');

                                    }

                                });
                            },
                            btnClass: 'btn-outline-dark'
                        },
                        Cancelar: {
                            btnClass: 'btn-outline-danger'
                        },
                    },
                    columnClass: 'col-md-6'
                });



            });



        });
    </script>

@endsection
