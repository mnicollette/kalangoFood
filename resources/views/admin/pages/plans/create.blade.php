@extends('adminlte::page')

@section('title', 'Planos')

@section('content_header')
    <h1>Criar Novo Plano</h1>
@stop

@section('content')
    <div class="card">

      <div class="card-body">
        <form class="form" action="{{ route('plans.store') }}" method="post">
          @csrf

          @include('admin.includes.alerts')

          <div class="form-group">
            <label for="">Nome</label>
            <input type="text" name="name" class="form-control" placeholder="Nome do plano" value="{{ old('name') }}">
          </div>
          <div class="form-group">
            <label for="">Preço</label>
            <input type="text" name="price" class="form-control" placeholder="Preço" value="{{ old('price') }}">
          </div>
          <div class="form-group">
            <label for="">Descrição</label>
            <input type="text" name="description" class="form-control" placeholder="Descrição" value="{{ old('description') }}">
          </div>
          <div class="form-group">
            <button type="submit">Cadastrar</button>
          </div>
        </form>
      </div>

    </div>
@stop
