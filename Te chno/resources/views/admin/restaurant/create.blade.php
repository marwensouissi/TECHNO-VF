@extends('admin.master')

@section('content')
@section('title', 'Ajouter attribut')

 <!-- BEGIN: Content-->
 <div class="app-content content">
    <div class="content-wrapper">
     
      <div class="content-body"><!-- List Of All Patients -->

        <section>
            <div class="icon-tabs">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Ajouter Restaurant</h4>
                                <a href="#" class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
                            </div>
                            <div class="card-content collapse show">
                                <div class="card-body">

                            <form method="post" action="{{ route('restaurant.store') }}"enctype="multipart/form-data">
                                @csrf
                                <label for="nom" class="form-label">Nom</label>
                                <input type="text" name="nom" id="nom" class="form-control" />
                

                                <label  class="form-label">Numéro de Téléphone</label>
                                <input type="text" name="numéro_tel"  class="form-control" />

                                
                                <label  class="form-label">Adresse</label>
                                <input type="text" name="adresse"  class="form-control" />

                                
                                <label  class="form-label">Email</label>
                                <input type="text" name="email"  class="form-control" />

                                  
                                <label  class="form-label">Statut</label>
                                <input type="text" name="statut"  class="form-control" />

                                <label  class="form-label">image</label>
                                <input type="file" name="image"  class="form-control" />

                                
                                <label  class="form-label">Password</label>
                                <input type="password" name="password"  class="form-control" />
                                <input type="hidden" name="X"  class="form-control" />

            <div class="mapform" >
                <div class="row">
                    <div class="col-5">
                        <label  class="form-label">Lat</label>

                        <input type="text" class="form-control" placeholder="lat" name="lat" id="lat">
                    </div>
                    <div class="col-5">
                        <label  class="form-label">Lng</label>

                        <input type="text" class="form-control" placeholder="lng" name="lng" id="lng">
                    </div>
                </div>

                <div id="map" style="height:400px; width: 800px;" class="my-3"></div>

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

            </div>

    </div>



    <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6">
        <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-blue uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
            Create
        </button>
    </div>
</div>
</form>
</div>
</div>
</div>

</section>


</div>
</div>
</div>
<!-- END: Content-->

@endsection
