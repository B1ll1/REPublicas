@extends('layouts.master')

@section('content')
<!-- Main content -->
    <section class="content">

     {{-- @include('layouts.partials.statistcs') --}}

      <section class="content-header">
      <h1>
        Gastos
        <small>
          <a href="{{ route('bill.create', $republic->id) }}" class="btn btn-success btn-flat btn-xs"><i class="fa fa-plus"></i> <b>Novo</b></a>
        </small>
      </h1>

      <ol class="breadcrumb">
        <li><a href="{{ route('republic.dashboard', $republic->id) }}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a></li>
        <li class="active"><i class="fa fa-calculator fa-fw"></i> Gastos</li>
      </ol>
      </section>
      <hr>

      {{-- <div id="bills" class="row">
        <div class="bill col-md-6 col-sm-6 col-xs-12" v-for="bill in bills">
          <div class="bill-box">
            <span class="bill-box-icon bg-@{{ bill.billtype.color }}"><i class="fa fa-@{{ bill.billtype.icon }} fa-fw"></i></span>

              <div class="bill-box-content" data-toggle="tooltip" title="Editar" data-placement="top">
                <span class="bill-box-title">@{{ bill.billtype.name }} de @{{ bill.name }}
                </span>
                <span class="bill-box-img pull-left">
                  <img src="{{ (isset($bill->responsible) && $bill->responsible->photo != '') ? route('images', [$bill->responsible->photo, 128]) : '/assets/images/default-avatar.jpg' }}" class="img img-circle" alt="Responsible avatar photo">
                </span>
                <span class="bill-box-text">&nbsp;</span>
                <span class="bill-box-text">&nbsp;</span>
                <span class="bill-box-text">Responsável: <span class="bill-box-important">@{{ bill.responsible.name }}</span></span>
                <span class="bill-box-text pull-left">Vencimento: <span class="bill-box-important">@{{ bill.due_date }}</span></span>
                <span class="bill-box-number pull-right">R$ @{{ bill.value }}</span>
              </div>
              <!-- /.bill-box-content -->
          </div>
          <!-- /.bill-box -->
        </div>
        <!-- /.col -->
      </div> --}}

      <div class="row">
        <div class="bill-rent col-md-6 col-sm-6 col-xs-12">
          <div class="bill-box">
            <span class="bill-box-icon bg-navy"><i class="fa fa-dollar fa-fw"></i></span>

              <div class="bill-box-content">
                <span class="bill-box-title">Aluguel de {{ $republic->getCurrentMonth() }}</span>

                <span class="bill-box-text">&nbsp;</span>
                <span class="bill-box-text">&nbsp;</span>
                <span class="bill-box-text">&nbsp;</span>

                <span class="bill-box-text pull-left">Vencimento: <span class="bill-box-important">{{ $republic->getCurrentMonth() }}</span></span>
                <span class="bill-box-number pull-right">R$ {{ number_format($republic->getRentValue(), 2, ',', '.') }}</span>
              </div>
              <!-- /.bill-box-content -->
          </div>
          <!-- /.bill-box -->
        </div>
        <!-- /.col -->

        @foreach($bills as $key => $bill)
        <div class="bill-{{$bill->id}} col-md-6 col-sm-6 col-xs-12">
          <div class="bill-box">
            <span class="bill-box-icon bg-{{$bill->billtype->color }}"><i class="fa fa-{{ $bill->billtype->icon }} fa-fw"></i></span>

            <a href="{{ route('bill.edit', [$republic->id, $bill->id]) }}">
              <div class="bill-box-content" data-toggle="tooltip" title="Editar" data-placement="top">
                <span class="bill-box-title">{{ $bill->billtype->name }} de {{ $bill->name }}
                  @if($bill->due_date->lt(Carbon\Carbon::now()))
                    <span class="bill-box-label label label-danger pull-right">Atrasado</span>
                  @endif
                </span>
                <span class="bill-box-img pull-left">
                  <img src="{{ (isset($bill->responsible) && $bill->responsible->photo != '') ? route('images', [$bill->responsible->photo, 128]) : '/assets/images/default-avatar.jpg' }}" class="img img-circle" alt="Responsible avatar photo">
                </span>
                <span class="bill-box-text">&nbsp;</span>
                <span class="bill-box-text">&nbsp;</span>
                <span class="bill-box-text">Responsável: <span class="bill-box-important">{{ $bill->responsible->name or 'Não definido'}}</span></span>
                <span class="bill-box-text pull-left">Vencimento: <span class="bill-box-important">{{ $bill->due_date->format('d/m/Y') }}</span></span>
                <span class="bill-box-number pull-right">R$ {{ $bill->value }}</span>
              </div>
              <!-- /.bill-box-content -->
            </a>
          </div>
          <!-- /.bill-box -->
        </div>
        <!-- /.col -->
        @endforeach
      </div>
      <!-- /.row -->

      <div class="row">
        <div class="col-md-12 col-xs-12 text-center">
          {!! $bills->render() !!}
        </div>
      </div>
    </section>
    <!-- /.section -->
@stop

@section('specific_scripts')
  {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.26/vue.min.js"></script> --}}
@stop

@section('inline_scripts')
<script>
    $(document).ready(function() {
        $('[data-toggle="tooltip"]').tooltip();

        $('.deleteBillType').on('click', function(e) {
          e.preventDefault();

          var billId = $(this).data('type-id');
          var republicId = {{ $republic->id }};

          $.ajax({
              headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
              method: 'DELETE',
              url: '/' + republicId + '/contas/' + billId + '/deletar',
              dataType: 'json'
          })
          .done(function(data) {
              if(data.status == 'success') {
                $('#billtype-'+data.billtypeId).remove();
              }
          });
        });

        // var billsComponent = new Vue({
        //   el: '#bills',
        //   data: {
        //     bills: [],
        //   },
        //   methods: {

        //   },
        //   ready: function() {
        //     this.bills = {!! json_encode($bills) !!};
        //   }
        // });
    });
</script>
@endsection