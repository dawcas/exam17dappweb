<?php
//~ ini_set('display_errors', 1);
//~ ini_set('display_startup_errors', 1);
//~ error_reporting(E_ALL);

require __DIR__ . '/vendor/autoload.php';

use Ballen\Distical\Calculator as DistanceCalculator;
use Ballen\Distical\Entities\LatLong;
use Illuminate\Http\Request;
use SujalPatel\IntToEnglish\IntToEnglish;

?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="CSS/estilo.css">
        <!--Import Google Icon Font-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--Import materialize.css-->
        <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />

        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta charset="UTF-8">
    </head>
    
    <body>
        <div class="row">

            <div class="col s12  blue center-align card-panel teal lighten-2">
                <h4>Examen Despliegue Aplicaciones Web</h4>
            </div>
            
            <div class="col s12  ">
                
                <p>Lo que vamos a realizar es una aplicacion en PHP, que realize lo siguiente:
                <ol>
                <li>Dado dos puntos calcular la distancia entre ellos. Esos puntos vendran marcados por su latitud y su longitud </li>
                <li>Una vez halla calculado la distancia quiero que me traduzca al ingles esa distancia.</li>
                </ol>
                </p>
                <p>
                Por ejemplo dadas las siguientes coordenadas:
                <ul>
                <li>(41.65518, -4.72372) corresponde a Valladolid </li>
                <li>(37.38283, -5.97317) corresponde a Sevilla </li>
                </ul>
                
                </p>
            
                
            </div>
            <aside>
                        <h5>Enlace Heroku </h5>
                        Pulsa sobre esta imagen para ver desplegada la aplicacion sobre heroku
                        <p>
                        <a title="Heroku" href="https://exmn17dawcas.herokuapp.com/">
                            <img src="imagenes/heroku.png" alt="Heroku" width="120" height="120" />
                        </a>
                        </p>
            </aside>
            <form class="col s12" method = "POST">
                <div class="row">
                    
                    <div class="input-field col s2">
                        <label for="lat0">Introduce la Latitud Punto 1:</label>
                        <input name="lat0" id="lat0" type="text" class="validate">
                        
                    </div>
                    <div class="input-field col s2">
                        <label for="long0">Introduce la Longitud  Punto 1:</label>
                        <input name="long0" id="long0" type="text" class="validate">
                    
                    </div>
                    <div class="input-field col s2">
                        <label for="lat1">Introduce la Latitud Punto 2:</label>
                        <input name="lat1" id="lat1" type="text" class="validate">
                    
                    </div>
                    <div class="input-field col s2">
                        <label for="long1">Introduce la Longitud  Punto 2:</label>
                        <input name="long1" id="long1" type="text" class="validate">
                    
                    </div>
                   
                    <div class="row "></div> <!-- linea en blanco -->
                    
                    <div class="col s4">
                        <button class="btn waves-effect waves-light" type="submit" name="calcular">Calcular</button>
                    </div>
                    
                </div>
            </form>
<?php
if ($_POST) {
    // Set our Lat/Long coordinates
    $point0 = new LatLong($_POST['lat0'], $_POST['long0']);
    $point1 = new LatLong($_POST['lat1'], $_POST['long1']);

    // Get the distance between these two Lat/Long coordinates...
    $distanceCalculator = new DistanceCalculator($point0, $point1);

    // You can then compute the distance... As kilometres...
    $distance = $distanceCalculator->get()->asKilometres();
    
    // Distance in an English string
    $disString = IntToEnglish::Int2Eng((int) $distance);
?>
<p>La distancia entre ambos puntos dados es de: <?=$distance?>km.</p>
<p>The distance between the two given points is: <?=$disString?> kilometres.</p>
<?php
} 
?>
        </div>
 
        <!--JavaScript at end of body for optimized loading-->
        <script type="text/javascript" src="js/materialize.min.js"></script>
    </body>
</html>


