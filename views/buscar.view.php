<?php require 'header.php'; //Cargamos el header.?>
<div class="contenedor">
    <h2><?php echo $titulo; ?></h2>
    <?php foreach($resultados as $post): ?>  <!-- Cargamos dinamicamente la BD. -->
        <div class="post">
            <article>
                <h2 class="titulo"><a href="single.php?=id<?php echo $post['id']; ?>"><?php echo $post['titulo'];?></a></h2> <!-- Llenamos dinamicamente y ponemos los enlaces. -->
                <p class="fecha"><?php echo fecha($post['fecha']);?></p> <!-- Funcion fecha pa mostrar bonito. -->
                <div class="thumb">
                    <a href="single.php?=id<?php echo $post['id']; ?>">
                      <img src="<?php echo RUTA;?>/imagenes/<?php echo $post['thumb'];?>" alt="">
                    </a>
                </div>
                <p class="intro"><?php echo $post['intro'];?></p>
                <a href="single.php?=id<?php echo $post['id']; ?>" class="continuar">Leer mas</a>
            </article>
         </div>
    <?php endforeach; ?>
   
   
    <?php require 'paginacion.php'; //Cargamos la paginacion. ?>
</div>
<?php require 'footer.php'; //Cargamos el footer?>