$(document).ready(function(e){
	$(".voltar").hide();
	$("#dialogo").hide();
	$(".menuPrincipal a ").click(function(e){
		e.preventDefault();
		var href=$(this).attr('href');
		$(".conteudo").load(href+" .conteudo");
	});
	$(".sobre").click(function(e){
		e.preventDefault();
		var href=$(this).attr('href');
		$(".voltar").show();
		$(".comentario").hide();
		$(".menuPrincipal").hide();
		$(".conteudo").load(href+" .conteudo");
	});
	$(".links").click(function(e){
		e.preventDefault();
		var href=$(this).attr('href');
		$(".conteudo").load(href+" .conteudo");
		$(".voltar").show();
		$(".comentario").hide();
		$(".menuPrincipal").hide();

	});
	$(".inicio").click(function(e){
		e.preventDefault();
		var href=$(this).attr('href');
		$(".conteudo").load(href+" .conteudo");
		$(".voltar").hide();
		$(".comentario").show();
		$(".menuPrincipal").show();
	});	

});

function dialogo(){
	$("#dialog-confirm").dialog({
		resizable:false,
		width:400,
		height:200,
		modal:true,
		buttons:{
			"Confirma": function(){
				var nome= document.querySelector("#nome").value;
				var tamnome = nome.length;
				var validanome = false;
				for(var i=0; i<=tamnome; i++){
					if ( nome[i] == ' '){
						var n = document.querySelector("#nome").value.split(' ');
						if ( (n[0].length) >= 3){
							if ( (n[1].length) >= 4){
								validanome = true;
							}
						}
					}
				}
				var email= document.querySelector("#email").value;
				var tamemail = email.length;
				var validaemail = false;
				for(var j=0; j<=tamemail; j++){
					if ( email[j] == '@'){
						var e = document.querySelector("#email").value.split('@');
						if ( (e[0].length) >= 3){
							if ( (e[1].length) >= 4){
								validaemail=true;
							}
						}
					}
				}
				if(validanome==true && validaemail==true){
					alert('Dados gravados!')
				}else {
					alert ('Dados errados!')
				}
				
				
				$(this).dialog("close");
			},
			Cancelar: function(){
				$(this).dialog("close");				
			}
		}
	});
	
};
