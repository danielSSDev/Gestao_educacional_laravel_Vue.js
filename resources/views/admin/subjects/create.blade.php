@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h3>Nova disciplina</h3>
        </div>
        <form method="POST" action="{{ route('admin.disciplina.salvar') }}">
            {{ csrf_field() }}

                @include('admin.subjects.form')

            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
    </div>
@endsection
