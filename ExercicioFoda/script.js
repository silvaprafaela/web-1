$(document).ready(function(e){
	$("#dialog-confirm").hide();
	$(".menuPrincipal a").click(function(e){
		e.preventDefault();
		var href=$(this).attr('href');
		$(".conteudo").load(href + " .conteudo");
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
						var n = nome= document.querySelector("#nome").value.split(' ');
						if ( n[0] >= 3){
							if ( n[1] >= 4){
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
						var e = email= document.querySelector("#email").value.split('@');
						if ( e[0] >= 3){
							if ( e[1] >= 4){
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
