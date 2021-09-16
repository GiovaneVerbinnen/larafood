@extends('adminlte::page')

@section('title', 'Detalhes do Plano')

@section('content_header')
<h1> Detalhes do Plano</h1>
@stop

@section('content')

<div class="card">
    <div class="card-body">
        <ul class="list-group">
            <li class="list-group-item"> <strong>Nome:</strong> {{$plan->name}}</li>
            <li class="list-group-item"> <strong>URL:</strong> {{$plan->url}}</li>
            <li class="list-group-item"> <strong>Preço:</strong> R$ {{number_format($plan->price, 2, ',', '.')}}</li>
            <li class="list-group-item"> <strong>Descrição:</strong> {{$plan->description}}</li>
            <form action="{{ route('plans.destroy', $plan->url)}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger mt-4">Deletar</button>
            </form>
        </ul>
    </div>
</div>
@stop
