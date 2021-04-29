@extends('layouts.app')
@section('content')

<main class="wrapper">
    <!-- banner-section-start -->
    <div class="vanue-detail-banner">
        <div class="venue-detail-slider venue-sliderbtn">
            @if($venue->venue_images->count() > 0)
            @foreach($venue->venue_images as $key => $images)
            <div class="venue-detail-inner">
                <div class="venue-detail-img">
                    <img src="{{asset('assets/venue/images/'.$images->name)}}" alt="slider-img">
                </div>
            </div>
            @endforeach
            @else
            <div class="venue-detail-inner">
                <div class="venue-detail-img">
                    <img class="d-block w-100" src="{{asset('frontend/images/download.png')}}" alt="No Image">
                </div>
            </div>
            @endif
        </div>
    </div>
    <!-- banner-section-end -->
    <!-- details-section-start -->
    <section class="details-section">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-7">
                    <div class="details-block">
                        <div class="detail-rating-block">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="detail-head">
                                        <h3 class="detail-ttl m-0">Rock and Best Villa Halls in London</h3>
                                        <p class="font-thirteen mb-2">Near Churches, London</p>
                                        <a href="#" class="wifi-tag">Free Wifi</a>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="detail-ranking">
                                        <span class="town-rating font-thirteen"><i class="fa fa-star"></i> 4.9/5</span>
                                        <div class="town-review">(15 Reviews)</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="details-bar">
                            <ul class="list-inline detail-bar-menu">
                                <li class="list-inline-item active"><a href="#overview">Overview</a></li>
                                <li class="list-inline-item"><a href="#facilities">Facilities</a></li>
                                <li class="list-inline-item"><a href="#policies">Policies</a></li>
                                <li class="list-inline-item"><a href="#reviews">Reviews</a></li>
                                <li class="list-inline-item"><a href="#location">Location</a></li>
                                <li class="list-inline-item"><a href="#manager">Manager</a></li>
                                <li class="list-inline-item"><a href="#availability">Availability</a></li>
                            </ul>
                        </div>
                        <div class="venue-detail-info-blk">
                            <div class="venue-info-blk detl-font" id="overview">
                                <h5 class="font-ninteen">About this venue</h5>
                                <p class="font-fourteen">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                    tempor incididunt ut labore Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                    tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus
                                    commodo viverra maecenas accumsan lacus vel facilisis. et dolore magna aliqua. Quis ipsum
                                    suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis.
                                </p>
                            </div>
                            <div class="capacity-block">
                                <h3 class="detail-title">Capacity</h3>
                                <div class="detail-blk-list">
                                    <ul class="list-inline">
                                        <li class="list-inline-item"> <i class="fas fa-check"></i> Hall Capacity: <span>Upto 800</span>
                                        </li>
                                        <li class="list-inline-item"> <i class="fas fa-check"></i> Hall Capacity: <span>Upto 800</span>
                                        </li>
                                        <li class="list-inline-item"><i class="fas fa-check"></i> PersonHall Area: <span> 7300 sq.ft
                                            </span>
                                        </li>
                                        <li class="list-inline-item"> <i class="fas fa-check"></i> PersonHall Area: <span>7300
                                                sq.ft</span>
                                        </li>
                                        <li class="list-inline-item"> <i class="fas fa-check"></i> Dinning Area: <span>3400 sq.ft</span>
                                        </li>
                                        <li class="list-inline-item"> <i class="fas fa-check"></i> Dinning Area: <span>3400 sq.ft</span>
                                        </li>
                                        <li class="list-inline-item"> <i class="fas fa-check"></i> Stage Area: <span>140 sq.ft</span></li>
                                        <li class="list-inline-item"> <i class="fas fa-check"></i> Stage Area: <span>140 sq.ft</span></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="capacity-block feature-venue-blk" id="facilities">
                                <h3 class="detail-title">Features of Venue</h3>
                                <div class="detail-blk-list">
                                    <ul class="list-inline">
                                        <li class="list-inline-item"> <i class="fas fa-check"></i> Features of Venue</li>
                                        <li class="list-inline-item"> <i class="fas fa-check"></i> Reception</li>
                                        <li class="list-inline-item"><i class="fas fa-check"></i> Birthday Party</li>
                                        <li class="list-inline-item"> <i class="fas fa-check"></i> Get Together</li>
                                        <li class="list-inline-item"> <i class="fas fa-check"></i> Meeting</li>
                                        <li class="list-inline-item"> <i class="fas fa-check"></i> Conclave</li>
                                        <li class="list-inline-item"> <i class="fas fa-check"></i> Marriage</li>
                                        <li class="list-inline-item"> <i class="fas fa-check"></i> Family Function</li>
                                        <li class="list-inline-item"> <i class="fas fa-check"></i> Social Function</li>
                                        <li class="list-inline-item"> <i class="fas fa-check"></i> Official Function</li>
                                        <li class="list-inline-item"> <i class="fas fa-check"></i> Other</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="capacity-block venue-policy" id="policies">
                                <h3 class="detail-title">Venue Policies</h3>
                                <div class="detail-blk-list">
                                    <ul class="list-inline">
                                        <li class="list-inline-item"> <i class="fas fa-check"></i> This hVenue is serviced under the trade
                                            name of Hall Evergreen as per quality standards of Unlocked
                                        </li>
                                        <li class="list-inline-item"> <i class="fas fa-check"></i> Lorem ipsum dolor sit amet, consectetur
                                            adipiscing elit.
                                        </li>
                                        <li class="list-inline-item"><i class="fas fa-check"></i> Lorem ipsum dolor sit amet, consectetur
                                            adipiscing elit.
                                        </li>
                                        <li class="list-inline-item"> <i class="fas fa-check"></i> Phasellus in arcu et lorem dignissim
                                            gravida.
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="capacity-block map-blk" id="location">
                                <h3 class="detail-title">The local area</h3>
                                <div class="local-map">
                                    <!-- <img src="{{asset('assets/image/map.png')}}" alt="map" class="img-fluid"> -->
                                    <iframe width="100%" height="500" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?q=10.305385,77.923029&hl=es;z=14&amp;output=embed"></iframe>
                                </div>
                            </div>
                            <div class="capacity-block find-spc-blk" id="availability">
                                <h3 class="font-twenty">Can’t find the perfect space?</h3>
                                <div class="row algn-center">
                                    <div class="col-sm-6">
                                        <div class="find-spc-content">
                                            <img src="{{asset('assets/image/detail-user.png')}}" alt="detail-user">
                                            <div class="find-txt">
                                                <h5 class="font-fourteen">JOTEN LARA</h5>
                                                <p class="font-thirteen m-0">Liverpool, London</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="find-btn-blk">
                                            <a href="#" class="find-btn btn"><img src="{{asset('assets/image/help-user.svg')}}" alt="help"> Help me find
                                                space</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-5">
                    <div class="detail-right-blk">
                        <div class="booking-blk">
                            <div class="booking-header">
                                <div class="booking-rate">
                                    <div class="booking-rate-txt">{{$venue->booking_price}} <span class="font-thirteen">{{$venue->booking_price}}</span></div>
                                </div>
                                <div class="booking">
                                    <span class="discount">25% off</span>
                                </div>
                            </div>
                            <div class="bk-time">
                                <p class="font-thirteen m-0">3 day 2 night</p>
                            </div>
                            <div class="booking-calndr">
                                <div class="cal-blk">
                                    <div class="calender font-thirteen">
                                        Thu,25 Mar -Fri, 28 Mar
                                    </div>
                                    <div class="guest">
                                        <select class="selectpicker show-tick">
                                            <option>Hall, 85 Guest</option>
                                            <option>Hall, 85 Guest</option>
                                            <option>Hall, 85 Guest</option>
                                        </select>
                                        <!-- <div class="custom-drop cat-drp">
                                       <a href="javscript:void(0)" class="custom-drop-title">
                                         <span class="font-thirteen">Hall, 85 Guest</span>
                                       </a>
                                       <div class="custom-dropdown categories-drpdown">
                                         <div class="drpdown-item cat-drpdown-item">
                                           <div class="cat-drpdown-content">
                                             <ul class="list-unstyled">
                                               <li><a href="#">Museums</a></li>
                                               <li><a href="#">Town Hall</a></li>
                                               <li><a href="#">Churches</a></li>
                                               <li><a href="#">Gallaries</a></li>
                                             </ul>
                                           </div>
                                         </div>
                                       </div>
                                       </div> -->
                                    </div>
                                </div>
                                <div class="cal-blk cal-savings">
                                    <div class="font-fourteen">
                                        Your Savings
                                    </div>
                                    <div class="font-fourteen">
                                        £62.00
                                    </div>
                                </div>
                                <div class="cal-total">
                                    <div class="total">
                                        <h5 class="font-fourteen">Total</h5>
                                        <p class="font-thirteen">(incl. of all taxes)</p>
                                    </div>
                                    <div class="total-price">
                                        £{{$venue->booking_price}}
                                    </div>
                                </div>
                                <div class="bk-btn">
                                    <a href="#" class="btn book-btn">Continue to Book</a>
                                </div>
                                <div class="cancel-policy">
                                    <p class="font-thirteen m-0">Cancellation Policy</p>
                                    <p class="font-twelve mb-1">Lorem ipsum dolor sit amet, consectetur adipiscing.</p>
                                </div>
                            </div>
                        </div>
                        <div class="booking-reason-blk">
                            <h5 class="font-twenty">5 Reasons to Book
                            </h5>
                            <div class="resn-content">
                                <img src="{{asset('assets/image/loaction.png')}}" alt="location">
                                <div class="reson-txt">
                                    <h6 class="font-fourteen">Location
                                    </h6>
                                    <p class="font-thirteen m-0">Guests rate the Location {{$venue->average_rating}}
                                    </p>
                                </div>
                            </div>
                            <div class="resn-content">
                                <img src="{{asset('assets/image/sleep.png')}}" alt="location">
                                <div class="reson-txt">
                                    <h6 class="font-fourteen">Sleep Quality
                                    </h6>
                                    <p class="font-thirteen m-0">Guests rate the Sleep Quality {{$venue->average_rating}}
                                    </p>
                                </div>
                            </div>
                            <div class="resn-content">
                                <img src="{{asset('assets/image/room.png')}}" alt="location">
                                <div class="reson-txt">
                                    <h6 class="font-fourteen">Rooms
                                    </h6>
                                    <p class="font-thirteen m-0">Guests rate the Rooms {{$venue->average_rating}}
                                    </p>
                                </div>
                            </div>
                            <div class="resn-content">
                                <img src="{{asset('assets/image/service.png')}}" alt="location">
                                <div class="reson-txt">
                                    <h6 class="font-fourteen">Service
                                    </h6>
                                    <p class="font-thirteen m-0">Guests rate the Service {{$venue->average_rating}}
                                    </p>
                                </div>
                            </div>
                            <div class="resn-content">
                                <img src="{{asset('assets/image/value.png')}}" alt="location">
                                <div class="reson-txt">
                                    <h6 class="font-fourteen">Value
                                    </h6>
                                    <p class="font-thirteen m-0">Guests rate the Value {{$venue->average_rating}}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="booking-reason-blk enquiry-block">
                            <h5 class="font-twenty">Quick enquiry
                            </h5>
                            <p>Speak to our events team</p>
                            <form class="enquiry-form">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Name">
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Phone Number">
                                </div>
                                <div class="form-group">
                                    <button class="btn book-btn">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- details-section-end -->
    <section class="detail-venue-section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="detail-venue-title t-center">
                        <h3 class="sub-title" data-aos="zoom-in" data-aos-easing="ease" data-aos-delay="500">Similar venues available in London</h3>
                    </div>
                    <div class="detail-venue-slider venue-sliderbtn">
                        <div class="detail-venue-inner">
                            <div class="card border-0 town-hall-blk">
                                <div class="town-hall-img">
                                    <img src="{{asset('assets/image/town1.png')}}" class="img-fluid" alt="town">
                                </div>
                                <div class="card-body town-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="town-content">
                                                <h5 class="font-seventeen">Rock and Best Villa</h5>
                                                <p class="font-thirteen m-0">Liverpool, London</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr class="filter-border m-0">
                                <div class="town-body town-body-rate">
                                    <div class="town-rate">£ 120.00 <span class="font-fourteen">£ 120.00</span></div>
                                    <a href="#" class="card-link font-twelve">View Details</a>
                                </div>
                            </div>
                        </div>
                        <div class="detail-venue-inner">
                            <div class="card border-0 town-hall-blk">
                                <div class="town-hall-img">
                                    <img src="{{asset('assets/image/town2.png')}}" class="img-fluid" alt="town">
                                </div>
                                <div class="card-body town-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="town-content">
                                                <h5 class="font-seventeen">Rock and Best Villa</h5>
                                                <p class="font-thirteen m-0">Liverpool, London</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr class="filter-border m-0">
                                <div class="town-body town-body-rate">
                                    <div class="town-rate">£ 120.00 <span class="font-fourteen">£ 120.00</span></div>
                                    <a href="#" class="card-link font-twelve">View Details</a>
                                </div>
                            </div>
                        </div>
                        <div class="detail-venue-inner">
                            <div class="card border-0 town-hall-blk">
                                <div class="town-hall-img">
                                    <img src="{{asset('assets/image/town3.png')}}" class="img-fluid" alt="town">
                                </div>
                                <div class="card-body town-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="town-content">
                                                <h5 class="font-seventeen">Rock and Best Villa</h5>
                                                <p class="font-thirteen m-0">Liverpool, London</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr class="filter-border m-0">
                                <div class="town-body town-body-rate">
                                    <div class="town-rate">£ 120.00 <span class="font-fourteen">£ 120.00</span></div>
                                    <a href="#" class="card-link font-twelve">View Details</a>
                                </div>
                            </div>
                        </div>
                        <div class="detail-venue-inner">
                            <div class="card border-0 town-hall-blk">
                                <div class="town-hall-img">
                                    <img src="{{asset('assets/image/town4.png')}}" class="img-fluid" alt="town">
                                </div>
                                <div class="card-body town-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="town-content">
                                                <h5 class="font-seventeen">Rock and Best Villa</h5>
                                                <p class="font-thirteen m-0">Liverpool, London</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr class="filter-border m-0">
                                <div class="town-body town-body-rate">
                                    <div class="town-rate">£ 120.00 <span class="font-fourteen">£ 120.00</span></div>
                                    <a href="#" class="card-link font-twelve">View Details</a>
                                </div>
                            </div>
                        </div>
                        <div class="detail-venue-inner">
                            <div class="card border-0 town-hall-blk">
                                <div class="town-hall-img">
                                    <img src="{{asset('assets/image/town5.png')}}" class="img-fluid" alt="town">
                                </div>
                                <div class="card-body town-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="town-content">
                                                <h5 class="font-seventeen">Rock and Best Villa</h5>
                                                <p class="font-thirteen m-0">Liverpool, London</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr class="filter-border m-0">
                                <div class="town-body town-body-rate">
                                    <div class="town-rate">£ 120.00 <span class="font-fourteen">£ 120.00</span></div>
                                    <a href="#" class="card-link font-twelve">View Details</a>
                                </div>
                            </div>
                        </div>
                        <div class="detail-venue-inner">
                            <div class="card border-0 town-hall-blk">
                                <div class="town-hall-img">
                                    <img src="{{asset('assets/image/town8.png')}}" class="img-fluid" alt="town">
                                </div>
                                <div class="card-body town-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="town-content">
                                                <h5 class="font-seventeen">Rock and Best Villa</h5>
                                                <p class="font-thirteen m-0">Liverpool, London</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr class="filter-border m-0">
                                <div class="town-body town-body-rate">
                                    <div class="town-rate">£ 120.00 <span class="font-fourteen">£ 120.00</span></div>
                                    <a href="#" class="card-link font-twelve">View Details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<!-- <div class="container">
    <div class="row mt-5">
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
               @if($venue->venue_images->count() > 0)
                    @foreach($venue->venue_images as $key => $images)
                        <div class="carousel-item {{$key == 0 ? 'active' : ''}}">
                    <img class="d-block w-100" height="150" src="{{asset('assets/venue/images/'.$images->name)}}" alt="Venue Images">
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
            <iframe width="100%" height="500" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?q=10.305385,77.923029&hl=es;z=14&amp;output=embed"></iframe>
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
    </div> -->
@endsection