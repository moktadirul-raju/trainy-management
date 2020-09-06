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
				Our Upazila List
				<span style="float: right;">
					<a class="btn btn-primary" data-toggle="modal" href='#modal-id'>Add New</a>
					<div class="modal fade" id="modal-id">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
									<h4 class="modal-title">Add New Upazila</h4>
								</div>
								<div class="modal-body">
									<form action="{{ route('admin.upazila.store') }}" method="POST" role="form">
									@csrf
									<div class="form-group">
										<label>District</label>
										<select name="district_id" class="form-control">
											<option>Select District</option>
											@foreach($districts as $district)
												<option value="{{ $district->id }}">{{ $district->district_name }}</option>
											@endforeach
										</select>
									</div>
										<div class="form-group">
											<label for="">upazila Name</label>
											<input name="upazila_name" type="text" class="form-control" id="" placeholder="upazila">
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
						<th>District Name</th>
						<th>Upazila Name</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach($upazilas as $key=> $upazila)
					<tr>
						<td>{{ $key + 1 }}</td>
						<td>{{ $upazila->district->district_name }}</td>
						<td>{{ $upazila->upazila_name }}</td>
						<td>
							<a class="btn btn-primary" data-toggle="modal" href='#modal-id{{ $upazila->id }}'>
								<i class="fa fa-edit"></i>
							</a>
							<div class="modal fade" id="modal-id{{ $upazila->id }}">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
											<h4 class="modal-title">Edit upazila</h4>
										</div>
										<div class="modal-body">
											<form action="{{ route('admin.upazila.update',$upazila->id) }}" method="POST" role="form">
											@csrf
											@method('PUT')
											<div class="form-group">
												<label>District</label>
												<select name="district_id" class="form-control">
													<option value="{{ $upazila->district->district_id }}">
														{{ $upazila->district->district_name }}
													</option>
													@foreach($districts as $district)
														<option value="{{ $district->id }}">{{ $district->district_name }}</option>
													@endforeach
												</select>
											</div>
												<div class="form-group">
													<label for="">Upazila Name</label>
													<input name="upazila_name" type="text" class="form-control" id="" value="{{ $upazila->upazila_name }}">
												</div>
												<button type="submit" class="btn btn-primary">Submit</button>
												<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
											</form>
										</div>
										
									</div>
								</div>
							</div>
							<a href="{{ route('admin.upazila.destroy',$upazila->id) }}" class="btn btn-danger">
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