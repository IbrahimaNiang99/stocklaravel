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
        $p->user_id = $request->user_id;

        $p->save();
        return $this->list();
    }

    public function edit($id){
        $produit = Produit::find($id);
        $listcategorie = Categorie::all();
        //var_dump($produit);
        return view('produit.edit', ['listcategorie'=>$listcategorie, 'produit'=>$produit] );

    }

    public function update(Request $request){

        $p = Produit::find($request->id);
        $p->libelle = $request->libelle;
        $p->stock = $request->stock;
        $p->categories_id = $request->categorie;
        $p->user_id = $request->user_id;
        $p->save();
        return redirect('/produit/list');
    }

    public function delete($id){
        $produit = Produit::find($id);
        if ($produit != null){
            $produit->delete();
        }
        return redirect('/produit/list');
    }
}
