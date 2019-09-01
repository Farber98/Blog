<?php require 'header.php'; ?>
<div class="contenedor">
        <div class="post">
            <article>       <!-- atributos hidden sirven para guardar temporalmente info pero no se muestran en pantalla. -->
                <h2 class="titulo">Editar articulo</h2> 
                <form class="formulario" method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>"> <!-- Creamos el form. -->
                    <input type="hidden" value="<?php echo $post['id']; ?>" name="id"> <!-- Nos va servir para poder decir cual va ser el id del articulo que estamos trabajando. -->
                    <input type="text" name="titulo"value="<?php echo $post['titulo']; ?>"> <!-- Quitamos los placeholder asi ppueden obtener los valores anteriores. -->
                    <input type="text" name="intro" value="<?php echo $post['intro']; ?>">
                    <textarea name="texto"><?php echo $post['texto'];?></textarea>
                    <input type="file" name="thumb">  <!-- Si queremos subir otra imagen y descartar la anterior. -->
                    <input type="hidden" name="thumb-guardada" value="<?php echo $post['thumb'];?>"> <!-- En caso de no subir otra imagen, tomamos la anterior -->
                    <input type="submit" value="Modificar">
                </form>
            </article>
         </div>
</div>
<?php require 'footer.php'; ?>