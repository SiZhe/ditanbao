<!DOCTYPE html>
<html class="app" ng-app="app">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">
<title>地摊宝</title>
<link href="{{ asset('/pc_assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('/pc_assets/css/sb-admin-2.css') }}" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="{{ asset('/fancybox/source/jquery.fancybox.css') }}" type="text/css" media="screen" />
<link rel="stylesheet" href="{{ asset('/fancybox/source/jquery.fancybox.css') }}" type="text/css" media="screen" />
<script src="{{ asset('/pc_assets/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('/pc_assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('/pc_assets/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
<script src="{{ asset('/pc_assets/js/sb-admin-2.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/fancybox/source/jquery.fancybox.pack.js') }}"></script>
@yield('scripts')
</head>
<body id="page-top">
    <div id="wrapper">
    	<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    		<!-- Sidebar - Brand -->
    		<a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('backend/') }}">
    			<div class="sidebar-brand-text mx-3">地摊宝后台管理系统</div>
    		</a>
    		<hr class="sidebar-divider my-0">
    		<li class="nav-item @if(Request::path() == 'backend') active @endif">
    			<a class="nav-link" href="{{ url('backend/') }}"> 
    				<i class="fas fa-fw fa-tachometer-alt"></i> 
    				<span>概览</span>
    			</a>
    		</li>
    		<hr class="sidebar-divider">
    		<div class="sidebar-heading">客户</div>
            <li class="nav-item @if(starts_with(Request::path(), 'backend/categories') !== false) active @endif">
                <a class="nav-link" href="{{ url('backend/categories') }}">
                    <i class="fas fa-fw fa-cogs"></i>
                    <span>分类管理</span>
                </a>
            </li>
            <li class="nav-item @if(starts_with(Request::path(), 'backend/users') !== false) active @endif">
                <a class="nav-link" href="{{ url('backend/users') }}">
                    <i class="fas fa-fw fa-users"></i>
                    <span>用户管理</span>
                </a>
            </li>
            <li class="nav-item @if(starts_with(Request::path(), 'backend/stalls') !== false) active @endif">
                <a class="nav-link" href="{{ url('backend/stalls') }}">
                    <i class="fas fa-fw fa-table"></i>
                    <span>摊位管理</span>
                </a>
            </li>
            <li class="nav-item @if(starts_with(Request::path(), 'backend/feedbacks') !== false) active @endif">
                <a class="nav-link" href="{{ url('backend/feedbacks') }}">
                    <i class="fas fa-fw fa-paper-plane"></i>
                    <span>反馈管理</span>
                </a>
            </li>
    	</ul>
    	<!-- End of Sidebar -->
    	<!-- Content Wrapper -->
    	<div id="content-wrapper" class="d-flex flex-column">
    		<!-- Main Content -->
    		<div id="content">
    			<!-- Topbar -->
    			<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
    				<!-- Sidebar Toggle (Topbar) -->
    				<button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
    					<i class="fa fa-bars"></i>
    				</button>
    				<!-- Topbar Navbar -->
    				<ul class="navbar-nav ml-auto">
    					<!-- Nav Item - User Information -->
    					<li class="nav-item dropdown no-arrow">
    						<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> 
    							<span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ $admin->username }}</span>
    						</a> 
    						<!-- Dropdown - User Information -->
    						<div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
    						
    							<a class="dropdown-item" href="{{ url('backend/password') }}"> 
    								<i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
    								修改密码
    							</a>
    							<a class="dropdown-item" href="{{ url('backend/logout') }}"> 
    								<i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
    								退出
    							</a>
    						</div>
    					</li>
    				</ul>
    			</nav>
    			<div class="container-fluid">
    				@if (Session::has('msg'))
    				<div class="alert alert-danger alert-dismissible fade show" role="alert">
      					<strong>消息提示</strong> {{ Session::get('msg') }}
      					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
        					<span aria-hidden="true">&times;</span>
      					</button>
    				</div>
    				@elseif (Session::has('info'))
    				<div class="alert alert-info alert-dismissible fade show" role="alert">
      					<strong>消息提示</strong> {{ Session::get('info') }}
      					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
        					<span aria-hidden="true">&times;</span>
      					</button>
    				</div>
    				@elseif ($errors->any())
    				<div class="alert alert-danger alert-dismissible fade show" role="alert">
      					<strong>消息提示</strong> {{ $errors->first() }}
      					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
        					<span aria-hidden="true">&times;</span>
      					</button>
    				</div>
    				@endif
    				@yield('content')
    	         </div>
    			<a class="scroll-to-top rounded" href="#page-top"> 
    				<i class="fas fa-angle-up"></i>
    			</a>
    		</div>
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                    	<span>&copy; 技术支持：上海天靖网络科技有限公司</span>
                    </div>
                </div>
            </footer>
    	</div>
    </div>
    <script type="text/javascript">
    $(document).ready(function() {
    	
        var H = $(window).height();
        var h1 = $('#page-wrapper').height();
    
    	if($('#content').length > 0) {
    		var ue = UE.getEditor('container', {
    			initialFrameHeight: 400,
    		});
    		
    		ue.ready(function() {
    			ue.execCommand('serverparam', '_token', '{{ csrf_token() }}');
    		});
    		
    	} else {
    		if(H - 140 - h1 > 0) {
        		$('#page-wrapper').height(H - 70);
        	}
    	}
    });
    
    $('form').submit(function() {
        $('button[type=submit]').attr('disabled', true);
    });
    </script>
</body>
</html>