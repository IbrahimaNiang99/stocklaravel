<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class utilisateurController extends Controller
{
    public function list(){
        $listUser = User::all();
        return view('utilisateur.list', ['listUser'=>$listUser]);
    }

    public function persist(Request $request){
        $u = new User();
        //dd($request);
        $u->name = $request->name;
        $u->email = $request->email;

        if ($request->password_confirmation == $request->password){
            $u->password = Hash::make($request->password);
            $u->password;
            $u->save();
            $sms = "Opération réussi !!!";
        }else{
            $sms = "Les mots de passes ne correspondent pas !!!";
        }
        $listUser = User::all();
        return view('utilisateur.list', ['listUser'=>$listUser, 'sms'=>$sms]);
    }
}
