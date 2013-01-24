//===============================================
//			Autor: Uziel Trujillo Colón
//			Web: www.utrujillo.net
//===============================================

$(function(){

		    //============================================================================
        //                                                     Panel de Administración
        //============================================================================


        // Tooltips
        $('body').tooltip({ selector: '[rel=tooltip]' });


        // ==================== Nuevo Usuario
        
        $(".newUser").click(function(){

            $("#displayContent").load("usuario/new.php");

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

                          }//success

                        });//ajax

                }//required                

        }); // createUser       


        // ==================== Ver Usuarios
        
        $(".showUsers").click(function(){
                
            $("#displayContent").load("usuario/show.php");

        });

              // Información de Usuario
              $(document).on("click", ".viewUser", function(){
                   
                  var idUser = $( this ).attr("toId");
                  $.colorbox({ width:"50%", height:"350px", href: "usuario/view.php", data: { id: idUser } });

              });

              // Editar Usuario
              $(document).on("click", ".editUser", function(){
                  
                  var idUser = $( this ).attr("toId");
                  $.colorbox({ width:"50%", height:"650px", href: "usuario/edit.php", data: { id: idUser, u: $("#lvl").val() } });

              });

             
                  $(document).on("click", "#editUser", function( evt ){

                    $("#statusForm").css("display","none");
                    
                    var allData = $("#frmEditUsuario").serializeArray();
                    var required = 0;
                    
                     $("#frmEditUsuario").find(':input').each(function( index, element ){
                            
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
                              success: function(data, textStatus, xhr) {
                                    
                                    if( data.length == 33 ){
                                        
                                            message = '<div class="alert alert-success">';
                                            message += '<button type="button" class="close" data-dismiss="alert">×</button>';
                                            message += '<strong><i class="icon-thumbs-up"></i>&nbsp;Felicidades!!</strong> ' + data;
                                            message += '</div>';

                                            if( $("#lvl").val() != "QQ==" )
                                              $("#displayContent").load("usuario/show.php");

                                    }else{
                                            

                                            message = '<div class="alert alert-error">';
                                            message += '<button type="button" class="close" data-dismiss="alert">×</button>';
                                            message += '<strong><i class="icon-remove-sign"></i>&nbsp;Lo sentimos, ha ocurrido un error!!</strong><br />' + data;
                                            message += '</div>';
                    
                                    }
                            
                                $( "#statusForm" ).fadeIn("slow").html( message );

                              }//success

                            });//ajax
                    }//required
                    

                  }); // #editUser
              
              // Formulario de Cambio de Contraseña
              $(document).on("click", ".passUser", function(){
                  
                  var idUser = $( this ).attr("toId");
                  $.colorbox({ width:"40%", height: '300px', href: "usuario/passUser.php", data: { id: idUser } });

              });


                  $(document).on("click", "#changePass", function( evt ){

                      $("#statusForm").css("display","none");
                      evt.preventDefault();

                      var passwd = $("#password");
                      if( passwd.val().length > 0 ){

                          var allData = $("#frmChangePass").serializeArray();

                          $.ajax({
                              url: 'usuario/abcUsuario.php',
                              type: 'POST',
                              dataType: 'html',
                              data: allData,
                              success: function(data, textStatus, xhr) {
                                    
                                    if( data.length == 33 ){
                                        
                                            message = '<div class="alert alert-success">';
                                            message += '<button type="button" class="close" data-dismiss="alert">×</button>';
                                            message += '<strong><i class="icon-thumbs-up"></i>&nbsp;Felicidades!!</strong> La contrase&ntilde;a del usuario ha sido cambiada';
                                            message += '</div>';

                                            if( $("#lvl").val() != "QQ==" )
                                              $("#displayContent").load("usuario/show.php");

                                    }else{
                                            

                                            message = '<div class="alert alert-error">';
                                            message += '<button type="button" class="close" data-dismiss="alert">×</button>';
                                            message += '<strong><i class="icon-remove-sign"></i>&nbsp;Lo sentimos, ha ocurrido un error!!</strong><br />' + data;
                                            message += '</div>';
                    
                                    }
                                
                                $( "#statusForm" ).fadeIn("slow").html( message );

                              }//success

                          });//ajax

                      }else{

                          message = '<div class="alert alert-info">';
                          message += '<button type="button" class="close" data-dismiss="alert">×</button>';
                          message += '<strong><i class="icon-remove-sign"></i>&nbsp;Debes introducir una contrase&ntilde;a!!</strong>';
                          message += '</div>';

                          $( "#statusForm" ).fadeIn("slow").html( message );

                      }//if else
                     
                  });

              
              // Eliminar Usuario
              $(document).on('click','[data-toggle=modal]', function(){
        
                  var toId = $(this).attr("toId");          
                  $("#delHd").val( toId );
                  $( "#myModal" ).modal();
                      
              });

              $('.delUser').click(function(){
                  var toId = $("#delHd").val();
                  
                  $.post('usuario/abcUsuario.php', { idUsuario: toId, abc: "b" }, function(data, textStatus, xhr) {
                      
                      $("#displayContent").load("usuario/show.php");
                      $( "#myModal" ).modal("hide");
                      
                  });
                  
                  
              });


        //============================================================================
        //                                                          Carga de Archivos
        //============================================================================

        $(".fileUploader").click(function(){
            
            $("#displayContent").load("fileUploader/selected.html"); 

        })

            // ==================== FileUploader
            $("#uploadPDF").live("change",function(){

                $("#estadoCuentaxUser").fadeOut('slow');
                var urlSave = $( this ).val();
                switch( urlSave ){
                  case "reglamento"   : $("#uploaderFile").load("fileUploader/reglamento.html");  break;
                  case "comite"       : $("#uploaderFile").load("fileUploader/comite.html");      break;
                  case "asamblea"     : $("#uploaderFile").load("fileUploader/asamblea.html");    break;
                  case "comunicado"   : $("#uploaderFile").load("fileUploader/comunicado.html");  break;
                  case "estadoCuenta" : $("#uploaderFile").load("fileUploader/estadoCuenta.html");  break;
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

        });

        //============================================================================
        //                                               Estados de Cuenta por Usuario
        //============================================================================
        $(document).on("click", ".userEdoCnt", function( e ){

            e.preventDefault();
            var idUser = $( this ).attr("toId");
            $.colorbox({ width:"50%", href: "acceso/userEdoCnt.php", data: { id: idUser } });

        });


});