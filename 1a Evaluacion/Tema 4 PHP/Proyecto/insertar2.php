<?php
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

require_once "agenda.php";

$db = conectaDb();
cabecera("Añadir contacto", MENU_VOLVER);

$nombre      = recoger("nombre");
$apellidos   = recoger("apellidos");
$telefono    = recoger("telefono");
$correo      = recoger("correo");
$direccion   = recoger("direccion");

$nombreOk    = false;
$apellidosOk = false;
$telefonoOk  = false;
$correoOk    = false;
$direccionOk = false;



if (mb_strlen($nombre, "UTF-8") > $tamNombre) {
    print "  <h4 style='padding-left: 10px'>El nombre no puede tener más de $tamNombre caracteres.</h4>";
} elseif (strlen($nombre)<1) {
    print "  <h4 style='padding-left: 10px'>El campo Nombre no puede estar vacio</h4>";
} else {
    $nombreOk = true;
}

if (mb_strlen($apellidos, "UTF-8") > $tamApellidos) {
    print "  <h4 style='padding-left: 10px'>Los apellidos no pueden tener más de $tamApellidos caracteres.</h4>\n\n";
} elseif (strlen($apellidos)<1) {
    print "  <h4 style='padding-left: 10px'>El campo Apellidos no puede estar vacio</h4>";
} else {
    $apellidosOk = true;
}



if (!is_numeric($telefono)) {
    print "  <h4 style='padding-left: 10px'>El Telefono debe de contener solamente números.</h4>\n\n";
} else if (mb_strlen($telefono, "UTF-8") > $tamTelefono) {
    print "  <h4 style='padding-left: 10px'>El Telefono no puede tener más de $tamTelefono caracteres.</h4>\n\n";
} else {
    $telefonoOk = true;
}

if (mb_strlen($correo, "UTF-8") > $tamCorreo) {
    print "  <h4 style='padding-left: 10px'>El e-mail no puede tener más de $tamCorreo caracteres.</h4>\n\n";
} else {
    $correoOk = true;
}

if (mb_strlen($direccion, "UTF-8") > $tamDireccion) {
    print "  <h4 style='padding-left: 10px'>La direccion no puede tener más de $tamDireccion caracteres.</h4>\n\n";
} else {
    $direccionOk = true;
}

if ($nombreOk && $apellidosOk && $telefonoOk && $correoOk && $direccionOk) {
    $consulta = "INSERT INTO $dbTablaAgenda
        (usuario, nombre, apellidos, telefono, correo, direccion)
        VALUES (:usuario, :nombre, :apellidos, :telefono, :correo, :direccion)";
    $result = $db->prepare($consulta);
    if ($result->execute(array(":usuario" =>$usuario ,":nombre" => $nombre, ":apellidos" => $apellidos, ":telefono" => $telefono
            , ":correo" => $correo, ":direccion" => $direccion))) {
        print "  <h4 style='padding-left: 10px'>Registro <strong>$nombre $apellidos</strong> creado correctamente.</h4>\n";
    } else {
        print "  <h4 style='padding-left: 10px'>Error al crear el registro <strong>$nombre $apellidos</strong>.</h4>\n";
    }
} else {
    print " <div style='text-align: center'><a href='insertar1.php' class='btn btn-primary'>Volver</a>";
}

$db = null;
pie();
