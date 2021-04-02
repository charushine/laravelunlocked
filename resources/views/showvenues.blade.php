<div class="row">
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
                        <div class="pull-right"><h6 >${{$venue->booking_price}}</h6></div>
                        <div class="pull-left">
                            @php $ratings =""; $z= 1; $y= 0.5; @endphp

                            @if($venue->rating_reviews->count() > 0 )
                                @php $ratings = ($venue->rating_reviews->sum('rating')) / ($venue->rating_reviews->count()) @endphp               
                            @endif

                            @while ($z <= $ratings)
									<i class="fa fa-star" style="color:green"></i>
                                @php $z++ @endphp

                            @endwhile
                               
                            @if(((float) $ratings + 0.5) == $z)
                                <i class="fa fa-star-half-o" style="color:green"></i>
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
    </div>
   
   
   