<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\best_resto;
use App\Models\user;
use App\Models\demande;
use App\Models\commande;
use Illuminate\Support\Facades\Notification;
use App\Models\demande_livr;
use App\Models\livreur;
use App\Models\produit;
use Illuminate\Auth\Events\Registered;
use Illuminate\Notifications\Notifiable;

use App\Notifications\CommandeClient;
use App\Notifications\CommandeResto;

use Illuminate\Support\Facades\Hash;
use App\Models\restaurant;
use App\Models\proposition_livreur;

use App\Models\categorie;
use App\Models\parametre;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Gloudemans\Shoppingcart\Contracts\Buyable;
use Illuminate\Database\Eloquent\Model;
use Cart;
use Illuminate\Support\Str;

class FrontController extends Controller
{
    public function index()
    {
        $data['users'] = user::orderBy('id', 'asc')->get();
        $data['categories'] = categorie::get();
        $data['restaurants'] = restaurant::get();
        $data['parametres'] = parametre::get();
        $data['best_restos'] = best_resto::get();
        $data['produits'] = produit::get();
        $data['cartcnt']= Cart::count();
        $users=0;
        if (Auth::check()) {
            if ($user['users'] = restaurant::where('id_user', Auth::user()->id)->first()) {
                $users=1;
            }
            if ($user['users'] = livreur::where('id_user', Auth::user()->id)->first()) {
                $users=2;
            }
        }

        return view('home.home', compact('users'), $data);
    }
    


    public function category($id)
    {   
        $users=0;
        if (Auth::check()) {
            if ($user['users'] = restaurant::where('id_user', Auth::user()->id)->first()) {
                $users=1;
            }
            if ($user['users'] = livreur::where('id_user', Auth::user()->id)->first()) {
                $users=2;
            }
        }
        $data['categories'] = categorie::where('id', \Request::segment(2))->first();
    
        $data['produits'] = Produit::where('id_categorie', $data['categories']->id)->get();
        $data['parametres'] = parametre::get();
        $data['restaurants'] = restaurant::get();
        $data['users'] = User::get();


        $data['cartcnt']= Cart::count();

        return view('home.produit.categorie', compact('users'), $data);
    }

    
    public function restaurant()
    {
        $data['users'] = User::get();
        $data['parametres'] = parametre::get();
        $data['restaurants'] = restaurant::get();
        $data['cartcnt']= Cart::count();
      
        $users=0;
        if (Auth::check()) {
            if ($user['users'] = restaurant::where('id_user', Auth::user()->id)->first()) {
                $users=1;
            }
            if ($user['users'] = livreur::where('id_user', Auth::user()->id)->first()) {
                $users=2;
            }
        }

        return view('home.restaurant', compact('users'), $data);
    }

    public function livreur()
    {
        $data['parametres'] = parametre::get();

        $data['cartcnt']= Cart::count();
    
          
        $users=0;
        if (Auth::check()) {
            if ($user['users'] = restaurant::where('id_user', Auth::user()->id)->first()) {
                $users=1;
            }
            if ($user['users'] = livreur::where('id_user', Auth::user()->id)->first()) {
                $users=2;
            }
        }


        return view('home.espace-proffessionnel.demande-livreur', compact('users'), $data);
    }
    
    
    
    
    public function restaurant_inscri()
    {
        $data['parametres'] = parametre::get();

        $data['cartcnt']= Cart::count();
          
        $users=0;
        if (Auth::check()) {
            if ($user['users'] = restaurant::where('id_user', Auth::user()->id)->first()) {
                $users=1;
            }
            if ($user['users'] = livreur::where('id_user', Auth::user()->id)->first()) {
                $users=2;
            }
        }


        return view('home.espace-proffessionnel.demande-restaurant', compact('users'), $data);
    }


    
    public function menu($id)
    {
        $id_resto['restaurants'] = restaurant::where('id', $id)->first();
        $data['restaurants'] = restaurant::where('id', $id_resto['restaurants']->id)->get();
        $data['produits'] = Produit::where('id_restaurant', $id_resto['restaurants']->id)->orderBy('id_categorie', 'asc')->get();
        $data['parametres'] = parametre::get();
        $data['cartcnt']= Cart::count();
    
        $users=0;
        if (Auth::check()) {
            if ($user['users'] = restaurant::where('id_user', Auth::user()->id)->first()) {
                $users=1;
            }
            if ($user['users'] = livreur::where('id_user', Auth::user()->id)->first()) {
                $users=2;
            }
        }


        return view('home.produit', compact('users'), $data);
    }


