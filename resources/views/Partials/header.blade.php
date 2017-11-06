<!-- <nav class="navbar navbar-default">
  <div class="container-fluid">
  
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Perpus Online</a>
    </div>

  

      <ul class="nav navbar-nav navbar-right">  
      @if(Auth::check())    
        <li><a href="{{route('user.logout')}}">Logout</a></li>  
        @else
        <li><a href="{{route('user.login')}}">Login</a></li>  
      @endif        
      </ul>
    </div>
  </div>
</nav> -->


        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top m-b-0">
            <div class="navbar-header">
                <ul class="nav navbar-top-links navbar-left m-l-20 hidden-xs">
                    <li>
                        <a href="#"><b class="hidden-xs">Perpus Online</b> </a>
                    </li>
                </ul>
                <ul class="nav navbar-top-links navbar-right pull-right">
                    @if(Auth::check())    
                    <li>
                        <a class="profile-pic" href="#"> <b class="hidden-xs">{{ Auth::user()->name }}</b> </a>
                    </li>
                    <li><a href="{{route('user.logout')}}">Logout</a></li>  
                    @else
                    <li><a href="{{route('user.login')}}">Login</a></li>  
                    @endif   
                </ul>
            </div>
            <!-- /.navbar-header -->
            <!-- /.navbar-top-links -->
            <!-- /.navbar-static-side -->
        </nav>
        <!-- Left navbar-header -->