<?php
defined('BASEPATH') OR exit('No direct script access allowed');


?>
<body style="background-color: #00420c;">

<div class="container">
	
		<div class="col-md-12 padding-">
			<h1 style="color:white" class="text-center">Usuário: <?php echo $this->session->userData[0]->nome_usuario;?></h1>
		</div><br><br>
		
	<div class="container">					
		
			<div class="container col-md-12">
				<form id="target" action='<?php echo base_url('reserva_controller/reserva_model');?>' method="POST">
				<input type="hidden" name="prontuario" id="prontuario" value="<?php echo $this->session->userData[0]->prontuario_usuario;?>">
				<div class="row">
					<div class="col-md-12">
						<label for="descricao" style="color:white">Descrição da Reserva</label><br>
						<input class="form-control" type="text" name="descricao_equipamento">
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<label for="senha" style="color:white">Data da Reserva Inicial</label><br>
						<input class="form-control" type="text" id="data_inicial" name="data_inicial">
					</div>
					<div class="col-md-6">
						<label for="senha" style="color:white">Data Final da Reserva</label><br>
						<input class="form-control" type="text" id="data_final" name="data_final">
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
							<label  style="display:none;" class="label-cadastro" style="color:white">Categoria</label><br>
								<select style="display:none;"   name="categoria" class="form-control ">
							        <?php foreach ($categorias as $item): ?>
							            <option value='<?=$item->id_categoria?>'>
							            <?= $item->descricao_categoria?>
							            </option> 
							        <?php endforeach;?>
						       </select><br> 
					</div>
					<div class="col-md-6">
							<label  class="label-cadastro" style="color:white">Espaço</label><br>
								<select name="espaco" class="form-control " id="select_espaco">
							        <?php foreach ($espacos as $item): ?>
							            <option value='<?=$item->id_espaco?>'>
							            <?= $item->local_espaco?> - <?=$item->descricao_espaco?>
							            </option> 
							        <?php endforeach;?>
						       </select><br> 
					</div>
				</div>
				
				<div class="col-md-12" style="min-height	t:200px; background-color: white">
				 <?php
				 	$count = 0;
				 	
				  foreach ($categorias as $item): 

				  if( $count % 2 == 0 ){
				 		$cor = "white";
				 	}else{
				 		$cor = "#f2f2f2";
				 	}
				  ?>
				  <div class="row" style="padding:10px; background-color:<?php echo $cor ?>;" >	
						<div class="col-md-2">
								<input type="checkbox" name="equipamentos[]" value='<?=$item->id_categoria?>'> 
			          		 <?= $item->descricao_categoria?> 
			         
			            
						</div>
						<div class="col-md-3">
								<select name="quantidade" class="form-control ">
							        <?php foreach ($equipamento_id as $key => $value): ?>
							        	echo $value;
							            <option value='<?=$equipamento_id[$key]->id_equipamento?>'>
							            <?=$key+1?>
							            </option>   
							        <?php endforeach;?>
						       </select>
						
						</div>
								
					</div>		
							            
							            </option> 
					        <?php 
					        $count++;

					        endforeach;
					        ?>
		        </div>


				<div class="row">
					 <div class="col-md-12">
					 		<input type="submit" id="enviar_reserva" class="btn btn-primary" value="Enviar" >
					 </div>
				</div>
				
				</form>
			</div>
		
	</div>
</div>

</body>
</html>