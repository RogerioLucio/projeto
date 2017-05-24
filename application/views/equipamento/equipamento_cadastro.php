<!DOCTYPE html>
<html>
<head>
	<title>Cadastro de Equipamentos</title>
	<script src="<?php echo base_url('assets/js/equipamentos/equipamentos_atualiza.js')?>"></script>
</head>
<body>
	<div class="container">
		
		<div class="pagina-equipamentos espacamento">					
			
				<div class="div_login">
					<form action='<?php echo base_url('equipamento/cadastro');?>' method="POST">
						<div class="row">
							<div class="col-md-12">
								<label for="patrimonio" >Patrimônio </label><br>
								<input class="form-control" type="text" name="patrimonio" value="<?php if(isset($patrimonio_equipamento)) echo $patrimonio_equipamento?>" <?php if(isset($patrimonio_equipamento)) echo 'disabled'?>>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<label for="status">Status</label><br>
								<input class="form-control" type="text" name="status" value="<?php if(isset($status_equipamento))echo $status_equipamento?>" <?php if(isset($status_equipamento) && $status_equipamento == 'Descartado') echo 'disabled'?>>
							</div>
						</div>
						<div class="row">
							<div class="col-md-10">
								<label for="categoria">Categoria</label><br>
								<select name="categoria" id="getCategorias" class="form-control" <?php if(isset($id_categoria)) echo 'disabled'?> >
									<option value="<?php if(isset($id_categoria))echo $id_categoria?>" selected></option>
								</select>
							</div>
							<?php if(isset($data_delet_excl)){
								$data = date_create($data_delet_excl);
								echo '<div class="col-md-8"><span class="alert-danger"><br>Equipamento descartado em '.date_format($data,"d/m/Y ").'</span></div><br/>';
							}
							?>

							<div class="col-md-2">
								<label for="novaCategoria">Nova Categoria</label><br>
								<!-- Trigger the modal with a button -->
  								<button name="novaCategoria" type="button" class="btn btn-primary " data-toggle="modal" data-target="#modalCategoria"><i class="fa fa-fw fa-plus"></i></button>
							</div>

						</div>
						<div class="row">
							<div class="col-md-12">
							<label for="novoEspaco">Descrição</label><br>
							<input type="text" name="novoEspaco" class="form-control" value="<?php if(isset($novoEspaco))echo $novoEspaco?>">
							</div>
						</div>
						<div class="row">
							<div class="col-md-10">
							<label for="espaco">Espaço</label><br>
								<select name="espaco"  id="getEspaco" class="form-control">
									<?php 
										foreach ($espacos as $espaco) {
											echo '<option value="'.$espaco->id_espaco.'">'.$espaco->local_espaco.'</option>';
										}
									?>
								</select>
							</div>
							<div class="col-md-2">
								<label for="novaEspaco">Novo Espaço</label><br>
								<!-- Trigger the modal with a button -->
							  	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalEspaco"><i class="fa fa-fw fa-plus"></i></button>
							</div>
						</div>
						<br>
						<div class="row">
							 <div class="col-md-12">
							 		<input type="submit" class="btn btn-primary" value="Cadastrar" name="cadastrar" <?php if(isset($patrimonio_equipamento)) echo 'disabled'?>>
							 		<input type="hidden" name="base_url" value="<?php echo base_url()?>" />
							 		<input type="button" class="btn btn-primary" id="atualizar" value="Atualizar" />
							 </div>
						</div>
					</form>
				</div>
		</div>


	<div class="container">
	 

	  <!-- Modal -->
	  <div class="modal fade" id="modalCategoria" role="dialog">
	    <div class="modal-dialog">
		    
	      <!-- Modal content-->
	      <div class="modal-content">
	        <div class="modal-header">
	          <h4 class="modal-title">Nova Categoria</h4>
	          <button type="button" class="close" data-dismiss="modal">&times;</button>
	        </div>

		   	<form action='<?php echo base_url('categoria/cadastro');?>' method="POST">
	        <div class="modal-body">
	           	<label for="novaCategoria">Categoria</label>
				<input type="text" name="novaCategoria" class="form-control" value="<?php if(isset($novaCategoria))echo $novaCategoria ?>">   
			
			</div>
	        <div class="modal-footer">
	        	<div class="col-md-12">
					<input type="submit" class="btn btn-primary pull-right" value="Cadastrar" name="cadastrar">
					<input type="hidden" name="base_url" value="<?php echo base_url()?>" />
				</div>
	        </div>
	        </form>
	      </div>
		      
	 	</div>
	  
	</div>
	</div>

	<!-- MODAL NOVO Espaço -->

	<div class="container">
	  
	  

	  <!-- Modal -->
	  <div class="modal fade" id="modalEspaco" role="dialog">
	    <div class="modal-dialog">
		    
	      <!-- Modal content-->
	      <div class="modal-content">
	        <div class="modal-header">
	          <h4 class="modal-title">Novo Espaço</h4>
	          <button type="button" class="close" data-dismiss="modal">&times;</button>
	        </div>
		   	<form action='<?php echo base_url('espaco/cadastro');?>' method="POST">
	        <div class="modal-body">
	           	<label for="local">Local</label><br>
				<input type="text" name="local" class="form-control" value="<?php if(isset($local))echo $local?>">
				<label for="descricao_espaco">Descrição</label><br>
				<input type="text" name="descricao_espaco" class="form-control" value="<?php if(isset($descricao_espaco))echo $descricao_espaco?>">       
			</div>
	        <div class="modal-footer">
	        	<div class="col-md-12">
					<input type="submit" class="btn btn-primary pull-right" value="Cadastrar" name="cadastrar">
					<input type="hidden" name="base_url" value="<?php echo base_url()?>" />
				</div>
	        </div>
	        </form>
	      </div>
		      
	 	</div>
	 </div>
</div>
		
	</div>
</body>
</html>