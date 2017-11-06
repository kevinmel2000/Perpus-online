@extends('Master.master')

@section('title')
    Halaman Utama
@endsection

@section('content')
@include('Partials.notif')
<div class="page-wrapper">
	@if(!Auth::check())
	 <div class="page-header">
 		 <h1>Tidak punya akun?</h1>
	</div>
	<div class="well">
		<div >
			<form class="form-horizontal" action="{{route('user.signup')}}" method="post">
			  <div class="form-group">
			    <label for="email" class="col-sm-2 control-label">Email</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="email" name="email" placeholder="Email">
			    </div>
			  </div>
			   <div class="form-group">
			    <label for="email" class="col-sm-2 control-label">Nama</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="name" name="name" placeholder="Name">
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="password" class="col-sm-2 control-label">Password</label>
			    <div class="col-sm-10">
			      <input type="password" class="form-control" id="password" name="password" placeholder="Password">
			    </div>
			  </div>
			  <div class="form-group">
			    <div class="col-sm-offset-2 col-sm-10">
			      <button type="submit" class="btn btn-default">Sign up</button>
			      
			      {{ csrf_field() }}
			    </div>
			  </div>
			</form>
		</div>
	</div>
@endif
</div>
@endsection