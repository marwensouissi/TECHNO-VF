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
                  <h2 class="card-title">Liste des Restaurant</h2>
                  <div class="heading-elements">
                      <a href="restaurant/create" class="btn btn-danger round btn-sm"><i class="la la-plus font-small-2"></i>
                          Ajouter Restaurant</a>
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
                            @foreach ($restaurants as $restaurant)
                              <tr>
                                <td>{{$restaurant->nom}}</td>
                                <td>{{$restaurant->numéro_tel}}</td>
                                <td>{{$restaurant->adresse}}</td>
                                <td>{{$restaurant->statut}}</td>

                                <td>{{$restaurant->lat}} <br>
                                {{$restaurant->lng}}</td>

                                            @php                                    
                                            $file = $restaurant->image;
                                            $path="/images/restaurant/";
                                            $X= $path.$file;
                                            @endphp
                    
                        <td><img width="120px" src={{$X}} alt=""></td>
                        <td>{{$restaurant->etat}}</td>
                        <td>      
                        <a href="restaurant/menu/{{$restaurant->id}}" style="float: left;"><i class="la la-clipboard"></i></a>
                  
                                        
                                  <a style="float: left;"href="{{ route('restaurant.edit', $restaurant->id) }}" ><i class="ft-edit text-success"></i></a>

                                  <form style="float: left;"
                                  action="{{ route('restaurant.destroy', $restaurant->id) }}" method="POST"
                                  onsubmit="return confirm('Are you sure?');">
                                  <input type="hidden" name="_method" value="Delete">
                                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                  <button style="border: none;background:none; float: left;" type="submit"><i class="ft-trash-2 text-warning"></i></button> 
                                      </form>
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

   