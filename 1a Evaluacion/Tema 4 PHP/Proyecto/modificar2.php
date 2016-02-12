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

$id = recoger("id");

if($id>0){

    $consulta = "SELECT * FROM $dbTablaAgenda
        WHERE id=:id";
    $result = $db->prepare($consulta);
    $result->execute(array(":id" => $id));


    $valor = $result->fetch();
    print "  <form action=\"modificar3.php\" method=\"" . FORM_METHOD . "\">\n";
    print "    <div style=\"text-align: center\"><h3>Modifique los campos que desee:</h3></div>\n";
    print "    \n";
    ?>


    <div class="col-md-12" >
              <table class="table table-striped" style="width: 40%; margin: 0 auto;">
                <tbody>
                    <tr>
                        <td style="text-align: left">Nombre:</td>
                        <td><input type="text" name="nombre" size="<?php echo $tamNombre?>" maxlength="$tamNombre" value="<?php echo $valor[nombre]?>" autofocus /></td>
                    </tr>
                    <tr>
                        <td style="text-align: left">Apellidos:</td>
                        <td><input type="text" name="apellidos" size="<?php echo $tamApellidos?>" maxlength="$tamApellidos" value="<?php echo $valor[apellidos]?>" /></td>
                    </tr>
                    <tr>
                        <td style="text-align: left">Telefono:</td>
                        <td><input type="text" name="telefono" size="<?php echo $tamTelefono?>" maxlength="$tamTelefono" value="<?php echo $valor[telefono]?>" autofocus /></td>
                    </tr>
                    <tr>
                        <td style="text-align: left">E-mail:</td>
                        <td><input type="text" name="correo" size="<?php echo $tamCorreo?>" maxlength="$tamCorreo" value="<?php echo $valor[correo]?>" autofocus /></td>
                    </tr>
                    <tr>
                        <td style="text-align: left">Direccion:</td>
                        <td><input type="text" name="direccion" size="<?php echo $tamDireccion?>" maxlength="$tamDireccion" value="<?php echo $valor[direccion]?>" autofocus /></td>
                    </tr>
                </tbody>
              </table>

        <div style="width: 100%; text-align: center; padding-top: 50px">
            <input type="hidden" name="id" value="<?php echo $id?>" />
            <input type="submit" value="Actualizar" class="btn btn-primary"/>
            <input type="reset" value="Reiniciar formulario" class="btn btn-primary"/>
        </div>
    </form>
<?php
} else {
    print " <h4 style='padding-left: 10px'>Debe seleccionar algun contacto.</h4>\n\n";
    print " <div style='text-align: center'><a href='modificar1.php' class='btn btn-primary'>Volver</a>";

}



$db = null;
pie();
?>
