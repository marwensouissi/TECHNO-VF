
@extends('admin.master')

@section('content')
@section('title', 'Ajouter attribut')

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
                            </div>
                            <div class="card-content collapse show">
                                <div class="card-body">

                            <form method="post" action="{{ route('parametre.update',$parametre->id) }}"enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                
                                
                                <label for="facebook" class="form-label">Facebook</label>
                                <input type="text" name="facebook" id="facebook" class="form-control"  value="{{ $parametre->num_tel }}"/>
                

                                <label  class="form-label">Numéro de Téléphone</label>
                                <input type="text" name="numéro_tel"  class="form-control" value="{{ $parametre->num_tel }}" />

                                
                                <label  class="form-label">Twitter</label>
                                <input type="text" name="twitter"  class="form-control" value="{{ $parametre->twitter }}" />

                                
                                <label  class="form-label">Instagram</label>
                                <input type="text" name="instagram"  class="form-control" value="{{ $parametre->instagram }}"/>

                           
                                <label  class="form-label">Slider</label>
                                <input type="file" name="slider"  class="form-control"  />
                               
                               @php
                                    
                                $file = $parametre->slider;
                                $path="/images/slider/";
                                $X= $path.$file;
                                                @endphp
                                                <img width="200px" src={{$X}} alt="">
                                           

                            

            </div>

            </div>

    </div>



    <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6">
        <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-blue uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
            Create
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

