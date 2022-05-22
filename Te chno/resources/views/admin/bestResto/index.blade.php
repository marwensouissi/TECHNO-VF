@extends('admin.master')

@section('content')
@section('title', 'Gestion de best_restos')

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
                      <a href="best_resto/create" class="btn btn-danger round btn-sm"><i class="la la-plus font-small-2"></i>
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
                            
                                <th>image</th>
                                <th>Etat</th>




                              </tr>
                          </thead>
                          <tbody>
                            @foreach ($best_restos as $best_resto)
                              <tr>
                                <td>{{$best_resto->nom}}</td>
                                <td>{{$best_resto->numéro_tel}}</td>
                                <td>{{$best_resto->adresse}}</td>
                                <td>{{$best_resto->statut}}</td>

                                            @php                                    
                                            $file = $best_resto->image;
                                            $path="/images/restaurant/";
                                            $X= $path.$file;
                                            @endphp
                    
                        <td><img width="120px" src={{$X}} alt=""></td>
                        <td>{{$best_resto->etat}}</td>
                        <td>                        
                                        
                          <td>
                              
                            <form style="float: right;"
                            action="{{route('best_resto.edit', $best_resto->id) }}" method="get"
                            >
                            <button style="border: none;background:none" type="submit"><i class="ft-edit text-success"> </i> </button> 




                            <form style="float: right;"
                            action="{{ route('best_resto.destroy', $best_resto->id) }}" method="POST"
                            onsubmit="return confirm('Are you sure?');">
                            <input type="hidden" name="_method" value="Delete">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <button style="border: none;background:none" type="submit"><i class="ft-trash-2 text-warning"></i></button> 
                                </form>
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

   