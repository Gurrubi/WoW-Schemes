<?php
	

  $conjuntoResultado = $mi_DB->query("SELECT DISTINCT CONCAT(clases_idiomas.nombre ,'-', especs_idiomas.nombre) AS 'Clase-Especialización',concat(especs.id_clase,especs.especid) as Valor
  from especs,clases,especs_idiomas,clases_idiomas 
  where clases.claseid=clases_idiomas.id_clase
  AND clases.claseid=especs.id_clase
  AND especs.especid=especs_idiomas.id_espec
  AND clases_idiomas.id_idioma=1
  AND especs_idiomas.id_idioma=1
  ORDER BY clases_idiomas.nombre");

  $libro=array();
  echo('<select border="1"><option>Elige una clase...</option>');

  if($conjuntoResultado){  //No es necesario porque lo chequea el while, es más de concepto
      while($fila= $conjuntoResultado->fetch_assoc()){
		echo('<option>'.$fila["Clase-Especialización"].'</option>');  
      }
  }
echo('</select>');


//IDIOMA
$conjuntoResultado = $mi_DB->query("SELECT nombre,lang AS Idioma, lang as Valor FROM idiomas;");

echo('<select border="1">');

if($conjuntoResultado){  //No es necesario porque lo chequea el while, es más de concepto
    while($fila= $conjuntoResultado->fetch_assoc()){
  echo('<option>'.$fila["nombre"].'</option>');  
    }
}

echo('</select>');

