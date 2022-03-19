@extends('adminlte::page')

@section('title', $title)

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('plans.index') }}">Planos</a></li>
        <li class="breadcrumb-item active">Editar</li>
    </ol>

    <h1>Editar o <b>{{ $plan->name }}</b></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('plans.update', $plan->url) }}" method="POST">
                @csrf
                @method('PUT')

                @include('admin.pages.plans._partials.form')
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
