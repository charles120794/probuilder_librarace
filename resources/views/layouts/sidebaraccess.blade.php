@foreach($class as $key => $value)

<li class="{{ $value->menu_active }} @if($value->menu_type) treeview @endif">

	<a href="/{{ $value->module_code }}/{{ $value->menu_path }}">
		<i class="{{ $value->menu_icon }}"></i> <span>{{ $value->menu_name }}</span>
		@if($value->menu_type)
		<span class="pull-right-container">
			<i class="fa fa-angle-left pull-right"></i>
		</span>
		@endif
	</a>

	@if($value->menu_type)

		<ul class="treeview-menu">
			@include('layouts.sidebaraccess',['class' => $value->menu_sub])
		</ul>

	@endif

</li>

@endforeach