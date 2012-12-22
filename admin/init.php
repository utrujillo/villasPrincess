<?php include_once("scripts/access.php"); $Access = new Access("A,S,R"); ?>

<!DOCTYPE HTML>
<html lang="es-ES">
<head>
	<meta charset="UTF-8">
	<title>Villas I Princess - Interface Administrativa</title>
	<link rel="stylesheet" href="../css/bootstrap.css" />
	<link rel="stylesheet" href="../css/styleAdmin.css" />
	<link rel="stylesheet" href="../css/colorbox.css" />
	<!-- FileUploader -->
	<link rel="stylesheet" href="fileUploader/css/jquery.fileupload-ui.css">
	<noscript><link rel="stylesheet" href="fileUploader/css/jquery.fileupload-ui-noscript.css"></noscript>
</head>

<body>
	
	 <header class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          

          <a class="brand" href="#"><img src="../img/logoVillasWhite.png" width="20" heigth="20" /></a>



          <a class="brand" href="#">Villas I Princess</a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li class="active"><a href="#"><i class="icon-user icon-white"></i>&nbsp;<?php echo $_SESSION['nombre']; ?></a></li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-cog icon-white"></i>&nbsp;Preferencias <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="#">Actualizar Información</a></li>
                </ul>
              </li>
              <li><a href="logout.php"><i class="icon-off icon-white"></i>&nbsp;Salir</a></li>
            </ul>
            
          </div><!--/.nav-collapse -->
        </div><!-- /container -->
      </div><!-- /inner -->
    </header><!-- /header -->

	<section class="container-fluid">
		<div class="row-fluid">
			<!-- /SubMenu Principal -->
			<aside class="span3">
				<div class="row-fluid">
						
				<ul class="nav nav-list subMenu">
					<li class="active"><a href="#"><i class="icon-star white"></i>&nbsp;Opciones Disponibles</a></li>
					<li toView="verReglamento" class="ver"><a href="#"><i class="icon-pencil"></i><i class="icon-chevron-right"></i>&nbsp;Reglamentos</a></li>
					<li toView="verComite" class="ver"><a href="#"><i class="icon-list-alt"></i><i class="icon-chevron-right"></i>&nbsp;Comite de Vigilancia</a></li>
					<li toView="verAsamblea" class="ver"><a href="#"><i class="icon-hand-up"></i><i class="icon-chevron-right"></i>&nbsp;Asambleas</a></li>
					<li toView="verComunicado" class="ver"><a href="#"><i class="icon-bullhorn"></i><i class="icon-chevron-right"></i>&nbsp;Comunicados<span class="badge badge-important">7</span></a></li>
					<li toView="verEdoCuenta" class="ver"><a href="#"><i class="icon-book"></i><i class="icon-chevron-right"></i>&nbsp;Estados de Cuenta<span class="badge badge-important">1</span></a></a></li>

				</ul>

				<?php if( $_SESSION['tipou'] != 'A' ): ?>
				
				<ul class="nav nav-list subMenu">
					<li class="active"><a href="#"><i class="icon-wrench white"></i>&nbsp;Administrador</a></li>

					<li class="newUser"><a href="#"><i class="icon-user"></i><i class="icon-chevron-right"></i>&nbsp;Nuevo Ususario</a></li>
					<li class="showUsers"><a href="#"><i class="icon-th-list"></i><i class="icon-chevron-right"></i>&nbsp;Ver Usuarios</a></li>
					<li class="fileUploader"><a href="#"><i class="icon-file"></i><i class="icon-chevron-right"></i>&nbsp;Subir PDF</a></li>
					<!-- <li><a href="#"><i class="icon-picture"></i><i class="icon-chevron-right"></i>&nbsp;Fotografias</a></li> -->
				</ul>
				
				<?php endif; ?>

				</div>

			</aside><!-- /aside -->

			<!-- /contenido Principal -->
			
			<article class="span9 data-block">
				<div class="data-container">
					

					<div class="row-fluid" id="displayContent">



					</div><!-- rowFluid Principal -->

				</div><!-- /dataContainer -->
			</article><!-- /article -->
			

		</div><!-- /row-fluid principal -->
	</section><!-- /section -->
	 
	<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		
		<input type="hidden" name="delHd" id="delHd" value="" />	
			
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			<h3 id="myModalLabel">Borrar datos</h3>
		</div>

	    <div class="modal-body">
	    	<p>Si presionas <b>Eliminar</b> la información se perdera, estas seguro de querer realizar esta acción?</p>
	    </div>

	    <div class="modal-footer">
	    	<button class="btn" data-dismiss="modal" aria-hidden="true">Cerrar</button>
		    <button class="btn btn-primary delUser">Eliminar</button>
	    </div>
	
	</div>
	

	<script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.js"></script>
    <script src="../js/jquery.colorbox.js"></script>
    <script src="../js/core.js"></script>
	
	<!-- FileUploader -->
	<script src="fileUploader/js/vendor/jquery.ui.widget.js"></script>
	<script src="fileUploader/js/tmpl.min.js"></script>
	<script src="fileUploader/js/jquery.iframe-transport.js"></script>
	<script src="fileUploader/js/jquery.fileupload.js"></script>
	<script src="fileUploader/js/jquery.fileupload-fp.js"></script>
	<script src="fileUploader/js/jquery.fileupload-ui.js"></script>

</body>
</html>