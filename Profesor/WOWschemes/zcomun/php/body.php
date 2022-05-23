<body class='estimgFondopc'>
    <div>
        <a target="_top"  href="http://wowschemes.com"><img border="0" src="zimgs/logonew.gif" width="237" height="67"  /></a>
    </div>
    <div class="rounded-cabecera" style="width:980px;height:60px;margin:0 auto;">
        <form id="FormSelec" name="FormSelec" style="padding-top:15px;padding-left:50px;" method="get" TARGET='_self'>
            <!--selector de Clase-espec, Hay que formar este select a partir de la Base de datos en función del idioma. 
                Usar como valores el id de la clase + id de la espec. Se aconseja usar un bucle for -->
                <select name="PersonajeSelecionado" style="vertical-align: middle;" onchange="javascript:this.form.submit();">
                    <option value="0" <?php echo(($PersonajeSelecionado==0)?"selected":"");?> >Elije una clase...</option>
                    
                    <option value=1011 <?php echo(($PersonajeSelecionado==1011)?"selected":"");?> >personaje calse-espec 1</option>
                    <option value=1012 <?php echo(($PersonajeSelecionado==1012)?"selected":"");?>>personaje calse-espec 2</option>
                    <option value=1013 <?php echo(($PersonajeSelecionado==1013)?"selected":"");?>>personaje calse-espec 3</option>
                </select>
            <!-- fin del selector de Clase-espec -->
           
            <!-- Cambiamos los iconos de clase y rol -->
            <?php    
                if($PersonajeSelecionado !=0){ 
                /*
                Cambiar los iconos en función de la id calse e id rol de la espec seleccionada
                    -Poner el icono de clase => iconos en => zimgs/IcoClases36x36/claseid.jpg
                    -Poner el icono de rol   => iconos en => zimgs/IcoRoles/rolid.jpg */
                     echo ("<img id='iconoClase' class='rounded-img4' src='zimgs/IcoClases36x36/12.jpg' width='25'style='vertical-align: middle;'/>
                    <img id='iconoRol' src='zimgs/IcoRoles/1.gif' style='vertical-align: middle;'/>");
                }
            ?>
            <!-- fin del cambio de iconos -->

            <!--Selector de Idioma, Hay que formar este select a partir de la Base de datos.
                Usar como valores el valor lang de cada idioma. Se aconseja usar un bucle for -->
                <select name="IdiomaSeleccionado" style="vertical-align: middle;" onchange="javascript:this.form.submit();">
                    <option value="es" <?php echo(($IdiomaSeleccionado=="es")?"selected":"");?>>Español</option>
                    <option value="en" <?php echo(($IdiomaSeleccionado=="en")?"selected":"");?>>Inglés</option>
                    <option value="de" <?php echo(($IdiomaSeleccionado=="de")?"selected":"");?>>Alemán</option>
                    <option value="fr" <?php echo(($IdiomaSeleccionado=="fr")?"selected":"");?>>Francés</option>
                </select>
            <!-- fin del selector de Idioma -->

            <!--Selector del ejercicio a mostar, básico o avanzado -->
                <select name="TipoListadoSeleccionado" style="vertical-align: middle;" onchange="javascript:this.form.submit();">
                    <option value="basico" <?php echo(($TipoListadoSeleccionado=="basico")?"selected":"");?>>Básico</option>
                    <option value="avanzado" <?php echo(($TipoListadoSeleccionado=="avanzado")?"selected":"");?>>Avanzado</option>
                </select>
            <!-- fin del selector de tipo de ejercicio -->
                            
        </form>
    </div>

    <!-- Ejemplo de Hechizo Tooltip a borrar -->
        <br>
        <a href="https://es.wowhead.com/spell=2948"><img src="https://wowschemes.com/ziconos/2948.jpg" /></a>
        <a href="https://es.wowhead.com/spell=2948">Agostar</a>
    <!-- fin de ejemplo a borrar -->

    <?php    
        if($PersonajeSelecionado !=0){
            if($TipoListadoSeleccionado =="basico"){
                /*
                EJERCICIO BASICO
                    Consultar en la Basse de Datos los hechizos del personaje (clase-espec-idioma)
                        Se debe obtener una tabla de resultados:
                            Categoría 1 : hechizo 1, hechizo2,...
                            Categoría 2 : hechizo 1, hechizo2,...
                            ....
                        rellenar un <div> con la lista de hechizos
                            categorías a la izquierda y sus hechizos a la derecha (icono + nombre + tooltip)
                */                  
            }else{
                /*
                EJERCICIO AVANZADO
                Consultar en la Basse de Datos los hechizos del personaje (clase-espec-idioma)
                    Se debe obtener una tabla de resultados:
                        Categoría 1 :   pasivos => hechizo 1, hechizo2,... 
                                        activos => hechizo 1, hechizo2,... 
                        Categoría 2 :   pasivos => hechizo 1, hechizo2,... 
                                        activos => hechizo 1, hechizo2,... 
                        ....
                        rellenar un <div> con la lista de hechizos
                                hechizos pasivos a la izquierda (atenuados y en su color de clase)
                                categorías en el centro
                                activos a la derecha (con su color de clase)
                */
            }
         }
    ?>

    <noscript>
        <div id="sinscript"></div>
    </noscript>
</body>
