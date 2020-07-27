{{-- Sidebar  --}}
<nav id="sidebar">



    <ul class="list-unstyled components">

        {{--menu--}}
        <li class=" @if (Request::path() == 'home') active__sidebar @endif">
            <a href="/" class="link-menu__sidebar">
                <i class="fas fa-home"></i> Home</a>
        </li>

        {{--Administração--}}
        <li >

            <a href="#adminSubmenu" data-toggle="collapse" aria-expanded= @if(Request::path() == 'ommanager' || Request::path() == 'admin/usermanager') "true" @else "false" @endif
               class="link-menu__sidebar dropdown-toggle adjust-caret_sidebar @if(Request::path() == 'ommanager' || Request::path() == 'admin/usermanager') true @else false @endif ">
                <i class="fas fa-cogs"></i>
                Adm
            </a>

            <ul class=" @if(Request::path() == 'ommanager' || Request::path() == 'admin/usermanager') show @else collapse @endif list-unstyled" id="adminSubmenu">
                <li>
                    <a href="{{ route("usermanager.index") }}" class="link-menu__sidebar link-submenu__sidebar @if (Request::path() == 'admin/usermanager') active__sublink @endif"><i class="fas fa-user"></i> Controle de Usuários</a>
                </li>
                <li>
                    <a href="{{ route("ommanager.index") }}" class="link-menu__sidebar link-submenu__sidebar @if (Request::path() == 'ommanager') active__sublink @endif"><i class="fa fa-globe"></i> Gerenciamento de OM</a>
                </li>
                <li>
                    <a href="#" class="link-menu__sidebar link-submenu__sidebar">About 3</a>
                </li>
            </ul>

        </li>


        {{--pages--}}
        <li>
            <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false"
               class="dropdown-toggle adjust-caret_sidebar link-menu__sidebar">
                <i class="fas fa-copy"></i>
                Pages
            </a>
            <ul class="collapse list-unstyled" id="pageSubmenu">
                <li>
                    <a href="#" class="link-menu__sidebar link-submenu__sidebar">Page 1</a>
                </li>
                <li>
                    <a href="#" class="link-menu__sidebar link-submenu__sidebar">Page 2</a>
                </li>
                <li>
                    <a href="#" class="link-menu__sidebar link-submenu__sidebar">Page 3</a>
                </li>
            </ul>
        </li>

        {{--faq--}}
        <li>
            <a href="#" class="link-menu__sidebar">
                <i class="fas fa-question"></i>
                FAQ
            </a>
        </li>

        {{--contact--}}
        <li>
            <a href="#" class="link-menu__sidebar">
                <i class="fas fa-paper-plane"></i>
                Contact
            </a>
        </li>
    </ul>


</nav>
