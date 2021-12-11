<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <li class="nav-item">
            <a href="{{route('dashboard')}}" class="nav-link {{request()->is('admin') ? 'active':''}}">
                <i class="nav-icon fas fa-home"></i>
                <p>
                    Inicio
                </p>
            </a>
        </li>
        <li class="nav-item {{request()->is('admin/posts*') ? 'menu-open':'menu-close'}} ">
            <a href="#" class="nav-link {{request()->is('admin/posts*') ? 'active':''}}">
                <i class="nav-icon fas fa-bars"></i>
                <p>
                    Blog
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route('admin.posts.index')}}" class="nav-link {{request()->is('admin/posts') ? 'active':''}}">
                        <i class="fas fa-table nav-icon"></i>
                        <p>Ver todos los posts</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.posts.create')}}" class="nav-link {{request()->is('admin/posts/create') ? 'active':''}}">
                        <i class="fas fa-plus nav-icon"></i>
                        <p>Crear post</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                <i class="nav-icon fas fa-sign-out-alt"></i>
                <p>
                    Cerrar sesión
                </p>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </li>
    </ul>
</nav>