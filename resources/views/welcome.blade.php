@extends('layouts.app')

@section('content')
<style>
body { background: aliceblue; }

.gtco-testimonials {
  position: relative;
  margin-top: 30px;
 
}

.gtco-testimonials h2 {
  font-size: 30px;
  text-align: center;
  color: #333333;
  margin-bottom: 50px;
}
.gtco-testimonials .owl-stage-outer {
  padding: 30px 0;
}
.gtco-testimonials .owl-nav {
  display: none;
}
.gtco-testimonials .owl-dots {
  text-align: center;
}
.gtco-testimonials .owl-dots span {
  position: relative;
  height: 10px;
  width: 10px;
  border-radius: 50%;
  display: block;
  background: #fff;
  border: 2px solid #01b0f8;
  margin: 0 5px;
}
.gtco-testimonials .owl-dots .active {
  box-shadow: none;
}
.gtco-testimonials .owl-dots .active span {
  background: #01b0f8;
  box-shadow: none;
  height: 12px;
  width: 12px;
  margin-bottom: -1px;
}
.gtco-testimonials .card {
  background: #fff;
  box-shadow: 0 8px 30px -7px #c9dff0;
  margin: 0 20px;
  padding: 0 10px;
  border-radius: 20px;
  border: 0;
}
.gtco-testimonials .card .card-img-top {
  max-width: 100px;
  border-radius: 50%;
  margin: 15px auto 0;
  box-shadow: 0 8px 20px -4px #95abbb;
  width: 100px;
  height: 100px;
}
.gtco-testimonials .card h5 {
  color: #01b0f8;
  font-size: 21px;
  line-height: 1.3;
}
.gtco-testimonials .card h5 span {
  font-size: 18px;
  color: #666666;
}
.gtco-testimonials .card p {
  font-size: 18px;
  color: #555;
  padding-bottom: 15px;
}
.gtco-testimonials .active {
  opacity: 0.5;
  transition: all 0.3s;
}
.gtco-testimonials .center {
  opacity: 1;
}
.gtco-testimonials .center h5 {
  font-size: 24px;
}
.gtco-testimonials .center h5 span {
  font-size: 20px;
}
.gtco-testimonials .center .card-img-top {
  max-width: 100%;
  height: 120px;
  width: 120px;
}
.owl-carousel .owl-nav button.owl-next, .owl-carousel .owl-nav button.owl-prev, .owl-carousel button.owl-dot {
  outline: 0;
}

</style>
<script>
  function venue_search(){
        var amenity = jQuery("input[name='amenity[]']:checked")
              .map(function(){return $(this).val();}).get();
        var rating = jQuery("input[name='rating']:checked").attr("data-value");
        var searchKeyword = jQuery("#searchKeyword").val();
        var daterange = jQuery("#daterange").val();
        var price = jQuery("#price").val();
        var sorting = jQuery("#sorting").val();
        var no_of_people = jQuery("#no_of_people").val();
        jQuery.ajax({
            url: baseurl+ "/show_venue/"+searchKeyword,
            data:{daterange:daterange,price:price,rating:rating,amenity:amenity,sorting:sorting,no_of_people:no_of_people},
            success: function(data) {
            jQuery(".displayVenues").html(data);
        },  
        error: function (jqXHR, exception) {
        var msg = '';
            msg = 'Uncaught Error.\n' + jqXHR.responseText;
                console.info(msg);
            }
        });
    }
