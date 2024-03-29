<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Produit;
use http\Client\Response;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class produitController extends Controller
{
    //public function add(){
    //    return view('produit.add');
    //}

    public function list(){
        $listproduit = Produit::all();
        $listcategorie = Categorie::all();
        return view('produit.list', ['listproduit'=>$listproduit, 'listcategorie'=>$listcategorie]);
    }

    public function  persist(Request $request){
        $p = new Produit();
        $p->libelle = $request->libelle;
        $p->categories_id = $request->categorie;
        $p->stock = $request->stock;
        $p->user_id = $request->user_id;

        $p->save();
        return $this->list();
    }

    // API get list produit
    public function getAll(){
        return Produit::all();
    }

    // API get produit
    public function getProduitById($id){
        $p = Produit::find($id);
        if (is_null($p)){
            return \response()->json(['status'=>200, "message"=>"Ce produit n'existe pas "]);
        }else{
            return \response()->json([$p, "message"=>"Voila ton produit"]);
        }
    }

    // API add produit
    public function addProd(Request $request){
        $p = new Produit();
        $p->libelle = $request->libelle;
        $p->categories_id = $request->categorie;
        $p->stock = $request->stock;
        $p->user_id = $request->user_id;

        $result = $p->save();
        if ($result){
            return \response()->json(['status'=>200, 'message'=>'Bon']);
        }
    }

    // API Update produit
    public function updateProd(Request $request, $id){

        $p = Produit::find($id);
        $p->libelle = $request->libelle;
        $p->stock = $request->stock;
        $p->categories_id = $request->categorie;
        $p->user_id = $request->user_id;
        $result = $p->save();
        if ($result){
            return \response()->json(['status'=>200, 'message'=>'Modifier']);
        }
    }

    public function pdfListeProduit(){
        $produit = Produit::All();
        $pdf = PDF::loadView('pdf.produit', compact('produit'));
        return $pdf->download('produit.pdf');
    }


















    //public function persist(Request $request){
//$p = new Produit();

//$p->libelle = $request->libelle;
//$p->stock = $request->stock;
//$p->categories_id = $request->categorie;
//$p->user_id = $request->user_id;

//$p->save();
//return $this->list();
    //}

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
