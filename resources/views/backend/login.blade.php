<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>地摊宝- 登录</title>
<link href="{{ asset('/pc_assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
<link href="{{ asset('/pc_assets/css/sb-admin-2.css') }}" rel="stylesheet">
</head>
<body class="bg-gradient-primary">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-xl-10 col-lg-12 col-md-9">
				<div class="card o-hidden border-0 shadow-lg my-5">
					<div class="card-body p-0">
						<div class="row">
							<div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
							<div class="col-lg-6">
								<div class="p-5">
									<div class="text-center">
										<h1 class="h4 text-gray-900 mb-4">欢迎回来!</h1>
									</div>
									<div style="height: 55px;">
									@if (Session::has('msg'))
									<div class="alert alert-danger">{{ Session::get('msg') }}</div>
									@endif
									</div>
									{!! Form::open(array('action' => 'backend\LoginController@attempt', 'class' => 'user' )) !!}
									<div class="form-group">
										{!! Form::text('username', null, array('class' => 'form-control form-control-user', 'placeholder' => '输入用户名')) !!}
									</div>
									<div class="form-group">
										{!! Form::password('password', array('class' => 'form-control form-control-user', 'placeholder' => '输入密码')) !!}
									</div>
									<div class="form-group">
										<input type="hidden" name="_token" value="{{ csrf_token() }}">
										<div class="custom-control custom-checkbox small">
											<input type="checkbox" class="custom-control-input" id="customCheck"> 
											<label class="custom-control-label" for="customCheck">记住我</label>
										</div>
									</div>
									<br>
									<button type="submit" class="btn btn-primary btn-user btn-block">
										登录
									</button>
									{!! Form::close() !!}
									<br>
									<div class="text-right">
										<a class="small right" href="{{ url('backend/forget') }}">忘记密码？</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="{{ asset('/pc_assets/vendor/jquery/jquery.min.js') }}"></script>
	<script src="{{ asset('/pc_assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
	<script src="{{ asset('/pc_assets/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
	<script src="{{ asset('/pc_assets/js/sb-admin-2.min.js') }}"></script>
</body>
</html>