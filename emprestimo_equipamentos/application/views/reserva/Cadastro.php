<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<body style="background-color: #00420c;">

<div class="container">
	
		<div class="col-md-12">
			<h1 style="color:white" class="text-center">Usuário: <?php echo $this->session->userData[0]->nome_usuario;?></h1>
		</div><br><br>
		
	<div class="container col-md-9">					
		
			<div class="container col-md-12">
				<form action='<?php echo base_url('usuario_controller/login_model');?>' method="POST">
				<div class="row">
					<div class="col-md-12">
						<label for="usuario" style="color:white">Nome do Equipamento </label><br>
						<input class="form-control" type="text" name="nome_equipamento">
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<label for="senha" style="color:white">Data da Reserva Inicial</label><br>
						<input class="form-control" type="text" name="data_inicial">
					</div>
					<div class="col-md-6">
						<label for="senha" style="color:white">Data Final da Reserva</label><br>
						<input class="form-control" type="text" name="data_final">
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
							<label  class="label-cadastro" style="color:white">Categoria</label><br>
								<select name="categoria" class="form-control ">
							        <?php foreach ($categorias as $item): ?>
							            <option value='<?=$item->id_categoria?>'>
							            <?= $item->descricao_categoria?>
							            </option> 
							        <?php endforeach;?>
						       </select><br> 
					</div>
					<div class="col-md-6">
							<label  class="label-cadastro" style="color:white">Espaço</label><br>
								<select name="espaco" class="form-control ">
							        <?php foreach ($espacos as $item): ?>
							            <option value='<?=$item->id_espaco?>'>
							            <?= $item->local_espaco?> - <?=$item->descricao_espaco?>
							            </option> 
							        <?php endforeach;?>
						       </select><br> 
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
							<label  class="label-cadastro" style="color:white">Equipamento</label><br>
								<select name="categoria" class="form-control ">
							        <?php foreach ($equipamentos as $item): ?>
							            <option value='<?=$item->id_equipamento?>'>
							             <?= $item->patrimonio_equipamento?> - <?= $item->descricao?>
							            </option> 
							        <?php endforeach;?>
						       </select><br> 
					</div>
					
				</div>

				<div class="row">
					 <div class="col-md-12">
					 		<input type="submit" id="login_entrar" class="btn btn-primary" value="Entrar" name="entrar">
					 </div>
				</div>
				
				</form>
			</div>
		
	</div>
</div>

</body>
</html>