<?php require 'header.php'; //Cargamos el header.?>
    
<!-- Reutilizamos el codigo del index.view.php y particularizamos para la vista de un single post. -->

<div class="contenedor">
    <div class="post">
        <article>
            <h2 class="titulo"><?php echo $post['titulo']; ?></h2>
            <p class="fecha"><?php echo fecha($post['fecha']); ?></p>
            <div class="thumb">
                    <img src="<?php echo RUTA; ?>/imagenes/<?php echo $post['thumb']; ?>" alt="<?php echo $post['titulo']; ?>"> <!-- No esta cargando la imagen. ver porque. -->
            </div>
            <p class="intro"><?php echo $post['texto']; ?></p> <!-- Reutilizamos los estilos de la intro pero es el texto. -->
        </article>
    </div>
</div>
<?php require 'footer.php'; //Cargamos el footer?>