<?php 
$res = $_REQUEST['tag_sh'];
    
    var_dump($res);



 ?>
<h1 style="text-align: center;">Главная страница плагина "Мой Плагин".</h1>
                    <p><h3 style="text-align: center;">Create your shortcode.</h3></p>
<form action="<?php $arr = []; ?>" method="post">
    <table>
        <tr>
            <th>Enter Tag shortcode:</th>
            <th><input type="text" name="tag_sh" required></th>
        </tr>
        <tr>
            <th>Enter Content shortcode:</th>
            <th><input type="text" name="content_sh" required></th>
        </tr>
        <tr>
        <th></th>
        <th><p><input type="submit" value="Save and Activate"></p></th>
        </tr>
    </table>
</form>