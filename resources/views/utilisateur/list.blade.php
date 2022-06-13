@extends('layouts.app')

@section('content')
<div class="container-fluid mt-2" >
    <div class="row" >
        <div class="col-md-7">
            <div class="card">
                @if(!empty($sms))
                <div class="alert alert-success h5" role="alert">
                    {{ $sms }}
                </div>
                @endif
                <div class="card-header">
                    <span class="h2">Liste des utilisateurs</span>
                </div>

                <div class="card-body">
                    <table class="table table-striped border">
                        <tr>
                            <th>#</th>
                            <th>Prénom & nom</th>
                            <th>Email</th>
                            <th>Etat</th>
                            <th>Action</th>
                        </tr>
                        @foreach($listUser as $lu)
                        <tr>
                            <td>{{ $lu->id }}</td>
                            <td>{{ $lu->name }}</td>
                            <td>{{ $lu->email }}</td>
                            <td></td>
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
        <div class="col-md-4">
            <div class="card-header h4">Ajouter utilisateur</div>
            <form method="POST" action="{{ route('persistutilisateur') }}">
                @csrf
                <div class="card border">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name" >Prénom & nom</label>
                            <input id="name" type="text" class="@error('name') is-invalid @enderror form-control" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input id="email" type="email" class="@error('email') is-invalid @enderror form-control" name="email" value="{{ old('email') }}" required autocomplete="email">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password">{{ __('Password') }}</label>
                            <input id="password" type="password" class="@error('password') is-invalid @enderror form-control" name="password" required autocomplete="new-password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password-confirm">{{ __('Confirm Password') }}</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Register') }}
                            </button>
                        </div>
                    </div>
                    <div class="card-footer">

                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

