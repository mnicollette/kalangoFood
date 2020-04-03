@extends('adminlte::page')

@section('title', 'Editar Detalhe do Planos')

@section('content_header')
    <h1>Editar Detalhe do Plano</h1>
@stop

@section('content')
    <div class="card">

      <div class="card-body">
        <form class="form" action="{{ route('details.plan.update', ['url'=>$plan->url, 'idDetail'=>$detail->id]) }}" method="post">
          @csrf
          @method('PUT')

          @include('admin.includes.alerts')

          <div class="form-group">
            <label for="">Detalhe do Plano</label>
            <input type="text" name="name" class="form-control" placeholder="Nome do plano" value="{{ $detail->name ?? old('name') }}">
          </div>
          <div class="form-group">
            <button type="submit">Salvar</button>
          </div>
        </form>
      </div>

    </div>
@stop
