@extends('home.master')

@section('content')
@section('title', 'panier')


<div class="hero_single version_2" style="background: #000000  url(/front-end/img/panierr.jpeg)  center center no-repeat;" >

	<div class="opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.6)" style="width:99%">
		
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
				</div>
			</div>
        </div>
    </div>
    <div class="columns" style="    margin-left: 13%;  margin-top: 10px; width: 82%;">
        <div class="column main">

            @if ($cartcnt == 0)
            <div class="cart-empty" style="min-height: 250px;margin-top:30px">
                <h1>Vous n'avez aucun article dans votre panier.</h1>
                <h2>Cliquez <a href="/restaurant">ici</a> pour continuer vos achats.
                </h2>
            </div>

            @else
            
            <div class="cart-container">
                
                       
                        <div id="cart-totals" class="cart-totals" data-bind="scope:'block-totals'">
                            <div class="table-wrapper" >
                            <table class="data table totals">
                                <caption class="table-caption">Total</caption>
                                <tbody>
                               
                            <tr class="totals sub">
                                <th  class="mark" scope="row">Sub total</th>
                                <td class="amount">
                                    <span class="price">{{Cart::subtotal()}} TND</span>
                                </td>
                            </tr>
                        
                            <tr class="totals shipping excl">
                                <th class="mark" scope="row">

                                    <span class="label" >Frais de livraison</span>
                                    
                                </th>
                                <td class="amount">
                                    
                                    @foreach ($cart as $card)
                                    <span class="price">
                                        @if ($card->options->fraislivraison == 0 )
                                            
                                            @break;
                                        @elseif ($card->options->fraislivraison != 0)
                                            
                                        @endif
                                       
                                        
                                    </span>
                                    @endforeach
                                   
                                    {{$card->options->fraislivraison}} TND
                                   
                                </td>
                            </tr>
                           
                        <tr class="grand totals">
                            <th class="mark" scope="row">
                                <strong >Total</strong>
                            </th>
                            <td class="amount">
                                <strong><span class="price">{{Cart::subtotal()+$card->options->fraislivraison}} TND</span></strong>
                            </td>
                        </tr>
                      
                                </tbody>
                            </table>
                        </div>
                     
                        </div>
                    </div>


                  
                </div>
                <div class="form form-cart">

                    <div class="cart table-wrapper">
                        <table id="shopping-cart-table" class="cart items data table" >
                            <thead>
                                <tr>
                                    <th class="col item" scope="col"><span>Produits</span></th>
                                    <th class="col price" scope="col"><span>Prix</span></th>
                                    <th class="col qty" scope="col"><span>Qty</span></th>
                                    <th class="col subtotal" scope="col"><span>Sub total</span></th>
                                </tr>
                            </thead>
                            @foreach ($cart as $card)
                                <tbody class="cart item">
                                    <tr class="item-info">
                                        <td data-th="Item" class="col item">
                                            <a
                                                title="{{$card->name}}" tabindex="-1"
                                                class="product-item-photo">
                                                <span class="product-image-container product-image-container-1"
                                                    style="width: 100px">
                                                    <span class="product-image-wrapper">
                                                        @foreach ($produit->where('id', '=', $card->id) as $procard)  
                                                        
                                                        @php
                                                            $file = $procard->image;
                                                            $path = '/images/produit/';
                                                            $X = $path . $file;
                                                        @endphp
                                                        <img class="product-image-photo lazyload"
                                                        src="{{$X}}"
                                                            loading="lazy" width="100" height="100"
                                                        
                                                            alt="{{$card->name}}" /></span>
                                                            @endforeach

                                                </span>

                                            </a>
                                          
                                            <div class="product-item-details">
                                                <strong class="product-item-name">
                                                    @foreach ($produit->where('id', '=', $card->id) as $procard)                                                
                                                    <a href="/produit/{{$procard->id}}">{{$card->name}} ,{{$procard->restaurants->nom}} </a>
                                                    @endforeach

                                                </strong>
                                            </div>
                                        </td>

                                        <td class="col price" data-th="Price">

                                            <span class="price-excluding-tax" >
                                                <span class="cart-price">
                                                    <span class="price">{{$card->price}} TND</span> </span>

                                            </span>
                                        </td>
                                        <td class="col qty" data-th="Qty">
                                            <div class="field qty">
                                                <div class="control qty">
                                                    <label for="cart-253-qty">
                                                        <span class="label">Qty</span>
                                                        <input name="cart[253][qty]" value="{{$card->qty}}" type="number"
                                                            size="4" step="any" title="Qty" class="input-text qty" />
                                                    </label>
                                                </div>
                                            </div>
                                        </td>

                                        <td class="col subtotal" data-th="Subtotal">

                                            <span class="price-excluding-tax" >
                                                <span class="cart-price">
                                                    <span class="price">{{$card->price*$card->qty}} TND</span> </span>

                                            </span>
                                        </td>
                                    </tr>


                                    <tr class="item-actions">
                                        <td colspan="4">
                                            <div class="actions-toolbar">
                                                <div id="gift-options-cart-item-253"
                                                    data-bind="scope:'giftOptionsCartItem-253'"
                                                    class="gift-options-cart-item">
                                                   

                                                </div>

                                                <a href="panier/{{$card->rowId}}" title="Remove item" class="btn btn-danger">
                                                    <span> Retirer </span>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            @endforeach

                        </table>
                    </div>
                    
            <div class="mapform" >
                <div class="row">
                    <div class="col-5">
                        <form method="post">
                            @csrf

                        <input type="text" class="form-control" placeholder="lat" name="lat" id="lat" required style="width:80%;margin-right:10%">
                    </div>
                    <div class="col-5">

                        <input type="text" class="form-control" placeholder="lng" name="lng" id="lng" required style="width:80%;margin-left:-29px">
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
            <label>Commentaire </label><input type="text" name="commentaire"class="form-control" placeholder="par exemple pas piquante, sans salade... " >



                    <div class="cart main actions" style="    margin-bottom: 6%; margin-top: 3%;">
                        <button type="submit"   class="btn btn-success" style="border: none">
                         Passer la Commande 
                        </button>

                    </form>

                            <button type="button"  style="border: none" class="btn btn-primary">
                                <a href="/restaurant" style="color:white" > Continue Shopping  </a>
                            </button>

                            <button  style="border: none" class="btn btn-danger">
                            <a href="/panier/all" style="color:white" >Vider le Panier </a>
                            </button>
                        
                        </div>
                </div> 
                <div id="gift-options-cart" data-bind="scope:'giftOptionsCart'">
                   

                </div>

            </div>
            @endif


        </div>
    </div>
</main>
<div class="page-bottom">
    <div class="content">
        <div class="back2top">
        </div>
    </div>
</div>

@endsection
