@extends('layouts.master')

@section('content')
<!-- Main content -->
    <section class="content">

     {{-- @include('layouts.partials.statistcs') --}}

      <section class="content-header">
      <h1>
        Editando Quarto
        <small>República {{$republic->name}}</small>
      </h1>

      <ol class="breadcrumb">
        <li><a href="{{ route('republic.dashboard', $republic->id) }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="{{ route('room.index', $republic->id) }}"><i class="fa fa-bed"></i> Quartos</a></li>
        <li class="active">Editando Quarto</li>
      </ol>
      </section><br>

        {!! Form::model($room, ['route' => ['room.update', $room->republic->id, $room->id], 'method' => 'PUT']) !!}
          <div class="row">
            <div class="col-md-6 col-md-offset-3 col-xs-12">
              <div class="box box-success">
                <div class="box-header with-border">
                  {{-- <h3 class="box-title">Dados Gerais</h3> --}}
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <div class="form-group">
                    <label for="roomNumBeds">Número de Camas</label>
                    {!! Form::number('num_beds', null, ['id' => 'roomNumBeds', 'class' => 'form-control']) !!}
                  </div>
                  <label for="roomPrice">Preço</label>
                  <div class="form-group input-group">
                    <span class="input-group-addon"><strong>R$</strong></span>
                    {!! Form::number('price', null, ['id' => 'roomPrice', 'class' => 'form-control', 'step' => 'any']) !!}
                  </div>
                  <div class="form-group">
                    <label for="roomType">Tipo</label>
                    {!! Form::select('type', ['normal' => 'Normal', 'suite' => 'Suíte'], null, ['id' => 'roomType', 'class' => 'form-control']) !!}
                  </div>
                  <div class="form-group">
                    <label for="roomUsers">Morador</label>
                    <select id="roomUsers" name="user_id[]" class="form-control select2" multiple="multiple">
                      @foreach($republic->users as $key => $user)
                        <option value="{{ $user->id }}" {{ ((isset($room->users[$key]) ? $room->users[$key]->id : null) == $user->id) ? 'selected' : '' }}>{{ $user->name}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                  <div class="col-md-8 col-md-offset-2 col-xs-12 text-center">
                    <button type="submit" class="btn btn-primary btn-flat"><i class="fa fa-save fa-fw"></i> Salvar</button>&nbsp;&nbsp;
                    <a class="btn btn-danger btn-flat" href="{{ route('room.index', $republic->id) }}"><i class="fa fa-undo fa-fw"></i> Voltar</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        {!! Form::close() !!}
@stop

@section('inline_scripts')
<script>
  $(document).ready(function() {

      $('.select2').select2({
        theme: 'bootstrap',
        width: '100%',
        maximumSelectionLength: {{ $room->num_beds }},
        language: {
          "noResults": function() {
              return "Nenhum resultado encontrado...";
          },
          "maximumSelected": function() {
              return "Este quarto suporta apenas {{$room->num_beds}} {{ $room->num_beds > 1 ? 'moradores' : 'morador'}}";
          }
        }, escapeMarkup: function(markup) {
              return markup;
        }
      });

  });
</script>
@stop
