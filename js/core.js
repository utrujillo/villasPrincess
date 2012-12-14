//===============================================
//			Autor: Uziel Trujillo Colón
//			Web: www.utrujillo.net
//===============================================

$(function(){

		    //============================================================================
        //                                                     Panel de Administración
        //============================================================================


        // ==================== Nuevo Usuario
        
        $(".newUser").click(function(){
                
                $("#displayContent").load("usuario/newUser.php");

        });

        $(document).on("click", "#createUser", function( evt ){

                $("#statusForm").css("display","none");
                
                var allData = $("#frmNuevoUsuario").serializeArray();
                var required = 0;
                
                 $("#frmNuevoUsuario").find(':input').each(function( index, element ){
                        
                        e = $(element)
                        if( (e.val() == "") && e.attr('required') ){ required++ }

                 });


                if( required == 0 ){
                        
                        evt.preventDefault();

                        $.ajax({
                          url: 'usuario/abcUsuario.php',
                          type: 'POST',
                          dataType: 'html',
                          data: allData,
                          complete: function(xhr, textStatus) {
                            //called when complete
                          },
                          success: function(data, textStatus, xhr) {
                                
                                if( data.length == 33 ){
                                    
                                    message = '<div class="alert alert-success">';
                                        message += '<button type="button" class="close" data-dismiss="alert">×</button>';
                                        message += '<strong><i class="icon-thumbs-up"></i>&nbsp;Felicidades!!</strong> ' + data;
                                        message += '</div>';

                                }else{
                                        

                                        message = '<div class="alert alert-error">';
                                        message += '<button type="button" class="close" data-dismiss="alert">×</button>';
                                        message += '<strong><i class="icon-remove-sign"></i>&nbsp;Lo sentimos, ha ocurrido un error!!</strong><br />' + data;
                                        message += '</div>';
                
                                }
                        
                            $( "#statusForm" ).fadeIn("slow").html( message );

                            $( "#frmNuevoUsuario" )[0].reset();

                          },
                          error: function(xhr, textStatus, errorThrown) {
                            //called when there is an error
                          }
                        });
                }
                

        }); // createUser       


        // ==================== Ver Usuarios
        
        $(".showUsers").click(function(){
                
            $("#displayContent").load("usuario/showUsers.php");

        });

        //============================================================================
        //                                                          Carga de Archivos
        //============================================================================

        $(".fileUploader").click(function(){
            
            $("#displayContent").load("fileUploader/selected.html"); 

        })

            // ==================== FileUploader
            $("#uploadPDF").live("change",function(){

                var urlSave = $( this ).val();
                switch( urlSave ){
                  case "reglamento"   : $("#uploaderFile").load("fileUploader/reglamento.html");  break;
                  case "comite"       : $("#uploaderFile").load("fileUploader/comite.html");      break;
                  case "asamblea"     : $("#uploaderFile").load("fileUploader/asamblea.html");    break;
                  case "comunicado"   : $("#uploaderFile").load("fileUploader/comunicado.html");  break;
                  case "estadoCuenta" : $("#uploaderFile").load("fileUploader/comunicado.html");  break;
                }         

            });

        //============================================================================
        //                                                         Lectura de Archivos
        //============================================================================

        $(".ver").click(function(){
            var view = $(this).attr("toView");

            switch( view ){
              case "verReglamento": $("#displayContent").load("acceso/reglamento.php"); break;
              case "verComite"    : $("#displayContent").load("acceso/comite.php"); break;
              case "verAsamblea"  : $("#displayContent").load("acceso/asamblea.php"); break;
              case "verComunicado": $("#displayContent").load("acceso/comunicado.php"); break;
              case "verEdoCuenta" : $("#displayContent").load("acceso/estadoCuenta.php"); break;
            }            

        })
              

});