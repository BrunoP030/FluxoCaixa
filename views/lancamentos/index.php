<div class="border p-4 col-md-12">
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Valor" aria-label="Valor"
                aria-describedby="basic-addon1" id="txtvalor">
        </div>
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Observação" aria-label="Observação"
                aria-describedby="basic-addon1" id="txtobs">
        </div>
        <div>
            <label class="form-label" for="lanc">Tipo Lançamento</label>
            <select class="form-select" aria-label="Selecione o tipo" id="lanc"></select>
                <label class="form-label" for="fluxo">Tipo Fluxo</label>
                <select class="form-select" aria-label="Selecione o tipo" id="fluxo"></select>
        </div><br>
        <div id="btncad">
            <button type="button" name="btnInc" id="btnInc" class="btn btn-primary mb-4">Incluir</button>
        </div>
</div><br>
<div id="relatorio">
  <?php if (isset($_SESSION['logado'])) { if($_SESSION['nivel']== 1){ ?>
    <div id="btnrlt">
        <center><button type="button" id="btnRlt" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal">Relatorios</button></center>
    </div>
    <?php }} ?>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="width: 637px;">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div>
         <label>Periodo do lançamento</label><br> 
        <input type="date" name="datainicio" id="datainicio"></input>
        <input type="date" name="datafim" id="datafim"></input>
        </div><br>
        <div>
          <button type="button" id="btnPsq" class="btn btn-primary mb-4">Pesquisar</button>
        </div>
        <table class="table table-hover" id="tbrelatorio">
            <thead>
                <tr>
                    <th>Tipo Lançamento</th>
                    <th>Tipo Fluxo</th>
                    <th>Valor</th>
                    <th>Data</th>
                    <th>Obs</th>
                </tr>
            </thead>
            <tbody id="lsrelatorio"></tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>