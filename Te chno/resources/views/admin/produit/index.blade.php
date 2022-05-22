@extends('admin.master')

@section('content')
@section('title', 'Gestion de Plats')

 <!-- BEGIN: Content-->
 <div class="app-content content">
    <div class="content-wrapper">
     
      <div class="content-body"><!-- List Of All Patients -->

<section>
  <div class="row">
      <div class="col-12">
          <div class="card">
              <div class="card-header">
                  <h2 class="card-title">Liste des Plats</h2>
                  <div class="heading-elements">
                      <a href="produit/create" class="btn btn-danger round btn-sm"><i class="la la-plus font-small-2"></i>
                          Ajouter Plat</a>
                  </div>
              </div>
              <div class="card-body collapse show">
            
                  <div class="table-responsive">
                      <table class="table table-striped table-bordered">
                          <thead>
                              <tr>
                                <th>Nom de produit</th>
                                <th>Categorie</th>
                                <th>Restaurant</th>
                                <th>Prix</th>
                                <th>Image</th>
                                <th>Etat</th>

                              </tr>
                          </thead>
                          <tbody>
                            @foreach ($produits as $produit)
                              <tr>
                                <td>{{$produit->nom}}</td>
                                <td>{{$produit->categories->nom}}</td>
                                <td>{{$produit->restaurants->nom}}</td>
                                <td>{{$produit->prix}}</td>
                                @php
                                  $file = $produit->image;
                                  $path="/images/produit/";
                                  $X= $path.$file;
                                @endphp
                                <td><img width="200px" src={{$X}} alt=""></td>
                                <td>{{$produit->etat}}</td>
                              
                               <td>
                                <a href="{{ route('produit.edit', $produit->id) }}"><i class="ft-edit text-success"></i></a>
                                    
                                <form style="float: right;"
                                action="{{ route('produit.destroy', $produit->id) }}" method="POST"
                                onsubmit="return confirm('Are you sure?');">
                                <input type="hidden" name="_method" value="Delete">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <button style="border: none;background:none" type="submit"><i class="ft-trash-2 text-warning"></i></button> 
                                    </form>
                                </td>
                              </tr>
                            @endforeach
                            
                              
                          </tbody>

                      </table>

                  </div>
                  <div class="d-flex justify-content-center">
                  </div>

              </div>
          </div>
      </div>
  </div>
</section>
      </div>
    </div>
  </div>
  <!-- END: Content-->

@endsection

   