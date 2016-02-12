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
cabecera ("Borrar contacto", MENU_VOLVER);

$id = recogeMatriz("id");

foreach ($id as $indice => $valor) {
    $consulta = "DELETE FROM $dbTablaAgenda
        WHERE usuario like '$usuario' and id=:indice";
    $result = $db->prepare($consulta);
    if ($result->execute(array(":indice" => $indice))) {
        print "  <h4 style='padding-left: 10px'>Registro borrado correctamente.</h4>\n";
    } else {
        print "  <h4 style='padding-left: 10px'>Error al borrar el registro.</h4>\n";
    }
}

$db = null;
pie();
