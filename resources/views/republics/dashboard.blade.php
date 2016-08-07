@extends('layouts.master')

@section('content')
<!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>X</h3>

              <p>Número de Quartos</p>
            </div>
            <div class="icon">
              <i class="glyphicon glyphicon-bed"></i>
            </div>
            <a href="#" class="small-box-footer">
              Detalhes <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <!-- ./col -->

        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>X</h3>

              <p>Membros</p>
            </div>
            <div class="icon">
              <i class="fa fa-group fa-fw"></i>
            </div>
            <a href="#" class="small-box-footer">
              Detalhes <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <!-- ./col -->

        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h4>Mês Atual</h4>

              <p>Total: R$ 0,00 | User: R$ 0,00</p>
            </div>
            <div class="icon">
              <i class="fa fa-archive"></i>
            </div>
            <a href="#" class="small-box-footer">
              Detalhes <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.section -->
@stop