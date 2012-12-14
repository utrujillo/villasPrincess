<legend>Lista de Usuarios</legend>

<table class="table table-striped table-blue-stripe table-hover">                       
        <thead>
                <tr>
                  <th>Usuario</th>
                  <th>Nombre Completo</th>
                  <th>Acceso</th>
                  <th>Opciones</th>
                </tr>
        </thead>
                
        <tbody>
                <?php
                        include_once("../scripts/conecta.inc.php");
                        $conexion = new Conexion( "villas" );
                        
                        $sqlFind  = "SELECT idUsuario, concat(nombre,' ',apellidoPaterno,' ',apellidoMaterno) as nombreCompleto, usuario, nivelAcceso
                                        FROM usuario_tbl WHERE nivelAcceso != 'R' ";
                        $dataFind = $conexion->consulta( $sqlFind );
                        while( $rowFind = $dataFind->fetch_array( MYSQLI_ASSOC ) ):

                                switch( $rowFind["nivelAcceso"] ){
                                        case "A": $tpUsuario = "Usuario";       break;
                                        case "S": $tpUsuario = "Administrador"; break;
                                }

                ?>
                
                        <tr>
                            <td><?php echo $rowFind["usuario"];  ?></td>
                            <td><?php echo $rowFind["nombreCompleto"];  ?></td>
                            <td><?php echo $tpUsuario; ?></td>
                            <td class="options txtCenter">
                                    <a href=""><i class="icon-eye-open"></i></a>&nbsp;
                                    <a href=""><i class="icon-edit"></i></a>&nbsp;
                                    <a href=""><i class="icon-trash"></i></a>&nbsp;
                            </td>
                        </tr>
                
                <?php endwhile; ?>
        </tbody>
</table>