
<body style="">
<div class="container">
      <div class="row">
  
        <div class="col-sm-9 col-sm-offset-3 col-md-12  main">
   
          <h2 class="sub-header">Section title</h2>
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

              var_dump($resultado);
             
                  echo "<tbody>";
                foreach ($resultado as $patrimonio) {
                        echo "<tr>";
                        echo "<td style='padding-right:10px'>" . $patrimonio->patrimonio_equipamento . "</td>";
                         echo "<td>" . $patrimonio->patrimonio_equipamento . "</td>";
                        echo "<td>" . $patrimonio->id_categoria . "</td>";
                        echo "<td>" . $patrimonio->status_equipamento . "</td>";
                        echo "<td> <span name='opc'  id=". $patrimonio->id_equipamento  . " ><i class='fa fa-cog' aria-hidden='true'></i></span></td>";
                      echo "/<tr>";
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
                <tr>
                  <th width="20%;">Numero de Patrimônio</th>
                  <th width="20%;">Nome</th>
                  <th width="20%;">Categoria</th>
                  <th width="20%;">Status</th>
                  <th width="20%;">Espaços</th>
                  <th align="center" width="5%;">Editar</th>
                </tr>
              </thead>
              <tbody>
                    <td id="numero_patrimonio"> </td>
                    <td id="nome_patrimonio"></td>
                    <td id="categoria_patrimonio"></td>
                    <td id="status_patrimonio"></td>
                    <td >
                      <select   class="form-control" id="espaco_patrimonio"> 
                      </select>
                    </td>
                    <td > <span name='opc' ><i class='fa fa-cog' aria-hidden='true'></i></span></td>
                </tbody>
            </table
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
            </div>
          </div>
        </div>
        </div>

</body>

<script type="text/javascript">
    $("[name=opc]").on("click",function teste(){
      var id  = this.id

        $.ajax({
          url: "<?php echo base_url('Geral_Controller/CarregaSelectEspacos')?>",
          //data: 'id='+id,
          type: "post",
          success: function(data){

              var retorno_data = JSON.parse(data);
              var i = 0;
              var teste = '';
                /*
              $(retorno_data).each(function(){

                  teste +="<option id='" + retorno_data[i].id_espaco + "'>"+ retorno_data[i].local_espaco +"</option>";
                  
                })
*/

                $(retorno_data).each(function(){
                  //console.log(retorno_data[i]);
                    $("#espaco_patrimonio").append("<option id='" + retorno_data[i].id_espaco + "'>"+ retorno_data[i].local_espaco +"</option>");
                   i++;
                })
        }})


        $.ajax({
          url: "<?php echo base_url('Relatorios_Controller/Relatorio_Patrimonio')?>",
          data: 'id='+id,
          type: "post",
          success: function(data){
              var retorno_data = JSON.parse(data);
                 $("#numero_patrimonio").html(retorno_data[0].patrimonio_equipamento);
                 $("#numero_patrimonio").html(retorno_data[0].patrimonio_equipamento);
                 $("#numero_patrimonio").html(retorno_data[0].patrimonio_equipamento);
                $("#numero_patrimonio").html(retorno_data[0].patrimonio_equipamento);
        }})

      $('#myModal').modal('show'); 




          // Carrega espaço
      
    });
</script>

<style type="text/javascript">


  .modal-dialog {
      width: 1300px !important ;
      margin: 30px auto;
  }





</style>