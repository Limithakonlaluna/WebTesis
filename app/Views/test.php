<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document Title</title>
</head>

<body>
    <a href="<?= base_url('salir') ?>">salir</a>
    <a href="<?= base_url('crear_instalacion') ?>">Asignar Instalaciones</a>
    <a href="<?= base_url('generar_reportes') ?>">Generar Reportes</a>
    <?= $errores->listErrors(); ?>
    <center>
        <div>
            <h1>Formulario Usuario</h1>
            <form action="<?= base_url('guardar_usuario'); ?>" method="post">
                <input type="text" name="usuario_nombre" id="usuario_nombre" placeholder="Nombre"><br>
                <input type="email" name="usuario_correo" id="usuario_correo" placeholder="Correo"><br>
                <input type="text" name="usuario_direccion" id="usuario_direccion" placeholder="Direccion"><br>
                <input type="text" name="usuario_telefono" id="usuario_telefono" placeholder="Telefono"><br>
                <input type="password" name="usuario_contrasena1" id="usuario_contrasena1" placeholder="Contraseña"><br>
                <input type="password" name="usuario_contrasena2" id="usuario_contrasena2" placeholder="Repita Contraseña"><br>

                <select name="rol_id" id="rol_id">
                    <option value="0">Seleccion un rol</option>
                    <?php foreach ($roles as $rol) : ?>
                        <option value="<?= $rol['Rol_id']; ?>"><?= $rol['Rol_nombre']; ?></option>
                    <?php endforeach; ?>
                </select><br>
                <input type="submit" value="Registrar">

            </form>
        </div>
        <div>
            <h1>Listado de Usuarios</h1>
            <table>
                <tr>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Direccion</th>
                    <th>Telefono</th>
                    <th>Rol</th>
                    <th>Acciones</th>
                </tr>
                <?php foreach ($usuarios as $usuario) : ?>
                    <tr>
                        <td><?= $usuario['Usuario_nombre']; ?></td>
                        <td><?= $usuario['Usuario_correo']; ?></td>
                        <td><?= $usuario['Usuario_direccion']; ?></td>
                        <td><?= $usuario['Usuario_telefono']; ?></td>
                        <td><?= $usuario['Rol_nombre']; ?></td>
                        <td><a href="<?= base_url('editar_usuario/' . $usuario['Usuario_id']); ?>">Editar</a>
                            <a href="<?= base_url('eliminar_usuario/' . $usuario['Usuario_id']); ?>">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
        <div>
            <h1>Formulario Categoria Producto</h1>
            <form action="<?= base_url('guardar_categoria_producto'); ?>" method="post">
                <input type="text" name="categoria_nombre" id="categoria_nombre" placeholder="Nombre Categoria"><br>
                <input type="submit" value="Registrar">
            </form>
        </div>
        <div>
            <h1>Listado de Categorias</h1>
            <table>
                <tr>
                    <th>Nombre</th>
                    <th>Acciones</th>
                </tr>
                <?php foreach ($categorias as $categoria) : ?>
                    <tr>
                        <td><?= $categoria['Categoria_nombre']; ?></td>
                        <td><a href="<?= base_url('editar_categoria_producto/' . $categoria['Categoria_id']); ?>">Editar</a>
                            <a href="<?= base_url('eliminar_categoria_producto/' . $categoria['Categoria_id']); ?>">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
        <div>
            <h1>Formulario de Producto</h1>
            <form action="<?= base_url('guardar_producto'); ?>" method="post" enctype="multipart/form-data">
                <input type="text" name="producto_nombre" id="producto_nombre" placeholder="Nombre"><br>
                <input type="text" name="producto_descripcion" id="producto_descripcion" placeholder="Descripcion"><br>
                <input type="text" name="producto_precio" id="producto_precio" placeholder="Precio"><br>
                <input type="text" name="producto_stock" id="producto_stock" placeholder="Stock"><br>
                <input type="file" name="producto_foto" id="producto_foto"><br>
                <select name="categoria_id" id="categoria_id">
                    <option value="0">Seleccion una categoria</option>
                    <?php foreach ($categorias as $categoria) : ?>
                        <option value="<?= $categoria['Categoria_id']; ?>"><?= $categoria['Categoria_nombre']; ?></option>
                    <?php endforeach; ?>
                </select><br>
                <input type="submit" value="Registrar">
            </form>
        </div>
        <div>
            <h1>Lista de Productos</h1>
            <table>
                <tr>
                    <th>Nombre</th>
                    <th>Descripcion</th>
                    <th>Precio</th>
                    <th>Stock</th>
                    <th>Categoria</th>
                    <th>Foto</th>
                    <th>Acciones</th>
                </tr>
                <?php foreach ($productos as $producto) : ?>
                    <tr>
                        <td><?= $producto['Producto_nombre']; ?></td>
                        <td><?= $producto['Producto_descripcion']; ?></td>
                        <td><?= $producto['Producto_precio']; ?></td>
                        <td><?= $producto['Producto_stock']; ?></td>
                        <td><?= $producto['Categoria_nombre']; ?></td>
                        <td><img src="<?= base_url(); ?>/uploads/kits/<?= $producto['Producto_foto']; ?>" height="100px" width="100px" alt="producto"></td>
                        <td><a href="<?= base_url('editar_producto/' . $producto['Producto_id']); ?>">Editar</a>
                            <a href="<?= base_url('eliminar_producto/' . $producto['Producto_id']); ?>">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
        <div>
            <h1>Lista de Cultivos</h1>
            <form action="<?= base_url('guardar_tipo_cultivo'); ?>" method="post">
                <input type="text" name="tipo_nombre" id="tipo_nombre" placeholder="Nombre"><br>
                <input type="submit" value="Registrar">

            </form>
        </div>
        <div>
            <h1>Listado de Tipos Cultivo</h1>
            <table>
                <tr>
                    <th>Nombre</th>
                    <th>Acciones</th>
                </tr>
                <?php foreach ($tipo_cultivos as $tc) : ?>
                    <tr>
                        <td><?= $tc['Tipo_nombre']; ?></td>
                        <td><a href="<?= base_url('editar_tipo_cultivo/' . $tc['Tipo_id']); ?>">Editar</a>
                            <a href="<?= base_url('eliminar_tipo_cultivo/' . $tc['Tipo_id']); ?>">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
        <div>
            <h1>Crear Horarios</h1>
            <form action="<?= base_url('guardar_horario'); ?>" method="post">
                <input type="time" name="horario_inicio" id="horario_inicio" placeholder="Hora de inicio"><br>
                <input type="time" name="horario_fin" id="horario_fin" placeholder="Hora de termino"><br>
                <input type="submit" value="Registrar">
            </form>
        </div>
        <div>
            <h1>Asignar Horario trabajadores</h1>
            <form action="<?= base_url('guardar_horario_trabajador'); ?>" method="post">
                <select name="usuario_id" id="usuario_id">
                    <option value="0">Seleccione un Trabajador</option>
                    <?php foreach ($trabajadores as $trabajador) : ?>
                        <option value="<?= $trabajador['Usuario_id']; ?>"><?= $trabajador['Usuario_nombre']; ?></option>
                    <?php endforeach; ?>
                </select><br>
                <select name="horario_id" id="horario_id">
                    <option value="0">Seleccione un Horario</option>
                    <?php foreach ($horarios as $horario) : ?>
                        <option value="<?= $horario['Horario_id']; ?>"><?= $horario['Horario_inicio'] . ' - ' . $horario['Horario_fin']; ?></option>
                    <?php endforeach; ?>
                </select><br>
                <input type="submit" value="Asignar">
            </form>
        </div>
        <div>
            <h1>Formulario Datos Empresa</h1>
            <form action="<?= base_url('guardar_datos_empresa'); ?>" method="post">
                <textarea name="datos_mision" id="datos_mision" cols="30" rows="5" placeholder="Mision"></textarea><br>
                <textarea name="datos_vision" id="datos_vision" cols="30" rows="5" placeholder="Vision"></textarea><br>
                <textarea name="datos_comentario" id="datos_comentario" cols="30" rows="5" placeholder="Sobre Nosotros"></textarea><br>
                <input type="submit" value="Crear">
            </form>
        </div>
        <div>
            <h1>Listado Instalaciones</h1>
            <table>
                <tr>
                    <th>Nombre Cliente</th>
                    <th>Direccion</th>
                    <th>Telefono</th>
                    <th>Fecha</th>
                    <th>Tecnico</th>
                    <th>Acciones</th>
                </tr>
                <?php foreach ($instalaciones as $instalacion) : ?>
                    <tr>
                        <td><?= $instalacion['Usuario_nombre']; ?></td>
                        <td><?= $instalacion['Usuario_direccion']; ?></td>
                        <td><?= $instalacion['Usuario_telefono']; ?></td>
                        <td><?= $instalacion['Orden_fecha']; ?></td>
                        <td><?= $instalacion['Tecnico']; ?></td>
                        <td><a href="<?= base_url('editar_instalacion/' . $instalacion['Instalacion_id']); ?>">Editar</a>
                            <a href="<?= base_url('eliminar_instalacion/' . $instalacion['Instalacion_id']); ?>">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </center>
</body>

</html>