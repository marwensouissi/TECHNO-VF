@extends('admin.master')

@section('content')
@section('title', 'Gestion de livreurs')

 <!-- BEGIN: Content-->
 <div class="app-content content">
    <div class="content-wrapper">
     
      <div class="content-body"><!-- List Of All Patients -->

<section>
  <div class="row">
      <div class="col-12">
          <div class="card">
              <div class="card-header">
                  <h2 class="card-title">Liste des demande</h2>
                  <div class="heading-elements">
                    
                  </div>
              </div>
              <div class="card-body collapse show">
            
                  <div class="table-responsive">
                      <table class="table table-striped table-bordered">
                          <thead>
                              <tr>
                                <th>Nom</th>
                                <th>Téléphone</th>
                                <th>adresse</th>
                              




                              </tr>
                          </thead>
                          <tbody>
                            @foreach ($demande_livrs as $demande)
                              <tr>
                                <td>{{$demande->nom}}</td>
                                <td>{{$demande->numéro_tel}}</td>
                                <td>{{$demande->adresse}}</td>

                                          
                    
                        <td>      
                          <a href="verification-livreur/validation/{{$demande->id}}" style="float: left;"><i class="la la-check-square" style="color: green; font-size: 25px;"></i></a>  
                          <a href="verification-livreur/refuse/{{$demande->id}}" style="float: left;"><i class="la la-close" style="color: red; font-size: 25px;"></i></a>  
  
                            
                                </td>
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

   

