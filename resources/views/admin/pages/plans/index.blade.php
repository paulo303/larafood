@extends('adminlte::page')

@section('title', $title)

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Planos</li>
    </ol><br>

    <h1>{{ $title }} <a href="{{ route('plans.create') }}" class="btn btn-dark">ADD</a></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{ route('plans.search') }}" method="get" class="form form-inline">
                {{-- @csrf --}}
                <input type="text" name="filter" id="filter" placeholder="Nome" class="form-control" value="{{ $filters['filter'] ?? '' }}">
                <button type="submit" class="btn btn-dark">Filtrar</button>
            </form>
        </div>
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th class="text-center">Preço</th>
                        <th class="text-center" width="200">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($plans as $plan)
                        <tr>
                            <td>
                                {{ $plan->name }}
                            </td>
                            <td class="text-center">
                                R$ {{ number_format($plan->price, 2, ',', '') }}
                            </td>
                            <td class="text-center">
                                <a href="{{ route('plans.edit', $plan->url) }}" class="btn btn-info">EDIT</a>
                                <a href="{{ route('plans.show', $plan->url) }}" class="btn btn-warning">VER</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" align="center">Nenhum resultado encontrado</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if (isset($filters))
                {{ $plans->appends($filters)->links() }}
            @else
                {{ $plans->links() }}
            @endif

        </div>
    </div>
@stop

{{-- @section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop --}}
