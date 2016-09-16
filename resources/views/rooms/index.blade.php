@extends('layouts.master')

@section('content')
<!-- Main content -->
    <section class="content">

     @include('layouts.partials.statistcs')

      <section class="content-header">
      <h1>
        Quartos
        <small>República {{$republic->name}}</small>
      </h1>

      <ol class="breadcrumb">
        <li><a href="{{ route('republic.dashboard', $republic->id) }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><i class="fa fa-bed"></i> Quartos</li>
      </ol>
      </section><br>

      <div class="row">
        @foreach($republic->rooms as $key => $room)
        <div class="room col-md-3 col-sm-6 col-xs-12">
          <a href="{{ route('room.edit', [$republic->id, $room->id])}}">
            <div class="info-box">
              <span class="info-box-icon bg-green"><i class="fa fa-bed fa-fw"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">{{$room->type}}
                  <span class="label label-success pull-right" data-toggle="tooltip" title="Número de Camas" data-placement="top">{{$room->num_beds}}</span>
                </span>
                <span class="info-box-number">R$ {{ number_format($room->price, 2, ',', '.') }}</span>
                @foreach($room->users as $key2 => $user)
                <span class="info-box-img pull-right">
                  <img src="{{ route('images', [$user->photo, 30]) }}" class="img img-circle" data-toggle="tooltip" title="{{ $user->name }}" data-placement="top">&nbsp;
                </span>
                @endforeach
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </a>
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
    });
</script>
@endsection