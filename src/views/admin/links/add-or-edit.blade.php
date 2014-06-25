@extends('core::admin.template')

@section('title', ucfirst($action).' Link')

@section('js')
	{{ HTML::script('packages/angel/core/js/ckeditor/ckeditor.js') }}
@stop

@section('content')
	<h1>{{ ucfirst($action) }} Link</h1>
	@if ($action == 'edit')
		{{ Form::open(array('role'=>'form',
							'url'=>admin_uri('links/hard-delete/'.$link->id),
							'class'=>'deleteForm',
							'data-confirm'=>'Delete this link forever?  This action cannot be undone!')) }}
			<input type="submit" class="btn btn-sm btn-danger" value="Delete Forever" />
		{{ Form::close() }}
	@endif

	@if ($action == 'edit')
		{{ Form::model($link) }}
	@elseif ($action == 'add')
		{{ Form::open(array('role'=>'form', 'method'=>'post')) }}
	@endif

	@if (isset($menu_id))
		{{ Form::hidden('menu_id', $menu_id) }}
	@endif

	<div class="row">
		<div class="col-md-9">
			<table class="table table-striped">
				<tbody>
					<tr>
						<td>
							{{ Form::label('name', 'Name') }}
						</td>
						<td>
							<div style="width:300px">
								{{ Form::text('name', null, array('class'=>'form-control', 'placeholder'=>'Name')) }}
							</div>
						</td>
					</tr>
					<tr>
						<td>
							{{ Form::label('url', 'URL') }}
						</td>
						<td>
							<div>
								{{ Form::text('url', null, array('class'=>'form-control', 'placeholder'=>'URL')) }}
							</div>
						</td>
					</tr>
				</tbody>
			</table>
		</div>{{-- Left Column --}}
	</div>{{-- Row --}}
	<div class="text-right pad">
		<input type="submit" class="btn btn-primary" value="Save" />
	</div>
	{{ Form::close() }}
@stop