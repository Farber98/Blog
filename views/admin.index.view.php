<?php require '../views/header.php';?>      <!-- PORQUE NO SE CARGAN LOS ESTILOS LPMM -->
<div class="contenedor">
    <h2>Panel de control</h2>
    <a href="nuevo.php" class="btn">Nuevo post</a>
    <a href="cerrar.php" class="btn">Cerrar sesion</a>
    <?php foreach($posts as $post): ?>  <!-- Cargamos dinamicamente la BD. -->
        <div class="post">
            <article>
                <h2 class="titulo"><?php echo $post['id'] . '.- ' . $post['titulo']; ?></h2>
                <a href="editar.php?id=<?php echo $post['id']; ?>php">Editar</a>
                <a href="../single.php?id=<?php echo $post['id']; ?>php">Ver</a>
                <a href="borrar.php?id=<?php echo $post['id']; ?>php">Borrar</a>
            </article>
         </div>
    <?php endforeach; ?>
    <?php require '../paginacion.php'; //Cargamos la paginacion. ?> <!-- PORQUE NO SE CARGAN LOS ESTILOS LPMM -->
</div>
<?php require '../views/footer.php'; //Cargamos el footer?> <!-- PORQUE NO SE CARGAN LOS ESTILOS LPMM -->
