
@extends('home.master')
@section('content')
@foreach ($produits as $produit)
@php
$file = $produit->image;
$path = '/images/produit/';
$X = $path . $file;
@endphp
@section('title', $produit->categories->nom)
@endforeach

<div class="hero_single version_2" style="background: #000000  url({{$X}}) center center no-repeat;" >

	<div class="opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.6)">
		
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


<div class="container margin_30_40" style="transform: none;">			
<div class="row" style="    transform: none;
margin-left: 14%;
width: 100%;">

<div class="col-lg-9">
	<div class="row">
		@foreach ($produits as $produit)
		@php
		$file = $produit->image;
		$path = '/images/produit/';
		$X = $path . $file;
	@endphp
		<div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
			<div class="strip">
				<figure>

					<img src="{{$X}}"  class="img-fluid lazy loaded" alt="" data-was-processed="true">
					<a  class="strip_info">
						 <small>{{$produit->prix}}Dt</small> 	
						<span style="float: right">	<small style="float: right;">{{$produit->etat}}</small> </span>

						<div class="item_title">
							<h3>{{$produit->nom}}</h3>
							<small>{{$produit->restaurants->nom}}</small>
						</div>
					</a>
				</figure>

				<form  id="product_addtocart_form" enctype="multipart/form-data"
					method="POST" action="/restaurant/menu/{{$produit->restaurants->id}}/{{$produit->id}}" >
				@csrf   
				

				<ul>
					<li><span > Quantité</span> </li> <li>
						<input type="number" name="qty" id="qty" min="0" value="1" title="Qty" class="input-text qty" style="max-width: 30px" >
					<button type="submit"  
 class="btn btn-danger"  style="background-color: #F80222">Ajouter au panier </li>
					</button>
				</ul>
				</form>
			</div>
		</div>
	@endforeach
		<!-- /strip grid -->
	</div>
	<!-- /row -->
	<div class="pagination_fg">
	
	</div>
</div>
<!-- /col -->
</div>		
</div>


	</div>
	@endsection