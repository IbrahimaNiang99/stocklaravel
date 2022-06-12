@extends('layouts.app')

@section('content')
<div class="container mt-2" >
    <div class="row" >
        <div class="col-md-6">
            <div class="card ">
                <div class="card-header">
                    <span class="h3">Liste des catégorie</span>
                </div>

                <div class="card-body">
                    <table class="table table-striped border">
                        <tr>
                            <th>#</th>
                            <th>Catégorie</th>
                            <th>Action</th>
                        </tr>
                        @foreach( $listCategorie as $c )
                        <tr>
                            <td>{{ $c->id }}</td>
                            <td>{{ $c->nomCategorie }}</td>
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

        <div class="col-md-4 offset-1">
            <div class="card">
                <div class="card-header h3">
                    Ajouter une catégorie
                </div>

                <div class="card-body ">
                    <form action="{{ route('persistcategorie') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="categorie">Catégorie</label>
                            <input type="text" class="form-control" name="categorie" placeholder="Nom de la catégorie..." required>
                        </div>
                        <div class="form-group">
                            <span><input type="Submit" class="btn btn-success" value="Ajouter" name="ajouter"></span>
                            <span><input type="reset" class="btn btn-danger" value="Annuler"></span>
                        </div>
                    </form>
                </div>
                <div class="card-footer">
                    <p>Formulaire d'ajout de catégorie</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

