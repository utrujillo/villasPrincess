<div class="row-fluid">      
        
        <?php 
                include_once("../scripts/conecta.inc.php");
                $conexion = new Conexion();
                $id = $_POST    ["id"];

                $sqlFind  = "SELECT * FROM usuario_tbl WHERE idUsuario = ". $id;
                $dataFind = $conexion->consulta( $sqlFind );
                $rowFind  = $dataFind->fetch_array( MYSQLI_ASSOC );
        ?>
        
        
        <legend>Informaci&oacute;n de Usuario</legend>
        <table class="table table-striped table-blue-stripe table-hover">                       
                <tbody>
                        <tr>
                                <th width="30%"><i class="icon-heart"></i>&nbsp;Usuario</th>
                                <td><?php echo $rowFind['usuario']; ?></td>
                        </tr>
                        <tr>
                                <th><i class="icon-user"></i>&nbsp;Nombre</th>
                                <td><?php echo $rowFind['nombre']." ".$rowFind["apellidoPaterno"]." ".$rowFind["apellidoMaterno"] ?></td>
                        </tr>
                        <tr>
                                <th><i class="icon-home"></i>&nbsp;Propiedad</th>
                                <td><?php echo $rowFind['noPropiedad']; ?></td>
                        </tr>
                        <tr>
                                <th><i class="icon-thumbs-up"></i>&nbsp;Telefono</th>
                                <td><?php echo $rowFind['telefono']; ?></td>
                        </tr>
                        <tr>
                                <th><i class="icon-comment"></i>&nbsp;Correo electronico</th>
                                <td><?php echo $rowFind['correoElectronico']; ?></td>
                        </tr>
                </tbody>
        </table>

</div><!-- /row-fluid -->