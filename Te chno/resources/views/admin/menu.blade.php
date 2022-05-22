<!-- BEGIN: Main Menu-->

<div class="main-menu menu-fixed menu-light menu-accordion    menu-shadow " data-scroll-to-active="true">
  <div class="main-menu-content">
    <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
      <li  class="active">
        <a href="{{ url('/my_admin') }}"><i class="la la-home"></i><span class="menu-title" data-i18n="">Tableau de bord</span></a>
      </li>
    
    <li class=" navigation-header"><span data-i18n="nav.category.professional">Professional</span><i class="la la-ellipsis-h" data-toggle="tooltip" data-placement="right" data-original-title="Professional"></i></li>    
       
        
        <li class="active" >
            <a href="/my_admin/user">
            <i class="la la-user"></i><span class="menu-title" data-i18n="">Utilisateurs</span>
            </a>
        </li>

        <li class="active" >
          <a href="/my_admin/restaurant">
            <i class="la la-archive"></i><span class="menu-title" data-i18n="">Restaurant</span>
          </a>
      </li>
      <li class="active" >
        <a href="/my_admin/livreur">
          <i class="la la-truck"></i> <span class="menu-title" data-i18n="">Livreur</span>
        </a>
    </li>

    <li class="active" >
      <a href="/my_admin/verification-restaurant">

        <i class="la la-check-circle-o"></i> <span class="menu-title" data-i18n="">Vérification Restaurant</span>
      </a>
  </li>
  <li class="active" >
    <a href="/my_admin/verification-livreur">

      <i class="la la-list-alt"></i> <span class="menu-title" data-i18n="">Vérification Livreur</span>
    </a>
  </li>

  <li class="active" >
    <a href="/my_admin/commandes">

      <i class="la la-cart-arrow-down"></i> <span class="menu-title" data-i18n="">Commandes</span>
    </a>
  </li>


      <li class=" navigation-header"><span data-i18n="nav.category.professional">Gestion Des Produit</span><i class="la la-ellipsis-h" data-toggle="tooltip" data-placement="right" data-original-title="Professional"></i></li>

      <!--
      <li class="nav-item">  active open 
        <a href="#">
          <i class="la la-dropbox"></i><span class="menu-title" data-i18n="">Produits</span>
        </a>
            -->
            <li class="active" >
              <a class="menu-item" href="/my_admin/produit"> <i class="la la-cutlery"></i></i><span  class="menu-title" data-i18n="">Plat</span></a>
            </li> 

            <li class="active" >
              <a class="menu-item" href="/my_admin/categorie"><i class="la la-question"></i><span  class="menu-title" data-i18n="">Catégorie</span></a>
            </li> 


          
      </li>
      <li class=" navigation-header"><span data-i18n="nav.category.professional">Paramètre de Site</span><i class="la la-ellipsis-h" data-toggle="tooltip" data-placement="right" data-original-title="Professional"></i></li>


      <li class="active" >
        <a href="/my_admin/best_resto">
          <i class="la la-star-o"></i> <span class="menu-title" data-i18n="">Meilleur Restaurant</span>
        </a>
    </li>

      <li class="active" >
        <a href="/my_admin/parametre">
          <i class="la la-cog"></i> <span class="menu-title" data-i18n="">Paramètre</span>
        </a>
    </li>
    
    
  


    


    </ul>
  </div>
</div>

<!-- END: Main Menu-->