        <div id="statusForm"></div>
        <legend>Nuevo Usuario</legend>

        <form class="form-horizontal" id="frmNuevoUsuario">
                
                <input type="hidden" name="abc" value="a" />

                <div class="control-group">
                        <label class="control-label" for="Nombre">* Nombre</label>
                        <div class="controls">
                                <input type="text" class="span12" name="nombre" id="nombre" required placeholder="Nombre">
                        </div>
                </div>

                <div class="control-group">
                        <label class="control-label" for="Apellido Paterno">* Apellido Paterno</label>
                        <div class="controls">
                                <input type="text" class="span12" name="apellidoPaterno" id="apellidoPaterno" required placeholder="Apellido Paterno">
                        </div>
                </div>

                <div class="control-group">
                        <label class="control-label" for="Apellido Materno">Apellido Materno</label>
                        <div class="controls">
                                <input type="text" class="span12" name="apellidoMaterno" id="apellidoMaterno" placeholder="Apellido Materno">
                        </div>
                </div>

                <div class="control-group">
                        <label class="control-label" for="Nombre de Usuario">* NickName</label>
                        <div class="controls">
                                <input type="text" class="span12" name="usuario" id="usuario" required placeholder="Usuario">
                        </div>
                </div>

                <div class="control-group">
                        <label class="control-label" for="Contraseña">* Contrase&ntilde;a</label>
                        <div class="controls">
                                <input type="password" maxlength="32" class="span12" name="password" id="password" required placeholder="Contraseña">
                        </div>
                </div>
                
                <div class="control-group">
                        <label class="control-label" for="correoElectronico">Correo Electronico</label>
                        <div class="controls">
                                <input type="email" class="span12" name="correoElectronico" id="correoElectronico" placeholder="Correo Electronico">
                        </div>
                </div>
                
                <div class="control-group">
                        <label class="control-label" for="telefono">Telefono</label>
                        <div class="controls">
                                <input type="text" class="span12" name="telefono" id="telefono" placeholder="Telefono">
                        </div>
                </div>
                
                <div class="control-group">
                        <label class="control-label" for="noPropiedad">N&uacute;mero de Propiedad</label>
                        <div class="controls">
                                <input type="email" class="span12" name="noPropiedad" id="noPropiedad" placeholder="Numero de Propiedad">
                        </div>
                </div>
                
                


                <div class="control-group">
                        <label class="control-label" for="Nivel de Acceso">Nivel de Acceso</label>
                        <div class="controls">
                                <select class="span12" name="nivelAcceso" id="nivelAcceso">
                                        <option value="A" selected="selected">Usuario</option>
                                        <option value="S">Administrador</option>
                                </select>
                        </div>
                </div>

                <div class="control-group">
                <label class="control-label" for="Solicitar"></label>
                        <div class="controls">
                                <button type="submit" class="btn" id="createUser" value="Solicitar">Nuevo&nbsp;<i class="icon-user"></i></button>
                        </div>
                </div>

        </form>