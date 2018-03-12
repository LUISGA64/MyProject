<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="text-align: center;">
            <a href="{{ url('/') }}" class="site_title">
            <span style="color: #16A085">Censo Web</span></a>
        </div>
        <div class="clearfix"></div>
        <!-- menu profile quick info -->
        <div class="profile" style="margin-top: 1px">
            <div class="profile_info" style="margin-top: -30px">
                <span>Bienvenido:</span>
                <h2>{{ Auth::user()->name }}</h2>
            </div>
        </div>
        <!-- /menu profile quick info -->
        <br />
        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section"><br>
                <h2 style="margin-top: 20px; border-bottom: solid 0.1px; margin-left: 5px; color: #16A085">Menú</h2>
                <ul class="nav side-menu">
                    <li><a><i class="fa fa-shield"></i> Seguridad <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{ route('entrust-gui::users.index') }}">Usuarios</a></li>
                            <li><a href="{{ route('entrust-gui::roles.index') }}">Roles</a></li>
                            <li><a href="{{ route('entrust-gui::permissions.index') }}">Permisos</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{ route('grupo-familiar-index') }}">
                            <i class="fa fa-laptop"></i>
                            Ficha Familiar
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('personagrupo-familiar.index') }}">
                            <i class="fa fa-user"></i>
                            Comuneros
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('resguardo-index') }}">
                            <i class="fa fa-map-o"></i>
                            Resguardo Indígena
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('aval-index') }}">
                            <i class="fa fa-map-o"></i>
                            Avales
                        </a>
                    </li>
                </ul>
            </div>
            <div class="menu_section">
                <h3>Catálogos</h3>
                <ul class="nav side-menu">
                    <li>
                        <a><i class="fa fa-sitemap"></i> Catálogos <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li>
                                <a style="color: #3EB2AB" href="{{ route('cabildo.index') }}">Cabildo</a>
                            </li>
                        </ul>
                    </li>
                </ul>

                <ul class="nav side-menu">
                    <li>
                        <a><i class="fa fa-sitemap"></i> Reportes <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li>
                                <a style="color: #3EB2AB" href="{{ route('report-viviendas') }}">Viviendas</a>
                                <a style="color: #3EB2AB" href="{{ route('report-pisos') }}">Material Pisos
                                {{-- <a style="color: #3EB2AB" href="{{ route('cabildo.index') }}">Cabildo</a> --}}
                                {{-- <a style="color: #3EB2AB" href="{{ route('cabildo.index') }}">Cabildo</a> --}}
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>



            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            {{-- <div class="sidebar-footer hidden-small">
                <a data-toggle="tooltip" data-placement="top" title="Settings">
                    <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                </a>
                <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                    <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                </a>
                <a data-toggle="tooltip" data-placement="top" title="Lock">
                    <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                </a>
                <a data-toggle="tooltip" data-placement="top" title="Logout" href="{{ url('/logout') }}">
                    <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                </a>
            </div> --}}
            <!-- /menu footer buttons -->
        </div>
    </div>