@extends('layouts.app')

@section('content')

    <div class="container-fluid">

        <div class="row espacobaixo20">
            <div class="col-md-12 text-center">
                <h1 class="audiowide">Informações sobre a versão</h1>
            </div>
        </div>

        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <a class="btn btn-secondary btn-block"
                   href="{{ URL::previous() }}">Voltar</a>
            </div>
            <div class="col-md-1"></div>
        </div>

        <div class="row">

            <div class="col-md-1"></div>

            <div class="col-md-10">

                <div class="alert alert-dark">

                    <h3 class="audiowide text-center">SisPef - Sistema Analítico de Pelotões Especiais de Fonteira</h3>

                    <div class="alert alert-light">

                        <ul>

                            <li>v 1.0.0a - Nasce o SisPef em 17 de Julho de 2020</li>
                            <ul>
                                <li>Programado em PHP, usando Framework Laravel</li>
                                <li>Utilização de Bootstrap 4.0</li>
                                <li>Utilização de jQuery</li>
                                <li>Utilização de Ajax</li>

                            </ul>

                        </ul>

                    </div>

                </div>

            </div>

            <div class="col-md-1"></div>

        </div>

    </div>

    <br><br>

@endsection
