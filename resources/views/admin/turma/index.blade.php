@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h3>Listagem de turmas</h3>
        </div>

        <a href="{{ route('admin.turma.create') }}" class="btn btn-primary" style="margin-bottom: 20px;">Nova turma</a>

        <div class="form-group">
            <table class="table table-striped table-dark" style="width:100%;">
                <thead class="thead-dark">
                <tr>
                    <th>Id</th>
                    <th>Data Inicio</th>
                    <th>Data Fim</th>
                    <th>Ciclo</th>
                    <th>Sub-divisão</th>
                    <th>semestre</th>
                    <th>Ano</th>
                    <th>Açoes</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($dados as $dado)
                    <tr>
                        <td>{{ $dado->id }}</td>
                        <td>{{ $dado->date_start->format('d-m-Y') }}</td>
                        <td>{{ $dado->date_end->format('d-m-Y') }}</td>
                        <td>{{ $dado->cycle }}</td>
                        <td>{{ $dado->subdivision }}</td>
                        <td>{{ $dado->semester }}</td>
                        <td>{{ $dado->year }}</td>

                        <td style="text-align:center;">
                            <a href="{{ route('admin.turma.editar', $dado->id) }}" class="btn btn-primary">Editar</a>
                            <a href="{{ route('admin.turma.ver', $dado->id) }}" class="btn btn-secondary">Ver</a>
                            <a href="{{ route('class_information.student.index', $dado->id) }}" class="btn btn-warning">Alunos</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection()
