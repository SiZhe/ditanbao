@extends('backend.template.template')
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800">用户管理</h1>
</div>
<div class="card shadow mb-4">
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-primary">
			Ta的关注
		</h6>
	</div>
	<div class="card-body">
		<table class="table table-hover mt-3">
			<thead class="thead-light">
				<tr>
					<th>ID</th>
					<th>摊位信息</th>
					<th>状态</th>
					<th>摊主</th>
					<th width="200">操作</th>
				</tr>
			</thead>
			<tbody>
				@foreach($user->stalls as $stall)
				<tr>
					<td>{{ $stall->id }}</td>
					<td>
						<a href="{{ route('backend.stalls.show', $stall->id) }}">
    						<div class="float-left mr-2">
    							<img src="{{ $stall->coverUrl('50x50') }}" height="50">
    						</div>
    						{{ $stall->name }} <br>
    						<label class="badge badge-sm badge-primary">{{ $stall->category->name }}</label>
						</a>
					</td>
					<td>
						{{ $stall->getStatusEx() }}
					</td>
					<td>
						{{ $stall->user->nickname }}
					</td>
					<td width="200">操作</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
@endsection
