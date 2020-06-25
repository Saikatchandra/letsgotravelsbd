<!DOCTYPE html>
<html>
  <head>
        @section('head')
            <meta name="description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
            <!-- Twitter meta-->
            <meta property="twitter:card" content="summary_large_image">
            <meta property="twitter:site" content="@pratikborsadiya">
            <meta property="twitter:creator" content="@pratikborsadiya">
            <!-- Open Graph Meta-->
            <meta property="og:type" content="website">
            <meta property="og:site_name" content="Vali Admin">
            <meta property="og:title" content="Vali - Free Bootstrap 4 admin theme">
            <meta property="og:url" content="http://pratikborsadiya.in/blog/vali-admin">
            <meta property="og:image" content="http://pratikborsadiya.in/blog/vali-admin/hero-social.png">
            <meta property="og:description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
            <title>Vali Admin - Free Bootstrap 4 Admin Template</title>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <!-- Main CSS-->
            <link rel="stylesheet" type="text/css" href="{{ asset('/contents/css/main.css') }}">
            <!-- Font-icon css-->
            <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        @show
        <style>
            .my-footer{
              padding: 16px;
              height: 50px;
            }
        </style>
    </head>
    <body class="app sidebar-mini rtl">
        <!-- Navbar-->
        <header class="app-header"><a class="app-header__logo" href="{{route('home')}}">Admin Panel</a>
            <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
            <!-- Navbar Right Menu-->
            <ul class="app-nav">
                {{-- <li class="app-search">
                    <input class="app-search__input" type="search" placeholder="Search">
                    <button class="app-search__button"><i class="fa fa-search"></i></button>
                </li> --}}

                {{-- <li>
                    <div class="app-header__logo">sdgvdfgdfg</div>
                </li> --}}


                <!--Notification Menu-->
                {{-- <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Show notifications"><i class="fa fa-bell-o fa-lg"></i></a>
                    <ul class="app-notification dropdown-menu dropdown-menu-right">
                    <li class="app-notification__title">You have 4 new notifications.</li>
                    <div class="app-notification__content">
                        <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-primary"></i><i class="fa fa-envelope fa-stack-1x fa-inverse"></i></span></span>
                            <div>
                            <p class="app-notification__message">Lisa sent you a mail</p>
                            <p class="app-notification__meta">2 min ago</p>
                            </div></a></li>
                        <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-danger"></i><i class="fa fa-hdd-o fa-stack-1x fa-inverse"></i></span></span>
                            <div>
                            <p class="app-notification__message">Mail server not working</p>
                            <p class="app-notification__meta">5 min ago</p>
                            </div></a></li>
                        <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-success"></i><i class="fa fa-money fa-stack-1x fa-inverse"></i></span></span>
                            <div>
                            <p class="app-notification__message">Transaction complete</p>
                            <p class="app-notification__meta">2 days ago</p>
                            </div></a></li>
                        <div class="app-notification__content">
                        <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-primary"></i><i class="fa fa-envelope fa-stack-1x fa-inverse"></i></span></span>
                            <div>
                                <p class="app-notification__message">Lisa sent you a mail</p>
                                <p class="app-notification__meta">2 min ago</p>
                            </div></a></li>
                        <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-danger"></i><i class="fa fa-hdd-o fa-stack-1x fa-inverse"></i></span></span>
                            <div>
                                <p class="app-notification__message">Mail server not working</p>
                                <p class="app-notification__meta">5 min ago</p>
                            </div></a></li>
                        <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-success"></i><i class="fa fa-money fa-stack-1x fa-inverse"></i></span></span>
                            <div>
                                <p class="app-notification__message">Transaction complete</p>
                                <p class="app-notification__meta">2 days ago</p>
                            </div></a></li>
                        </div>
                    </div>
                    <li class="app-notification__footer"><a href="#">See all notifications.</a></li>
                    </ul>
                </li> --}}
                <!-- User Menu-->
                <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i></a>
                    <ul class="dropdown-menu settings-menu dropdown-menu-right">
                    {{-- <li><a class="dropdown-item" href="page-user.html"><i class="fa fa-cog fa-lg"></i> Settings</a></li>
                    <li><a class="dropdown-item" href="page-user.html"><i class="fa fa-user fa-lg"></i> Profile</a></li> --}}
                    <li>
                        <a class="dropdown-item" href="page-login.html" 
                            onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                        <i class="fa fa-sign-out fa-lg"></i> Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                    </ul>
                </li>
            </ul>
        </header>
        <!-- Sidebar menu-->
        <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
        <aside class="app-sidebar">
            <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="https://s3.amazonaws.com/uifaces/faces/twitter/jsa/48.jpg" alt="User Image">
            <div>
                <p class="app-sidebar__user-name">{{ Auth::user()->name }} <span class="caret"></span></p>
                {{-- <p class="app-sidebar__user-name">Name <span class="caret"></span></p> --}}
                <p class="app-sidebar__user-designation">Frontend Developer</p>
            </div>
            </div>
            <ul class="app-menu">

                <li><a class="app-menu__item" href="{{route('welcome')}}"><i class="app-menu__icon fa fa-globe"></i><span class="app-menu__label">Visit Site</span></a></li>
                <li><a class="app-menu__item @yield('dashboard')" href="{{route('home')}}"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>
                
                {{-- <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-laptop"></i><span class="app-menu__label">UI Elements</span><i class="treeview-indicator fa fa-angle-right"></i></a>
                    <ul class="treeview-menu">
                    <li><a class="treeview-item" href="bootstrap-components.html"><i class="icon fa fa-circle-o"></i> Bootstrap Elements</a></li>
                    <li><a class="treeview-item" href="https://fontawesome.com/v4.7.0/icons/" target="_blank" rel="noopener"><i class="icon fa fa-circle-o"></i> Font Icons</a></li>
                    <li><a class="treeview-item" href="ui-cards.html"><i class="icon fa fa-circle-o"></i> Cards</a></li>
                    <li><a class="treeview-item" href="widgets.html"><i class="icon fa fa-circle-o"></i> Widgets</a></li>
                    </ul>
                </li> --}}
                <li><a class="app-menu__item @yield('companyConfiguration')" href="{{route('companyConfiguration')}}"><i class="app-menu__icon fa fa-pie-chart"></i><span class="app-menu__label">Company Configuration</span></a></li>

                {{--  <li><a class="app-menu__item @yield('newsAndUpdate')" href="{{route('newsAndUpdate')}}"><i class="app-menu__icon fa fa-pie-chart"></i><span class="app-menu__label">News and Updates</span></a></li> --}}
                
                <li class="treeview @yield('aboutUs')"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-tasks"></i><span class="app-menu__label">About Us</span><i class="treeview-indicator fa fa-angle-right"></i></a>
                    <ul class="treeview-menu">
                        <li><a class="treeview-item @yield('aboutUsSection1')" href="{{ route('aboutUsSection1') }}"><i class="app-menu__icon fa fa-circle-o"></i><span class="app-menu__label"> Section 1</span></a></li>
                        <li><a class="treeview-item @yield('aboutUsSection2')" href="{{ route('aboutUsSection2') }}"><i class="app-menu__icon fa fa-circle-o"></i><span class="app-menu__label"> Section 2</span></a></li>
                    </ul>
                </li>

                {{-- <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-edit"></i><span class="app-menu__label">Forms</span><i class="treeview-indicator fa fa-angle-right"></i></a>
                    <ul class="treeview-menu">
                    <li><a class="treeview-item" href="form-components.html"><i class="icon fa fa-circle-o"></i> Form Components</a></li>
                    <li><a class="treeview-item" href="form-custom.html"><i class="icon fa fa-circle-o"></i> Custom Components</a></li>
                    <li><a class="treeview-item" href="form-samples.html"><i class="icon fa fa-circle-o"></i> Form Samples</a></li>
                    <li><a class="treeview-item" href="form-notifications.html"><i class="icon fa fa-circle-o"></i> Form Notifications</a></li>
                    </ul>
                </li>
                <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-th-list"></i><span class="app-menu__label">Tables</span><i class="treeview-indicator fa fa-angle-right"></i></a>
                    <ul class="treeview-menu">
                    <li><a class="treeview-item" href="table-basic.html"><i class="icon fa fa-circle-o"></i> Basic Tables</a></li>
                    <li><a class="treeview-item" href="table-data-table.html"><i class="icon fa fa-circle-o"></i> Data Tables</a></li>
                    </ul>
                </li>
                <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-file-text"></i><span class="app-menu__label">Pages</span><i class="treeview-indicator fa fa-angle-right"></i></a>
                    <ul class="treeview-menu">
                    <li><a class="treeview-item" href="blank-page.html"><i class="icon fa fa-circle-o"></i> Blank Page</a></li>
                    <li><a class="treeview-item" href="page-login.html"><i class="icon fa fa-circle-o"></i> Login Page</a></li>
                    <li><a class="treeview-item" href="page-lockscreen.html"><i class="icon fa fa-circle-o"></i> Lockscreen Page</a></li>
                    <li><a class="treeview-item" href="page-user.html"><i class="icon fa fa-circle-o"></i> User Page</a></li>
                    <li><a class="treeview-item" href="page-invoice.html"><i class="icon fa fa-circle-o"></i> Invoice Page</a></li>
                    <li><a class="treeview-item" href="page-calendar.html"><i class="icon fa fa-circle-o"></i> Calendar Page</a></li>
                    <li><a class="treeview-item" href="page-mailbox.html"><i class="icon fa fa-circle-o"></i> Mailbox</a></li>
                    <li><a class="treeview-item" href="page-error.html"><i class="icon fa fa-circle-o"></i> Error Page</a></li>
                    </ul>
                </li> --}}

                <li><a class="app-menu__item @yield('register')" href="{{ route('register') }}"><i class="app-menu__icon fa fa-user-plus"></i><span class="app-menu__label">Add User</span></a></li>
                <li><a class="app-menu__item @yield('manageTour')" href="{{route('manageTours')}}"><i class="app-menu__icon fa fa-tripadvisor"></i><span class="app-menu__label">Manage Tour</span></a></li>

                {{-- <li class="treeview"><a class="app-menu__item @yield('addTour')" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-th-list"></i><span class="app-menu__label">Tour</span><i class="treeview-indicator fa fa-angle-right"></i></a>
                    <ul class="treeview-menu">
                        <li><a class="treeview-item @yield('addTour')" href="{{route('addTour')}}"><i class="icon fa fa-circle-o"></i> Add Tour </a></li>
                        <li><a class="treeview-item" href="{{route('manageTours')}}"><i class="icon fa fa-circle-o"></i> Manage</a></li>
                    </ul>
                </li> --}}

                <li class="treeview @yield('siteConfiguration')"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-th-list"></i><span class="app-menu__label">Site Configuration</span><i class="treeview-indicator fa fa-angle-right"></i></a>
                    <ul class="treeview-menu">
                        <li><a class="treeview-item @yield('slider')" href="{{ route('manageSlider') }}"><i class="app-menu__icon fa fa-sliders"></i><span class="app-menu__label">Manage Slider</span></a></li>
                        <li><a class="treeview-item @yield('photoGallery')" href="{{ route('managePhotoGallery') }}"><i class="app-menu__icon fa fa-image"></i><span class="app-menu__label">Manage Photo Gallery</span></a></li>
                    </ul>
                </li>
                  <li class="treeview @yield('newsAndUpdate')"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-newspaper-o"></i><span class="app-menu__label">News & Updates</span><i class="treeview-indicator fa fa-angle-right"></i></a>
                    <ul class="treeview-menu">
                        <li><a class="treeview-item @yield('showAllPost')" href="{{ route('newsAndUpdate.index') }}"><i class="app-menu__icon fa fa-circle-o"></i><span class="app-menu__label"> Show All</span></a></li>
                        <li><a class="treeview-item @yield('createPage')" href="{{ route('newsAndUpdate.create') }}"><i class="app-menu__icon fa fa-plus"></i><span class="app-menu__label"> Add Post</span></a></li>
                    </ul>
                </li>

                <li><a class="app-menu__item @yield('contactList')" href="{{ route('showContactList') }}"><i class="app-menu__icon fa fa-address-book-o"></i><span class="app-menu__label">Contact List</span></a></li>
                
                <li class="treeview @yield('package')"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-tasks"></i><span class="app-menu__label">Packages</span><i class="treeview-indicator fa fa-angle-right"></i></a>
                    <ul class="treeview-menu">
                        <li><a class="treeview-item @yield('domesticPackages')" href="{{ route('manageDomesticPackages') }}"><i class="app-menu__icon fa fa-home"></i><span class="app-menu__label"> Domestic</span></a></li>
                        <li><a class="treeview-item @yield('internationalPackages')" href="{{ route('manageInternationalPackages') }}"><i class="app-menu__icon fa fa-globe"></i><span class="app-menu__label"> International</span></a></li>
                        
                    </ul>
                </li> 
                <li class="treeview @yield('hajj&umrah')"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-tasks"></i><span class="app-menu__label">Hajj & Umrah</span><i class="treeview-indicator fa fa-angle-right"></i></a>
                    <ul class="treeview-menu">
                        <li><a class="treeview-item @yield('hajj')" href="{{ route('manageHajj') }}"><i class="app-menu__icon fa fa-home"></i><span class="app-menu__label"> Hajj</span></a></li>
                        <li><a class="treeview-item @yield('umrah')" href="{{ route('manageUmrah') }}"><i class="app-menu__icon fa fa-globe"></i><span class="app-menu__label"> Umrah</span></a></li>
                        
                    </ul>
                </li>

                <li class="treeview @yield('manageBlog')"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-newspaper-o"></i><span class="app-menu__label">Manage Blog</span><i class="treeview-indicator fa fa-angle-right"></i></a>
                    <ul class="treeview-menu">
                        <li><a class="treeview-item @yield('showAllPost')" href="{{ route('showAllPost') }}"><i class="app-menu__icon fa fa-circle-o"></i><span class="app-menu__label"> Show All</span></a></li>
                        <li><a class="treeview-item @yield('createPage')" href="{{ route('addPost') }}"><i class="app-menu__icon fa fa-plus"></i><span class="app-menu__label"> Add Post</span></a></li>
                    </ul>
                </li>



                <li class="treeview @yield('managePages')"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-file"></i><span class="app-menu__label">Manage Pages</span><i class="treeview-indicator fa fa-angle-right"></i></a>
                    <ul class="treeview-menu">
                        <li><a class="treeview-item @yield('showAllPages')" href="{{ route('showAllPages') }}"><i class="app-menu__icon fa fa-circle-o"></i><span class="app-menu__label"> Show All</span></a></li>
                        <li><a class="treeview-item @yield('createPage')" href="{{ route('createPage') }}"><i class="app-menu__icon fa fa-plus"></i><span class="app-menu__label"> Create Page</span></a></li>
                    </ul>
                </li>

                <li class="treeview @yield('subscription')"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-registered"></i><span class="app-menu__label">Subscription</span><i class="treeview-indicator fa fa-angle-right"></i></a>
                    <ul class="treeview-menu">
                        <li><a class="treeview-item @yield('subscriptionDivision')" href="{{ route('subscriptionDivision') }}"><i class="app-menu__icon fa fa-circle-o"></i><span class="app-menu__label"> Subscription division</span></a></li>
                        <li><a class="treeview-item @yield('subscribedUser')" href="{{ route('showSubscribedUser') }}"><i class="app-menu__icon fa fa-circle-o"></i><span class="app-menu__label"> Subscribed User</span></a></li>
                    </ul>
                </li>
            </ul>
        </aside>

        @section('contents')

        <footer class="my-footer" >
            <!-- To the right -->
            <div class="container text-center">
                <strong class="pull-left">&copy; 2019<a target="_blank" href="{{route('welcome')}}"> Laravel Website</a></strong> 
                <strong><p>Designed By: <a target="_blank" href="https://www.smartsoftware.com.bd/">Smart Software Ltd.</a></p></strong>
            </div>
            <!-- Default to the left -->
        </footer>
        @show

        @section('foot')
            <!-- Essential javascripts for application to work-->
            <script src="{{ asset('/contents/js/jquery-3.2.1.min.js') }}"></script>
            <script src="{{ asset('/contents/js/popper.min.js') }}"></script>
            <script src="{{ asset('/contents/js/bootstrap.min.js') }}"></script>
            <script src="{{ asset('/contents/js/main.js') }}"></script>
            <!-- The javascript plugin to display page loading on top-->
            <script src="{{ asset('/contents/js/plugins/pace.min.js') }}"></script>
            
            <script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
            <script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>

        @show
    </body>
</html>