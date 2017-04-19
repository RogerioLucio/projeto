<div class="container">
		<!--Form without header-->
		<div class="card col-sm-6 mx-auto">
			<center><h3 class="mt-1">Recuperação de Senha</h3></center><br>
			<div class="container">
				<!--Body-->
				<form name="pass_recover" action="<?php echo base_url('/usuario_controller/recupera_senha_model');?>" method="post">
					<div class="col-md-12">
            <label for="form2">Digite seu Email</label>
						<input type="text" id="form2" name="email" required class="form-control">
					</div>
					<div class="text-center mt-4">
						<button type="submit" class="btn btn-blue-grey">Enviar</button>
					</div>
				</form>
			</div>
		</div>
		<!--/Form with header-->
	</div>
