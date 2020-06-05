@extends('backend.template.template')
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800">分类管理</h1>
</div>
<section class="card shadow mb-4">
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-primary">
			@if (!$category->exists) 
				新建管理 
			@else
    			编辑分类
    		@endif
		</h6>
	</div>
	<div class="card-body">
		@if (!$category->exists)
			{!! Form::open(array('route' => array('backend.categories.store'), 'files' => true)) !!}
		@else
			{!! Form::model($category, array('method' => 'PATCH', 'route' => array('backend.categories.update', $category->id), 'files' => true)) !!}
		@endif
			@if(!empty(Request::input('parentId')) || !empty($category->parent_id))
			<div class="form-group">
				{!! Form::label('parent_id', '上级分类', array('class' => 'control-label')) !!}
				@if(!empty(Request::input('parentId')))
				<p class="form-control-static">{{ App\Models\Category::find(Request::input('parentId'))->name }}</p>
				{!! Form::hidden('parent_id', Request::input('parentId')) !!}
				@endif
				@if(!empty($category->parent_id))
				<p class="form-control-static">{{ App\Models\Category::find($category->parent_id)->name }}</p>
				{!! Form::hidden('parent_id', $category->parent_id) !!}
				@endif
	  		</div>
	  		@endif
			<div class="form-group">
				{!! Form::label('name', '分类名称', array('class' => 'control-label')) !!}
				{!! Form::text('name', $category->name, array('class' => 'form-control')) !!}
			</div>
	  		<div class="form-group">
  				<button type="submit" class="btn btn-primary">
  					立即保存
  				</button>
				<a href="{{ url('backend/categories') }}" class="btn btn-default">返回</a>
	  		</div>
		{!! Form::close() !!}
	</div>
</section>
@endsection