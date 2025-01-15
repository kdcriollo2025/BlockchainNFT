@extends('adminlte::page')

@section('title', 'Consultas Médicas')

@section('content_header')
    <h1>Consultas Médicas</h1>
@stop

@section('content')
    <a href="{{ route('medical_consultation_records.create') }}" class="btn btn-primary btn-sm mb-3">Nueva</a>
    <table class="table table-hover table-dark dataTable">
        <thead>
        <tr>
            <th scope="col">Paciente</th>
            <th scope="col">Fecha de Consulta</th>
            <th scope="col">Síntomas Reportados</th>
            <th scope="col">Diagnóstico</th>
            <th scope="col">Tratamiento</th>
            <th scope="col" colspan="2">Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($medicalConsultationRecords as $consultation)
            <tr>
                <td>{{ $consultation->medicalHistory->patient->name }}</td>
                <td>{{ $consultation->consultation_date }}</td>
                <td>{{ $consultation->reported_symptoms }}</td>
                <td>{{ $consultation->diagnosis }}</td>
                <td>{{ $consultation->treatment }}</td>
                <td><a href="{{ route('medical_consultation_records.edit', ['medical_consultation_record' => $consultation->id]) }}"
                       class="btn btn-secondary btn-sm">Editar</a></td>
                <td>
                    <form action="{{ route('medical_consultation_records.destroy', [ 'medical_consultation_record' => $consultation->id ]) }}" method="POST">
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
