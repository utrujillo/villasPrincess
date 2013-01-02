<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>Typehead</title>
	<link rel="stylesheet" href="css/bootstrap.css" />
	<link rel="stylesheet" href="css/villasTheme/jquery-ui.custom.css" />
</head>
<body>
	Teclea algo
	<input type="text" name="userSrc" id="usrSrc" />
    <input type="hidden" name="idUsuario" id="idUsuario" />

	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/jquery-ui.custom.js"></script>
	<script type="text/javascript">
	
		
	$(function() {

        var usuario = $("#idUsuario");
 
        $( "#usrSrc" ).autocomplete({
            source: "clientSrc.php",
            minLength: 2,
            select: function( event, ui ) {

                // ui.item.value
                usuario.val( ui.item.id );

            }
        });
    });


	
	</script>

</body>

</html>