<div class="row">
  {{-- <div class="col-lg-2 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-red">
      <div class="inner">
        <h3>{{ $republic->getNumberOfMembers() }}</h3>

        <p>{{ $republic->getNumberOfMembers() > 1 ? 'Membros' : 'Membro' }}</p>
      </div>
      <div class="icon">
        <i class="fa fa-{{ $republic->getNumberOfMembers() > 1 ? 'group' : 'user' }} fa-fw"></i>
      </div>
      <a href="#" class="small-box-footer">
        Detalhes <i class="fa fa-arrow-circle-right"></i>
      </a>
    </div>
  </div>
  <!-- ./col --> --}}

  <div class="col-lg-4 col-xs-6">
    <!-- small box -->
    <a href="{{ route('room.index', $republic->id) }}">
      <div class="small-box bg-aqua">
        <div class="inner">
          <h3>{{ $republic->getNumberOfRooms() }}</h3>

          <p>Número de Quartos</p>
        </div>
        <div class="icon">
          <i class="glyphicon glyphicon-bed"></i>
        </div>
        <span class="small-box-footer">Detalhes <i class="fa fa-arrow-circle-right"></i></span>
      </div>
    </a>
  </div>
  <!-- ./col -->

  <div class="col-lg-4 col-xs-6">
    <a href="{{ route('bill.index', $republic->id) }}">
      <!-- small box -->
      <div class="small-box bg-yellow">
        <div class="inner">
          <h3>Gastos</h3>

          <p>&nbsp;</p>
        </div>
        <div class="icon">
          <i class="fa fa-calculator fa-fw"></i>
        </div>
        <span class="small-box-footer">
          Detalhes <i class="fa fa-arrow-circle-right"></i>
        </span>
      </div>
    </a>
  </div>
  <!-- ./col -->

  <div class="col-lg-4 col-xs-12">
    <a href="#">
      <!-- small box -->
      <div class="small-box bg-green">
        <div class="inner">
          <h4>{{ $republic->getCurrentMonth() }}</h4>

          <p><span style="font-size: 1.3em; font-weight: 800;">R$ {{ number_format($republic->getMonthlyCosts(), 2, ',', '.') }}</span> | Sua Parte: R$ {{ number_format($republic->getMonthlyCostsPerMember(), 2, ',', '.') }}</p>
        </div>
        <div class="icon">
          <i class="fa fa-archive"></i>
        </div>
        <span class="small-box-footer">
          Detalhes da Caixinha <i class="fa fa-arrow-circle-right"></i>
        </span>
      </div>
    </a>
  </div>
  <!-- ./col -->
</div>
<!-- /.row -->