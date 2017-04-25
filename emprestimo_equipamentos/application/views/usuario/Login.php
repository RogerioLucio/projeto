<?php
defined('BASEPATH') OR exit('No direct script access allowed');
session_destroy();
?>

<body style="">

<div class="container">
	
		
	<div class="pagina login">					
			
		<div class="col-md-12">
		<div class="center-block" style="text-align: center;">
			<div class="logo-home">
				<img src="assets/img/if.png">		
			</div>
			
		</div>
		<hr>
		</div>
			<div class="div_login">
				
				<form action='<?php echo base_url('usuario_controller/login_model');?>' method="POST">
				<div class="row">
					<div class="col-md-12">
						<label for="usuario" >Prontuário </label><br>
						<input class="form-control" type="text" name="prontuario">
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<label for="senha">Senha</label><br>
						<input class="form-control" type="text" name="senha">
					</div>
				</div>

				<!--<div class="row">
					 <div class="col-md-12">
					 		<input type="submit" id="login_entrar" class="btn btn-primary" value="Entrar" name="entrar">
					 </div>
				</div>-->
				<div class="row">
					<div class="col-md-4">
					 		<input type="submit" id="login_entrar" class="btn btn-primary" value="Entrar" name="entrar">
					 </div>
					 <div class="col-md-4">
					 		<a type="button" href="<?php echo base_url('usuario_controller/recupera_senha');?>" class="btn btn-link" value="Esqueci Minha senha" name="esqueci_senha" >Esqueci Minha senha</a>
					 </div>
					 <div class="col-md-4">
							<a href="<?php echo base_url('usuario_controller/cadastro');?>"  class="btn btn-link">Registre</a>

					 </div>

				</div>
				</form>
			</div>
		
	</div>
</div>

</body>
</html>