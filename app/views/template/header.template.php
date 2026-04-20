<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <base href="<?= BASE_URL ?>">
    <title>Bibliotecario</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #ece5e5;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        main {
            display: flex;
            flex-direction: column;
            gap: 32px;
            padding: 24px;
            flex: 1;
        }

        a {
            text-decoration: none;
            color: #614040;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            padding: 8px 12px;
        }

        main div {
            background-color: #fff;
            padding: 16px;
            border-radius: 8px;
        }

        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 12px 24px;
            background-color: #c2c2c2;
            font-size: 16px;
        }

       form {
    display: flex;
    flex-direction: column;
    gap: 12px;
}

input, select, textarea, button {
        resize: none;

    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 14px;
}

button {
    background-color: #c2c2c2;
    cursor: pointer;
}

label {
    font-weight: bold;
}

table {
    width: 100%;
    border-collapse: collapse;
}

th, td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
}

        footer {
            position: relative;
            bottom: 0px;
            text-align: center;
            padding: 12px;
            background-color: #c2c2c2;
            font-size: 14px;
        }
    </style>
</head>

<body>
    <nav>
        <a href="home">📚 Bibliotecario</a>
        <div>
            <a href="escritores">Escritores</a>
            <a href="libros">Libros</a>
            <?php if (isset($_SESSION['usuario_id'])): ?>
                <?php if ($_SESSION['usuario_rol'] === 'admin'): ?>
                    <a href="usuarios">Usuarios</a>
                <?php endif; ?>
                <span>Hola, <?= htmlspecialchars($_SESSION['usuario_nombre']) ?></span>
                <a href="logout">Salir</a>
            <?php else: ?>
                <a href="login">Iniciar sesión</a>
                <a href="registro">Registrarse</a>
            <?php endif; ?>
        </div>
    </nav>