@extends('admin.master')

@section('content')
@section('title', 'Gestion de restaurants')

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
                      <a href="restaurant/create" class="btn btn-danger round btn-sm"><i class="la la-plus font-small-2"></i>
                          Ajouter demande</a>
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
                                <th>Statut</th>
                                <th>Latitute <br> 
                                  longitude</th>
                                <th>image</th>
                                <th>Etat</th>




                              </tr>
                          </thead>
                          <tbody>
                            @foreach ($demandes as $demande)
                              <tr>
                                <td>{{$demande->nom}}</td>
                                <td>{{$demande->numéro_tel}}</td>
                                <td>{{$demande->adresse}}</td>
                                <td>{{$demande->statut}}</td>

                                <td>{{$demande->lat}} <br>
                                {{$demande->lng}}</td>

                                            @php                                    
                                    
                                      $file = $demande->image;
                                      $path="/images/restaurant/";
                                      $X= $path.$file;
                                    
                                            @endphp
                    
                        <td><img width="120px" src={{$X}} alt=""></td>
                        <td>{{$demande->etat}}</td>
                        <td>      
                          <a href="verification-restaurant/validation/{{$demande->id}}" style="float: left;"><i class="la la-check-square" style="color: green; font-size: 25px;"></i></a>  
                          <a href="verification-restaurant/refuse/{{$demande->id}}" style="float: left;"><i class="la la-close" style="color: red; font-size: 25px;"></i></a>  
  
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

   

