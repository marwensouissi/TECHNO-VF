@extends('admin.master')

@section('content')
@section('title', 'Gestion de categories')

 <!-- BEGIN: Content-->
 <div class="app-content content">
    <div class="content-wrapper">
     
      <div class="content-body"><!-- List Of All Patients -->

<section>
  <div class="row">
      <div class="col-12">
          <div class="card">
              <div class="card-header">
                  <h2 class="card-title">Liste des Catégorie</h2>
                  <div class="heading-elements">
                      <a href="categorie/create" class="btn btn-danger round btn-sm"><i class="la la-plus font-small-2"></i>
                          Ajouter Catégorie</a>
                  </div>
              </div>
              <div class="card-body collapse show">
            
                  <div class="table-responsive">
                      <table class="table table-striped table-bordered">
                          <thead>
                              <tr>
                                <th>Nom de catégorie</th>
                                <th>Image</th>

                              </tr>
                          </thead>
                          <tbody>
                            @foreach ($categories as $categorie)
                              <tr>
                                <td>{{$categorie->nom}}</td>
                              
                                @php
                                    
                $file = $categorie->image;
                $path="/images/categorie/";
                $X= $path.$file;
                                @endphp
                                <td><img width="200px" src={{$X}} alt=""></td>
                                <td>
                                  <a style="float: left;" href="{{ route('categorie.edit', $categorie->id) }}"><i class="ft-edit text-success"></i></a>
                                      
                                  <form style="float: left;"
                                  action="{{ route('categorie.destroy', $categorie->id) }}" method="POST"
                                  onsubmit="return confirm('Are you sure?');">
                                  <input type="hidden" name="_method" value="Delete">
                                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                  <button style="border: none;background:none; float: left;" type="submit"><i class="ft-trash-2 text-warning"></i></button> 
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

   