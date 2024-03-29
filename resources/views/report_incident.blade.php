@extends('layouts.app')
<style>
    /* input[type="text"],
    ,
    input[type="password"] {
        border-radius: 30px;
        box-shadow: 3px 3px 6px 0px rgba(0, 0, 0, 1), -3px -3px 6px 0px rgba(255, 255, 255, 1);
    } */
   
</style>

@section('content')

<div id="map" style="height:400px; width:100%; display:none;"></div>
<div id="infowindow-content">
    <span id="place-name" class="title"></span><br />
    <strong></strong> <span id="place-id"></span><br />
    <span id="place-address"></span>
  </div>
<input id="map-lat"  value="{{$map->lat ?? ''}}" hidden>
<input id="map-lon"  value="{{$map->lon ?? ''}}" hidden>


<div style="width:1593px; height:1480px; border-radius: 40px;" class="card col-md-10 offset-md-1 mt-5">
   <p style="font-size:40px; margin-left:87px;" class="mt-5"><b>REPORT INCIDENT</b></p>

   <div class="card-body" >
    
<form method="post" action="{{ action('ReportController@store') }}" enctype="multipart/form-data" id="usrform">
        @csrf

       
   
        <div class="col-md-10 offset-md-1 text-md-center" style="margin-bottom: 22px;">
            <div>
            <input class="mb-4" type="file" name="image" accept="image/*" id="image" value="">

            @error('image')
            <span class="invalid-feedback text-center" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            </div>
        </div>
        

        @auth
        <input type="text" id="user_id" name="user_id" value="{{Auth::user()->id}}" hidden>
        @endauth
        @guest
        <div class="form-group row">
            <div class="col-md-10 offset-md-1">
                @auth
                <input style="font-size:16px" id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                    name="name" value="{{Auth::user()->email}}" autocomplete="name" readonly>
                    @endauth
                    @guest
                    <input style="font-size:16px" id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                    name="name" value="{{ old('name') }}" autocomplete="name"  placeholder="Juan Dela Cruz">
                    @endguest
                @error('name')
                <span class="invalid-feedback text-center" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                <label style=" font-size:24px;" for="email"
                    class="col-md-4 offset-md-4  col-form-label ml-1" placeholder="">{{ __('Full Name') }}</label>
            </div>
        </div>
        @endguest

        <div class="form-group row">
            <div class="col-md-10 offset-md-1">
                @auth
                <input style="font-size:16px" id="email" type="text" class="form-control @error('email') is-invalid @enderror"
                    name="email" value="{{Auth::user()->email}}" autocomplete="email" readonly>
                    @endauth
                    @guest
                    <input style="font-size:16px" id="email" type="text" class="form-control @error('email') is-invalid @enderror"
                    name="email" value="{{ old('email') }}" autocomplete="email"  placeholder="JuanDelaCruz@gmail.com">
                    @endguest
                @error('email')
                <span class="invalid-feedback text-center" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                <label style=" font-size:24px;" for="email"
                    class="col-md-4 offset-md-4  col-form-label ml-1" placeholder="">{{ __('Email Address') }}</label>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-10 offset-md-1">
                <input style="font-size:16px" id="mobile_number" type="text" class="form-control @error('mobile_number') is-invalid @enderror"
                    name="mobile_number" value="{{ old('mobile_number') }}" autocomplete="mobile_number"    placeholder="+639121231234">

                @error('mobile_number')
                <span class="invalid-feedback text-center" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                <label style=" font-size:24px;" for="mobile_number"
                    class="col-md-4 offset-md-4  col-form-label ml-1" placeholder="">{{ __('Mobile Number') }}</label>
            </div>
        </div>


        <div class="form-group row">
            <div class="col-md-10 offset-md-1">
                <input style="font-size:16px" id="address" type="text" class="form-control @error('address') is-invalid @enderror"
                    name="address" value="{{ old('address') }}" autocomplete="address"  placeholder="Rizal Park">

                @error('address')
                <span class="invalid-feedback text-center" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                <label style=" font-size:24px;" for="address"
                    class="col-md-4 offset-md-4  col-form-label ml-1">{{ __('Address') }}</label>
            </div>
        </div>

        <input type="hidden" id="address_lat" name="address_lat" value="">
        <input type="hidden" id="address_lng" name="address_lng"  value="">

        <div class="form-group row">
            <div class="col-md-10 offset-md-1">
          
            <select name="report_type" class="form-control" id="exampleFormControlSelect1" form="usrform" value="">
              <option value="Abusive Owner">Abusive Owner</option>
              <option value="Abuse in Street" selected>Abuse in Street</option>
              <option value="Animal Napping">Animal Napping</option>
              <option value="Animal Accident">Animal Accident</option>
              <option value="Others">Others - Please Specify below</option>
            </select>
            <label for="exampleFormControlSelect1" 
            class="col-md-4 offset-md-4 col-form-lable ml-1 mt-2" 
            style=" font-size:24px;">
                Report Type
            </label>
        </div>
    </div>



        <div class="form-group row">

            <div class="col-md-10 offset-md-1">
                <label style=" font-size:24px;"for="description"
                class="col-md-4 offset-md-4  col-form-label ml-1 mb-3">{{ __('Report Description: ') }}</label>
                <textarea  rows="4" style="font-size:16px" id="description" type="text" class="form-control  @error('description') is-invalid @enderror"
                    name="description" value="{{ old('description') }}" autocomplete="description" form="usrform" ></textarea>

                    @error('description')
                    <span class="invalid-feedback text-center" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                   
            </div>
           
        </div>

        <div class="col-md-10 offset-md-1 ">
            <div class="alert alert-warning" role="alert">
                <p><strong>Note:</strong> Upon submitting a report, all reports will be subjected to evaluation. 
                Once validated, the administrator will send a notice containing the action for the report.<br><br>
            Please Enter an address within our scope (Only in Philippines) for now.</p>
              </div>
        </div>

        <div class="form-group row">
            <div class="col-md-6 offset-md-4">
                <div class="g-recaptcha" name="g-recaptcha" data-sitekey="6LfQJPkZAAAAABIM-1Bom813BLOTg_dcKLVytD5B" ></div>
            </div>
        </div>

        <div class="form-group row ml-2 text-center">
            <div class="col-md-2 offset-md-5">
                <button type="submit" class="btn btn-primary " style="font-size:20px; color:black;">
                    {{ __('Submit Report') }}
                </button>
            </div>
            <div class="col-md-2 offset-md-5 mt-2 text-center">
                <a href="/" class="btn btn-secondary" style="color:white; font-size:20px;">
                  Cancel
                </a>
            </div>
        </div>
    </form>
