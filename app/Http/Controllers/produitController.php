<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Produit;
use Illuminate\Http\Request;

class produitController extends Controller
{
    public function add(){
        return view('produit.add');
    }

    public function list(){
        $listproduit = Produit::all();
        $listcategorie = Categorie::all();
        return view('produit.list', ['listproduit'=>$listproduit, 'listcategorie'=>$listcategorie]);
    }

    public function persist(Request $request){
        $p = new Produit();

        $p->libelle = $request->libelle;
        $p->stock = $request->stock;
        $p->categories_id = $request->categorie;
        $p->user_id = 1;

        $p->save();
        return $this->list();
    }
}
