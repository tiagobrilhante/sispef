@extends('layouts.paginaInicial.paginaInicial')

@section('content')

    <div class="container-fluid pb-4">

        <div class="row justify-content-center">

            <div class="col-md-8">

                <div class="card">

                    <div class="card-header">{{ __('Cadastro de Usuário - SisPef') }}</div>

                    <div class="card-body pb-0">

                        {{--espaço para serial--}}
                        <div class="row" id="le_serial_space">

                            <div class="col">

                                <div class="alert alert-meu">

                                    <div class="text-center">
                                        <h4>Digite o serial de acesso</h4>
                                    </div>

                                    <br>

                                    <form id="serial_form">

                                        {{--serial--}}
                                        <div class="form-group">

                                            <label for="serial">{{ __('Serial') }}</label>

                                            <input id="serial" type="text"
                                                   class="form-control @error('serial') is-invalid @enderror"
                                                   name="serial"
                                                   value="{{ old('serial') }}" required autocomplete="serial" autofocus>

                                            @error('serial')

                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                        </span>

                                            @enderror

                                        </div>

                                        {{--botões--}}
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col">

                                                    <button type="submit" class="btn btn-success btn-block"> Submeter
                                                    </button>

                                                </div>
                                                <div class="col">

                                                    <button type="button" class="btn btn-danger btn-block"> Cancelar
                                                    </button>

                                                </div>
                                            </div>


                                        </div>

                                    </form>

                                </div>

                            </div>

                        </div>

                        {{--form de cadastro--}}
                        <div class="d-none" id="le_form_space">

                            <form method="POST" action="{{ route('register') }}">
                                @csrf

                                <div class="row">
                                    <div class="col">

                                        <div class="alert alert-dark">
                                            <b>Serial: </b> <span id="serial_user"></span> <br>
                                            <input type="hidden" name="token_serial" id="token_serial" readonly>
                                            <b>Om: </b> <span id="le_om_user"></span> <br>
                                            <b>Tipo de usuário: </b> <span id="le_type_user"></span>
                                        </div>

                                    </div>
                                </div>

                                {{--nome completo--}}
                                <div class="row">

                                    <div class="col">

                                        <div class="form-group">

                                            <label for="nome">{{ __('Nome Completo') }}</label>

                                            <input id="nome" type="text"
                                                   class="form-control @error('nome') is-invalid @enderror" name="nome"
                                                   value="{{ old('nome') }}" required autocomplete="nome" autofocus>

                                            @error('nome')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror


                                        </div>

                                    </div>

                                </div>

                                {{--postograd e nome guerra--}}
                                <div class="row">

                                    {{--postograd--}}
                                    <div class="col">

                                        <div class="form-group">

                                            <label for="name">{{ __('Posto / Grad') }}</label>


                                            <select id="posto_grad" type="text"
                                                    class="form-control @error('posto_grad') is-invalid @enderror"
                                                    name="posto_grad" required>

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

                                            @error('posto_grad')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror

                                        </div>

                                    </div>

                                    {{--nome guerra--}}
                                    <div class="col">

                                        <div class="form-group">

                                            <label for="name">{{ __('Nome de Guerra') }}</label>


                                            <input id="nome_guerra" type="text"
                                                   class="form-control @error('nome_guerra') is-invalid @enderror"
                                                   name="nome_guerra"
                                                   value="{{ old('nome_guerra') }}" required autocomplete="nome_guerra">

                                            @error('nome_guerra')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror

                                        </div>

                                    </div>

                                </div>

                                {{--telefone de contato e email--}}
                                <div class="row">

                                    {{--telefone de contato--}}
                                    <div class="col">

                                        <div class="form-group">

                                            <label for="tel_contato">{{ __('Telefone de Contato') }}</label>


                                            <input id="tel_contato" type="text"
                                                   class="form-control @error('tel_contato') is-invalid @enderror"
                                                   name="tel_contato"
                                                   value="{{ old('tel_contato') }}" required autocomplete="tel_contato">

                                            @error('tel_contato')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror

                                        </div>

                                    </div>

                                    {{---email--}}
                                    <div class="col">

                                        <div class="form-group">

                                            <label for="email">{{ __('Email') }}</label>


                                            <input id="email" type="email"
                                                   class="form-control @error('email') is-invalid @enderror"
                                                   name="email"
                                                   value="{{ old('email') }}" required autocomplete="email">

                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror

                                        </div>

                                    </div>

                                </div>

                                {{--tu formação--}}
                                <div class="row d-none" id="tu_for_space">

                                    <div class="col">

                                        <div class="form-group">

                                            <label for="name">{{ __('Turma de Formação') }}</label>


                                            <input id="tu_formacao" type="text"
                                                   class="form-control @error('tu_formacao') is-invalid @enderror"
                                                   name="tu_formacao"
                                                   value="{{ old('tu_formacao') }}" required autocomplete="tu_formacao">

                                            @error('tu_formacao')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror

                                        </div>

                                    </div>

                                    <div class="col"></div>
                                </div>

                                {{--senha e repita a senha--}}
                                <div class="row">

                                    {{--senha--}}
                                    <div class="col">

                                        <div class="form-group">

                                            <label for="password">{{ __('Senha') }}</label>

                                            <input id="password" type="password"
                                                   class="form-control @error('password') is-invalid @enderror"
                                                   name="password" required autocomplete="new-password">

                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror


                                        </div>

                                    </div>

                                    {{--repita a senha--}}
                                    <div class="col">

                                        <div class="form-group ">

                                            <label for="password-confirm">{{ __('Confirme a senha') }}</label>


                                            <input id="password-confirm" type="password" class="form-control"
                                                   name="password_confirmation" required autocomplete="new-password">

                                        </div>

                                    </div>

                                </div>

                                {{--botoes--}}
                                <div class="row">

                                    {{--submit--}}
                                    <div class="col">

                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary btn-block">
                                                {{ __('Cadastrar') }}
                                            </button>
                                        </div>

                                    </div>

                                    {{--cancelar--}}
                                    <div class="col">

                                        <div class="form-group">

                                            <button type="button" class="btn btn-danger btn-block">
                                                {{ __('Cancelar') }}
                                            </button>
                                        </div>

                                    </div>

                                </div>


                            </form>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>
