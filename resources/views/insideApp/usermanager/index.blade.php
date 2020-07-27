@extends('layouts.insideApp.app')

@section('content')



            <div class="card">
                <div class="card-header">{{ __('Gerenciamento de Usuários') }}</div>

                <div class="card-body">

                    {{--tabela--}}
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




@endsection

@section('myScripts')

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

@endsection
