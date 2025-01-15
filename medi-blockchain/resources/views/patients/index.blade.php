@extends('adminlte::page')

@section('title', 'Pacientes')

@section('content_header')
    <h1>Pacientes</h1>
@stop

@section('content')
    <a href="{{ route('patients.create') }}" class="btn btn-primary btn-sm mb-3">Nuevo</a>
    <table class="table table-hover table-dark dataTable">
        <thead>
        <tr>
            <th scope="col">Nombre</th>
            <th scope="col">Fecha de Nacimiento</th>
            <th scope="col">Género</th>
            <th scope="col">Dirección</th>
            <th scope="col" colspan="2">Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($patients as $patient)
            <tr>
                <td>{{ $patient->name }}</td>
                <td>{{ $patient->birth_date }}</td>
                <td>{{ $patient->gender }}</td>
                <td>{{ $patient->address }}</td>

                <td><a href="{{ route('patients.edit', ['patient' => $patient->id]) }}" class="btn btn-secondary btn-sm">Editar</a></td>
                <td>
                    <form action="{{ route('patients.destroy', ['patient' => $patient->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">Eliminar</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop
