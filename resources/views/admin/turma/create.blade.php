@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h3>Nova turma</h3>
        </div>

        <form method="POST" action="{{ route('admin.turma.salvar') }}">
            {{ csrf_field() }}

            @include('admin.turma.form')

            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
    </div>
@endsection
