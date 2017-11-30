@extends('Master.master_admin')

@section('title')
    Detail {{$user->name}}
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
                        <h4 class="page-title">Detail Transaksi {{$user->name}}</h4> 
                        @include('Partials.notif') 
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"> 
                      
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">Daftar user</a></li>
                            <li class="active">Detail User</li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /row -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title">Daftar Denda </h3>

                            <div class="table-responsive">
                                <table class="table table-hover">
                                  <thead>
                                        <tr>
                                           
                                            <th>Judul Buku</th>
                                            <th> Jumlah keterlambatan pengembalian</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($denda as $a)
                                            <tr>
                                                @foreach($buku as $b)
                                                    @if($a->id_buku == $b->id)
                                                     <td>{{$b->judul}}</td>
                                                     @endif
                                               @endforeach
                                               <td>{{$a->jumlah_hari}}</td>
                                           </tr>
                                           
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

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
                                            <th>lenght</th>
                                            <th>Status </th>
                                            <th></th>
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
                                               <td>{{$t->length}}</td>
                                               <td>
                                                  @if($t->status==1)
                                                  Transaksi Selesai
                                                  @else
                                                  Transaksi Belum Selesai
                                                @endif
                                               </td>
                                               <td> 
                                                  @if($t->status==0)
                                                    <form action ="{{ route('admin.transaksi_selesai' ,['transaksi_id' => $t->id] )}}" method="post">
                                                   <button class="btn btn-success pull-right m-l-20 btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light" type="submit">selesai</button>
                                                   {{ csrf_field() }}

                                                @endif
                                                </form>
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