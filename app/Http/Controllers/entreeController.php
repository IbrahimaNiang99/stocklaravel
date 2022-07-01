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
        $listentree = Entree::paginate(5);
        $listproduit = Produit::all();
        return view('entree.list', ['listentree'=>$listentree, 'listproduit'=>$listproduit]);
    }

    public function persist(Request $request){

        $e = new Entree();
        $e->produits_id = $request->produit;
        $e->quantite = $request->quantite;
        $e->dateEntree = $request->dateEntree;
        $e->prix = $request->prix;
        $e->user_id = $request->user_id;

        //Mettre à jour la quantité en stock sur Produit
        $pr = Produit::all()->find($e->produits_id);
        $pr->stock += $request->quantite;
        $pr->save();

        $e->save();
        return redirect('/entree/list');
    }

    public function edit($id){
        $entree = Entree::find($id);
        $listproduit = Produit::all();
        return view('entree.edit', ['entree'=>$entree, 'listproduit'=>$listproduit]);
    }

    public function update(Request $request){
        $entree = Entree::find($request->id);

        $entree->produits_id = $request->produit;
        $entree->quantite = $request->quantite;
        $entree->dateEntree = $request->dateEntree;
        $entree->prix = $request->prix;
        $entree->user_id = $request->user_id;
        //dd($entree);
        $entree->save();
        return redirect('/entree/list');
    }

}
