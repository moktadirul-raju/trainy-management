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
				Registered Triny List
			</h3>
		</div>
		<div class="panel-body">
			<form action="{{ route('admin.search-trainy') }}" method="POST">
				@csrf
				<div class="row">
					<div class="col-md-2">
						<div class="form-group">
							<label for="">Select Division</label>
							<select name="division_id" id="division" class="form-control" onchange="getDistrict()">
								@foreach($divisions as $division)
								<option value="{{ $division->id }}">{{ $division->division_name }}</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="col-md-2">
						<div class="form-group">
							<label for="">Select District</label>
							<select name="district_id" id="district" class="form-control" onchange="getUpazila()">
								<option>Select District</option>
							</select>
						</div>
					</div>
					<div class="col-md-2">
						<div class="form-group">
							<label for="">Select Upazila</label>
							<select name="upazila_id" id="upazila" class="form-control">
								<option>Selct Upazila</option>
							</select>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="">Name/Email</label>
							<input type="text" class="form-control" name="query">
						</div>
					</div>
					<div class="col-md-2">
						<div class="form-group">
							<label for="">Search</label>
							<input type="submit" class="form-control btn btn-info"  value="Search">
						</div>
					</div>
				</div>
			</form>
			@if(session()->has('message'))
		    	<div class="alert alert-success">
		            {{ session()->get('message') }}
		        </div>
		    @endif
			@if(isset($traines))
			<table class="table table-hover">
				<thead>
					<tr>
						<th>Sl.no</th>
						<th>Name</th>
						<th>Email</th>
						<th>Division</th>
						<th>District</th>
						<th>Upazila</th>
						<th>Registration Date</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach($traines as $key=> $trainy)
					<tr>
						<td>{{ $key + 1 }}</td>
						<td>{{ $trainy->name }}</td>
						<td>{{ $trainy->email }}</td>
						<td>{{ $trainy->division->division_name }}</td>
						<td>{{ $trainy->district->district_name }}</td>
						<td>{{ $trainy->upazila->upazila_name }}</td>
						<td>{{ $trainy->created_at->format('d-m-Y') }}</td>
						<td>
							<a href="{{ route('admin.view-trainy',$trainy->id) }}" class="btn btn-primary"><i class="fa fa-eye"></i></a>
							<a href="#" class="btn btn-info"><i class="fa fa-edit"></i></a>
							<a href="" class="btn btn-danger"><i class="fa fa-trash"></i></a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
			@endif
		</div>
	</div>
@endsection

@push('js')
<script>
	function getDistrict(){
        $('#district') .find('option') .remove() .end() .append('<option value="">Select District</option>');
        var id = document.getElementById('division').value;
        axios.get(`/api/get_district/${id}`)
        .then(function (response) {
            var list = response.data;
             var select = document.getElementById("district");
             let i = 0;
            for(i = 0; i < list.length ;i ++){
                var el = document.createElement("option");
                var districts = list[i];
                var districtName = districts.district_name;
                var districtId = districts.id;
                el.textContent = districtName;
                el.value = districtId;
                select.appendChild(el);
            }
        });
    }
    function getUpazila(){
        $('#upazila') .find('option') .remove() .end() .append('<option value="">Select Upazila</option>');
        var id = document.getElementById('district').value;
        axios.get(`/api/get_upazila/${id}`)
        .then(function (response) {
            var list = response.data;
             var select = document.getElementById("upazila");
             let i = 0;
            for(i = 0; i < list.length ;i ++){
                var el = document.createElement("option");
                var upazilas = list[i];
                var upazilaName = upazilas.upazila_name;
                var upazilaId = upazilas.id;
                el.textContent = upazilaName;
                el.value = upazilaId;
                select.appendChild(el);
            }
        });
    }
</script>
@endpush