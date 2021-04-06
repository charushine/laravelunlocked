@extends('layouts.app')

@section('content')
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
                <input type="text" class="form-control ml-1" placeholder="Start/End Date" id="daterange" name="daterange">
                <input type="text" class="form-control ml-1" placeholder="Price" id="price" name="price">
                <div class="input-group-append">
                    <button class="btn btn-info" type="button" id="searchVenue">
                        <i class="fa fa-search"></i>
                    </button>
                </div>
            </div>
            </form>
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
	</div>

    <!-- Content Row -->
    <div class="displayVenues">
        <img class="img-fluid rounded mb-4 mb-lg-0" src="{{asset('frontend/images/loader1.gif')}}" alt="">
    </div>
    <!-- <button class="btn btn-info mb-4" type="button" id="loadmore">
        Load More..
    </button> -->
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

  jQuery(document).on('click', 'input[name="rating"]', function() {      
    jQuery('input[name="rating"]').not(this).prop('checked', false);      
});

    jQuery(document).on('click', '#searchVenue', function () {
        var rating = jQuery("input[name='rating']:checked").attr("data-value");
        var searchKeyword = jQuery("#searchKeyword").val();
        var daterange = jQuery("#daterange").val();
        var price = jQuery("#price").val();
        
        jQuery.ajax({
            url: baseurl+ "/show_venue/"+searchKeyword,
            data:{daterange:daterange,price:price,rating:rating},
            success: function(data) {
            jQuery(".displayVenues").html(data);
        },  
        error: function (jqXHR, exception) {
        var msg = '';
            msg = 'Uncaught Error.\n' + jqXHR.responseText;
                console.info(msg);
            }
        });
    });
      var page = 1
      
    jQuery(document).on('click', '#loadmore', function () {   
        
        page = page+1;
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
