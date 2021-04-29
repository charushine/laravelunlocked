@extends('layouts.app')

@section('content')
<main class="wrapper">
    <!-- banner-section-start -->
    <section class="vanue-list-banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-10">
                    <div class="banner-content">
                        <h1 class="title" data-aos="zoom-in" data-aos-delay="300">
                            Find and transform these cultural spaces
                        </h1>
                    </div>
                    <div class="banner-search-bar">
                        <p class="search-txt" data-aos="fade-up" data-aos-easing="ease" data-aos-delay="400">Think outside the box for your next meeting or conference and host it in one of our fantastic spaces
                            please do the changes now..
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- banner-section-end -->
    <div class="breadcrumb-bar">
        <div class="container">
            <div class="row algn-center">
                <div class="col-md-6">
                    <div class="card-block">
                        <ul class="breadcrumb primary-color m-0 bg-transparent px-0">
                            <li class="breadcrumb-item"><a class="white-text" href="#">Home</a></li>
                            <li class="breadcrumb-item"><a class="white-text" href="#">Town Halls</a></li>
                            <li class="breadcrumb-item active">Marketing Venue</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="breadcrumbar-txt">
                        <p class="font-thirteen m-0">
                            Showing 24170 results as per your search
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- filter-section-start -->
    <section class="filtersection bg-grey-color">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-4">
                    <div class="filter-block">
                        <h5 class="filter-heading font-twenty">Apply Filters </h5>
                        <div class="filter-list">
                            <div class="filter-content">
                                <div class="filter-title">
                                    <h6 class="font-seventeen m-0">Venue Type</h6>
                                </div>
                                <div class="filter-chekboxes">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheckBox1">
                                        <label class="custom-control-label" for="customCheckBox1"> Museums</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheckBox2">
                                        <label class="custom-control-label" for="customCheckBox2">Town Halls</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheckBox3">
                                        <label class="custom-control-label" for="customCheckBox3">Churches</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheckBox4">
                                        <label class="custom-control-label" for="customCheckBox4">Galleries</label>
                                    </div>
                                </div>
                            </div>
                            <hr class="filter-border m-0">
                            <div class="filter-content">
                                <div class="filter-title">
                                    <h6 class="font-seventeen m-0">Locality (0)</h6>
                                    <a href="#" class="font-fourteen anchoronover">Clear</a>
                                    <div class="form-group has-search">
                                        <span class="fa fa-search form-control-feedback"></span>
                                        <input type="text" class="form-control" placeholder="Search Location">
                                    </div>
                                </div>
                                <div class="filter-chekboxes">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheckBox5">
                                        <label class="custom-control-label" for="customCheckBox5"> Any</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheckBox6">
                                        <label class="custom-control-label" for="customCheckBox6">Central london</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheckBox7">
                                        <label class="custom-control-label" for="customCheckBox7">Hackney</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheckBox8">
                                        <label class="custom-control-label" for="customCheckBox8">Islington</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheckBox9">
                                        <label class="custom-control-label" for="customCheckBox9">Lewisham</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheckBox10">
                                        <label class="custom-control-label" for="customCheckBox10">Southwark</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheckBox11">
                                        <label class="custom-control-label" for="customCheckBox11">Tower Hamlets</label>
                                    </div>
                                    <div class="custom-checkbox">
                                        <a href="#" class="show-more anchoronover"><i class="fa fa-plus"></i>Show More..</a>
                                    </div>
                                </div>
                            </div>
                            <hr class="filter-border m-0">
                            <div class="filter-content">
                                <div class="filter-title">
                                    <h6 class="font-seventeen m-0">Maximum Capacity</h6>
                                    <a href="#" class="font-fourteen anchoronover">Clear</a>
                                </div>
                                <div class="filter-chekboxes">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheckBox12">
                                        <label class="custom-control-label" for="customCheckBox12"> 0 - 99 </label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheckBox13">
                                        <label class="custom-control-label" for="customCheckBox13">100 - 199</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheckBox14">
                                        <label class="custom-control-label" for="customCheckBox14">200 - 299</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheckBox15">
                                        <label class="custom-control-label" for="customCheckBox15">300 - 399</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheckBox16">
                                        <label class="custom-control-label" for="customCheckBox16">400 - 499</label>
                                    </div>
                                </div>
                            </div>
                            <hr class="filter-border m-0">
                            <div class="filter-content">
                                <div class="range-slider">
                                    <div class="filter-title">
                                        <h6 class="font-seventeen">Price</h6>
                                    </div>
                                    <div class="slider-box">
                                        <div id="price-range" class="slider"></div>
                                    </div>
                                    <div class="slider-price">
                                        <label for="priceRange">Price:</label>
                                        <input type="text" id="priceRange" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-9 col-lg-8">
                    <div class="filter-right-block">
                        <h5 class="filter-heading font-twenty">Venue Town Halls in London </h5>
                        <div class="row">
                            @if(count($venues) > 0)

                            @foreach($venues as $venue)
                            <div class="col-xl-4 col-sm-6" data-aos="fade-up" data-aos-easing="ease" data-aos-delay="300">
                                <div class="card border-0 town-hall-blk">
                                    <a href="{{route('venuedetail',[$venue->id])}}">
                                        <div class="town-hall-img">
                                            @if(isset($venue->venue_image))
                                            <img src="{{asset('assets/venue/images/'.$venue->venue_image)}}" class="img-fluid" alt="town">
                                            @else
                                            <img src="{{asset('frontend/images/download.png')}}">
                                            @endif

                                        </div>
                                    </a>
                                    <div class="card-body town-body">
                                        <div class="row">
                                            <div class="col-7">
                                                <div class="town-content">
                                                    <h5 class="font-seventeen">{{$venue->name}}</h5>
                                                    <p class="font-thirteen m-0">{{$venue->location}}</p>
                                                </div>
                                            </div>
                                            <div class="col-5">
                                                <div class="town-ranking">
                                                    <span class="town-rating font-thirteen"><i class="fa fa-star"></i> {{$venue->average_rating}}</span>
                                                    <div class="town-review">(15 Reviews)</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="filter-border m-0">
                                    <div class="town-body town-body-rate">
                                        <div class="town-rate">£ {{$venue->booking_price}}<span class="font-fourteen">£{{$venue->booking_price}}</span></div>
                                        <a href="#" class="card-link font-twelve">View Details</a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @else
                            <div class="col-xl-4 col-sm-6" data-aos="fade-up" data-aos-easing="ease" data-aos-delay="300">
                                <h1>No record Found</h1>
                            </div>
                            @endif
                        </div>
                        <!-- <div class="row">
                            <div class="col-12">
                                <div class="pagination-blk">
                                    <ul class="pagination">
                                        <li class="disabled"><a href="#"><i class="fas fa-angle-left"></i></a></li>
                                        <li class="active"><a href="#">1 <span class="sr-only">(current)</span></a></li>
                                        <li><a href="#">2</a></li>
                                        <li><a href="#">3</a></li>
                                        <li><a href="#">4</a></li>
                                        <li><a href="#">5</a></li>
                                        <li><a href="#">6 <span class="pagination-dots">...</span></a></li>
                                        <li><a href="#"><i class="fas fa-angle-right"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- filter-section-start -->
    <!-- vanue-section-start -->
    <section class="venue-section top-event-vanue bg-grey-color">
        <div class="container custom-container">
            <div class="row">
                <div class="col-12">
                    <div class="venue-heading fndvenue-title t-center">
                        <h2 class="sub-title" data-aos="zoom-in" data-aos-easing="ease" data-aos-delay="400">Top event venues available in London</h2>
                        <p data-aos="fade-up" data-aos-easing="ease" data-aos-delay="500">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. </p>
                    </div>
                    <div class="venues-block venue-list-slider venue-sliderbtn">
                        <div class="venue-slider-inner">
                            <div class="venue-content full-img">
                                <img src="{{asset('assets/image/venue-item1.png')}}" alt="venue-img">
                                <div class="venue-img-txt">
                                    <h5 class="small-title text-center">Wedding</h5>
                                    <p class="font-fourteen">Liverpool, London</p>
                                </div>
                            </div>
                        </div>
                        <div class="venue-slider-inner">
                            <div class="venue-content full-img">
                                <img src="{{asset('assets/image/venue-item2.png')}}" alt="venue-img">
                                <div class="venue-img-txt">
                                    <h5 class="small-title text-center">Night Party</h5>
                                    <p class="font-fourteen">Liverpool, London</p>
                                </div>
                            </div>
                        </div>
                        <div class="venue-slider-inner">
                            <div class="venue-content full-img">
                                <img src="{{asset('assets/image/venue-item3.png')}}" alt="venue-img">
                                <div class="venue-img-txt">
                                    <h5 class="small-title text-center">Meeting Hall</h5>
                                    <p class="font-fourteen">Liverpool, London</p>
                                </div>
                            </div>
                        </div>
                        <div class="venue-slider-inner">
                            <div class="venue-content full-img">
                                <img src="{{asset('assets/image/venue-item4.png')}}" alt="venue-img">
                                <div class="venue-img-txt">
                                    <h5 class="small-title text-center">Birthday Dinner</h5>
                                    <p class="font-fourteen">Liverpool, London</p>
                                </div>
                            </div>
                        </div>
                        <div class="venue-slider-inner">
                            <div class="venue-content full-img">
                                <img src="{{asset('assets/image/venue-item5.png')}}" alt="venue-img">
                                <div class="venue-img-txt">
                                    <h5 class="small-title text-center">Dance Studio</h5>
                                    <p class="font-fourteen">Liverpool, London</p>
                                </div>
                            </div>
                        </div>
                        <div class="venue-slider-inner">
                            <div class="venue-content full-img">
                                <img src="{{asset('assets/image/venue-item1.png')}}" alt="venue-img">
                                <div class="venue-img-txt">
                                    <h5 class="small-title text-center">Wedding</h5>
                                    <p class="font-fourteen">Liverpool, London</p>
                                </div>
                            </div>
                        </div>
                        <div class="venue-slider-inner">
                            <div class="venue-content full-img">
                                <img src="{{asset('assets/image/venue-item2.png')}}" alt="venue-img">
                                <div class="venue-img-txt">
                                    <h5 class="small-title text-center">Night Party</h5>
                                    <p class="font-fourteen">Liverpool, London</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- vanue-section-end -->
