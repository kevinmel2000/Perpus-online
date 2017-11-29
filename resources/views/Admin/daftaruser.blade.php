@extends('Master.master_admin')

@section('title')
    Daftar User
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
                        <h4 class="page-title">Daftar User</h4> 
                        @include('Partials.notif') 
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"> 
                      
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                            <li class="active">Tabel User</li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /row -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title">Daftar User </h3>

                            <div class="table-responsive">
                                <table class="table table-hover">
                                  <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>Poto</th>
                                            <th>Detail User</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($user as $a)
                                           @if($a->type == 'user')
                                            <tr class="isiuser">
                                                <td>{{$a->id}}</td>
                                                <td>{{$a->name}}</td>
                                                <td>{{$a->email}}</td>
                                                <td>{{$a->imagePath}}</td>
                                                <td class="interaction">
                                                <a class="btn btn-default denda" href="{{ route('user.detail' ,['user_id' => $a->id]) }}" role="button">Lihat</a></td>
                                           </tr>
                                           @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
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
@push('scripts')

@endpush