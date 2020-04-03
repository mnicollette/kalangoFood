@extends('adminlte::page')

@section('title', "Adicionar novo detalhe do Plano {$plan->name}")

@section('content_header')
  <ol class="breadcrumb">
    <li class="breadcrumb-item "><a href="{{ route('admin.index') }}">Dashboard</a></li>
    <li class="breadcrumb-item "><a href="{{ route('plans.index') }}">Planos</a></li>
    <li class="breadcrumb-item "><a href="{{ route('plans.show', $plan->url) }}">{{$plan->name}}</a></li>
    <li class="breadcrumb-item active"><a href="{{ route('details.plan.index', $plan->url) }}">Detalhe</a></li>
  </ol>

  <h1>Adiconar novo detalhe do Plano {{ $plan->name }} </h1>

@stop

@section('content')
    <div class="card">

      <div class="card-body">
        <form class="form" action="{{ route('details.plan.store', $plan->url) }}" method="post">
          @csrf

          @include('admin.includes.alerts')

          <div class="form-group">
            <label for="">Detalhe</label>
            <input type="text" name="name" class="form-control" placeholder="Detalhe do plano" value="{{ old('name') }}">
          </div>

          <div class="form-group">
            <button type="submit">Cadastrar</button>
          </div>
        </form>
      </div>

    </div>
@stop
