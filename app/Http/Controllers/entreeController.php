<?php

namespace App\Http\Controllers;

use App\Models\Entree;
use App\Models\Produit;
use Illuminate\Http\Request;

class entreeController extends Controller
{
    public function add(){
        return view('entree.add');
    }

    public function list(){
        $listentree = Entree::all();
        $listproduit = Produit::all();
        return view('entree.list', ['listentree'=>$listentree, 'listproduit'=>$listproduit]);
    }

    public function persist(Request $request){
        $e = new Entree();

        $e->produits_id = $request->produit;
        $e->quantite = $request->quantite;
        $e->dateEntree = $request->dateEntree;
        $e->prix = $request->prix;
        $e->user_id = 1;

        $e->save();
        return $this->list();
    }

}