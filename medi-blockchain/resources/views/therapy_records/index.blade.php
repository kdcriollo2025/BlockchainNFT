@extends('adminlte::page')

@section('title', 'Registros de Terapia')

@section('content_header')
    <h1>Registros de Terapia</h1>
@stop

@section('content')
    <a href="{{ route('therapy_records.create') }}" class="btn btn-primary btn-sm mb-3">Nuevo</a>
    <table class="table table-hover table-dark dataTable">
        <thead>
        <tr>
            <th scope="col">Paciente</th>
            <th scope="col">Tipo de Terapia</th>
            <th scope="col">Fecha de Inicio</th>
            <th scope="col">Fecha de Fin</th>
            <th scope="col">Notas de la Terapia</th>
            <th scope="col" colspan="2">Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($therapyRecords as $therapy)
            <tr>
                <td>{{ $therapy->medicalHistory->patient->name }}</td>
                <td>{{ $therapy->type }}</td>
                <td>{{ $therapy->start_date }}</td>
                <td>{{ $therapy->end_date }}</td>
                <td>{{ $therapy->detail }}</td>
                <td><a href="{{ route('therapy_records.edit', ['therapy_record' => $therapy->id]) }}"
                       class="btn btn-secondary btn-sm">Editar</a></td>
                <td>
                    <form action="{{ route('therapy_records.destroy', [ 'therapy_record' => $therapy->id ]) }}" method="POST">
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
