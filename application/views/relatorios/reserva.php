
<body style="">
<div class="container">
      <div class="row">
  
        <div class="col-sm-9 col-sm-offset-3 col-md-12  main">
      
          <h2 class="sub-header"> Relatório de Reservas </h2>

          
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
                  if($patrimonio->status_equipamento == 1){
                        $status = "Disponível";
                  }else if($patrimonio->status_equipamento == 2){
                        $status = "Reservado";
                  }else if($patrimonio->status_equipamento == 3){
                        $status = "Descartado";
                  }
                       
                  echo "<td style='padding-right:10px'>" . $patrimonio->auxiliar . "</td>";
                  echo "<td>" . $patrimonio->nome_usuario . "</td>";
                  echo "<td>" . $patrimonio->data_inicio_reserva . "</td>";
                  echo "<td>" . $patrimonio->data_final_reserva . "</td>";
                  echo "<td>" . $status . "</td>";
                  echo "<td> <span name='opc'  data-categoria='$patrimonio->auxiliar' id=". $patrimonio->auxiliar  . " ><i class='fa fa-cog' aria-hidden='true'></i></span></td>";
                  echo "<tr>";
                  $count++;
                }
                echo "</tbody>";
               ?> 
            </table>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="pull-right">
            <input type="button" value="Gerar Relatório" name="js_rl_reserva" class="btn btn-primary mr-3 mt-4" name="">
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
              <button type="button" class="btn btn-default" name="fechar" data-dismiss="modal">Fechar</button>
            </div>
          </div>
        </div>
        </div>
</body>

<script type="text/javascript">
    var id  = this.id;
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

  });

     $("[name=js_rl_reserva]").on ('click',function(){
      var data = $(".main").html();
      // var win=window.open('<?php echo base_url('reserva_controller/gera_pdf')?>');
      open('<?php echo base_url('reserva_controller/gera_pdf')?>?'+$(".main").html(),  'teste', '_blank');

     });
     /*
   $("[name=js_rl_reserva]").on ('click',function(){
  
      $.ajax({
      url: "<?php #echo base_url('reserva_controller/gera_pdf')?>",
      type: "post",
      data: 'html='+$(".main").html(),
      contentType: "application/xml; charset=utf-8",
      success: function(data){
       // console.log(data);
         var win = window.open('', '_blank');
         //win.location.href = data;

      }
      });
    });*/
</script>
<style type="text/javascript">
  .modal-dialog {
      width: 1300px !important ;
      margin: 30px auto;
  }





</style>