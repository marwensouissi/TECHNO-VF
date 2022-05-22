@extends('home.master')

@section('content')
@section('title', 'Home')

<!-- BEGIN: Content-->
<main>
    @foreach ($parametres as $parametre)
        
    @php
    $file = $parametre->slider;
    $path = '/images/slider/';
    $X = $path . $file;
@endphp
    <div class="hero_single version_2" style="background: #ededed url({{$X}}) center center no-repeat;" >
        <div class="opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.6)">
            
            @endforeach

            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-9 col-lg-10 col-md-8">
                        <h1>Découvrir &amp; Commander</h1>
                        <p>Les meilleurs restaurants au meilleur prix</p>
                        <div class="row g-0 custom-search-input">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <input class="form-control" type="text" placeholder="What are you looking for...">
                                    <i class="icon_search"></i>
                                </div>
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
    <!-- /hero_single -->

    <div class="bg_gray">
        <div class="container margin_60_40">
            <div class="main_title center">
                <span><em></em></span>
                <h2>Catégories populaires</h2>
                <p> </p>
            </div>
            <!-- /main_title -->
            <div class="owl-carousel owl-theme categories_carousel" style="min-height: 377px;">
                @foreach ($categories as $categorie)
                    @php
                        $file = $categorie->image;
                        $path = '/images/categorie/';
                        $X = $path . $file;
                    @endphp
                    <div class="item" style="min-height: 377px;">
                        <a href="/category/{{$categorie->id}}">
                            <span>98</span>
                            <img src="{{ $X }}" alt="" style="height: ">
                            <h3>{{ $categorie->nom }}</h3>
                        </a>
                    </div>
                @endforeach
            </div>
            <!-- /carousel -->
        </div>
        <!-- /container -->
    </div>
    <!-- /bg_gray -->
    <div class="mapform">
<h1 style="    margin-top: 26px;margin-left: 22px;"> Localisez Vous</h1>

        <div class="row">
                <div>
        
                <input type="hidden" class="form-control" placeholder="lat" name="lat" id="lat" >
          
        
        
                <input type="hidden" class="form-control" placeholder="lng" name="lng" id="lng" >
            </div>
        </div>
        
        <div id="map" style="height:400px; width: 800px; float: left;
        position: relative;
        left: 20%;" class="my-3"></div>
        
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
        <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-blue uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150" style="    margin-top: 14px;width:54%;margin-left:297px"
        
        >
            Envoyer
        </button>
        </div>



    <div class="container margin_60_40">
        <div class="main_title">
            <span><em></em></span>
            <h2> Nos Partenaires </h2>
            <a href="/restaurant">Voir tout</a>
        </div>

        <div class="owl-carousel owl-theme carousel_4">
            @foreach ($best_restos as $best_resto)
                @php
                    $file = $best_resto->image;
                    $path = '/images/restaurant/';
                    $X = $path . $file;
                @endphp

                <div class="item">
                    <div class="strip">
                        <figure>
                            <img src="{{ $X }}" style="height:110%" alt="">
                            <a href="/restaurant/menu/{{$best_resto->id_resto}}" class="strip_info">
                                <div class="item_title">
                                    <h3>{{ $best_resto->nom }}</h3>
                                    <small>{{ $best_resto->adresse }}</small>
                                </div>
                            </a>
                        </figure>
                        <ul>
                            <li><span class="loc_open">Now Open</span></li>
                            <li>
                            </li>
                        </ul>
                    </div>
                </div>
            @endforeach
        </div>
        <!-- /carousel -->

        <div class="banner lazy">
            <div class="wrapper d-flex align-items-center opacity-mask" data-opacity-mask="rgb(18 25 34)">
                <div>
                    <small>TechnoResto</small>
                    <h3>Plus de 300 restaurants</h3>
                    <p>Commander facilement au meilleur prix</p>
                    <a href="/restaurant" class="btn_1">Voir tout</a>
                </div>
            </div>
            <!-- /wrapper -->
        </div>
        <!-- /banner -->

        <div class="row">
            <div class="col-12">
                <div class="main_title version_2">
                    <span><em></em></span>
                    <h2>Les Plus Plat Vondu</h2>

                    <a href="#0">Voir tout</a>
                </div>
            </div>
            <div class="col-md-6">
                <div class="list_home">
                    <ul>
                        <li>
                            <a href="detail-restaurant.html">
                                <figure>
                                    <img src="/front-end/img/location_list_placeholder.png"
                                        data-src="front-end/img/location_list_1.jpg" alt="" class="lazy">
                                </figure>
                                <div class="score"><strong>9.5</strong></div>
                                <em>categorie</em>
                                <h3>Nom plat </h3>
                                <small>nom resto</small>
                                <ul>
                                    <li><span class="ribbon off">-30%</span></li>
                                    <li>Prix</li>
                                </ul>
                            </a>
                        </li>
                        
                    </ul>
                </div>
            </div>
        </div>
        <!-- /row -->
        <p class="text-center d-block d-md-block d-lg-none"><a href="grid-listing-filterscol.html"
                class="btn_1">Voir tout</a></p>
        <!-- /button visibile on tablet/mobile only -->
    </div>
    <!-- /container -->

    <div class="call_section lazy" data-bg="url(img/bg_call_section.jpg)">
        <div class="container clearfix">
            <div class="col-lg-5 col-md-6 float-end wow" style="margin-right:60px">
                <div class="box_1">
                    <h3>Vous Etes un Livreur ? </h3>
                    <p>Rejoignez-nous pour augmenter livrer les commandes aux client en proposant le prix et le temps </p>
                    <a href="submit-restaurant.html" class="btn_1">S'enregistrer</a>
                </div>
                

            </div>

            <div class="col-lg-5 col-md-6 float-end wow" style="margin-right:50px">
                <div class="box_1">
                    <h3>Vous Avez un Restaurant ? </h3>
                    <p>Rejoignez-nous pour augmenter votre visibilité en ligne. Vous aurez accès à encore plus de
                        clients qui souhaitent profiter de vos plats savoureux à la maison.</p>
                    <a href="submit-restaurant.html" class="btn_1">S'enregistrer</a>
                </div>
                

            </div>
            
    </div>
    <!--/call_section-->

</main>
<!-- /main -->






<!-- END: Content-->

@endsection
