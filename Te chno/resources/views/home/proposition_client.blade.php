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
                                    <th class="col item" scope="col"><span>Proposée le</span></th>

                                    <th class="col price" scope="col"><span>Produit</span></th>

                                    <th class="col price" scope="col"><span>Restaurant</span></th>
                                    <th class="col price" scope="col"><span>Coordonnées Client</span></th>
                                    <th class="col qty" scope="col"><span>Prix De Commande</span></th>
                                    <th class="col qty" scope="col"><span>Prix </span></th>
                                    <th class="col qty" scope="col"><span>Temps </span></th>

                                    <th class="col subtotal" scope="col"><span></span></th>
                                </tr>
                            </thead>    
                       
                            @forelse($proposition_livreurs as $proposition_livr)

                                
                                <tbody class="cart item">
                                    <tr class="item-info">
                                        <td data-th="Item" class="col item" style=" width: 10%;">
                                            
                                            {{ $proposition_livr->commandes->created_at }} 
                                         
                                

                                                </strong>
                                            </div>
                                        </td>

                                        <td data-th="Item" class="col item" style=" width: 10%;">
                                            
                                            {{ $proposition_livr->created_at }} 
                                         
                                

                                                </strong>
                                            </div>
                                        </td>

                                        <td data-th="Item" class="col item" style=" width: 10%;">
                                            
                                            {{ $proposition_livr->commandes->id_produit }} 
                                        
                                

                                                </strong>
                                            </div>
                                        </td>

                                        <td class="col price" data-th="Price" style="    width:%;">

                                            <span class="price-excluding-tax" >
                                                <span class="cart-price">
                                                    {{ $proposition_livr->commandes->restaurants->nom }} 

                                            </span>
                                        </td>
                                        <td class="col qty" data-th="Qty"    style="width: 9%;">
                                            <div class="field qty">
                                                <div class="control qty">
                                                    <label for="cart-253-qty">
                                                        {{ $proposition_livr->commandes->lat }} 
                                                        {{ $proposition_livr->commandes->lng }} 
                                                    </label>
                                                </div>
                                            </div>
                                        </td>
                                        <td style="width: 20%">
                                            {{ $proposition_livr->commandes->montant }} Dt
                                        </td>

                                        <td class="col subtotal" data-th="Subtotal">

                                            <span class="price-excluding-tax" >
                                                <span class="cart-price">

                                                    


                                                    {{ $proposition_livr->prix }}

                                            
                                            </span>
                                        </td>

                                        <td class="col subtotal" data-th="Subtotal">

                                            <span class="price-excluding-tax" >
                                                <span class="cart-price">

                                                    


                                                    {{ $proposition_livr->temps }}

                                            
                                            </span>
                                        </td>
                                        <td class="col subtotal" data-th="Subtotal">

                                            <span class="price-excluding-tax" >
                                                <span class="cart-price">


                                            <a    method="POST" href="/commande/proposition/{{$proposition_livr->commandes->id}}/{{$proposition_livr->id}}" class="btn btn-success"> Accepter</a>

                                            
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
                   
                        </div>
                    
                </div> 
                <div id="gift-options-cart" data-bind="scope:'giftOptionsCart'">
            

                </div>

            </div>
            

        </div>
        
    </div>
</main>
<div class="page-bottom" style="width: 100%">
    <div class="content">
        <div class="back2top">
        </div>
    </div>
</div>





@endsection
