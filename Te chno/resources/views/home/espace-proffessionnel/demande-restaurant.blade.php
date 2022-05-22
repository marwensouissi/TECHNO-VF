


@extends('home.master')
@section('content')

@section('title', 'Demande livreur')


<div class="hero_single version_2" style="background: #000000  center center no-repeat;height:400px;" >

	<div class="opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.6)">
		
			<div class="row justify-content-center">
				<div class="col-xl-9 col-lg-10 col-md-8">
					<h1>Demande De Vérification</h1>
					<p>Restaurant</p>
					<div class="row g-0 custom-search-input">
						<div class="col-lg-4">
							
						</div>
						<div class="col-lg-6">
							<div class="form-group">
								<input class="form-control no_border_r" type="text"
									placeholder="Address, neighborhood...">
								<i class="icon_pin_alt"></i>
							</div>
						</div>
						<div class="col-lg-2">
							<input type="submit" value="Search">
						</div>
					</div>
					<!-- /row -->
					</form>
				</div>
			</div>
			<!-- /row -->
		</div>
	</div>
</div>
<div class="container margin_30_40" style="transform: none;">			
	<div class="row" style="transform: none;">
		<aside class="col-lg-12" id="sidebar_fixed" style="position: relative; overflow: visible; box-sizing: border-box; min-height: 1079px;">
			
            <form method="post" enctype="multipart/form-data" >
                @csrf
                <label for="nom" class="form-label">Nom</label>
                <input type="text" name="nom" id="nom" class="form-control" />


                <label  class="form-label">Numéro de Téléphone</label>
                <input type="text" name="numéro_tel"  class="form-control" />

                
                <label  class="form-label">Adresse</label>
                <input type="text" name="adresse"  class="form-control" />

                
                
                <label  class="form-label">Statut</label>
                <input type="text" name="statut"  class="form-control"   />

                <label  class="form-label">image</label>
                <input type="file" name="image"  class="form-control"  />

                
                
<div class="mapform">
<div class="row">
        <div>
        <label  class="form-label">Lat</label>

        <input type="text" class="form-control" placeholder="lat" name="lat" id="lat" style="width:100%">
  

        <label  class="form-label">Lng</label>

        <input type="text" class="form-control" placeholder="lng" name="lng" id="lng" style="width:100%">
    </div>
</div>

<div id="map" style="height:400px; width: 100%;" class="my-3"></div>

<script>
    let map;
    function initMap() {
        map = new google.maps.Map(document.getElementById("map"), {
            center: { lat: 34.75599910503775, lng: 10.781388089414689 },
            zoom: 8,
            scrollwheel: true,
        });

        const uluru = { lat: 34.75599910503775, lng: 10.781388089414689 };
        let marker = new google.maps.Marker({
            position: uluru,
            map: map,
            draggable: true
        });

        google.maps.event.addListener(marker,'position_changed',
            function (){
                let lat = marker.position.lat()
                let lng = marker.position.lng()
                $('#lat').val(lat)
                $('#lng').val(lng)
            })

        google.maps.event.addListener(map,'click',
        function (event){
            pos = event.latLng
            marker.setPosition(pos)
        })
    }
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=&callback=initMap"
        type="text/javascript"></script>
</div>
<button type="submit" class="col-lg-4 pull-right inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-blue uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150"
 style="    margin-top: 20px;">
    Envoyer
</button>
</div>

</div>



</div>
</form>
			
</div>
		
	
			</div>
			@endsection