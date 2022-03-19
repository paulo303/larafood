@extends('adminlte::page')

@section('title', $title)

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('plans.index') }}">Planos</a></li>
        <li class="breadcrumb-item active">Detalhes</li>
    </ol>

    <h1>Detalhes do <b>{{ $plan->name }}</b></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            #filtros
        </div>
        <div class="card-body">
            <ul>
                <li><strong>Nome: </strong>{{ $plan->name }}</li>
                <li><strong>URL: </strong>{{ $plan->url }}</li>
                <li><strong>Preço: </strong>R$ {{ number_format($plan->price, 2, ',', '') }}</li>
                <li><strong>Descrição: </strong>{{ $plan->description }}</li>
            </ul>

            <form action="{{ route('plans.destroy', $plan->url) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> DELETAR O {{ strtoupper($plan->name) }}</button>
            </form>
        </div>
    </div>
@stop

{{-- @section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop --}}
