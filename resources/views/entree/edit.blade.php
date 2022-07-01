@extends('layouts.app')

@section('content')
<div class="container mt-4" >
    <div class="row" >
        <div class="col-md-8 offset-2">
            <div class="card">
                <div class="card-header h3">
                    Modifier une entrée de produit
                </div>

                <div class="card-body ">
                    <form action="{{ route ('updateentree') }}" method="post">
                        @csrf
                        <input type="hidden" name="id" id="id" value="{{ $entree->id }}">
                        <div class="form-group">
                            <label for="produit">Produit</label>
                            <select name="produit" id="" class="form-control">
                                @foreach($listproduit as $p)
                                <option name="produit" value="{{ $p->id }}">{{ $p->libelle }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="quantite">Quantite</label>
                            <input type="number" min="0" class="form-control" name="quantite" value="{{ $entree->quantite }}"   required>
                        </div>
                        <div class="form-group">
                            <label for="prix">Prix</label>
                            <input type="number" min="0" class="form-control" name="prix" value="{{ $entree->prix }}"   required>
                        </div>
                        <div class="form-group">
                            <label for="date">Date</label>
                            <input type="date" class="form-control" name="dateEntree" value="{{ $entree->dateEntree }}"   required>
                        </div>
                        <div class="form-group">
                            <input type="hidden" value="{{ Auth::user()->id }}" name="user_id">
                            <span><input type="Submit" name="modifier" value="Modifier" class="btn btn-success"></span>
                            <span> <a href="{{ route('listentree')}}" class="btn btn-danger">Annuler</a> </span>
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
