@extends('layouts.app')

@section('content')
    <div class="container">
        <a href="{{  route('admin.users.index') }}" class="btn btn-primary"> << Voltar lista de Usuários</a>
        <br/><br/>
        @component('admin.users.tabs-component')
            <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{  route('admin.users.edit' , $user->id) }}">Perfil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.users.profile.edit', $user->id) }}">Informações</a>
                    </li>
                </ul>
            </div>
        @endcomponent

        <div class="row">
            <h3 style="margin-left: 15px; margin-top: 25px;">Editar usuário</h3>
        </div>

        <form method="POST" action="{{ route('admin.users.update', $user->id) }}">
        {{ csrf_field() }}
        <input name="_method" type="hidden" value="PUT">

        @include('admin.users.forms')

            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
    </div>

@endsection
