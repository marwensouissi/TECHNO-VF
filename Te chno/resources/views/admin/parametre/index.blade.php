@extends('admin.master')

@section('content')
@section('title', 'Gestion de parametres')

 <!-- BEGIN: Content-->
 <div class="app-content content">
    <div class="content-wrapper">
     
      <div class="content-body"><!-- List Of All Patients -->

<section>
  <div class="row">
      <div class="col-12">
          <div class="card">
              <div class="card-header">
                  <h2 class="card-title">Paramètre</h2>
                  <div class="heading-elements">
                    
                  </div>
              </div>
              <div class="card-body collapse show">
            
                  <div class="table-responsive">
                      <table class="table table-striped table-bordered">
                          <thead>
                              <tr>
                                <th>Facebook</th>
                                <th>Numéro de téléphone</th>
                                <th>Twitter</th>
                                <th>Instagram</th>
                                <th>Slider</th>




                              </tr>
                          </thead>
                          <tbody>
                            @foreach ($parametres as $parametre)
                              <tr>
                                <td>{{$parametre->facebook}}</td>
                                <td>{{$parametre->num_tel}}</td>
                                <td>{{$parametre->twitter}}</td>
                                <td>{{$parametre->instagram}}</td>
                              

                                @php
                                $file = $parametre->slider;
                                $path="/images/slider/";
                                $X= $path.$file;
                              @endphp
                              <td><img width="150px" src={{$X}} alt=""></td>
                    
                       <td style="text-align: center">         
                        <a href="{{ route('parametre.edit', $parametre->id) }}"><i class="ft-edit text-success"></i></a>
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

   