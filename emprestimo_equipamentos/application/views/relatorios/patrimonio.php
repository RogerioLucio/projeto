
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
                         echo "<td>" . $patrimonio->nome_equipamento . "</td>";
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


  <!-- Modal -->
  <div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">
          <p>Some text in the modal.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>

    </div>
</div>

</body>

<script type="text/javascript">
    $("[name=opc]").on("click",function teste(){
      var id  = this.id


    $.ajax({
      url: "<?php echo base_url('Relatorios_Controller/Relatorio_Patrimonio')?>",
      data: 'id='+id,
      type: "post",
      success: function(data){
        
        $(data).each(function(){
          //console.log(this.id_equipamento);
        })
     

        $('#myModal').modal('show'); 
    }});
      
    });
</script>