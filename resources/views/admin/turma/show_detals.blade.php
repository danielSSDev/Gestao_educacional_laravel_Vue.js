@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h3>Turma - {{ $data->year }}</h3>
        </div>

        <a href="{{ route('admin.turma.editar', $data->id) }}" class="btn btn-primary" style="margin-bottom: 20px;">Editar</a>
        <a href="{{ route('admin.turma.excluir', $data->id) }}" class="btn btn-danger" style="margin-bottom: 20px;">Excluir</a>

        <br/><br/>
        <div class="form-group">
            <table class="table table-bordered">
                <tbody>
                <tr>
                    <th scope="row">Id</th>
                    <td>{{ $data->id }}</td>
                </tr>

                <tr>
                    <th scope="row">Data Inicio</th>
                    <td>{{ $data->date_start->format('d-m-Y') }}</td>
                </tr>

                <tr>
                    <th scope="row">Data Fim</th>
                    <td>{{ $data->date_end->format('d-m-Y') }}</td>
                </tr>

                <tr>
                    <th scope="row">Ciclo</th>
                    <td>{{ $data->cycle }}</td>
                </tr>

                <tr>
                    <th scope="row">Sub-divisão</th>
                    <td>{{ $data->subdivision }}</td>
                </tr>

                <tr>
                    <th scope="row">Semestre</th>
                    <td>{{ $data->semester }}</td>
                </tr>

                <tr>
                    <th scope="row">Ano</th>
                    <td>{{ $data->year }}</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
