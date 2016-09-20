@extends('layouts.master')

@section('header_title')
  <h1>
    Cadastro de República
    <small>Seja Bem-Vindo!</small>
  </h1>

  <ol class="breadcrumb">
    <li class="active"><i class="fa fa-home"></i> Cadastro de República</li>
  </ol>
@stop

@section('content')
<!-- Main content -->
    <section class="content container">
      @include('republics.partials._form')
    </section>
    <!-- /.section -->
@stop

@section('specific_scripts')
<script type="text/javascript" src="/assets/js/estados.js"></script>
@stop

@section('inline_scripts')
<script type="text/javascript">
  var estados_array = []
  var cidades_array = []
  var counter = 0
  var counter1 = 0
  $( document ).ready(function() {
    for(aux in estados['estados']){
      estados_array.push({id: counter, text: estados['estados'][aux]['nome'] })
      counter++
    }

    $("#republicState").select2({
        placeholder: "Selecione um Estado",
        data: estados_array
    });

    $("#republicCity").select2({
        placeholder: "Selecione uma Cidade"
    });

    $("#republicState").change(function(){
      cidades_array = []
      $("#republicCity").empty()
      var id = $(this).select2('val')
      for(aux in estados['estados'][id]['cidades']){
        cidades_array.push({id: counter1, text:  estados['estados'][id]['cidades'][aux]})
        counter1++
      }
      console.log(cidades_array)
      $("#republicCity").select2({
        placeholder: "Selecione uma Cidade",
          data: cidades_array
      });
    });
  });

</script>
@stop