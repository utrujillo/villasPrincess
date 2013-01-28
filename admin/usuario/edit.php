        <?php 

                include_once("../scripts/conecta.inc.php");
                $conexion = new Conexion();
                $id       = $_POST    ["id"];
                $acceso   = base64_decode( $_POST['u'] );
                
                $sqlFind  = "SELECT * FROM usuario_tbl WHERE idUsuario = ". $id;
                $dataFind = $conexion->consulta( $sqlFind );
                $rowFind  = $dataFind->fetch_array( MYSQLI_ASSOC );


        ?>
        
        <div class="row-fluid">      
        
        <div id="statusForm"></div>
        <legend>Actualizar Usuario</legend>

        <form class="form-horizontal" id="frmEditUsuario">
                
                <input type="hidden" name="abc" value="c" />
                <input type="hidden" name="idUsuario" value="<?php echo $id; ?>" />

                <div class="control-group">
                        <label class="control-label" for="Nombre">* Nombre</label>
                        <div class="controls">
                                <input type="text" class="span12" name="nombre" id="nombre" required placeholder="Nombre" value="<?php echo utf8_decode( $rowFind['nombre'] ); ?>" />
                        </div>
                </div>

                <div class="control-group">
                        <label class="control-label" for="Apellido Paterno">* Apellido Paterno</label>
                        <div class="controls">
                                <input type="text" class="span12" name="apellidoPaterno" id="apellidoPaterno" required placeholder="Apellido Paterno" value="<?php echo utf8_decode( $rowFind['apellidoPaterno'] ); ?>" />
                        </div>
                </div>

                <div class="control-group">
                        <label class="control-label" for="Apellido Materno">Apellido Materno</label>
                        <div class="controls">
                                <input type="text" class="span12" name="apellidoMaterno" id="apellidoMaterno" placeholder="Apellido Materno" value="<?php echo utf8_decode( $rowFind['apellidoMaterno'] ); ?>" />
                        </div>
                </div>

                <div class="control-group">
                        <label class="control-label" for="Nombre de Usuario">* NickName</label>
                        <div class="controls">
                                <input type="text" class="span12" name="usuario" id="usuario" required placeholder="Usuario" value="<?php echo $rowFind['usuario']; ?>" />
                        </div>
                </div>
                
                <div class="control-group">
                        <label class="control-label" for="correoElectronico">Correo Electronico</label>
                        <div class="controls">
                                <input type="email" class="span12" name="correoElectronico" id="correoElectronico" placeholder="Correo Electronico" value="<?php echo $rowFind['correoElectronico']; ?>" />
                        </div>
                </div>
                
                <div class="control-group">
                        <label class="control-label" for="telefono">Telefono</label>
                        <div class="controls">
                                <input type="text" class="span12" name="telefono" id="telefono" placeholder="Telefono" value="<?php echo $rowFind['telefono']; ?>" />
                        </div>
                </div>
                
                <div class="control-group">
                        <label class="control-label" for="noPropiedad">Numero de Propiedad</label>
                        <div class="controls">
                                <input type="email" class="span12" name="noPropiedad" id="noPropiedad" placeholder="Numero de Propiedad" value="<?php echo $rowFind['noPropiedad']; ?>" />
                        </div>
                </div>
                
                <?php if( $acceso == 'R' || $acceso == 'S' ): ?>
                <div class="control-group">
                        <label class="control-label" for="Nivel de Acceso">Nivel de Acceso</label>
                        <div class="controls">
                                <select class="span12" name="nivelAcceso" id="nivelAcceso">
                                        <?php
                                                ( $rowFind['nivelAcceso'] == 'A' )?( $a = '<option value="A" selected="selected">Usuario</option>' ):( $a = '<option value="A">Usuario</option>' );
                                                ( $rowFind['nivelAcceso'] == 'S' )?( $s = '<option value="S" selected="selected">Administrador</option>' ):( $s = '<option value="S">Administrador</option>' ) ;
                                                echo $a." ".$s;
                                        ?>
                                </select>
                        </div>
                </div>
                <?php endif; ?>

                <div class="control-group">
                <label class="control-label" for="Solicitar"></label>
                        <div class="controls">
                                <button type="submit" class="btn" id="editUser" value="Solicitar">Actualizar&nbsp;<i class="icon-user"></i></button>
                        </div>
                </div>

        </form>

        </div><!-- /row-fluid -->

        
