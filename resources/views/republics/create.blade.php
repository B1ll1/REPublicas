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