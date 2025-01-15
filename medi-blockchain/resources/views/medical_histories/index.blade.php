@extends('adminlte::page')

@section('title', 'Historial Médico')

@section('content_header')
    <h1>Historial Médico</h1>
@stop

@section('content')
    <a href="{{ route('medical_histories.create') }}" class="btn btn-primary btn-sm mb-3">Nuevo</a>
    <table class="table table-hover table-dark dataTable">
        <thead>
        <tr>
            <th scope="col">Paciente</th>
            <th scope="col">Fecha de Creación</th>
            <th scope="col">Hash</th>
            <th scope="col" colspan="2">Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($medicalHistories as $medicalHistory)
            <tr>
                <td>{{ $medicalHistory->patient->name }}</td>
                <td>{{ $medicalHistory->created_at }}</td>
                <td>{{ $medicalHistory->hash }}</td>

                <td><a href="{{ route('medical_histories.edit', ['medical_history' => $medicalHistory->id]) }}"
                       class="btn btn-secondary btn-sm">Editar</a></td>
                <td>
                    <form action="{{ route('medical_histories.destroy', ['medical_history' => $medicalHistory->id]) }}" method="POST">
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
