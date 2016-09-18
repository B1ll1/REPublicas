@extends('layouts.master')

@section('content')
<!-- Main content -->
    <section class="content">

     {{-- @include('layouts.partials.statistcs') --}}

      <section class="content-header">
      <h1>
        Tipos de Gasto
        <small>
          Novo
        </small>
      </h1>

      <ol class="breadcrumb">
        <li><a href="{{ route('republic.dashboard', $republic->id) }}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a></li>
        <li><i class="fa fa-calculator fa-fw"></i> Gastos</li>
        <li><a href="{{ route('bill.type.index', $republic->id) }}"><i class="fa fa-money"></i> Tipos</a></li>
        <li class="active">Novo</li>
      </ol>
      </section><br>

      <div class="row">
        @include('billtypes.partials._form')
      </div>
      <!-- /.row -->
@stop

@section('inline_scripts')
<script>
    $(document).ready(function() {

    });
</script>
@endsection