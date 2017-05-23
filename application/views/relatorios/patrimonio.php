
<body style="">
<div class="container">
      <div class="row">
  
        <div class="col-sm-9 col-sm-offset-3 col-md-12  main">
   
          <h2 class="sub-header">Patrimônios Cadastrados</h2>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th width="20%;">Numero de Patrimônio</th>
                  <th width="20%;">Nome</th>
                  <th width="20%;">Categoria</th>
                  <th width="20%;">Status</th>
                  <th width="5%;">Editar</th>
                </tr>
              </thead>

              <?php 

                  echo "<tbody>";
                  $count = 0;
                foreach ($resultado as $patrimonio) {
                  if($count % 2 == 1){
                     echo "<tr>";
                  }else{
                     echo "<tr style='background-color:white;'>";
                  }
                  if($patrimonio->status_equipamento == 1){
                        $status = "Disponível";
                  }else if($patrimonio->status_equipamento == 2){
                        $status = "Reservado";
                  }else if($patrimonio->status_equipamento == 3){
                        $status = "Descartado";
                  }
                          
                  echo "<td style='padding-right:10px'>" . $patrimonio->patrimonio_equipamento . "</td>";
                  echo "<td>" . $patrimonio->nome_equipamento . "</td>";
                  echo "<td>" . $patrimonio->descricao_categoria . "</td>";
                  echo "<td>" . $status . "</td>";
                  echo "<td> <span name='opc'  data-categoria='$patrimonio->id_categoria' id=". $patrimonio->id_equipamento  . " ><i class='fa fa-cog' aria-hidden='true'></i></span></td>";
                  echo "<tr>";
                  $count++;
                }
                echo "</tbody>";
               ?> 
            </table>
          </div>
        </div>
      </div>

      <!-- Modal content-->
     <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog" style=" width: 1300px !important">
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Novo Usuário</h4>
            </div>
            <div class="modal-body">
              <table class="table table-striped">
                <thead>
                  <tr id="teste">
                    <th width="20%;">Numero de Patrimônio</th>
                    <th width="20%;">Nome</th>
                    <th width="20%;">Categoria</th>
                    <th width="20%;">Status</th>
                    <th width="20%;">Espaços</th>
                    <th align="center" width="5%;">Editar</th>
                  </tr>
                </thead>
                <tbody>
                    <td id="numero_patrimonio"></td>
                    <td>
                        <input class="form-control" type="text/html" id="nome_patrimonio" name="">
                    </td>
                    <td >
                      <select  id="categoria_patrimonio"  class="form-control" > </select>
                    </td>
                    <td>
                      <select  id="status_patrimonio"  class="form-control" > 
                        <option value="1" > Disponível </option>
                        <option value="2" > Reservado </option>
                        <option value="3" > Descartado </option>
                      </select>
                    </td>
                    <td>
                      <select   class="form-control"  id="espaco_patrimonio"> </select>
                    </td>
                    <td> <span name='opc' ><i class='fa fa-cog' aria-hidden='true'></i></span></td>
                    
                </tbody>
              </table>
            </div>
            <div class="mensagem"> </div>
            <div class="modal-footer">
            
            <button type="button" name="salvar"  class="btn btn-default" >Salvar</button>
              <button type="button" class="btn btn-default" name="fechar" data-dismiss="modal">Fechar</button>
            </div>
          </div>
        </div>
        </div>
</body>

<script type="text/javascript">
    var id  = this.id;
  $("[name=opc]").on("click",function teste(){
    id  = this.id;
    var categoria_linha = $(this).data("categoria");

    $.ajax({
      url: "<?php echo base_url('Geral_Controller/CarregaSelectEspacos')?>",
      type: "post",
      success: function(data){
      var retorno_data = JSON.parse(data);
      var i = 0;
      var teste = '';         
      $("#espaco_patrimonio").html("");
      $(retorno_data).each(function(){
        $("#espaco_patrimonio").append("<option value='" + retorno_data[i].id_espaco + "' id='" + retorno_data[i].id_espaco + "'>"+ retorno_data[i].local_espaco +"</option>");
        i++;
        })
      }})

        $.ajax({
          url: "<?php echo base_url('Geral_Controller/CarregaSelectCategorias')?>",
          type: "post",
          success: function(data2){
            var retorno_patrimonio = JSON.parse(data2);
            var j = 0;
            var teste = '';    
            $("#categoria_patrimonio").html("");
            $(retorno_patrimonio).each(function(){
              $("#categoria_patrimonio").append("<option value='" + retorno_patrimonio[j].id_categoria + "'>"+ retorno_patrimonio[j].descricao_categoria +"</option>");
               j++;
            })
        }});
        $.ajax({
          url: "<?php echo base_url('Relatorios_Controller/Relatorio_Patrimonio')?>",
          data: 'id='+id,
          type: "post",
          success: function(data){
              var retorno_data = JSON.parse(data);
              
                 $("#numero_patrimonio").html(retorno_data[0].patrimonio_equipamento);
                 $("#nome_patrimonio").val(retorno_data[0].nome_equipamento);
                 $("#categoria_patrimonio").val(retorno_data[0].id_categoria);
                 $("#status_patrimonio ").val(retorno_data[0].status_equipamento);
                 $("#espaco_patrimonio ").val(retorno_data[0].id_espaco);
        }})
        
        $("#categoria_patrimonio").val(categoria_linha);

      $('#myModal').modal('show'); 
      });

      
      $("[name=salvar]").on("click",function(){
        var values = {'id_equipamento':id, 
                      'nome_equipamento': $("#nome_patrimonio").val(), 
                      'id_categoria' : $("#categoria_patrimonio").val(),
                      'status_equipamento' : $("#status_patrimonio").val(),
                      'id_espaco' : $("#espaco_patrimonio").val()}
        $.ajax({
        url: "<?php echo base_url('Relatorios_Controller/Atualizar_Patrimonio')?>",
        data: values,
        type: "post",
        success: function(data){
              $(".mensagem").html("<div class='alert alert-success'>Patrimônio Atualizado</div>");
        }})
      });
      $("[name=fechar]").on("click",function(){
        $('#myModal').on('hidden.bs.modal', function (e) {
          location.reload();
        })
      });

</script>

<style type="text/javascript">


  .modal-dialog {
      width: 1300px !important ;
      margin: 30px auto;
  }





</style>