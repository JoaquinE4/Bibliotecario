<?php
class EscritoresView
{

    public function renderAll($escritores)
    {
        require __DIR__ . '/template/header.template.php';
?>
        <main>
            <div>
                <h1>Escritores</h1>
                <?php if (isset($_SESSION['usuario_rol']) && $_SESSION['usuario_rol'] === 'admin'): ?> <a href="escritor/nuevo">+ Nuevo</a>
                <?php endif; ?>
            </div>
            <?php if (empty($escritores)): ?>
                <p>No hay escritores registrados.</p>
            <?php else: ?>
                <?php foreach ($escritores as $escritor): ?>
                    <div>

                        <div>
                            <h2><?= htmlspecialchars($escritor->nombre) ?></h2>
                            <p><strong>Origen:</strong> <?= htmlspecialchars($escritor->origen) ?></p>
                            <p><strong>Nacimiento:</strong> <?= $escritor->fecha_nac ?></p>
                            <p><?= htmlspecialchars(substr($escritor->descripcion ?? '', 0, 150)) ?>...</p>
                            <a href="escritor/<?= $escritor->id ?>">Ver más</a>
                        </div>
                        <?php if (isset($_SESSION['usuario_rol']) && $_SESSION['usuario_rol'] === 'admin'): ?> <div>
                                <a href="escritor/editar/<?= $escritor->id ?>">Editar</a>
                                <a href="escritor/eliminar/<?= $escritor->id ?>" onclick="return confirm('¿Eliminar?')">Eliminar</a>
                            </div>
                        <?php endif; ?>

                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </main>
    <?php
        require __DIR__ . '/template/footer.template.php';
    }

    public function renderDetalle($escritor, $libros)
    {
        require __DIR__ . '/template/header.template.php';
    ?>
        <main>
            <div>
                <h1><?= htmlspecialchars($escritor->nombre) ?></h1>
                <?php if (isset($_SESSION['usuario_rol']) && $_SESSION['usuario_rol'] === 'admin'): ?> <div>
                        <a href="escritor/editar/<?= $escritor->id ?>">Editar</a>
                        <a href="escritor/eliminar/<?= $escritor->id ?>" onclick="return confirm('¿Eliminar?')">Eliminar</a>
                    </div>
                <?php endif; ?>
            </div>
            <div>
                <p><strong>Origen:</strong> <?= htmlspecialchars($escritor->origen) ?></p>
                <p><strong>Nacimiento:</strong> <?= $escritor->fecha_nac ?></p>
                <p><?= nl2br(htmlspecialchars($escritor->descripcion)) ?></p>
            </div>
            <h2>Libros</h2>
            <?php if (!empty($libros)): ?>
                <?php foreach ($libros as $libro): ?>
                    <div>
                        <p><strong><?= htmlspecialchars($libro->titulo) ?></strong> (<?= $libro->anio ?>)</p>
                        <p><?= htmlspecialchars(substr($libro->sinopsis ?? '', 0, 100)) ?>...</p>
                        <a href="libro/<?= $libro->id ?>">Ver libro</a>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No hay libros de este escritor.</p>
            <?php endif; ?>

            <a href="escritores">Volver</a>
        </main>
    <?php
        require __DIR__ . '/template/footer.template.php';
    }

    public function renderForm($escritor = null, $error = '')
    {
        $editando = $escritor !== null;
        require __DIR__ . '/template/header.template.php';
    ?>
        <main>
            <h1><?= $editando ? 'Editar Escritor' : 'Nuevo Escritor' ?></h1>
            <?php if (!empty($error)): ?>
                <div><?= htmlspecialchars($error) ?></div>
            <?php endif; ?>
            <form action="<?= $editando ? 'escritor/editar/' . $escritor->id : 'escritor/nuevo' ?>" method="POST">
                <label>Nombre</label>
                <input type="text" name="nombre" value="<?= htmlspecialchars($escritor->nombre ?? '') ?>" required>
                <label>Descripción</label>
                <textarea name="descripcion" rows="3"><?= htmlspecialchars($escritor->descripcion ?? '') ?></textarea>
                <label>Fecha de nacimiento</label>
                <input type="date" name="fecha_nac" value="<?= $escritor->fecha_nac ?? '' ?>" required>
                <label>Origen</label>
                <input type="text" name="origen" value="<?= htmlspecialchars($escritor->origen ?? '') ?>" required>
                <a href="escritores">Cancelar</a>
                <button type="submit"><?= $editando ? 'Actualizar' : 'Guardar' ?></button>
                </div>
            </form>
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
            <a href="escritores">Volver</a>
        </main>
<?php
        require __DIR__ . '/template/footer.template.php';
    }
}
