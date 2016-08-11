{!! Form::model(new Republicas\Models\Republic, ['route' => 'republic.store', 'method' => 'POST', 'class' => '']) !!}
<div class="row">
  <div class="col-md-6 col-xs-12">
    <div class="box box-success">
      <div class="box-header with-border">
        <h3 class="box-title">Dados Gerais</h3>
      </div>
      <!-- /.box-header -->
        <div class="box-body">
          <div class="form-group">
            <label for="republicName">Nome</label>
            <input type="text" name="name" class="form-control" id="republicName" placeholder="Nome da república">
          </div>
          <div class="form-group">
            <label for="republicPhone">Telefone</label>
            <input type="text" name="telephone" class="form-control" id="republicPhone" placeholder="Telefone">
          </div>
          <div class="form-group">
            <label for="republicSimpleRooms">Número de Quartos Simples</label>
            <input type="number" name="simple_rooms" class="form-control"  id="republicSimpleRooms" placeholder="5..." min="0">

            {{-- <p class="help-block">Example block-level help text here.</p> --}}
          </div>
          <div class="form-group">
            <label for="republicSuiteRooms">Número de Quartos suite</label>
            <input type="number" name="suite_rooms" class="form-control" id="republicSuiteRooms" placeholder="3..." min="0">
          </div>
          <div class="form-group">
            <label for="republicVacancy">Vagas</label>
            <input type="number" name="vacancy" class="form-control" id="republicVacancy" placeholder="Quantidade vagas?" min="0">
          </div>
          <div class="form-group">
            <label for="republicDescrption">Descrição</label>
            <textarea name="description" class="form-control" id="republicDescrption" placeholder="Informações adicionais..." rows="5" style="resize: none;"></textarea>
          </div>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </div>
  <!-- /.col-->

  <div class="col-md-6 col-xs-12">
    <div class="box box-danger">
      <div class="box-header with-border">
        <h3 class="box-title">Endereço</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <div class="form-group">
          <label for="republicStreet">Rua</label>
          <input type="text" name="street" class="form-control" id="republicStreet" placeholder="Rua, número">
        </div>
        <div class="form-group">
          <label for="republicNeighbourhood">Bairro</label>
          <input type="text" name="neighbourhood" class="form-control" id="republicNeighbourhood" placeholder="Bairro">
        </div>
        <div class="form-group">
          <label for="republicCity">Cidade</label>
          <input type="text" name="city" class="form-control" id="republicCity" placeholder="Cidade">
        </div>
        <div class="form-group">
          <label for="republicState">Estado</label>
          <select id="republicState" name="state" class="form-control">
            <option value="0" disabled selected>Selecione um estado...</option>
            <option value="SP">São Paulo</option>
            <option value="MG">Minas Gerais</option>
          </select>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /.row -->
<div class="row">
  <div class="col-md-2 col-md-offset-5 col-xs-12">
    <button type="submit" class="btn btn-primary btn-flat btn-block"><i class="fa fa-save fa-fw"></i> Salvar</button>
  </div>
</div>
{!! Form::close() !!}
