@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row mt-5">
        <div class="col-md-4 mb-5">
            <div class="card">
                <div class="card-body">
                @if(isset($venue->venue_images->name) && $venue->venue_images->name != "")
                            <img width="150" height="150" src="{{asset('assets/venue/images/'.$venue->venue_images->name)}}">
                        @else
                            <img src="{{asset('frontend/images/download.png')}}">
                        @endif
                </div>   
            </div>
        </div> 
        <div class="col-md-8 mb-5">
        <div class="card">
            <!-- <div class="card-body"> -->
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
                </ul>  
                <!-- </div>        -->
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
                <a class="btn btn-info mt-4" href="{{route('bookvenue',['id' =>$venue->id])}}"> Book Now</a>
            </div>
        </div>
    </div>
</div>
@endsection