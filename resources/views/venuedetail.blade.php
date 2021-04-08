@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row mt-5">
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
               @if($venue->venue_images->count() > 0)
                    @foreach($venue->venue_images as $key => $images)
                        <div class="carousel-item {{$key == 0 ? 'active' : ''}}" >
                            <img class="d-block w-100"  height="150" src="{{asset('assets/venue/images/'.$images->name)}}" alt="Venue Images">
                        </div>
                    @endforeach
                @else
                    <div class="carousel-item active">
                            <img class="d-block w-100" src="{{asset('frontend/images/download.png')}}" alt="No Image">
                    </div>
                @endif            
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-md-12 mb-5">
        <div class="card">
                <ul class="list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <strong>Venue Name</strong>
                        <h5><span class="badge  badge-pill">{{$venue->name}}</span></h5>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <strong>Location</strong>
                        <h5><span class="badge  badge-pill">{{$venue->location}}</span></h5>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <strong>Contact</strong>
                        <h5><span class="badge  badge-pill">{{$venue->contact}}</span></h5>
                    </li>                
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <strong>Booking Price</strong>
                        <h5><span class="badge  badge-pill">{{$venue->booking_price}}</span></h5>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <strong>Total Room</strong>
                            <h5><span class="badge  badge-pill">{{$venue->total_room}}</span></h5>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <strong>Rating</strong>
                            <h5><span class="badge  badge-pill">{{$venue->average_rating}}</span></h5>
                    </li>
                </ul>  
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 mb-5">
            <div class="card-body">
                <ul class="list-group">
                <strong>Amenities Detail</strong>
                    <li class="list-group-item d-flex justify-content-between align-items-center">                     
                        <h5><span class="badge  badge-pill">{{$venue->amenities_detail}}</span></h5>
                    </li>                    
                </ul>           
            </div>
        </div> 
        <div class="col-md-6 mb-5">
            <div class="card-body">
                <ul class="list-group">
                <strong>Other Information</strong>
                    <li class="list-group-item d-flex justify-content-between align-items-center">                        
                        <h5><span class="badge  badge-pill">{{$venue->other_information}}</span></h5>
                    </li>                    
                </ul>           
            </div>
        </div>
    </div>
   <div class="row">
        <div class="col-md-6 mb-5">
            <iframe width="100%" height="500" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src = "https://maps.google.com/maps?q=10.305385,77.923029&hl=es;z=14&amp;output=embed"></iframe>
        </div>
        <div class="col-md-6 mb-5">
            <div class="card-body">
                <ul class="list-group">
                <p><strong>Contact Detail</strong></p>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <strong>Owner Name</strong>
                        <h5><span class="badge  badge-pill">{{isset($venue->user->first_name) ? $venue->user->first_name:""}}</span></h5>
                    </li>  
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <strong>Owner Email</strong>
                        <h5><span class="badge  badge-pill">{{isset($venue->user->email) ? $venue->user->email:""}}</span></h5>
                    </li>  
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <strong>Owner Contact</strong>
                        <h5><span class="badge  badge-pill">{{isset($venue->user->user_detail->mobile) ? $venue->user->user_detail->mobile:""}}</span></h5>
                    </li>                
                </ul>  
                <a class="btn btn-info mt-4" href="{{route('bookvenue',['id' => $venue->id])}}"> Book Now</a>
            </div>
        </div>
    </div>
</div>
@endsection