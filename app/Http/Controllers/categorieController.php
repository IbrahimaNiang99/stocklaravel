<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;

class categorieController extends Controller
{
    public function add(){

        return view('categorie.add');
    }

    public function list(){
        $listCategorie = Categorie::all();
        return view('categorie.list', ['listCategorie'=>$listCategorie]);
    }

    public function persist(Request $request){
        $cat = new Categorie();
        $cat->nomCategorie = $request->categorie;
        $cat->save();

        return $this->list();
    }

    public function delete($id){
        $categorie = Categorie::find($id);
        if($categorie != null){
            $categorie->delete();
        }
        return $this->list();
    }

}
