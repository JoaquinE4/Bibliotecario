<?php
class LibrosView
{

    public function renderAll($libros)
    {
        require __DIR__ . '/template/header.template.php';
?>
        <main>
            <div>
                <h1>Libros</h1>
                <?php if (isset($_SESSION['admin'])): ?>

                    <a href="libro/nuevo">+ Nuevo</a>
                <?php endif; ?>
            </div>
            <?php if (empty($libros)): ?>
                <p>No hay libros registrados.</p>
            <?php else: ?>
                <?php foreach ($libros as $libro): ?>
                    <div>
                        <div>
                            <div>
                                <h2><?= htmlspecialchars($libro->titulo) ?></h2>
                                <p><strong>Autor:</strong> <?= htmlspecialchars($libro->escritor_nombre ?? 'Desconocido') ?></p>
                                <p><strong>Año:</strong> <?= $libro->anio ?></p>
                                <p><?= htmlspecialchars(substr($libro->sinopsis ?? '', 0, 150)) ?>...</p>
                                <a href="libro/<?= $libro->id ?>">Ver más</a>
                            </div>
                            <?php if ($_SESSION['usuario_rol'] === 'admin'): ?>
                                <div>
                                    <a href="libro/editar/<?= $libro->id ?>">Editar</a>
                                    <a href="libro/eliminar/<?= $libro->id ?>" onclick="return confirm('¿Eliminar?')">Eliminar</a>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </main>
    <?php
        require __DIR__ . '/template/footer.template.php';
    }

    public function renderDetalle($libro)
    {
        require __DIR__ . '/template/header.template.php';
    ?>
        <main>
            <div>
                <h1><?= htmlspecialchars($libro->titulo) ?></h1>
                <?php if (isset($_SESSION['usuario_rol']) && $_SESSION['usuario_rol'] === 'admin'): ?> <div>
                        <a href="libro/editar/<?= $libro->id ?>">Editar</a>
                        <a href="libro/eliminar/<?= $libro->id ?>" onclick="return confirm('¿Eliminar?')">Eliminar</a>
                    </div>
                <?php endif; ?>
            </div>
            <p><strong>Autor:</strong> <?= htmlspecialchars($libro->escritor_nombre ?? 'Desconocido') ?></p>
            <p><strong>Año:</strong> <?= $libro->anio ?></p>
            <p><strong>Sinopsis:</strong></p>
            <p><?= nl2br(htmlspecialchars($libro->sinopsis ?? '')) ?></p>

            <a href="libros">Volver</a>
            <a href="escritor/<?= $libro->autor ?>">Ver autor</a>
        </main>
    <?php
        require __DIR__ . '/template/footer.template.php';
    }

    public function renderForm($libro = null, $escritores = [], $error = '')
    {
        $editando = $libro !== null;
        require __DIR__ . '/template/header.template.php';
    ?>
        <main>
            <h1><?= $editando ? 'Editar Libro' : 'Nuevo Libro' ?></h1>
            <?php if (!empty($error)): ?>
                <div><?= htmlspecialchars($error) ?></div>
            <?php endif; ?>
            <form action="<?= $editando ? 'libro/editar/' . $libro->id : 'libro/nuevo' ?>" method="POST">
                <label>Título</label>
                <input type="text" name="titulo" value="<?= htmlspecialchars($libro->titulo ?? '') ?>" required>
                <label>Autor</label>
                <select name="autor" required>
                    <option value="">-- Seleccioná un escritor --</option>
                    <?php foreach ($escritores as $escritor): ?>
                        <option value="<?= $escritor->id ?>" <?= isset($libro->autor) && $libro->autor == $escritor->id ? 'selected' : '' ?>>
                            <?= htmlspecialchars($escritor->nombre) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                <label>Sinopsis</label>
                <textarea name="sinopsis" rows="3"><?= htmlspecialchars($libro->sinopsis ?? '') ?></textarea>
                <label>Año de publicación</label>
                <input type="number" name="anio" value="<?= $libro->anio ?? '' ?>" required>
                <a href="libros">Cancelar</a>
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
            <a href="libros">Volver</a>
        </main>
<?php
        require __DIR__ . '/template/footer.template.php';
    }
}
