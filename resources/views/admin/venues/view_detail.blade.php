@extends('admin.layouts.cmlayout')

@section('body')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Venue Detail</h1>
	</div>
	<div class="flash-message">
		@if(session()->has('status'))
			@if(session()->get('status') == 'success')
				<div class="alert alert-success  alert-dismissible">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> {{ session()->get('message') }}
				</div>
			@endif
		@endif
	</div> <!-- end .flash-message -->
	<div class="row">
        <div class="col-xl-4 col-md-4">
			<div class="card shadow mb-4">
				<div class="card-body">

					<ul class="list-group">
						<li class="list-group-item d-flex justify-content-between align-items-center">
							<strong>Owner Name</strong>
							<h5><span class="badge  badge-pill">{{$venueDetail->user->first_name}}</span></h5>
						</li>
						<li class="list-group-item d-flex justify-content-between align-items-center">
							<strong>Venue Name</strong>
							<h5><span class="badge  badge-pill">{{$venueDetail->name}}</span></h5>
						</li>
						<li class="list-group-item d-flex justify-content-between align-items-center">
							<strong>Is Featured</strong>
								@if($venueDetail->is_featured == 1)
									<h5><span class="badge  badge-pill">Yes</span></h5>
								@else
									<h5><span class="badge  badge-pill">No</span></h5>
								@endif
						</li>
						<li class="list-group-item d-flex justify-content-between align-items-center">
							<strong>Total Room</strong>
								<h5><span class="badge  badge-pill">{{$venueDetail->total_room}}</span></h5>
						</li>

					</ul>
				</div>
			</div>
        </div>
		<div class="col-xl-4 col-md-4">
			<div class="card shadow mb-4">
				<div class="card-body">
					<ul class="list-group">
						<li class="list-group-item d-flex justify-content-between align-items-center">
							<strong>Location</strong>
							<h5><span class="badge  badge-pill">{{$venueDetail->location}}</span></h5>
						</li>
						<li class="list-group-item d-flex justify-content-between align-items-center">
							<strong>Contact</strong>
							<h5><span class="badge  badge-pill">{{$venueDetail->contact}}</span></h5>
						</li>
						<li class="list-group-item d-flex justify-content-between align-items-center">
							<strong>Building Type</strong>
							<h5><span class="badge  badge-pill">{{$venueDetail->building_type}}</span></h5>
						</li>
						<li class="list-group-item d-flex justify-content-between align-items-center">
							<strong>Booking Price</strong>
							<h5><span class="badge  badge-pill">{{$venueDetail->booking_price}}</span></h5>
						</li>

					</ul>
				</div>
			</div>
        </div>
	</div>
	<div class="row">
		<div class="col-xl-4 col-md-4">
			<div class="card shadow mb-4">
				<div class="card-body">
				<strong>Amenities</strong>
				<ul class="list-group">
				<li class="list-group-item">{{$venueDetail->amenities_detail}}</li>
				</ul>
				</div>
			</div>
		</div>
		<div class="col-xl-4 col-md-4">
			<div class="card shadow mb-4">
				<div class="card-body">
				<strong>Other Information</strong>
				<ul class="list-group">
				<li class="list-group-item">{{$venueDetail->other_information}}</li>
				</ul>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-xl-8 col-md-8">
			<div class="card shadow mb-4">
			<strong>Venue Images</strong>
				<div class="card-body">
				@if(count($venueImages))
					@foreach($venueImages as $images)

						<img class="img-profile mt30" style="padding-right:10px; padding-bottom:10px" src="{{asset('/assets/venue/images/'.$images->name)}}" width="100px" alt="Venue Image">
					@endforeach
				@else
					<li class="list-group-item ">No Image</li>
				@endif
				</div>
			</div>
		</div>
	</div>
</div>
@endsection