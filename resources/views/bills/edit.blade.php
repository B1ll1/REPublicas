@extends('layouts.master')

@section('content')
<!-- Main content -->
    <section class="content">

      <section class="content-header">
      <h1>
        <i class="fa fa-plus fa-fw"></i>Altere os detalhes deste GASTO
      </h1>

      <ol class="breadcrumb">
        <li><a href="{{ route('republic.dashboard', $republic->id) }}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a></li>
        <li><a href="{{ route('bill.index', $republic->id) }}"></a><i class="fa fa-calculator fa-fw"></i> Gastos</li>
        <li class="active">Editando</li>
      </ol>
      </section><br>

      <div class="row">
        {!! Form::model($bill, ['route' => ['bill.update', $republic->id, $bill->id], 'method' => 'PUT']) !!}
        @include('bills.partials._form')
        {!! Form::close() !!}
      </div>
      <!-- /.row -->
@stop

@section('inline_scripts')
<script>
    $(document).ready(function() {
      $('#billSelectType').select2({
        theme: 'bootstrap',
        width: '100%',
        placeholder: 'Selecione uma categoria de gasto...'
      });

      $('#billSelectUser').select2({
        theme: 'bootstrap',
        width: '100%',
        placeholder: 'Selecione um responsável para este gasto...'
      });
    });
</script>
@endsection