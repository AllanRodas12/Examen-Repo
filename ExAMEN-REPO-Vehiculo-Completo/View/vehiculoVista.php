<div class="container">
    <div class="jumbotron">
        <h2>Formulario de registro</h2>
    </div>
    <div class="col-md-6 col-md-offset-3">
        <div class="form-horizontal">
            <form action="index.php?m=get_datosE" method="post">
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="txt_id">ID:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="txt_id" value="<?php echo isset($data['id']) ? $data['id'] : ''; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="txt_placacar">Placa:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="txt_placacar" value="<?php echo isset($data['placacar']) ? $data['placacar'] : ''; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="txt_modelo">Modelo:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="txt_modelo" value="<?php echo isset($data['modelo']) ? $data['modelo'] : ''; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="txt_anho">Año:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="txt_anho" value="<?php echo isset($data['anho']) ? $data['anho'] : ''; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="txt_binauto">VinAutomotor:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="txt_binauto" value="<?php echo isset($data['binauto']) ? $data['binauto'] : ''; ?>">
                    </div>
                </div>
                <!-- Agregar los campos adicionales aquí siguiendo el mismo patrón -->
                <div class="form-group">
                    <div class="col-md-12">
                        <?php if (empty($data['id'])) : ?>
                            <input type="submit" class="btn btn-primary form-control" value="Registrar">
                        <?php else : ?>
                            <input type="submit" class="btn btn-primary form-control" value="Actualizar">
                        <?php endif; ?>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>