@extends('layouts.app')

@section('content')
    <div class="container mt-4" >
    <div class="row" >
        <div class="col-md-8">
            <div class="card ">
                <div class="card-header">
                    <span class="h3">Liste des produits </span>
                    <span> <a href="{{ route ('pdfListeProduit') }}" class="btn btn-info offset-4" > Imprimer liste produits </a></span>
                </div>

                <div class="card-body">
                    <table class="table table-striped border">
                        <tr>
                            <th>#</th>
                            <th>Libellé</th>
                            <th>Catégorie</th>
                            <th>Stock</th>
                            <th>Agent</th>
                            <th>Action</th>
                        </tr>

                        @foreach( $listproduit as $p)
                        <tr>
                            <td> {{ $p->id }} </td>
                            <td>{{ $p->libelle }}</td>
                            <td>{{ $p->categorie }}</td>
                            <td>{{ $p->stock }}</td>
                            <td>{{ $p->nameUser }}</td>
                            <td>
                                <a href="{{ route ('editproduit',['id'=> $p->id]) }}" > <i class="fa fa-edit btn btn-warning"> </i>  </a>
                                <a href="{{ route ('deleteproduit',['id'=> $p->id]) }}" onclick="return confirm('Voulez-vous vraiment supprimer ce produit')" > <i class="fa fa-trash btn btn-danger"> </i>  </a>
                            </td>
                        </tr>
                        @endforeach

                    </table>
                </div>

                <div class="card-footer">
                </div>
            </div>
        </div>

        <div class="col-md-4 ">
            <div class="card">
                <div class="card-header h3">
                    Ajouter un produit
                </div>

                <div class="card-body ">
                    <form action="{{ route('persistproduit') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="libelle">Libellé</label>
                            <input type="text" class="form-control" name="libelle" placeholder="Nom du produit..." required>
                        </div>
                        <div class="form-group">
                            <label for="categorie">Catégorie</label>
                            <select name="categorie" class="form-control">
                                <option >Choisir une catégorie ...</option>
                                @foreach($listcategorie as $c)
                                <option name="categorie" value="{{ $c->id }}" >{{ $c->nomCategorie }} </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="libelle">Stock</label>
                            <input type="number" min="0" class="form-control" name="stock" placeholder="Quantité en stock..."  required>
                        </div>
                        <div class="form-group">
                            <input type="hidden" value="{{ Auth::user()->id }}" name="user_id">
                            <span> <input type="Submit" class="btn btn-success" name="ajouter" value="Ajouter"> </span>
                            <span> <input type="Reset" class="btn btn-danger" value="Annuler" name="Annuler"> </span>
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
