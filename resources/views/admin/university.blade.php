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
				Our university List
				<span style="float: right;">
					<a class="btn btn-primary" data-toggle="modal" href='#modal-id'>Add New</a>
					<div class="modal fade" id="modal-id">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
									<h4 class="modal-title">Add New university</h4>
								</div>
								<div class="modal-body">
									<form action="{{ route('admin.university.store') }}" method="POST" role="form">
									@csrf
										<div class="form-group">
											<label for="">university Name</label>
											<input name="university_name" type="text" class="form-control" id="" placeholder="university">
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
						<th>university Name</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach($universities as $key=> $university)
					<tr>
						<td>{{ $key + 1 }}</td>
						<td>{{ $university->university_name }}</td>
						<td>
							<a class="btn btn-primary" data-toggle="modal" href='#modal-id{{ $university->id }}'>
								<i class="fa fa-edit"></i>
							</a>
							<div class="modal fade" id="modal-id{{ $university->id }}">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
											<h4 class="modal-title">Edit university</h4>
										</div>
										<div class="modal-body">
											<form action="{{ route('admin.university.update',$university->id) }}" method="POST" role="form">
											@csrf
											@method('PUT')
												<div class="form-group">
													<label for="">university Name</label>
													<input name="university_name" type="text" class="form-control" id="" value="{{ $university->university_name }}">
												</div>
												<button type="submit" class="btn btn-primary">Submit</button>
												<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
											</form>
										</div>
										
									</div>
								</div>
							</div>
							<a href="{{ route('admin.university.destroy',$university->id) }}" class="btn btn-danger">
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