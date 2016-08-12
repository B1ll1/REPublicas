{!! Form::model(new Republicas\Models\BillType, ['route' => ['bill.type.store', $republic->id], 'method' => 'POST']) !!}
  <div class="row">
    <div class="col-md-6 col-md-offset-3 col-xs-12">
      <div class="box box-success">
        <div class="box-header with-border">
          {{-- <h3 class="box-title">Dados Gerais</h3> --}}
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="form-group">
            <label for="billTypeName">Nome</label>
            {!! Form::text('name', null, ['id' => 'billTypeName', 'class' => 'form-control']) !!}
          </div>
          <label for="billTypeDescription">Descrição</label>
          <div class="form-group">
            {!! Form::textarea('description', null, ['id' => 'billTypeDescription', 'class' => 'form-control', 'rows' => 10, 'style' => 'resize:none']) !!}
          </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <div class="col-md-8 col-md-offset-2 col-xs-12 text-center">
            <button type="submit" class="btn btn-primary btn-flat"><i class="fa fa-save fa-fw"></i> Salvar</button>&nbsp;&nbsp;
            <a class="btn btn-danger btn-flat" href="{{ route('bill.type.index', $republic->id) }}"><i class="fa fa-undo fa-fw"></i> Voltar</a>
          </div>
        </div>
      </div>
    </div>
  </div>
{!! Form::close() !!}