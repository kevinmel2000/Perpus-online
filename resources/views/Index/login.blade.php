@extends('Master.master')

@section('title')
    Halaman Login
@endsection

@section('content')
@include('Partials.notif')
	<div class="page-header">
 	 <h1>Login </h1>
	</div>
    <div class="well">
    
				 <form action="{{route('user.login')}}" method="post">
				 <div class="form-group">
					<label for="email">E-mail</label>
					<input type="text" id="email" name="email" class="form-control">
				</div>
				<div class="form-group">
					<label for="password">Password</label>
					<input type="password" id="password" name="password" class="form-control">
				</div>
				<button type="submit" class="btn btn-primary"><i class="fa fa-gratipay" aria-hidden="true"></i> Login </button> 
				{{ csrf_field() }}
					
			</form>
     </div>
@endsection