
@extends('admin.master')

@section('content')
@section('title', 'Ajouter Catégorie')

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
                                <h4 class="card-title">Ajouter attribut</h4>
                                <a href="#" class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
                            </div>
                            <div class="card-content collapse show">
                                <div class="card-body">

                            <form method="post" action="{{ route('categorie.store') }}"enctype="multipart/form-data">
                                @csrf

                                     <label for="nom" class="form-label">Nom</label>
                                    <input type="text" name="nom" id="nom" class="form-control" />
                    

                                    <label for="image" class="form-label">Image</label>
                                    <input type="file" name="image" id="image" class="form-control" />

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
