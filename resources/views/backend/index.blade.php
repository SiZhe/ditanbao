@extends('backend.template.template')
@section('scripts')
<script src="{{ asset('pc_assets/vendor/chart.js/Chart.min.js') }}"></script>
@endsection
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
	<div>
    	<a href="https://shimo.im/docs/1ca1f4836eaf45e1" target="_blank" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm"><i class="fas fa-book fa-sm text-white-50"></i> 说明文档</a>
    	<a href="{{ url('/portal') }}" target="_blank" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> 演示模式</a>
	</div>
</div>
<div class="row">
	<div class="col-xl-3 col-md-6 mb-4">
		<div class="card border-left-primary shadow h-100 py-2">
			<div class="card-body">
				<div class="row no-gutters align-items-center">
					<div class="col mr-2">
						<a href="{{ url('backend/orgs') }}">
    						<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">客户总数</div>
    						<div class="h5 mb-0 font-weight-bold text-gray-800"></div>
						</a>
					</div>
					<div class="col-auto">
						<i class="fas fa-users fa-2x text-gray-300"></i>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-xl-3 col-md-6 mb-4">
		<div class="card border-left-success shadow h-100 py-2">
			<div class="card-body">
				<div class="row no-gutters align-items-center">
					<div class="col mr-2">
						<a href="{{ url('backend/dtus') }}?all=true">
    						<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">DTU总数</div>
    						<div class="h5 mb-0 font-weight-bold text-gray-800"></div>
    					</a>
					</div>
					<div class="col-auto">
						<i class="fas fa-unlink fa-2x text-gray-300"></i>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-xl-3 col-md-6 mb-4">
		<div class="card border-left-info shadow h-100 py-2">
			<div class="card-body">
				<div class="row no-gutters align-items-center">
					<div class="col mr-2">
						<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">大棚总数</div>
						<div class="h5 mb-0 font-weight-bold text-gray-800"></div>
					</div>
					<div class="col-auto">
						<i class="fas fa-home fa-2x text-gray-300"></i>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-xl-3 col-md-6 mb-4">
		<div class="card border-left-warning shadow h-100 py-2">
			<div class="card-body">
				<div class="row no-gutters align-items-center">
					<div class="col mr-2">
						<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">种植总数</div>
						<div class="h5 mb-0 font-weight-bold text-gray-800"></div>
					</div>
					<div class="col-auto">
						<i class="fas fa-tree fa-2x text-gray-300"></i>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-xl-3 col-md-6 mb-4">
		<div class="card bg-success shadow h-100 py-2 text-white">
			<div class="card-body">
				<div class="row no-gutters align-items-center">
					<div class="col mr-2">
						<div class="text-xs font-weight-bold">传感器在线</div>
						<div class="h5 mb-0 font-weight-bold"></div>
					</div>
					<div class="col-auto">
						<i class="fas fa-ticket-alt fa-2x text-gray-300"></i>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-xl-3 col-md-6 mb-4">
		<div class="card bg-danger shadow h-100 py-2 text-white">
			<div class="card-body">
				<div class="row no-gutters align-items-center">
					<div class="col mr-2">
						<div class="text-xs font-weight-bold">传感器离线</div>
						<div class="h5 mb-0 font-weight-bold"></div>
					</div>
					<div class="col-auto">
						<i class="fas fa-ticket-alt fa-2x text-gray-300"></i>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-xl-3 col-md-6 mb-4">
		<div class="card border-left-warning shadow h-100 py-2">
			<div class="card-body">
				<div class="row no-gutters align-items-center">
					<div class="col mr-2">
						<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">基地个数</div>
						<div class="h5 mb-0 font-weight-bold text-gray-800"></div>
					</div>
					<div class="col-auto">
						<i class="fas fa-landmark fa-2x text-gray-300"></i>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-xl-3 col-md-6 mb-4">
		<div class="card border-left-warning shadow h-100 py-2">
			<div class="card-body">
				<div class="row no-gutters align-items-center">
					<div class="col mr-2">
						<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">基地面积</div>
						<div class="h5 mb-0 font-weight-bold text-gray-800">亩</div>
					</div>
					<div class="col-auto">
						<i class="fas fa-landmark fa-2x text-gray-300"></i>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection