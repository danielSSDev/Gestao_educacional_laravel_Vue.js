@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h3>Disciplina - {{ $data->name }}</h3>
        </div>

        <a href="{{ route('admin.disciplina.editar', $data->id) }}" class="btn btn-primary" style="margin-bottom: 20px;">Editar</a>
        <a href="{{ route('admin.disciplina.excluir', $data->id) }}" class="btn btn-danger" style="margin-bottom: 20px;">Excluir</a>

        <br/><br/>
        <div class="form-group">
            <table class="table table-bordered">
                <tbody>
                <tr>
                    <th scope="row">Id</th>
                    <td>{{ $data->id }}</td>
                </tr>

                <tr>
                    <th scope="row">Nome</th>
                    <td>{{ $data->name }}</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
