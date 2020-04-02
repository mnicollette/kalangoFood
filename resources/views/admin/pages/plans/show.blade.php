@extends('adminlte::page')

@section('title', 'Planos')

@section('content_header')
    <h1>Detalhe do Plano <b>{{ $plan->name }}</b></h1>
@stop

@section('content')
    <div class="card">

      <div class="card-body">
        <ul>
          <li>
            <strong>Nome: </strong> {{ $plan->name }}
          </li>
          <li>
            <strong>URLs: </strong>  {{ $plan->url }}
          </li>
          <li>
            <strong>Preço: </strong>  R$ {{ number_format($plan->price, 2, ",", ".") }}
          </li>
          <li>
            <strong>Descrição: </strong>  {{ $plan->description }}
          </li>
        </ul>

        <form class="" action="{{ route('plans.destroy', $plan->url) }}" method="post">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger">EXCLUIR</button>
        </form>

      </div>

    </div>
@stop
