<legend>Lista de Usuarios</legend>

<table class="table table-striped table-blue-stripe table-hover">                       
        <thead>
                <tr>
                  <th>Usuario</th>
                  <th>Nombre Completo</th>
                  <th>Propiedad</th>
                  <th>Telefono</th>
                  <th>Correo</th>
                  <th>Acceso</th>
                  <th width="100">Opciones</th>
                </tr>
        </thead>
                
        <tbody>
                <?php
                        include_once("../scripts/conecta.inc.php");
                        $conexion = new Conexion();
                        
                        $sqlFind  = "SELECT idUsuario, concat(nombre,' ',apellidoPaterno,' ',apellidoMaterno) as nombreCompleto, usuario, noPropiedad, telefono, correoElectronico, nivelAcceso
                                        FROM usuario_tbl WHERE nivelAcceso != 'R' AND estatus = '1' ORDER BY nivelAcceso ASC";
                        $dataFind = $conexion->consulta( $sqlFind );
                        while( $rowFind = $dataFind->fetch_array( MYSQLI_ASSOC ) ):

                                switch( $rowFind["nivelAcceso"] ){
                                        case "A": $tpUsuario = "Usuario";       break;
                                        case "S": $tpUsuario = "Administrador"; break;
                                }

                ?>
                
                        <tr>
                            <td><?php echo $rowFind["usuario"];  ?></td>
                            <td><?php echo utf8_decode( $rowFind["nombreCompleto"] );  ?></td>
                            <td><?php echo $rowFind["noPropiedad"]; ?></td>
                            <td><?php echo $rowFind["telefono"]; ?></td>
                            <td><?php echo $rowFind["correoElectronico"]; ?></td>
                            <td><?php echo $tpUsuario; ?></td>
                            <td class="options txtCenter">
                                    <a href="#" rel="tooltip" data-placement="left" data-original-title="Ver datos" toId="<?php echo $rowFind['idUsuario']; ?>" class="viewUser"><i class="icon-eye-open"></i></a>&nbsp;
                                    <a href="#" rel="tooltip" data-placement="top" data-original-title="Editar datos" toId="<?php echo $rowFind['idUsuario']; ?>" class="editUser"><i class="icon-edit"></i></a>&nbsp;
                                    <a href="#" rel="tooltip" data-placement="top" data-original-title="Cambiar contrase&ntilde;a" toId="<?php echo $rowFind['idUsuario']; ?>" class="passUser"><i class="icon-lock"></i></a>&nbsp;
                                    <a href="#myModal" data-toggle="modal" rel="tooltip" data-placement="top" data-original-title="Eliminar datos" toId="<?php echo $rowFind['idUsuario']; ?>" data-toggle="modal" class="deleteUser"><i class="icon-trash"></i></a>&nbsp;
                            </td>
                        </tr>
                
                <?php endwhile; ?>
        </tbody>
</table>