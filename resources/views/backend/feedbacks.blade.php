@extends('backend.template.template')
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800">意见反馈</h1>
</div>
<section class="card shadow mb-4">
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-primary">
			意见反馈 <label class="badge badge-sm badge-success">{{ $feedbacks->total() }}</label>
		</h6>
	</div>
	<div class="card-body">
    	<div class="wrapper">
    		
    	</div>
		<table class="table table-hover mt-3">
			<thead class="thead-light">
        		<tr>
        			<th>ID</th>
        			<th>反馈内容</th>
        			<th>反馈人</th>
        			<th>时间</th>
        		</tr>
        	</thead>
			<tbody>
        		@foreach($feedbacks as $feedback)
        		<tr>
        			<td width="50">#{{ $feedback->id }}</td>
					<td>
						@if($feedback->thumbnail)
						<div class="float-left mr-2">
							<a href="{{ $feedback->thumbnailUrl() }}" class="fancybox">
								<img src="{{ $feedback->thumbnailUrl('50x50') }}" width="50">
							</a>
						</div>
						@endif
						{{ $feedback->content }}
					</td>
        			<td>
        				<div>
    						<a href="{{ $feedback->user->avatarUrl() }}" class="fancybox">
            					<img src="{{ $feedback->user->avatarUrl('50x50') }}" width="50">
            				</a>
        				</div>
        				<small>{{ $feedback->user->nickname }}</small>
        			</td>
        			<td>{{ $feedback->created_at->format('Y-m-d H:i') }}</td>
        		</tr>
        		@endforeach
        	</tbody>
		</table>
	</div>
	<div class="card-footer">
		{!! $feedbacks->links() !!}
	</div>
</section>
<script>
$(document).ready(function() {
    $('.fancybox').fancybox();
});
</script>
@endsection