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
cabecera("Modificar contacto", MENU_VOLVER);

$consulta = "SELECT * FROM $dbTablaAgenda where usuario = '$usuario'";
$result = $db->query($consulta);

print "  <form action=\"modificar2.php\" method=\"" . FORM_METHOD . "\">";
print "    <div style=\"text-align: center\"><h3>Marque los registros que quiera modificar:</h3></div>";
print "    ";

?>
  <div class="col-md-12" >
          <table class="table table-striped" style="width: 80%; margin: 0 auto; text-align: center">
            <thead> 
                <tr>
                <th style="text-align: center">Modificar</th>
                <th style="text-align: center">Nombre</th>
                <th style="text-align: center">Apellidos</th>
                <th style="text-align: center">Telefono</th>
                <th style="text-align: center">Correo</th>
                <th style="text-align: center">Direccion</th>
              </tr>
            </thead>
            <tbody>
                <?php
                foreach ($result as $valor) {
                    print "      <tr>\n";
                    print "        <td><input type=\"radio\" name=\"id\" value=\"$valor[id]\" /></td>\n";
                    print "        <td>$valor[nombre]</td>\n";
                    print "        <td>$valor[apellidos]</td>\n";
                    print "        <td>$valor[telefono]</td>\n";
                    print "        <td>$valor[correo]</td>\n";
                    print "        <td>$valor[direccion]</td>\n";
                    print "      </tr>\n";
                }
               ?>
              </tbody>
               </table>
            </tbody>
          </table>
        </div>

<div style="width: 100%; text-align: center; padding-top: 200px">
    
        <input type="submit" value="Modificar registro"  class="btn btn-primary" />
        <input type="reset" value="Reiniciar formulario"  class="btn btn-primary"/>
</div>
</form>
        