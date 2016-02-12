<?php
session_start();
/**
 * Bases de datos - agenda.php
 *
 * @author    Joan Piera Simó
 * @copyright 2016 Joan Piera Simó
 * @license   http://www.gnu.org/licenses/agpl.txt AGPL 3 or later
 * @version   2016-02-05
 *
 *  This program is free software: you can redistribute it and/or modify
 *  it under the terms of the GNU Affero General Public License as published by
 *  the Free Software Foundation, either version 3 of the License, or
 *  any later version.
 *
 *  This program is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU Affero General Public License for more details.
 *
 *  You should have received a copy of the GNU Affero General Public License
 *  along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

// Constantes y variables globales

//define("FORM_METHOD",    "get");           // Formularios se envían con GET
define("FORM_METHOD",    "post");        // Formularios se envían con POST

define("MYSQL",          "MySQL");         // Base de datos MySQL 
//define("SQLITE",         "SQLite");        // Base de datos SQLITE

define("MENU_PRINCIPAL", "menuPrincipal"); // Menú principal
define("MENU_VOLVER",    "menuVolver");    // Menú Volver a inicio
$usuario      = $_SESSION['usuario'];
$tamNombre    = 40;                        // Tamaño del campo Nombre
$tamApellidos = 60;                        // Tamaño del campo Apellidos
$tamUsuario   = 20;
$tamTelefono  = 9;
$tamCorreo    = 25;
$tamDireccion = 80;
$tamPassword  = 25;

$dbMotor = MYSQL;                         // Base de datos empleada (MYSQL o SQLITE)

if ($dbMotor == MYSQL) {
    require_once "agenda_mysql.php";
} elseif ($dbMotor == SQLITE) {
    require_once "agenda_sqlite.php";
}

// Funciones comunes

function recoger($var) 
{
    $tmp = (isset($_REQUEST[$var]))
        ? trim(htmlspecialchars($_REQUEST[$var], ENT_QUOTES, "UTF-8"))
        : "";
    return $tmp;
}

function recogeMatriz($var)
{
    $tmpMatriz = array();
    if (isset($_REQUEST[$var]) && is_array($_REQUEST[$var])) {
        foreach ($_REQUEST[$var] as $indice => $valor) {
            $indiceLimpio = trim(htmlspecialchars($indice, ENT_QUOTES, "UTF-8"));
            $valorLimpio  = trim(htmlspecialchars($valor,  ENT_QUOTES, "UTF-8"));
            $tmpMatriz[$indiceLimpio] = $valorLimpio;
        }
    }
    return $tmpMatriz;
}

function cabecera($texto, $menu)
{
    global $usuario;
    print "<!DOCTYPE html>\n";
    print "<html lang=\"es\">\n";
    print "<head>\n";
    print '<!-- Latest compiled and minified CSS -->';
    print ' <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">';

    print '<!-- Optional theme -->';
    print ' <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">';

    print '<!-- Latest compiled and minified JavaScript -->';
    print ' <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>';
    print "  <meta charset=\"utf-8\" />\n";
    print "  <title>$texto. Agenda de teléfonos \n";
    print "  Proyecto. PHP. Joan Piera Simó</title>\n";
    //print "  <link href=\"joan.css\" rel=\"stylesheet\" type=\"text/css\" />\n";
    print '<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">';
    print "</head>\n";
    print "\n";
    print "<body>\n";
    print "<header>\n";
    
    print "  <div style='padding-left: 10px'><h1>Agenda - $texto - $usuario</h1></div>\n";
    print "</header>\n";
    print "\n";
   
    
    print '<!-- Fixed navbar -->';
    print '<nav class="navbar navbar-inverse">';
    print '  <div class="container">';
    print '    <div class="navbar-header">';
    print '      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">';
    print '        <span class="sr-only">Toggle navigation</span>';
    print '        <span class="icon-bar"></span>';
    print '        <span class="icon-bar"></span>';
    print '        <span class="icon-bar"></span>';
    print '      </button>';
    print '    </div>';
    print '    <div id="navbar" class="navbar-collapse collapse">';
    print '      <ul class="nav navbar-nav">';
    print '        <li><a href=\'insertar1.php\'><i class="fa fa-plus"></i></i>Añadir registro</a></li>';
    print '        <li><a href=\'listar.php\'><i class="fa fa-list"></i>Listar</a></li>';
    print '        <li><a href=\'borrar1.php\'><i class="fa fa-trash"></i>Borrar</a></li>';
    print '        <li><a href=\'buscar1.php\'><i class="fa fa-search"></i>Buscar</a></li>';
    print '        <li><a href=\'modificar1.php\'><i class="fa fa-pencil"></i>Modificar</a></li>';
    print '        <li><a href=\'index.php\'><i class="fa fa-plus-square-o"></i>Log Out</a></li>';
    print '      </ul>';
    print '    </div><!--/.nav-collapse -->';
    print '  </div>';
    print '</nav>';
    
    
    print "<main>\n";
     
   
}



function cabeceraIndex($texto, $menu)
{
    print "<!DOCTYPE html>\n";
    print "<html lang=\"es\">\n";
    print "<head>\n";
    print '<!-- Latest compiled and minified CSS -->';
    print ' <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">';

    print '<!-- Optional theme -->';
    print ' <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">';

    print '<!-- Latest compiled and minified JavaScript -->';
    print ' <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>';
    print "  <meta charset=\"utf-8\" />\n";
    print "  <title>$texto. Agenda de teléfonos \n";
    print "  Proyecto. PHP. Joan Piera Simó</title>\n";
    //print "  <link href=\"joan.css\" rel=\"stylesheet\" type=\"text/css\" />\n";
    print '<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">';
    print "</head>\n";
    print "\n";
    print "<body>\n";
    print "<header>\n";
    print "  <div style='padding-left: 10px'><h1>Agenda - $texto</h1></div>\n";
    print "</header>\n";
    print "\n";
   
    
    print '<!-- Fixed navbar -->';
    print '<nav class="navbar navbar-inverse">';
    print '  <div class="container">';
    print '    <div class="navbar-header">';
    print '      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">';
    print '        <span class="sr-only">Toggle navigation</span>';
    print '        <span class="icon-bar"></span>';
    print '        <span class="icon-bar"></span>';
    print '        <span class="icon-bar"></span>';
    print '      </button>';
    print '    </div>';
    print '    <div id="navbar" class="navbar-collapse collapse">';
    print '      <ul class="nav navbar-nav">';
    print '        <li><a href=\'registro.php\'><i class="fa fa-plus"></i></i>Añadir Usuario</a></li>';
    print '        <li><a href=\'borraUsuario1.php\'><i class="fa fa-ban"></i>Borrar Usuario</a></li>';
    print '        <li><a href=\'creartodo1.php\'><i class="fa fa-plus-square-o"></i>Crear dB</a></li>';
    print '        <li><a href=\'borrartodo1.php\'><i class="fa fa-ban"></i>Borrar dB</a></li>';
    print '      </ul>';
    print '    </div><!--/.nav-collapse -->';
    print '  </div>';
    print '</nav>';
    
    
    print "<main>\n";
   
}


function sinCabecera($texto, $menu)
{
    print "<!DOCTYPE html>\n";
    print "<html lang=\"es\">\n";
    print "<head>\n";
    print '<!-- Latest compiled and minified CSS -->';
    print ' <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">';

    print '<!-- Optional theme -->';
    print ' <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">';

    print '<!-- Latest compiled and minified JavaScript -->';
    print ' <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>';
    print "  <meta charset=\"utf-8\" />\n";
    print "  <title>$texto. Agenda de teléfonos \n";
    print "  Proyecto. PHP. Joan Piera Simó</title>\n";
    //print "  <link href=\"joan.css\" rel=\"stylesheet\" type=\"text/css\" />\n";
    print '<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">';
    print "</head>\n";
    print "\n";
    print "<body>\n";
    print "<header>\n";
    print "  <div style='padding-left: 10px'><h1>Agenda - $texto </h1></div>\n";
    print "</header>\n";
    print "\n";
   
    
    print '<!-- Fixed navbar -->';
    print '<nav class="navbar navbar-inverse">';
    print '  <div class="container">';
    print '    <div class="navbar-header">';
    print '      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">';
    print '        <span class="sr-only">Toggle navigation</span>';
    print '        <span class="icon-bar"></span>';
    print '        <span class="icon-bar"></span>';
    print '        <span class="icon-bar"></span>';
    print '      </button>';
    print '    </div>';
    print '    <div id="navbar" class="navbar-collapse collapse">';
    print '      <ul class="nav navbar-nav">';
    print '        <li><a href=\'index.php\'><i class="fa fa-plus"></i></i>Volver</a></li>';
    print '      </ul>';
    print '    </div><!--/.nav-collapse -->';
    print '  </div>';
    print '</nav>';
    
    
    print "<main>\n";
   
}


function cabeceraNuevo($texto, $menu)
{
    print "<!DOCTYPE html>\n";
    print "<html lang=\"es\">\n";
    print "<head>\n";
    print '<!-- Latest compiled and minified CSS -->';
    print ' <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">';

    print '<!-- Optional theme -->';
    print ' <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">';

    print '<!-- Latest compiled and minified JavaScript -->';
    print ' <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>';
    print "  <meta charset=\"utf-8\" />\n";
    print "  <title>$texto. Agenda de teléfonos \n";
    print "  Proyecto. PHP. Joan Piera Simó</title>\n";
    //print "  <link href=\"joan.css\" rel=\"stylesheet\" type=\"text/css\" />\n";
    print '<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">';
    print "</head>\n";
    print "\n";
    print "<body>\n";
    print "<header>\n";
    print "  <div style='padding-left: 10px'><h1>Agenda - $texto </h1></div>\n";
    print "</header>\n";
    print "\n";
   
    
    print '<!-- Fixed navbar -->';
    print '<nav class="navbar navbar-inverse">';
    print '  <div class="container">';
    print '    <div class="navbar-header">';
    print '      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">';
    print '        <span class="sr-only">Toggle navigation</span>';
    print '        <span class="icon-bar"></span>';
    print '        <span class="icon-bar"></span>';
    print '        <span class="icon-bar"></span>';
    print '      </button>';
    print '    </div>';
    print '    <div id="navbar" class="navbar-collapse collapse">';
    print '      <ul class="nav navbar-nav">';
    print '        <li><a href=\'registro.php\'><i class="fa fa-plus"></i></i>Volver</a></li>';
    print '      </ul>';
    print '    </div><!--/.nav-collapse -->';
    print '  </div>';
    print '</nav>';
    
    
    print "<main>\n";
   
}

function cabeceraBorra($texto, $menu)
{
    print "<!DOCTYPE html>\n";
    print "<html lang=\"es\">\n";
    print "<head>\n";
    print '<!-- Latest compiled and minified CSS -->';
    print ' <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">';

    print '<!-- Optional theme -->';
    print ' <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">';

    print '<!-- Latest compiled and minified JavaScript -->';
    print ' <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>';
    print "  <meta charset=\"utf-8\" />\n";
    print "  <title>$texto. Agenda de teléfonos \n";
    print "  Proyecto. PHP. Joan Piera Simó</title>\n";
    //print "  <link href=\"joan.css\" rel=\"stylesheet\" type=\"text/css\" />\n";
    print '<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">';
    print "</head>\n";
    print "\n";
    print "<body>\n";
    print "<header>\n";
    print "  <div style='padding-left: 10px'><h1>Agenda - $texto </h1></div>\n";
    print "</header>\n";
    print "\n";
   
    
    print '<!-- Fixed navbar -->';
    print '<nav class="navbar navbar-inverse">';
    print '  <div class="container">';
    print '    <div class="navbar-header">';
    print '      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">';
    print '        <span class="sr-only">Toggle navigation</span>';
    print '        <span class="icon-bar"></span>';
    print '        <span class="icon-bar"></span>';
    print '        <span class="icon-bar"></span>';
    print '      </button>';
    print '    </div>';
    print '    <div id="navbar" class="navbar-collapse collapse">';
    print '      <ul class="nav navbar-nav">';
    print '        <li><a href=\'borraUsuario1.php\'><i class="fa fa-plus"></i></i>Volver</a></li>';
    print '      </ul>';
    print '    </div><!--/.nav-collapse -->';
    print '  </div>';
    print '</nav>';
    
    
    print "<main>\n";
   
}

function pie()
{
    
   
    print "</main>\n";
    print "\n";
    print "<footer>\n";
    print "  <p style='padding-left: 10px; padding-top: 100px' class=\"ultmod\">\n";
    print "  Fecha actual:\n". date("d") . " - " . date("m") . " - " . date("Y");
    
    //print "  <time datetime=\"2015-11-28\">12 de enero de 2016</time></p>\n";
    
    
    print "\n";
    print "</footer>\n";
    print "</body>\n";
    
    print '<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>';
    print '<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>';
    print '<script>window.jQuery || document.write(\'<script src=\"../../assets/js/vendor/jquery.min.js\"><\/script>\')</script>';
    
    print "</html>";
}
