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

sinCabecera("Crear Agenda", MENU_VOLVER);

print "  <form action=\"creartodo2.php\" method=\"" . FORM_METHOD . "\">\n";
print "    <div style=\"width: 100%; text-align: center; padding-top: 50px\"><h4>¿Está seguro?</h4></div>";


?>
<div style="width: 100%; text-align: center; padding-top: 10px">
    
        <input type="submit" value="Sí" name="si"  class="btn btn-primary" />
        <input type="submit" value="No" name="no"  class="btn btn-primary"/>
        </div>
        </form>
<?php

pie();
