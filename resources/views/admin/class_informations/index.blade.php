@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h3>Administração de alunos na turma</h3>
        </div>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <class-student class-information="{{ $class_information->id }}"></class-student>
    </div>
@endsection()