</script>
<div class="container">
    <!-- Heading Row -->
    <div class="row align-items-center my-5">
        <div class="col-lg-7">
            <img class="img-fluid rounded mb-4 mb-lg-0" src="{{asset('frontend/images/download2.png')}}" alt="">
        </div>
      <!-- /.col-lg-8 -->
        <div class="col-lg-5">
            <h1 class="font-weight-light">Popular Venue</h1>
            <p>This is a template that is great for small businesses. It doesn't have too much fancy flare to it, but it
            makes a great use of the standard Bootstrap core components. Feel free to use this template for any project
            you want!</p>
            <a class="btn btn-primary" href="#">Call to Action!</a>
        </div>
      <!-- /.col-md-4 -->
    </div>
    <!-- /.row -->

    <!-- Call to Action Well -->
    <div class="card text-white bg-secondary my-5 py-4 text-center">
        <div class="card-body">
         <form id="venueSearch"> 
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Search Venue" id="searchKeyword" name="searchKeyword">
                <input type="text" autocomplete="off" class="form-control ml-1" placeholder="Start/End Date" id="daterange" name="daterange">
                <input type="number" autocomplete="off" class="form-control ml-1" placeholder="Price" id="price" name="price">
                <input type="number" autocomplete="off" class="form-control ml-1" placeholder="No. of People" id="no_of_people" name="no_of_people">
                <div class="input-group-append">
                    <button class="btn btn-info" type="button" id="searchVenue">
                        <i class="fa fa-search"></i>
                    </button>
                </div>
            </div>
            </form>
        </div>
    </div>
    <!-- Sorting -->

    <div class="row">
        <div class="col-md-4">
            <div class="form-group ">
            <label>Sort By<span></span></label>
                <div class="col-sm-10">
                    <select class="form-control" name="sorting" onchange="venue_search();" id="sorting">
                    <option value="">Select Order</option>
                    <option value="price-desc">Price- High to Low</option>
                    <option value="price-asc">Price- Low to High</option>
                    <option value="rating-desc">Rating- Low to High</option>                        
                    <option value="price-asc">Rating- High to Low</option>
                    </select>                             
                </div> 
            </div>
        </div>
    </div>
    <div class="row">				
        <div class="col-md-4">
            <div class="form-group ">
            <label>Rating<span></span></label>
                <div class="col-sm-10">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="rating" data-value="5">
                        <i class="fa fa-star" style="color:green"></i><i class="fa fa-star" style="color:green"></i><i class="fa fa-star" style="color:green"></i><i class="fa fa-star" style="color:green"></i><i class="fa fa-star" style="color:green"></i>
                    </div>
                </div> 
                <div class="col-sm-10">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="rating" data-value="4">
                        <i class="fa fa-star" style="color:green"></i><i class="fa fa-star" style="color:green"></i><i class="fa fa-star" style="color:green"></i><i class="fa fa-star" style="color:green"></i>
                    </div>
                </div> 
                 <div class="col-sm-10">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="rating" data-value="3">
                        <i class="fa fa-star" style="color:green"></i><i class="fa fa-star" style="color:green"></i><i class="fa fa-star" style="color:green"></i>
                    </div>
                </div>   
                <div class="col-sm-10">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="rating" data-value="2">
                        <i class="fa fa-star" style="color:green"></i><i class="fa fa-star" style="color:green"></i>
                    </div>
                </div>
                <div class="col-sm-10">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="rating" data-value="1">
                        <i class="fa fa-star" style="color:green"></i>
                    </div>
                </div> 
            </div>
        </div>
         <div class="col-md-4">
            <div class="form-group ">
            <label>Building Type<span></span></label>
                <div class="col-sm-10">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="building_type" data-value="hotel"  value="dfgdf">
                        <label class="form-check-label" for="">
                           Hotel                      
                        </label>
                    </div>
                </div> 
                <div class="col-sm-10">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="building_type" data-value="guestroom" value="dfdfgd">
                        <label class="form-check-label" for="">
                           Guest Room                          
                        </label>
                    </div>
                </div>    
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group ">
            <label>Amenities<span></span></label>
                <div class="col-sm-10">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="amenity[]" data-value="1"  value="1">
                        <label class="form-check-label" for="">
                           Air Conditioner                      
                        </label>
                    </div>
                </div> 
                <div class="col-sm-10">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="amenity[]" data-value="2" value="2">
                        <label class="form-check-label" for="">
                           Parks                          
                        </label>
                    </div>
                </div>  
                <div class="col-sm-10">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="amenity[]" data-value="3" value="3">
                        <label class="form-check-label" for="">
                           Community Parks                          
                        </label>
                    </div>
                </div>  
            </div>
        </div>						
	</div>

    <!-- Content Row -->
    <div class="displayVenues">
        <img class="img-fluid rounded mb-4 mb-lg-0" src="{{asset('frontend/images/loader1.gif')}}" alt="">
    </div>
    <!-- <button class="btn btn-info mb-4" type="button" id="loadmore">
        Load More..
    </button> -->
     
    
    <h2>Testimonials</h2>
    <div class="gtco-testimonials row mb-4">
        @if($testimonials->count() > 0)
        @foreach($testimonials as $testimonial)
        <div class="owl-carousel owl-carousel1 owl-theme col-md-4">
            <div class="card text-center">
            @if($testimonial->image !="" && $testimonial->image != null)
                <img class="card-img-top" src="{{asset('assets/testimonial/images/'.$testimonial->image)}}" alt="">
            @else
                <img class="card-img-top" src="{{asset('frontend/images/dummyprofile.jpg')}}" alt="">
            @endif
                <div class="card-body">
                    <h5>{{$testimonial->name}} <br />
                    <span>{{$testimonial->user_post}} </span></h5>
                    <p class="card-text"> {{$testimonial->message}} </p>
                </div>
            </div>                    
        </div>
        @endforeach
        @else
            <div>
                No Record found
            </div>
        @endif
    
    </div>
   <div class="row mb-4">
       <iframe width="100%" height="510" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src = "https://maps.google.com/maps?q=10.305385,77.923029&hl=es;z=14&amp;output=embed">
       </iframe>
    </div>
