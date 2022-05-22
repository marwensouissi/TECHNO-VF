@extends('home.master')
@section('content')

@section('title', 'Ajouter produit')

<div class="hero_single version_2" style="background: #000000  url(/front-end/img/livre.jpg)center center no-repeat;height:400px;" >

	<div class="opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.6)">
		
			<div class="row justify-content-center">
				<div class="col-xl-9 col-lg-10 col-md-8">
					<h1>Ajouter Un Produit</h1>
					<h2 style="margin-top: 15px">Restaurant</h2>
					
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
        <aside class="col-lg-12" id="sidebar_fixed"
            style="position: relative; overflow: visible; box-sizing: border-box; min-height: 1079px;">
            <form method="post" enctype="multipart/form-data"  action="/produit/ajouter/{{\Request::segment(3)}}">
                @csrf
                
                <label for="nom" class="form-label">Nom</label>
                <input type="text" name="nom" id="nom" class="form-control" />
                <label for="nom" class="form-label">categorie</label>
                <select name="categorie" id="categorie" class="form-control">
                    
                
            @foreach($categories as $categorie)
                <option name="categorie" value="{{ $categorie->id }}">{{ $categorie->nom }}</option>
            @endforeach
            </select>
            
           
        <label for="prix" class="form-label">prix</label>
        <input type="text" name="prix" id="prix" class="form-control" />
       
        <label for="etat" class="form-label">Etat</label>
        <input type="text" name="etat" id="etat" class="form-control" />

        <label for="image" class="form-label">image</label>
        <input type="file" name="image" id="image" class="form-control" /><div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6">
            <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-blue uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150"
            style=   "width: 27%;
            height: 56px;
            margin-left: 66%;
            margin-bottom: 31px;
            background-color: rgb(249 0 23 / 85%);
            color: white;
            margin-top: -31px;">
                Ajouter
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
