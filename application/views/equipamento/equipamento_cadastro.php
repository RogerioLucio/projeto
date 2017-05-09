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
							<div class="col-md-12">
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
						</div>
						<div class="row">
							<div class="col-md-12">
							<label for="descricao">Descrição</label><br>
							<input type="text" name="descricao" class="form-control" value="<?php if(isset($descricao))echo $descricao?>">
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
							<label for="descricao">Espaço</label><br>
								<select name="espaco"  id="getEspaco" class="form-control">
									<?php 
										foreach ($espacos as $espaco) {
											echo '<option value="'.$espaco->id_espaco.'">'.$espaco->local_espaco.'</option>';
										}
									?>
								</select>
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
	</div>
</body>
</html>