</main>

<!-- <div class="row">
    @if($venues->count() >0)
    @foreach($venues as $venue)
    <div class="col-md-4 mb-5">
        <div class="card h-100">
            <div class="card-body">
                <p><strong>{{$venue->name}}</strong></p>
                                                        @if(isset($venue->venue_images->name) && $venue->venue_images->name != "")
                                                        <img width="150" height="150" src="{{asset('assets/venue/images/'.$venue->venue_images->name)}}">
                                                        @else
                                                        <img src="{{asset('frontend/images/download.png')}}">
                                                        @endif
                                                </div>
                                                <div class="card-footer">
                                                    <div class="pull-right">
                                                        <h6>${{$venue->booking_price}}</h6>
                                                    </div>
                                                    <div class="pull-left">

                                                        @php $ratings =""; $z= 1; $y= 0.5; @endphp

                                                        @if($venue->average_rating > 0 )
                                                        @php $ratings = $venue->average_rating; @endphp

                                                        @while ($z <= $ratings) <i class="fa fa-star" style="color:green"></i>
                                                            @php $z++ @endphp
                                                            @endwhile

                                                            @if(((float) $ratings + 0.5) == $z)
                                                            <i class="fa fa-star-half-o" style="color:green"></i>
                                                            @endif

                                                            @endif
                                                    </div>&nbsp;&nbsp;
                                                    <a href="{{route('venuedetail',[$venue->id])}}" class="btn btn-primary btn-sm">More Info</a>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                        @else
                                        <div class="col-md-4 mb-5 ">
                                            <p>No record found</p>
                                        </div>
                                        @endif
                                    </div> -->
@endsection