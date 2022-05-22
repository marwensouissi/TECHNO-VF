


@extends('home.master')
@section('content')
{{-- @foreach ($restaurants as $restaurant) --}}
{{-- @php
$file = $restaurant->categories->image;
$path = '/images/categorie/';
$X = $path . $file;
@endphp--}}
@section('title', 'Restaurant') 


<div class="hero_single version_2" style="background: #000000  url(/front-end/img/resto5.jpg)  center center no-repeat;" >

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
</div>
<div class="container margin_30_40" style="transform: none;">			
	<div class="row" style="transform: none;">
			
			
		
		

		<div class="col-lg-9">
			<div class="row" style="width:1300px">
				@foreach ($restaurants as $restaurant)
				@php
				$file = $restaurant->image;
				$path = '/images/restaurant/';
				$X = $path . $file;
			@endphp
				<div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
					<div class="strip">
						<figure>
                            <a href="/restaurant/gestion-menu/{{$restaurant->id}}">
							<img src="{{$X}}"  class="img-fluid lazy loaded" alt="" data-was-processed="true">
                           
								<small>{{$restaurant->prix}}Dt</small>
								<div class="item_title">
									<h3>{{$restaurant->nom}}</h3>
								</div>
							</a>
						</figure>
						<ul>
							<li><span> <h3 style="  font-family: Avanta Garde	                                ;">{{$restaurant->nom}}</h3 ></span></li>
							<li>
							</li>
						</ul>
					</div>
				</div>
			@endforeach
				<!-- /strip grid -->
			</div>
			<!-- /row -->
			<div class="pagination_fg">
			  <a href="#">«</a>
			  <a href="#" class="active">1</a>
			  <a href="#">2</a>
			  <a href="#">3</a>
			  <a href="#">4</a>
			  <a href="#">5</a>
			  <a href="#">»</a>
			</div>
		</div>
		<!-- /col -->
	</div>		
</div>
		
	
			</div>
			@endsection