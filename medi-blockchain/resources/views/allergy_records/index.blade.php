@extends('adminlte::page')

@section('title', 'Registros de Alergia')

@section('content_header')
    <h1>Registros de Alergia</h1>
@stop

@section('content')
    <a href="{{ route('allergy_records.create') }}" class="btn btn-primary btn-sm mb-3">Nuevo</a>
    <table class="table table-hover table-dark dataTable">
        <thead>
        <tr>
            <th scope="col">Paciente</th>
            <th scope="col">Alergia</th>
            <th scope="col">Fecha de Diagnóstico</th>
            <th scope="col">Severidad</th>
            <th scope="col" colspan="2">Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($allergyRecords as $allergyRecord)
            <tr>
                <td>{{ $allergyRecord->medicalHistory->patient->name }}</td>
                <td>{{ $allergyRecord->allergy_type }}</td>
                <td>{{ $allergyRecord->date }}</td>
                <td>{{ $allergyRecord->reaction }}</td>

                <td><a href="{{ route('allergy_records.edit', ['allergy_record' => $allergyRecord->id]) }}"
                       class="btn btn-secondary btn-sm">Editar</a></td>
                <td>
                    <form action="{{ route('allergy_records.destroy', ['allergy_record' => $allergyRecord->id]) }}" method="POST">
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
