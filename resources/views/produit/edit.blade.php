@extends('layouts.app')

@section('content')
<div class="container mt-4" >
    <div class="row" >
        <div class="col-md-8 offset-2">
            <div class="card">
                <div class="card-header h3">
                    Modifier un produit
                </div>

                <div class="card-body ">
                    <form action="{{ route('updateproduit') }}" method="post">
                        @csrf
                        <input type="hidden" name="id" id="id" value="{{ $produit->id }}">
                        <div class="form-group">
                            <label for="libelle">Libellé</label>
                            <input type="text" class="form-control" name="libelle" value="{{ $produit->libelle }}"  required>
                        </div>
                        <div class="form-group">
                            <label for="categorie">Catégorie</label>
                            <select name="categorie"  class="form-control">
                                <option >...</option>
                                @foreach($listcategorie as $c)
                                <option name="categorie" value="{{ $c->id }}"  >{{ $c->nomCategorie }} </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="libelle">Stock</label>
                            <input type="number" min="0" class="form-control" name="stock" value="{{ $produit->stock }}"   required>
                        </div>
                        <div class="form-group">
                            <input type="hidden" value="{{ Auth::user()->id }}" name="user_id">
                            <span><input type="Submit" name="modifier" value="Modifier" class="btn btn-success"></span>
                            <span> <a href="{{ route('listproduit') }}" class="btn btn-danger">Annuler</a> </span>
                        </div>
                    </form>
                </div>

                <div class="card-footer">
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
