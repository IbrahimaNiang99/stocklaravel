<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use App\Models\Sortie;
use Illuminate\Http\Request;

class sortieController extends Controller
{
    public function add(){
        return view('sortie.add');
    }

    public function list(){
       $listeSortie = Sortie::all();
       $listeProduit = Produit::all();
        return view('sortie.list',['listeSortie'=>$listeSortie, 'listeProduit'=>$listeProduit]);
    }

    public function persist(Request $request){

        $s = new Sortie();

        $s->produits_id = $request->produit;
        $s->prix = $request->prix;
        $s->dateSortie = $request->dateSortie;
        $s->quantite = $request->quantite;
        $s->user_id = $request->user_id;

        //echo $s; die();
        //Mettre à jour la quantité en stock sur Produit
        $pr = Produit::all()->find($s->produits_id);
        if ($pr->stock >= $request->quantite){
            $pr->stock -= $request->quantite;
            $pr->save();
            $s->save();
            $sms = "Opération réussie ...";
        }else{
            $sms = "L'opération a échoué ...";
        }
        $listeSortie = Sortie::all();
        $listeProduit = Produit::all();
        return view('sortie.list',['listeSortie'=>$listeSortie, 'listeProduit'=>$listeProduit, 'sms'=>$sms]);

    }
}
