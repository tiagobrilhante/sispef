
<nav id="sidebar">


    <ul class="list-unstyled components">

        
        <li class=" <?php if(Request::path() == 'home'): ?> active__sidebar <?php endif; ?>">
            <a href="/" class="link-menu__sidebar">
                <i class="fas fa-home"></i> Home</a>
        </li>

        
        <li >

            <a href="#adminSubmenu" data-toggle="collapse" aria-expanded="<?php if(explode('/',Request::path())[0] == 'admin'): ?>true <?php else: ?> false <?php endif; ?>"
               class="link-menu__sidebar dropdown-toggle adjust-caret_sidebar <?php if(explode('/',Request::path())[0] == 'admin'): ?> <?php else: ?> collapsed <?php endif; ?> ">
                <i class="fas fa-cogs"></i>
                Adm
            </a>

            <ul class="<?php if(explode('/',Request::path())[0] == 'admin'): ?> show <?php else: ?> collapse <?php endif; ?> list-unstyled" id="adminSubmenu">
                <li>
                    <a href="<?php echo e(route("usermanager.index")); ?>" class="link-menu__sidebar link-submenu__sidebar <?php if(Request::path() == 'admin/usermanager'): ?> active__sublink <?php endif; ?>"><i class="fas fa-user"></i> Controle de Usuários</a>
                </li>
                <li>
                    <a href="<?php echo e(route("ommanager.index")); ?>" class="link-menu__sidebar link-submenu__sidebar <?php if(Request::path() == 'admin/ommanager'): ?> active__sublink <?php endif; ?>"><i class="fa fa-globe"></i> Gerenciamento de OM</a>
                </li>
                <li>
                    <a href="#" class="link-menu__sidebar link-submenu__sidebar">About 3</a>
                </li>
            </ul>

        </li>


        
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

        
        <li>
            <a href="#" class="link-menu__sidebar">
                <i class="fas fa-question"></i>
                FAQ
            </a>
        </li>

        
        <li>
            <a href="#" class="link-menu__sidebar">
                <i class="fas fa-paper-plane"></i>
                Contact
            </a>
        </li>
    </ul>


</nav>
<?php /**PATH /Users/tiagobrilhante/Workspace/sispef/resources/views/insideApp/sidebar.blade.php ENDPATH**/ ?>