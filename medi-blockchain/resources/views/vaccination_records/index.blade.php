@extends('adminlte::page')

@section('title', 'Registros de Vacunación')

@section('content_header')
    <h1>Registros de Vacunación</h1>
@stop

@section('content')
    <a href="{{ route('vaccination_records.create') }}" class="btn btn-primary btn-sm mb-3">Nuevo</a>
    <table class="table table-hover table-dark dataTable">
        <thead>
        <tr>
            <th scope="col">Paciente</th>
            <th scope="col">Vacuna</th>
            <th scope="col">Fecha de Vacunación</th>
            <th scope="col">Dosis</th>
            <th scope="col" colspan="2">Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($vaccinationRecords as $vaccination)
            <tr>
                <td>{{ $vaccination->medicalHistory->patient->name }}</td>
                <td>{{ $vaccination->name }}</td>
                <td>{{ $vaccination->date }}</td>
                <td>{{ $vaccination->dose }}</td>
                <td><a href="{{ route('vaccination_records.edit', ['vaccination_record' => $vaccination->id]) }}"
                       class="btn btn-secondary btn-sm">Editar</a></td>
                <td>
                    <form action="{{ route('vaccination_records.destroy', [ 'vaccination_record' => $vaccination->id ]) }}" method="POST">
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
