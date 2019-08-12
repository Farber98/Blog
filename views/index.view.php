<?php require 'header.php'; //Cargamos el header.?>
<div class="contenedor">
    <div class="post">
        <article>
            <h2 class="titulo"><a href="">Titulo del articulo</a></h2>
            <p class="fecha">1 de enero de 2016</p>
            <div class="thumb">
                <a href="#">
                    <img src="<?php echo RUTA; ?>/imagenes/1.jpg" alt="">
                </a>
            </div>
            <p class="intro">Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste, omnis.</p>
            <a href="#" class="continuar">Leer mas</a>
        </article>
    </div>

    <div class="post">
        <article>
            <h2 class="titulo"><a href="">Titulo del articulo</a></h2>
            <p class="fecha">1 de enero de 2016</p>
            <div class="thumb">
                <a href="#">
                    <img src="<?php echo RUTA;?>/imagenes/2.jpg" alt="">
                </a>
            </div>
                <p class="intro">Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste, omnis.</p>
                <a href="#" class="continuar">Leer mas</a>
        </article>
    </div>
    <?php require 'paginacion.php'; //Cargamos la paginacion. ?>
</div>
<?php require 'footer.php'; //Cargamos el footer?>