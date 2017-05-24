$(document).ready(function(){
	$('#enviar_reserva').click(function(event){
		event.preventDefault();

		var answer=confirm('Você concorda com a responsabilidade dos termos?');
	    if(answer){
	    
	     var espaco = $('#select_espaco').val();
		 var prontuario = $('#prontuario').val();
		 var data_inicial = $('#data_inicial').val();
		 var data_final = $('#data_final').val();

		$.post("Reserva_Controller/cadastra_documento", {'espaco': espaco, 'prontuario': prontuario, 'data_inicial': data_inicial, 'data_final': data_final });
		$('#target').submit();
	    }
	    else{
	        alert('Reserva não cadastrada');      
	    }
		
	});
});