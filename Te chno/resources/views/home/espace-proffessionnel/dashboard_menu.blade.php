@extends('home.master')

@section('content')
@section('title', 'Menu')


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
					</form>
				</div>
			</div>
        </div>
    </div>
    <div class="columns" style="    margin-left: 13%;  margin-top: 10px; width: 82%;">
        {{-- <div class="column main">

            @if ($if == 0)
            <div class="cart-empty" style="min-height: 250px;margin-top:30px">
                <h1>Vous n'avez aucun article dans votre panier.</h1>
                <h2>Cliquez <a href="/restaurant">ici</a> pour continuer vos achats.
                </h2>
            </div> --}}

        
            
            <div class="cart-container">


                
                       
                        <div id="cart-totals" class="cart-totals" data-bind="scope:'block-totals'">
                            <div class="table-wrapper" >
                               
                        
                        
                          
                            
                           
                        <tr class="grand totals">
                            <th class="mark" scope="row">
                                <strong >  
                        
                                </tbody>
                                <a   href="/produit/ajouter/{{$id_resto}}"
                                class="btn btn-primary" 
                                style="    width: 27%;
                                float: right;
                                margin-bottom: -7px;
                                margin-top: 3px;
                                margin-right: -4%;"> Ajouter Un Produit</a>


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
                                    <th class="col price" scope="col"><span>Image</span></th>
                                    <th class="col item" scope="col"><span>Nom</span></th>
                                    <th class="col price" scope="col"><span>Catégorie</span></th>
                                    <th class="col item" scope="col"><span>Prix</span></th>
                                    <th class="col price" scope="col"><span>Etat</span></th>

                                    


                                    <th class="col subtotal" scope="col"><span></span></th>
                                </tr>
                            </thead>    
                       
                            @foreach($produits as $produit)

                                
                                <tbody class="cart item">
                                    <tr class="item-info">
                                        <td data-th="Item" class="col item" style=" width: 10%;">
                                            
                                            @php
                                            $file = $produit->image;
                                            $path = '/images/produit/';
                                            $X = $path . $file;
                                        @endphp
                                        <img class="product-image-photo lazyload"
                                        src="{{$X}}" loading="lazy" width="100" height="100"/>                                        
                                

                                                </strong>
                                            </div>
                                        </td>

                                        
                                        <td data-th="Item" class="col item" style=" width: 10%;">
                                            
                                            {{ $produit->nom }} 
                                         
                                

                                                </strong>
                                            </div>
                                        </td>

                                        <td data-th="Item" class="col item" style=" width: 10%;">
                                            
                                            {{ $produit->categories->nom }} 
                                         
                                

                                                </strong>
                                            </div>
                                        </td>

                                        <td data-th="Item" class="col item" style=" width: 10%;">
                                            
                                            {{ $produit->prix }} Dt
                                        
                                

                                                </strong>
                                            </div>
                                        </td>

                                        <td class="col price" data-th="Price" style="    width:%;">

                                            <span class="price-excluding-tax" >
                                                <span class="cart-price">
                                                    {{ $produit->etat }} 

                                            </span>
                                        </td>
                                    
                                        
                                    
                                    
                                        <td class="col subtotal" data-th="Subtotal">
                                            <span class="price-excluding-tax" >
                                                <span class="cart-price">
                                            <a   href="/produit/modifier/{{ $id_resto }}/{{$produit->id}}" class="btn btn-warning"> Modifier</a>
                                            <a  method="post" href="/produit/supprimer/{{ $id_resto }}/{{$produit->id}}" class="btn btn-danger"> Supprimer</a>

                                            
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

                                                @endforeach
  
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>

                        </table>
                    </div>
                   
                        </div>
                    
                </div> 
                <div id="gift-options-cart" data-bind="scope:'giftOptionsCart'">
            

                </div>

            </div>
            

        </div>
        
    </div>
</main>
@endsection

<div class="page-bottom" style="width: 100%">
    <div class="content">
        <div class="back2top">
        </div>
    </div>
</div>





