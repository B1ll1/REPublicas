<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      {{-- <! search form >
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form> --}}
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        {{-- <li class="header">MAIN NAVIGATION</li> --}}

        @if(isset($republic))
        <li class="{{ strpos(Request::url(), 'dashboard') ? 'active' : '' }} treeview">
          <a href="{{ route('republic.dashboard', $republic->id) }}">
            <i class="fa fa-dashboard fa-fw"></i> <span>Dashboard</span>
          </a>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-calculator fa-fw"></i> <span>Gastos</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>

          <ul class="treeview-menu">
            <li class="active"><a href="{{ route('bill.type.index', $republic->id) }}"><i class="fa fa-money"></i> Tipos de Gastos</a></li>
            <li><a href="{{ route('bill.index', $republic->id) }}"><i class="fa fa-eye"></i> Ver Todos</a></li>
          </ul>
        </li>

        <li class="{{ strpos(Request::url(), 'quartos') ? 'active' : '' }}">
          <a href="{{ route('room.index', $republic->id) }}">
            <i class="glyphicon glyphicon-bed"></i> <span>Quartos</span>
          </a>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-bar-chart fa-fw"></i> <span>Histórico de Gastos</span>
          </a>
        </li>
        @else
        <li class="treeview">
          <a href="#">
            <i class="fa fa-home"></i> <span>Repúblicas</span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="{{ route('republics') }}"><i class="fa fa-eye"></i> Ver todas</a></li>
            <li><a href="{{ route('republic.create') }}"><i class="fa fa-plus"></i> Cadastrar República</a></li>
          </ul>
        </li>

        @endif
      </ul>

    </section>
    <!-- /.sidebar -->
  </aside>