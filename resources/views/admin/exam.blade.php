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
				Our exam List
				<span style="float: right;">
					<a class="btn btn-primary" data-toggle="modal" href='#modal-id'>Add New</a>
					<div class="modal fade" id="modal-id">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
									<h4 class="modal-title">Add New exam</h4>
								</div>
								<div class="modal-body">
									<form action="{{ route('admin.exam.store') }}" method="POST" role="form">
									@csrf
										<div class="form-group">
											<label for="">exam Name</label>
											<input name="exam_name" type="text" class="form-control" id="" placeholder="exam">
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
						<th>exam Name</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach($exams as $key=> $exam)
					<tr>
						<td>{{ $key + 1 }}</td>
						<td>{{ $exam->exam_name }}</td>
						<td>
							<a class="btn btn-primary" data-toggle="modal" href='#modal-id{{ $exam->id }}'>
								<i class="fa fa-edit"></i>
							</a>
							<div class="modal fade" id="modal-id{{ $exam->id }}">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
											<h4 class="modal-title">Edit exam</h4>
										</div>
										<div class="modal-body">
											<form action="{{ route('admin.exam.update',$exam->id) }}" method="POST" role="form">
											@csrf
											@method('PUT')
												<div class="form-group">
													<label for="">exam Name</label>
													<input name="exam_name" type="text" class="form-control" id="" value="{{ $exam->exam_name }}">
												</div>
												<button type="submit" class="btn btn-primary">Submit</button>
												<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
											</form>
										</div>
										
									</div>
								</div>
							</div>
							<a href="{{ route('admin.exam.destroy',$exam->id) }}" class="btn btn-danger">
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