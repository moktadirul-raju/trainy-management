@extends('admin.dashboard')
@section('content')
	<table class="table table-hover table-bordered table-hover">
		<thead>
			<tr>
				<th>Photo</th>
				<th>:</th>
				<th><img src="{{ asset('images/'.$trainy->photo) }}" class="img-responsive" alt="Image" style="height: 100px;width: 100px;"></th>
			</tr>
			<tr>
				<th>Name</th>
				<th>:</th>
				<th>{{ $trainy->name }}</th>
			</tr>
			<tr>
				<th>Email</th>
				<th>:</th>
				<th>{{ $trainy->email }}</th>
			</tr>
			<tr>
				<th>Division</th>
				<th>:</th>
				<th>{{ $trainy->division->division_name }}</th>
			</tr>
			<tr>
				<th>District</th>
				<th>:</th>
				<th>{{ $trainy->district->district_name }}</th>
			</tr>
			<tr>
				<th>Upazila</th>
				<th>:</th>
				<th>{{ $trainy->upazila->upazila_name }}</th>
			</tr>
			<tr>
				<th>Address</th>
				<th>:</th>
				<th>{{ $trainy->address }}</th>
			</tr>
			<tr>
				<th>Exam</th>
				<th>:</th>
				<th>{{ $trainy->exam->exam_name }}</th>
			</tr>
			<tr>
				<th>University</th>
				<th>:</th>
				<th>{{ $trainy->university->university_name }}</th>
			</tr>
			<tr>
				<th>Board</th>
				<th>:</th>
				<th>{{ $trainy->board->board_name }}</th>
			</tr>
			<tr>
				<th>Language</th>
				<th>:</th>
				<th>{{ $trainy->language }}</th>
			</tr>
			<tr>
				<th>Training Name</th>
				<th>:</th>
				<th>{{ $trainy->training_name != null ? $trainy->training_name : '' }}</th>
			</tr>
			<tr>
				<th>Training Details</th>
				<th>:</th>
				<th>{{ $trainy->training_details != null ? $trainy->training_details : '' }}</th>
			</tr>
		</thead>
				
			</table>
@endsection