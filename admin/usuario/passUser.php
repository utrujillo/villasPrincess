<div class="row-fluid">   
        
        <div id="statusForm"></div>
        <legend>Cambio de Contrase&ntilde;a</legend>

        <form class="form-horizontal" id="frmChangePass">
                
                <input type="hidden" name="abc" value="d" />
                <input type="hidden" name="idUsuario" value="<?php echo $_POST['id']; ?>">

                <div class="control-group">
                        <label class="control-label" for="Contraseña">* Contrase&ntilde;a</label>
                        <div class="controls">
                                <input type="password" maxlength="32" class="span12" name="password" id="password" required placeholder="Contrase&ntilde;a">
                        </div>
                </div>

                <div class="control-group">
                <label class="control-label" for="Solicitar"></label>
                        <div class="controls">
                                <button type="submit" class="btn" id="changePass" value="Solicitar">Nueva Contrase&ntilde;a&nbsp;<i class="icon-lock"></i></button>
                        </div>
                </div>

        </form>
        
</div>