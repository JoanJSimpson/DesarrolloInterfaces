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

cabeceraIndex("LogIn", MENU_VOLVER);

print "  <form action=\"login1.php\" method=\"" . FORM_METHOD . "\">\n";
print "    <h3 style='padding-left: 10px'>Login:</h3>\n";

?>

<div class="input-group input-group-lg">
  <span class="input-group-addon" id="sizing-addon1">Usuario&nbsp;&nbsp;&nbsp;&nbsp;</span>
  <input type="text" name="usuario" class="form-control" placeholder="Usuario" aria-describedby="sizing-addon1">
</div>
<div class="input-group input-group-lg">
  <span class="input-group-addon" id="sizing-addon1">Password&nbsp;</span>
  <input type="password" name="password" class="form-control" placeholder="Password" aria-describedby="sizing-addon1">
</div>



<div style="width: 100%; text-align: center; padding-top: 50px">
    
        <input type="submit" value="Acceder"  class="btn btn-primary" />
        <a href="registro.php" class="btn btn-primary" > Crear nuevo usuario</a>
        </div>
        </form>
<?php

pie();
