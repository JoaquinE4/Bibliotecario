<?php
class UsuariosView
{

    public function renderAll($usuarios)
    {
        require __DIR__ . '/template/header.template.php';
?>
        <main>
            <div>
                <h1>Usuarios</h1>
                <a href="usuario/nuevo">+ Nuevo</a>
            </div>
            <?php if (!empty($usuarios)): ?>
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Usuario</th>
                            <th>Email</th>
                            <th>Rol</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($usuarios as $usuario): ?>
                            <tr>
                                <td><?= htmlspecialchars($usuario->id) ?></td>
                                <td><?= htmlspecialchars($usuario->usuario) ?></td>
                                <td><?= htmlspecialchars($usuario->email) ?></td>
                                <td><?= htmlspecialchars($usuario->rol) ?></td>
                                <td>
                                    <a href="usuario/eliminar/<?= $usuario->id ?>" onclick="return confirm('¿Eliminar?')">Eliminar</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p>No hay usuarios registrados.</p>
            <?php endif; ?>
        </main>
    <?php
        require __DIR__ . '/template/footer.template.php';
    }

    public function renderForm($error = '')
    {
        require __DIR__ . '/template/header.template.php';
    ?>
        <main>
            <div>
                <h2>Nuevo Usuario</h2>
                <?php if (!empty($error)): ?>
                    <div><?= htmlspecialchars($error) ?></div>
                <?php endif; ?>
                <form action="usuario/nuevo" method="POST">
                    <div>
                        <label>Usuario</label>
                        <input type="text" name="usuario" required>
                    </div>
                    <div>
                        <label>Email</label>
                        <input type="email" name="email" required>
                    </div>
                    <div>
                        <label>Contraseña</label>
                        <input type="password" name="password" required minlength="6">
                    </div>
                    <div>
                        <label>Rol</label>
                        <select name="rol">
                            <option value="user">User</option>
                            <option value="admin">Admin</option>
                        </select>
                    </div>
                    <div>
                        <a href="usuarios">Cancelar</a>
                        <button type="submit">Guardar</button>
                    </div>
                </form>
            </div>
        </main>
    <?php
        require __DIR__ . '/template/footer.template.php';
    }

    public function renderLogin($error = '')
    {
        require __DIR__ . '/template/header.template.php';
    ?>
        <main>
            <div>
                <h2>Iniciar sesión</h2>
                <?php if (!empty($error)): ?>
                    <div><?= htmlspecialchars($error) ?></div>
                <?php endif; ?>
                <form action="doLogin" method="POST">
                    <div>
                        <label>Email</label>
                        <input type="email" name="email" required>
                    </div>
                    <div>
                        <label>Contraseña</label>
                        <input type="password" name="password" required>
                    </div>
                    <div>
                        <button type="submit">Ingresar</button>
                    </div>
                </form>
                <p>¿No tenés cuenta? <a href="registro">Registrate</a></p>
            </div>
        </main>
    <?php
        require __DIR__ . '/template/footer.template.php';
    }

    public function renderRegistro($error = '')
    {
        require __DIR__ . '/template/header.template.php';
    ?>
        <main>
            <div>
                <h2>Crear cuenta</h2>
                <?php if (!empty($error)): ?>
                    <div><?= htmlspecialchars($error) ?></div>
                <?php endif; ?>
                <form action="doRegistro" method="POST">
                    <div>
                        <label>Usuario</label>
                        <input type="text" name="usuario" required>
                    </div>
                    <div>
                        <label>Email</label>
                        <input type="email" name="email" required>
                    </div>
                    <div>
                        <label>Contraseña</label>
                        <input type="password" name="password" required minlength="6">
                    </div>
                    <div>
                        <button type="submit">Registrarse</button>
                    </div>
                </form>
                <p>¿Ya tenés cuenta? <a href="login">Iniciá sesión</a></p>
            </div>
        </main>
    <?php
        require __DIR__ . '/template/footer.template.php';
    }

    public function renderError($error)
    {
        require __DIR__ . '/template/header.template.php';
    ?>
        <main>
            <div><?= htmlspecialchars($error) ?></div>
            <a href="home">Volver</a>
        </main>
<?php
        require __DIR__ . '/template/footer.template.php';
    }
}