    public function demande_livreur(Request $request)
    {
        $request->validate([
           'nom' => 'required',
           'adresse' => 'required',
           'numéro_tel' => 'required',
        
       ]);
        
        $demande = new demande_livr();
        
    
        $demande->id_user = Auth::user()->id;
        $demande->nom = $request->input('nom');
        $demande->numéro_tel = $request->input('numéro_tel');
        $demande->adresse = $request->input('adresse');
        $demande->etat = "Désactivé";

        $demande->save();
        return redirect('/');
    }
    public function demande_restaurant(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'adresse' => 'required',
            'statut' => 'required',
            'numéro_tel' => 'required',
            'image'=> 'required',
            'lat'=> 'required',
            'lng'=> 'required',
        ]);
        
        $demande = new demande();

        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->move('images/restaurant/', $filename);
        }
        $demande->id_user = Auth::user()->id;
        $demande->nom = $request->input('nom');
        $demande->statut = $request->input('statut');
        $demande->numéro_tel = $request->input('numéro_tel');
        $demande->adresse = $request->input('adresse');
        $demande->etat = "Désactivé";
        $demande->genre = "Restaurant";
        $demande->lat = $request->input('lat');
        $demande->lng = $request->input('lng');
        $demande->image = $filename;
        $demande->save();
    
        return redirect('/');
    }
    //panier

    public function panier()
    {
        $data['users'] = User::get();
        $data['cart'] = Cart::content();
        $data['cartcnt']= Cart::count();
        $data['produit'] = Produit::get();
        $data['parametres'] = parametre::get();
        
        $users=0;
        if (Auth::check()) {
            if ($user['users'] = restaurant::where('id_user', Auth::user()->id)->first()) {
                $users=1;
            }
            if ($user['users'] = livreur::where('id_user', Auth::user()->id)->first()) {
                $users=2;
            }
        }




        //dd($data['cart']);
        return view('home.panier', compact('users'), $data);
    }

    public function chekout(Request $request)
    {
        if (!Auth::check()) {
            return redirect('/login');
        }

        $data['cart'] = Cart::content();
        $data['cartcnt']= Cart::count();
        $data['restaurant']= Restaurant::get();
        $data['produit'] = Produit::get();
        $data['commandes'] = Commande::get();
        $data['parametres'] = parametre::get();
        $data['users'] = User::get();
    
        $users=0;
        if (Auth::check()) {
            if ($user['users'] = restaurant::where('id_user', Auth::user()->id)->first()) {
                $users=1;
            }
            if ($user['users'] = livreur::where('id_user', Auth::user()->id)->first()) {
                $users=2;
            }
        }


        $commande = new Commande;
        $commande->id_user = Auth::user()->id;
        $commande->lat = request('lat');
        $commande->lng = request('lng');
        $commande->commentaire = request('commentaire');


        foreach ($data['cart'] as $card) {
            $commande->id_restaurant = $card->id_restaurant ;
            $commande->confirmation = 0;
            $commande->montant =  Cart::subtotal();
            foreach ($data['cart'] as $card) {
                $produit = $card->name ;
                $qte = $card->qty ;

                $commande->id_produit= $commande->id_produit ."/". $produit." x ".$qte;
            }
            $commande->save();
        }
        $object=[

           'restaurant' => $commande->restaurants->nom,
            'produit'=> $commande->id_produit,
            'montant' => $commande->montant,
        ];
    
        //$user= Auth::user();
        $resto['restaurnat'] = restaurant::where('id', $commande->id_restaurant)->first();
        $user['users'] = user::where('id', $resto['restaurnat']->id_user)->first();
    
        Notification::send($user, new CommandeResto($commande->restaurants->nom, $commande->id_produit, $commande->montant, $commande->commentaire));
        $this->panierdeteleall();


    


        return redirect('/mes-achats');
    }


    public function mes_achats()
    {
        if (!Auth::check()) {
            return redirect('/login');
        }


        $data['cart'] = Cart::content();
        $data['cartcnt']= Cart::count();
        $data['produit'] = Produit::get();
        $data['users'] = User::get();

        $data['parametres'] = parametre::get();
        $data['commandes'] = commande::where('id_user', Auth::user()->id)->orderBy('id', 'DESC')->get();
        
        $users=0;
        if (Auth::check()) {
            if ($user['users'] = restaurant::where('id_user', Auth::user()->id)->first()) {
                $users=1;
            }
            if ($user['users'] = livreur::where('id_user', Auth::user()->id)->first()) {
                $users=2;
            }
        }



        //dd($data['cart']);
        return view('home.mes-achats', compact('users'), $data);
    }




    public function produitadd($id, $rest)
    {
        $data['restaurants'] = restaurant::where('id', \Request::segment(3))->first();
    
        $data['produits'] = produit::where('id', \Request::segment(4))->first();


        //  $data['restaurants'] = Restaurant::where('id',$rest)->first();
        //  $data['produits'] = Produit::where('id',$id)->first();
        $dat=$data['produits']->id_restaurant ;


        Cart::add(['id' => $data['produits']->id ,'id_restaurant' => $data['produits']->id_restaurant , 'name'=> $data['produits']->nom, 'qty' => request('qty'),
    'price' => $data['produits']->prix,'user_id' =>  @Auth::user()->id ]);
        $data['cartcnt']= Cart::count();
    


        return redirect('/panier');
    }
    public function panierdetele($id)
    {
        $data['cart'] = Cart::content();
        Cart::remove($id);
        return redirect('/panier');
    }



    public function paniersdetele($id)
    {
        $data['cart'] = Cart::content();
        Cart::remove($id);
        return redirect('/panier');
    }

    public function panierdeteleall()
    {
        $data['cart'] = Cart::content();
        Cart::destroy();
        return redirect('/panier');
    }
    

    public function commande_resto()
    {
        $data['cart'] = Cart::content();
        $data['cartcnt']= Cart::count();
        $data['restaurant']= Restaurant::get();
        $data['produit'] = Produit::get();
        $data['parametres'] = parametre::get();
        $data['users'] = User::get();

        $restaurant['restaurants'] = restaurant::where('id_user', Auth::user()->id)->first();
        $id_resto = $restaurant['restaurants']->id;

        $data['commandes'] = commande::where('id_restaurant', $id_resto)->where('confirmation', 0)->get();



    
        $users=0;
        if (Auth::check()) {
            if ($user['users'] = restaurant::where('id_user', Auth::user()->id)->first()) {
                $users=1;
            }
            if ($user['users'] = livreur::where('id_user', Auth::user()->id)->first()) {
                $users=2;
            }
        }


        $notifications = auth()->user()->unreadNotifications;

        return view('home.espace-proffessionnel.commande_restaurant', compact('users', 'notifications'), $data);
    }

    

    public function accepter_commande_resto($id)
    {
        $commande= commande::where('id', $id)->first();
            
        $commande->confirmation=1;



        $commande->save();

        //  $data['livreurs'] = Livreur::get();
        // foreach ($data['livreurs'] as $livreur) {
        //     $user=user::where('id', $livreur->id_user)->first();
        // }

        return redirect('/restaurant/commande');
    }

    public function refuser_commande_resto($id)
    {
        $commande= commande::where('id', $id)->first();
            
        $commande->confirmation=2;
        $commande->save();
        return redirect('/restaurant/commande');
    }


    public function historique_commande()
    {
        $data['cart'] = Cart::content();
        $data['cartcnt']= Cart::count();
        $data['restaurant']= Restaurant::get();
        $data['produit'] = Produit::get();
        $data['parametres'] = parametre::get();
        $data['users'] = User::get();
        $restaurant['restaurants'] = restaurant::where('id_user', Auth::user()->id)->first();
        $id_resto = $restaurant['restaurants']->id;
    
        $data['commandes'] = commande::where('id_restaurant', $id_resto)->get();
    
    
    
        
        $users=0;
        if (Auth::check()) {
            if ($user['users'] = restaurant::where('id_user', Auth::user()->id)->first()) {
                $users=1;
            }
            if ($user['users'] = livreur::where('id_user', Auth::user()->id)->first()) {
                $users=2;
            }
        }
    
        return view('home.espace-proffessionnel.historique_commande', compact('users'), $data);
    }


    

    public function commande_livreur()
    {
        $data['cart'] = Cart::content();
        $data['cartcnt']= Cart::count();
        $data['restaurant']= Restaurant::get();
        $data['produit'] = Produit::get();
        $data['parametres'] = parametre::get();
        $data['users'] = User::get();
    
    
        $data['commandes'] = commande::where('confirmation', 1)->orderBy('id', 'DESC')->get();
        
    
    
        
        $users=0;
        if (Auth::check()) {
            if ($user['users'] = restaurant::where('id_user', Auth::user()->id)->first()) {
                $users=1;
            }
            if ($user['users'] = livreur::where('id_user', Auth::user()->id)->first()) {
                $users=2;
            }
        }
    
        return view('home.espace-proffessionnel.commande_livreur', compact('users'), $data);
    }





    public function proposition(Request $request ,$id)
    {   
        $commande= commande::where('id', $id)->first();

        $livreur['livreurs'] = livreur::where('id_user', Auth::user()->id)->first();
        $id_livreur = $livreur['livreurs']->id;
            
        $proposition_livr=new proposition_livreur;

        $proposition_livr->id_commande = $commande->id;
        $proposition_livr->id_user = $commande->id_user;
        $proposition_livr->id_livreur = $id_livreur;
        $proposition_livr->confirmation = 0;

        $proposition_livr->prix = request('prix');
        $proposition_livr->temps = request('temps');
        $proposition_livr->save();

        return redirect('/livreur/commande');
    }



    public function commande_acceptées_livreur()
    {
    
        $data['cart'] = Cart::content();
        $data['cartcnt']= Cart::count();
        $data['restaurant']= Restaurant::get();
        $data['produit'] = Produit::get();
        $data['parametres'] = parametre::get();
        $data['users'] = User::get();
        
    
    
        
        $livreur['livreurs'] = livreur::where('id_user', Auth::user()->id)->first();
        $id_livreur = $livreur['livreurs']->id;
        
        $data['proposition_livreurs'] = proposition_livreur::where('confirmation', 1)->where('id_livreur', $id_livreur)->orderBy('id', 'DESC')->get();

        $users=0;
        if (Auth::check()) {
            if ($user['users'] = restaurant::where('id_user', Auth::user()->id)->first()) {
                $users=1;
            }
            if ($user['users'] = livreur::where('id_user', Auth::user()->id)->first()) {
                $users=2;
            }
        }
    
        return view('home.espace-proffessionnel.commande_acceptées', compact('users'), $data);
    }


    
    public function proposition_client($id)
    {
        $data['cart'] = Cart::content();
        $data['cartcnt']= Cart::count();
        $data['restaurant']= Restaurant::get();
        $data['produit'] = Produit::get();
        $data['parametres'] = parametre::get();
        $data['users'] = User::get();
                
        $data['proposition_livreurs'] = proposition_livreur::where('confirmation', 0)->where('id_commande', $id)->where('id_user', Auth::user()->id)->get();

        $users=0;
        if (Auth::check()) {
            if ($user['users'] = restaurant::where('id_user', Auth::user()->id)->first()) {
                $users=1;
            }
            if ($user['users'] = livreur::where('id_user', Auth::user()->id)->first()) {
                $users=2;
            }
        }
    
        return view('home.proposition_client', compact('users'), $data);

        
    }






    public function accepter_proposition($id_com,$id_prop)
    {

        $proposition_livreur= proposition_livreur::where('id', \Request::segment(4))->first();


        $commande= commande::where('id', $proposition_livreur->id_commande)->first();
        $commande->confirmation=3;
        $proposition_livreur->confirmation=1;


        $commande->save();
        $proposition_livreur->save();

        //  $data['livreurs'] = Livreur::get();
        // foreach ($data['livreurs'] as $livreur) {
        //     $user=user::where('id', $livreur->id_user)->first();
        // }

        return redirect('/mes-achats');
    }



    public function detail_commande_client($id)
    {
        $data['cart'] = Cart::content();
        $data['cartcnt']= Cart::count();
        $data['restaurant']= Restaurant::get();
        $data['produit'] = Produit::get();
        $data['parametres'] = parametre::get();
        $data['users'] = User::get();
                
        $data['proposition_livreurs'] = proposition_livreur::where('confirmation', 1)->where('id_commande', $id)->where('id_user', Auth::user()->id)->orderBy('id', 'DESC')->get();

        $users=0;
        if (Auth::check()) {
            if ($user['users'] = restaurant::where('id_user', Auth::user()->id)->first()) {
                $users=1;
            }
            if ($user['users'] = livreur::where('id_user', Auth::user()->id)->first()) {
                $users=2;
            }
        }
    
        return view('home.detail_commande_client', compact('users'), $data);

        
    }


    public function detail_commande_restaurant($id)
    {
        $data['cart'] = Cart::content();
        $data['cartcnt']= Cart::count();
        $data['restaurant']= Restaurant::get();
        $data['produit'] = Produit::get();
        $data['parametres'] = parametre::get();
        $data['users'] = User::get();
                
        $data['proposition_livreurs'] = proposition_livreur::where('confirmation', 1)->where('id_commande', $id)->orderBy('id', 'DESC')->get();

        $users=0;
        if (Auth::check()) {
            if ($user['users'] = restaurant::where('id_user', Auth::user()->id)->first()) {
                $users=1;
            }
            if ($user['users'] = livreur::where('id_user', Auth::user()->id)->first()) {
                $users=2;
            }
        }
    
        return view('home.espace-proffessionnel.detail_commande_restaurant', compact('users'), $data);

        
    }

    public function liste_menu()
    {
        $data['cart'] = Cart::content();
        $data['cartcnt']= Cart::count();
        $data['restaurant']= Restaurant::get();
        $data['produit'] = Produit::get();
        $data['parametres'] = parametre::get();
        $data['users'] = User::get();
                
        $data['restaurants'] = restaurant::where('id_user',Auth::user()->id)->get();

        $users=0;
        if (Auth::check()) {
            if ($user['users'] = restaurant::where('id_user', Auth::user()->id)->first()) {
                $users=1;
            }
            if ($user['users'] = livreur::where('id_user', Auth::user()->id)->first()) {
                $users=2;
            }
        }
    
        return view('home.espace-proffessionnel.liste_menu', compact('users'), $data);

        
    }

    
    public function dashboard_menu($id)
    {
        $data['cart'] = Cart::content();
        $data['cartcnt']= Cart::count();
        $data['restaurant']= Restaurant::get();
        $data['produit'] = Produit::get();
        $data['parametres'] = parametre::get();
        $data['users'] = User::get();
                
        $data['produits'] = produit::where('id_restaurant',$id)->get();

       $id_resto=$id;

        $users=0;
        if (Auth::check()) {
            if ($user['users'] = restaurant::where('id_user', Auth::user()->id)->first()) {
                $users=1;
            }
            if ($user['users'] = livreur::where('id_user', Auth::user()->id)->first()) {
                $users=2;
            }
        }
    
        return view('home.espace-proffessionnel.dashboard_menu', compact('users', 'id_resto'), $data);
        
    }


    public function ajouter_produit_interface($id)
    {
        $data['cart'] = Cart::content();
        $data['cartcnt']= Cart::count();

        $data['restaurant']= Restaurant::get();
        $data['produits'] = produit::get();
        $data['parametres'] = parametre::get();
        $data['users'] = User::get();
        $data['categories'] = categorie::get();
                

    

        $users=0;
        if (Auth::check()) {
            if ($user['users'] = restaurant::where('id_user', Auth::user()->id)->first()) {
                $users=1;
            }
            if ($user['users'] = livreur::where('id_user', Auth::user()->id)->first()) {
                $users=2;
            }
        }
    
        return view('home.espace-proffessionnel.ajouter_produit', compact('users'), $data);
        
    }

    public function modifier_produit_interface($idr,$id)
    {
        $data['cart'] = Cart::content();
        $data['cartcnt']= Cart::count();
        $data['restaurant']= Restaurant::get();
        $data['produits'] = produit::where('id', $id)->first();
        $data['parametres'] = parametre::get();
        $data['users'] = User::get();
        $data['categories'] = categorie::get();
                

    

        $users=0;
        if (Auth::check()) {
            if ($user['users'] = restaurant::where('id_user', Auth::user()->id)->first()) {
                $users=1;
            }
            if ($user['users'] = livreur::where('id_user', Auth::user()->id)->first()) {
                $users=2;
            }
        }
    
        return view('home.espace-proffessionnel.modifier_produit', compact('users'), $data);
        
    }

    public function ajouter_produit(Request $request,$id)
    {



        $request->validate([
            'nom' => 'required',
            'prix' => 'required',
            'etat' => 'required',
            'image' => 'required',
            'categorie' => 'required',

        ]);

        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->move('images/produit', $filename);
        }
      
      
        $produit = new produit();

        $produit->nom = $request->input('nom');
        $produit->prix = $request->input('prix');
        $produit->etat = $request->input('etat');
        $produit->id_categorie = $request->input('categorie');
        $produit->id_restaurant  = \Request::segment(3);
        $produit->image = $filename;

        $produit->save();


        return redirect('/restaurant/gestion-menu/'.$id);
    }

    public function modifier_produit(Request $request,$idr,$id )
    {

        $produit = produit::find($id);

        $request->validate([
            'nom' => 'required',
            'prix' => 'required',
            'etat' => 'required',
            'image' => 'required',
            'categorie' => 'required',

        ]);

        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->move('images/produit', $filename);
        }
    
      
        $produit->nom = $request->input('nom') ;
        

        $produit->prix = $request->input('prix');
        $produit->etat = $request->input('etat');
        $produit->id_categorie = $request->input('categorie');
        $produit->id_restaurant  = \Request::segment(3);
        $produit->image = $filename;

        $produit->save();


        return redirect('/restaurant/gestion-menu/'.$idr);
    
    }




    public function supprimer_produit($id,$ids)
    {

    
        $produit = produit::find($ids);

        $file = $produit->image;
        if(\File::exists(public_path('images/produit/', $file))){
        $path="images/produit/";
        $X= $path.$file;
            \File::delete(public_path($X));
        }else{
            dd('File not found',public_path('images/produit', $file) );
        }
        $produit->delete();

        




        return redirect('/restaurant/gestion-menu/'.$id);

    }






    




    

}
