<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entree extends Model
{
    protected $fillable = array('produits_id', 'user_id', 'dateEntree', 'quantite', 'prix');

    public static $rule = array('produits_id'=>'required∣Integer',
                                'user_id'=>'required∣bigInteger',
                                'dateEntree'=>'date∣min:3',
                                'quantite'=>'required∣min:1',
                                'prix'=>'required∣min:2'
    );
    //use HasFactory;
}
