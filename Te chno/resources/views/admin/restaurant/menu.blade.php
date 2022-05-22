@extends('admin.master')

@section('content')
@section('title', 'Gestion de produits')

 <!-- BEGIN: Content-->
 <div class="app-content content">
    <div class="content-wrapper">
     
      <div class="content-body"><!-- List Of All Patients -->

<section>
  <div class="row">
      <div class="col-12">
          <div class="card">
              <div class="card-header">
                  <h2 class="card-title">Liste des produits</h2>
                  <div class="heading-elements">
                  </div>
              </div>
              <div class="card-body collapse show">
            
                  <div class="table-responsive">
                      <table class="table table-striped table-bordered">
                          <thead>
                              <tr>
                                <th>Nom de produit</th>
                                <th>Image</th>

                              </tr>
                          </thead>
                          <tbody>
                            @foreach ($produits as $produit)
                            <tr>
                              <td>{{$produit->nom}}</td>
                            
                              @php
                                  
              $file = $produit->image;
              $path="/images/produit/";
              $X= $path.$file;
                              @endphp
                              <td><img width="200px" src={{$X}} alt=""></td>
                              <td>
                                    
                              
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

   