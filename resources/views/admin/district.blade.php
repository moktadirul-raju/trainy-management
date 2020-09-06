@extends('admin.dashboard')
@section('content')
@if(session()->has('message'))
    	<div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif
	<div class="panel panel-success">
		<div class="panel-heading">
			<h3 class="panel-title" style="height: 40px;">
				Our District List
				<span style="float: right;">
					<a class="btn btn-primary" data-toggle="modal" href='#modal-id'>Add New</a>
					<div class="modal fade" id="modal-id">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
									<h4 class="modal-title">Add New District</h4>
								</div>
								<div class="modal-body">
									<form action="{{ route('admin.district.store') }}" method="POST" role="form">
									@csrf
									<div class="form-group">
										<label>Division</label>
										<select name="division_id" class="form-control">
											<option>Select Division</option>
											@foreach($divisions as $division)
												<option value="{{ $division->id }}">{{ $division->division_name }}</option>
											@endforeach
										</select>
									</div>
										<div class="form-group">
											<label for="">Division Name</label>
											<input name="district_name" type="text" class="form-control" id="" placeholder="Division">
										</div>
										<button type="submit" class="btn btn-primary">Submit</button>
										<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
									</form>
								</div>
							</div>
						</div>
					</div>
				</span>
			</h3>
		</div>
		<div class="panel-body">
			<table class="table table-hover">
				<thead>
					<tr>
						<th>Sl.no</th>
						<th>Division Name</th>
						<th>District Name</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach($districts as $key=> $district)
					<tr>
						<td>{{ $key + 1 }}</td>
						<td>{{ $district->division->division_name }}</td>
						<td>{{ $district->district_name }}</td>
						<td>
							<a class="btn btn-primary" data-toggle="modal" href='#modal-id{{ $district->id }}'>
								<i class="fa fa-edit"></i>
							</a>
							<div class="modal fade" id="modal-id{{ $district->id }}">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
											<h4 class="modal-title">Edit Division</h4>
										</div>
										<div class="modal-body">
											<form action="{{ route('admin.district.update',$district->id) }}" method="POST" role="form">
											@csrf
											@method('PUT')
											<div class="form-group">
												<label>Division</label>
												<select name="division_id" class="form-control">
													<option value="{{ $district->division_id }}">
														{{ $district->division->division_name }}
													</option>
													@foreach($divisions as $division)
														<option value="{{ $division->id }}">{{ $division->division_name }}</option>
													@endforeach
												</select>
											</div>
												<div class="form-group">
													<label for="">District Name</label>
													<input name="district_name" type="text" class="form-control" id="" value="{{ $district->district_name }}">
												</div>
												<button type="submit" class="btn btn-primary">Submit</button>
												<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
											</form>
										</div>
										
									</div>
								</div>
							</div>
							<a href="{{ route('admin.division.destroy',$division->id) }}" class="btn btn-danger">
								<i class="fa fa-trash"></i>
							</a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
@endsection