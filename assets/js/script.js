$(document).ready(function(){
  $('#field-cnpj').mask('00.000.000/0000-00');
  $('#field-cpf').mask('000.000.000-00');
  $('#field-telefone').mask('(00) 0000[0]-0000');

  $('.time').mask('00:00', {
  	onComplete: function (time, e, field) {
	    let inicio = $('#field-hora_inicio').val();
    	let fim = $('#field-hora_fim').val();

	    if (inicio && fim) {
	    	if (funcoes.validarHora(inicio) && funcoes.validarHora(fim)) {
		      if (!funcoes.compararHoras(fim, inicio)) {
		        $(field).val('').focus();
		        alert(mensagens.horario_final_maior_inicial);
		      }
	      } else {
	      	$(field).val('').focus();
	      }
	    }
  	},
  });
});