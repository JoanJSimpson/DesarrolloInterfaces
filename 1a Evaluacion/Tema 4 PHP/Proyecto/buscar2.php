<?php
/**
 * Bases de datos - agenda.php
 *
 * @author    Joan Piera Simó
 * @copyright 2016 Joan Piera Simó
 * @license   http://www.gnu.org/licenses/agpl.txt AGPL 3 or later
 * @version   2016-02-15
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
cabecera("Buscar contacto", MENU_VOLVER);

$nombre    = recoger("nombre");
$apellidos = recoger("apellidos");

$consulta = "SELECT * FROM $dbTablaAgenda
    WHERE nombre LIKE :nombre
    AND apellidos LIKE :apellidos
    AND usuario like '$usuario'
    ";
$result = $db->prepare($consulta);
$result->execute(array(":nombre" => "%$nombre%", ":apellidos" => "%$apellidos%"));
print "    <div style=\"text-align: center\"><h3>Registros encontrados:</h3></div>\n";
?>
<div class="col-md-12" >
          <table class="table table-striped" style="width: 40%; margin: 0 auto; text-align: center">
            <thead> 
                <tr>
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
                    print "        <td>$valor[nombre]</td>\n";
                    print "        <td>$valor[apellidos]</td>\n";
                    print "        <td>$valor[telefono]</td>\n";
                    print "        <td>$valor[correo]</td>\n";
                    print "        <td>$valor[direccion]</td>\n";
                    print "      </tr>\n";
                }?>
              </tbody>
               </table>
            </tbody>
          </table>
        </div>
</tbody>
</table>
<?php
$db = null;
pie();
