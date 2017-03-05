<?php
class Singleton {
    protected static $instance;

    public static function getInstance() {
        
        if(!isset(self::$instance)) {
            $class = __CLASS__;
            self::$instance = new $class();
            echo "<p> First initialization</p>";
        }else {
            echo "<p>... initialization</p>";
        }
        return self::$instance;
    }

    private function __construct() { }
    private function __clone() { }
    private function __wakeup() { }
}

Singleton::getInstance();
Singleton::getInstance();
Singleton::getInstance();



/*
public static function getInstance() {
        if ( is_null(self::$instance) ) {
            self::$instance = new Singleton;
        }
        return self::$instance;
    }

        http://ru.stackoverflow.com/questions/92217/%D0%9F%D0%B0%D1%82%D1%82%D0%B5%D1%80%D0%BD-singleton
    */
?>