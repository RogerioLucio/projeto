$( function(){
	$('input[name=prontuario]').mask('AA0000000', {'translation': {
                                        A: {pattern: /[A-Za-z]/}
		}
	});
	
	$('input[name=nome]').mask('AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA',{
		'translation' : {
			A: {pattern : /[A-Za-z]/}
		}
	});

	//o do campo senha está na página de cadastro

	$('input[name=rg]').mask('YY.YYY.YYY-Y' , {
		'translation' : {
			Y: {pattern : /[0-9]/}
		}
	});

	// $('input[name=email]').mask("A", {
	// 	'translation': {
	// 		A: { pattern: /[\w@\-.+]/ , recursive : true }
	// 	}
	// });

	$('input[name=cpf]').mask("000.000.000-00");
	$('input[name=data_nasc]').mask("00/00/0000");
	$('input[name=telefone]').mask('(00) 0000-0000');
	$('input[name=celular]').mask('(00) 00000-0000');
	$('input[name=sexo]').mask('AAAAAAAAA' , {
		'translation' : {
			A: {pattern : /[A-Za-z]/}
		}
	});

	$('input[name=patrimonio]').mask('00000000');
	$('input[name=status]').mask('AAAAAAAAAAAAAAA', {
		'translation' : {
			A : {pattern : /[A-Za-z]/}
		}
	});
	$('input[name=descricao]').mask('AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA', {
		'translation' : {
			A: {pattern : /[A-Za-z]/}
		}
	});

	$('input[name=num_patrimonio]').mask('00000000');


});