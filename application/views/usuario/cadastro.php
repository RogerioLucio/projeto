	<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	?>

	<body style="">

	<div class="container">
		<div class="pagina" style="border-radius: 10px; padding-top: 20px;">					
				<div class="div_cadastro">
					<form action='<?php echo base_url('usuario_controller/cadastro_model');?>' method="POST">
						<div class="row">	
							<div class="col-md-12">	
								<div class="text-left">	
									<h2><label class="label-cadastro">Cadastro de Usuário</label></h2>
								</div>
							</div>
						</div>
					<div class="row">
						<div class="col-md-6">
							<label for="usuario" class="label-cadastro">Prontuário </label>
							<input class="form-control" type="text" name="prontuario">
						</div>
						<div class="col-md-6">
							<label for="usuario" class="label-cadastro">Nome </label><br>
							<input class="form-control" type="text" name="nome">
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<label for="senha" class="label-cadastro">Senha</label><br>
							<input class="form-control" type="text" name="senha">
						</div>
						<div class="col-md-6">
							<label for="senha" class="label-cadastro">Rg</label><br>
							<input class="form-control" type="text" name="rg">
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<label for="senha" class="label-cadastro">Email</label><br>
							<input class="form-control" type="email" name="email">
						</div>
						<div class="col-md-6">
							<label for="senha" class="label-cadastro">Login</label><br>
							<input class="form-control" type="text" name="login">
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<label for="senha" class="label-cadastro">Cpf</label><br>
							<input class="form-control" type="text" name="cpf">
						</div>
						<div class="col-md-6">
							<label for="senha" class="label-cadastro">Data de Nascimento</label><br>
							<input class="form-control" type="text" name="data_nasc">
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<label for="senha" class="label-cadastro">Telefone</label><br>
							<input class="form-control" type="text" name="telefone">
						</div>
						<div class="col-md-6">
							<label for="senha" class="label-cadastro">Celular</label><br>
							<input class="form-control" type="text" name="celular">
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<label for="senha" class="label-cadastro">Observações</label><br>
							<input class="form-control" type="text" name="observacoes">
						</div>
						<div class="col-md-6">
							<label for="senha" class="label-cadastro">Sexo</label><br>
							<input class="form-control" type="text" name="sexo">
						</div>
					</div>
					<div class="row">
						<div class="col-md-10">
							<label  class="label-cadastro">Cargo</label><br>
								<select name="cargo" class="form-control ">
							        <?php foreach ($cargo as $item): ?>
							            <option value='<?=$item->id_cargo?>'>
							            <?= $item->nome_cargo?>
							            </option> 
							        <?php endforeach;?>
						       </select><br> 
						</div>
						<div class="col-md-2">
							<label for="novoCargo">Novo Cargo</label>
							</br>
							<button name="novoCargo" type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalCargo"><i class="fa fa-fw fa-plus"></i></button>
						</div>
						
					</div>

					<div class="row">


					<div class="col-md-10">
							<label  class="label-cadastro">Setor</label><br>
								 <select name="setor" class="form-control ">
							        <?php foreach ($setor as $item): ?>
							            <option value='<?=$item->id_setor?>'>
							            <?= $item->nome_setor?>
							            </option> 
							        <?php endforeach;?>
						       </select>
						       <br/>
						</div>

					<div class="col-md-2">
						<label for="novoSetor">Novo Setor</label>
						</br>
						<button name="novoSetor" type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalSetor"><i class="fa fa-fw fa-plus"></i></button>
					</div>

					</div>



					<div class="row">
						 <div class="col-md-12 text-right">
						 		<input type="submit" id="login_entrar" class="btn btn-primary" value="Cadastrar" >
						 </div>
					</div>
					
					</form>
				</div>

				
	<div class="container">


	  <!-- Modal -->
	  <div class="modal fade" id="modalSetor" role="dialog">
	    <div class="modal-dialog">
		    
	      <!-- Modal content-->
	      <div class="modal-content">
	        <div class="modal-header">
	          <h4 class="modal-title">Novo Setor</h4>
	          <button type="button" class="close" data-dismiss="modal">&times;</button>
	        </div>
		   	<form action='<?php echo base_url('setor/cadastro');?>' method="POST">
	        <div class="modal-body">
	           	<label for="novoSetor">Nome</label>
				<input type="text" name="novoSetor" class="form-control" value="<?php if(isset($novoSetor))echo $novoSetor?>">       
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

	<!-- MODAL novo Cargo -->

	<div class="container">
	  <!-- Modal -->
	  <div class="modal fade" id="modalCargo" role="dialog">
	    <div class="modal-dialog">
		    
	      <!-- Modal content-->
	      <div class="modal-content">
	        <div class="modal-header">
	          <h4 class="modal-title">Novo Cargo</h4>
	          <button type="button" class="close" data-dismiss="modal">&times;</button>
	        </div>
		   	<form action='<?php echo base_url('cargo/cadastro');?>' method="POST">
	        <div class="modal-body">
	           	<label for="novoCargo">Nome</label>
				<input type="text" name="novoCargo" class="form-control" value="<?php if(isset($novoCargo))echo $novoCargo?>">       
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


	</body>
	</html>