<?php //Reutilizamos la paginacion que se la llama muchas veces. ?>

<section class="paginacion">
    <ul>
        <?php $numero_paginas = numero_paginas($blog_config['post_por_pagina'],$conexion); //Para manejar la cantidad de paginas en nuestra paginacion.?>  
            <?php if(pagina_actual()===1): ?>       <!-- Primera pagina deshabilita flecha izquierda. No se puede ir mas para atras -->
                <li class="disabled">&laquo;</li>
            <?php else: ?>  <!-- Sino, activamos el enlace y al apretarlo se resta uno a la pagina por enlace. -->
                <li><a href="index.php?p=<?php echo pagina_actual() -1;?>">&laquo;</a></li>
            <?php endif; ?>
               
            <?php for($i=1; $i <= $numero_paginas; $i++): ?>    <!-- Redirigimos a la pagina correspondiente.. -->
                <?php if(pagina_actual() === $i):  ?>   
                    <li class="active">     <!-- Marcamos pagina actual. -->
                        <?php echo $i; ?>
                    </li>
                <?php else: ?>
                    <li><a href="index.php?p=<?php echo $i;?>"><?php echo $i; ?></a></li>   <!-- Vamos a la pagina que apretemos por indice. -->
                <?php endif; ?>
            <?php endfor; ?>

            <?php if(pagina_actual() == $numero_paginas): ?>    <!-- Si estamos en la ultima pagina deshabilitamos la flecha hacia adelante.  -->
                <li class="disabled">&raquo;</li>
            <?php else: ?>
                <li><a href="index.php?p=<?php echo pagina_actual() +1;?>">&raquo;</a></li> <!-- Sino, activamos el enlace y al apretarlo se suma uno a la pagina por enlace. -->
            <?php endif; ?>

            
    </ul>
</section>