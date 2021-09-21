@extends('adminlte::page')

@section('title', "Detalhes do plano {$plan->name}")

@section('content_header')
<ol class="breadcrumb my-2">
    <li class="breadcrumb-item"><a href=" {{route('admin.index')  }} ">Dasboard</a></li>
    <li class="breadcrumb-item"><a href=" {{route('plans.index')  }} ">Planos</a></li>
    <li class="breadcrumb-item"><a href=" {{route('plans.show')  }} ">{{$plan->name}}</a></li>
    <li class="breadcrumb-item active"><a href=" {{route('details.plans.index', $plan->url)  }} ">Planos</a></li>
</ol>

<h1>Detalhes</h1>

@stop


@section('content')
<div class="card">

    <div class="card-body">
        <table class="table table condensed">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @if ($plans)
                @foreach ($details as $detail)
                <tr>
                    <td>
                        <a href="{{route('details.plan.index', $plan->url)}}" class="btn btn-sm btn-primary">Ver</a>
                    </td>
                    <td>
                        <a href="{{route('plans.show', $plan->url)}}" class="btn btn-sm btn-success">Ver</a>
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
        {!! $plans->appends($filters)->links() !!}
        @else
        {!! $plans->links() !!}
        @endif
    </div> --}}
</div>
@stop