</div>
</div>



@endsection

<script>
    let map;
    var options;
    var infoWindow;
    var userLat;
    var userLng;
    var start;
    var endLat;
    var endLng;
    var autocomplete;

window.addEventListener('load', (event) => {

    
//    var result = confirm('Do you like to use current location for this process?');
//    if(result){
//     userLat = document.getElementById('map-lat').getAttribute('value');
//     userLng = document.getElementById('map-lon').getAttribute('value');
   
//     alert(userLat+" "+userLng);    
//     
//    }
// document.getElementById('map').style.display = "block";
    initMap();
  
});
    
   
 //need to let the user know that we will use his/her location to pin point.

function initMap() {
    const address_input = document.getElementById('address');

    var directionDisplay = new google.maps.DirectionsRenderer();
    var directionService = new google.maps.DirectionsService();

    console.log(userLat+" "+userLng);
    options = {
        zoom: 13,
        // center: {lat:14.6009,lng:120.9881}
         center: {lat:14.5654,lng:120.9979}
        // center:{lat:parseFloat(userLat),lng:parseFloat(userLng)},
    }

    map = new google.maps.Map(document.getElementById("map"),options);
    
    directionDisplay.setMap(map);

  const input = document.getElementById("address_input");
  const autocomplete = new google.maps.places.Autocomplete(address_input);



  autocomplete.bindTo("bounds", map); // Specify just the place data fields that you need.

  autocomplete.setFields(["place_id", "geometry", "name"]);
  map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
  const infowindow = new google.maps.InfoWindow();
  const infowindowContent = document.getElementById("infowindow-content");
  infowindow.setContent(infowindowContent);
  const marker = new google.maps.Marker({
    map: map,
  });



//setting marker
   
//   marker.addListener("click", () => {
//     infowindow.open(map, marker);
//   });
  autocomplete.addListener("place_changed", () => {
    infowindow.close();
    const place = autocomplete.getPlace();

    if (!place.geometry) {
      return;
    }

    if (place.geometry.viewport) {
      map.fitBounds(place.geometry.viewport);
    } else {
      map.setCenter(place.geometry.location);
      map.setZoom(17);
    } // Set the position of the marker using the place ID and location.

//setting marker
 // marker.setPlace({
    //   placeId: place.place_id,
    //   location: place.geometry.location,
    // });
    marker.setVisible(true);
    infowindowContent.children.namedItem("place-name").textContent = place.name;
    infowindowContent.children.namedItem("place-id").textContent =
      place.place_id;
    infowindowContent.children.namedItem("place-address").textContent =
      place.formatted_address;
    infowindow.open(map, marker);


    start = new google.maps.LatLng(14.6009,120.9881);
    // user = new google.maps.LatLng(parseFloat(userLat),parseFloat(userLng));
  
    endLat = autocomplete.getPlace().geometry.location.lat();
    endLng = autocomplete.getPlace().geometry.location.lng();
    
    
    

    console.log(endLat+"\n"+endLng);
    var request = {
        	origin: start,
            destination: place.geometry.location,
            travelMode: 'DRIVING',
    };
    directionService.route(request, function(result, status){
        if(status=="OK"){
            directionDisplay.setDirections(result);
            document.getElementById('map').style.display = "block";
            document.getElementById("address_lat").value = endLat;
            document.getElementById("address_lng").value = endLng; 
        }else{
            directionDisplay.setMap(null);
            directionDisplay.setDirections(null);
            alert('Could not display directions due to '+ status+ "\n Please refresh the page and try again. thank you!");
        }
    });
  });






//     //Array of markers
//     var markers = [{
//         // coords:{lat:14.6009,lng:120.9881},
//         // iconImage: '',
//         // content:'<h3>PSPCA</h3>',
//         //2044 Recto Ave, Quiapo, Manila, 1008 Metro Manila, Philippines
//     },
//     {
//         // coords:{lat:14.5654,lng:120.9979},
//         // coords:{lat:14.5916,lng:121.0147},
//         // coords:{lat:parseFloat(userLat),lng:parseFloat(userLng)},
//         // iconImage: '',
//         // content:'<h3>ME</h3>',
//     }];

//     //loop through markers
//     for(var i=0; i<markers.length;i++){
//         addMarker(markers[i]);
//     }

   

//     //Add Marker
//     function addMarker(props){
//     if(props.coords){

//     var marker = new google.maps.Marker({
//     position:props.coords,
//     map:map
//     });
//     }else{
//         console.log("Invalid Coordinates");
//     }
//     //check for customIcon
//     if(props.iconImage){
//         //set icon image
//         marker.setIcon(props.iconImage);
//     }

//     //check content
//     if(props.content){
//     infoWindow = new google.maps.InfoWindow({
//         content:props.content
//     });

//     marker.addListener('click', function(){
//         infoWindow.open(map,marker);
//     });
//     }
// }

  




   
} 
</script>

