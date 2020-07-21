@extends('layouts.app')

@section('content')

    <div class="container-fluid">

        <div class="row espacobaixo20">
            <div class="col-md-12 text-center">
                <h1 class="audiowide">Informações sobre o Desenvolvedor</h1>
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

                        <h4 class="panel-title">Desenvolvedor Full-Stack</h4>

                        <div class="row">

                            <div class="col-md-2">

                                <img src="/img/militar.png"
                                     class="img-thumbnail img-fluid rounded float-right">

                            </div>

                            <div class="col-md-10">

                                <ul>
                                    <li>Nome - Tiago da Silva Brilhante</li>
                                    <li>Posto - Maj</li>
                                    <li>Nome de Guerra - Maj Brilhante</li>
                                    <li>OM - 12ª Região Militar</li>
                                    <li>email - tiagobrilhantemania@gmail.com</li>
                                </ul>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <div class="col-md-1"></div>

        </div>

    </div>

    <br><br>
@endsection
