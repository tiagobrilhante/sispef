@extends('layouts.insideApp.app')

@section('content')

    {{--espaço do chart--}}

    <div class="mb-4 bordas ">

        <div class="row ">

            <div class="col-12">

                <div id="orgChartContainer">

                    <div id="orgChart"></div>

                </div>

            </div>

        </div>

    </div>

@endsection

@section('myScripts')

    {{--colorpick--}}
    <script src="https://cdn.jsdelivr.net/npm/@jaames/iro@5"></script>

    {{--orgchart modificado--}}
    <script src="{{ asset('js/jquery.orgchart.js') }}" defer></script>

    <script>

        $(function () {

            // carrega as informações do banco (OM)
            $.ajax({
                type: 'GET',
                url: '/allOm',

                beforeSend: function(){

                    $('#orgChartContainer').LoadingOverlay("show");

                },
                success: function (data) {

                    console.log(data);

                    org_chart = $('#orgChart').orgChart({
                        data: data,
                        showControls: true,
                        allowEdit: true,
                        onAddNode: function (node) {
                            org_chart.newNode(node.data.id);
                        },
                        onDeleteNode: function (node) {

                            org_chart.deleteNode(node.data.id);
                        },
                        onClickNode: function (node) {

                        }

                    });

                },
                error: function (data) {

                    // alert de erro
                    toastr.error('Não foi possível obter as informações!', 'Falha!');

                },
                complete: function () {
                    $('#orgChartContainer').LoadingOverlay("hide");
                }

            });

        });
    </script>

@endsection
