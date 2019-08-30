<?php require 'header.php'; ?>
<div class="contenedor">
        <div class="post">
            <article>
                <h2 class="titulo">Nuevo articulo</h2> <!-- Llenamos dinamicamente y ponemos los enlaces. -->
                <form class="formulario" method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>"> <!-- Creamos el form. -->
                    <input type="text" name="titulo" placeholder="Titulo">
                    <input type="text" name="intro" placeholder="Introduccion">
                    <textarea name="texto" placeholder="Texto"></textarea>
                    <input type="file" name="thumb">
                    <input type="submit" value="Crear">
                </form>
            </article>
         </div>
</div>
<?php require 'footer.php'; ?>