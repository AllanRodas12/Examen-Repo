<div class="container" style="margin-top: 80px">
    <div class="jumbotron">
        <h2>Registro de vehículos</h2>
    </div>
    <div class="container">
        <a href="index.php?m=vehiculo" class="btn btn-success mb-3">Agregar Vehículo</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Placa</th>
                    <th>Modelo</th>
                    <th>Año</th>
                    <th>VinAutomotor</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($query as $data) : ?>
                    <tr>
                        <td><?php echo $data['id']; ?></td>
                        <td><?php echo $data['placacar']; ?></td>
                        <td><?php echo $data['modelo']; ?></td>
                        <td><?php echo $data['anho']; ?></td>
                        <td><?php echo $data['binauto']; ?></td>
                        <td>
                            <a href="index.php?m=vehiculo&id=<?php echo $data['id'] ?>" class="btn btn-primary">Editar</a>
                            <a href="index.php?m=confirmarDelete&id=<?php echo $data['id'] ?>" class="btn btn-danger">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>