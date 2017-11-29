@extends('Master.master_admin')

@section('title')
    Daftar Buku
@endsection

<div class="preloader">
        <div class="cssload-speeding-wheel"></div>
    </div>

<div id="wrapper">
        <!-- Navigation -->
       @include('Partials.left_navbar_user')
        <!-- Left navbar-header end -->

        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Tabel Buku</h4> 
                        @include('Partials.notif') 
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"> 
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                            <li class="active">Daftar Buku yang bisa dipinjam</li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /row -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title">Daftar buku </h3>

                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Judul</th>
                                            <th>Gambar</th>
                                            <th>Status</th>
                                            <th>Pinjam</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($databuku as $a)
                                            <tr>
                                                <td>{{$a->id}}</td>
                                                <td>{{$a->judul}}</td>
                                                <td><img src="{{$a->gambar}}" class="gambar"></td>
                                                <td>
                                                    @if($a->status == 1)
                                                       Tersedia
                                                    @else
                                                       Tidak tersedia
                                                    @endif
                                                </td>
                                                <td> 
                                                    @if($a->status == 1)
                                                         <a href="{{route('user.pinjam',['book_id' => $a->id])}}" class="btn btn-info  m-l-20 btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light" role="button">Pinjam</a>
                                                    @else
                                                         Tidak bisa dipinjam
                                                    @endif
                                                  
                                                </td>
                                                
                                            </tr>
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