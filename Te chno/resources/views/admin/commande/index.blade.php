

            @extends('admin.master')

@section('content')
@section('title', 'Commande Validées')

 <!-- BEGIN: Content-->
 <div class="app-content content">
    <div class="content-wrapper">
     
      <div class="content-body"><!-- List Of All Patients -->

<section>
  <div class="row">
      <div class="col-12">
          <div class="card">
              <div class="card-header">
                  <h2 class="card-title">Liste des Restaurant</h2>
                  <div class="heading-elements">
                      <a href="commande/create" class="btn btn-danger round btn-sm"><i class="la la-plus font-small-2"></i>
                          Ajouter Restaurant</a>
                  </div>
              </div>
              <div class="card-body collapse show">
            
                  <div class="table-responsive">
                      <table class="table table-striped table-bordered">
                          <thead>
                              <tr>
                                <th>Id</th>
                                <th>Restaurant</th>
                                <th>Produit</th>
                                <th>Client</th>
                                <th>Livreur</th>
                                <th>Prix</th>
                                <th>Temps</th>





                              </tr>
                          </thead>
                          <tbody>
                            @foreach ($commande_confirms as $commande)
                              <tr>
                                <td>{{$commande->id}}</td>
                                <td>{{$commande->restaurants->nom}}</td>
                                <td>{{$commande->produits->nom }}</td>
                                <td>{{$commande->id_user  }}</td>
                                <td>{{$commande->id_livreur  }}</td>
                                <td>{{$commande->prix  }}</td>
                                <td>{{$commande->temps  }}</td>

                             
                                         
                                
                             
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

   