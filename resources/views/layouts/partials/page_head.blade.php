
        <div id="page-wrapper">
            <div class="preloader themed-background">
                <h1 class="push-top-bottom text-light text-center"><strong>Pro</strong>UI</h1>
                <div class="inner">
                    <h3 class="text-light visible-lt-ie9 visible-lt-ie10"><strong>Loading..</strong></h3>
                    <div class="preloader-spinner hidden-lt-ie9 hidden-lt-ie10"></div>
                </div>
            </div>
            <!-- END Preloader -->
           
            <div id="page-container" class="header-fixed-top sidebar-partial sidebar-visible-lg">
                <!-- Alternative Sidebar -->
                <div id="sidebar-alt">
                    <!-- Wrapper for scrolling functionality -->
                    <div id="sidebar-alt-scroll">
                        <!-- Sidebar Content -->
                        <div class="sidebar-content">
                            <!-- Sidebar Section -->
                            <a href="index.html" class="sidebar-title">
                                <i class="gi gi-cogwheel pull-right"></i> <strong>Header</strong>
                            </a>
                            <div class="sidebar-section">Section content..</div>
                            <!-- END Sidebar Section -->
                        </div>
                        <!-- END Sidebar Content -->
                    </div>
                    <!-- END Wrapper for scrolling functionality -->
                </div>
                <!-- END Alternative Sidebar -->

                <!-- Main Sidebar -->
                <div id="sidebar">
                    <!-- Wrapper for scrolling functionality -->
                    <div id="sidebar-scroll">
                        <!-- Sidebar Content -->
                        <div class="sidebar-content">
                            <!-- Brand -->
                            <a href="{{ route('home') }}" class="sidebar-brand">
                                <i class="gi gi-flash"></i><span class="sidebar-nav-mini-hide"><strong>BYM</strong></span>
                            </a>
                            <!-- END Brand -->

                            <!-- User Info -->
                            <div class="sidebar-section sidebar-user clearfix sidebar-nav-mini-hide">
                                <div class="sidebar-user-avatar">
                                    <a href="">
                                        <img src="{{ asset("img/placeholders/avatars/avatar.jpg") }}" alt="avatar">
                                    </a>
                                </div>
                                <div class="sidebar-user-name">{{ auth()->user()->name }}</div>

                            </div>
                            <!-- END User Info -->

                            <!-- Sidebar Navigation -->
                            <ul class="sidebar-nav">
                                {{-- @if (request()->segment(1) == "UserManagement") --}}
                                    <li class="sidebar-header">
                                        <span class="sidebar-header-title">User Management</span>
                                    </li>
                                    <li>
                                        <a href="{{route('users.index')}}"><i class="fa fa-user sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Users</span></a>
                                    </li>
                                    <li>
                                        <a href="{{route('usergroups.index')}}"><i class="fa fa-users sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Usergroups</span></a>
                                    </li>
                                    {{-- @else --}}

                                    <li class="sidebar-header">
                                        <span class="sidebar-header-title">Client Management</span>
                                    </li>
                                    <li>
                                        <a href="{{route('clients.index')}}"><i class="fa fa-product-hunt sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Client Info</span></a>
                                    </li>
                                    <li class="sidebar-header">
                                        <span class="sidebar-header-title">Marquee Management</span>
                                    </li>
                                    <li>
                                        <a href="{{route('marquees.index')}}"><i class="fa fa-building sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Marquee</span></a>
                                    </li>
                                    {{-- <i class="fas fa-warehouse"></i> --}}
                                    <li>
                                        <a href="{{route('city.index')}}"><i class="fa fa-clone sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Cities</span></a>
                                    </li>

                                    <li>
                                        <a href="{{route('booking.index')}}"><i class="fa fa-ticket sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Marquee Booking</span></a>
                                    </li>
                                    
                                {{-- @endif --}}

                            </ul>
                            <!-- END Sidebar Navigation -->
                        </div>
                        <!-- END Sidebar Content -->
                    </div>
                    <!-- END Wrapper for scrolling functionality -->
                </div>
                <!-- END Main Sidebar -->

                <!-- Main Container -->
                <div id="main-container">
                    <header class="navbar navbar-default navbar-fixed-top">
                        <!-- Left Header Navigation -->
                        <ul class="nav navbar-nav-custom">
                            <!-- Main Sidebar Toggle Button -->
                            <li>
                                <a href="javascript:void(0)" onclick="App.sidebar('toggle-sidebar');this.blur();">
                                    <i class="fa fa-bars fa-fw"></i>

                                </a>
                            </li>
                           {{--  <li class="dropdown">
                                <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown" title="Theme Setting">
                                    <i class="gi gi-settings"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-custom dropdown-options">
                                    <li class="dropdown-header text-center">Header Style</li>
                                    <li>
                                        <div class="btn-group btn-group-justified btn-group-sm">
                                            <a href="javascript:void(0)" class="btn btn-primary" id="options-header-default">Light</a>
                                            <a href="javascript:void(0)" class="btn btn-primary" id="options-header-inverse">Dark</a>
                                        </div>
                                    </li>
                                    <li class="dropdown-header text-center">Page Style</li>
                                    <li>
                                        <div class="btn-group btn-group-justified btn-group-sm">
                                            <a href="javascript:void(0)" class="btn btn-primary" id="options-main-style">Default</a>
                                            <a href="javascript:void(0)" class="btn btn-primary" id="options-main-style-alt">Alternative</a>
                                        </div>
                                    </li>
                                </ul>
                            </li> --}}
                            <!-- END Template Options -->
                            {{-- Top Menu --}}
                           {{--  <li>
                                <a href="{{ route('usermanagement.index') }}">
                                    User Management
                                </a>
                            </li>
 --}}
                            {{-- End Top Menu --}}
                        </ul>
                        <!-- END Left Header Navigation -->

                        <!-- Search Form -->
                        {{-- <form action="index.html" method="post" class="navbar-form-custom">
                            <div class="form-group">
                                <input type="text" id="top-search" name="top-search" class="form-control" placeholder="Search..">
                            </div>
                        </form> --}}
                        <!-- END Search Form -->

                        <!-- Right Header Navigation -->
                        <ul class="nav navbar-nav-custom pull-right">
                            <!-- Alternative Sidebar Toggle Button -->
                           {{--  <li>
                                <a href="" >
                                    <i class="fa fa-shopping-cart"></i>
                                    <span class="label label-primary label-indicator animation-floating">4</span>
                                </a>
                            </li> --}}
                            <!-- END Alternative Sidebar Toggle Button -->

                            <!-- User Dropdown -->
                            <li class="dropdown">
                                <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">
                                    <img src="{{ asset("img/placeholders/avatars/avatar.jpg") }}" alt="avatar"> <i class="fa fa-angle-down"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-custom dropdown-menu-right">
                                    <li class="dropdown-header text-center">Header</li>
                                    <li>
                                        <a href="{{ route('users.show', auth()->user()->slug) }}">
                                            <i class="fa fa-user fa-fw pull-right"></i>
                                            Profile
                                        </a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a href="{{ route('password.change') }}">
                                            <i class="fa fa-asterisk fa-fw pull-right"></i>
                                            Change Password
                                        </a>
                                        <a href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                            <i class="fa fa-power-off fa-fw pull-right"></i>
                                            Logout
                                        </>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form></a>
                                    </li>
                                </ul>
                            </li>
                            <!-- END User Dropdown -->
                        </ul>
                        <!-- END Right Header Navigation -->
                    </header>
                    <!-- END Header -->
