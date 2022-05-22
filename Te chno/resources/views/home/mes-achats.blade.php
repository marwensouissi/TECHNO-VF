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
                                <strong >Total</strong>
                            </th>
                            <td class="amount">
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
                                    <th class="col item" scope="col"><span>Commande</span></th>
                                    <th class="col price" scope="col"><span>Restaurant</span></th>
                                    <th class="col qty" scope="col"><span>Prix</span></th>
                                    <th class="col subtotal" scope="col"><span>Etat</span></th>
                                </tr>
                            </thead>
                            @foreach ($commandes as $commande)
                                <tbody class="cart item">
                                    <tr class="item-info">
                                        <td data-th="Item" class="col item" style=" width: 35%;">
                                            
                                              {{$commande->id_produit}} 
                                        </td>

                                

                                                </strong>
                                            </div>
                                        </td>

                                        <td class="col price" data-th="Price" style="    width: 12%;">

                                            <span class="price-excluding-tax" >
                                                <span class="cart-price">
                                                    <span class="price"> {{$commande->restaurants->nom}} </span> </span>

                                            </span>
                                        </td>
                                        <td class="col qty" data-th="Qty">
                                            <div class="field qty">
                                                <div class="control qty">
                                                    <label for="cart-253-qty">
                                                        <span class="label">{{$commande->montant}}Dt</span>
                                                    
                                                    </label>
                                                </div>
                                            </div>
                                        </td>

                                        <td class="col subtotal" data-th="Subtotal">

                                            <span class="price-excluding-tax" >
                                                <span class="cart-price">
                                                @if ($commande->confirmation == 0) 
                                                    <span class="label" style="color: rgb(155, 144, 0)"> <b> Commande en attente <b> </span>
                                                @endif
                                                        
                                                @if      ($commande->confirmation == 1) 
                                                    <span class="label"><a href="commande/proposition/{{$commande->id}}" class="btn btn-primary" style="    background-color: #448fff;">Voir les Propositions</a>  </span>
                                                @endif
                                                @if      ($commande->confirmation == 2) 
                                                    <span class="label" style="color: rgb(255, 0, 0)"> <b> Désolé Votre commande a éte refusé par le restaurant <b></span>
                                                @endif

                                                @if      ($commande->confirmation == 3) 
                                                <span class="label" style="color: rgb(16, 211, 16)" >  <b> Commande acceptée  <u> <a style="color: rgb(16, 211, 16)" href="/commande/detail/{{$commande->id}}">Voir plus de Détails</a> </u></b> </span>
                                            @endif


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

                                                
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            @endforeach

                        </table>
                    </div>

                    <div class="cart main actions" style="    margin-bottom: 6%; margin-top: 3%;">
                        <button type="button"  style="border: none">
                            <a href="/chekout"  class="btn btn-success"> Passer la Commande </a>
                        </button>

                    
                            <button type="button"  style="border: none">
                                <a href="/restaurant"  class="btn btn-primary"> Continue Shopping  </a>
                            </button>

                            <button  style="border: none">
                            <a href="/panier/all"  class="btn btn-danger">Vider le Panier </a>
                            </button>
                        
                        </div>
                    
                </div> 
                <div id="gift-options-cart" data-bind="scope:'giftOptionsCart'">
                   

                </div>

            </div>
            

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