</div>
@endsection
@section('scripts')

<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

<script>

jQuery(document).ready(function() {

//  jQuery(document).on('click', '#searchVenue', function () {
//     var datastring = jQuery("#venueSearch").serialize();
//     jQuery.ajax({
//             url: baseurl+ "/show_venue/",
//             data:datastring,
//             success: function(data) {
//                 jQuery(".displayVenues").html(data);
//         },  
//         error: function (jqXHR, exception) {
//         var msg = '';
//             msg = 'Uncaught Error.\n' + jqXHR.responseText;
//                 console.info(msg);
//             }
//         });
//     });

  
    jQuery.ajax({
        url: baseurl+ "/show_venue",
        success: function(data) {
            jQuery(".displayVenues").html(data);
        },  
        error: function (jqXHR, exception) {
        var msg = '';
            msg = 'Uncaught Error.\n' + jqXHR.responseText;
                console.info(msg);
        }
    });

    //add checked class on checked rating  && filter venues
    jQuery(document).on('click', 'input[name="rating"]', function() {      
        jQuery('input[name="rating"]').not(this).prop('checked', false);      
        venue_search()
    });

    jQuery(document).on('click', 'input[name="amenity[]"]', function() {  
        venue_search()
    });

    //add checked class to checked amenities
    // jQuery(document).on('click', 'input[name="amenity"]', function() {      
    //     jQuery('input[name="amenity"]').prop('checked', false);      
    // });

    //Ajax request to filter data
    jQuery(document).on('click', '#searchVenue', function () {

        venue_search();
    });


    //Read more functionality
    var page = 1
      
    jQuery(document).on('click', '#loadmore', function () {   
        page = page + 1;
        var searchKeyword = jQuery("#searchKeyword").val();
        jQuery("#loadmore").html('Load More..<i class="fa fa-spinner fa-spin"></i>');
        jQuery.ajax({
            url: baseurl+ "/show_venue/"+searchKeyword,
            data:{page : page},
            success: function(data) {
            jQuery("#loadmore").html('Load More..');
            jQuery(".displayVenues").html(data);
        },  
        error: function (jqXHR, exception) {
        var msg = '';
            msg = 'Uncaught Error.\n' + jqXHR.responseText;
                console.info(msg);
            }
        });
    });

    //daterange filter
    jQuery("#daterange").daterangepicker({
		format: 'YYYY-MM-DD',
		autoclose:true,
		autoUpdateInput: false,
		locale: {
			cancelLabel: 'Clear'
		}
	});

	jQuery('#daterange').on('apply.daterangepicker', function(ev, picker) {
		jQuery(this).val(picker.startDate.format('YYYY-MM-DD') + ' / ' + picker.endDate.format('YYYY-MM-DD'));
	});
	jQuery('#daterange').on('cancel.daterangepicker', function(ev, picker) {
		jQuery(this).val('');
	});   
});

</script>
@stop
