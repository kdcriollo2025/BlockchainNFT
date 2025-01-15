@extends('adminlte::page')

@section('title', 'Registros de Cirugía')

@section('content_header')
    <h1>Registros de Cirugía</h1>
@stop

@section('content')
    <a href="{{ route('surgery_records.create') }}" class="btn btn-primary btn-sm mb-3">Nuevo</a>
    <table class="table table-hover table-dark dataTable">
        <thead>
        <tr>
            <th scope="col">Paciente</th>
            <th scope="col">Tipo de Cirugía</th>
            <th scope="col">Fecha de Cirugía</th>
            <th scope="col">Detalles de la Cirugía</th>
            <th scope="col" colspan="2">Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($surgeryRecords as $surgery)
            <tr>
                <td>{{ $surgery->medicalHistory->patient->name }}</td>
                <td>{{ $surgery->type }}</td>
                <td>{{ $surgery->date }}</td>
                <td>{{ $surgery->details }}</td>
                <td><a href="{{ route('surgery_records.edit', ['surgery_record' => $surgery->id]) }}"
                       class="btn btn-secondary btn-sm">Editar</a></td>
                <td>
                    <form action="{{ route('surgery_records.destroy', [ 'surgery_record' => $surgery->id ]) }}" method="POST">
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
