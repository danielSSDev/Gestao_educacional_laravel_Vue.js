@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <h3>Listagem de usúarios</h3>
    </div>

    <a href="{{ route('admin.users.create') }}" class="btn btn-primary" style="margin-bottom: 20px;">Novo usuário</a>

    <div class="form-group">
        <table class="table table-striped table-dark" style="width:100%;">
            <thead class="thead-dark">
            <tr>
                <th>Id</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Ação</th>
            </tr>
            </thead>

            <tbody>
            @foreach ($dados as $dado)
                <tr>
                    <td>{{ $dado->id }}</td>
                    <td>{{ $dado->name }}</td>
                    <td>{{ $dado->email }}</td>

                    <td style="text-align:center;">
                        <a href="{{ route('admin.users.edit', $dado->id) }}" class="btn btn-primary">Editar</a>
                        <a href="{{ route('admin.users.show', $dado->id) }}" class="btn btn-secondary">Ver</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <span>{{ $dados->links() }}</span>
    </div>
</div>
@endsection
