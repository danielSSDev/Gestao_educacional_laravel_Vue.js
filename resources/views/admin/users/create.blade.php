@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h3>Novo usuário</h3>
        </div>

        <form method="POST" action="{{ route('admin.users.store') }}">
            {{ csrf_field() }}

            @include('admin.users.forms')

            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
    </div>
@endsection
