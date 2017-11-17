@extends('Master.master_admin')

@section('title')
    halaman Edit Buku
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
                        <h4 class="page-title">Halaman Edit buku </h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"> 
                        <ol class="breadcrumb">
                            <li><a href="#">Daftar Buku</a></li>
                            <li class="active">Halaman Edit</li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                 <div>
                               @include('Partials.notif')
                        </div>
                <div class="row">
                    <div class="col-md-12">
                         <div class="col-md-8 col-xs-12">
                        <div class="white-box">
                            <form class="form-horizontal form-material" action="{{ route('book.edit' ,['book_id' => $buku->id]) }}" method="post">
                                <div class="form-group">
                                    <label class="col-md-12">Judul</label>
                                    <div class="col-md-12">
                                        <input type="text" value="{{$buku->judul}}" class="form-control form-control-line" id="judul" name="judul"> </div>
                                </div>
                                <div class="form-group">
                                    <label for="example-email" class="col-md-12">Image Url</label>
                                    <div class="col-md-12">
                                        <input type="link" value="{{$buku->gambar}}" class="form-control form-control-line"  id="gambar" name="gambar"> </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <button class="btn btn-success pull-right m-l-20 btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light" type="submit">Tambah!</button>
                                        {{ csrf_field() }}
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
           @include('Partials.footer')
        </div>
        <!-- /#page-wrapper -->
    </div>
@section('content')

	
@endsection