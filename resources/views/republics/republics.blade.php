@extends('layouts.master')

@section('specif_styles')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css">


@stop

@section('content')
<div class="col-md-12">
<table id="republics_table" class="table table-bordered"  cellspacing="0" width="100%" style="text-align: center;">
      <thead class="thead-inverse" style="background-color: #00a65a">
      <tr >
          <th style="text-align: center;">ID</th>
          <th style="text-align: center;">Nome</th>
          <th style="text-align: center;">Status</th>
      </tr>
      </thead>
  </table>
@stop

@section('specific_scripts')
<script type="text/javascript" src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
@stop

@section('inline_scripts')
<script type="text/javascript">
  $(document).ready(function() {
  $('#republics_table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route("data_republics") !!}',
                columns: [
                    { data: 'id', name: 'republics.id'},
                    { data: 'name', name: 'republics.name' },
                    { data: 'telephone', name: 'republics.telephone' },
                ]
            });
});
</script>

@stop