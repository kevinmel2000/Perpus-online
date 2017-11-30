@extends('Master.master_admin')

@section('title')
    Transaksi
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
                        <h4 class="page-title">Detail Transaksi </h4> 
                        @include('Partials.notif') 
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"> 
                      
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                            <li class="active">Transaksi</li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /row -->
                <div class="row">
                    <div class="col-sm-12">
                       

                        <div class="white-box">
                            <h3 class="box-title">Daftar Transaksi </h3>

                            <div class="table-responsive">
                                <table class="table table-hover">
                                  <thead>
                                        <tr>
                                            <th>ID transaksi</th>
                                            <th>Judul Buku</th>
                                            <th>Tanggal Peminjaman</th>
                                            <th>Tanggal Pengembalian </th>
                                            <th>Status </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                          @foreach($transaksi as $t)

                                            <tr>
                                                <td>{{$t->id}}</td>
                                                @foreach($buku as $b)
                                                    @if($t->id_buku == $b->id)
                                                     <td>{{$b->judul}}</td>
                                                     @endif
                                               @endforeach
                                               <td>{{$t->tgl_peminjaman}}</td>
                                               <td>{{$t->tgl_pengembalian}}</td>
                                               <td>
                                                  @if($t->status==1)
                                                  Transaksi Selesai
                                                  @else
                                                  Transaksi Belum Selesai
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
@push('scripts')

@endpush