 $(function(){   
     

	$('#frmLogin').submit(function(e) {
		var usuario=$("#txtusuario").val();
		var clave=$("#txtclave").val();
		$.ajax({
			url: base_url+"login/acceder",
			type: 'POST',
			data: {pusuario: usuario,pclave:clave},
			success(data){
				if(data==0){
					alert("datos incorrectos data: " + data);
				}
			   else if(data==1){
				alert("acceso correcto");
				window.location.href = base_url+"panel_principal";
				}
				else{
					alert(data);
				}
			}
		});
	
		

		e.preventDefault();
	});

});