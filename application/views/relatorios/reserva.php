<body style="">
<div class="container">
      <div class="row">
  
        <div class="col-sm-9 col-sm-offset-3 col-md-12  main">
   
          <h2 class="sub-header">Relatório de Reservas </h2>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th width="20%;">Nº da Reserva</th>
                  <th width="20%;">Usuário</th>
                  <th width="20%;">Data de Inicio</th>
                  <th width="20%;">Data de Final</th>
                  <th width="20%;">Status</th>
                  <th width="5%;">Visualizar</th>
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
                  // if($patrimonio->status_reserva == 1){
                  //       $status = "Disponível";
                  // }else if($patrimonio->status_reserva == 2){
                  //       $status = "Reservado";
                  // }else if($patrimonio->status_reserva == 3){
                  //       $status = "Descartado";
                  // }
                       
                  echo "<td style='padding-right:10px'>" . $patrimonio->auxiliar . "</td>";
                  echo "<td>" . $patrimonio->nome_usuario . "</td>";
                  echo "<td>" . $patrimonio->data_inicio_reserva . "</td>";
                  echo "<td>" . $patrimonio->data_final_reserva . "</td>";
                  echo "<td>" . $patrimonio->status_reserva . "</td>";
                  echo "<td> <span name='opc'  data-categoria='$patrimonio->auxiliar' id=". $patrimonio->auxiliar  . " r55555555555555555><i class='fa fa-cog' aria-hidden='true'></i></span></td>";
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
              <h4 class="modal-title">Relatório de Reserva</h4>
            </div>
            <div class="modal-body">
              <table class="table table-striped">
                <thead>
                  <tr id="teste">
                    <th width="20%;">Nome Equipamento</th>
                    <th width="20%;">Nº Patrimônio</th>
                    <th width="20%;">Descrição da Categoria</th>
                  </tr>
                </thead>
                <tbody class="camp">
               
              </table>
            </div>
            <div class="mensagem"> </div>
            <div class="modal-footer">
              <a href="" id="relatorio_devolucao" target="_blank" class="btn btn-primary" name="devolucao">Registrar Devolução</a>
              <button type="button" class="btn btn-default" name="fechar" data-dismiss="modal">Fechar</button>
            </div>
          </div>
        </div>
        </div>
</body>

<script type="text/javascript">
    var id  = this.id;
    $('input[name=id]').val(id);
  $("[name=opc]").on("click",function teste(){
    $(".camp").html("");
    id  = this.id;
    var categoria_linha = $(this).data("categoria");

    $.ajax({
      url: "<?php echo base_url('Relatorios_Controller/Relatorio_Reservas')?>",
      type: "post",
      data: 'id='+id,
      success: function(data){
      var retorno_data = JSON.parse(data);
      var i = 0;
      var teste = '';         
      $("#espaco_patrimonio").html("");
      $(retorno_data).each(function(){
        $(".camp").append("<tr><td>" + retorno_data[i].nome_equipamento + "</td> <td>" + retorno_data[i].patrimonio_equipamento + "</td> <td>" + retorno_data[i].descricao_categoria + "</td> </tr>");
        i++;
        })
      }})

    $('#myModal').modal('show'); 
      href = 'Reserva_Controller/relatorio_devolucao?'+id;
    $('#relatorio_devolucao').attr('href', '<?php echo base_url("Reserva_Controller/relatorio_devolucao?id=")?>'+this.id);
  });
</script>
<style type="text/javascript">


  .modal-dialog {
      width: 1300px !important ;
      margin: 30px auto;
  }





</style>