<?php
// Constantes y variables globales

define("FORM_METHOD",    "get");           // Formularios se envían con GET
//define("FORM_METHOD",    "post");        // Formularios se envían con POST

define("MYSQL",          "MySQL");         // Base de datos MySQL 
define("SQLITE",         "SQLite");        // Base de datos SQLITE

define("MENU_PRINCIPAL", "menuPrincipal"); // Menú principal
define("MENU_VOLVER",    "menuVolver");    // Menú Volver a inicio

$tamNombre    = 40;                        // Tamaño del campo Nombre
$tamApellidos = 60;                        // Tamaño del campo Apellidos

$dbMotor = SQLITE;                         // Base de datos empleada (MYSQL o SQLITE)

if ($dbMotor == MYSQL) {
    require_once "biblioteca_mysql.php";
} elseif ($dbMotor == SQLITE) {
    require_once "biblioteca_sqlite.php";
}

// Funciones comunes

function cabecera($texto, $menu)
{
    print "<!DOCTYPE html>\n";
    print "<html lang=\"es\">\n";
    print "<head>\n";
    print "  <meta charset=\"utf-8\" />\n";

    //    print "<p class=\"aviso\">Ejercicio incompleto</p>\n";

    print "  Ejercicios. PHP. Bartolomé Sintes Marco. www.mclibre.org</title>\n";
    print "  <link href=\"mclibre_php_soluciones_proyectos_comun.css\" rel=\"stylesheet\" type=\"text/css\" />\n";
    print "</head>\n";
    print "\n";
    print "<body>\n";
    print "<header>\n";

    print "<p class=\"aviso\">Ejercicio incompleto</p>\n";

    print "  \n";
    print "  <nav>\n";
    print "    <ul>\n";

    print "<p class=\"aviso\">Ejercicio incompleto</p>\n";

    print "    </ul>\n";
    print "  </nav>\n";
    print "</header>\n";
    print "\n";
    print "<main>\n";
}

function pie()
{
    print "</main>\n";
    print "\n";
    print "<footer>\n";
    print "  <p class=\"ultmod\">\n";
    print "  Última modificación de esta página:\n";
    print "  <time datetime=\"2015-11-28\">28 de noviembre de 2015</time></p>\n";
    print "</footer>\n";
    print "</body>\n";
    print "</html>";
}
