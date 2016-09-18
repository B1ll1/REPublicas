<div class="row">
  <div class="col-md-6 col-md-offset-3 col-xs-12">
    <div class="box box-success">
      <div class="box-header with-border">
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <div class="form-group">
          <label for="billSelectType">Categoria</label>
          <select name="billtype_id" id="billSelectType" class="form-control">
            <option value=""></option>
            @foreach($generalBilltypes as $type)
            <option value="{{$type->id}}">{{ $type->name }}</option>
            @endforeach

            @foreach($republic->billtypes as $type)
            <option value="{{$type->id}}">{{ $type->name }}</option>
            @endforeach
          </select>
        </div>

        <div class="form-group">
          <label for="billName">Mês</label>
          {!! Form::text('name', null, ['id' => 'billName', 'class' => 'form-control']) !!}
        </div>

        <div class="form-group">
          <label for="billValue">Valor</label>
          {!! Form::text('value', null, ['id' => 'billValue', 'class' => 'form-control']) !!}
        </div>

        <div class="form-group">
          <label for="billDueDate">Data de Vencimento</label>
          {!! Form::text('due_date', null, ['id' => 'billDueDate', 'class' => 'form-control']) !!}
        </div>

        <div class="form-group">
          <label for="billSelectUser">Categoria</label>
          <select name="user_id" id="billSelectUser" class="form-control">
            <option value=""></option>
            @foreach($republic->users as $user)
            <option value="{{$user->id}}">{{ $user->name }}</option>
            @endforeach
          </select>
        </div>
      </div>
      <!-- /.box-body -->
      <div class="box-footer">
        <div class="col-md-8 col-md-offset-2 col-xs-12 text-center">
          <button type="submit" class="btn btn-primary btn-flat"><i class="fa fa-save fa-fw"></i> Salvar</button>&nbsp;&nbsp;
          <a class="btn btn-danger btn-flat" href="{{ route('bill.index', $republic->id) }}"><i class="fa fa-undo fa-fw"></i> Voltar</a>
        </div>
      </div>
    </div>
  </div>
</div>