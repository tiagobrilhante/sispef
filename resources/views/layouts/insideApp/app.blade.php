<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'SisPef') }}</title>

    @include('layouts.insideApp.requiredStyles')

    {{--section para css--}}
    @yield('myStyles')



</head>
<body>
<div id="app">
    @include('insideApp.navBar')

        <div class="row ">
            <div class="col-12">

                <div class="alert alert-dark corteste my-0 mx-0">
                    <button type="button" id="sidebarCollapse" class="btn btn-dark btn-sm">
                        <i class="fa fa-align-justify"> </i>
                        <span> Recolher Menu</span>
                    </button>

                    alertas
                </div>

            </div>
        </div>

    <div class="wrapper">

        {{--sidebar--}}
        @include('insideApp.sidebar')

        {{-- Page Content  --}}
        <main id="content" class="container-fluid scroll">

                @yield('content')

        </main>

    </div>

</div>

@include('static.footer')

@include('layouts.insideApp.requiredJs')

@yield('myScripts')

<script>
    $(document).ready(function () {
        $('#sidebarCollapse').on('click', function () {
            $('#sidebar').toggleClass('active__sidebar');
        });

        function abremodaledit(id) {

            $.ajax({
                type: 'GET',
                url: '/admin/usermanager/' + id,

                success: function (data) {

                    console.log(data);

                    if (data.status == 'Resetado') {

                        $('#user_reseted').removeClass('d-none');

                    } else {

                        $('#user_reseted').addClass('d-none');
                    }

                    $('#passwdEditModal').modal('show');
                },
                error: function (data) {

                    console.log(data);

                    // alert de erro
                    toastr.error('Não foi possível obter as informações!', 'Falha!');

                }

            });
        }


        // manda senha update
        $(document).on('submit', '#form_edit_password', function (e) {

            e.preventDefault();

            if ($('#passwd').val() != $('#passwd_conf').val()) {

                // alert de erro
                toastr.error('As senhas preenchidas não estão iguais. Tente preencher o campo "Confirme a nova senha" com o mesmo valor do campo  "insira a nova senha"!', 'Falha!', {timeOut: 6000});

            } else {

                $.ajax({
                    type: 'POST',
                    url: '/updatepasswd/' + @auth{{ Auth::user()->id }}@endauth,
                    data: {
                        _method: 'PUT',
                        _token: '{{ csrf_token() }}',
                        password: $('#passwd').val(),

                    },
                    success: function (data) {

                        // alerta de sucesso
                        toastr.success('A Senha foi alterada com sucesso!', 'Sucesso!');

                        //reseta o form

                        $('#form_edit_password').trigger('reset');
                        // close modal
                        $('#passwdEditModal').modal('hide');

                        if (data == 'refresh'){
                            location.reload();
                        }


                    },
                    error: function () {

                        // alert de erro
                        toastr.error('Não foi possível alterar a sua senha!', 'Falha!');

                    }

                });

            }

        });

        $(document).on('click', '#alterarsenha_user', function (e) {

            abremodaledit(@auth{{Auth::user()->id}}@endauth);

        });




    });
</script>

</body>
</html>
