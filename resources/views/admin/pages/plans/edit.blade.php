@extends('adminlte::page')

@section('title', 'Planos')

@section('content_header')
    <h1>Editar Plano</h1>
@stop

@section('content')
    <div class="card">

      <div class="card-body">
        <form class="form" action="{{ route('plans.update', $plan->url) }}" method="post">
          @csrf
          @method('PUT')

          @include('admin.includes.alerts')

          <div class="form-group">
            <label for="">Nome</label>
            <input type="text" name="name" class="form-control" placeholder="Nome do plano" value="{{ $plan->name }}">
          </div>
          <div class="form-group">
            <label for="">Preço</label>
            <input type="text" name="price" class="form-control" placeholder="Preço" value="{{ $plan->price }}">
          </div>
          <div class="form-group">
            <label for="">Descrição</label>
            <input type="text" name="description" class="form-control" placeholder="Descrição" value="{{ $plan->description }}">
          </div>
          <div class="form-group">
            <button type="submit">Salvar</button>
          </div>
        </form>
      </div>

    </div>
@stop
