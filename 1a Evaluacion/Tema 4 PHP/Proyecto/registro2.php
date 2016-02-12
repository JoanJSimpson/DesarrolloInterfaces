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

require_once "agenda.php";

$db = conectaDb();
cabeceraNuevo("Registro nuevo usuario", MENU_VOLVER);

$usuario     = recoger("usuario");
$password    = recoger("password");
$password2   = recoger("password2");

$usuarioOk    = false;
$passwordOk = false;
$password2Ok  = false;
$igualesOk = false;



if (mb_strlen($usuario, "UTF-8") > $tamNombre) {
    print "  <h4 style='padding-left: 10px'>El usuario no puede tener más de $tamNombre caracteres.</h4>\n\n";
} elseif(mb_strlen($usuario, "UTF-8") < 1){
    print "  <h4 style='padding-left: 10px'>El usuario no puede estar vacío.</h4>\n\n";
} else {
    $usuarioOk = true;
}

if (mb_strlen($password, "UTF-8") > $tamPassword) {
    print "  <h4 style='padding-left: 10px'>El Password no pueden tener más de $tamPassword caracteres.</h4>\n\n";
} elseif(mb_strlen($password, "UTF-8") < 1){
    print "  <h4 style='padding-left: 10px'>El password no puede estar vacío.</h4>\n\n";
} else {
    $passwordOk = true;
}

if (mb_strlen($password2, "UTF-8") > $tamPassword) {
    print "  <h4 style='padding-left: 10px'>El Password no pueden tener más de $tamPassword caracteres.</h4>\n\n";
} else {
    $password2Ok = true;
}

if ($password == $password2){
    $igualesOk = true;
} else {
    print " <h4 style='padding-left: 10px'>Los campos de Password no coinciden.</h4>\n\n";
}


if ($usuarioOk && $passwordOk && $password2Ok && $igualesOk) {
    $consulta = "INSERT INTO $dbTablaLogin
        (usuario, password)
        VALUES (:usuario, :password)";
    $result = $db->prepare($consulta);
    if ($result->execute(array(":usuario" => $usuario, ":password" => $password))) {
        $_SESSION['usuario']=$usuario;
        header('Location: login2.php');
    } else {
        print "  <h4 style='padding-left: 10px'><p>Error al crear el usuario <strong>$usuario</strong>.</p>";
        print "  <p>Es posible que el usuario exista</p></h4>";
    }
}

$db = null;
pie();
