<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    protected $fillable = array('user_id', 'categories_id', 'libelle', 'stock');

    public static $rules = array('libelle'=>'required∣min:3',
                                 'user_id'=>'required∣bigInteger',
                                 'categories_id'=>'required∣Integer',
                                 'stock'=>'required∣min:1'
    );



    //use HasFactory;
}
