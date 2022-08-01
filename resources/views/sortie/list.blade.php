@extends('layouts.app')

@section('content')

<div class="container mt-2" >
    <div class="row" >
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    @if(!empty($sms))
                    <div class="alert alert-success h5" role="alert">
                        {{ $sms }}
                    </div>
                    @endif
                    <span class="h2">Liste des sorties de produits</span>
                    <span>
                        <button type="button" class="btn btn-success offset-5" data-toggle="modal" data-target="#exampleModal"> <i class="fa fa-plus"></i>
                        Ajouter
                        </button>
                    </span>
                </div>

                <div class="card-body">
                    <table class="table table-striped border">
                        <tr>
                            <th>#</th>
                            <th>Produit</th>
                            <th>Quantité</th>
                            <th>Prix</th>
                            <th>Date de sortie</th>
                            <th>Agent</th>
                            <th>Action</th>
                        </tr>
                        @foreach($listeSortie as $ls)
                        <tr>
                            <td>{{ $ls->id }}</td>
                            <td>{{ $ls->nomProduit }}</td>
                            <td>{{ $ls->quantite }}</td>
                            <td>{{ $ls->prix }}</td>
                            <td>{{ $ls->dateSortie }}</td>
                            <td>{{ $ls->nameUser }}</td>
                            <td>
                                <a href="#" > <i class="fa fa-edit btn btn-warning"> </i>  </a>
                                <a href="#" > <i class="fa fa-trash btn btn-danger"> </i>  </a>
                            </td>

                        </tr>
                        @endforeach
                    </table>
                </div>

                <div class="card-footer">
                </div>
            </div>
        </div>
    </div>
</div>



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog card" role="document">
        <div class="modal-content">
            <div class="modal-header card-header">
                <h5 class="modal-title" id="exampleModalLabel">Sortie des produits</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form action="{{ route('persistsortieproduit') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="produit">Produit</label>
                        <select name="produit" id="" class="form-control">
                            @foreach($listeProduit as $p)
                            <option name="produit" value="{{ $p->id }}" >{{ $p->libelle }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="prix">Prix unitaire</label>
                        <input type="number" name="prix" min="100" class="form-control" required placeholder="Le prix unitaire ...">
                    </div>

                    <div class="form-group">
                        <label for="prix">Quantité</label>
                        <input type="number" name="quantite" min="0" class="form-control" required placeholder="Quantité à sortir...">
                    </div>

                    <div class="form-group">
                        <label for="prix">Date de sortie</label>
                        <input type="date" name="dateSortie" class="form-control" required >
                    </div>

                    <div class="form-group">
                        <input type="hidden" value="{{ Auth::user()->id }}" name="user_id">
                        <span> <input type="reset" value="Annuler" class="btn btn-danger"></span>
                        <span> <input type="Submit" name="enregistrer" value="Enregistrer" class="btn btn-success"></span>
                    </div>

                </form>
            </div>
            <div class="modal-footer card-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


@endsection
