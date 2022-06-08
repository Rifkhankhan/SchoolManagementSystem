@extends('admin.master_blade')
@section('admin')

<div class="content-wrapper">
	  <div class="container-full">
		<!-- Content Header (Page header) -->  
		<!-- Main content -->
		<section class="content">

		 <!-- Basic Forms -->
		  <div class="box">
			<div class="box-header with-border">
			  <h4 class="box-title">Add User</h4>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
				<form action="{{route('users.store')}}" method="post">
					@csrf
						<div class="row">
						<div class="col-md-6">
							<div class="form-group" class="col-6">
								<h5>Name</h5>
								<div class="controls">
									<input type="text" name="name" class="form-control"  required> </div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group" class="col-6">
									<h5>Role</h5>
									<div class="controls">
										<select name="role" id="role" required class="form-control">
											<option value="admin">Admin</option>
											<option value="teacher">Teacher</option>
											<option value="student">Student</option>
											<option value="security">Security</option>
											<option value="principle">Principle</option>
											<option value="other">Other</option>
										</select>
									</div>
							</div>
						</div>

						<div class="col-md-6">
							<div class="form-group" class="col-6">
									<h5>Email</h5>
									<div class="controls">
									<input type="email" name="email" class="form-control"   required> </div>
							</div>
						</div>

						<div class="col-md-6">
							<div class="form-group" class="col-6">
									<h5>Password</h5>
									<div class="controls">
									<input type="password" name="password" class="form-control" required > </div>
							</div>
						</div>


						<div class="col-md-6">
							<div class="text-xs-left">
								<input type="submit" class="btn btn-info" value="Submit"></input>
							</div>
						</div>
			
						</div>
						<!-- /.col -->
					</div>
				</form>
			
			  <!-- /.row -->
			</div>
			<!-- /.box-body -->
		  </div>
		  <!-- /.box -->

		</section>
		<!-- /.content -->
	  </div>
  </div>

@endsection