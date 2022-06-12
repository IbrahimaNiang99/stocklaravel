@extends('layouts.app')

@section('content')

<div class="container mt-2" >
    <div class="row" >
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <span class="h2">Liste des sorties de produits</span>
                </div>

                <div class="card-body">
                    <table class="table table-striped border">
                        <tr>
                            <th>#</th>
                            <th>Produit</th>
                            <th>Quantité</th>
                            <th>Prix</th>
                            <th>Agent</th>
                            <th>Action</th>
                        </tr>

                        <tr>
                            <td>3</td>
                            <td>test</td>
                            <td>3</td>
                            <td>cate</td>
                            <td>user</td>
                            <td>
                                <a href="#" > <i class="fa fa-edit btn btn-warning"> </i>  </a>                                <a href="#" > <i class="fa fa-edit btn btn-warning"> </i>  </a>
                                <a href="#" > <i class="fa fa-edit btn btn-warning"> </i>  </a>
                            </td>

                        </tr>

                    </table>
                </div>

                <div class="card-footer">
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