@endsection

@section('myScripts')

    {{-- load maskinput --}}
    <script src="{{ asset('js/maskinput.js') }}" defer></script>

    <script>
        $(function () {

            // mask cpf
            $("#serial").mask("********-****-****-****-************");
            // mask tel
            $("#tel_contato").mask("(99) 99999-9999");


            // solicita o retorno do serial
            $(document).on('submit', '#serial_form', function (e) {

                e.preventDefault();

                $.ajax({
                    type: 'POST',
                    url: '/recebeserial',
                    data: {
                        _method: 'POST',
                        _token: $('meta[name=csrf-token]').attr('content'),
                        serial: $('#serial').val(),

                    },

                    success: function (data) {

                        console.log(data);

                        if (data == 'Serial Expirado') {
                            // alert de erro
                            toastr.error('Serial Expirado, tente com um serial válido!', 'Falha!');
                        } else if (data == 'Serial em uso') {
                            // alert de erro
                            toastr.error('Serial já utilizado, tente com um serial válido!', 'Falha!');
                        } else if (data == 'Token Inexistente') {
                            // alert de erro
                            toastr.error('Serial Inexistente, tente com um serial válido!', 'Falha!');
                        } else {
                            // aqui o serial é válido
                            $('#le_form_space').removeClass('d-none');
                            $('#le_serial_space').addClass('d-none');
                            $('#serial_user').text(data.token);
                            $('#le_om_user').text(data.om.sigla);
                            $('#le_type_user').text(data.type);
                            $('#token_serial').val(data.token);

                            if (data.om.ePef) {
                                $('#tu_for_space').removeClass('d-none');
                            }


                        }


                    },
                    error: function (data) {

                        // alert de erro
                        toastr.error('Não foi possível executar a ação!', 'Falha!');

                    }

                });


            })

            // submete o for de registro.




        });
    </script>

@endsection
