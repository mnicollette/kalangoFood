@extends('adminlte::page')

@section('title', 'Planos')

@section('content_header')
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
        <table class="table table-condensed">
          <thead>
            <tr>
              <th>Nome</th>
              <th>Preço</th>
              <th>Descrição</th>
              <th style="width:100px;">Ações</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($plans as $plan)
              <tr>
                <td>{{ $plan->name }}</td>
                <td>R$ {{ number_format($plan->price, 2, ",", ".") }}</td>
                <td>{{ $plan->description }}</td>
                <td>
                  <a href="{{ route('plans.show', $plan->url) }}" class="btn btn-warning float-left">VER</a>
                  <form class="" action="{{ route('plans.destroy', $plan->url) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">EXCLUIR</button>
                  </form>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
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
