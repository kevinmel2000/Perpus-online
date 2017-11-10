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
                        <h4 class="page-title">Tabel Buku</h4> 
                      
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"> 
                         <a href="{{route('admin.create')}}" target="tambah_buku" class="btn btn-success pull-right m-l-20 btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light"><i class="fa fa-plus-circle" aria-hidden="true"></i> Tambah Buku</a>
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                            <li class="active">Tabel Buku</li>
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
                                            <th>Edit</th>
                                            <th>Hapus</th>
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
                                                <td><button class="btn btn-primary  m-l-20 btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light">Edit</button></td>
                                                <td>
                                                    <a href="{{ route('book.delete' ,['book_id' => $a->id]) }}" class="btn btn-danger  m-l-20 btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light" role="button">Hapus</a>
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