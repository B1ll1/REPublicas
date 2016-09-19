@extends('layouts.master')

@section('content')
<!-- Main content -->
    <section class="content">

     {{-- @include('layouts.partials.statistcs') --}}

      <section class="content-header">
      <h1>
        Tipos de Gasto
        <small>
          <a href="{{ route('bill.type.create', $republic->id) }}" class="btn btn-success btn-flat btn-xs"><i class="fa fa-plus"></i> <b>Novo</b></a>
        </small>
      </h1>

      <ol class="breadcrumb">
        <li><a href="{{ route('republic.dashboard', $republic->id) }}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a></li>
        <li><i class="fa fa-calculator fa-fw"></i> Gastos</li>
        <li class="active"><i class="fa fa-money"></i> Tipos</li>
      </ol>
      </section><br>

      <div class="row">
        @foreach($generalBilltypes as $key => $billtype)
        <div class="billtype-{{$billtype->id}} col-md-6 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-{{ $billtype->color }}"><i class="fa fa-{{ $billtype->icon }} fa-fw"></i></span>

            <div class="info-box-content">
              <span class="info-box-number">{{ $billtype->name }}
                @unless($billtype->id <= 5)
                <a class="btn btn-xs btn-danger btn-flat pull-right" data-toggle="tooltip" title="Apagar tipo de gasto" data-placement="top">&times;</a>
                @endunless
              </span>
              <span class="info-box-text">&nbsp;</span>
              <span class="info-box-text">{{ $billtype->description }}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        @endforeach

        @foreach($republic->billtypes as $key => $billtype)
        <div id="billtype-{{$billtype->id}}" class="billtype col-md-6 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-{{ $billtype->color }}"><i class="fa fa-{{ $billtype->icon }} fa-fw"></i></span>

            <div class="info-box-content">
              <span class="info-box-number">{{ $billtype->name }}
                <a class="deleteBillType btn btn-xs btn-danger btn-flat pull-right" data-type-id="{{ $billtype->id }}" data-toggle="tooltip" title="Apagar tipo de gasto" data-placement="top">&times;</a>
              </span>
              <span class="info-box-text">&nbsp;</span>
              <span class="info-box-text">{{ $billtype->description }}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        @endforeach
      </div>
      <!-- /.row -->

    </section>
    <!-- /.section -->
@stop

@section('inline_scripts')
<script>
    $(document).ready(function() {
        $('[data-toggle="tooltip"]').tooltip();

        $('.deleteBillType').on('click', function(e) {
          e.preventDefault();

          var billtypeId = $(this).data('type-id');
          var republicId = {{ $republic->id }};

          $.ajax({
              headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
              method: 'DELETE',
              url: '/' + republicId + '/contas/tipos/' + billtypeId + '/deletar',
              dataType: 'json'
          })
          .done(function(data) {
              if(data.status == 'success') {
                $('#billtype-'+data.billtypeId).remove();
              }
          });
        });
    });
</script>
@endsection