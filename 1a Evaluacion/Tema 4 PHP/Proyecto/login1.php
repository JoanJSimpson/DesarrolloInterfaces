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
sinCabecera("Login", MENU_VOLVER);

$usuario      = recoger("usuario");
$password     = recoger("password");
$usuarioOk    = false;
$passwordOk   = false; 

$consulta = "SELECT * FROM $dbTablaLogin";
$result = $db->prepare($consulta);
$result->execute(array(":usuario" => "%$usuario%", ":password" => "%$password%"));

foreach ($result as $comprueba) {
    if ($comprueba[usuario]==$usuario){
        $usuarioOk = true;
        if ($comprueba[password]==$password){
            $passwordOk = true;
        }
    }
}

if ($passwordOk && $usuarioOk){
    
        $_SESSION['usuario']=$usuario;
        header('Location: login2.php');
} else {
    if ($usuarioOk){
        print "<h4 style='padding-left: 10px'>Password incorrecto</h4>";
    } else {
        print "<h4 style='padding-left: 10px'>Usuario no encontrado</h4>";
    }
}
print "    </tbody>\n";
print "  </table>\n";

$db = null;