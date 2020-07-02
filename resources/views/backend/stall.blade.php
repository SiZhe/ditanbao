@extends('backend.template.template')
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800">摊位管理</h1>
</div>
<table class="table shadow table-bordered mt-3">
	<thead class="bg-primary text-white">
		<tr>
			<th>摊位信息</th>
			<th>摊位介绍</th>
			<th>摊主</th>
		</tr>
	</thead>
	<tbody class="bg-white">
    	<tr>
    		<td>
    			<div class="float-left mr-2">
					<img src="{{ $stall->coverUrl('50x50') }}" height="50">
				</div>
				{{ $stall->name }} <br>
				<label class="badge badge-sm badge-primary">{{ $stall->category->name }}</label>
    		</td>
    		<td>
    			{{ $stall->desc }}
    		</td>
    		<td>
    			<div>
					<img src="{{ $stall->user->avatarUrl('50x50') }}" width="50">
				</div>
				<small>{{ $stall->user->nickname }}</small>
    		</td>
    	</tr>
	</tbody>
</table>
<div class="row">
	<div class="col-6">
        <section class="card shadow mb-4">
        	<div class="card-header py-3 d-sm-flex align-items-center justify-content-between">
        		<div>
            		<h6 class="m-0 font-weight-bold text-primary">
            			所有宝贝
            		</h6>
        		</div>
        		<div>
        			<a class="btn btn-sm btn-info">查看更多</a>
        		</div>
        	</div>
        	<div class="card-body">
        		<div class="row">
        		@foreach($products as $product)
        			<div class="col-2 text-center">
        				<a href="{{ $product->thumbnailUrl() }}" class="fancybox">
            				<div>
            					<img src="{{ $product->thumbnailUrl('100x100') }}" width="100%">
            				</div>
            				<small>{{ $product->name }}</small>
        				</a>
        			</div>
        		@endforeach
        		</div>
        	</div>
        </section>
    </div>
    <div class="col-6">
        <section class="card shadow mb-4">
        	<div class="card-header py-3 d-sm-flex align-items-center justify-content-between">
        		<div>
            		<h6 class="m-0 font-weight-bold text-primary">
            			所有粉丝
            		</h6>
        		</div>
        		<div>
        			<a class="btn btn-sm btn-info">查看更多</a>
        		</div>
        	</div>
        	<div class="card-body">
        		<div class="row">
        		@foreach($stall->users as $user)
    				<div>
    					<img class="rounded-circle" src="{{ $user->avatarUrl('65x65') }}" width="65" height="65">
    				</div>
        		@endforeach
        		</div>
        	</div>
        </section>
    </div>
</div>
<script>
$(document).ready(function() {
    $('.fancybox').fancybox();
});
</script>
@endsection
