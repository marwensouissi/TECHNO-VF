@extends('home.master')
@section('content')

@section('title', 'Demande livreur')

<div class="hero_single version_2" style="background: #000000  url(/front-end/img/livre.jpg)center center no-repeat;height:400px;" >

	<div class="opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.6)">
		
			<div class="row justify-content-center">
				<div class="col-xl-9 col-lg-10 col-md-8">
					<h1>Demande De Vérification</h1>
					<h2 style="margin-top: 15px">Restaurant</h2>
					
					<!-- /row -->
					</form>
				</div>
			</div>
			<!-- /row -->
		</div>
	</div>
</div>
<div class="container margin_30_40" style="transform: none;">
    <div class="row" style="transform: none;">
        <aside class="col-lg-12" id="sidebar_fixed"
            style="position: relative; overflow: visible; box-sizing: border-box; min-height: 1079px;">
            <form method="post" enctype="multipart/form-data" >
                @csrf
                <label for="nom" class="form-label">Nom</label>
                <input type="text" name="nom" id="nom" class="form-control" style="width:100%" />
                <label class="form-label">Numéro de Téléphone</label>
                <input type="text" name="numéro_tel" id="image" class="form-control" style="width:100%" />
                <label class="form-label">Adresse</label>
                <input type="text" name="adresse" id="image" class="form-control" style="width:100%" />
                <button type="submit"
                    class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-blue uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150"
                    style="    margin-top: 20px;
                width: 80%;">
                    Create
                </button>
            </form>
        </aside>
    </div>
</div>
@endsection
