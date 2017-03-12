<?php

$wpdb2 = new wpdb( 'root', '', 'test', 'localhost' );
if(!empty($wpdb2->error)) wp_die( $wpdb2->error );


//var_dump($wpdb2);
//$res = $wpdb2->query("SELECT DISTINCT DSEC FROM TOOLS");

$results = $wpdb2->get_results("SELECT * FROM CLIENTS");

db_test($results);
    
    function db_test($results){
        foreach($results as $result => $value){
            echo $result;
            foreach($value as $values){
                echo $values."<br/>";
            }
        }
    }
?>



<!--<h3 style="text-align: center;">Страница информации плагина "Мой плагин"</h3>-->