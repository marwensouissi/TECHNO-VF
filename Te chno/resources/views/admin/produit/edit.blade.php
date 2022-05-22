@extends('admin.master')

@section('content')
@section('title', 'modifier produit')

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
                                <h4 class="card-title">Ajouter attribut</h4>
                                <a href="#" class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
                            </div>
                            <div class="card-content collapse show">
                                <div class="card-body">
                                    <form action="{{ route('produit.update',$produit->id) }}" method="POST"enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')


                                     <label for="nom" class="form-label">Nom</label>
                                    <input type="text" name="nom" id="nom" class="form-control"  value="{{ $produit->nom }}" />
                                    <label for="nom" class="form-label">categorie</label>
                                    <select name="categorie" id="categorie" class="form-control">
                                        
                                    
                                @foreach($categories as $categorie)
                                    <option value="{{ $produit->id_categorie }}">{{ $categorie->nom }}</option>
                                @endforeach
                                </select>
                                
                                <label for="nom" class="form-label">Type</label>
                                <select name="restaurant" id="restaurant" class="form-control">
                                    @foreach($restaurants as $restaurant)
                                        <option value="{{ $produit->id_restaurant }}">{{ $restaurant->nom }}</option>
                                    @endforeach
                                    </select>
                            <label for="prix" class="form-label">prix</label>
                            <input type="text" name="prix" id="prix" class="form-control" value="{{ $produit->prix }}"/>
                        
                            <label for="etat" class="form-label">Etat</label>
                            <input type="text" name="etat" id="etat" class="form-control" value="{{ $produit->etat }}" />

                            <label for="image" class="form-label">image</label>
                            <input type="file" name="image" id="image" class="form-control" />
                            @php
                                    
                            $file = $produit->image;
                            $path="/images/produit/";
                            $X= $path.$file;
                                            @endphp
                                            <img width="200px" src={{$X}} alt="">
                                       
                            
                        
                        </div>
                        <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6">
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-blue uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
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
