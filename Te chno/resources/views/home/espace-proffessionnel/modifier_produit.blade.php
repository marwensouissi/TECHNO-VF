@extends('home.master')
@section('content')

@section('title', 'Demande livreur')

<div class="hero_single version_2" style="background: #000000  url(/front-end/img/menu.jpg)center center no-repeat;height:400px;" >

	<div class="opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.6)">
		
			<div class="row justify-content-center">
				<div class="col-xl-9 col-lg-10 col-md-8">
					<h1>Modification De Menu</h1>
					
					<!-- /row -->
					</form>
				</div>
			</div>
			<!-- /row -->
		</div>
	</div>
                                    <form method="post" enctype="multipart/form-data"  style="margin-left: 12px;" action="/produit/modifier/{{\Request::segment(3)}}/{{ $produits->id }}">
                                        @csrf


                                     <label for="nom" class="form-label">Nom</label>
                                    <input type="text" name="nom" id="nom" class="form-control"  value="{{ $produits->nom }}" />
                                    <label for="nom" class="form-label">categorie</label>
                                    <select name="categorie" id="categorie" class="form-control">
                                        
                                    
                                @foreach($categories as $categorie)
                                    <option value="{{ $produits->id_categorie }}">{{ $categorie->nom }}</option>
                                @endforeach
                                </select>
                                
                            
                            <label for="prix" class="form-label">prix</label>
                            <input type="text" name="prix" id="prix" class="form-control" value="{{ $produits->prix }}"/>
                        
                            <label for="etat" class="form-label">Etat</label>
                            <input type="text" name="etat" id="etat" class="form-control" value="{{ $produits->etat }}" />

                            <label for="image" class="form-label">image</label>
                            <input type="file" name="image" id="image" class="form-control" />
                            @php
                                    
                            $file = $produits->image;
                            $path="/images/produit/";
                            $X= $path.$file;
                                            @endphp
                                            <img width="200px" src={{$X}} alt="">
                                       
                            
                        
                        </div>
                        <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6">
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-blue uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150"
                            style=   "width: 27%;
                            height: 56px;
                            margin-left: 66%;
                            margin-bottom: 31px;
                            background-color: rgb(249 0 23 / 85%);
                            color: white;
                            margin-top: -31px;">
                                Update
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
