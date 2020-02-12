@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <h3>Usuario - {{ $user->name }}</h3>
        </div>

            <a href="{{ route('admin.users.index') }}" class="btn btn-primary hidden-print" style="margin-bottom: 20px;">Listar usuario</a>
            <br/><br/>
        <div class="form-group">
            <table class="table table-bordered">
                <tbody>
                <tr>
                    <th scope="row">Id</th>
                    <td>{{ $user->id }}</td>
                </tr>

                <tr>
                    <th scope="row">Nome</th>
                    <td>{{ $user->name }}</td>
                </tr>

                <tr>
                    <th scope="row">Email</th>
                    <td>{{ $user->email }}</td>
                </tr>

                <tr>
                    <th scope="row">Password</th>
                    <td>{{ $user->password }}</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
