@extends('adminlte::page')

@section('title', 'Editar Plano')

@section('content_header')
<h1>Editar Plano</h1>
@stop

@section('content')

<div class="card">
    <div class="card-body">
        <form action=" {{route('plan.update', $plan->url)}}" method="post" class="form">
            @csrf
            @method('PUT')

            @include('admin.pages.plans._partials.form')

        </form>
    </div>
</div>
@stop
