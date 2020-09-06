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
				Our board List
				<span style="float: right;">
					<a class="btn btn-primary" data-toggle="modal" href='#modal-id'>Add New</a>
					<div class="modal fade" id="modal-id">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
									<h4 class="modal-title">Add New board</h4>
								</div>
								<div class="modal-body">
									<form action="{{ route('admin.board.store') }}" method="POST" role="form">
									@csrf
										<div class="form-group">
											<label for="">board Name</label>
											<input name="board_name" type="text" class="form-control" id="" placeholder="board">
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
						<th>board Name</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach($boards as $key=> $board)
					<tr>
						<td>{{ $key + 1 }}</td>
						<td>{{ $board->board_name }}</td>
						<td>
							<a class="btn btn-primary" data-toggle="modal" href='#modal-id{{ $board->id }}'>
								<i class="fa fa-edit"></i>
							</a>
							<div class="modal fade" id="modal-id{{ $board->id }}">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
											<h4 class="modal-title">Edit board</h4>
										</div>
										<div class="modal-body">
											<form action="{{ route('admin.board.update',$board->id) }}" method="POST" role="form">
											@csrf
											@method('PUT')
												<div class="form-group">
													<label for="">board Name</label>
													<input name="board_name" type="text" class="form-control" id="" value="{{ $board->board_name }}">
												</div>
												<button type="submit" class="btn btn-primary">Submit</button>
												<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
											</form>
										</div>
										
									</div>
								</div>
							</div>
							<a href="{{ route('admin.board.destroy',$board->id) }}" class="btn btn-danger">
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