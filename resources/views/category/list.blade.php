@extends('layouts.master')
@section('title', 'Category')
@section('content')
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				Category Management
				<a href="{!!url('category/add')!!}" title=""><button type="button" class="btn btn-primary pull-right">Add</button></a>
			</div>
			@if (count($errors) > 0)
			    <div class="alert alert-danger">
			        <ul>
			            @foreach ($errors->all() as $error)
			                <li>{{ $error }}</li>
			            @endforeach
			        </ul>
			    </div>
			    @elseif (Session()->has('flash_level'))
			    	<div class="alert alert-success">
				        <ul>
				            {!! Session::get('flash_massage') !!}	
				        </ul>
				    </div>
				@endif
			<div class="panel-body">
				<div class="table-responsive">
					@if (Session()->has('flash_level'))
	                <div class="alert alert-{!! Session::get('flash_type') !!}" role="alert">
	                    {!! Session::get('flash_massage') !!}
	                </div>
	                @endif
					<table class="table table-hover">
						<thead>
							<tr>										
								<th>#</th>										
								<th>Name</th>
								<th>Description</th>										
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
						@foreach($data as $key => $row)
							<tr>
								<td>{!!$key + 1!!}</td>
								<td>{!!$row->name!!}</td>
								<td><small>{!!$row->description!!}</small></td>
								<td style="width: 120px;">
								    <a title="Edit"
								    	href="{{ route('category/edit' . $row->id) }}"
                                        >
                                        Edit
                                    </a>
                                    <a title="Edit"
                                        onclick="event.preventDefault();
                                                 document.getElementById('delete-form').submit();">
                                        Remove
                                    </a>
								    <form id="delete-form" action="{{ route('category/delete') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="id" value="{{!!$row->id)}}">
                                    </form>
								</td>
							</tr>	
						@endforeach								
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection