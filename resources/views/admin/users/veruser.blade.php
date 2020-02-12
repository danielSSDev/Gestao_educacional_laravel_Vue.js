@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
        <h3>Ver usuário</h3>
        </div>

        <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-primary">Editar</a>
        <a href="{{ route('admin.user.excluir', $user->id) }}" class="btn btn-danger">Excluir</a>
        <br/><br/>
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
            </tbody>
        </table>
    </div>

@endsection