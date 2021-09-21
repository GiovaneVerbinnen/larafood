@extends('adminlte::page')

@section('title', 'Planos')

@section('content_header')
<ol class="breadcrumb my-2">
    <li class="breadcrumb-item"><a href=" {{route('admin.index')  }} ">Dasboard</a></li>
    <li class="breadcrumb-item active"><a href=" {{route('plans.index')  }} ">Planos</a></li>
</ol>

<h1>Planos
    <a href="{{ route('plans.create')}}" class="btn btn-sm btn-outline-primary ">
        <i class="fas fa-plus"></i>
        Add</a></h1>

@stop


@section('content')
<p>Listagem dos planos</p>
<div class="card">
    <div class="card-header">
        <form action="{{ route('plans.search') }}" method="POST" class="form form-inline">
            @csrf
            <div class="form-group">
                <input type="text" name="filter" placeholder="Pesquisa" value="{{$filters['filter'] ?? ''}}"
                    class="form-control">
                <button type="submit" class="btn btn-outline-dark mx-2"> <i class="fas fa-search"></i> Filtrar</button>
                <button type="button" class="btn  mx-2">Limpar Filtros</button>
            </div>
        </form>
    </div>
    <div class="card-body">
        <table class="table table condensed">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Preço</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @if ($plans)
                @foreach ($plans as $plan)
                <tr>
                    <td>{{$plan->name}}</td>
                    <td>R$ {{number_format($plan->price, 2, ',', '.')}}</td>
                    <td>
                        <a href="{{route('details.plan.index', $plan->url)}}"
                            class="btn btn-sm btn-success">Detalhes</a>
                    </td>
                    <td>
                        <a href="{{route('plans.show', $plan->url)}}" class="btn btn-sm btn-primary">Ver</a>
                    </td>
                    <td>
                        <a href="{{route('plan.edit', $plan->url)}}" class="btn btn-sm btn-warning">Editar</a>
                    </td>
                    <td>
                        <form action="{{ route('plans.destroy', $plan->url)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Deletar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
                @else
                <p>Não há planos cadastrados</p>
                @endif
            </tbody>
        </table>
    </div>
    {{-- <div class="card-footer">
        @if (isset($filters))
        {!! $details ?? ''->appends($filters)->links() !!}
        @else
        {!! $details ?? ''->links() !!}
        @endif
    </div> --}}
</div>
@stop
