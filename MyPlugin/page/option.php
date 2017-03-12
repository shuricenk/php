<?php

var_dump($_REQUEST['option_auto']);
var_dump($_REQUEST['option_day']);
var_dump($_REQUEST['option_auto']);


?>

<h2 style="text-align: center;">Страница настроек плагина "Мой плагин"</h2>

<form action="option.php" method="post" >
    <table class="form-table">
        <tbody>
            <tr>
                <th>Enter please your key:</th>
                <td><label><input form="data_form" type="text" size="39.9" name="option_key" ></label></td>
            </tr>
            <tr>
                <th>Enter select option:</th>
                <td>
                    <label><select name="option_day">
                        <option>Option active on 30 day</option>
                        <option>Option active on 90 day </option>
                        <option selected>Option active on 180 day recommended</option>
                        <option>Option active on 360 day</option>
                    </select></label>
                </td>
            </tr>
            <tr>
                <th>Repeat at the end?</th>
                <td><label><input type="checkbox" name="option_auto" form="data_form" checked></label></td>
            </tr>
            <tr>
            <th>
               <p><b><input type="submit" value="Activate Premium+"></b></p>
            </th>
            </tr>
        </tbody>
    </table>
</form>



