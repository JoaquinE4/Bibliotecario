<?php
class HomeView {
    public function render() {
        require __DIR__ . '/template/header.template.php';
        ?>
        <main>
            <h1> Bienvenido a la Biblioteca</h1>
            <p>Explora nuestro catálogo</p>
            <ul style="margin-top: 16px; list-style: none; display: flex; gap: 12px;">
                <li><a href="escritores" class="btn btn-primary"> Ver Escritores</a></li>
                <li><a href="libros" class="btn btn-primary"> Ver Libros</a></li>
            </ul>
        </main>
        <?php
        require __DIR__ . '/template/footer.template.php';
    }
}