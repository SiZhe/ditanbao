@extends('backend.template.template')
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800">用户管理</h1>
</div>
<div class="card shadow mb-4">
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-primary">
			全部用户 <label class="badge badge-success">{{ $users->total() }}</label>
		</h6>
	</div>
	<div class="card-body">
		<table class="table table-hover">
			<thead class="thead-light">
				<tr>
					<th width="60">ID</th>
					<th width="200">头像</th>
					<th width="100">昵称</th>
					<th>手机号</th>
					<th>时间</th>
					<th width="130">OP</th>
				</tr>
			</thead>
			<tbody>
				@foreach($users as $user)
				<tr>
					<td>{{ $user->id }}</td>
					<td><img alt="" src="{{ $user->avatarUrl() }}" width="60"></td>
					<td>{{ $user->nickname }}</td>
					<td>{{ $user->cellphone }}</td>
					<td>{{ $user->created_at->format('Y-m-d H:i') }}</td>
					<td></td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
@endsection
