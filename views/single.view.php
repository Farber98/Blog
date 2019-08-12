<?php require 'header.php'; //Cargamos el header.?>
    
<!-- Reutilizamos el codigo del index.view.php y particularizamos para la vista de un single post. -->

<div class="contenedor">
    <div class="post">
        <article>
            <h2 class="titulo">Titulo del articulo</h2>
            <p class="fecha">1 de enero de 2016</p>
            <div class="thumb">
                <a href="#">
                    <img src="<?php echo RUTA; ?>/imagenes/1.jpg" alt=""> <!-- No esta cargando la imagen. ver porque. -->
                </a>
            </div>
            <p class="intro">Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste, omnis.
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste, omnis.
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste, omnis.   <!-- Reutilizamos los estilos de la intro pero es el texto. -->
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste, omnis.
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste, omnis.
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste, omnis.
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste, omnis.</p>
        </article>
    </div>
</div>
<?php require 'footer.php'; //Cargamos el footer?>