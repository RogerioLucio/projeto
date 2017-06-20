	

	<div class="container">
		<div class="row">
				<div class="col-md-4">
					GUIA DE REMESSA
				</div>

		</div>

		<div class="row">
		<div class="col-md-4">
			Para o período de:
		</div>
		</div>
		<div class="row"> 
			<div class="col-md-4">
				Data da Retirada:
			</div>
			<div class="col-md-4">
				<?php echo $patrimonio->data_inicio_reserva; ?>
			</div>
			
		</div>
		<div class="row"> 
			<div class="col-md-4">
				Data da entrega:
			</div>
			<div class="col-md-4">
				<?php echo $patrimonio->data_final_reserva; ?>
			</div>
			
		</div>
		<div class="row"> 
			<div class="col-md-6">
				Estão sendo solicitado(s) o(s)  seguinte(s) equipamento(s) :

			</div>
			<div class="col-md-6">
				<?php foreach ($espacos as $item): ?>
							            <option value='<?=$item->id_espaco?>'>
							            <?= $item->local_espaco?> - <?=$item->descricao_espaco?>
							            </option> 
				<?php endforeach;?>
			</div>
			 
		</div>
		<div class="row"> 
			<div class="col-md-4">
				
			</div>

		</div>
		<div class="row"> 
			<div class="col-md-5">
				
			</div>

		</div>
	</div>