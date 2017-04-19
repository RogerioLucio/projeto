$( function(){

	var abriu = 0;
	var base_url = ($('input[name=base_url]').val());
	if($('select[name=categoria]').val() != ''){
		$.ajax({
			method   : 'POST',
			dataType : 'json',
			url      : base_url+'categoria/getById',
			data     :{'id_categoria' : $('select[name=categoria]').val()},
			success  : function(data){
				$('select[name=categoria]').find('option:first').html(data[0].descricao_categoria);

			},
			error	 : function(){
				alert('Não recuperou a categoria...');
			}
		});
	}else{
		$('#getCategorias').find('option:first').remove();
			$.ajax({
				method : 'POST',
				dataType : 'json',
				url : base_url+'categoria/getCategorias',
				success : function(data){
					for(i = 0; i < data.length; i++){
						$('#getCategorias').append('<option value="'+data[i].id_categoria+'">'+data[i].descricao_categoria+'</option>');
					}
				}
			});	
	}

	$('#atualizar').click( function(){
		Campos = {
		"patrimonio_equipamento" : $('input[name=patrimonio]').val(),
		"status_equipamento"     : $('input[name=status]').val(),
		"id_categoria"  : $('select[name=categoria]').val()	
		}


		$.ajax({
			method : 'POST',
			dataType : 'json',
			url    : base_url+'equipamento/atualiza',
			data : {"Campos" :  Campos},
			success : function(data){
				alert(data);
			},
			error : function(){
				alert('Ocorreu um erro na atualização.');
			}
		});

	});









});
