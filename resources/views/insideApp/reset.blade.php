@extends('layouts.insideApp.app')

@section('content')

            <div class="alert alert-meu pb-0 text-center">

                <h2><span class="blink"><i class="fa fa-exclamation-triangle"></i> Alerta! <i class="fa fa-exclamation-triangle"></i> </span></h2>

                <div class="alert alert-dark">
                    Olá {{ Auth::user()->posto_grad }} {{ Auth::user()->nome_guerra }}.<br>
                    Sua senha foi resetada por um administrador. Para prosseguir no uso do sistema, é necessário o cadastramento de uma nova senha!

                    <br><br>

                    {{--altera senha--}}
                    <button class="btn btn-outline-primary" href="#" id="alterarsenha_user">
                        {{ __('Clique para alterar Senha') }}
                    </button>

                </div>



            </div>

@endsection
