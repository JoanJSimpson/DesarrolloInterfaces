<?php
/**
 * Bases de datos - agenda.php
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

// Constantes
define("MYSQL_HOST",     "mysql:host=localhost"); // Nombre de host MYSQL
define("MYSQL_USUARIO",  "root");                 // Nombre de usuario de MySQL
define("MYSQL_PASSWORD", "sistemas");             // Contraseña de usuario de MySQL poner sistemas

// Variables globales
$dbDb    = "BaseDeDatosAgendaJoan";          // Nombre de la base de datos
$dbTablaLogin = $dbDb . ".tablaLogin";                  // Nombre de la tabla
$dbTablaAgenda = $dbDb . ".tablaAgenda";                  // Nombre de la tabla

// Consultas
$consultaCreaDb = "CREATE DATABASE $dbDb
    CHARACTER SET utf8mb4 
    COLLATE utf8mb4_unicode_ci";

$consultaCreaTabla1 = "CREATE TABLE $dbTablaLogin (
    usuario VARCHAR($tamUsuario) PRIMARY KEY,
    password VARCHAR($tamPassword) NOT NULL
    )";

$consultaCreaTabla2 = "CREATE TABLE $dbTablaAgenda (
    id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    usuario VARCHAR($tamUsuario),
    nombre VARCHAR($tamNombre),
    apellidos VARCHAR($tamApellidos),
    telefono INTEGER($tamTelefono),
    correo VARCHAR($tamCorreo),
    direccion VARCHAR($tamDireccion),
    PRIMARY KEY(id),
    FOREIGN KEY (usuario) REFERENCES $dbTablaLogin (usuario) ON DELETE CASCADE ON UPDATE CASCADE
    )";

// Funciones comunes de bases de datos (MYSQL)

function creaDB($db){
    global $consultaCreaDb, $consultaCreaTabla1, $consultaCreaTabla2, $dbTablaLogin, $dbTablaAgenda;
    $consulta = $consultaCreaDb;
    if ($db->query($consulta)) {
        print "  <p>Base de datos creada correctamente.</p>\n\n";
        $consulta = $consultaCreaTabla1;
        if ($db->query($consulta)) {
            print "  <h4>Tabla ".$dbTablaLogin." creada correctamente.</h4>\n";
        } else {
            print "  <h4>Error al crear la tabla ".$dbTablaLogin.".</h4>\n";
        }
        $consulta = $consultaCreaTabla2;
        if ($db->query($consulta)) {
            print "  <h4>Tabla ".$dbTablaAgenda." creada correctamente.</h4>\n";
        } else {
            print "  <h4>Error al crear la tabla ".$dbTablaAgenda.".</h4>\n";
        }
    }else {
        print "  <h4>Error al crear la base de datos.</h4>\n";
        print "  <h4>Ya existe la base de datos.</h4>\n";
    }
}

function conectaDb()
{
    try {
        $db = new PDO(MYSQL_HOST, MYSQL_USUARIO, MYSQL_PASSWORD);
        $db->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);
        $db->exec("set names utf8mb4");
        return($db);
    } catch(PDOException $e) {
        cabecera("Error grave", MENU_PRINCIPAL);
        print "  <h4>Error: No puede conectarse con la base de datos.</h4>\n\n";
        print "  <h4>Error: " . $e->getMessage() . "</h4>\n";
        pie();
        exit();
    }
}

function borraTodo($db)
{
    global $dbDb, $consultaCreaDb, $consultaCreaTabla1, $consultaCreaTabla2, $dbTablaLogin, $dbTablaAgenda;
    
    $consulta = "DROP DATABASE $dbDb";
    if ($db->query($consulta)) {
        print "  <h4>Base de datos borrada correctamente.</h4>\n\n";
    } else {
        print "  <h4>Error al borrar la base de datos.</h4>\n\n";
    }
}
