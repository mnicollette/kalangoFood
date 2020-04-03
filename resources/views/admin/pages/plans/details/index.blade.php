@extends('adminlte::page')

@section('title', "Detalhe do Plano {$plan->name}")

@section('content_header')
  <ol class="breadcrumb">
    <li class="breadcrumb-item "><a href="{{ route('admin.index') }}">Dashboard</a></li>
    <li class="breadcrumb-item "><a href="{{ route('plans.index') }}">Planos</a></li>
    <li class="breadcrumb-item "><a href="{{ route('plans.show', $plan->url) }}">{{$plan->name}}</a></li>
    <li class="breadcrumb-item active"><a href="{{ route('details.plan.index', $plan->url) }}">Detalhe</a></li>
  </ol>

  <h1>Detalhe do Plano {{ $plan->name }} <a href="{{ route('details.plan.create', $plan->url) }}" class="btn btn-dark">adicionar</a></h1>

@stop

@section('content')
    <div class="card">

      <div class="card-body">
          @include('admin.includes.alerts')

          @if(count($details)==0)
            <p>Não consta registros</p>
          @else

            <table class="table table-condensed">
              <thead>
                <tr>
                  <th>Nome</th>
                  <th style="width:180px;">Ações</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($details as $detail)
                  <tr>
                    <td>{{ $detail->name }}</td>

                    <td>

                      <a href="{{ route('details.plan.edit', ['url'=>$plan->url, 'idDetail'=>$detail->id]) }}" class="btn btn-info float-left"><i class="far fa-edit"></i></a>
                      <form class="" action="{{ route('details.plan.destroy', ['url'=>$plan->url, 'idDetail'=>$detail->id]) }}" method="post">
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
          {!! $details->appends($filters)->links() !!}
        @else
          {!! $details->links() !!}
        @endif
      </div>
    </div>
@stop
