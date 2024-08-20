<div class="sidebar" data-background-color="dark">
    <div class="sidebar-logo">
        <!-- Logo Header -->
        <div class="logo-header" data-background-color="dark">
            <a href="{{ url('/admin') }}" class="logo">
                @if (Qs::getSiteOption('logo') != '')
                    <img src="{{ url('storage/' . Qs::getSiteOption('logo')) }}" alt="navbar brand" class="navbar-brand"
                        height="45" />
                @else
                    <span class="text-light">
                        {{ config('app.name', 'Laravel') }}
                    </span>
                @endif
            </a>
            </a>
            <div class="nav-toggle">
                <button class="btn btn-toggle toggle-sidebar">
                    <i class="gg-menu-right"></i>
                </button>
                <button class="btn btn-toggle sidenav-toggler">
                    <i class="gg-menu-left"></i>
                </button>
            </div>
            <button class="topbar-toggler more">
                <i class="gg-more-vertical-alt"></i>
            </button>
        </div>
        <!-- End Logo Header -->
    </div>
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <ul class="nav nav-secondary">

                {{-- <x-backend.menu.item title="error" link="message"/> --}}
                <x-backend.menu.item title="Dashboard" link="{{ url('/admin') }}" icon="fas fa-home" />

                {{-- Student Managment Menu --}}
                <x-backend.menu.heading title="Student Managment" icon="fa fa-ellipsis-h" />
                {{-- @if (Auth::user()->can('student.view'))
                    <x-backend.menu.item title="Student" link="{{ route('students.index') }}"
                        icon="fas fa-book-reader" />
                @endif --}}


                {{-- Admin Penal --}}
                <x-backend.menu.heading title="Admin Panel Settings" icon="fa fa-ellipsis-h" />

                 @if (Auth::user()->can('class.view'))
                    <x-backend.menu.item title="Class" link="{{ route('classes.index') }}"
                        icon="fas fa-server" />
                @endif
                @if (Auth::user()->can('section.view'))
                    <x-backend.menu.item title="Section" link="{{ route('sections.index') }}"
                        icon="fas fa-bezier-curve" />
                @endif
                @if (Auth::user()->can('subject.view'))
                    <x-backend.menu.item title="Subject" link="{{ route('subjects.index') }}"
                        icon="fas fa-book" />
                @endif

                {{-- User & Roles Menu --}}
                @php
                    $array = [];
                    if (Auth::user()->can('admin.view')) {
                        $array[] = ['href' => route('users.index'), 'subLabel' => 'Users'];
                    }
                    if (Auth::user()->can('role.view')) {
                        $array[] = ['href' => route('roles.index'), 'subLabel' => 'Roles'];
                    }
                @endphp
                <li class="nav-item">
                    <x-backend.menu.dropDown label="Users" href="#user" icon="fas fa-users" />
                    <x-backend.menu.subItem title="Users" label="Users" id="user" icon="fas fa-users"
                        :array="$array" />
                </li>
                <x-backend.menu.item title="Settings" link="{{ route('settings') }}" icon="fas fa-cog" />



                {{-- Post Menu --}}
                {{-- <x-backend.menu.heading title="Post" icon="fa fa-ellipsis-h" />
                @php
                    $array = [
                        ['href' => route('post.index'), 'subLabel' => 'Posts'],
                        ['href' => route('post.create'), 'subLabel' => 'Add Post'],
                        ['href' => route('category.index'), 'subLabel' => 'Category'],
                        ['href' => route('tag.index'), 'subLabel' => 'Tags'],
                    ];
                @endphp
                <li class="nav-item">
                    <x-backend.menu.dropDown label="Posts" href="#post" icon="fas fa-bars" />
                    <x-backend.menu.subItem title="Posts" label="Posts" id="post" icon="fas fa-bars"
                        :array="$array" />
                </li> --}}

                {{-- @php
                    $array = [];
                    if (Auth::user()->can('class.view')) {
                        $array[] = ['href' => route('classes.index'), 'subLabel' => 'Classes'];
                    }
                @endphp
                <li class="nav-item">
                    <x-backend.menu.dropDown label="Classes" href="#user" icon="fas fa-users" />
                    <x-backend.menu.subItem title="Classes" label="Classes" id="user" icon="fas fa-users"
                        :array="$array" />
                </li> --}}

                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Components</h4>
                </li>
                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#base">
                        <i class="fas fa-layer-group"></i>
                        <p>Base</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="base">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="components/avatars.html">
                                    <span class="sub-item">Avatars</span>
                                </a>
                            </li>
                            <li>
                                <a href="components/buttons.html">
                                    <span class="sub-item">Buttons</span>
                                </a>
                            </li>
                            <li>
                                <a href="components/gridsystem.html">
                                    <span class="sub-item">Grid System</span>
                                </a>
                            </li>
                            <li>
                                <a href="components/panels.html">
                                    <span class="sub-item">Panels</span>
                                </a>
                            </li>
                            <li>
                                <a href="components/notifications.html">
                                    <span class="sub-item">Notifications</span>
                                </a>
                            </li>
                            <li>
                                <a href="components/sweetalert.html">
                                    <span class="sub-item">Sweet Alert</span>
                                </a>
                            </li>
                            <li>
                                <a href="components/font-awesome-icons.html">
                                    <span class="sub-item">Font Awesome Icons</span>
                                </a>
                            </li>
                            <li>
                                <a href="components/simple-line-icons.html">
                                    <span class="sub-item">Simple Line Icons</span>
                                </a>
                            </li>
                            <li>
                                <a href="components/typography.html">
                                    <span class="sub-item">Typography</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#sidebarLayouts">
                        <i class="fas fa-th-list"></i>
                        <p>Sidebar Layouts</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="sidebarLayouts">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="sidebar-style-2.html">
                                    <span class="sub-item">Sidebar Style 2</span>
                                </a>
                            </li>
                            <li>
                                <a href="icon-menu.html">
                                    <span class="sub-item">Icon Menu</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#forms">
                        <i class="fas fa-pen-square"></i>
                        <p>Forms</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="forms">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="forms/forms.html">
                                    <span class="sub-item">Basic Form</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#tables">
                        <i class="fas fa-table"></i>
                        <p>Tables</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="tables">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="tables/tables.html">
                                    <span class="sub-item">Basic Table</span>
                                </a>
                            </li>
                            <li>
                                <a href="tables/datatables.html">
                                    <span class="sub-item">Datatables</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#maps">
                        <i class="fas fa-map-marker-alt"></i>
                        <p>Maps</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="maps">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="maps/googlemaps.html">
                                    <span class="sub-item">Google Maps</span>
                                </a>
                            </li>
                            <li>
                                <a href="maps/jsvectormap.html">
                                    <span class="sub-item">Jsvectormap</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#charts">
                        <i class="far fa-chart-bar"></i>
                        <p>Charts</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="charts">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="charts/charts.html">
                                    <span class="sub-item">Chart Js</span>
                                </a>
                            </li>
                            <li>
                                <a href="charts/sparkline.html">
                                    <span class="sub-item">Sparkline</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a href="widgets.html">
                        <i class="fas fa-desktop"></i>
                        <p>Widgets</p>
                        <span class="badge badge-success">4</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="../../documentation/index.html">
                        <i class="fas fa-file"></i>
                        <p>Documentation</p>
                        <span class="badge badge-secondary">1</span>
                    </a>
                </li>

            </ul>
        </div>
    </div>
</div>
