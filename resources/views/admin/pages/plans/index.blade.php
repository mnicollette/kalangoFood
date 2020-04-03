@extends('adminlte::page')

@section('title', 'Planos')

@section('content_header')
  <ol class="breadcrumb">
    <li class="breadcrumb-item "><a href="{{ route('admin.index') }}">Dashboard</a></li>
    <li class="breadcrumb-item active"><a href="{{ route('plans.index') }}">Planos</a></li>
  </ol>

  <h1>Planos <a href="planos/criar" class="btn btn-dark">adicionar</a></h1>

@stop

@section('content')
    <div class="card">
      <div class="card-header">
        <form class="form form-inline" action="{{ route('plans.search') }}" method="post">
          @csrf
          <input type="text" name="filter" placeholder="" class="form-control" value="{{ $filters['filter'] ?? '' }}">
          <button type="submit" class="btn btn-dark">Filtrar</button>
        </form>
      </div>
      <div class="card-body">
        @if(count($plans)==0)
          <p>Não consta registros</p>
        @else
        <table class="table table-condensed">
          <thead>
            <tr>
              <th>Nome</th>
              <th>Preço</th>
              <th>Descrição</th>
              <th style="width:250px;">Ações</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($plans as $plan)
              <tr>
                <td>{{ $plan->name }}</td>
                <td>R$ {{ number_format($plan->price, 2, ",", ".") }}</td>
                <td>{{ $plan->description }}</td>
                <td>
                  <a href="{{ route('details.plan.index', $plan->url) }}" class="btn btn-warning float-left"><i class="far fa-eye"></i>Detalhe</a>
                  <a href="{{ route('plans.show', $plan->url) }}" class="btn btn-warning float-left"><i class="far fa-eye"></i></a>
                  <a href="{{ route('plans.edit', $plan->url) }}" class="btn btn-info float-left"><i class="far fa-edit"></i></a>
                  <form class="" action="{{ route('plans.destroy', $plan->url) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
                  </form>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
        @endif
      </div>
      <div class="card-footer">
        @if (isset($filters))
          {!! $plans->appends($filters)->links() !!}
        @else
          {!! $plans->links() !!}
        @endif
      </div>
    </div>
@stop
