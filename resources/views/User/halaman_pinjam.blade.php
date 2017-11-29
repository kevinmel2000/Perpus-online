

@extends('Master.master_admin')

@section('title')
    Pinjam Buku
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
                        <h4 class="page-title">Halaman Pinjam buku </h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"> 
                        <ol class="breadcrumb">
                            <li><a href="#">Daftar Buku</a></li>
                            <li class="active">Halaman Pinjam Buku</li>
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

                            <div class="row">
                              <div class="col-sm-6 col-md-4">
                                <div class="thumbnail">
                                  <img src="{{$buku->gambar}}" class="gambar" alt="gambar buku">
                                  <div class="caption">
                                    <center><h3>{{$buku->judul}}</h3></center>
                                  </div>
                                </div>
                              </div>
                            </div>

                             <form class="form-horizontal form-material" action="{{ route('user.pinjam' ,['book_id' => $buku->id]) }}" method="post">
                               <div class="form-group"> <!-- Date input -->
                                    <label class="control-label" for="date">Harus dikembalikan sebelum Tanggal {{$date}} </label>
                                </div>
                              
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <button class="btn btn-success pull-right m-l-20 btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light" type="submit">Pinjam!</button>
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
