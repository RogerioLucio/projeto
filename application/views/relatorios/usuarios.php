
<body style="">
<div class="container">
      <div class="row">
  
        <div class="col-sm-9 col-sm-offset-3 col-md-12  main">
   
          <h2 class="sub-header">Usuários</h2>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th width="20%;">Nome</th>
                  <th width="20%;">CPF</th>
                  <th width="20%;">Prontuário</th>
                  <th width="20%;">Tipo de Usuário</th>
                  <th width="20%;">Status</th>
                  <th width="5%;">Editar</th>
                </tr>
              </thead>

              <?php 
              $count = 0;
                  echo "<tbody>";
                foreach ($resultado as $usuario) {
                  if($count % 2 == 1){
                     echo "<tr>";
                  }else{
                     echo "<tr style='background-color:white;'>";
                  }
                        echo "<td style='padding-right:10px'>" . $usuario->nome_usuario . "</td>";
                        echo "<td>" . $usuario->cpf_usuario . "</td>";
                        echo "<td>" . $usuario->prontuario_usuario . "</td>";
                        echo "<td>" . $usuario->tipo_usuario . "</td>";
                        if($usuario->status_usuario == 1){
                          echo "<td>Ativo</td>";
                        }else{
                          echo "<td>Desabilitado</td>";
                        }
                        
                        echo "<td> <span name='opc'  data-categoria='$usuario->id_usuario' id=". $usuario->id_usuario  . " ><i class='fa fa-cog' aria-hidden='true'></i></span></td>";
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
        <div class="modal-dialog"   >
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Editar Usuário</h4>
            </div>
            <div class="modal-body corpo">
            <table class="table table-striped campo">
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
  $("[name=opc]").on("click",function teste(){
    var id  = this.id;
    var id_cargo;
    var id_setor;
    $(".campo").html("");
     $.ajax({
      url: "<?php echo base_url('Relatorios_Controller/Relatorio_Usuarios')?>",
      data: 'id='+id,
      type: "post",
      success: function(data){
      var retorno_data = JSON.parse(data);
      $.each(retorno_data[0], function(key, value){ 
       if(key == 'id_usuario'){
        $(".campo").append(" <tr> <th> " + key + "  </th> <td id='modal_"+key+"'>"+ value +" </td> </tr>");
       }else if(key != 'id_usuario' && key != 'id_setor' && key != 'id_cargo' && key != 'status_usuario'  && key != 'nome_cargo'){
        $(".campo").append(" <tr> <th> " + key + "  </th> <td> <input type='text' id='modal_" +key+"' class='form-control' value='" + value + "'> </td> </tr>");
       }
       if(key == 'status_usuario'){
          $(".campo").append(" <tr> <th> " + key + "</th> <td> <select id='modal_" +key+"' class='form-control js_status'><option value='1'>Ativo</option> <option value='0'>Desabilitado</option></select> </td> </tr>");
          $("#modal_status_usuario").val(value);
       }    
        if(key == 'id_cargo'){
          id_cargo  = value;
        }

        if(key == 'id_setor'){
          id_setor  = value;
        }
      }); 
        $(".campo").append(" <tr> <th> Cargo</th> <td> <select id='modal_id_cargo' class='form-control'></select> </td> </tr>");
        $(".campo").append(" <tr> <th> Setor</th> <td> <select id='modal_id_setor' class='form-control'></select> </td> </tr>");
        $.ajax({
          url: "<?php echo base_url('Geral_Controller/CarregaSelectCargos')?>",
          type: "post",
          success: function(data2){
            var retorno_usuario = JSON.parse(data2);
            var i = 0;
            $(retorno_usuario).each(function(){

           $("#modal_id_cargo").append("<option value='" + retorno_usuario[i].id_cargo + "' >" + retorno_usuario[i].nome_cargo + " </option>");
             i++;   
            })
        }});  
        $.ajax({
          url: "<?php echo base_url('Geral_Controller/CarregaSelectSetor')?>",
          type: "post",
          success: function(data2){
            var retorno_usuario = JSON.parse(data2);
            console.log(retorno_usuario);
            var i = 0;
            $(retorno_usuario).each(function(){
            $("#modal_id_setor").append("<option value='" + retorno_usuario[i].id_setor + "' >" + retorno_usuario[i].nome_setor + " </option>");
              i++;   
            })
        }});  


       $("#modal_id_cargo").val(id_cargo);
       $("#modal_id_setor").val(id_setor);
 
      }})
      $('#myModal').modal('show'); 
  });

      
      $("[name=salvar]").on("click",function(){
        var values = {'id_usuario': $("#modal_id_usuario").text(), 
                      'nome_usuario': $("#modal_nome_usuario").val(), 
                      'rg_usuario' : $("#modal_rg_usuario").val(),
                      'tipo_usuario' : $("#modal_tipo_usuario").val(),
                      'prontuario_usuario' : $("#modal_prontuario_usuario").val(),
                      'senha_usuario' : $("#modal_senha_usuario").val(),
                      'login_usuario' : $("#modal_login_usuario").val(),
                      'email_usuario' : $("#modal_email_usuario").val(),
                      'cpf_usuario' : $("#modal_cpf_usuario").val(),
                      'nascimento_usuario' : $("#modal_nascimento_usuario").val(),
                      'telefone_usuario' : $("#modal_telefone_usuario").val(),
                      'celular_usuario' : $("#modal_celular_usuario").val(),
                      'observacoes_usuario' : $("#modal_observacoes_usuario").val(),
                      'sexo_usuario' : $("#modal_sexo_usuario").val(),
                      'data_senha_usuario' : $("#modal_data_senha_usuario").val(),
                      'status_usuario' : $("#modal_status_usuario").val(),
                      'cargo' : $("#modal_id_cargo").val(),
                      'setor' : $("#modal_id_setor").val()}


        $.ajax({
        url: "<?php echo base_url('Relatorios_Controller/Atualiza_Usuario')?>",
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

<style >


  .modal-dialog {
      width: 800px !important ;
      margin: 30px auto;
  }
  .corpo{
    height: 400px !important;
    box-sizing: border-box !important;
    overflow: auto !important;
  }

</style>