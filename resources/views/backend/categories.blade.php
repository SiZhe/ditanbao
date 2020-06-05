@extends('backend.template.template')
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800">分类管理</h1>
</div>
<section class="card shadow mb-4">
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-primary">
			全部分类 
		</h6>
	</div>
	<div class="card-body">
    	<div class="wrapper">
    		<a href="{{ url('/backend/categories/create') }}" class="btn btn-primary btn-sm">创建分类</a>
    	</div>
		<table class="table table-hover mt-3">
			<thead class="thead-light">
				<tr>
					<th>ID</th>
					<th>分类名</th>
					<th width="200">操作</th>
				</tr>
			</thead>
			<tbody>
				@foreach($categories as $category)
					@include('backend.template.partial_category', array('c' => $category))
				@endforeach
			</tbody>
		</table>
	</div>
</section>
@endsection
