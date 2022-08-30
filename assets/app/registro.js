$(document).ready(function() {


	setTimeout(function(){
		  $("#divloading" ).addClass("hidden");
	}, 1500)

	$("#datosPers").load(base_url+"Registro_brigadista/datos_personales", function(response, status, xhr) {
				if (status == "error") {
					var msg = "Error!, algo ha sucedido: ";
					$("#datosPers").html(msg + xhr.status + " " + xhr.statusText);
			}
	});

	
	$(document).on("click", "#boton", function (event) {
    	$.ajax({
    		url: base_url+'Registro_brigadista/BrigadistaInsert',
    		type: 'POST',
    		data: {
    			sd_apterno: $("#txtappat").val(),
    			sd_amterno: $("#txtapmat").val(),
    			sd_nombres: $("#txtnombre").val(),
    			sd_dni: $("#txtdni").val(),
    			sd_fnac: $("#txtfechana").val(),    		
    			sd_genero: $("#cbogenero").val(),
    			sd_estaci: $("#txtestado").val(),
    			sd_tseguro: $("#txtseguro").val(),
    			sd_telef: $("#txttelefono").val(),
    			sd_celular: $("#txtcelular").val(),
    			sd_correo: $("#txtcorreo").val(),
    			sd_distrito: $("#txtdistrito").val(),
    			sd_domicilio: $("#txtdomicilio").val()
    		},
    		beforeSend : function (){
              	$("#divloading" ).removeClass("hidden");
            },
            success : function (data) {
               
                //stuff
                if(data==1){
                    $("#datosLab").load(base_url+"Registro_brigadista/datos_laborales", function(response, status, xhr) {
            				if (status == "error") {
            					var msg = "Error!, algo ha sucedido: ";
            					$("#datosLab").html(msg + xhr.status + " " + xhr.statusText);
            					}
            				});
        			   	  setTimeout(function(){
        					  $("#divloading" ).addClass("hidden");
                              //pasar al otro tab
                              $('.nav-tabs li:eq(1) a').tab('show')
                              $("#itmdatosPers" ).removeClass("active");
                              $("#itmdatosLab" ).addClass("active");

                    	}, 1000);
                }
                else if(data==2){
                    sweetAlert("Oops...", "DNI ya se encuentra registrado", "error");
                    setTimeout(function(){
                           $("#divloading" ).addClass("hidden");
                              //pasar al otro tab                            
                     }, 1000);
                }

             },
            error : function (xhr, textStatus, errorThrown) {              
               sweetAlert("Oops...", "Verifique los datos esten completos", "error");
                setTimeout(function(){
                      $("#divloading" ).addClass("hidden");
                }, 1000);   
            },
            
    	})
       });
	// segundo boton
	$(document).on("click", "#btnPasHiscli", function (event) {
  
    	$.ajax({
    		url: base_url+'Registro_brigadista/datos_laboralesSave',
    		type: 'POST',
    		data: {
                sd_red_salud:$("#txtLabSalud").val(),
                sd_sede: $("#txtLabSede").val(),
                sd_direc_labo: $("#txtLabDireccion").val(),
                sd_telf_labo: $("#txtLabTelfFijo").val(),
                sd_labo_anexo: $("#txtLabAnexo").val(),
                sd_telmov_labo: $("#txtLabTelMovil").val(),
                sd_condicion_labo: $("#cboLabCondicion").val(),
                sd_tiemp_serv: $("#txtLabTiempo").val(),
                sd_ocupacion: $("#txtLabOcupa").val()
            },
    		beforeSend : function (){
              	$("#divloading" ).removeClass("hidden");
            },
            success : function (data) {
             
                //stuff
              $("#datosCli").load(base_url+"Registro_brigadista/datos_hiscli", function(response, status, xhr) {
				          if (status == "error") {
					           var msg = "Error!, algo ha sucedido: ";
					           $("#datosCli").html(msg + xhr.status + " " + xhr.statusText);
					         }
				      });
				      setTimeout(function(){
                      $("#divloading" ).addClass("hidden");
                      //pasar al otro tab
                      $('.nav-tabs li:eq(2) a').tab('show')
                      $("#itmdatosCli" ).removeClass("active");
                      $("#itmdatosCli" ).addClass("active");                    

                }, 1000);
            },
            error : function (xhr, textStatus, errorThrown) {
                //other stuff
            },
            
    	});

    });

// tercer boton
  $(document).on("click", "#btnPasFormacion", function (event) {
   
      $.ajax({
        url: base_url+'Registro_brigadista/datos_hiscliSave',
        type: 'POST',
        data: {
                sd_peso_brig:$("#txtdcliPeso").val(),
                sd_talla_brig:$("#txtdcliTalla").val(),
                sd_gsangui_brig:$("#txtdcliGsan").val(),
                sd_factorh_brig:$("#txtdcliFacSan").val(),
                sd_talergia_brig:$("#txtdcliAler").val(),
                sd_restsalud_brig:$("#txtdcliRestSalud").val(),  
                sd_hiscli_brig:$("#txtdcliNumHis").val()             
            },
        beforeSend : function (){
                $("#divloading" ).removeClass("hidden");
            },
            success : function (data) {
             
                //stuff
               
              $("#datosProf").load(base_url+"Registro_brigadista/datos_prof", function(response, status, xhr) {
                  if (status == "error") {
                     var msg = "Error!, algo ha sucedido: ";
                     $("#datosProf").html(msg + xhr.status + " " + xhr.statusText);
                   }
              });

              setTimeout(function(){
                      $("#divloading" ).addClass("hidden");
                      //pasar al otro tab
                      $('.nav-tabs li:eq(3) a').tab('show')
                      $("#itmdatosCli" ).removeClass("active");
                      $("#itmdatosProf" ).addClass("active");                    

                }, 1000);
            },
            error : function (xhr, textStatus, errorThrown) {
                //other stuff
            },
            
      })
     });



   



    //cagar distrito por codigo

// Elimnar Vacuna
$(document).on("click", "#btnVacunaElim", function (event) {
        var id = $(this).attr("data-id");
      $.ajax({
        url: base_url+'Registro_brigadista/eliminar_detalle',
        type: 'POST',
        data: {
                sd_id:id
         
          },
        beforeSend : function (){
                $("#divloading" ).removeClass("hidden");
            },
            success : function (data) {
            
                //stuff
              alert(data);
              cargar_DetalleHistoria();            
              $("#divloading" ).addClass("hidden");
             
            },
            error : function (xhr, textStatus, errorThrown) {
                //other stuff
            },
            
      })
     });

$(document).on("click", "#btnAddVacuna", function (event) {
  $.ajax({
        url: base_url+'Registro_brigadista/detalle_hisMant',
        type: 'POST',
        data: {
                sd_vacu_apli:$("#txtVacuna").val(),
                sd_fech_vacu:$("#txtvacunafecha").val(),
                sd_lugar_vacu:$("#txtvacunaLugar").val(),
                
            },
        beforeSend : function (){
                $("#loadVacuna" ).removeClass("hidden");
            },
            success : function (data) {
             
                //stuff
              cargar_DetalleHistoria();
              setTimeout(function(){

                      $("#loadVacuna" ).addClass("hidden");                                       
                      $("#txtVacuna").val("");
                      $("#txtvacunafecha").val("");
                      $("#txtvacunaLugar").val("");
                      $("#txtVacuna").focus();
                }, 1000);

            },
            error : function (xhr, textStatus, errorThrown) {
                //other stuff
            },
            
      });

});

function cargar_DetalleHistoria(){
   $.ajax({
     url: base_url+"Registro_brigadista/cargar_detalleHis",
     type: 'POST',   
     success(data){

        $('#lstVacunas tr').remove();
        $('#lstVacunas').append(data);
     }
   }); 
   
}

//para abrir desde la lista++
$(document).on("blur", "#txtdistrito", function (event) {
    var ubigeo=$("#txtdistrito").val();
    $("#divloading" ).removeClass("hidden");
    $.ajax({
        url: base_url+"Registro_brigadista/Distritox_Ubigeo",
        type: 'POST',
        data: {param1: ubigeo},
        success(data){

           $("#descDistrito").val(data);
           $("#divloading" ).addClass("hidden");
              
        }
    })

});


});		