 <nav class="navbar navbar-default navbar-static-top m-b-0">
            <div class="navbar-header"> <a class="navbar-toggle hidden-sm hidden-md hidden-lg " href="javascript:void(0)" data-toggle="collapse" data-target=".navbar-collapse"><i class="fa fa-bars
"></i></a>
                <div class="top-left-part"><a class="logo" href="index.html"><b><img src="{{URL::to('src//plugins/images/pixeladmin-logo.png')}}"" alt="home" /></b><span class="hidden-xs"><img src="{{URL::to('src//plugins/images/pixeladmin-text.png') }}" alt="#" /></span></a></div>
                <ul class="nav navbar-top-links navbar-left m-l-20 hidden-xs">
                   
                </ul>
                <ul class="nav navbar-top-links navbar-right pull-right">
                    <li>
                        <a class="profile-pic" href="#"> <b class="hidden-xs">{{Auth::user()->name}}</b> </a>
                    </li>
                     <li>
                        <a href="{{route('user.logout')}}">Logout</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-header -->
            <!-- /.navbar-top-links -->
            <!-- /.navbar-static-side -->
        </nav>
        <!-- Left navbar-header -->
        
        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse slimscrollsidebar">
                <ul class="nav" id="side-menu">
                    <li>
                        <a href="{{route('user.profile')}}" class="waves-effect"><i class="fa fa-user fa-fw" aria-hidden="true"></i><span class="hide-menu">Profile</span></a>
                    </li>
                    <li>
                        <a href="{{route('user.buku')}}" class="waves-effect"><i class="fa fa-table fa-fw" aria-hidden="true"></i><span class="hide-menu">Dafar Buku</span></a>
                    </li>
                    <li>
                        <a href="{{route('user.transaksi')}}" class="waves-effect"><i class="fa fa-history fa-fw" aria-hidden="true"></i><span class="hide-menu"> Transaksi</span></a>
                    </li>
                </ul>
            </div>
        </div>

      