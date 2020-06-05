<tr>
	<td class="text-muted">{{ $c->id }}</td>
	<td>
		
		<span style="margin-left: {{ $c->depth() * 3 }}em;">{{ $c->name }}</span>
	</td>
	<td>
		<a href="{{ url('backend/categories/'.$c->id.'/edit') }}">编辑</a>丨
		<a href="{{ url('backend/categories/create?parentId='.$c->id) }}">创建子分类</a>
	</td>
</tr>
@if(count($c->subCategories) > 0)
    @foreach($c->subCategories as $c)
    	@include('backend.template.partial_category', $c)
    @endforeach
@endif