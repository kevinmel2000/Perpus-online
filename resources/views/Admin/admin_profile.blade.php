@extends('Master.master_admin')

@section('title')
    Admin Profile
@endsection

<div class="preloader">
        <div class="cssload-speeding-wheel"></div>
    </div>

<div id="wrapper">
        <!-- Navigation -->
       @include('Partials.left_navbar')
        <!-- Left navbar-header end -->
 	<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Halaman Profile </h4> 
                        @include('Partials.notif')
                    </div>
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                            <li class="active">Profile page</li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
                <!-- .row -->
                <div class="row">
                    <div class="col-md-4 col-xs-12">
                        <div class="white-box">
                            <div class="user-bg"> <img width="100%" alt="user" src="{{$user->imagePath}}">
                                <div class="overlay-box">
                                    <div class="user-content">
                                        <a href="javascript:void(0)"><img src="{{$user->imagePath}}" class="thumb-lg img-circle" alt="img"></a>
                                        <h4 class="text-white">{{$user->name}}</h4>
                                        <h5 class="text-white">{{$user->email}}</h5> </div>
                                </div>
                            </div>
                            <div class="user-btm-box">
                                <div class="col-md-4 col-sm-4 text-center">
                                    <p class="text-purple"><i class="ti-facebook"></i></p>
                                    <h1>258</h1> </div>
                                <div class="col-md-4 col-sm-4 text-center">
                                    <p class="text-blue"><i class="ti-twitter"></i></p>
                                    <h1>125</h1> </div>
                                <div class="col-md-4 col-sm-4 text-center">
                                    <p class="text-danger"><i class="ti-dribbble"></i></p>
                                    <h1>556</h1> </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8 col-xs-12">
                        <div class="white-box">
                            <form class="form-horizontal form-material" action="{{route('admin.update')}}" method="post">
                                <div class="form-group">
                                    <label class="col-md-12">Full Name</label>
                                    <div class="col-md-12">
                                        <input type="text" value="{{$user->name}}" class="form-control form-control-line" id="name" name="name"> </div>
                                </div>
                                <div class="form-group">
                                    <label for="example-email" class="col-md-12">Email</label>
                                    <div class="col-md-12">
                                        <input type="email" value="{{$user->email}}" class="form-control form-control-line" name="example-email" id="example-email" id="email" name="email"> </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">old Password</label>
                                    <div class="col-md-12">
                                        <input type="password" placeholder="password" class="form-control form-control-line" id="oldpassword" name="oldpassword"> </div>
                                </div>

                                 <div class="form-group">
                                    <label class="col-md-12">new Password</label>
                                    <div class="col-md-12">
                                        <input type="password" placeholder="password" class="form-control form-control-line" id="newpassword" name="newpassword"> </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-12">Phone No</label>
                                    <div class="col-md-12">
                                        <input type="text" value="{{$user->phone}}" class="form-control form-control-line" id="phone" name="phone"> </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <button class="btn btn-success" type="submit">Update Profile</button>
                                        {{ csrf_field() }}
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
           @include('Partials.footer')
        </div>
        <!-- /#page-wrapper -->
    </div>
@section('content')

	
@endsection