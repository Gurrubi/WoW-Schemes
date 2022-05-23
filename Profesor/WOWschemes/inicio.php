<?php
  /*
    Aquí leemos (en el servidor) las variables del formulario pasadas por GET
    Las que no estén inicializadas le damos un valor de partida
  */
  header("Content-Type: text/html;charset=utf-8");

  // Vamos a definir cuatro variables con los datos de conexión 
  $usuario = "root";
  $pass = "";
  $dbname = "wowschemes";
  $host = "localhost";

  // Crear un nuevo objeto de la clase mysqli
  $mi_DB = new mysqli($host, $usuario, $pass, $dbname);

  if($mi_DB->connect_error){
      die("Error de conexión (".$mi_DB->connect_errno.")".$mi_DB->connect_error);
  }

  $acentos = $mi_DB->query("SET NAMES 'utf8'");

  //El idioma
  if (isset($_GET["IdiomaSeleccionado"])){
    $IdiomaSeleccionado = $_GET["IdiomaSeleccionado"];
    $idiomaActual = $mi_DB->query("SELECT * FROM idiomas WHERE lang = $IdiomaSeleccionado");
    echo($IdiomaSeleccionado);
    while($idioma = $IdiomaActual->fetch_assoc()){
      echo('Funcionaaa!!');
      $IDidioma= $idioma["idiomaid"]; //Buscar en la BD la ID de icioma
      $NombreIdioma = $idioma["nombre"]; //Buscar en la BD el nombre del Idioma a este ID de icioma
      $DescripcionIdioma = $idioma["descripcion"];
    }
  }else{
      //Por defecto usamos Español
      $IdiomaSeleccionado = "es";
      $IDidioma = 1;
      $NombreIdioma = "Español";
      $DescripcionIdioma = "Una base de datos con hechizos del juego World of Warcraft, clasificados por categorías y presentados en esquemas para facilitar su consulta y aprendizaje. Ofrece más de 10.000 esquemas comparativos entre las diferentes clases y especializaciones de personajes.";
  }

  //El personaje (clase-espec) seleccionado
  //El primer item del select arroja un valor 0 que equivale al texto "Elige una clase..."
  if (isset($_GET["PersonajeSelecionado"])){
    $PersonajeSelecionado = $_GET["PersonajeSelecionado"];
    if($PersonajeSelecionado !=0){
      $ClaseID=10; //las dos primieras posiciones la id clase
      $EspecID=12; // y las dos últimas la id de la espec
    }
  }else{
    //por defecto no hay personaje seleccionado
    $PersonajeSelecionado=0;
  }
  
  //El tipo de EJERCIICO que se mostrará
  if (isset($_GET["TipoListadoSeleccionado"])){
    $TipoListadoSeleccionado = $_GET["TipoListadoSeleccionado"];
  }else{
    $TipoListadoSeleccionado="basico";
  } 
?>

<!-- CONSTRUIMOS EL HTML DINÁMICO -->
<!DOCTYPE html>

<!-- El idioma de la página -->
<?php echo("<html lang='$IdiomaSeleccionado'>");?>

<head>
  <!-- Algunas etiquetas de cabecera -->
  <meta charset='utf-8' />
  <meta name="google" content="notranslate" />
  
  <!-- Este título y descripción habrá que poner el del idioma -->
  <title>WOWschemes: <?php echo($idioma["nombre"]);?></title>
  <meta name='description'content='Una base de datos con hechizos del juego World of Warcraft, clasificados por categorías y presentados en esquemas para facilitar su consulta y aprendizaje. Ofrece más de 10.000 esquemas comparativos entre las diferentes clases y especializaciones de personajes.';/>

  <!-- La carga de la hoja de estilos -->
  <link href="zestilos/estilos.css" rel="stylesheet" type="text/css" />
  
  <!-- Carga de herramienta de Tooltip externos -->
      <script>const whTooltips = {renameLinks: false};</script>
      <script src="https://wow.zamimg.com/widgets/power.js"></script>


  <!-- Detección del tipo de dispositivo usando la clase Mobile_Detect.php OPCIONAL -->
  <?php 
    require_once ('zcomun/php/Mobile_Detect.php');
    $detect = new Mobile_Detect();
    if(($detect->isMobile())&&(!$detect->isTablet())) {
      $DISP='mob'; 
      if( stristr($_SERVER['HTTP_USER_AGENT'],'android')){
        //En android no se amplia automáticamente, solo cuando lo hace el usuario	?>
        <meta name="viewport" content="width=device-width, initial-scale=1" />
      <?php }else{ 
        //en ios aunque pongamos user-scalable=no el usuario podrá escalar, pero el sistema no, que es lo que pretendemos?>
        <meta name="viewport" content="width=device-width, user-scalable=no" />
      <?php } 
    } elseif ($detect->isTablet()){$DISP='tab';
    } else {$DISP='pc';}
  ?>

  <!-- favicon y para dispositivos apple -->
  <link rel="shortcut icon" type="image/x-icon" href="/zimgs/minilogo.png" />
  <link rel="apple-touch-icon" href="/zimgs/logo114.png" />
</head>

<?php if($DISP=='mob'){
  require_once ('zcomun/php/body_mob.php');
}else{
  require_once ('zcomun/php/body.php');	
}?>
</html>	  