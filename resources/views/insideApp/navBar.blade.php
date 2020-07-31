<nav class="navbar navbar-expand navbar-dark bg-dark shadow-sm">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'SisPef') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            {{-- Left Side Of Navbar --}}
            <ul class="navbar-nav mr-auto">

            </ul>

            {{-- Right Side Of Navbar --}}
            <ul class="navbar-nav ml-auto">

                {{-- Authentication Links --}}
                @guest

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">{{ __('Home') }}</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->posto_grad }} {{ Auth::user()->nome_guerra }} <span class="caret"></span>
                        </a>



                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                            {{--altera senha--}}
                            <a class="dropdown-item" href="#" id="alterarsenha_user">
                                {{ __('Alterar Senha') }}
                            </a>

                            {{--logout--}}
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>

                        </div>

                    </li>

                @endguest

            </ul>

        </div>

    </div>
</nav>



{{--modal de mudar senha--}}
<div class="modal fade" id="passwdEditModal" tabindex="-1" role="dialog"
     aria-labelledby="passwdEditModallLabel"
     aria-hidden="true">

    <div class="modal-dialog" role="document">

        <div class="modal-content">

            {{--modal header--}}
            <div class="modal-header">

                <h5 class="modal-title" id="passwdEditModalLabel">Alteração de senha do usuário
                    - {{ Auth::user()->posto_grad }} {{ Auth::user()->nome_guerra }}  </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

            </div>

            {{--modal body--}}
            <form action="" method="POST" enctype="multipart/form-data" id="form_edit_password">

                <div class="modal-body">

                    <div class="alert alert-danger text-justify" id="user_reseted">

                        <i class="fa fa-warning blink"></i>
                        Sua senha foi provavelmente resetada por um Administrador e por isso, você usou o seu email como
                        senha.
                        Para resolver isso, e adotar uma senha mais forte, você deve alterar a sua senha nesse momento.

                    </div>

                    <label for="passwd">Insira a nova senha</label>
                    <div class="input-group mb-3">
                        <span class="input-group-addon"><i class="icon-lock"></i></span>
                        <input type="password" name="password" class="form-control" placeholder="Senha" required
                               id="passwd">
                    </div>

                    <label for="passwd_conf">Confirme a nova senha</label>
                    <div class="input-group mb-3">
                        <span class="input-group-addon"><i class="icon-lock"></i></span>
                        <input type="password" name="confirma_senha" class="form-control" id="passwd_conf"
                               placeholder="Repita a senha" required>
                    </div>

                </div>

                {{--modal footer--}}
                <div class="modal-footer">

                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger">Alterar</button>

                </div>

            </form>

        </div>

    </div>

</div>


