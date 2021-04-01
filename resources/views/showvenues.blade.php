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
                        <!-- <h2 class="card-title">Card One</h2> -->
                        <!-- <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem magni quas ex numquam, -->
                        <!-- maxime minus quam molestias corporis quod, ea minima accusamus.</p> -->
                    </div>
                    <div class="card-footer">
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
   
   